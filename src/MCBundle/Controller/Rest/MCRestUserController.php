<?php/** * Created by PhpStorm. * User: Yann * Date: 21/02/2016 * Time: 17:25 */namespace MCBundle\Controller\Rest;use FOS\UserBundle\Model\User;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use FOS\RestBundle\Controller\Annotations\View;use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;use FOS\RestBundle\Controller\Annotations\Get;use FOS\RestBundle\Controller\Annotations\Delete;class MCRestUserController extends Controller{    /**     * @Get("/users")     * @return array     * @View()     */    public function getUsersAction()    {        $em = $this->getDoctrine()->getManager();        $users = $em->getRepository('UserBundle:User')->findAll();        return $users;    }    /**     * Get a User.     * @Get("/users/{user}")     * @param User $user     * @return array     * @View()     * @ParamConverter("user", class="UserBundle:User")     */    public function getUserAction(User $user)    {        return $user;    }    /**     * @Delete("/users/delete/{id}")     * Removes a User.     * @param int $id the Session id     *     * @return View     */    public function deleteUserAction($id)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($id);        $em->remove($user);        $em->flush();        $result = $em->getRepository('UserBundle:User')->find($id);        return (null == $result) ? "Success" : "Error Deleting";    }    /**     * @Get("/users/check_session/username={username}&password={password}")     * @param $username     * @param $password     * @return View     */    public function checkSessionAction($username, $password)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->findOneByUsername($username);        if ($user) {            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);            if ($encoder->encodePassword($password, $user->getSalt()) === $user->getPassword()) {                return $user;            }        }        return array();    }}