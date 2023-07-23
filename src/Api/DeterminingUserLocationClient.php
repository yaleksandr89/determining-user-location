<?php

namespace Ya\DeterminingUserLocation\Api;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Psr7\Response;
use RuntimeException;

class DeterminingUserLocationClient
{
    private const API_HOST = 'https://ipapi.co/';

    private GuzzleClient $httpClient;

    public function __construct()
    {
        $this->httpClient = new GuzzleClient();
    }

    /**
     * @throws GuzzleException
     */
    public function requestAllInfo(string $ip): string
    {
        // TODO: добавить обработку остальных форматов. Форматы, которые может вернуть сервис: "xml, csv, yaml and jsonp"
        $response = $this->httpClient
            ->request(
                'GET',
                self::API_HOST . trim($ip) . '/json',
                [
                    'http_errors' => false,
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'
                    ]
                ]
            );

        $this->checkResponseClient($response);

        return $response
            ->getBody()
            ->getContents();
    }

    /**
     * @throws GuzzleException
     */
    public function requestSpecificFieldInfo(string $ip, string $nameField): string
    {
        $response = $this->httpClient
            ->request(
                'GET',
                self::API_HOST . trim($ip) . '/' . trim($nameField),
                [
                    'http_errors' => false,
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.63 Safari/537.36'
                    ]
                ]
            );

        $this->checkResponseClient($response);

        return $response
            ->getBody()
            ->getContents();
    }

    private function checkResponseClient(Response $response): void
    {
        if (200 !== $response->getStatusCode()) {
            throw new RuntimeException(
                "Client response code: '{$response->getStatusCode()}' " .
                "Error info: '{$response->getReasonPhrase()}'"
            );
        }
    }
}
