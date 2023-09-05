<?php

namespace App\Http\Integrations\Main;

use Saloon\Http\Connector;

class HttpBinConnector extends Connector
{

    public function resolveBaseUrl(): string
    {
        return 'https://httpbin.org';
    }
}
