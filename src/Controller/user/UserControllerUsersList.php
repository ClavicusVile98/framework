<?php

declare(strict_types = 1);

namespace Controller\user;


use Framework\Render;
use Service\User\Security;
use Service\User\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserControllerUsersList
{
    use Render;

    /** Вывод всех пользователей для админов
     *
     * @param Request $request
     *
     * @return Response
     */
    public function usersList(Request $request): Response
    {
        $role = (new Security($request->getSession()))->isAdminRole();
        if ($role) {
            $user = (new User())->getAll();
            return $this->render('user/users_list.html.php', ['usersList' => $user]);
        } else {
            $error = 'Нет доступа';
        }
        return $this->render('user/users_list.html.php', ['error' => $error]);
    }
}