<?php

namespace Omniship\RoyalMail\Message\Request;

abstract class AbstractRequest extends \Omniship\Common\Message\AbstractRequest
{
    const POST = 'POST';
    const GET = 'GET';

    /**
     * @var string
     */
    protected $apiVersion = "";

    /**
     * @var string
     */
    protected $baseUrl = 'https://api.royalmail.net';

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
     * @return string
     */
    public function getAuthToken()
    {
        return $this->getParameter('authToken');
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setAuthToken($value)
    {
        return $this->setParameter('authToken', $value);
    }

    /**
     * @param string $method
     * @param string $endpoint
     * @param array  $data
     * @param array  $headers
     * @return array
     */
    protected function sendRequest($method, $endpoint, array $data = null, array $headers = [])
    {

        $response = $this->httpClient->request(
            $method,
            $this->baseUrl . $this->apiVersion . $endpoint,
            array_merge([
                'X-IBM-Client-Id' => $this->getClientId(),
                'X-IBM-Client-Secret' => $this->getClientSecret(),
                'X-RMG-Auth-Token' => $this->getAuthToken(),

            ], $headers),
            empty($data) ? null : json_encode($data)
        );

        return json_decode($response->getBody(), true);
    }
}
