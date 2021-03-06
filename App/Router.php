<?php

$router = new \Core\Router();

//region website Routes

$router->add('/', 'HomeController@index');
//register Routes
$router->add('/register', 'AuthController@registerUser');
$router->add('/verifyUser', 'AuthController@verifyUser');
$router->add('/registerUser', 'AuthController@register');
//reset password Routes
$router->add('/resetPasswordPhone', 'AuthController@resetPasswordPhone');
$router->add('/resetPasswordCode', 'AuthController@resetPasswordCode');
$router->add('/resetPassword', 'AuthController@resetPassword');
//login Routes
$router->add('/login', 'AuthController@login');
//logout Routes
$router->add("/logout", "AuthController@logout");
//dashboard Routes
$router->add('/dashboard',"DashboardController@dashboard");
$router->add('/dashboard/editUserProfile','DashboardController@dashboardEditUser') ;
$router->add("/dashboard/addAdvertise","DashboardController@addAdvertise");
$router->add("/dashboard/myComments", "DashboardController@myComments");
$router->add("/dashboard/followers", "DashboardController@followers");
$router->add("/dashboard/myServices", "DashboardController@myServices");
$router->add('/dashboard/deleteService', "DashboardController@deleteService");
$router->add('/dashboard/editService', "DashboardController@editService");
//contact us
$router->add('/contact',"HomeController@contactUs");
//about us
$router->add("/about","HomeController@about");
$router->add("/blog", "HomeController@blog");
//comments
$router->add("/add_comment", 'HomeController@addComment');
$router->add("/add_rate", "HomeController@add_rate");
//search routes
$router->add("/search", "searchController@search");
$router->add("/service", "HomeController@showService");

//endregion website Routes

//region Application Routes

//register Routes
$router->add('/registerPhoneApp', 'AuthController@registerPhoneApp');
$router->add('/verifyPhoneApp', 'AuthController@verifyPhoneApp');
$router->add('/registerUserApp', 'AuthController@registerUserApp');
//reset password Routes
$router->add('/resetPasswordPhoneApp', 'AuthController@resetPasswordPhoneApp');
$router->add('/resetPasswordCodeApp', 'AuthController@resetPasswordCodeApp');
$router->add('/resetPasswordApp', 'AuthController@resetPasswordApp');
//login routes
$router->add('/loginApp', 'AuthController@loginApp');
//get Data(User Data) from database
$router->add('/getUserDataApp', 'DashboardController@getUserData');
//edit User information(profile activity) and upload picture to database and change password
$router->add('/editUserProfileApp', 'DashboardController@editUserProfile');
$router->add('/uploadProfilePictureApp', 'DashboardController@uploadProfilePicture');
$router->add('/changePasswordApp', 'AuthController@changePasswordApp');
//set notification receiver
$router->add('/setNotificationReceiverApp', 'DashboardController@setNotificationReceiver');
//add service from user id
$router->add('/addAdvertiseApp', 'DashboardController@addAdvertiseApp');
//get news and important notification
$router->add('/getNews', 'HomeController@getNews');
//get category
$router->add('/getCategory', 'HomeController@getCategory');
//get Notification
$router->add('/getNotification', 'HomeController@getNotification');

//endregion Application Routes

//test route
$router->add('/test',"SeriesController@test");

return $router;
