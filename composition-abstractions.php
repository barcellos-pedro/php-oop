<?php

// Object Composition and Abstractions

interface Gateway
{
    public function findCustomer();
    public function findSubscriptionByCustomer();
}

class StripeGateway implements Gateway
{
    public function findCustomer() {}
    public function findSubscriptionByCustomer() {}
}

class BraintreeGateway implements Gateway
{
    public function findCustomer() {}
    public function findSubscriptionByCustomer() {}
}


class Subscription
{
    protected Gateway $gateway;

    public function __construct(Gateway $gateway)
    {
        $this->gateway = $gateway;
    }

    public function create() {}

    public function invoice() {}

    public function cancel()
    {
        $customer = $this->gateway->findCustomer();

        $subscription = $this->gateway->findSubscriptionByCustomer();
    }
}

$gateway = new StripeGateway(); //new BraintreeGateway();

$sub = new Subscription($gateway);
$sub->cancel();
