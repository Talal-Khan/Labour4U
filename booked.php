<?php
    session_start();
    include('connection.php');
    $user_id=$_REQUEST['id'];
    $worker_id=$_SESSION['worker_id'];
    $date=$_REQUEST['date'];
    $today_date= date("Y-m-d");
    if($today_date>$date)
    {
       $delete="DELETE FROM `projectdb`.`booking` WHERE `User_user_id`='".$user_id."' and Worker_worker_id='".$worker_id."' and DATE='".$date."'";
       $qre=mysqli_query($mysql,$delete);
       echo "This job has expired!";
    }
    else {
        $worker_id=$_SESSION['worker_id'];
        $update=" UPDATE `projectdb`.`booking` SET `done` = '1' WHERE `User_user_id`='".$user_id."' and Worker_worker_id='".$worker_id."' and DATE='".$date."' ";
        $qry=mysqli_query($mysql,$update);
        echo "Job Accepted!";
    }
    
?>