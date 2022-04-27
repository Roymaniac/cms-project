<?php
namespace App\Helpers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ApiResponse
{
    /** Return error api response */
    static function errorResponse(string $message = null, int $status_code, Exception $trace = null)
    {
        $code = !empty($status_code) ? $status_code : null;
        $traceMsg = empty($trace) ?  null  : $trace->getMessage();

        $body = [
            'success' => false,
            'message' => $message,
            'code' => $code,
            'error_debug' => $traceMsg,
        ];

        !empty($trace) ? logger($trace->getMessage(), $trace->getTrace()) : null;
        return response()->json($body)->setStatusCode($code);
    }


    /** Return error api response */
    static function inputErrorResponse(string $message = null, ValidationException $trace = null)
    {
        $code = ApiConstants::BAD_REQ_ERR_CODE;
        $body = [
            'success' => false,
            'message' => $message,
            'code' => $code,
            'errors' => empty($trace) ?  null  : $trace->errors(),
        ];

        return response()->json($body)->setStatusCode($code);
    }

    /** Return valid api response */
    static function validResponse(string $message = null, $data = null , $status_code = 200)
    {
        if (is_null($data) || empty($data)) {
            $data = null;
        }
        $body = [
            'message' => $message,
            'data' => $data,
            'success' => true,
            'code' => $status_code,
        ];
        return response()->json($body)->setStatusCode($status_code);
    }
}
