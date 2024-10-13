<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Services\ProfileService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


class ProfileController extends Controller
{
    use JsonResponseTrait;

    public function __construct(protected ProfileService $profileService)
    {
    }


    public function store(ProfileStoreRequest $request): JsonResponse
    {
        $profile = $this->profileService->create($request->validated());

        return $this->success(
            'Profile created successfully',
            array(ProfileResource::make($profile)),
            HttpResponse::HTTP_CREATED
        );
    }
}
