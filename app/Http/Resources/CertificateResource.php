<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CertificateResource extends JsonResource
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
            'title'                 => $this->whenHas('title'),
            'institute_name'        => $this->whenHas('institute_name'),
            'issue_date'            => $this->whenHas('issue_date', function () {
                return \Carbon\Carbon::parse($this->issue_date)->format('M d, Y');
            }),
            'expiry_date'           => $this->whenHas('expiry_date', function () {
                return \Carbon\Carbon::parse($this->expiry_date)->format('M d, Y');
            }),
            'description'           => $this->whenHas('description'),
            'image'                 => $this->whenHas('image'),
        ];
    }
}
