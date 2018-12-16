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
     * @param  string $value
     * @return $this
     */
    public function setShipmentType($value)
    {
        return $this->setParameter('shipmentType', $value);
    }

    /**
     * @return string
     */
    public function getShipmentType()
    {
        return $this->getParameter('shipmentType');
    }

    /**
     * @param  array $value
     * @return $this
     */
    public function setService($value)
    {
        return $this->setParameter('service', $value);
    }

    /**
     * @return string
     */
    public function getService()
    {
        return $this->getParameter('service');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setShippingDate($value)
    {
        return $this->setParameter('shippingDate', $value);
    }

    /**
     * @return string
     */
    public function getShippingDate()
    {
        return $this->getParameter('shippingDate');
    }

    /**
     * @param  array $value
     * @return $this
     */
    public function setItems($value)
    {
        return $this->setParameter('items', $value);
    }

    /**
     * @return string
     */
    public function getItems()
    {
        return $this->getParameter('items');
    }


    /**
     * @param  array $value
     * @return $this
     */
    public function setRecipientContact($value)
    {
        return $this->setParameter('recipientContact', $value);
    }

    /**
     * @return string
     */
    public function getRecipientContact()
    {
        return $this->getParameter('recipientContact');
    }

    /**
     * @param  array $value
     * @return $this
     */
    public function setRecipientAddress($value)
    {
        return $this->setParameter('recipientAddress', $value);
    }

    /**
     * @return string
     */
    public function getRecipientAddress()
    {
        return $this->getParameter('recipientAddress');
    }

    /**
     * @param  string $value
     * @return $this
     */
    public function setSenderReference($value)
    {
        return $this->setParameter('senderReference', $value);
    }

    /**
     * @return string
     */
    public function getSenderReference()
    {
        return $this->getParameter('senderReference');
    }

    /**
     * @param  array $value
     * @return $this
     */
    public function setInternationalInfo($value)
    {
        return $this->setParameter('internationalInfo', $value);
    }

    /**
     * @return array
     */
    public function getInternationalInfo()
    {
        return $this->getParameter('internationalInfo');
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
