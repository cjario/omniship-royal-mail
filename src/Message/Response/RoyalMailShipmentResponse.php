<?php

namespace Omniship\RoyalMail\Message\Response;

use Omniship\Common\Message\AbstractResponse;

class RoyalMailShipmentResponse extends AbstractResponse
{
    /**
     * Is the response successful?
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        if (!empty($this->data)) {
            return true;
        }
        return false;
    }

}
