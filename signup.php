<?php 

require_once("signupservlet.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'> 
    <link rel="stylesheet" href="styleL.css">
    <title>Register</title>
    
    <style>
        .navbar
        {          
           margin-bottom: 42%;         
        }
        .btn6
        {
            color: #fbfcfd;
            padding: 10px 25px;
            background: transparent;
            border: 1px solid #fff;
            border-radius: 20px;
            text-decoration: none;
            outline: none;
            cursor: pointer;
            transition: color 0.3s;            
            margin-bottom: 1500px;
            
           
        }
        .btn6:hover
        {
            color: aqua            
        }
    </style>
</head>
<body>
<div class="navbar">
            <a href="index.php" class="btn6">Home</a>            
        </div>
  
    <div class="container">
        
        <span class="bg-animate"></span>
        <span class="bg-animate2"></span>

       <div class="form-box login">
        
        <div class="animation">
        <p><a href="#" class="register-link animation" style="--i:0;">Register</a></p>       
        </div>              
        
       </div>      

       <div class="info-text login">
         <h2 class="animation" style="--i:0;">Welcome To Our,<br>Pulse App!</h2>
         <p class="animation" style="--i:1;">Track your pulse and <br> stay healthly with our app.</p>
      </div>
      <div class="form-box sign-up">
        <h2 class="animation">Sign Up</h2>

        <form method="POST" enctype="multipart/form-data">
            <?php if(isset($error)) { ?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <div class="input-box animation" style="--i:17;">
                
            <input type="text" name="idnumber" required>
                <label>ID Number</label>
            </div>
            <div class="input-box animation" style="--i:17;">
                
            <input type="text" name="name" required>
                <label>Name</label>
            </div>

            <div class="input-box animation" style="--i:18;">
                
            <input type="text" name="surname" required>
                <label>Surname</label>
            </div>

            <div class="input-box animation" style="--i:19;">
                
                <input type="text" name="username"  required>
                <label>Username</label>
            </div>
            <div class="input-box animation" style="--i:20;">
                
                <input type="password" name="password"  required>
                <label>Password</label>
            </div>  
            <div class="input-box animation" style="--i:21;">  
                
                <input type="password" name="confirm_password"  required>
                <label>Confirm Password</label>
            </div>
            <div class="input-box animation" style="--i:21;">  
                <div  class="ui input-box animation" style="--i:22;">
                    <label for="image">Upload profile image</label>
                </div>  
                <div class="fileb">
                     <input type="file" name="image" accept="image/*" />
                </div>
                      
            </div>

            <div class="input-box animation" style="--i:23;">
                <div class="checkb">
                    <input  type="checkbox" id="terms" name="tcs" value="Y">
                </div>          
            </div>

            <div class="tc input-box animation"  style="--i:24;">
                <label for="terms">I agree to the <a href="terms_and_conditions.php" target="blank">Terms and Conditions</a></label>
            </div>
            
            <input type="submit" name="register" class="btn animation" style="--i:22;"; value="Sign Up">

            <div class="reg-link animation" style="--i:23;">
                <p>Already have an account?<a href="login.php" class="signup-link">Login</a></p>
            </div>
        </form>
        
       </div> 
       <div class="info-text sign-up">         
         <h2 class="heading animation" style="--i:17;">Pulse App</h2>
         <p class="animation" style="--i:18;">The pulse app is an application that<br> tracks your pulse.</p>
         <div class="animation" style="--i:19;">
         <div class="heart ">
            
            </div>
         </div>
         
      </div>
    </div>     

            <!-- <div class="bubbles">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            </div> -->
     
      
    <script src="script.js"></script>
</body>
</html>
