<?php

declare(strict_types = 1);

namespace Controller\order;


use Framework\Render;
use Service\Order\Checkout;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class OrderControllerCheckout
{
    use Render;

    /**
     * Оформление заказа
     *
     * @param Request $request
     * @return Response
     */
    public function checkoutAction(Request $request): Response
    {
        $isLogged = (new Security($request->getSession()))->isLogged();
        if (!$isLogged) {
            return $this->redirect('user_authentication');
        }

        (new Checkout())->checkout();

        return $this->render('order/checkout.html.php');
    }
}