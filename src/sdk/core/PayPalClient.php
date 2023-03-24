<?php


namespace PayPalSdk\Core;

use PayPalSdk\Core\PayPalHttpClient;
use think\facade\Env;


ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');

class PayPalClient
{
    /**
     * Returns PayPal HTTP client instance with environment that has access
     * credentials context. Use this instance to invoke PayPal APIs, provided the
     * credentials have access.
     */
    public static function client()
    {
        return new PayPalHttpClient(self::environment());
    }

    /**
     * Set up and return PayPal PHP SDK environment with PayPal access credentials.
     * This sample uses SandboxEnvironment. In production, use LiveEnvironment.
     */
    public static function environment()
    {


        $clientId = Env::get('paypal.client_id');
        $clientSecret = Env::get('paypal.client_secret');

        return new SandboxEnvironment($clientId, $clientSecret);
        //return new ProductionEnvironment($clientId, $clientSecret);
    }
}