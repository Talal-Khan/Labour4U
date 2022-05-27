<?php
      include('connection.php');
      $users_arr= array();
      if(1)
      {
        $area=$_REQUEST['name'];
        $occu=$_REQUEST['occ'];
        $select="SELECT * FROM worker JOIN works_on ON worker_id=Worker_worker_id JOIN occupation ON occ_id=Occupation_occ_id JOIN AREA ON Area_area_id=area_id  WHERE area_name='".$area."' AND occup='".$occu."'";
        $query=mysqli_query($mysql,$select);
        while( $r3 = mysqli_fetch_array($query) ){
          $avg="SELECT AVG(Rating_rate_id) AS rating FROM relation_11 JOIN booking ON Booking_booking_id=booking_id JOIN worker ON Worker_worker_id=worker_id WHERE worker_id='".$r3['worker_id']."' ";
          $qry=mysqli_query($mysql,$avg);
          $arr=mysqli_fetch_array($qry);
          $rate= $arr['rating'];
          $worker_id = $r3['worker_id'];
          $area_name = $r3['area_name'];
          $worker_name=$r3['fname'];
          $phone= $r3['phone_no'];
          
          $users_arr[] = array("area" => $area_name,
                                "worker_id"=>$worker_id,
                                "worker_name" => $worker_name,
                                "phone_no" => $phone,
                                "rating"=> $rate ,);
       }
        
        echo json_encode($users_arr);
        
          
      }
      
      ?>