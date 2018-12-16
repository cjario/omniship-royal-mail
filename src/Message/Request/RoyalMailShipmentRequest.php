<?php

namespace Omniship\RoyalMail\Message\Request;

use Omniship\RoyalMail\Message\Response\RoyalMailShipmentResponse;
use Omniship\Common\Message\ResponseInterface;

class RoyalMailShipmentRequest extends AbstractRequest
{


    protected $endpoint = '/shipping/v2/shipments';

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
     * Send the request with specified data
     *
     * @param  mixed $data The data to send
     * @return ResponseInterface
     */
    public function sendData($data)
    {
        $response = $this->sendRequest(self::GET, $this->endpoint, null, null);
        return $this->response = new RoyalMailShipmentResponse($this, $response);
    }
}
