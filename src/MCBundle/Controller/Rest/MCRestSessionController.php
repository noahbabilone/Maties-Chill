<?php/** * Created by PhpStorm. * User: Yann * Date: 21/02/2016 * Time: 17:25 */namespace MCBundle\Controller\Rest;use FOS\RestBundle\FOSRestBundle;use MCBundle\Entity\Session;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use FOS\RestBundle\Controller\Annotations\View;use FOS\RestBundle\Controller\Annotations\Get;use FOS\RestBundle\Controller\Annotations\Delete;use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;class MCRestSessionController extends Controller{     /**     * @Get("/sessions")      * @return array     * @View()     */    public function getSessionsAction(){        $em = $this->getDoctrine()->getManager();        $sessions = $em->getRepository('MCBundle:Session')->findAll();        return $sessions;    }        /**     * Get a Session.     * @param Session $session     * @return array     * @View()     * @ParamConverter("session", class="MCBundle:Session")     */    public function getSessionAction(Session $session)    {        return $session;    }        /**     * Removes a Session.     * @param int $id the Session id     * @return View     */    public function removeSessionsAction($id)    {        $em = $this->getDoctrine()->getManager();        $session = $em->getRepository('MCBundle:Session')->find($id);        $em->remove($session);        $em->flush();        $result = $em->getRepository('MCBundle:Session')->find($id);        return (null == $result) ? "Success" : "Error Deleting";    }    /**     * Get all Sessions of ID Film     * @Get("/sessions/film={id}")     * @param $idFilm     * @return array     * @View()     */    public function getSessionFilmAction($idFilm){        $em = $this->getDoctrine()->getManager();        $sessions = $em->getRepository('MCBundle:Session')->findByFilm($idFilm);        return $sessions;    }        /**     * Get all Sessions of ID User     * @Get("/sessions/user={idUser}")     * @param $idUser     * @return array     * @View()     */    public function getSessionUserAction($idUser){        $em = $this->getDoctrine()->getManager();        $sessions = $em->getRepository('MCBundle:Session')->findByUser($idUser);        return $sessions;    }            }