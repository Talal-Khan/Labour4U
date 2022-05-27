<?php

$showAlert = false; 
$showError = false; 
$existss=false; 

if(isset($_REQUEST['cancel'])) {
    header('Location: workerLogin.php');
} 
elseif(isset($_REQUEST['submit'])) { 
	
	// Include file which makes the 
	// Database Connection. 
	include 'connection.php'; 
    
    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"]; 
    $cnic = $_POST["cnic"];
    $phone = $_POST["phone"];
    $occupation = $_POST["occupation"];
    $country = $_POST["country"];   
    $city = $_POST["city"];   
    $area = $_POST["area"];   
    $username = $_POST["username"]; 
	$password = $_POST["password"]; 
	$cpassword = $_POST["cpassword"]; 
            
    $c_id = '';
	$a_id = '';
	$occ_id = '';
    $city_id = '';

    $check = "SELECT country_id FROM country WHERE country_name = '".$country."' ";
    $qry = mysqli_query($mysql , $check );
    $rowCheck=mysqli_num_rows($qry);

        if ($rowCheck>0) { // if data exist update the data
            $id=mysqli_query($mysql,"SELECT country_id from country WHERE country_name='".$country."'");  
            $c_id = mysqli_fetch_array($id);
        }
        else{ // insert the data if data is not exist

            $sq = "SELECT MAX(country_id) as maxx FROM country";
                $maxx = mysqli_query($mysql, $sq);
                $id=mysqli_fetch_array($maxx);
                $max=$id['maxx'] + 1;
              //  echo $max;
                $res = mysqli_query($mysql, "INSERT INTO `projectdb`.`country` (`country_id`, `country_name`) VALUES ('".$max."', '".$country."') "); 
                $id=mysqli_query($mysql,"SELECT country_id from country WHERE country_name='".$country."'");  
                $c_id = mysqli_fetch_array($id);
        
        }
    
        
    $check2 = "SELECT city_id FROM city WHERE city_name = '".$city."' ";
    $qry2 = mysqli_query($mysql , $check2 );
    $rowCheck2 =mysqli_num_rows($qry2);

        if ($rowCheck2>0) { // if data exist update the data
            $_id=mysqli_query($mysql,"SELECT city_id from city WHERE city_name='".$city."'");  
			$city_id = mysqli_fetch_array($_id);
		}
        else{ // insert the data if data is not exist

            $sq = "SELECT MAX(city_id) as maxx FROM city";
                $maxx = mysqli_query($mysql, $sq);
                $id1=mysqli_fetch_array($maxx);
                $max=$id1['maxx'] + 1;
			   // echo $max;
			    $c_idd=$c_id['country_id'];
			    $v="INSERT INTO `projectdb`.`city` (`city_id`, `city_name`, `Country_country_id`) VALUES ('".$max."', '".$city."', '".$c_idd."') ";
                $res = mysqli_query($mysql, $v); 
                $id=mysqli_query($mysql,"SELECT city_id from city WHERE city_name='".$city."'");  
                $city_id = mysqli_fetch_array($id);
    
        }

        
        $check3 = "SELECT area_id FROM area WHERE area_name = '".$area."' ";
        $qry3 = mysqli_query($mysql , $check3 );
        $rowCheck3 =mysqli_num_rows($qry3);
    
            if ($rowCheck3>0) { // if data exist update the data
                $a_id=mysqli_query($mysql,"SELECT area_id from area WHERE area_name='".$area."'");  
				$a_idd=$a_id['area_id'];
			}
            else{ // insert the data if data is not exist
    
                $sq = "SELECT MAX(area_id) as maxx FROM area";
                    $maxx = mysqli_query($mysql, $sq);
                    $id=mysqli_fetch_array($maxx);
                    $max=$id['maxx'] + 1;
				//    echo $max;
					$city_idd=$city_id['city_id'];
                    $res = mysqli_query($mysql, "INSERT INTO `projectdb`.`area` (`area_id`, `area_name`, `City_city_id`) VALUES ('".$max."', '".$area."', '".$city_idd."') "); 
                    $id=mysqli_query($mysql,"SELECT area_id from area WHERE area_name='".$area."'");  
                    $a_id = mysqli_fetch_array($id);
					$a_idd=$a_id['area_id'];
            }
    
			
			$checkk = "SELECT occ_id FROM occupation WHERE occup = '".occupation."' ";
			$qryy = mysqli_query($mysql , $checkk );
			$rowCheckk=mysqli_num_rows($qryy);
		
				if ($rowChecky>0) { // if data exist update the data
					$id=mysqli_query($mysql,"SELECT occ_id from country WHERE occup='".$occupation."'");  
					$occ_id = mysqli_fetch_array($id);
				}
				else{ // insert the data if data is not exist
		
					$sq = "SELECT MAX(occ_id) as maxx FROM occupation";
						$maxx = mysqli_query($mysql, $sq);
						$id=mysqli_fetch_array($maxx);
						$max=$id['maxx'] + 1;
					  //  echo $max;
						$res = mysqli_query($mysql, "INSERT INTO `projectdb`.`occupation` (`occ_id`, `occup`) VALUES ('".$max."', '".$occupation."') "); 
						$id=mysqli_query($mysql,"SELECT occ_id from country WHERE occup='".$occupation."'");  
						$occ_idd = mysqli_fetch_array($id);
						$occ_id = $occ_idd['occ_id'];
				
				}




	$sql = "Select * from worker where username='".$username."'"; 
	
	$result = mysqli_query($mysql, $sql); 
	
    $num = mysqli_num_rows($result); 
    
    
    

	// This sql query is use to check if 
	// the username is already present 
    // or not in our Database 
    if($lname!='' && $fname!='' && $cnic!='' && $phone!='' && $a_idd!='' && $username!=''){
        if($num == 0) { 
            if(($password == $cpassword) && $exists==false) { 
                $sq = "SELECT MAX(worker_id) as maxx FROM worker";
                $maxx = mysqli_query($mysql, $sq);
                $id=mysqli_fetch_array($maxx);
                $max=$id['maxx'] + 1;
                echo $max;
                $sql = "INSERT INTO `projectdb`.`worker` (`worker_id`, `fname`, `lname`, `cnic`, `phone_no`, `Area_area_id`, `username`, `password`) VALUES ('".$max."', '".$fname."', '".$lname."', '".$cnic."', '".$phone."', '".$a_idd."', '".$username."', '".$password."') "; 
				
				$sqry = "INSERT INTO `projectdb`.`works_on` (`Worker_worker_id`,  `Occupation_occ_id`) VALUES ('".$max."',  '".$occ_id."') ;";
				
				$result = mysqli_query($mysql, $sql); 
				$res = mysqli_query($mysql, $sqry);
				

                if ($result) { 
                    $showAlert = true; 
                } 
            } 
            else { 
                $showError = "Passwords do not match"; 
            }	 
		}
		else {
			$showError = "User already exists";
		}
    }
    else
    {
        $showError = "All fields should be filled";
    }
	 
	
if($num>0) 
{ 
	$exists="Username not available"; 
} 
	
}//end if

	
?> 
	
