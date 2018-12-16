<?php

namespace Omniship\RoyalMail\Message\Request;

use Omniship\RoyalMail\Message\Response\RoyalMailTokenResponse;
use Omniship\Common\Message\ResponseInterface;

class RoyalMailTokenRequest extends AbstractRequest
{


    protected $endpoint = '/shipping/v2/token';

    /**
     * @return array
     * @throws \Omniship\Common\Exception\InvalidRequestException
     */
    public function getData()
    {
        $this->validate('clientId', 'clientSecret');

        $data = [];

        return $data;
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->getParameter('username');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->getParameter('password');
    }

    /**
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        /**
         * Royal Mail /token request expects username/password in header
         * so set data field to null and send the data in headers
         */
        $response = $this->sendRequest(self::GET, $this->endpoint, null, $data);
        return $this->response = new RoyalMailTokenResponse($this, $response);
    }
}
