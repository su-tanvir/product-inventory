<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Collection;

trait ApiResponser
{
    private function successResponse($data, int $status_code): JsonResponse
    {
        return response()->json([ 'data' => $data ], $status_code);
    }

    public function errorResponse(string $description, int $status_code): JsonResponse
    {
        return response()->json([ 'data' => $description ], $status_code);
    }

    public function showAll(Collection $collection): JsonResponse
    {
        return $this->successResponse($collection, Response::HTTP_OK);
    }

    public function showOne(?Model $instance): JsonResponse
    {
        if(!$instance){
            return $this->errorNotFound();
        }
        return $this->successResponse($instance, Response::HTTP_OK);
    }

    public function showStoredOne(Model $instance): JsonResponse
    {
        return $this->successResponse($instance, Response::HTTP_CREATED);
    }

    public function errorNotFound(): JsonResponse
    {
        return $this->errorResponse('Not found', Response::HTTP_NOT_FOUND);
    }

    public function errorBadRequest(): JsonResponse
    {
        return $this->errorResponse('Cannot process', Response::HTTP_BAD_REQUEST);
    }
}
