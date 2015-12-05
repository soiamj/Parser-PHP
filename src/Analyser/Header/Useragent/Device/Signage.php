<?php

namespace WhichBrowser\Analyser\Header\Useragent\Device;

use WhichBrowser\Constants;

trait Signage
{
    private function detectSignage($ua)
    {
        /* BrightSign */

        if (preg_match('/BrightSign\/[0-9\.]+(?:-[a-z0-9\-]+)? \(([^\)]+)/u', $ua, $match)) {
            $this->data->os->reset();
            $this->data->device->setIdentification([
                'manufacturer'  =>  'BrightSign',
                'model'         =>  $match[1],
                'type'          =>  Constants\DeviceType::SIGNAGE
            ]);
        }


        /* Iadea */

        if (preg_match('/ADAPI/u', $ua) && preg_match('/\(MODEL:([^\)]+)\)/u', $ua, $match)) {
            $this->data->os->reset();
            $this->data->device->setIdentification([
                'manufacturer'  =>  'Iadea',
                'model'         =>  $match[1],
                'type'          =>  Constants\DeviceType::SIGNAGE
            ]);
        }
    }
}
