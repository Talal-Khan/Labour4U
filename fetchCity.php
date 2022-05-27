<?php
   include('connection.php');
      $users_arr= array();
      if(!empty($_REQUEST['name']))
      {
        $city=$_REQUEST['name'];
        $cities="SELECT * FROM AREA JOIN city ON city_id=City_city_id WHERE city_id='".$city."';";
        $q2=mysqli_query($mysql,$cities);
        
        while( $r2 = mysqli_fetch_array($q2) ){
          $userid = $r2['area_id'];
          $name = $r2['area_name'];
    
          $users_arr[] = array("area_id" => $userid, "area_name" => $name);
       }
        
        echo json_encode($users_arr);
        
          
      }
      
      ?>