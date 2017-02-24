<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   <!--   The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags  -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
    <title>Online Farmers Market</title>
    <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
    <script src="../../assets/js/ie8-responsive-file-warning.js"></script>
    <script src="ie-emulation-modes-warning.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
  </head> 
  <body style =" background-color: white"> 
  
   <div class="navbar-wrapper ">
      <div class="container" style="width:100%">
        <nav class="navbar navbar-inverse navbar-static-top navbar-default">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
               
              <a class="navbar-brand" href="#">Online Farmers Market</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="sample.html">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#Register">Register</a></li>
                <li role="presentation" class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Log in  <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Username <input type="email" name="email" placeholder="User email"></a></li>
                    <li><a href="#">Password <input type="password" name="password" placeholder="User password"></a></li>
                    <li><a href="#">Forget Username or Password </a></li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#"><input type="button" name="signup" value ="Sign up"></a></li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>

      </div>
    </div>
 
<?php
//include 'header.php';
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
    $streetAddress1 = test_input($_POST["streetAddress1"]);
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


<!-- <p><span class="error">* required field.</span></p> -->
<!-- <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  

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
  
 <!-- <input type="submit" name="submit" value="Submit">  
</form> -->                  |
<!-- Aakanksha Patel Added  \|/ -->

 
<div class="container" id="formContainer"> 
<p><span class="error">* required field.</span></p>
  <form class="form-horizontal" method="post" action="index.php" id="registeruser">
       <input type="hidden" name="action" value="register_user" />
    <div class="form-group">
   Role:
  <input type="radio" name="role" <?php if (isset($role) && $role=="farmer") echo "checked";?> value="farmer">Farmer
  <input type="radio" name="role" <?php if (isset($role) && $role=="customer") echo "checked";?> value="customer">Customer
  <span class="error">* <?php echo $roleErr;?></span>
  
      <label for="inputFname" class="col-sm-2 control-label">First Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputFname" placeholder="First Name" name="firstname" value="<?php echo $firstname;?>">
        <span class="error">* <?php echo $firstnameErr;?></span>
      </div>
    </div>
      <div class="form-group">
      <label for="inputLname" class="col-sm-2 control-label">Last Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputLname" placeholder="Last Name" name="lastname" value="<?php echo $lastname;?>">
        <span class="error">* <?php echo $lastnameErr;?></span>
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
      </div>
    </div>

    <div class="form-group">
      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password" value="<?php echo $password;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
      </div>
    </div>
    
    <div class="form-group">
      <label for="inputConfirmPassword3" class="col-sm-2 control-label">Confirm Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="inputConfirmPassword3" placeholder="Confirm Password" name="confirmpassword" value="<?php echo $confirmpassword;?>">
        <span class="error">* <?php echo $confirmpasswordErr;?></span>
      </div>
    </div>

    <div class="form-inline form-group">
      <div class="form-group" style="margin-left: 120px">
        <label for="inputHomeNumber" class="col-sm-2 control-label">Home</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="inputHomeNumber" placeholder="Phonenumber" name="homeNumber" value="<?php echo $homeNumber;?>" style="margin-left: 22px">
           <span class="error">* <?php echo $homeNumberErr;?></span>
        </div>
      </div>

      <div class="form-group">
        <label for="inputMobileNumber" class="col-sm-2 control-label">Cell</label>
        <div class="col-sm-10">
          <input type="number" class="form-control" id="inputMobileNumber" placeholder="Phonenumber" name="mobileNumber" value="<?php echo $mobileNumber;?>">
          <span class="error">* <?php echo $mobileNumberErr;?></span>
        </div>
      </div>
    </div>

    <div class="form-group">
      <label for="inputAdd1" class="col-sm-2 control-label">Street Address 1 </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputAdd" placeholder="Street Add 1" name="streetAddress1" value="<?php echo $streetAddress1;?>">
        <span class="error">* <?php echo $streetAddress1Err;?></span>
      </div>
    </div>
    <div class="form-group">
      <label for="inputAdd2" class="col-sm-2 control-label">Street Address 2 </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputAdd2" placeholder="Street Add 2" name="streetAddress2" value="<?php echo $streetAddress2;?>">
        <span class="error"> <?php echo $streetAddress2Err;?></span>
  
      </div>
    </div>
    <div class="form-inline form-group" style="margin-left:140px ">
      <div class="form-group">
        <label for="inputCity" class="col-sm-2 control-label">City </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputCity" placeholder="City" style="right: -12px; position: relative;"name="city" value="<?php echo $city;?>">
          <span class="error">* <?php echo $cityErr;?></span>
        </div>
      </div>
      <div class="form-group" style="position: relative; right: -17px">
        <label for="inputState" class="col-sm-2 control-label">State</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputState" placeholder="state" name="state" value="<?php echo $state;?>">
          <span class="error"> *<?php echo $stateErr;?></span>
        </div>
      </div>
    </div>

    <div class="form-inline form-group" style="margin-left:114px">
      <div class="form-group">
        <label for="inputZipCode" class="col-sm-2 control-label">Zipcode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="inputZipCode" placeholder="Zipcode" style="right: -34px; position:relative;" name="zipcode" value="<?php echo $zipcode;?>">
          <span class="error">* <?php echo $zipcodeErr;?></span>
        </div>
      </div> 

      <div class="form-group" style="position: relative; right: -15px">
        <label for="inputCountry" class="col-sm-2 control-label">Country</label>
        <div class="col-sm-10">
          <select name="country" class="form-control" id="country" name="country">
            <option value="">Please select country</option>
            <option value="US" <?php if($country == 'US') echo 'selected="selected"'?>>United States</option>
            <option value="India" <?php if($country == 'India') echo 'selected="selected"'?>>India</option>
            <option value="China" <?php if($country == 'China') echo 'selected="selected"'?>>China</option>
            <option value="Australia" <?php if($country == 'Australia') echo 'selected="selected"'?>>Australia</option>
          </select>
          <span class="error">* <?php echo $countryErr;?></span> 
        </div>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
          
        <input type="submit" name="submit" class="btn btn-default" value="Submit">  
      </div>
    </div>
  </form>
</div>
</body>
</html>

<!--//Added by Maitri-->
<?php include 'footer.php'; ?>
    </div><!-- /.container -->
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="jquery.min.js"><\/script>')</script>   
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="ie10-viewport-bug-workaround.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>