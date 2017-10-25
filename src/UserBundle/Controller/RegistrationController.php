<?php

namespace UserBundle\Controller;

use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\FOSUserEvents;
use Symfony\Component\Form\FormInterface;

class RegistrationController extends BaseController
{
    use \UserBundle\Helper\ControllerHelper;

    /**
     * @Route("/Registration", name="user_register")
     * @Method("POST")
     */
    public function registerAction(Request $request)
    {
        //Метод регистрации пользователей
        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $accessKey = 'rNkJGSL1sg@Jbz@iFWV8|4fB5lP{n#Z%HGGQtQOb';//токен доступа

        $user = $userManager->createUser();//создание юзера
        $user->generateToken();//генерация токена
        $user->setEnabled(true);


        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm(array('csrf_protection' => false));//создание формы

        $form->setData($user);
        $this->processForm($request, $form);

        if ($form->isValid()) {
            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);
            $keyToken=$user->getKey();
            if ($keyToken != $accessKey){
                $response = new Response(json_encode(['Error' => "Invalide access token:$keyToken"]), Response::HTTP_CREATED);
                return $this->setBaseHeaders($response);
            }//Проверка токена доступа
            $userManager->updateUser($user);

            $rest = $this->getDoctrine()->getRepository('UserBundle:User')
                ->findOneBy(
                    array('enabled' => '1'),
                    array('id' => 'DESC')
                );//Получение значения из базы
            $key = $rest->getId();//Формирование ответов
            $token = $rest->getConfirmationToken();

            $response = new Response(json_encode(['key' => $key,'token' => $token]), Response::HTTP_CREATED);
        } else {
            throw $this->throwApiProblemValidationException($form);
        }

        return $this->setBaseHeaders($response);
    }

    /**
     * @param Request $request
     * @param FormInterface $form
     */
    private function processForm(Request $request, FormInterface $form)
    {
        $data = $request->request->all();
        if ($data === null) {
            throw new BadRequestHttpException();
        }
        $form->submit($data);
    }

    /**
     * Returns response in case of invalid request.
     *
     * @param FormInterface $form
     *
     * @return ApiProblemException
     * @todo Make custom response for invalid request
     */
    private function throwApiProblemValidationException(FormInterface $form)
    {
        $errors = $this->getErrorsFromForm($form);

        throw new BadRequestHttpException($this->serialize($errors));
    }

    /**
     * Returns form errors.
     *
     * @param FormInterface $form
     *
     * @return array
     */
    private function getErrorsFromForm(FormInterface $form)
    {
        $errors = [];

        foreach ($form->getErrors() as $key => $error) {
            $template = $error->getMessageTemplate();
            $parameters = $error->getMessageParameters();

            foreach ($parameters as $var => $value) {
                $template = str_replace($var, $value, $template);
            }
            $errors[$key] = $template;
        }

        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }

        return $errors;
    }
}
