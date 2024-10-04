<?php

// Handshakes and Interfaces

interface Newsletter
{
    public function subscribe($email);
}

class CampaignMonitor implements Newsletter
{
    public function subscribe($email)
    {
        var_dump('Subscribing with Campaign Monitor');
    }
}

class Drip implements Newsletter
{
    public function subscribe($email)
    {
        var_dump('Subscribing with Drip');
    }
}

class NewsletterSubscriptionsController
{
    public function store(Newsletter $newsletter)
    {
        $email = 'pedro@gmail.com';
        $newsletter->subscribe($email);
    }
}

$controller = new NewsletterSubscriptionsController();

$controller->store(new Drip());
$controller->store(new CampaignMonitor());
