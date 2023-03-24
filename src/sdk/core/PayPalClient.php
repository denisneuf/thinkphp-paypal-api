<?php


namespace PayPalSdk\Core;

use PayPalSdk\Core\PayPalHttpClient;
use think\facade\Env;


ini_set('error_reporting', E_ALL); // or error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');



class PayPalClient
{

    private function __construct($id = null, $secret = null)
    {
        $this->clientId = Env::get('paypal.client_id');
        $this->clientSecret = Env::get('paypal.client_secret');
    }

    public static function get_environment($clientId, $clientSecret, $env)
    {

        switch ($env) {
            case "SANDBOX":
                return new SandboxEnvironment($clientId, $clientSecret);
                break;
            case "PRODUCTION":
                return new ProductionEnvironment($clientId, $clientSecret);
                break;
            default:
                return new SandboxEnvironment($clientId, $clientSecret);
        }

    }


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
        $clientEnvironment = Env::get('paypal.client_environment');

        return self::get_environment($clientId, $clientSecret, $clientEnvironment);

        //return new SandboxEnvironment($clientId, $clientSecret);
        //return new ProductionEnvironment($clientId, $clientSecret);
    }
}