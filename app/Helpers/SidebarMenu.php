<?php

namespace App\Helpers;
class SidebarMenu
{
    public static function render()
    {
        switch (auth()->user()?->type) {
            case 'tutor':
                return self::renderTutorMenu();
            case 'student':
                return self::renderStudentMenu();
            case 'admin':
                return self::renderAdminMenu();
            default:
                return [
                    "title" => "Menu",
                    "items" => [
                    ],
                ];
        }
    }

    private static function renderTutorMenu()
    {
        return [
            "title" => "Menu",
            "items" => [
                [
                    'icon' => 'GridIcon',
                    'name' => "Dashboard",
                    'path' => route('tutor.home'),
                ],
                [
                    'icon' => 'UserCircleIcon',
                    'name' => "Profile Settings",
                    'path' => route('tutor.profile'),
                ],
                [
                    'icon' => 'CalenderIcon',
                    'name' => "Manage Bookings",
                    'path' => route('tutor.bookings.teached-subjects'),
                ],
                [
                    'icon' => 'ChatIcon',
                    'name' => "Inbox",
                    'path' => route('conversations.index'),
                ],
                [
                    'icon' => 'StaredIcon',
                    'name' => "Deals & Coupons",
                    'path' => route('tutor.coupons'),
                ],
                [
                    'icon' => 'FlagIcon',
                    'name' => "Payouts",
                    'path' => route('tutor.payouts'),
                ],
                [
                    'icon' => 'MonyIcon',
                    'name' => "Invoices",
                    'path' => route('tutor.invoices'),
                ],
                [
                    'icon' => 'DisputeIcon',
                    'name' => "Disputes",
                    'path' => route('tutor.disputes'),
                ],
            ],
        ];
    }

    private static function renderStudentMenu()
    {
        return [
            "title" => "Menu",
            "items" => [
            ],
        ];
    }


    private static function renderAdminMenu()
    {
        return [
            "title" => "Menu",
            "items" => [
            ],
        ];
    }

}