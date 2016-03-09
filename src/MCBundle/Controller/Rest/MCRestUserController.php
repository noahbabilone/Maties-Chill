<?php/** * Created by PhpStorm. * User: Yann * Date: 21/02/2016 * Time: 17:25 */namespace MCBundle\Controller\Rest;use FOS\UserBundle\Model\User;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use FOS\RestBundle\Controller\Annotations\View;use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;use FOS\RestBundle\Controller\Annotations\Get;use FOS\RestBundle\Controller\Annotations\Delete;class MCRestUserController extends Controller{    /**     * @Get("/users")     * @return array     * @View()     */    public function getUsersAction()    {        $em = $this->getDoctrine()->getManager();        $users = $em->getRepository('UserBundle:User')->findAll();        return array('users' => $users);    }    /**     * Get a User.     * @Get("/user/id={user}")     * @param User $user     * @return array     * @View()     * @ParamConverter("user", class="UserBundle:User")     */    public function getUserAction(User $user)    {        return array('user' => $user);    }    /**     * Removes a User.     * @Delete("/user/delete/id={id}")     * @param int $id the Session id     *     * @return View     */    public function removeUserAction($id)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($id);        // $em->remove($session);        $em->flush();        $result = $em->getRepository('UserBundle:User')->find($id);        return (null == $result) ? "Success" : "Error Deleting";    }}