<?php
use Minuz\Skolie\Controller\{
    CreateTestRedirectController,
    HomepageControlller,
    LoginController,
    LogoutController,
    NewTestController,
    TeacherPageController,
    TestBodyMakerController,
    TestHeaderMakerController,
};


return [
    "POST|/login" => LoginController::class,
    
    "GET|/" => HomepageControlller::class,
    "GET|/logout" => LogoutController::class,
    "GET|/create-test-redirect" => CreateTestRedirectController::class,
    "GET|/create-test-header" => TestHeaderMakerController::class,
    "GET|/create-test-body" => TestBodyMakerController::class,
    "GET|/teacher-page" => TeacherPageController::class,
    "GET|/new-test" => NewTestController::class
];