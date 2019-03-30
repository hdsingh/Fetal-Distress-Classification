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
    <link rel="icon" href="favicon.png" sizes="192*192" type="image/png">
    <title>Caring & Co.</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="./js/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="./styles/app.css" media="screen" type="text/css" />
</head>
<body>
    <div class="navbar">
        <div class="row">
            <div class="logo">
            <div class="logo">
                <p style="color:#725ac1;font-size:2rem;"><i class="fas fa-heartbeat"></i><b> Caring &amp; Co.</b></p>
            </div>
            </div>
            <div class="links">
                <p class="label"><i class="fas fa-user"></i> Doctor</p>
                <a href="./add.php" class="link">Add new patient</a>
                <a href="./" class="link">Logout</a>
            </div>
        </div>
    </div>

    <div class="app-holder">
        <div class="row">
            <div class="box">
                <div class="header">
                    <h4>Patient List</h4>
                    <p>Select a patient to view its summary report and other graphical stats.</p>
                </div>
                <br /><br />
                <div class="table-holder">
                    <table>
                        <tr>
                            <th>Case No.</th>
                            <th>Patient Name</th>
                            <th>Actions</th>
                        </tr>
                        <?php
                        $ses_docid = $_SESSION["docid"];
                        $sql = "SELECT * FROM patients WHERE doc_id = $ses_docid";
                        if ($result = mysqli_query($link, $sql)){
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['case_no'] . "</td>";
                                        echo "<td>" . $row['patient_name'] . "</td>";
                                        echo "<td>";
                                            echo "<button class='primary' onclick='updateReport(" . $row['patient_stats'] .", " . $row['patient_data'] . ");return false;'>View</button>";
                                        echo "</td>";
                                    echo "</tr>";
                                    echo "<script>";
                                        echo "var answer = [[110,154,123,187,164,125,156,152,136,124],[56,89,23,75,64,26,89,75,56,90]];";
                                    echo "</script>";
                                }
                            }
                        }
                        mysqli_free_result($result);
                        mysqli_close($link);
                        ?>
                    </table>
                </div>
            </div>

            <div class="box">
                <div class="col">
                    <h4>Fetal Status Report</h4>
                    <p>Fetal Distress status of corresponding ECG data.</p>
                    <br /><br />

                    <div class="report">
                        <div class="progress-bar"></div>
                        <div class="current-situation">
                            <p></p>
                        </div>
                    </div>
                    <div class="report-analysis">
                        <br />
                        <h6>Further steps to take: </h6>
                        <p id="situation"></p>
                    </div>
                </div>
                <br /><br /><br /><br />
                <div class="col">
                    <h4>ECG Report</h4>
                    <p>ECG reports containing FHR and UC data.</p>
                    <br /><br />
                    <div id="chart-holder"></div>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="./js/graph.js"></script>
</html>