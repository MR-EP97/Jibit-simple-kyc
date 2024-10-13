<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'national_id' => $this->national_id,
            'avatar' => route('kyc.download-avatar', $this->avatar),
            'birth_date' => Carbon::make($this->birth_date)->format('Y-m-d'),
        ];
    }
}
