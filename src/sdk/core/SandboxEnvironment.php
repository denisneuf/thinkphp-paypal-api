<?php

namespace PayPalSdk\Core;

use PayPalHttp\Environment;

class SandboxEnvironment extends PayPalEnvironment implements Environment
{
    public function __construct($clientId, $clientSecret)
    {
        parent::__construct($clientId, $clientSecret);
    }

    public function baseUrl()
    {
        return "https://api.sandbox.paypal.com";
    }
}
