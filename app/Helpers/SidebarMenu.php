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
                    'component' => 'Tutor/Home',
                ],
                [
                    'icon' => 'UserCircleIcon',
                    'name' => "Profile Settings",
                    'path' => route('tutor.profile'),
                    'component' => 'Tutor/Profile',
                ],
                [
                    'icon' => 'CalenderIcon',
                    'name' => "Manage Bookings",
                    'path' => route('tutor.bookings.teached-subjects'),
                    'component' => 'Tutor/Bookings',
                ],
                [
                    'icon' => 'ChatIcon',
                    'name' => "Inbox",
                    'path' => route('conversations.index'),
                    'component' => 'Conversations',
                ],
                [
                    'icon' => 'StaredIcon',
                    'name' => "Deals & Coupons",
                    'path' => route('tutor.coupons'),
                    'component' => 'Tutor/Coupons',
                ],
                [
                    'icon' => 'FlagIcon',
                    'name' => "Payouts",
                    'path' => route('tutor.payouts'),
                    'component' => 'Tutor/Payouts',
                ],
                [
                    'icon' => 'MonyIcon',
                    'name' => "Invoices",
                    'path' => route('tutor.invoices.index'),
                    'component' => 'Tutor/Invoices',
                ],
                [
                    'icon' => 'DisputeIcon',
                    'name' => "Disputes",
                    'path' => route('tutor.disputes'),
                    'component' => 'Tutor/Disputes',
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