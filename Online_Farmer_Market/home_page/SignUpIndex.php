<?php

$pathParams = explode('/', $_SERVER['REQUEST_URI']);
$contentPath = $pathParams[1];

$action = filter_input(INPUT_POST, 'action');

if ($action == 'SignUpController') {
    $fname = filter_input(INPUT_POST, 'firstname');
    $fnameError = null;
    $hasErrors = false;
    if ($fname == NULL) {
        $hasErrors = true;
        $fnameError = 'Please enter the text in firstname!';
    }
    
    $lname = filter_input(INPUT_POST, 'lastname');
    $lnameError = null;
    $hasErrors = false;
    if ($lname == NULL) {
        $hasErrors = true;
        $lnameError = 'Please enter the text in lastname!';
    }
    
    $role= filter_input(INPUT_POST, 'role');
    $roleError = null;
    $hasErrors = false;
    if ($role == NULL) {
        $hasErrors = true;
        $roleError = 'Please select the role!';
    }
    
    $email = filter_input(INPUT_POST, 'email');
    $emailError = null;
    $hasErrors = false;
    if ($email == NULL) {
        $hasErrors = true;
        $emailError = 'Please enter the valid email address!';
    }
    
    $password = filter_input(INPUT_POST, 'password');
    $pwdError = null;
    $hasErrors = false;
    if ($password == NULL) {
        $hasErrors = true;
        $pwdError = 'Please enter the password!';
    }
    
    $cnfrm_password = filter_input(INPUT_POST, 'cnfrmpassword');
    $cnfpwdError = null;
    $hasErrors = false;
    if ($cnfrm_password == NULL) {
        $hasErrors = true;
        $cnfpwdError = 'Please enter the reener the same password!';
    }
    
    $license = filter_input(INPUT_POST, 'license');
    $licenseError = null;
    $hasErrors = false;
    if ($license == NULL) {
        $hasErrors = true;
        $licenseError = 'Please enter the reener the valid license!';
    }
    
    $homeno = filter_input(INPUT_POST, 'homeno');
    $homenoError = null;
    $hasErrors = false;
    if ($homeno == NULL) {
        $hasErrors = true;
        $homenoError = 'Please enter the home number!';
    }
    
    $mobileno = filter_input(INPUT_POST, 'mobileno');
    $mobilenoError = null;
    $hasErrors = false;
    if ($mobileno == NULL) {
        $hasErrors = true;
        $mobilenoError = 'Please enter the mobile number!';
    }
    
    $address1 = filter_input(INPUT_POST, 'address1');
    $adr1Error = null;
    $hasErrors = false;
    if ($address1 == NULL) {
        $hasErrors = true;
        $adr1Error = 'Please enter the address1!';
    }
    
    $address2 = filter_input(INPUT_POST, 'address2');
    $adr2Error = null;
    $hasErrors = false;
    if ($address2 == NULL) {
        $hasErrors = true;
        $adr2Error = 'Please enter the address2!';
    }
    
    $cityvar = filter_input(INPUT_POST, 'city');
    $cityErrors = null;
    $hasErrors = false;
    if ($cityvar == NULL) {
        $hasErrors = true;
        $cityErrors = 'Please enter the city!';
    }
    
    $zipcode = filter_input(INPUT_POST, 'zipcode');
    $zipcodeErrors = null;
    $hasErrors = false;
    if ($zipcode == NULL) {
        $hasErrors = true;
        $zipcodeErrors = 'Please enter the zipcode!';
    }
    
    $state = filter_input(INPUT_POST, 'state');
    $stateErrors = null;
    $hasErrors = false;
    if ($state == NULL) {
        $hasErrors = true;
        $stateErrors = 'Please enter the state!';
    }
    
    $country = filter_input(INPUT_POST, 'country');
    $countryErrors = false;
    $hasErrors = false;
    if ($country == NULL) {
        $hasErrors = true;
        $countryErrors = 'Please select the country!';
    } 
   
    include('SignUp.php');
    //}
    //}
    //}
} else {
    include('SignUp.php');
}
?>