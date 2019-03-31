<?php

require_once "config.php";

if (isset($_REQUEST["uname"]) && isset($_REQUEST["password"])){
    
    $doc_name = trim($_REQUEST["uname"]);
    $doc_password = trim($_REQUEST["password"]);
    
    $sql = "SELECT * FROM doctors WHERE doc_name = ? AND doc_password = ?";
    if ($stmt = mysqli_prepare($link, $sql)){    
        mysqli_stmt_bind_param($stmt, "ss", $p_doc_name, $p_doc_password);
        $p_doc_name = $doc_name;
        $p_doc_password = $doc_password;

        if ($result = mysqli_stmt_execute($stmt)){
            mysqli_stmt_store_result($stmt);
            // $row = mysqli_fetch_array($result);
            if (mysqli_stmt_num_rows($stmt) == 1){
                session_start();
                $_SESSION["logged"] = true;
                // $_SESSION["docid"] = $row['doc_id'];
                header("Location: app.php");
            }
            else{
                $error = "Invalid username or password.";
            }
        }
        else{
            echo "error";
        }
        mysqli_stmt_close($stmt);
    }
    mysqli_close($link);
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Caring & Co.</title>
    <link rel="stylesheet" href="./styles/style.css" media="screen" type="text/css" />
</head>
<body>
    <div class="login-holder">
        <div class="box">
            <div class="col">
                <img src="./images/doctor-hospital.png" />
            </div>
            <div class="col">
                <h4>Log In</h4>
                <br />
                <form action="" method="POST">
                    <input type="text" name="uname" placeholder="Username" required />
                    <br />
                    <input type="password" name="password" placeholder="Password" required />
                    <br /><br />
                    <button type="submit">Log In</button>
                </div>
                <p id="msg">
                    <?php
                    if (isset($error)){
                        echo $error;
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</body>

<!-- <script src="./js/app.js"></script> -->
</html>