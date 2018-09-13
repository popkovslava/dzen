<?php
namespace App\Services\GeoIp;

use App\Services\GeoIp\geoip\SxGeo;

class GeoIpService implements GeoIpServiceInterface
{
    public function getCountryByIp($ip)
    {
        $SxGeo = new SxGeo(__DIR__ .'/geoip/SxGeo.dat');
        return $SxGeo->get($ip);
    }
}
