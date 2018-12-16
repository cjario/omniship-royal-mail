<?php

namespace Omniship\RoyalMail\Message\Response;

use Omniship\Common\Message\AbstractResponse;

class RoyalMailTokenResponse extends AbstractResponse
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

    /**
     * Returns the generated JWT
     *
     * @return bool | string
     */
    public function getToken()
    {
        if (!$this->isSuccessful()) {
            return false;
        }

        return $this->data['token'];
    }

}
