<?php
   include('connection.php');
      $users_arr= array();
      if(!empty($_REQUEST['name']))
      {
        $country=$_REQUEST['name'];
        $cities="SELECT * FROM city JOIN country ON country_id=Country_country_id where country_name='".$country."'";
        $q2=mysqli_query($mysql,$cities);
        
        while( $r2 = mysqli_fetch_array($q2) ){
          $userid = $r2['city_id'];
          $name = $r2['city_name'];
    
          $users_arr[] = array("city_id" => $userid, "city_name" => $name);
       }
        
        echo json_encode($users_arr);
        
          
      }
      
      ?>