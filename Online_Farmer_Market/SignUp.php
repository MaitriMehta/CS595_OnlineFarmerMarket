
<?php
    include "header.php";
?>

<!DOCTYPE html>
<html>
      <head>
        <title>Pizza</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../styles.css" />                 
    </head>
    <body class="body">
           <section id="content">                       
           <h1 class="bold"> Register</h1>           
       </section> 
      <section id="content">
        <div id="content">        
            <div class="container">  
             <form action="SignUpIndex.php" method="post" id="signupform" name="signupform">
            <input type="hidden" name="action" id="action" value="SignUpController"/>
            <table>                
                <tr> 
                    <td>           
                        <label> Role </label>
                    </td>
                    <td>                                          
                    <?php
                        $role = filter_input(INPUT_POST,'role');
                     ?>
                    <select id="role" name="role">
                            <option value="">Please select role</option>
                            <option value="Farmer" <?php if($role == 'Farmer') echo 'selected="selected"'?>>Farmer</option>
                            <option value="Customer" <?php if($role == 'Customer') echo 'selected="selected"'?>>Customer</option>
                    </select> 
                    </td>
                    <td>
                        <?php if(!empty($roleError)) {
                        echo $roleError;
                        }
                        ?>
                    </td>
                    
                </tr>
                <br/>
                    <tr>
                    <td>
                        <label> License </label>  
                    </td>
                    <td>
                        <?php
                        $license = filter_input(INPUT_POST,'license');
                        ?>
                        <input type="text" id="license" name="license" value=<?php if(!empty($license)) echo "$license"?>>
                    </td>
                    <td>
                        <?php if(!empty($licenseError)) {
                        echo $licenseError;
                        }
                        ?>
                    </td>                    
                </tr>
                
                <tr>
                    <td>
                        <label> First Name </label>  
                    </td>
                    <td>
                        <?php
                        $fname = filter_input(INPUT_POST,'firstname');
                        ?>
                        <input type="text" id="firstname" name="firstname" value=<?php if(!empty($fname)) echo "$fname"?>>
                    </td>
                    <td>
                        <span class="error">
                        <?php if(!empty($fnameError)) {
                        echo $fnameError;
                        }
                        ?>
                        </span>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> Last Name </label>  
                    </td>
                    <td>
                        <?php
                        $lname = filter_input(INPUT_POST,'lastname');
                        ?>
                        <input type="text" id="lastname" name="lastname" value=<?php if(!empty($lname)) echo "$lname"?>>
                    </td>
                    <td>
                        <?php if(!empty($lnameError)) {
                        echo $lnameError;
                        }
                        ?>
                    </td>                    
                </tr>
             
                <tr>
                    <td>
                        <label> Email </label>  
                    </td>
                    <td>
                        <?php
                        $email = filter_input(INPUT_POST,'email');
                        ?>
                        <input type="text" id="email" name="email" value=<?php if(!empty($email)) echo "$email"?>>
                    </td>
                    <td>
                        <?php if(!empty($emailError)) {
                        echo $emailError;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> Password </label>  
                    </td>
                    <td>
                        <?php
                        $password = filter_input(INPUT_POST,'password');
                        ?>
                        <input type="text" id="password" name="password" value=<?php if(!empty($password)) echo "$password"?>>
                    </td>
                    <td>
                        <?php if(!empty($pwdError)) {
                        echo $pwdError;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> Confirm Password  </label>  
                    </td>
                    <td>
                        <?php
                        $cnfrm_password = filter_input(INPUT_POST,'cnfrmpassword');
                        ?>
                        <input type="text" id="cnfrmpassword" name="cnfrmpassword" value=<?php if(!empty($cnfrm_password)) echo "$cnfrm_password"?>>
                    </td>
                    <td>
                        <?php if(!empty($cnfpwdError)) {
                        echo $cnfpwdError;
                        }
                        ?>
                    </td>                    
                </tr>
            
                <tr>
                    <td>
                        <label> Home Number </label>  
                    </td>
                    <td>
                        <?php
                        $homeno = filter_input(INPUT_POST,'homeno');
                        $mobileno = filter_input(INPUT_POST,'mobileno');
                        ?>
                        <input type="text" id="homeno" name="homeno" value=<?php if(!empty($homeno)) echo "$homeno"?>>
                        <label> Mobile Number </label>  <br/>
                        <input type="text" id="mobileno" name="mobileno" value=<?php if(!empty($mobileno)) echo "$mobileno"?>>
                    </td>
                <span class="error">
                    <td>
                        
                        <?php if(!empty($homenoError)) {
                        echo $homenoError;
                        }
                        if(!empty($mobilenoError)) {
                        echo $mobilenoError;
                        }
                        ?>
                    </td>                    
                </span>
                </tr>
                <tr>
                    <td>
                        <label> Address1 </label>  
                    </td>
                    <td>
                        <?php
                        $address1 = filter_input(INPUT_POST,'address1');
                        ?>
                        <input type="text" id="address1" name="address1" value=<?php if(!empty($address1)) echo "$address1"?>>
                    </td>
                    <td>
                        <?php if(!empty($adr1Error)) {
                        echo $adr1Error;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> Address2 </label>  
                    </td>
                    <td>
                        <?php
                        $address2 = filter_input(INPUT_POST,'address2');
                        ?>
                        <input type="text" id="address2" name="address2" value=<?php if(!empty($address2)) echo "$address2"?>>
                    </td>
                    <td>
                        <?php if(!empty($adr2Error)) {
                        echo $adr2Error;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> City </label>                     
                    </td>
                    <td>
                        <?php
                            $cityvar = filter_input(INPUT_POST, 'city');
                            ?>
                        <input type="text" name="city" id="city" value=<?php if(!empty($cityvar)) echo "$cityvar"?>>
                    </td>
                    <td>
                        <?php if(!empty($cityError)) {
                        echo $cityError;
                        }
                        ?>
                        
                    </td>
                    
                    
                </tr>
                <tr>
                    <td>
                        <label> Zipcode </label>  
                    </td>
                    <td>
                        <?php
                        $zipcode = filter_input(INPUT_POST,'zipcode');
                        ?>
                        <input type="text" id="zipcode" name="zipcode" value=<?php if(!empty($zipcode)) echo "$zipcode"?>>
                    </td>
                    <td>
                        <?php if(!empty($zipcodeError)) {
                        echo $zipcodeError;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> State </label>  
                    </td>
                    <td>
                        <?php
                        $state = filter_input(INPUT_POST,'state');
                        ?>
                        <input type="text" id="state" name="state" value=<?php if(!empty($state)) echo "$state"?>>
                    </td>
                    <td>
                        <?php if(!empty($stateError)) {
                        echo $stateError;
                        }
                        ?>
                    </td>                    
                </tr>
                <tr>
                    <td>
                        <label> Country </label>  
                    </td>
                    <td>
                        <?php
                        $country = filter_input(INPUT_POST,'country');
                        ?>
                        <select id="country" name="country">
                            <option disabled value="">Please select country</option>
                            <option value="US" <?php if($country == 'US') echo 'selected="selected"'?>>US</option>
                            <option value="India" <?php if($country == 'India') echo 'selected="selected"'?>>India</option>
                            <option value="China" <?php if($country == 'China') echo 'selected="selected"'?>>China</option>
                            <option value="Australia" <?php if($country == 'Australia') echo 'selected="selected"'?>>Australia</option>
                    </select> 
                    </td>
                    <td>
                        <?php if(!empty($countryError)) {
                        echo $countryError;
                        }
                        ?>
                    </td>                    
                </tr>
                    
                <tr>
                    <td>
                        <input type="submit" value="register" id="submitBtn">
                    </td>
                </tr>
            </table>
        </form>

   </div>
   </div>
   </section>                        
<?php include 'footer.php' ?>
