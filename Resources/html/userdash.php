<?php
include_once '../php/db.inc.php';
session_start();

if (!isset($_SESSION['role'])) {
    header("location: ../../Resources/html/login.php");
}
if ($_SESSION['role'] != "user") {
    header("location: ../../Resources/html/login.php");
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM user WHERE u_email='$email';";
$result = mysqli_query($conn, $sql);
$resultcheck = mysqli_fetch_row($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="../css/userdash.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
</head>

<body>

    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2>
                <span class="las la-clipboard-list"></span><span>mtk Survey</span>
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="userdash.php" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="showsurveysusers.php"><span class="las la-clipboard-list"></span><span>Surveys</span></a>
                </li>
                <li>
                    <a href="payment.php"><span class="las la-shopping-bag"></span><span>Collect Payment</span></a>
                </li>
                <li>
                    <a href="userprofile-update.php"><span class="las la-user-circle"></span><span>Profile</span></a>
                </li>
                <li>
                    <a href="../../Resources/php/logout.php"><span class="las la-clipboard-list"></span><span>Log Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                User Dashboard
            </h2>

            <div class="user-wrapper">
                <?php
                if ($resultcheck[10] == '') {
                    echo '<img src="../images/userimg.png" width="40px" height="40px" alt="">';
                } else {
                    // echo $resultcheck[10];
                    echo '<img src="uploaded-img/' . $resultcheck[10] . '" width="40px" height="40px" alt="">';
                    // echo '<img src="uploaded-imgphoto_2022-03-14_07-08-35.jpg" width="40px" height="40px" >';
                }
                ?>

                <div>
                    <h4>
                        <?php
                        echo "$resultcheck[0] $resultcheck[1]";
                        ?>
                    </h4>
                    <small>
                        <?php
                        echo "$resultcheck[6] ";
                        ?>
                    </small>
                </div>
            </div>
        </header>

        <main>
            <div class="cards">

                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            echo "$resultcheck[9] ";
                            ?>
                        </h1>
                        <span>
                            Taken Surveys
                        </span>
                    </div>
                    <div>
                        <span class="las la-shopping-bag"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>
                            <?php
                            echo "$resultcheck[8] birr";
                            ?>
                        </h1>
                        <span>Profit</span>
                    </div>
                    <div>
                        <span class="las la-file-invoice-dollar"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <div class="projects">
                    <div class="card">
                        <div class="card-header">
                            <h3>Available surveys</h3>
                            <form action="showsurveysusers.php">

                                <button>
                                    See all <span class="las la-arrow-right"></span>
                                </button>
                            </form>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table width="100%">
                                    <thead>
                                        <tr onclick="">
                                            <td>Survey Title</td>
                                            <td>Description</td>
                                            <td>Target</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $querysurvey = "SELECT s_name, s_description, s.s_id surveyid, filled_surveys, s_age, s_occupation, s_gender 
                                        FROM survey s 
                                        INNER JOIN survey_owner so 
                                        ON so.s_id=s.s_id
                                        WHERE s.s_id NOT IN (
                                        SELECT ts.s_id 
                                        FROM taken_surveys ts    
                                        INNER JOIN user u 
                                        ON ts.u_id = u.u_id
                                        WHERE ts.u_id = '" . $resultcheck[2] . "') AND so.state='1'
                                        ORDER BY s.s_id DESC LIMIT 9;
                                        ";
                                        $queryresult = mysqli_query($conn, $querysurvey);
                                        $queryresultcheck = mysqli_num_rows($queryresult);
                                        if ($queryresultcheck > 0) {
                                            while ($row = mysqli_fetch_assoc($queryresult)) {
                                                if ($row['s_age'] != "" && $row['s_age'] >= $resultcheck[3]) {
                                                    continue;
                                                }
                                                if ($row['s_gender'] != "" && $row['s_gender'] != $resultcheck[4]) {
                                                    continue;
                                                }
                                                if ($row['s_occupation'] != "" && $row['s_occupation'] != $resultcheck[5]) {
                                                    continue;
                                                }
                                                echo "<tr>
                                            <td><a href='formdisplay.php?id=" . $row['surveyid'] . "'>" . $row['s_name'] . "</a></td>
                                            <td>" . $row['s_description'] . "</td>
                                            <td>" . $row['s_occupation'] . "</td>
                                            </tr>";
                                            }
                                        }
                                        ?>
                                        <!-- <tr>
                                            <td>UI/UX Design</td>
                                            <td>UI Team</td>
                                            <td>
                                                <span class="status purple"></span>
                                                review
                                            </td>
                                        </tr> -->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </main>

    </div>
    <script>
        function sendForm(id) {
            document.getElementById(id).submit();
        }
    </script>
</body>

</html>