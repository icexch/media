<?php namespace App\Services\Gateways;

use GuzzleHttp\Client;

abstract class ApiGateway
{
    protected $baseUri = '';

    const AVAILABLE_HTTP_METHODS = [
        'POST',
        'GET'
    ];

    protected $requestMethod = 'GET';

    /** @var Client $client */
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => $this->baseUri
        ]);
    }

    public function request(string $method, array $params, int $maxRequests = 3): array
    {
        switch ($this->requestMethod) {
            case 'GET' :
                $params = $this->transformQueryParams($params);
                break;
        }

        try {
            $response = $this->client->request($this->requestMethod, $method, $params);
        } catch (\Exception $e) {
            $maxRequests--;

            if (!$maxRequests) {
                throw new \RuntimeException('API ' . $this->baseUri . ' is not available');
            }

            return $this->request($method, $params, $maxRequests);
        };

        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $requestMethod
     *
     * @throws \HttpRequestMethodException
     */
    protected function setRequestMethod(string $requestMethod): void
    {
        if (!in_array($requestMethod, self::AVAILABLE_HTTP_METHODS)) {
            throw new \HttpRequestMethodException("Method {$requestMethod} unsuported");
        }

        $this->requestMethod = $requestMethod;
    }

    /**
     * @param array $params
     *
     * @return array
     */
    protected function transformQueryParams(array $params): array
    {
        return [
            'query' => $params
        ];
    }
}
