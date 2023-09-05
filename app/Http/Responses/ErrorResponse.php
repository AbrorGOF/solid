<?php

namespace App\Http\Responses;

use Illuminate\Http\JsonResponse;
use Exception;
use OpenApi\Annotations as OA;

##========================================================================##
#                   Return error response to client                        #
##========================================================================##

/**
 * @OA\Schema(
 *     @OA\Property(property="message", type="string", example="error message"),
 *     @OA\Property(property="errors", type="array", example={}, @OA\Items())
 * )
 */
class ErrorResponse extends JsonResponse
{
    public function __construct(
        $message = null,
        $data = null,
        $status = 400,
        $headers = [],
        $options = 0,
        $json = false
    )
    {
        parent::__construct([
            'message' => (is_a($message, Exception::class))
                ? $message->getMessage()
                : $message,
            'errors' => $data
        ], $status, $headers, $options, $json);
    }
}
