<?php

require_once("connect.php");

$error;

if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    if(validateUsername($username)) {
    
        $sql = "SELECT username, password FROM member WHERE role = 'ADMIN'";
        $result = $conn->query($sql); //execute query
    
        if (!$result) {
            die("Invalid query: " . $conn->error);
        }
    
        //read each record from table
        while ($row = $result->fetch_assoc()) {
            if($username == $row["username"] && $password == $row["password"] ) {
                header("Location: admin_main.php");
            } else {
                $error = "Invalid admin username or password";
            }
        }
    } else {
        $error = "Invalid username, it must not contain special characters";
    }
}

function validateUsername($text) {
    // For username: only letters and numbers are allowed
    if (preg_match('/^[a-zA-Z0-9]+$/', $text)) {

        return true;
    } else {

        return false;
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin Login Page</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f2f2f2;
                margin: 0;
                padding: 0;
            }

            h1 {
                text-align: center;
                margin-top: 50px;
                color: #333;
            }

            form {
                margin: 0 auto;
                max-width: 300px;
                background-color: #fff;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            table {
                width: 100%;
            }

            table td {
                padding: 10px 0;
            }

            input[type="text"], input[type="password"] {
                width: calc(100% - 10px);
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            button {
                width: 100%;
                background-color: #007bff;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            button:hover {
                background-color: #0056b3;
            }

            .error {
                color: red;
                text-align: center;
                margin-bottom: 10px;
            }

            .back-link {
                text-align: center;
                margin-top: 10px;
            }
        </style>
    </head>
<body>
<div>
    <h1>Administrator Login</h1>
</div>
<div>
    <div>
        <form method="post" action="">
            <table>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" required></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" required></td>
                </tr>

                <?php if (!empty($error)): ?>
                    <tr>
                        <td colspan="2" class="error"><?php echo $error; ?></td>
                    </tr>
                <?php endif; ?>

                <tr>
                    <td colspan="2" align="center"><button class="" type="submit" name="login">Log In</button></td>
                </tr>
                <tr>
                    <td colspan="2" class="back-link">Not an Administrator? Click <a href="index.php">here</a> to go back</td>
                </tr>
            </table>
        </form>
    </div>
</div>
</body>
</html>
