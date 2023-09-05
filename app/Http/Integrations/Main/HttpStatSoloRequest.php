<?php

namespace App\Http\Integrations\Main;

use Saloon\Contracts\Response;
use Saloon\Enums\Method;
use Saloon\Http\SoloRequest;
use Saloon\Traits\Plugins\AlwaysThrowOnErrors;

class HttpStatSoloRequest extends SoloRequest
{
    protected Method $method = Method::GET;
    public function resolveEndpoint(): string
    {
        return 'http://10.255.255.1';
    }

}
