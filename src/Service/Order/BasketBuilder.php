<?php


namespace Service\Order;


use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;

class BasketBuilder implements IBuilder
{
    private $discount;
    private $billing;
    private $security;
    private $communication;

    public function setBilling(IBilling $billing): BasketBuilder
    {
        $this->billing = $billing;
        return $this;
    }

    public function setDiscount(IDiscount $discount): BasketBuilder
    {
        $this->discount = $discount;
        return $this;
    }

    public function setUser(ISecurity $security): BasketBuilder
    {
        $this->security = $security;
        return $this;
    }

    public function setCommunication(ICommunication $communication): BasketBuilder
    {
        $this->communication = $communication;
        return $this;
    }

    public function getBilling(): IBilling
    {
        return $this->billing;
    }

    public function getDiscount(): IDiscount
    {
        return $this->discount;
    }

    public function getUser(): ISecurity
    {
        return $this->security;
    }

    public function getCommunication(): ICommunication
    {
        return $this->communication;
    }

    public function build(): CheckoutProcess
    {
        return new CheckoutProcess($this);
    }
}