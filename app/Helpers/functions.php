<?php


if(!function_exists('pad')) {
    function pad($str, $length = 8) {
        return str_pad($str, $length, "0", STR_PAD_LEFT);
    }
}

if (!function_exists('compare_versions')) {
    /**
     * Compare two version numbers.
     *
     * @param string $version1
     * @param string $version2
     * @return int Returns 0 if the versions are equal, -1 if $version1 is lower, and 1 if $version1 is higher
     */
    function compare_versions(string $version1, string $version2): int {
        $v1 = explode('.', $version1);
        $v2 = explode('.', $version2);

        $length = max(count($v1), count($v2));

        for ($i = 0; $i < $length; $i++) {
            $part1 = isset($v1[$i]) ? (int) $v1[$i] : 0;
            $part2 = isset($v2[$i]) ? (int) $v2[$i] : 0;

            if ($part1 < $part2) {
                return -1;
            } elseif ($part1 > $part2) {
                return 1;
            }
        }

        return 0;
    }
}

if (!function_exists('parseEmail')) {
    function parseEmail(string $email) {
        return trim(strtolower($email));
    }
}

if (!function_exists('normalizePhoneNumber')) {
    function normalizePhoneNumber(string $phone) {
        return preg_replace('/^(?:\+|00)/', '', $phone);
    }
}

if (!function_exists('isEmail')) {
    function isEmail(string $value) {
        return filter_var($value, FILTER_VALIDATE_EMAIL);
    }
}


if (!function_exists('formatCurrency')) {
    function formatCurrency(float $value) {
        return number_format(floatval($value), 0) . " MAD"; // TODO: translate currency
    }
}