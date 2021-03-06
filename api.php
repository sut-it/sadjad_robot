﻿<?php
require_once 'autoload.php';
date_default_timezone_set('Asia/Tehran');

$database->insert("users", [
    "id" => $data->user_id,
    "username" => $data->username,
    "first_name" => $data->first_name,
    "last_name" => $data->last_name,
    'date_created' => date("Y-m-d H:i:s")
]);

if ($constants->last_message !== null && $data->text != '/start') {

    switch ($constants->last_message) {
        case 'news':
            require_once 'actions/news/news.php';
            break;
        case 'contact_us':
            require_once 'actions/contact_us/contact_us.php';
            break;
        case 'library':
            require_once 'actions/library/library.php';
            break;
        case 'internet_credit':
            require_once 'actions/internet_credit/internet_credit.php';
            break;
        case 'self_service':
            require_once 'actions/self_service/self_service.php';
            break;
        case 'location':
            require_once 'actions/location/location.php';
            break;
        case 'my_profile':
            require_once 'actions/my_profile/my_profile.php';
            break;
        // If everything fails, we're gonna show the user start menu
        default:
            require_once 'actions/start.php';
            break;
    }

} else {
    switch ($data->text) {
        case '/start':
            require_once 'actions/start.php';
            break;
        case $keyboard->buttons['library']:
        case '📚 کتابخانه من':                                                 // Backward compatibility
            require_once 'actions/library/library.php';
            break;
        case '😎 پروفایل دانشجویی من':                                         // Backward compatibility
        case $keyboard->buttons['my_profile']:
            require_once 'actions/my_profile/my_profile.php';
            break;
        case $keyboard->buttons['calender']:
            require_once 'actions/calender/calender.php';
            break;
        case $keyboard->buttons['contact_us']:
            require_once 'actions/contact_us/contact_us.php';
            break;
        case $keyboard->buttons['news']:
            require_once 'actions/news/news.php';
            break;
        case $keyboard->buttons['location']:
            require_once 'actions/location/location.php';
            break;
        case $keyboard->buttons['self_service']:
            require_once 'actions/self_service/self_service.php';
            break;
        case $keyboard->buttons['week']:
            require_once 'actions/week/week.php';
            break;
        case $keyboard->buttons['internet']:
            require_once 'actions/internet_credit/internet_credit.php';
            break;
        default:
            require_once 'actions/start.php';
            break;
    }
}
