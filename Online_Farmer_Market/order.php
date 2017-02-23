<?php
/* 
 * Student Info: Name=Maitri Mehta, ID=17060 
 * Subject: CS526_Quiz01_Spring_2017 
 * Author: maitri_mehta
 * Filename: order.php
 * Date and Time: Feb 13, 2017 12:26:41 AM
  * Project Name: MAITRI_17060_CS526_HW2
      */
//include '../order.html';
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
           <h1 class="bold">17060 Pizza Order</h1>
           <div id="content"> 
                  <div id="header" align="LEFT">
                        <a href="order_pizza">Order Pizza</a> <br/>
                        <a href="process_pizza">Processing Order</a>     
            </div><br/>     
       </section> 
      <section id="content">
        <div id="content">        
            <div class="container">  
                <form action="index.php" method="post">            
            <!--generating error message to next line if div taken-->
                    <label><b> Size of pizza:</b></label>
                    <select id="sizeOfPizza" name="sizeOfPizza">                             
                        <option selected="" disabled>---Please Select---</option>
                        <option value="Small" <?php echo (isset($_POST['sizeOfPizza']) && $_POST['sizeOfPizza'] == 'Small') ? 'selected="selected"' : ''; ?>>Small</option>  
                        <option value="Medium" <?php echo (isset($_POST['sizeOfPizza']) && $_POST['sizeOfPizza'] == 'Medium') ? 'selected="selected"' : ''; ?>>Medium</option> 
                        <option value="Large" <?php echo (isset($_POST['sizeOfPizza']) && $_POST['sizeOfPizza'] == 'Large') ? 'selected="selected"' : ''; ?>>Large</option>                                                                   
                    </select>           
            <span class="error"><?php echo $sizeOfPizzaErr;?></span><br/><br/>            
                    <label><b>Kind of pizza : </b></label>
                    <select id="kindOfPizza" name="kindOfPizza" size="3"  > 
<!--                        <option value=null selected="" disabled>---Please Select---</option>-->
                        <option selected value="Pepperoni" <?php echo (isset($_POST['kindOfPizza']) && $_POST['kindOfPizza'] == 'Pepperoni') ? 'selected="selected"' : ''; ?>>Pepperoni</option>                        
                        <option value="Vegetarian" <?php echo (isset($_POST['kindOfPizza']) && $_POST['kindOfPizza'] == 'Vegetarian') ? 'selected="selected"' : ''; ?>>Vegetarian</option>                        
                        <option value="Combo" <?php echo (isset($_POST['kindOfPizza']) && $_POST['kindOfPizza'] == 'Combo') ? 'selected="selected"' : ''; ?>>Combo</option>                                                                        
                    </select>
            <span class="error"><?php echo $kindOfPizzaErr;?></span>        
            <br/>            <br/>
            <div>                
                <input type="checkbox" name='isExtraCheese' value='1' <?php echo (isset($_POST['isExtraCheese'])) ? 'checked="true"' : ''; ?> />Extra Cheese<br />                
            </div>
            <br/>
            <label><b>Quantity : </b></label>                            
            <input type="text" name="quantity" value="<?php if(!empty($quantity)) echo $quantity; ?>">              
            <span class="error"><?php echo $quantityErr;?></span>        <br/> <br/>                                       
            <input type="submit" name="Calculate" value="Calculate"/><br/>
        </form>
        <hr>        
            <?php 
            if( $quantityErr == '' ||  $kindOfPizzaErr == '' ||  $sizeOfPizzaErr == ''){
                echo $quantityErr;
                echo $kindOfPizzaErr;
                echo $sizeOfPizzaErr;       
            }else{
             
                echo 'You have ordered '. $quantity . ' '. $kindOfPizza . ' pizza';
                if($isExtraCheese == TRUE){
                    echo ' with addition of extra Cheese';                
                  }else{
                    echo ' without extra cheese';}
                echo '<br/>Your billing amount is '. $cost . ' Thank you!';
            }
            ?>
 
   </div>
   </div>
   </section>                        
        <footer id="footer">
             <div id="footer">
                 &copy<a href="http://www.google.com">17060 Pizza Delivery System</a>
                 | Created by Maitri Mehta 17060 Spring 2017
             </div>
        </footer>
        
    </body>
</html>