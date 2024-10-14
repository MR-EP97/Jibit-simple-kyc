<?php

namespace App\Http\Controllers;


use App\Http\Requests\ProfileStoreRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Services\CacheService;
use App\Services\FileDownloaderService;
use App\Services\ProfileService;
use App\Traits\JsonResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;


class ProfileController extends Controller
{
    use JsonResponseTrait;

    public function __construct(
        protected ProfileService        $profileService,
        protected CacheService          $cacheService,
        protected FileDownloaderService $downloader
    )
    {
    }


    public function store(ProfileStoreRequest $request): JsonResponse
    {
        $profile = $this->profileService->create($request->validated());

        return $this->success(
            'Profile created successfully',
            ProfileResource::make($profile),
            HttpResponse::HTTP_CREATED
        );
    }

    public function show(Request $request): JsonResponse
    {
        $national_id = $request->query('national_id');

        if ($profile = $this->cacheService->remember('national_id_' . $national_id,
            5,
            function () use ($national_id) {
                return $this->profileService->findByNationalId($national_id);
            })) {

            return $this->success(
                'Profile found successfully',
                ProfileResource::make($profile)
            );
        }

        return $this->error();
    }

    public function downloadAvatar(string $avatar)
    {
        return $this->downloader->download('avatars', $avatar);
    }
}
