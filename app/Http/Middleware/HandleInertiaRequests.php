<?php

namespace App\Http\Middleware;

use App\Helpers\SidebarMenu;
use App\Http\Resources\NotificationResource;
use App\Http\Resources\SharedUserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {        
        return array_merge(parent::share($request), [
            // Lazily...
            'notifications' => function () use ($request) {
                return $request->user()
                    ? NotificationResource::collection($request->user()->notifications()->paginate(5))
                    : [];
            },
            'sharedUser' => fn () => $request->user()
                ? SharedUserResource::make(($request->user()))
                : null,
            'flash' => function () {
                return [
                    'message' => session('message'),
                ];
            },
            'locale' => App::currentLocale(),
            'sidebarMenu' => function () {
                return SidebarMenu::render();
            }
        ]);
    }
}
