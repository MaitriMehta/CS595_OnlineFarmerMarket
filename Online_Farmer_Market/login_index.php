<?php

$pathParams = explode('/', $_SERVER['REQUEST_URI']);
$contentPath = $pathParams[1];

$action = filter_input(INPUT_POST, 'action');

if ($action == 'LoginController') {
    $username = filter_input(INPUT_POST, 'username');
    $usernameError = null;
    $hasErrors = false;
    if ($username == NULL) {
        $hasErrors = true;
        $usernameError = 'Please enter the text in username!';
    }
    
    $password = filter_input(INPUT_POST, 'password');
    $passwordError = null;
    $hasErrors = false;
    if ($password == NULL) {
        $hasErrors = true;
        $passwordError = 'Please enter your password !';
    }
    
    include('Login.php');
    //}
    //}
    //}
} else {
    include('Login.php');
}
?>