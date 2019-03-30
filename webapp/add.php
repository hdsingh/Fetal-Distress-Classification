<?php
    require_once "config.php";
    $_SESSION["docid"] = 1;
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=5.0, shrink-to-fit=no" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Caring & Co.</title>
    <link rel="stylesheet" href="./styles/app.css" media="screen" type="text/css" />
</head>
<body>
    <div class="full-page">
        <div class="box">
            <form action="upload.php" method="POST" enctype="multipart/form-data">
                <h4>Upload</h4>
                <p>Select a .txt to upload:</p>
                <br />
                <div>
                    <input type="text" name="patient_name" id="patient_name" placeholder="Patient's Name" />
                    <input type="file" name="fileToUpload" id="fileToUpload" />
                </div>
                <br />
                <div class="btn-holder">
                    <button type="submit">Upload ECG Data File</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>