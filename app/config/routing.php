<?php

use Controller\MainController;
use Controller\order\OrderController;
use Controller\order\OrderControllerCheckout;
use Controller\product\ProductController;
use Controller\product\ProductControllerDescription;
use Controller\product\ProductControllerListAction;
use Controller\product\ProductControllerPostAction;
use Controller\user\UserController;
use Controller\user\UserControllerLogoutAction;
use Controller\user\UserControllerUsersList;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;

$routes = new RouteCollection();

$routes->add(
    'index',
    new Route('/', ['_controller' => [MainController::class, 'indexAction']])
);
$routes->add(
    'product_list',
    new Route('/product/list', ['_controller' => [ProductControllerListAction::class, 'listAction']])
);
$routes->add(
    'product_info',
    new Route('/product/info/{id}', ['_controller' => [ProductController::class, 'infoAction']])
);
$routes->add(
    'product_into_social_network',
    new Route('/product/social/{network}', ['_controller' => [ProductControllerPostAction::class, 'postAction']])
);

$routes->add(
    'order_info',
    new Route('/order/info', ['_controller' => [OrderController::class, 'infoAction']])
);
$routes->add(
    'order_checkout',
    new Route('/order/checkout', ['_controller' => [OrderControllerCheckout::class, 'checkoutAction']])
);

$routes->add(
    'user_authentication',
    new Route('/user/authentication', ['_controller' => [UserController::class, 'authenticationAction']])
);
$routes->add(
    'logout',
    new Route('/user/logout', ['_controller' => [UserControllerLogoutAction::class, 'logoutAction']])
);
$routes->add(
    'description',
    new Route('/product/description', ['_controller' => [ProductControllerDescription::class, 'productDescription']])
);
$routes->add(
    'users_list',
    new Route('/user/list', ['_controller' => [UserControllerUsersList::class, 'usersList']])
);
$routes->add(
    'account',
    new Route('/user/account', ['_controller' => [UserControllerLogoutAction::class, 'account']])
);

return $routes;
