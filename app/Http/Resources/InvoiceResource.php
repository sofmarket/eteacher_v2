<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class InvoiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                    => pad($this->id, 8),
            'amount'                => $this->whenHas('amount'),
            'status'                => $this->whenHas('status'),
            'payment_method'        => $this->whenHas('payment_method'),
            'platform_fee'          => $this->whenHas('platform_fee'),
            'issued_at'             => $this->whenHas('issued_at', function () {
                return $this->issued_at?->format('Y-m-d');
            }),
            'paid_at'               => $this->whenHas('paid_at', function () {
                return $this->paid_at?->format('Y-m-d');
            }),
            'refunded_at'           => $this->whenHas('refunded_at', function () {
                return $this->refunded_at?->format('Y-m-d');
            }),
            'tutor_payout'          => number_format($this->amount - $this->platform_fee, 2),
            
            // Related data
            'student'               => $this->whenLoaded('student', function () {
                return [
                    'id'        => $this->student->id,
                    'name'      => $this->student->name,
                    'email'     => $this->student->email,
                ];
            }),
            
            'tutor'                 => $this->whenLoaded('tutor', function () {
                return [
                    'id'        => $this->tutor->id,
                    'name'      => $this->tutor->name,
                    'email'     => $this->tutor->email,
                ];
            }),
            
            'invoiceable'           => $this->whenLoaded('invoiceable', function () {
                return [
                    'id'        => $this->invoiceable->id,
                    'type'      => $this->invoiceable_type,
                    'data'      => $this->invoiceable,
                ];
            }),
        ];
    }
}
