<?php
include "connection.php";


if(isset($_POST['submit'])){

    $uname = mysqli_real_escape_string($mysql,$_POST['username']);
    $password = mysqli_real_escape_string($mysql,$_POST['password']);
    
    if ($uname != "" && $password != ""){

        $sql_query = "select count(*) as cntUser,worker_id from worker where username='".$uname."' and password='".$password."'";
        $result = mysqli_query($mysql,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['cntUser'];
        $user_id= $row['worker_id'];

        if($count ==1){
            session_start();
            $_SESSION['wuser'] = $uname;
            $_SESSION['wpassword'] = $password;
            $_SESSION['worker_id']=$user_id;
            header('Location: wfpage.php');
        }else{
			echo ' <div class="alert alert-danger 
			alert-dismissible fade show" role="alert"> 
		<strong>Error!</strong> Invalid Credentials!
	
	<button type="button" class="close"
			data-dismiss="alert aria-label="Close"> 
			<span aria-hidden="true">×</span> 
	</button> 
	</div> ';
        }

    }

}
elseif ( isset($_POST['signup']) ) {
    header('Location: workerregister.php');
}
elseif (isset($_POST['switch'])) {
	header('Location: index.html');
}
?>

<html>
<head>
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
	background-image: url("https://www.trekkergroup.com/wp-content/uploads/2017/03/Basic-Personal-Protective-Equipment-PPE-for-Construction-Workers.jpg");
	background-repeat: no-repeat;
	background-size: 100% 720px;
}
.container{
	width: 500px;
	height: 450px;
	text-align: center;
	margin: 0 auto;
	background-color: rgba(44, 62, 80,0.7);
	margin-top: 160px;
}
.container img{
	width: 150px;
	height: 150px;
	margin-top: -60px;
}

input[type="text"],input[type="password"]{
	margin-top: 40px;
	height: 50px;
	width: 300px;
	font-size: 18px;
	margin-bottom: 20px;
	background-color: #fff;
	padding-left: 40px;
}
.form-input::before{
    content: "\f007";
	font-family: "FontAwesome";
	padding-left: 07px;
	padding-top: 40px;
	position: absolute;
	font-size: 35px;
	color: #2980b9; 
}

.form-input:nth-child(2)::before{
	content: "\f023";
}

.btn-login{
	padding: 15px 25px;
	border: none;
	background-color: #a43f49;
	color: #fff;
}

</style>


</head>

<body>



<div class="container">
	<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQyHzSkyzRYvjqztghldU6SwDjxZoSUJNA84w&usqp=CAU"/>
		
    <form method="post" action="">	
            <div class="form-input">
				<input type="text" id="username" name="username" placeholder="Enter the User Name"/>	
			</div>
			<div class="form-input">
				<input type="password" id="password" name="password" placeholder="password"/>
			</div>
			<input type="submit" id="submit" name="submit" value="LOGIN" class="btn-login"/>
            <input type="submit" id="submit" name="signup" value="SIGN UP" class="btn-login"/>
			<br>
			<input style="margin:10px" type="submit" id="submit" name="switch" value="Switch to user" class="btn-login"/>
		</form>
	</div>

</body>

</html>