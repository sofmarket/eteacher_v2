<?php

namespace App\Actions\Tutor;

use App\Enums\SocialPlatforms;
use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateTutorProfileAction
{
    public function handle(User $user, array $data): User
    {
        return DB::transaction(function () use ($user, $data) {
            // Update user email if changed
            if (isset($data['email']) && $data['email'] !== $user->email) {
                $user->email = $data['email'];
                $user->save();
            }

            // Handle profile image upload
            // if (isset($data['image'])) {
            //     $this->handleImageUpload($user, $data['image']);
            //     unset($data['image']);
            // }

            // Update profile data
            $user->profile()->updateOrCreate(
                ['user_id' => $user->id],
                $this->prepareProfileData($data)
            );

            // Update social profiles
            foreach ($data['social_profiles'] as $platform => $url) {
                $user->socialProfiles()->updateOrCreate(
                    ['user_id' => $user->id, 'type' => $platform],
                    ['url' => $url]
                );
            }

            // Update languages
            // $user->languages()->sync($data['languages']);

            // update address
            Address::updateOrCreate(
                [
                    'addressable_id' => $user->id,
                    'addressable_type' => User::class
                ],
                [
                    'address' => $data['address'],
                    'city' => $data['city'],
                    'zipcode' => $data['zipcode']
                ]
            );

            return $user->fresh();
            
        });
    }

    protected function handleImageUpload(User $user, $image): void
    {
        // Delete old image if exists
        if ($user->profile?->image) {
            Storage::disk('public')->delete($user->profile->image);
        }

        // Store new image
        $path = $image->store('tutor-profiles', 'public');
        $user->profile()->updateOrCreate(
            ['user_id' => $user->id],
            ['image' => $path]
        );
    }

    protected function prepareProfileData(array $data): array
    {
        return [
            'first_name' => $data['first_name'] ?? null,
            'last_name' => $data['last_name'] ?? null,
            'phone_number' => $data['phone_number'] ?? null,
            'description' => $data['description'] ?? null,
            'tagline' => $data['tagline'] ?? null,
            'keywords' => $data['keywords'] ?? null,
            'native_language' => $data['native_language'] ?? null,
            // 'languages' => $data['languages'] ?? null,
            'intro_video' => $data['intro_video'] ?? null,
        ];
    }
}