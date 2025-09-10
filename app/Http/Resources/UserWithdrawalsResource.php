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
            'id'                    => $this->id,
            'amount'                => $this->amount,
            'payout_method'         => $this->payout_method,
            'status'                => $this->status,
            'details'               => $this->details,
            'created_at'            => $this->created_at->format('Y-m-d'),
            'updated_at'            => $this->updated_at->format('Y-m-d'),
        ];
    }
}
