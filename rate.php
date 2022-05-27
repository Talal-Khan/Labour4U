<?php
    session_start();
    include('connection.php');
    $id=$_REQUEST['id'];
    $rating=$_REQUEST['rating'];
    $complaint=$_REQUEST['complaint'];
    $worker_id=$_REQUEST['wid']; 
    $user_id=$_SESSION['user_id'];
    $update="UPDATE `projectdb`.`booking` SET `done` = '2' WHERE `booking_id` = '".$id."';";
    $sq = "SELECT MAX(complain_id) as maxx FROM complaints";
    $res = mysqli_query($mysql, $sq);
    $arr=mysqli_fetch_array($res);
    $maxx=$arr['maxx'] + 1;
    $insert_c=" INSERT INTO `projectdb`.`complaints` (`complain`, `User_User_id`, `Worker_worker_id`, `complain_id`) VALUES ('".$complaint."', '".$user_id."', '". $worker_id ."', '".$maxx."')";
    $insert_r=" INSERT INTO `projectdb`.`relation_11` (`Booking_booking_id`, `Rating_rate_id`) VALUES ('".$id."', '".$rating."')";
    $q=mysqli_query($mysql,$update);
    $q1=mysqli_query($mysql,$insert_c);
    $q2=mysqli_query($mysql,$insert_r);
    echo "Rating and Complain Submitted!" ;
    //echo $id . $complaint . $rating . $user_id . $worker_id;



?>