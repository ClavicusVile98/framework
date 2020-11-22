<?php


namespace Service\Order;


use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;

class Facade
{
    private $_discount;
    private $_billing;
    private $_security;
    private $_communication;

    public function basketFacade(array $productList): void
    {
        $checkoutProcess = new CheckoutProcess();
        $checkoutProcess->checkoutProcess($productList, $this->_discount, $this->_billing, $this->_security, $this->_communication);
    }

    public function checkoutFacade(
        IDiscount $discount,
        IBilling $billing,
        ISecurity $security,
        ICommunication $communication
    ): void
    {
        $this->_discount = $discount;
        $this->_billing = $billing;
        $this->_security = $security;
        $this->_communication = $communication;
    }
}