<!doctype html> 
	
<html lang="en"> 

<head> 
	
	<!-- Required meta tags --> 
	<meta charset="utf-8"> 
	<meta name="viewport" content= 
		"width=device-width, initial-scale=1, 
		shrink-to-fit=no"> 
	
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" a href="css\font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>

body{

	margin: 0 auto;
	background-image: url("https://images.unsplash.com/photo-1522147032588-5b9c5a04ec70?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80");
	background-repeat: no-repeat;
	background-size: 100% 1500px;
}

.form-group{
	width: 400px;
	margin: 0 auto;
}

.container{
	width: 550px;
	height: 950px;
	/* text-align: center; */
	margin: 0 40px;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 40px;
}

.btn-login{
	padding: 15px 25px;
	margin-top: 20px;
	margin-left: 65px;
	width: 150px;
	border: none;
	background-color: #a43f49;
	color: #fff;
}

#text{
	color: white;
	font-size: bold ;
}

.form-control{
	margin-bottom: 10px;
}

</style>


</head> 
	
<body> 
	
<?php 
	
	if($showAlert) { 
	
		echo ' <div class="alert alert-success 
			alert-dismissible fade show" role="alert"> 
	
			<strong>Success!</strong> Your account is 
			now created and you can login. 
			<button type="button" class="close"
				data-dismiss="alert" aria-label="Close"> 
				<span aria-hidden="true">×</span> 
			</button> 
        </div> '; 
        header('Location: workerLogin.php');
	} 
	
	if($showError) { 
	
		echo ' <div class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
		<strong>Error!</strong> '. $showError.'
	
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close"> 
			<span aria-hidden="true">×</span> 
	</button> 
	</div> '; 
} 
		
	if($existss) { 
		echo ' <div class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
	
		<strong>Error!</strong> '. $existss.'
		<button type="button" class="close"
			data-dismiss="alert" aria-label="Close"> 
			<span aria-hidden="true">×</span> 
		</button> 
	</div> '; 
	} 

