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
    <link rel="stylesheet" href="assets/css/lightbox.css" /> </head>

  <body>
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
                <li><a href="fpage.php">About Us</a></li>
                <li><a href="fpage.php">Home</a></li>
                
                
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
                </form>
                </li>   <?php 
                
                }
                else{?>
                <li>
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
      <section class="section contact-me" data-section="section4">
        <div class="container">
          <div class="section-heading">
            <h2>Contact Me</h2>
            <div class="line-dec"></div>
            
          </div>
          <div class="row">
            <div class="right-content">
              <div class="container">
                <form id="contact" action="" method="post">
                  <div class="row">
                    <div class="col-md-6">
                      <fieldset>
                        <input
                          name="name"
                          type="text"
                          class="form-control"
                          id="name"
                          placeholder="Your name..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-6">
                      <fieldset>
                        <input
                          name="email"
                          type="text"
                          class="form-control"
                          id="email"
                          placeholder="Your email..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <input
                          name="subject"
                          type="text"
                          class="form-control"
                          id="subject"
                          placeholder="Subject..."
                          required=""
                        />
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <textarea
                          name="message"
                          rows="6"
                          class="form-control"
                          id="message"
                          placeholder="Your message..."
                          required=""
                        ></textarea>
                      </fieldset>
                    </div>
                    <div class="col-md-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="button">
                          Send Message
                        </button>
                      </fieldset>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>

  </body>
</html>
