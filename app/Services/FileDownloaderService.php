<?php

namespace App\Services;

use App\Traits\JsonResponseTrait;
use Illuminate\Support\Facades\Storage;

class FileDownloaderService
{
    use JsonResponseTrait;

    public function download(string $path, string $filename): \Symfony\Component\HttpFoundation\BinaryFileResponse|\Illuminate\Http\JsonResponse
    {
        if (Storage::disk('local')->exists("{$path}/{$filename}")) {
            return response()->download(storage_path("app/{$path}/" . $filename));
        }
        return $this->error();
    }
}
