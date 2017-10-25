<?php

namespace UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use UserBundle\Entity\User;
use UserBundle\Service\MyUserManager;

class LoginController extends Controller
{
    use \UserBundle\Helper\ControllerHelper;

    /**
     * @Route("/Auth", name="user_login")
     * @Method("POST")
     */
    public function loginAction(Request $request)
    {
        //Метод авторизации пользователя
        $usernameOrEmail = $request->getUser();//Считывание переданных данных
        $password = $request->getPassword();

        /** @var MyUserManager */
        $userManager = $this->get('my_user_manager');

        $user = $userManager->findUserByUsernameOrEmail($usernameOrEmail);

        if (!$user) {
            throw $this->createNotFoundException();
        }

        $isValid = $this->get('security.password_encoder')
            ->isPasswordValid($user, $password);

        if (!$isValid) {
            throw new BadCredentialsException();
        }

        $id = $user->getId();
        $token = $user->getConfirmationToken();
        $status = $user->isEnabled();

        $response = new Response(json_encode(['id' => $id,'token' => $token,'status' => $status]), Response::HTTP_OK);


        return $this->setBaseHeaders($response);
    }

}
