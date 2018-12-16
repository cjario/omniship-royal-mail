<?php

namespace Omniship\RoyalMail;

use Omniship\Common\AbstractCarrier;
use Omniship\Common\Helper;
use Symfony\Component\HttpFoundation\ParameterBag;

/**
 * RoyalMail Carrier provides a wrapper for Royal Mail Rest API.
 * Please have a look at links below to have a high-level overview and see the API specification
 *
 * @see https://developer.royalmail.net/start
 *
 */
class Carrier extends AbstractCarrier
{

    public function getName()
    {
        return 'Royal Mail';
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->getParameter('clientId');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setClientId($value)
    {
        return $this->setParameter('clientId', $value);
    }

    /**
     * @return string
     */
    public function getClientSecret()
    {
        return $this->getParameter('clientSecret');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setClientSecret($value)
    {
        return $this->setParameter('clientSecret', $value);
    }

    /**
     * Initialize this carrier with default parameters
     *
     * @param  array $parameters
     * @return $this
     */
    public function initialize(array $parameters = array())
    {
        $this->parameters = new ParameterBag;

        foreach ($this->getDefaultParameters() as $key => $value) {
            if (is_array($value)) {
                $this->parameters->set($key, reset($value));
            } else {
                $this->parameters->set($key, $value);
            }
        }

        Helper::initialize($this, $parameters);

        return $this;
    }

    public function getDefaultParameters()
    {
        $settings = parent::getDefaultParameters();
        array_merge($settings, ['clientId', 'clientSecret', 'authToken']);
        return $settings;
    }

    public function token(array $parameters = [])
    {
        return $this->createRequest('\Omniship\RoyalMail\Message\Request\RoyalMailTokenRequest', $parameters);
    }

    public function shipment(array $parameters = [])
    {
        return $this->createRequest('\Omniship\RoyalMail\Message\Request\RoyalMailShipmentRequest', $parameters);
    }
}
