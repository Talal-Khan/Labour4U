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


    .card{
 margin-left: 10%;
    background-color: rgba(0, 0, 0, 0.849);
    margin-bottom: 30px;
   width: 75%;
    border-radius: 0;
    
    }
.lbtn{
    padding: 15px 25px;
	border: none;
	background-color: white;
    color: #black;
    margin-bottom: 60px;

}
.card-body{
    margin-top: 8px;
}

h1{
    text-align: center;
    /* margin-top: 50px; */
}
.card-container{
 overflow:scroll;
  align-items: center;
    margin-top: 50px;
    width:100%;
    
  
}
.outcard{
    display: inline-block;
    margin: 10% 10% 10% 35%;
    text-align: center;
    width: fit-content;
}
.outcard p{
    font-size: larger;
}
@import url('https://fonts.googleapis.com/css2?family=Manrope:wght@200&display=swap');



.cross {
    padding: 10px;
    color: #a43f49;
    cursor: pointer;
    font-size: 23px
}

.cross i {
    margin-top: -5px;
    cursor: pointer
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
    resize: none;
    border: 1px solid #a43f49
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #a43f49;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}

.send {
    color: #fff;
    background-color: #a43f49;
    border-color: #a43f49
}

.send:hover {
    color: #fff;
    background-color: #a43f49;
    border-color: #a43f49
}

.rating {
    display: inline-flex;
    margin-top: -10px;
    flex-direction: row-reverse
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 28px;
    font-size: 35px;
    color: #a43f49;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
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
    
                <?php }
                $_SESSION['login']=$logged_in; ?>             
            </div>
            <nav class="main-nav" role="navigation">
              <ul class="main-menu">
                <li><a href="fpage.php">Home</a></li>
                <li><a href="fpage.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <li>
                    <?php 
                    if(isset($_SESSION['user']))
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
     <?php 
      if(isset($_POST['logout']) || isset($_POST['login']) )
        {
            unset($_SESSION['user']);
            header('Location: userLogin.php');
        }
    ?>
      <section class="section about-me" data-section="section1">
        <div class="container">
    
    <?php    
       
        if(isset($_SESSION['user']) && isset($_SESSION['password'])){
        $uname=$_SESSION['user'];
        $user_id=$_SESSION['user_id'];
        include('connection.php');
    ?>    <h1><?php echo"$uname";?>'s Bookings</h1>
<?php
        $select="SELECT * FROM booking JOIN USER ON User_user_id=User_id  JOIN WORKER ON Worker_worker_id = worker.worker_id where User_id=$user_id";
        $query=mysqli_query($mysql,$select);
        
          if(mysqli_num_rows($query)>0)
          {
              while($row=mysqli_fetch_assoc($query))
              {?>

                  <div class="card ">
                      <div class="card-body" id="cardDiv">
                          <h5 class="card-title"><?php echo $row['fname'] ?></h5>
                          <p class="card-text time" id="<?php echo $row['TIME'] ?>">Time: <?php echo $row['TIME'] ?></p>
                          <p class="card-text date" id="<?php echo $row['DATE'] ?>">Date: <?php echo $row['DATE'] ?></p>
                          
                          <h5 class="card-title" id="<?php echo $row['booking_id'] ?>">
                    <?php 
                        if($row['done'] == 0 )
                        echo "<i>Booking Pending</i>";

                        elseif($row['done']==1){
                            echo "<i>Booking Approved</i>";
                            echo '<p id="'.$row["Worker_worker_id"].'"></p>';
                            echo '<button type="button" style="position:absolute; right:10px;bottom:10px;" class="btn btn-light complete" id="'.$row['booking_id'].'" data-toggle="modal" data-target="#form">Mark as Completed</button>';
                        }
                        else {
                            echo "<i>Job Done!</i>";
                        }
                    ?></h5>
                    </div>
            </div>
              
                  <?php
  
              }
          }
 

        }
       
        ?>
            </div>
        </div>

 <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="text-right cross"><button  data-dismiss="modal"> <i class="fa fa-times mr-2"></i></button> </div>
                <div class="card-body text-center"> <img src=" data:image/png;base64,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" height="100" width="100">
                    <div class="comment-box text-center">
                        <h4>Add a Review</h4>
                        <form  method="get" action="#">
                            <div class="rating"> 
                                <input type="radio" name="rating" value="5" id="5" onclick="postToController();">
                                <label for="5">☆</label> 
                                <input type="radio" name="rating" value="4" id="4" onclick="postToController();">
                                <label for="4">☆</label> 
                                <input type="radio" name="rating" value="3" id="3" onclick="postToController();">
                                <label for="3">☆</label> 
                                <input type="radio" name="rating" value="2" id="2" onclick="postToController();">
                                <label for="2">☆</label> 
                                <input type="radio" name="rating" value="1" id="1" onclick="postToController();">
                                <label for="1">☆</label> </div>
                            <div class="comment-area"> <textarea class="form-control" placeholder="what is your complain?" id="cmpln" rows="4"></textarea> </div>
                            <div class="text-center mt-4"> <button class="btn btn-success send px-5">Send message <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </form>        
                    </div>
                </div>
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

<script>
        var ratingValue='';
    function togglesidebar(){ 
        var el=   document.getElementById("sidebar");
        el.classList.toggle('active');
    }
    
    function postToController() {
        for (i = 0; i < document.getElementsByName('rating').length; i++) {
            if(document.getElementsByName('rating')[i].checked == true) {
                ratingValue = document.getElementsByName('rating')[i].value;
                break;
            }
        } 
        console.log(ratingValue);
    }
    $(document).ready(function(){
        
        
        var id,wid;
        $(".complete").click(function(){
            id=$(this).attr('id');
            wid=$(this).prev().attr('id');
            console.log(wid);
            
           
        });
        $(".send").click(function(){
            var message= $("#cmpln").val();
            // console.log(id+ " "+ ratingValue+ " "+message);
            
            $.ajax({
            type: 'post',
            data:{
            'id':id,
            'wid':wid,
            'rating':ratingValue,
            'complaint':message,},
            url: "rate.php",
            success:function(response){
                $("#"+id).remove();
               alert(response);  
                //alert("Clicked!"+id);
            }   
            });
            
            
        
        });
        
    });
    
    </script>

</body>

</html>