<?php

declare(strict_types = 1);

namespace Service\Order;


use Service\Billing\IBilling;
use Service\Communication\ICommunication;
use Service\Discount\IDiscount;
use Service\User\ISecurity;

interface IBuilder
{
    // public function checkoutProcess();
    public function setBilling(IBilling $billing): BasketBuilder;
    public function setDiscount(IDiscount $discount): BasketBuilder;
    public function setUser(ISecurity $security): BasketBuilder;
    public function setCommunication(ICommunication $communication): BasketBuilder;
    public function getBilling(): IBilling;
    public function getDiscount(): IDiscount;
    public function getUser(): ISecurity;
    public function getCommunication(): ICommunication;
    // public function getCheck(): CheckoutProcess;
}

