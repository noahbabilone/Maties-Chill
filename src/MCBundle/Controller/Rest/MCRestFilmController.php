<?php/** * Created by PhpStorm. * User: Yann * Date: 21/02/2016 * Time: 17:25 */namespace MCBundle\Controller\Rest;use MCBundle\Controller\FilmController;use MCBundle\Entity\Film;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use FOS\RestBundle\View\View as FOSView;use Nelmio\ApiDocBundle\Annotation\ApiDoc;use FOS\RestBundle\Controller\Annotations\View;use FOS\RestBundle\Controller\Annotations\Get;use FOS\RestBundle\Controller\Annotations\Delete;use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;use UserBundle\Entity\User;class MCRestFilmController extends Controller{    /**     * @ApiDoc(     *   resource = true,     *   description = "Return the overall Film List",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @return array     * @View()     */    public function getFilmsAction()    {        $em = $this->getDoctrine()->getManager();        $films = $em->getRepository('MCBundle:Film')->findAll();        $view = FOSView::create();        if ($films) {            $view->setData($films)->setStatusCode(200);        } else {            $view->setData($films)->setStatusCode(404);        }        return $view;    }    /**     * Get a Film.     * @Get("/films/{id}")     * @ApiDoc(     *   resource = true,     *   description = "Return an Film identified by ID",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     *     * @param Film $film     * @return array     * @View()     * @ParamConverter("film", class="MCBundle:Film")     */    public function getFilmAction(Film $film)    {        return $film;    }    /**     * * Delete a Film identified by ID.     * @ApiDoc(     *   resource = true,     *   description = "Delete an Film identified by ID",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Delete("/films/delete/{id}")     * @param int $id the Film id     * @return View     */    public function removeFilmAction($id)    {        $em = $this->getDoctrine()->getManager();        $film = $em->getRepository('MCBundle:Film')->find($id);        $em->remove($film);        $em->flush();        $result = $em->getRepository('MCBundle:Film')->find($id);        $view = FOSView::create();        if (null == $result) {            $view->setData('Film deleted')->setStatusCode(200);        } else {            $view->setData('Film don\'t delete')->setStatusCode(404);        }        return $view;    }    /**     * @ApiDoc(     *   resource = true,     *   description = "Return the overall film List by Genre",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Get("/films/genre/{id_genre}")     * @param $id_genre     * @return View     */    public function getFilmByGenreAction($id_genre)    {        $em = $this->getDoctrine()->getManager();        $films = $em->getRepository('MCBundle:Film')->getByGenre($id_genre);        if (!$films) {            throw $this->createNotFoundException('Data not found.');        }        return $films;    }    /**     * @ApiDoc(     *   resource = true,     *   description = "Return the overall film List by keyword",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Get("/films/search/{film}")     * @param $film     * @return View     */    public function SearchFilmAction($film)    {        $em = $this->getDoctrine()->getManager();        $films = $em->getRepository('MCBundle:Film')->searchDB($film);        if(empty($films)){            return  $this->SearchFilmAllocineAction($film);                    }        return $films;    }    /**     * @ApiDoc(     *   resource = true,     *   description = "Return the overall film List by keyword via Allocine",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Get("/films/search-allocine/{keyword}")     * @param $keyword     * @return View     */    public function SearchFilmAllocineAction($keyword)    {        $alloCine = $this->get("mc_allocine");        $result = $alloCine->search($keyword);        $data = json_decode($result);        $movies = array();        foreach ($data->feed->movie as $movie) {            $film = new Film();            $film->setISAN($movie->code);            if (array_key_exists('title', $movie))                $film->setTitle($movie->title);            if (array_key_exists('originalTitle', $movie))                $film->setOriginalTitle($movie->originalTitle);            if (array_key_exists('release', $movie))                $film->setReleaseDate($movie->release->releaseDate);            if (array_key_exists('poster', $movie))                $film->setPoster($movie->poster->href);            $movies[] = FilmController::parserMovieTab($film);        }        return $movies;    }}