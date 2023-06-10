<?php
namespace App\Helpers;

class AlertMessage
{

    protected static $response = [
        'alert' => [
            'status' => 'success',
            'title' => null,
            'message' => null
        ]
    ];

    public static function success(string $message, ?string $title = null): array
    {
        self::$response['alert']['title'] = $title;
        self::$response['alert']['message'] = $message;
        return self::$response;
    }
    public static function danger(string $message, ?string $title = null): array
    {
        self::$response['alert']['status'] = 'danger';
        self::$response['alert']['title'] = $title;
        self::$response['alert']['message'] = $message;
        return self::$response;
    }
}