?> 


<div style="width:100%;height:820px;margin:0px;display:flex;justify-content:center;"> 

<div style="width:50%;height:820px; ">

<div class="container my-4 "> 
	
	<h1 style="color: white; margin-top:10px;" class="text-center">Signup Here</h1> 
	<form action="#" method="post"> 
    
    	<div class="form-group"> 
			<text id="text">First name</text> 
		<input type="text" class="form-control" id="fname" placeholder="First name"
			name="fname" aria-describedby="emailHelp">	 
		</div> 
    
        <div class="form-group"> 
			<text id="text">Last name</text> 
		<input type="text" class="form-control" id="lname"  placeholder="Last name"
			name="lname" aria-describedby="emailHelp">	 
        </div> 
        
        <div class="form-group"> 
			<text id="text">CNIC</text>
		<input type="text" class="form-control" id="cnic" placeholder="CNIC"
			name="cnic" aria-describedby="emailHelp">	 
		</div> 
        
        <div class="form-group"> 
			<text id="text">Phone Number</text> 
		<input type="text" class="form-control" id="phone" placeholder="Phone Number"
			name="phone" aria-describedby="emailHelp">	 
		</div> 

		<div class="form-group"> 
			<text id="text">Occupation</text> 
			<input type="text" class="form-control" placeholder="Occupation"
			id="occupation" name="occupation"> 
		</div> 

        <div class="form-group"> 
			<text id="text">Country</text> 
		<input type="text" class="form-control" id="country" placeholder="Country"
			name="country" aria-describedby="emailHelp">	 
		</div> 
	
        <div class="form-group"> 
			<text id="text">City</text>
		<input type="text" class="form-control" id="city" placeholder="City"
			name="city" aria-describedby="emailHelp">	 
		</div> 

        <div class="form-group"> 
			<text id="text">Area</text> 
		<input type="text" class="form-control" id="area" placeholder="Area"
			name="area" aria-describedby="emailHelp">	 
		</div> 
	
		<div class="form-group"> 
			<text id="text">Usermame</text> 
		<input type="text" class="form-control" id="username" placeholder="Username"
			name="username" aria-describedby="emailHelp">	 
		</div> 
	
		<div class="form-group"> 
			<text id="text">Password</text>
			<input type="password" class="form-control" placeholder="Password"
			id="password" name="password"> 
		</div> 
	
		<div class="form-group"> 
			<text id="text">Confirm Password</text> 
			<input type="password" class="form-control" placeholder="Rewrite password"
				id="cpassword" name="cpassword"> 
	
		</div>	 
	
		<input type="submit" name="submit" value="SignUp" class="btn-login"/> 
        <input type="submit" name="cancel" value="Cancel" class="btn-login"/> 
		 
		 
	</form> 
</div> 

</div>

<div style="width:50%;height:820px;">
<img style="margin-top: 190px; margin-left: 60px;" src="https://cdn4.iconfinder.com/data/icons/professions-2-5/66/82-512.png" >
</div>

</div>


	
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS  --->
	
<script src=" 
https://code.jquery.com/jquery-3.5.1.slim.min.js" 
	integrity=" 
sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
	crossorigin="anonymous"> 
</script> 
	
<script src=" 
https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
	integrity= 
"sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
	crossorigin="anonymous"> 
</script> 
	
<script src=" 
https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" 
	integrity= 
"sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
	crossorigin="anonymous"> 
</script> 
</body> 
</html>