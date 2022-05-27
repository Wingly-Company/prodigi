<?php

namespace Wingly\Prodigi;

use GuzzleHttp\Client;

class Prodigi
{
    protected string $apiKey;

    protected string $apiUrl;

    public function __construct(protected Client $client)
    {
    }

    /**
     * Set the api key.
     */
    public function setApiKey(string $apiKey): self
    {
        $this->apiKey = $apiKey;

        return $this;
    }

    /**
     * Set the api url.
     */
    public function setApiUrl(string $apiEnv): self
    {
        if ($apiEnv === 'production') {
            $this->apiUrl = 'https://api.prodigi.com/v4.0';
        } else {
            $this->apiUrl = 'https://api.sandbox.prodigi.com/v4.0';
        }

        return $this;
    }

    /**
     * Create a new order.
     */
    public function createOrder($data): array
    {
        $payload = $this->getRequestPayload($data);

        $response = $this->client->request('POST', $this->apiUrl.'/Orders', $payload);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['order'];
    }

    /**
     * Get an order by id.
     */
    public function getOrder(string $orderId): array
    {
        $payload = $this->getRequestPayload();

        $response = $this->client->request('GET', $this->apiUrl."/Orders/{$orderId}", $payload);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['order'];
    }

    /**
     * Get the available actions for an order.
     */
    public function getAvailableActions(string $orderId): array
    {
        $payload = $this->getRequestPayload();

        $response = $this->client->request('GET', $this->apiUrl."/Orders/{$orderId}/actions", $payload);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data;
    }

    /**
     * Cancel the given order.
     */
    public function cancelOrder(string $orderId): array
    {
        $payload = $this->getRequestPayload();

        $response = $this->client->request('POST', $this->apiUrl."/Orders/{$orderId}/actions/cancel", $payload);

        $data = json_decode($response->getBody()->getContents(), true);

        return $data['order'];
    }

    /**
     * Get the request payload params.
     */
    protected function getRequestPayload(array $params = null): array
    {
        $payload = [
            'headers' => [
                'X-API-Key' => $this->apiKey,
                'Content-type' => 'application/json',
            ],
        ];

        if ($params) {
            $payload['json'] = $params;
        }

        return $payload;
    }
}
