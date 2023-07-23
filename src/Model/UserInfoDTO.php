<?php

namespace Ya\DeterminingUserLocation\Model;

class UserInfoDTO
{
    public string $ip;

    public string $network;

    public string $version;

    public string $city;

    public string $region;

    public string $region_code;

    public string $country;

    public string $country_name;

    public string $country_code;

    public string $country_code_iso3;

    public string $country_capital;

    public string $country_tld;

    public string $continent_code;

    public string $in_eu;

    public string $postal;

    public string $latitude;

    public string $longitude;

    public string $timezone;

    public string $utc_offset;

    public string $country_calling_code;

    public string $currency;

    public string $currency_name;

    public string $languages;

    public string $country_area;

    public string $country_population;

    public string $asn;

    public string $org;

    private string $jsonData;

    public function __construct(string $jsonData)
    {
        $this->jsonData = $jsonData;
        $data = json_decode($jsonData, true);

        $this->ip = $data['ip'] ?? '';
        $this->network = $data['network'] ?? '';
        $this->version = $data['version'] ?? '';
        $this->city = $data['city'] ?? '';
        $this->region = $data['region'] ?? '';
        $this->region_code = $data['region_code'] ?? '';
        $this->country = $data['country'] ?? '';
        $this->country_name = $data['country_name'] ?? '';
        $this->country_code = $data['country_code'] ?? '';
        $this->country_code_iso3 = $data['country_code_iso3'] ?? '';
        $this->country_capital = $data['country_capital'] ?? '';
        $this->country_tld = $data['country_tld'] ?? '';
        $this->continent_code = $data['continent_code'] ?? '';
        $this->in_eu = $data['in_eu'] ?? '';
        $this->postal = $data['postal'] ?? '';
        $this->latitude = $data['latitude'] ?? '';
        $this->longitude = $data['longitude'] ?? '';
        $this->timezone = $data['timezone'] ?? '';
        $this->utc_offset = $data['utc_offset'] ?? '';
        $this->country_calling_code = $data['country_calling_code'] ?? '';
        $this->currency = $data['currency'] ?? '';
        $this->currency_name = $data['currency_name'] ?? '';
        $this->languages = $data['languages'] ?? '';
        $this->country_area = $data['country_area'] ?? '';
        $this->country_population = $data['country_population'] ?? '';
        $this->asn = $data['asn'] ?? '';
        $this->org = $data['org'] ?? '';
    }

    public function getAllData(bool $toArray = false): string|array
    {
        if ($toArray) {
            return json_decode($this->jsonData, true);
        }

        return $this->jsonData;
    }
}
