<?php

require_once("user_accountservlet.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Profile</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="userAccountStyle.css">
    <style>
        

     

        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: white;
        }

        table {
            width: 100%;
            margin-bottom: 30px;
            border-collapse: collapse;
        }

        table td, table th {
            padding: 10px;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #080B0E;
        }

        .profile-link {
            position: relative;
            width: 200px;
            height: 35px;            
            background: transparent;
            border: 2px solid #0ef;
            outline: none;
            border-radius: 40px;
            cursor: pointer;
            font-size: 16px;
            color: #fff;
            font-weight: 600;       
            margin-top: 30px;   
            margin-left: 20px;  
            transition: .5s;
        }

        .profile-link:hover {
             background-color: #009EC1;
            border: 2px solid #fff;
        }

        .logout-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
        }
        
        .logout-link:hover {
            color: white;
            transition: .5s;
        }

        .delete-button {
            background-color: red;
            color: #0ef;
        }
        .movBtn
        {
            margin-left: 15px;
        }
        .textE
        {
           margin-top: 5px;
        }
    </style>
</head>
<body>
<div class="panel1">
    <div class="container">

        <h1>User Account Details</h1>
        
        <div class="container">
            <center>
                <?php
                    echo "<img src='$image_data' alt='image' width='150px' height='125px'>";
                ?>
            </center>

        </div>

        <table>
            <tr>
                <th>User ID:</th>
                <td><?php echo $member_id?></td>
            </tr>
            <tr>
                <th>Username:</th>
                <td><?php echo $username?></td>
            </tr>
            <tr>
                <th>Name:</th>
                <td><?php echo $name?></td>
            </tr>
            <tr>
                <th>Surname:</th>
                <td><?php echo $surname?></td>
            </tr>
            <tr>
                <th>Date Of Birth:</th>
                <td><?php echo $dob?></td>
            </tr>
            <tr>
                <th>Gender:</th>
                <td><?php echo $gender?></td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <?php echo  
                            "
                                <a href='edit_profile.php?user_id=$member_id' class='btn2'><span class='textE'>Edit Profile<span></a>
                            "
                        ?>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                <form method="post">
                        <?php echo " 
                    <input type='hidden' name='del_id' value='$member_id'>"  ?> <!-- Replace 123 with the actual user ID -->
                        <!-- Add a submit button -->
                        <div class="movBtn">
                        <button type="submit" name="delete_user" class='profile-link'>Delete User</button>
                        </div>
                   
                </form>
                </td>
            </tr>
        </table>
        <a href="index.php" class="logout-link">Log Out</a>
    </div>
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