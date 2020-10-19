<?php

declare(strict_types = 1);

namespace Controller;

use Framework\Render;
use Service\User\Security;
use Service\User\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    use Render;

    /**
     * Производим аутентификацию и авторизацию
     *
     * @param Request $request
     * @return Response
     */
    public function authenticationAction(Request $request): Response
    {
        if ($request->isMethod(Request::METHOD_POST)) {
            $user = new Security($request->getSession());

            $isAuthenticationSuccess = $user->authentication(
                $request->request->get('login'),
                $request->request->get('password')
            );

            if ($isAuthenticationSuccess) {
                return $this->render('user/authentication_success.html.php', ['user' => $user->getUser()]);
            } else {
                $error = 'Неправильный логин и/или пароль';
            }
        }

        return $this->render('user/authentication.html.php', ['error' => $error ?? '']);
    }

    /** Вывод всех пользователей для админов
     *
     * @param Request $request
     *
     * @return Response
     */
    public function users_list(Request $request): Response
    {
        $role = (new Security($request->getSession()))->roleType();
        if ($role) {
            $user = (new User())->getAll();
            return $this->render('user/users_list.html.php', ['user' => $user]);
        } else {
            $error = 'Нет доступа';
        }
        return $this->render('user/users_list.html.php', ['error' => $error]);
        /*return $this->redirect('index');*/
    }

    /**
     * Выходим из системы
     *
     * @param Request $request
     * @return Response
     */
    public function logoutAction(Request $request): Response
    {
        (new Security($request->getSession()))->logout();

        return $this->redirect('index');
    }
}
