<?php/** * Created by PhpStorm. * User: Yann * Date: 21/02/2016 * Time: 17:25 */namespace MCBundle\Controller\Rest;use FOS\RestBundle\View\View as FOSView;use UserBundle\Entity\User;use MCBundle\Entity\Address;use MCBundle\Entity\Material;use MCBundle\Entity\TypeMaterial;use Symfony\Component\Validator\Constraints\DateTime;use Symfony\Bundle\FrameworkBundle\Controller\Controller;use FOS\RestBundle\Controller\Annotations\View;use FOS\RestBundle\Request\ParamFetcher;use Symfony\Component\Validator\ConstraintViolationList;use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;use FOS\RestBundle\Controller\Annotations\Get;use FOS\RestBundle\Controller\Annotations\Post;use FOS\RestBundle\Controller\Annotations\Put;use FOS\RestBundle\Controller\Annotations\Delete;use Nelmio\ApiDocBundle\Annotation\ApiDoc;use FOS\RestBundle\Controller\Annotations\RequestParam;class MCRestUserController extends Controller{    /**     * @Get("/users")     * @ApiDoc(     *   resource = true,     *   description = "Return the overall User List",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @return array     * @View()     */    public function getUsersAction()    {        $em = $this->getDoctrine()->getManager();        $users = $em->getRepository('UserBundle:User')->findAll();        if (!$users) {            throw $this->createNotFoundException('Data not found.');        }        return $users;    }    /**     * Get a User.     * @Get("/users/{id}")     * @ApiDoc(     *   resource = true,     *   description = "Return an user identified by ID",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     *     * @param $id     * @return array     * @View()     */    public function getUserAction($id)    {        $em = $this->getDoctrine()->getManager();        $film = $em->getRepository('UserBundle:User')->find($id);        $view = FOSView::create();        if ($film) {            $view->setData($film)->setStatusCode(200);        } else {            $view->setData($film)->setStatusCode(404);        }        return $view;    }    /**     * * Delete an user identified by ID.     * @ApiDoc(     *   resource = true,     *   description = "Delete an user identified by ID",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Delete("/users/delete/{id}")     * Removes a User.     * @param int $id the Session id     *     * @return View     */    public function deleteUserAction($id)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($id);        if (!$user) {            throw $this->createNotFoundException('Data not found.');        }        $em->remove($user);        $em->flush();        $result = $em->getRepository('UserBundle:User')->find($id);        $view = FOSView::create();        if (null == $result) {            $view->setData('User deleted')->setStatusCode(200);        } else {            $view->setData('User don\'t delete')->setStatusCode(404);        }        return $view;    }    /**     * Return an user identified by login/password.     * @Get("/users/check_session/username={username}&password={password}")     * @param $username     * @param $password     * @return View     */    public function checkSessionAction($username, $password)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->findOneByUsername($username);        if ($user) {            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);            if ($encoder->encodePassword($password, $user->getSalt()) === $user->getPassword()) {                return $user;            }        }        return array();    }    /**     * Return an user identified by login/password.     * @ApiDoc(     *   resource = true,     *   description = "Return an user identified by login/password",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Post("/users/check_connection")     *     * @param ParamFetcher $paramFetcher Paramfetcher     *     * @RequestParam(name="login", nullable=false, strict=true, description="login de l'utilisateur.")     * @RequestParam(name="password", nullable=false, strict=true, description="Mot de pass.")     * @return array     */    public function checkUserAction(ParamFetcher $paramFetcher)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->findOneByUsername($paramFetcher->get('login'));        $view = FOSView::create();        if ($user) {            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);            if ($encoder->encodePassword($paramFetcher->get('password'), $user->getSalt()) === $user->getPassword()) {                $view->setData($user)->setStatusCode(200);                return $user;            }        }        $view->setData($user)->setStatusCode(404);        return $user;    }    /**     * Return all Materials of User.     * @ApiDoc(     *   resource = true,     *   description = "Return all Materials of User",     *   statusCodes = {     *     200 = "Returned when successful",     *     404 = "Returned when the user is not found"     *   }     * )     * @Get("/users/materials/{idUser}")     * @param $idUser     * @return View     */    public function getAllUserMaterialsAction($idUser)    {        $em = $this->getDoctrine()->getManager();        $materials = $em->getRepository('MCBundle:Material')->findByUser($idUser);        $view = FOSView::create();        if ($materials) {            $view->setData($materials)->setStatusCode(200);        } else {            $view->setData($materials)->setStatusCode(404);        }        return $view;    }    /**     * Create a User from the submitted data.<br/>     *     * @ApiDoc(     *   resource = true,     *   description = "Creates a new user from the submitted data.",     *   statusCodes = {     *     200 = "Returned when successful",     *     400 = "Returned when the form has errors"     *   }     * )     *     * @param ParamFetcher $paramFetcher Paramfetcher     *     * @RequestParam(name="username", nullable=false, strict=true, description="Username.")     * @RequestParam(name="email", nullable=false, strict=true, description="Email.")     * @RequestParam(name="password", nullable=false, strict=true, description="Plain Password.")     * @RequestParam(name="birthday", nullable=false, strict=true, description="Birthday.")     * @RequestParam(name="idAddress", nullable=false, strict=true, description="ID de l'adresse.")     *     * @return View     */    public function postUserAction(ParamFetcher $paramFetcher)    {        $em = $this->getDoctrine()->getManager();        $user = new User();        $user->setUsername($paramFetcher->get('username'));        $user->setUsernameCanonical($paramFetcher->get('username'));        $user->setBirthday(new \DateTime($paramFetcher->get('birthday')));        $user->setEmail($paramFetcher->get('email'));        $user->setEmailCanonical($paramFetcher->get('email'));        $user->setEnabled(true);        $user->addRole('ROLE_ADMIN');        $salt = $user->getSalt();        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);        $user->setPassword($encoder->encodePassword($paramFetcher->get('password'), $salt));        if (!empty($paramFetcher->get('idAddress'))) {            $address = $em->getRepository('MCBundle:Address')->find((int)$paramFetcher->get('idAddress'));            $user->addAddress($address);        }        $em->persist($user);        $em->flush();        $user = $em->getRepository('UserBundle:User')->find($user->getId());        return $user;    }    /**     * @Get("/users/test-pwd/{id}")     * @return View     */    public function testPassAction($id)    {        $em = $this->getDoctrine()->getManager();//        $user = $em->getRepository('UserBundle:User')->find($id);//        if (!$user) {//            die("n'existe pas");//        }        $user = new User();        $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);        $pwd = $encoder->encodePassword("root", $user->getSalt());        $user->setPassword($pwd);        $user->setUsername('azerty');        $user->setUsernameCanonical('azerty');        $user->setBirthday(new \DateTime("1990-10-10"));        $user->setEmail('email@gamail.com');        $user->setEmailCanonical('email@gamail.com');        $user->setEnabled(true);        $address = $em->getRepository('MCBundle:Address')->find(1);        $user->addAddress($address);        dump($pwd);        dump($user);        $em->persist($user);        $em->flush();        $user = $em->getRepository('UserBundle:User')->find($user->getId());        dump($user);//        if ($user) {//            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);//            if ($encoder->encodePassword($password, $user->getSalt()) === $user->getPassword()) {//                return $user;//            }//        }        die;    }    /**     * Update a User from the submitted data by ID.<br/>     * @ApiDoc(     *   resource = true,     *   description = "Updates a user from the submitted data by ID.",     *   statusCodes = {     *     200 = "Returned when successful",     *     400 = "Returned when the form has errors"     *   }     * )     *     * @param ParamFetcher $paramFetcher Paramfetcher     *     * @RequestParam(name="id", nullable=false, strict=true, description="id.")     * @RequestParam(name="username", nullable=false, strict=true, description="Username.")     * @RequestParam(name="email", nullable=false, strict=true, description="Email.")     * @RequestParam(name="password", nullable=false, strict=true, description="Plain Password.")     * @RequestParam(name="birthday", nullable=false, strict=true, description="Birthday.")     * @RequestParam(name="idAddress", nullable=false, strict=true, description="ID de l'adresse.")     *     * @return View     */    public function putUserAction(ParamFetcher $paramFetcher)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($paramFetcher->get('id'));        if ($paramFetcher->get('username')) {            $user->setUsername($paramFetcher->get('username'));        }        if ($paramFetcher->get('email')) {            $user->setEmail($paramFetcher->get('email'));        }        if ($paramFetcher->get('password')) {            $encoder = $this->container->get('security.encoder_factory')->getEncoder($user);            $user->setPassword($encoder->encodePassword($paramFetcher->get('password'), $user->getSalt()));        }        if ($paramFetcher->get('birthday')) {            $user->setBirthday(new \DateTime($paramFetcher->get('birthday')));        }        if ($paramFetcher->get('idAddress')) {            if (!empty($paramFetcher->get('idAddress'))) {                $address = $em->getRepository('MCBundle:Address')->find((int)$paramFetcher->get('idAddress'));                $user->addAddress($address);            }        }        $view = FOSView::create();        $errors = $this->get('validator')->validate($user, array('Update'));        if (count($errors) == 0) {            $em->flush();            $view->setData($user)->setStatusCode(200);            return $view;        } else {            $view = $this->getErrorsView($errors);            return $view;        }    }    /**     * @ApiDoc(     *   resource = true,     *   description = "Updates a user from the submitted data by ID.",     *   statusCodes = {     *     200 = "Returned when successful",     *     400 = "Returned when the form has errors"     *   }     * )     * @Post("/users/add-address")     * @param ParamFetcher $paramFetcher Paramfetcher     *     * @RequestParam(name="idUser", nullable=false, strict=true, description="id de l'utilidateur")     * @RequestParam(name="title", nullable=false, strict=true, description="Address title.")     * @RequestParam(name="street", nullable=false, strict=true, description="Rue")     * @RequestParam(name="floor", nullable=false, strict=true, description="Etage")     * @RequestParam(name="frontDoor", nullable=false, strict=true, description="Porte d'entrée")     * @RequestParam(name="building", nullable=false, strict=true, description="Numéro du Batiment.")     * @RequestParam(name="address", nullable=false, strict=true, description="Adresse")     * @RequestParam(name="address2", nullable=false, strict=true, description="Autre information concernant l'adresse.")     * @RequestParam(name="phone", nullable=false, strict=true, description="Téléphone.")     * @RequestParam(name="town", nullable=false, strict=true, description="Ville.")     * @RequestParam(name="postCode", nullable=false, strict=true, description="Code postal.")     * @RequestParam(name="postCode", nullable=false, strict=true, description="Code postal.")     *     *     *     * @return View     */    public function postAddressUserAction(ParamFetcher $paramFetcher)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($paramFetcher->get('idUser'));        if (!$user) {            throw $this->createNotFoundException('User Data not found.');        }        $em = $this->getDoctrine()->getManager();        $address = new Address();        $address->setTitle($paramFetcher->get('title'));        $address->setStreet($paramFetcher->get('street'));        $address->setFloor($paramFetcher->get('floor'));        $address->setFrontDoor($paramFetcher->get('frontDoor'));        $address->setBuilding($paramFetcher->get('building'));        $address->setAddress($paramFetcher->get('address'));        $address->setAddress2($paramFetcher->get('address2'));        $address->setPhone($paramFetcher->get('phone'));        $address->setPostCode($paramFetcher->get('postCode'));        $address->setTown($paramFetcher->get('town'));        $em->persist($address);        $em->flush();        $address = $em->getRepository('MCBundle:Address')->find($address->getId());        $user->addAddress($address);        $em->flush();        return $address;    }    /**     * @Get("/users/{id}/add/address/{address}")     * @param $idUser     * @param $address     * @return string     */    function addUserAddressAction($idUser, $address)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($idUser);        if ($user) {            $address = json_decode($address);            if (json_last_error() === JSON_ERROR_NONE) {                $requiredFields = $this->requiredFieldsAddress($address);                if (!empty($requiredFields)) {                    return $requiredFields;                }                if (empty($address->id)) {                    $address = $this->addAddressAction(json_encode($address));                } else {                    $address = $em->getRepository('MCBundle:Address')->find((int)$address->id);                }                $user->addAddress($address);                $em->flush();                return $address;            }            return "Error: Json";        }        return "Error: ID User";    }    /**     * @param $address     * @return Address|object|string     */    function addAddressAction($address)    {        $oAddress = new Address();        $address = json_decode($address);        if (json_last_error() === JSON_ERROR_NONE) {            $requiredFields = $this->requiredFieldsAddress($address);            if (empty($requiredFields)) {                $em = $this->getDoctrine()->getManager();                $oAddress->setTitle($address->title);                $oAddress->setStreet($address->street);                $oAddress->setFloor($address->floor);                $oAddress->setFrontDoor($address->frontDoor);                $oAddress->setBuilding($address->building);                $oAddress->setAddress($address->address);                $oAddress->setAddress2($address->address2);                $oAddress->setPhone($address->phone);                $oAddress->setPostCode($address->postCode);                $oAddress->setOther($address->other);                $oAddress->setTown($address->town);                $em->persist($oAddress);                $em->flush();                $oAddress = $em->getRepository('MCBundle:Address')->find($oAddress->getId());                return $oAddress;            } else {                return $requiredFields;            }        }    }    /*     * @Get("/users/{idUser}/add/material/{materiel}")     * @param $idUser     * @param $material     * @return Material        public function addMaterialAction($idUser, $material)    {        $em = $this->getDoctrine()->getManager();        $user = $em->getRepository('UserBundle:User')->find($idUser);        if ($user) {            $dataMaterial = json_decode($material);                if (array_key_exists("description", $dataMaterial) && array_key_exists("typeMaterial", $dataMaterial)) {                $oMaterial = new Material();                $oMaterial->setDescription($dataMaterial->description);                $typeMaterial = $em->getRepository('MCBundle:TypeMaterial')->find($dataMaterial->typeMaterial);                $oMaterial->setTypeMaterial($typeMaterial);                $em->persist($oMaterial);                $em->flush();                $oMaterial = $em->getRepository('MCBundle:Material')->find($oMaterial->getId());                return $oMaterial;            }            return "Error: Json";        }        return "Error: ID User";    }    */    /**     * Get the validation errors     *     * @param ConstraintViolationList $errors Validator error list     *     * @return View     */    function getErrorsView(ConstraintViolationList $errors)    {        $msgs = array();        $errorIterator = $errors->getIterator();        foreach ($errorIterator as $validationError) {            $msg = $validationError->getMessage();            $params = $validationError->getMessageParameters();            $msgs[$validationError->getPropertyPath()][] = $this->get('translator')->trans($msg, $params, 'validators');        }        $view = FOSView::create($msgs);        $view->setStatusCode(400);        return $view;    }}