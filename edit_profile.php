<?php

require_once("edit_profileservlet.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="profileStyle.css">
    <title>Edit Profile</title>
    <style>
        .nodeco {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="panel1">
    <h1 class="heading1">Edit Profile</h1>
    <form method="POST" enctype="">
        <div class="form-box sign-up">

        <div  class="input-box animation" style="--i:17;"> 
        <label for="name">Enter new name: </label><br>
        <input type="text" id="name" name="name" value="<?php echo $name?>" required><br>
        </div>

        <div  class="input-box animation" style="--i:17;"> 
        <label for="surname">Enter new surname:</label><br>
        <input type="text" id="surname" name="surname" value="<?php echo $surname?>" required><br>
        </div>

        <div  class="input-box animation" style="--i:17;"> 
        <label for="username">Enter new username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $username?>" required><br>
        </div>

        <div  class="input-box animation" style="--i:17;"> 
        <label for="password">Enter new Password:</label><br>
        <input type="password" id="password" name="password" value="<?php echo $password?>" required><br><br>
        </div>

        <div  class="input-box animation" style="--i:17;"> 
        <input type="file" id="file" name="image" accept="image/*"><br><br>
        </div>

        </div>
        
        <button type="submit" class="btn">Update Profile</button>
    </form>
    <br/>
    <?php echo "
            <a href='user_account.php?user_id=$member_id'><span class='btn1'>View Profile</span>
                "
    ?>
    <span></span>
    <br>
    <br>
    <?php echo "
        <a href='welcome.php?user_id=$member_id' class='btn1'>Back to Welcome Page</a>
        "
    ?>
    </div>
    

    <div class="bubbles">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
            <img src="images/bubble.png">
    </div>
    
</body>
</html>
