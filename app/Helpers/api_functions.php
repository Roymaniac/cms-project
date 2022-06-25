<?php

use Illuminate\Http\Request;
use App\Helpers\ApiConstants;
use App\Models\User;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;
use Intervention\Image\Facades\Image as Image;

/** Return error api response */
function problemResponse(string $message = null, int $status_code , Request $request = null, Exception $trace = null)
{
	$code = !empty($status_code) ? $status_code : null;
	$traceMsg = empty($trace) ?  null  : $trace->getMessage();

	$body = [
		'msg' => $message,
		'code' => $code,
		'success' => false,
		'error_debug' => $traceMsg,
	];

	!empty($trace) ? logger($trace->getMessage(), $trace->getTrace()) : null;
	return response()->json($body)->setStatusCode($code);
}


/** Return error api response */
function inputErrorResponse(string $message = null, int $status_code = null, Request $request = null, ValidationException $trace = null)
{
	$code = ($status_code != null) ? $status_code : '';
	$traceMsg = empty($trace) ?  null  : $trace->getMessage();
	$traceTrace = empty($trace) ?  null  : $trace->getTrace();

	$body = [
		'msg' => $message,
		'code' => $code,
		'success' => false,
		'errors' => empty($trace) ?  null  : $trace->errors(),
	];

	return response()->json($body)->setStatusCode($code);
}

/** Return valid api response */
function validResponse(string $message = null, $data = null, $request = null)
{
	if (is_null($data) || empty($data)) {
		$data = null;
	}
	$body = [
		'msg' => $message,
		'data' => $data,
		'success' => true,
		'code' => ApiConstants::GOOD_REQ_CODE,

	];


	return response()->json($body);
}