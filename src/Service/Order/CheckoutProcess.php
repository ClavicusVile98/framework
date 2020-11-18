<?php


namespace Service\Order;


use Service\Billing\Exception\BillingException;
use Service\Billing\IBilling;
use Service\Communication\Exception\CommunicationException;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;

class CheckoutProcess
{
    private $_discount;
    private $_billing;
    private $_communication;
    private $_security;

    public function __construct(BasketBuilder $basketBuilder)
    {
        $this->_security = $basketBuilder->getUser();
        $this->_billing = $basketBuilder->getBilling();
        $this->_discount = $basketBuilder->getDiscount();
        $this->_communication = $basketBuilder->getCommunication();
    }

    /**
     * Проведение всех этапов заказа
     *
     * @param array $productsInfo
     *
     * @return array
     *
     * @throws BillingException|CommunicationException
     */
    public function checkoutProcess(array $productsInfo): array
    {
        $totalPrice = 0;
        foreach ($productsInfo as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->_discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $billing = $this->_billing;
        $billing->pay($totalPrice);

        $user = $this->_security->getUser();
        $communication = $this->_communication;
        $communication->process($user, 'checkout_template');
    }
}