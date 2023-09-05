<?php

namespace App\Http\Integrations\Main\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

class HttpBinGetRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/status/500';
    }
}
