<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utils\ResponseUtil;
use Illuminate\Support\Facades\Response;

class BaseApiController extends Controller
{
    public function sendResponse($result, $message)
    {
        return \Illuminate\Support\Facades\Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 500, $warning = [])
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
    public function sendNoPermission($error, $code = 403, $warning = [])
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }

    public function sendUnauthorized($error, $code = 403, $warning = [])
    {
        return Response::json(ResponseUtil::makeUnauthorized($error), $code);
    }

    public function sendValidationError($error, $validation, $code = 422)
    {
        return Response::json(ResponseUtil::makeValidationError($error, $validation), $code);
    }

    public function sendSuccess($message, $code = 200)
    {
        return Response::json([
            'status' => 200,
            'message' => $message
        ], 200);
    }

    public function sendResponseWithPagination($result, $message, $statusCode = 200)
    {
        try {
            return Response::json([
                'status' => true,
                'data' => $result->items(), // Access paginated data directly using the items() method
                'pagination' => [
                    'total' => $result->total(),
                    'per_page' => $result->perPage(),
                    'current_page' => $result->currentPage(),
                    'last_page' => $result->lastPage(),
                    'from' => $result->firstItem(),
                    'to' => $result->lastItem(),
                    'links' => [
                        'first' => $result->url(1),
                        'prev' => $result->previousPageUrl(),
                        'next' => $result->nextPageUrl(),
                        'last' => $result->url($result->lastPage()),
                    ],
                ],
                'message' => $message,
            ], $statusCode);
        } catch (\Exception $e) {
            return Response::json([
                'status' => false,
                'message' => 'An error occurred while formatting the response.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
