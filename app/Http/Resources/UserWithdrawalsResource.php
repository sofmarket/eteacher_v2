<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserWithdrawalsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => $this->whenHas('id'),
            'amount'                => $this->whenHas('amount'),
            'payout_method'         => $this->whenHas('payout_method'),
            'status'                => $this->whenHas('status'),
            'details'               => $this->whenHas('details'),
            'created_at'            => $this->whenHas('created_at', function () {
                return $this->created_at->format('Y-m-d');
            }),
            'updated_at'            => $this->whenHas('updated_at', function () {
                return $this->updated_at->format('Y-m-d');
            }),
        ];
    }
}
