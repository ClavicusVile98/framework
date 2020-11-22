<?php


namespace Service\Order;


use Service\Billing\Card;
use Service\Communication\Email;
use Service\Discount\NullObject;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Checkout
{
    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * Оформление заказа
     *
     * @return array
     */
    public function checkout(): array
    {
        // Здесь должна быть некоторая логика выбора способа платежа
        $billing = new Card();

        // Здесь должна быть некоторая логика получения информации о скидки пользователя
        $discount = new NullObject();

        // Здесь должна быть некоторая логика получения способа уведомления пользователя о покупке
        $communication = new Email();

        $security = new Security($this->session);

        $facade = new Facade();
        $facade->checkoutFacade($discount, $billing, $security, $communication);
    }
}