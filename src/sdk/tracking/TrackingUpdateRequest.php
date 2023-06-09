<?php

namespace PayPalSdk\tracking;

use PayPalHttp\HttpRequest;

class TrackingUpdateRequest extends HttpRequest
{
    function __construct($captureId)
    {
        parent::__construct("/v1/shipping/trackers/{captureId}", "PUT");
        $this->path = str_replace("{captureId}", urlencode($captureId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }


}
