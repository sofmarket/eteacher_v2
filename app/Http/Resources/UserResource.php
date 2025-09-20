<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            
            'id'        => $this->whenHas('id'),
            'email'     => $this->whenHas('email'),
            'name'      => $this->whenHas('name'),
            
            'avatar'    => $this->whenLoaded('profile', function () {
                return $this->profile?->image ?? 'https://ui-avatars.com/api/?name=' . $this->profile?->fullName;
            }),

            'profile'   => new ProfileResource($this->whenLoaded('profile')),
            
            'profile_completed'              => $this->whenLoaded('profile', function () { 
                return (($this->profile?->created_at ?? null) == ($this->profile?->updated_at ?? null) ? false : true); 
            }),

            'comment'                        => $this->whenHas('comment'),
            'verified'                       => $this->whenHas('verified'),
            'subjects'                       => UserSubjectResource::collection($this->whenLoaded('subjects')),
            'reviews'                        => ReviewsResource::collection($this->whenLoaded('reviews')),
            'languages'                      => LanguageResource::collection($this->whenLoaded('languages')),
            'educations'                     => EducationResource::collection($this->whenLoaded('educations')),
            'address'                        => new AddressResource($this->whenLoaded('address')),
            'identityVerification'           => new IdentityResource($this->whenLoaded('identityVerification')),
            'social_profiles'                => SocialProfileResource::collection($this->whenLoaded('socialProfiles')),

        ];
    }
}