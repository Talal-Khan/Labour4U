<?php
     session_start();
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
    .boxes{
        display: inline;
        border: transparent;
        padding: 5px;
        height: 80px;
       width: 100%;
        box-shadow: rgba(43, 42, 42, 0.644);
        border-radius: 15px;
      
    }
    .boxes:hover{
        background-color: #a43f49;
        color: white;
        box-shadow: 3px black;
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
            if(isset($_SESSION['user']) && isset($_SESSION['password'])){
                $uname=$_SESSION['user'];
                $pword=$_SESSION['password'];
                $user_id=$_SESSION['user_id'];
                $logged_in=1;
                
               ?>
                <h4 class="name"><?php echo $uname;?></h4>

                <?php }
                $_SESSION['login']=$logged_in; ?>             
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="#sec1">About Us</a></li>
                <li><a href="#sec2">Home</a></li>

                <li><a href="contact.php">Contact Us</a></li>
                <?php
   
             $logged_in=0;
            if(isset($_SESSION['user']) && isset($_SESSION['password'])){
            $uname=$_SESSION['user'];
            $pword=$_SESSION['password'];
            $user_id=$_SESSION['user_id'];
            $logged_in=1;
       
            ?>
    
            <?php }
            $_SESSION['login']=$logged_in; ?>
                
                <?php 
                if(isset($_SESSION['user']))
                {?>
                <li><a href="his.php">History</a></li>
                <li>
                <form method='post'>
                <input type="submit" value="Logout" name='logout' class="ln"/>
                </form>   <?php 
                }
                else{?>
                <form method='post'>
                <input type="submit" value="Login" name='login' class="ln"/>
                </form>
                </li>
                <?php }?>
                
              </ul>
            </nav>
            
          </div>
        </div>
      </div>
     
    <?php 
    if(isset($_POST['logout']) || isset($_POST['login']) )
    {
        unset($_SESSION['user']);
        header('Location: userLogin.php');
    }
    ?>

    <section class="section about-me" data-section="section1" id="sec1">
        <div class="container">
          <div class="section-heading">
            <h2>About Us</h2>
            <div class="line-dec"></div>
            
          </div>
          <div class="left-image-post">
            <div class="row">
              <div class="col-md-6">
                <div class="left-image">
                  <img src="https://images.unsplash.com/photo-1508873535684-277a3cbcc4e8?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1500&q=80" alt="" />
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-text">
                  <h4>What are we here for?</h4>
                  <p>
                      We provide you opportunity at your doorstep.
                      All you have to do is select the labour's profession
                      as per your need and hire that labour.
                      <br> AND ENJOY OUR SERVICES!
                  </p>
                
                </div>
              </div>
            </div>
          </div>
          <div class="right-image-post">
            <div class="row">
              <div class="col-md-6">
                <div class="left-text">
                  <h4>Quid enim hic sumus </h4>
                  <p>
                    Nos providebit vobis potestas vestra in limine.
                      Professionem facere omnia opera selecta
                      et opus vestrum quasi per pretium ut labore.
                      <br> Services et VIVO!

                  </p>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="right-image">
                  <img src="https://images.unsplash.com/photo-1514411959691-a8f39b0ac8b8?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=810&q=80" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    
      <section class="section " data-section="section1" id="sec2">
        <div class="container">
        </div>
    <div class="main-container">
     
    <div style="height:80px "></div>
    <div style="margin-left:180px">
    <h1>AVAILABLE LABOURS 4 U</h1>
    </div>
    <br>
    <?php
    
    include('connection.php');
    $select= "SELECT occup FROM occupation;";
    $query=mysqli_query($mysql,$select);
  
   
  ?> <div class="wrapper">
      <?php
    if(mysqli_num_rows($query)>0)
    {
      // fetch data in the form of object
     
        while($row=mysqli_fetch_assoc($query))
        {
           
        ?>
       
          <div class="main-form">
          <form method="post" action="spage.php" >
            <?php
            // show each data 
          
            {?>
            <div class="box">
           
              <p>  <input class="boxes"type="submit"  name="occ" value="<?php print_r($row['occup'] ); ?>" /></p>
             
            </div>
            <?php 
        }  ?>
           
         
          </form>
          </div>
      
            <?php

        }
    }
    
?>
  </div>
 </div>
</div>

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
    
</body>

</html>