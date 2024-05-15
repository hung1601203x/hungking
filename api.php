<?php
 DEFINE('DB_USER', 'android');
        DEFINE('DB_PASSWORD', 'androidUTT');
        DEFINE('DB_HOST', '127.0.0.1');
        DEFINE('DB_NAME', 'students_manager');
        $mysqli = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) OR die('Could not connect to MySQL');
        mysqli_select_db($mysqli, DB_NAME) OR die('Could not select the database');
        mysqli_query($mysqli, "SET NAMES 'utf8'");
        
        if (isset($_GET["id"])) {
            if ($_GET["id"] == "" ) {
                echo ("Vui lòng nhập id");
                goto end;
            } else {
                $query = "SELECT * FROM students WHERE id='" . $_GET["id"] . "'";
                $resouter = mysqli_query($mysqli, $query);
            }
        } else {
            $query = "SELECT * FROM students";
            $resouter = mysqli_query($mysqli, $query);
        }
        
        $temparray = array();
        $total_records = mysqli_num_rows($resouter);
        
        if ($total_records >= 1) {
            while ($row = mysqli_fetch_assoc($resouter)) {
                $temparray[] = $row;
            }
        }
        echo json_encode($temparray);
        end:
        ?>
