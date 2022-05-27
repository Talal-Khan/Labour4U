<?php
    session_start();
    
    $id=$_REQUEST['id'];
    $user_id=$_SESSION['user_id'];
    $exists=0;
    $date= $_REQUEST['date'];
    $time= date("H:i:s");
    include('connection.php');
    $qr="SELECT DATE FROM booking WHERE User_user_id='".$user_id."' AND Worker_worker_id='".$id."';";
    $r=mysqli_query($mysql,$qr);
    if(mysqli_num_rows($r)>0)
    {
        while($old_date=mysqli_fetch_array($r))
        {
            if($date==$old_date['DATE'])
            {
                $exists=1;
            }
        }   
    }
    if ($exists==1) {
        echo "You can only book a worker once per day!";    
    }
    else {
        $sq = "SELECT MAX(booking_id) as maxx FROM booking";
        $maxx = mysqli_query($mysql, $sq);
        $new_id=mysqli_fetch_array($maxx);
        $max=$new_id['maxx'] + 1;
        $query="INSERT INTO `projectdb`.`booking` (`DATE`, `TIME`, `User_User_id`, `Worker_worker_id`, `booking_id`, `done`) VALUES ('".$date."', '".$time."', '".$user_id."', '".$id."', '".$max."', '0')";
        $res= mysqli_query($mysql,$query);
        echo "Booking Success!";
    }
    
    
?>