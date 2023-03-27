<?php

namespace PayPalSdk\disputes;

use PayPalHttp\HttpRequest;

class DisputesAcceptClaimRequest extends HttpRequest
{
    function __construct($disputeId)
    {
        parent::__construct("/v1/customer/disputes/{dispute_id}/accept-claim", "POST");
        $this->path = str_replace("{dispute_id}", urlencode($disputeId), $this->path);
        $this->headers["Content-Type"] = "application/json";
    }
}
