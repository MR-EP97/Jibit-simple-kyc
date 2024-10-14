<?php

namespace App\Interfaces\Swagger;

use App\Http\Requests\ProfileStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use OpenApi\Annotations as OA;

interface ProfileSwaggerInterface
{
    /**
     * @OA\Post(
     *     path="/api/kyc",
     *     summary="Create a new profile",
     *     tags={"Profile"},
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              required={"name", "email"},
     *              @OA\Property(property="national_id", type="string", example="0123456789"),
     *              @OA\Property(property="avatar", type="file"),
     *              @OA\Property(property="birth_date", type="string", format="date", example="1990-01-01"),
     *          )
     *      ),
     *     @OA\Response(
     *         response=201,
     *         description="Profile created successfully",
     *         @OA\JsonContent(
     *              @OA\Property(property="national_id", type="string", example="john.doe@example.com"),
     *              @OA\Property(property="birth_date", type="string", format="date", example="1990-01-01"),
     *              @OA\Property(property="avatar_url", type="string", example="https://example.com/storage/avatars/123.jpg")
     *          )
     *     ),
     *     @OA\Response(response=422, description="invalid data")
     * )
     */
    public function store(ProfileStoreRequest $request): JsonResponse;

    /**
     * @OA\Get(
     *     path="/api/kyc/search",
     *     summary="search profile",
     *     tags={"Profile"},
     *     @OA\Parameter(
     *           name="national_id",
     *           in="query",
     *           description="national id",
     *           @OA\Schema(
     *               type="string"
     *           )
     *       ),
     *     @OA\Response(
     *         response=200,
     *         description="Profile found successfully",
     *         @OA\JsonContent(
     *              type="array",
     *              @OA\Items(ref="#/components/schemas/Profile")
     *         )
     *     ),
     *     @OA\Response(response=404, description="Profile not found")
     * )
     */
    public function show(Request $request): JsonResponse;
}
