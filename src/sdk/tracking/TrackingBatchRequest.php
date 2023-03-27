<?php

namespace PayPalSdk\tracking;

use PayPalHttp\HttpRequest;

class TrackingBatchRequest extends HttpRequest
{
    function __construct()
    {
        parent::__construct("/v1/shipping/trackers-batch", "POST");
        $this->headers["Content-Type"] = "application/json";
    }

}
