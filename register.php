<?php

$showAlert = false; 
$showError = false; 
$exists=false; 

if(isset($_REQUEST['cancel'])) {
    header('Location: userLogin.php');
} 
elseif(isset($_REQUEST['submit'])) { 
	
	// Include file which makes the 
	// Database Connection. 
	include 'connection.php'; 
    
    $fname = $_POST["fname"]; 
    $lname = $_POST["lname"]; 
    $cnic = $_POST["cnic"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];   
	$username = $_POST["username"]; 
	$password = $_POST["password"]; 
	$cpassword = $_POST["cpassword"]; 
			
	
	$sql = "Select * from user where username='".$username."'"; 
	
	$result = mysqli_query($mysql, $sql); 
	
    $num = mysqli_num_rows($result); 
    
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    

	// This sql query is use to check if 
	// the username is already present 
    // or not in our Database 
    if($lname!='' && $fname!='' && $cnic!='' && $phone!='' && $address!='' && $username!=''){
        if($num == 0) { 
            if(($password == $cpassword) && $exists==false) { 
                $sq = "SELECT MAX(User_id) as maxx FROM USER";
                $maxx = mysqli_query($mysql, $sq);
                $id=mysqli_fetch_array($maxx);
                $max=$id['maxx'] + 1;
				echo $max;
				mysqli_begin_transaction($mysql);
                try{
				$sql = "INSERT INTO `projectdb`.`user` (`User_id`, `fname`, `lname`, `cnic`, `phone_no`, `address`, `username`, `password`) VALUES ('".$max."', '".$fname."', '".$lname."', '".$cnic."', '".$phone."', '".$address."', '".$username."', '".$password."') "; 
        
                $result = mysqli_query($mysql, $sql); 
				mysqli_commit($mysql);
				}
				catch (mysqli_sql_exception $exception) {
					mysqli_rollback($mysqli);
				
					throw $exception;
				}	
				if ($result) { 
                    $showAlert = true; 
                } 
            } 
            else { 
                $showError = "Passwords do not match"; 
            }	 
        }// end if
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
	background-size: 100% 840px;
}

.form-group{
	width: 400px;
	margin: 0 auto;
}

.container{
	width: 550px;
	height: 760px;
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
        header('Location: userLogin.php');
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
		
	if($exists) { 
		echo ' <div class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
	
		<strong>Error!</strong> '. $exists.'
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
	
	<h1 class="text-center">Signup Here</h1> 
	<form action="#" method="post"> 
    
    	<div class="form-group"> 
			<label for="fname">First name</label> 
		<input type="text" class="form-control" id="fname" placeholder="First name"
			name="fname" aria-describedby="emailHelp">	 
		</div> 
    
        <div class="form-group"> 
			<label for="lname">Last name</label> 
		<input type="text" class="form-control" id="lname"  placeholder="Last name"
			name="lname" aria-describedby="emailHelp">	 
        </div> 
        
        <div class="form-group"> 
			<label for="cnic">CNIC</label> 
		<input type="text" class="form-control" id="cnic" placeholder="CNIC"
			name="cnic" aria-describedby="emailHelp">	 
		</div> 
        
        <div class="form-group"> 
			<label for="phone">Phone Number</label> 
		<input type="text" class="form-control" id="phone" placeholder="Phone Number"
			name="phone" aria-describedby="emailHelp">	 
		</div> 
    
        <div class="form-group"> 
			<label for="address">Address</label> 
		<input type="text" class="form-control" id="address" placeholder="Address"
			name="address" aria-describedby="emailHelp">	 
		</div> 
	
	
		<div class="form-group"> 
			<label for="username">Username</label> 
		<input type="text" class="form-control" id="username" placeholder="Username"
			name="username" aria-describedby="emailHelp">	 
		</div> 
	
		<div class="form-group"> 
			<label for="password">Password</label> 
			<input type="password" class="form-control" placeholder="Password"
			id="password" name="password"> 
		</div> 
	
		<div class="form-group"> 
			<label for="cpassword">Confirm Password</label> 
			<input type="password" class="form-control" placeholder="Rewrite password"
				id="cpassword" name="cpassword"> 
	
			<small id="emailHelp" class="form-text text-muted"> 
			Make sure to type the same password 
			</small> 
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