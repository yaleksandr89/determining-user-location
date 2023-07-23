# Определение местоположения пользователя по IP

Для получения информации используется сервис [ipapi](https://ipapi.co/), ссылка на [документацию](https://ipapi.co/api/?php#introduction).

## Установка

`composer require yaleksandr89/determining-user-location`

## Использование

```php
$determiningUserLocation = new DeterminingUserLocation('8.8.8.8');

$userAllInfo = $determiningUserLocation->getAllInfoAboutUser();
//response:
[
  "ip" => "8.8.8.8"
  "network" => "8.8.8.0/24"
  "version" => "IPv4"
  "city" => "Mountain View"
  "region" => "California"
  "region_code" => "CA"
  "country" => "US"
  "country_name" => "United States"
  "country_code" => "US"
  "country_code_iso3" => "USA"
  "country_capital" => "Washington"
  "country_tld" => ".us"
  "continent_code" => "NA"
  "in_eu" => false
  "postal" => "94043"
  "latitude" => 37.42301
  "longitude" => -122.083352
  "timezone" => "America/Los_Angeles"
  "utc_offset" => "-0700"
  "country_calling_code" => "+1"
  "currency" => "USD"
  "currency_name" => "Dollar"
  "languages" => "en-US,es-US,haw,fr"
  "country_area" => 9629091.0
  "country_population" => 327167434
  "asn" => "AS15169"
  "org" => "GOOGLE"
]

$userSpecificFieldInfo = $determiningUserLocation->getSpecificFieldInfoAboutUser('ip');
//response
"8.8.8.8"
```
