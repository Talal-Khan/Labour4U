<?php
    session_start();
    include('connection.php');
    $worker_id=$_SESSION['worker_id'];
    $worker_name=$_SESSION['wuser'];
    if(isset($_REQUEST['logout']))
    {
        session_unset();
        header('Location: workerLogin.php');
    }
?>

<html>
<head>
<title>Labour 4 You</title>
<meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link
      href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900"
      rel="stylesheet"
    />

<!-- <link rel="stylesheet" href="style3.css" /> -->
  <link rel="stylesheet" a href="css\font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

      <!-- Additional CSS Files -->
      <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-style.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/lightbox.css" />
  
  <style>
  .mbody{
    background-color: rgba(0, 0, 0, 0.849);
    color: white;
    display: block;
    margin: 10% 10% 10% 9%;
    text-align: center;
    width: 85%;
    height: 80%;
    /* overflow-y:scroll; */
    
}
.card-container{

    align-items: center;
    /* margin-top: 100px; */
    width:100%;
    height: 100%;
    overflow-y:scroll;
}
/* #sidebar{
    height: 100%;
} */
.btn{
  text-decoration: none;
  color: black;
}
.btn:hover{
  text-decoration: none;
    color: black;
}
.card{
    margin-left: 10%;
    background-color: rgba(0, 0, 0, 0.849);
    margin-bottom: 15px;
    width: 75%;
    border-radius: 0;
    }
    h5,p{
    color: white;
}
h2{
    text-align: center;
    
}
.card:hover{

  background-color: rgba(0, 0, 0, 0.849);
}

    
 
</style>
</head>

<body>
<!-- <nav class="nav navbar-static-top ">
  <div class="toggle-btn" onclick="togglesidebar()">
    <span></span>
    <span></span>
    <span></span>
  </div>
      <h3>Labour 4 You</h3> -->
     
<div id="page-wraper">
     
          <!-- Sidebar Menu -->
          <div class="responsive-nav">
        <i class="fa fa-bars" id="menu-toggle"></i>
        <div id="menu" class="menu">
          <i class="fa fa-times" id="menu-close"></i>
          <div class="container">
            <div class="image">
            <h2 class="name"><img src="https://www.pinclipart.com/picdir/big/91-919500_individuals-user-vector-icon-png-clipart.png"/></h2>
            </div>
            <div class="author-content">
            <?php
   
            $logged_in=0;
            if(isset($_SESSION['wuser']) && isset($_SESSION['worker_id'])){
                $wname=$_SESSION['wuser'];
            
                $logged_in=1;
       
                ?>
                <h4 class="name"><?php echo $wname;?></h4>

                <?php }
                $_SESSION['login']=$logged_in; ?>             
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="wfpage.php">Home</a></li>
                <li><a href="whis.php">History</a></li>
                <li><a href="wcomplains.php">Complains</a></li>
               
                
                <li>
                <?php 
                if(isset($_SESSION['wuser']))
                {?>
                <form method='post'>
                <input type="submit" value="Logout" name='logout' class="ln"/>
                </form>   <?php 
                }
                else{?>
                <form method='post'>
                <input type="submit" value="Login" name='login' class="ln"/>
                </form>
                <?php }?>
                </li>
              </ul>
            </nav>
            
          </div>
        </div>
      </div>
     
   
    
      <section class="section about-me" data-section="section1">
        <div class="container">
        <div class="card-container">
       
       <?php 
      // echo $worker_id." and ".$worker_name;
       ?>
       <div style="height: 80px;"></div>
       <h2> AVAILABLE JOBS 4 U </h2>
       <?php
       $select="SELECT * FROM booking JOIN USER ON User_user_id=User_id WHERE Worker_worker_id='".$worker_id."' and done=0";
       $query=mysqli_query($mysql,$select);
         if(mysqli_num_rows($query)>0)
         {
             while($row=mysqli_fetch_assoc($query))
             {?>
                 <div class="card ">
                     <div class="card-body">
                         <h5 class="card-title"><?php echo $row['fname'] ?></h5>
                         <p class="card-text">Phone# <?php echo $row['phone_no'] ?></p>
                         <p class="card-text date" id="<?php echo $row['DATE'] ?>">Date: <?php echo $row['DATE'] ?></p>
                         <a href="#" id="<?php echo $row['User_id']?>" class="btn btn-light class">Accept</a>
                     </div>
                 </div>
                 <?php
 
             }
         }
         else{?>
             <div class="card ">
             <div class="card-body">
                 <h5 class="card-title">Sorry!There are currently no jobs available in your area.</h5>
                 </div>
                 </div>
     <?php    }
 
 ?>

        </div>
      </section>

 
   

</div>
<script>
      function togglesidebar(){
     //alert("hi");
     var el=   document.getElementById("sidebar");
    // var tb=document.getElementsByClassName("toggle-btn");
    //alert(el.outerHTML);
    //tb.classList.toggle('active');
    el.classList.toggle('active');
      }
    </script>
    <script>
    $('.class').click(function(){  
        id=$(this).attr('id');
        date=$(this).prev().attr('id');
        console.log(id);
        console.log(date);  
        $.ajax({
            type: "POST",
            data: {
            'id':id,
            'date':date,
            },
            url: "booked.php",
            success: function(msg){
            $('#'+id).remove();   
            alert(msg);
            }
        });
    });
    function togglesidebar(){
     //alert("hi");
     var el=   document.getElementById("sidebar");
    // var tb=document.getElementsByClassName("toggle-btn");
    //alert(el.outerHTML);
    //tb.classList.toggle('active');
    el.classList.toggle('active');
      }


</script>

</body>

</html>