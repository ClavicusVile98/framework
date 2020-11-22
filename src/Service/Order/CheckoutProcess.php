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
    /**
     * Проведение всех этапов заказа
     *
     * @param array $productList
     * @param IDiscount $discount
     * @param IBilling $billing
     * @param ISecurity $security
     * @param ICommunication $communication
     * @return void
     * @throws BillingException
     * @throws CommunicationException
     */
    public function checkoutProcess(
        array $productList,
        IDiscount $discount,
        IBilling $billing,
        ISecurity $security,
        ICommunication $communication
    ): void
    {
        $totalPrice = 0;
        foreach ($productList as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $billing->pay($totalPrice);

        $user = $security->getUser();
        $communication->process($user, 'checkout_template');
    }
}