<?php
include('../../includes/session.php');
include('includes/db.php');

// Retrieve student information based on the query parameters
$ID = $_SESSION['ID'];
if (isset($ID)){
	$result = get_subjects($conn, $ID);
	$teacher = mysqli_fetch_assoc(get_teacher($conn,$ID));
	$user_level = $_SESSION['role'];
}
if (isset($_GET["subject_id"])) {
    $students = get_students($conn,$ID,$_GET["subject_id"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>E-Learning (BETA) Teacher Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="/E-Learning/assets/imgs/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="/E-Learning/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ['/E-Learning/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="/E-Learning/assets/css/admin_style.css">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="/E-Learning/assets/css/bootstrap.min.css">

</head>

<body>
    <div class="wrapper">
        <?php include('templates/header.php') ?>
        <?php include('templates/sidebar.php') ?>

        <div class="main-panel">
            <div class="content">
        		<?php include('templates/panel_main.php') ?>
        		<?php include('templates/subject_cards.php') ?>
        		<?php include('templates/student_table.php') ?>
                </div>
            </div>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="/E-Learning/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="/E-Learning/assets/js/core/popper.min.js"></script>
    <script src="/E-Learning/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="/E-Learning/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="/E-Learning/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="/E-Learning/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Atlantis JS -->
    <script src="/E-Learning/assets/js/atlantis.min.js"></script>

    <!-- <script>
        var today = new Date();
        var day = today.getDate();
        var month = today.getMonth() + 1;

        function appendZero(value) {
            return "0" + value;
        }

        function theTime() {
            var d = new Date();
            document.getElementById("time").innerHTML = d.toLocaleTimeString("en-US");
        }

        if (day < 10) {
            day = appendZero(day);
        }

        if (month < 10) {
            month = appendZero(month);
        }

        today = day + "/" + month + "/" + today.getFullYear();

        document.getElementById("date").innerHTML = today;

        var myVar = setInterval(function() {
            theTime();
        }, 1000);
    </script> -->
</body>

</html>