<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Please fill the Login Details</title>
    <h1> LOGIN </h1>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            h1{
                text-align: center;
            }
            body {
                background-color: greenyellow;
            }
            .box {
                width:100px;
                height:100px;
                background-color:#d9d9d9;
                position:fixed;
                margin-left:-150px; /* half of width */
                margin-top:-150px;  /* half of height */
                top:50%;
                left:50%;       
            }
            
        </style>
     
    </head>
    <body>
        <div id="divelement"></div>
        <form action="login_index.php" method="post" id="loginform" name="loginform">
            <input type="hidden" name="action" id="action" value="LoginController"/>
            <table class="box" border="1px">
                <tr>
                    <td>
                        <label> Username </label>
                    </td>
                    <td>
                        <?php 
                            $username = filter_input(INPUT_POST,'username');
                        ?>
                        <input type="text" id="username" name="username" value=<?php if(!empty($username)) echo"$username"?>>
                    </td>     
                    <td>
                        <?php 
                            if(!empty($usernameError)){
                                echo "$usernameError";
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
                        <input type="text" id="password" name="password" value=<?php if(!empty($password)) echo"$password"?>>
                    </td>     
                    <td>
                        <?php 
                            if(!empty($passwordError)){
                                echo "$passwordError";
                            }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td rowspan="1" colspan="3" style="text-align: center">
                        <input type="submit" value="register" id="submitBtn" >
                    </td>
                </tr>
                
            
            
            </table>