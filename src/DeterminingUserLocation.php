<?php

namespace Ya\DeterminingUserLocation;

use GuzzleHttp\Exception\GuzzleException;
use Ya\DeterminingUserLocation\Api\DeterminingUserLocationClient;
use Ya\DeterminingUserLocation\Model\UserInfoDTO;

class DeterminingUserLocation
{
    private DeterminingUserLocationClient $client;

    public function __construct(
        private readonly string $ip
    ) {
        $this->client = new DeterminingUserLocationClient();
    }

    /**
     * @throws GuzzleException
     */
    public function getAllInfoAboutUser(): UserInfoDTO
    {
        $data = $this->client
            ->requestAllInfo(ip: $this->ip);

        return new UserInfoDTO($data);
    }

    /**
     * @throws GuzzleException
     */
    public function getSpecificFieldInfoAboutUser(string $nameField): string
    {
        return $this->client
            ->requestSpecificFieldInfo(ip: $this->ip, nameField: $nameField);
    }
}
