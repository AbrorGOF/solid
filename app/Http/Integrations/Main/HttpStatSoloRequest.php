<?php

namespace App\Http\Integrations\Main;

use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;

class HttpStatSoloRequest extends SoloRequest
{
    protected Method $method = Method::GET;
    public function resolveEndpoint(): string
    {
        return 'http://10.255.255.1';
    }

}
