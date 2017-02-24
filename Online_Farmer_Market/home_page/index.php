<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
        
        require('../model/db_connect.php');
require('../model/user_repository.php');

// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $roleErr = $websiteErr = $licenceErr= $confirmpasswordErr = $passwordErr = $mobileNumberErr = $homeNumberErr="" ;
$lastname = $firstname = $email = $role = $description = $website = $licence = $confirmpassword = $password = $mobileNumber = $homeNumber = "";
$streetAddress1 = $streetAddress1Err = $streetAddress2 = $streetAddress2Err="";

$city = $cityErr = $state =$stateErr = $zipcode = $zipcodeErr = $country =$countryErr = "";
$action = filter_input(INPUT_POST, 'action');
if ($action == 'register_user') {   
    
  if (empty($_POST["role"])) {
    $roleErr = "Role is required";
  } else {
    $role = test_input($_POST["role"]);
  }

    if (empty($_POST["country"])) {
    $$countryErr = "Country is required";
  } else {
    $$country = test_input($_POST["country"]);
  }
   if (empty($_POST["licence"])) {
    $licenceErr = "Licence is required";
    } 
    else {
    $licence = test_input($_POST["licence"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$licence)) {
      $licenceErr = "Only letters and white space allowed"; 
    }
  }

    if (empty($_POST["firstname"])) {
         $firstnameErr = "First name is required";
    } 
    else {
        $firstname = test_input($_POST["firstname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
      $firstnameErr = "Only letters and white space allowed"; 
    }
  }
   
    if (empty($_POST["lastname"])) {
    $lastnameErr = "Last name is required";
    } 
    else {
    $lastname = test_input($_POST["lastname"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$lastname)) {
      $lastnameErr = "Only letters and white space allowed"; 
    }
  }
  
  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }  
   if (empty($_POST["password"])) {
    $passwordErr = "Password is required";
    } 
    else {
    $password = test_input($_POST["password"]);
    // check if name only contains letters and whitespace
  }
  
    if (empty($_POST["confirmpassword"])) {
    $confirmpasswordErr = "Confirm password is required";
    } 
    else {
    $confirmpassword = test_input($_POST["confirmpassword"]);
    // check if password and confirm password are same or not
        if($_POST["confirmpassword"] != $_POST["password"]){
            $confirmpasswordErr = "Confirm password differs from password";
        }
  }
  
    if (empty($_POST["$homeNumber"])) {
    $homeNumberErr = "Phone is required";
  } else {
    $homeNumber = test_input($_POST["$homeNumber"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$homeNumber)) {
      $homeNumberErr = "Invalid Phone number. Please Enter '000-0000-0000' format"; 
    }
  }    
   if (empty($_POST["$mobileNumber"])) {
    $mobileNumberErr = "Phone is required";
  } else {
    $mobileNumber = test_input($_POST["$mobileNumber"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/",$mobileNumber)) {
      $mobileNumberErr = "Invalid Phone number. Please Enter '000-0000-0000' format"; 
    }
  }

    if (empty($_POST["streetAddress1"])) {
        $streetAddress1Err =  "StreetAddress is required";
    } 
    else {
    $streetAddress1 = test_input($_POST["streetAddress1"]);
  }

  if (empty($_POST["description"])) {
    $description = "";
  } else {
    $description = test_input($_POST["description"]);
  }

  
  
    if (empty($_POST["city"])) {
         $cityErr = "City is required";
    } 
    else {
        $fcity = test_input($_POST["city"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$city)) {
      $cityErr = "Only letters and white space allowed"; 
    }
  }
   
  
    if (empty($_POST["state"])) {
         $stateErr = "State name is required";
    } 
    else {
        $state = test_input($_POST["state"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$state)) {
      $stateErr = "Only letters and white space allowed"; 
    }
  }
   
   if (empty($_POST["$zipcode"])) {
    $zipcodeErr = "Zipcode is required";
  } else {
    $zipcode = test_input($_POST["$zipcode"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/^[0-9]{5}$/",$zipcode)) {
      $zipcodeErr = "Invalid Zipcode";
    }
  }
if (empty($_POST['country'])) {  
                    $countryErr = "* country is required";
                }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$action = filter_input(INPUT_POST, 'action');
if ($action == 'register_user') {    
echo 'index page';
$role = filter_input(INPUT_POST,'role');
$email = filter_input(INPUT_POST,'email');
$password = filter_input(INPUT_POST,'password');
$firstname = filter_input(INPUT_POST,'firstname');
$lastname = filter_input(INPUT_POST, 'lastname');
$license = filter_input(INPUT_POST, 'licence');
$descp = filter_input(INPUT_POST, 'description');
$mobilephone = filter_input(INPUT_POST, 'mobileNumber');
$homephone = filter_input(INPUT_POST, 'homeNumber');
$streetname = filter_input(INPUT_POST, 'streetAddress1');
$streetname2 = filter_input(INPUT_POST, 'streetAddress2');
$city = filter_input(INPUT_POST,'city');
$zipcode = filter_input(INPUT_POST,'zipcode');
$state = filter_input(INPUT_POST,'state');
$country = filter_input(INPUT_POST,'country');
     if($role == 'farmer'){
         $role = 'f';
            }
            else{
                $role = 'c';
            }
//delete_user(2)
add_user($role, $email, $password,$firstname,$lastname,$license,$descp,$mobilephone,$homephone,$streetname,$streetname2,$city,$zipcode,$state,$country);

}
       ?>
    