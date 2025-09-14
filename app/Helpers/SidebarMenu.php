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
                    'name' => __("sidebar.dashboard"),
                    'path' => route('tutor.home'),
                    'component' => 'Tutor/Home',
                ],
                [
                    'icon' => 'UserCircleIcon',
                    'name' => __("sidebar.profile_settings"),
                    'path' => route('tutor.profile'),
                    'component' => 'Tutor/Profile',
                ],
                [
                    'icon' => 'CalenderIcon',
                    'name' => __("sidebar.bookings"),
                    'path' => route('tutor.bookings.teached-subjects'),
                    'component' => 'Tutor/Bookings',
                ],
                [
                    'icon' => 'ChatIcon',
                    'name' => __("sidebar.inbox"),
                    'path' => route('conversations.index'),
                    'component' => 'Conversations',
                ],
                [
                    'icon' => 'StaredIcon',
                    'name' => __("sidebar.deals_coupons"),
                    'path' => route('tutor.coupons'),
                    'component' => 'Tutor/Coupons',
                ],
                [
                    'icon' => 'FlagIcon',
                    'name' => __("sidebar.payouts"),
                    'path' => route('tutor.payouts'),
                    'component' => 'Tutor/Payouts',
                ],
                [
                    'icon' => 'MonyIcon',
                    'name' => __("sidebar.invoices"),
                    'path' => route('tutor.invoices.index'),
                    'component' => 'Tutor/Invoices',
                ],
                [
                    'icon' => 'DisputeIcon',
                    'name' => __("sidebar.disputes"),
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