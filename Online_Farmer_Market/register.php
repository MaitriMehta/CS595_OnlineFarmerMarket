
<!DOCTYPE HTML>  
<html>
<head>
        <link rel="stylesheet" type="text/css" href="../styles.css" />                 

</head>
<body>  

<?php
include 'header.php';
// define variables and set to empty values
$firstnameErr = $lastnameErr = $emailErr = $roleErr = $websiteErr = $licenceErr= $confirmpasswordErr = $passwordErr = $mobileNumberErr = $homeNumberErr="" ;
$lastname = $firstname = $email = $role = $description = $website = $licence = $confirmpassword = $password = $mobileNumber = $homeNumber = "";
$streetAddress1 = $streetAddress1Err = $streetAddress2 = $streetAddress2Err="";

$city = $cityErr = $state =$stateErr = $zipcode = $zipcodeErr = $country =$countryErr = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  if (empty($_POST["role"])) {
    $roleErr = "Role is required";
  } else {
    $role = test_input($_POST["role"]);
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
    $streetAddress1 = test_input($_POST["streetAddress"]);
  }

  if (empty($_POST["description"])) {
    $description = "";
  } else {
    $description = test_input($_POST["description"]);
  }


}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>
<h2> <br/><br/></h2>

<p><span class="error">* required field.</span></p>


<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 
<legend>Register</legend>
  Role:
  <input type="radio" name="role" <?php if (isset($role) && $role=="farmer") echo "checked";?> value="farmer">Farmer
  <input type="radio" name="role" <?php if (isset($role) && $role=="customer") echo "checked";?> value="customer">Customer
  <span class="error">* <?php echo $roleErr;?></span>
  <br><br>
  
  Licence: <input type="text" name="licence" value="<?php echo $licence;?>">
  <span class="error">* <?php echo $licenceErr;?></span>
  <br><br>
  Description : <textarea name="description" rows="5" cols="40"><?php echo $description;?></textarea>
  <br><br>

  First Name: <input type="text" name="firstname" value="<?php echo $firstname;?>">
  <span class="error">* <?php echo $firstnameErr;?></span>
  <br><br>
  Last Name: <input type="text" name="lastname" value="<?php echo $lastname;?>">
  <span class="error">* <?php echo $lastnameErr;?></span>
  <br><br>
  
  E-mail/User: <input type="text" name="email" value="<?php echo $email;?>">
  <span class="error">* <?php echo $emailErr;?></span>
  <br><br>

  Password: <input type="password" name="password" value="<?php echo $password;?>">
  <span class="error">* <?php echo $passwordErr;?></span>
  <br><br>

  Confirm Password: <input type="password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
  <span class="error">* <?php echo $confirmpasswordErr;?></span>
  <br><br>
  
  Mobile Number: <input type="text" name="mobileNumber" value="<?php echo $mobileNumber;?>">
  <span class="error">* <?php echo $mobileNumberErr;?></span>
  <br><br>
  
  Home Number: <input type="text" name="homeNumber" value="<?php echo $homeNumber;?>">
  <span class="error">* <?php echo $homeNumberErr;?></span>
  <br><br>
  
  Street Address1: <input type="text" name="streetAddress1" value="<?php echo $streetAddress1;?>">
  <span class="error">* <?php echo $streetAddress1Err;?></span>
  <br><br>
  Street Address2: <input type="text" name="streetAddress2" value="<?php echo $streetAddress2;?>">
  <span class="error"> <?php echo $streetAddress2Err;?></span>
  <br><br>
  
  City : <input type="text" name="city" value="<?php echo $city;?>">
  <span class="error">* <?php echo $cityErr;?></span>
  <br><br>
  
  Zipcode : <input type="text" name="zipcode" value="<?php echo $zipcode;?>">
  <span class="error">* <?php echo $zipcodeErr;?></span>
  <br><br>
  
    State : <input type="text" name="state" value="<?php echo $state;?>">
  <span class="error"> *<?php echo $stateErr;?></span>
  <br><br>
  
    Country :
    <select id="country" name="country">
                            <option value="">Please select country</option>
                            <option value="US" <?php if($country == 'US') echo 'selected="selected"'?>>US</option>
                            <option value="India" <?php if($country == 'India') echo 'selected="selected"'?>>India</option>
                            <option value="China" <?php if($country == 'China') echo 'selected="selected"'?>>China</option>
                            <option value="Australia" <?php if($country == 'Australia') echo 'selected="selected"'?>>Australia</option>
                    </select> 
  <span class="error">* <?php echo $countryErr;?></span>
  <br><br>
  <!-- '/^[0-9]{5}([- ]?[0-9]{4})?$/', $zipcode-->
  
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>

<!--//Added by Maitri-->
<?php include 'footer.php'; ?>