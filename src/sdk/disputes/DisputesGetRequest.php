<?php

namespace PayPalSdk\disputes;

use PayPalHttp\HttpRequest;

class DisputesGetRequest extends HttpRequest
{
    function __construct()
    {
    	parent::__construct("/v1/customer/disputes", "GET");
    	$this->headers["Content-Type"] = "application/json";
    }

}
