<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\JsonResponse;
use OpenApi\Annotations as OA;

##========================================================================##
#                   Return success response to client                      #
##========================================================================##

/**
 * @OA\Schema(
 *     @OA\Property(property="message", type="string", example="success"),
 *     @OA\Property(property="data", type="array", example={}, @OA\Items())
 * )
 */
class SuccessResponse extends JsonResponse
{
    public function __construct(
        $message = null,
        $data = null,
        $status = 200,
        $headers = [],
        $options = 0,
        $json = false
    )
    {
        $data = (isset($data['data']) || is_a($data, LengthAwarePaginator::class))
            ? $data
            : ['message' => $message, 'data' => $data];
        parent::__construct(
            $data,
            $status,
            $headers,
            $options,
            $json
        );
    }
}
