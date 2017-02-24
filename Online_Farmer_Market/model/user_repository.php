<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

        <?php
 
function get_users_by_userid($user_id) {
    global $db;
    $query = "SELECT * FROM onlinefarmermarket.`user` WHERE userid = $user_id ";
    $users = $db->query($query);
    return $users;
}

function get_book($user_id) {
    global $db;
    $query = "SELECT * FROM onlinefarmermarket.`user` WHERE userid = $user_id";
    $users = $db->query($query);
    
    $user = $users->fetch();
  return $users;
}
function delete_user($user_id) {
    global $db;
    $query = "DELETE FROM onlinefarmermarket.`user` WHERE userid = $user_id";
    $db->exec($query);
}
function add_user($Role,$email_id,$Password,$first_name,$last_name,$License,$Descp,$mobile_phone,$home_phone,$Street_name,$street_name2,$City,$Zipcode,$State,$Country) {
    global $db;
    $query = "INSERT INTO user
        (role,emailid, password,firstname,lastname,license,descp,mobilephone,homephone,streetname,steetname2,city,zipcode,state,country)
        VALUES
        ('$Role','$email_id','$Password','$first_name','$last_name','$License','$Descp','$mobile_phone','$home_phone','$Street_name','$street_name2','$City','$Zipcode','$State','$Country')";
    $db->exec($query);
}


        ?>
   