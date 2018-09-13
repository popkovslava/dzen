<?php

namespace App\Services\GeoIp;

interface GeoIpServiceInterface
{
    public function getCountryByIp($ip);
}
