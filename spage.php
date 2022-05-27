<?php
  session_start();
  if(isset($_SESSION['user']) && isset($_SESSION['password'])){
    $uname=$_SESSION['user'];
    $pword=$_SESSION['password'];
    $user_id=$_SESSION['user_id'];
    
    
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
    body{
	margin: 0 auto;
	background-image: url("https://img.freepik.com/free-vector/happy-international-labour-day-people-group-different-occupation-set-using-medical-masks_204997-33.jpg?size=626&ext=jpg");
	background-repeat: no-repeat;
  background-size: 100% 720px;
 
}
  
.btn{
  text-decoration: none;
  color: white;
}
.btn:hover{
  text-decoration: none;
color: white;
}
.card{
  background-color: rgba(0, 0, 0, 0.10);
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
                <li><a href="his.php">History</a></li>
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

    <section class="section about-me" data-section="section1" id="sec1">
        <div class="container">
        <div class="mbody">
    <h3 id='target'>Choose location and</h3>
    <h5><?php
     if(isset($_POST['logout']) || isset($_POST['login']) )
     {
         unset($_SESSION['user']);
         header('Location: userLogin.php');
     } 
        include('connection.php');
        $proff=$_REQUEST['occ']; 
        $logged_in=$_SESSION['login'];
        echo "<h3>Select a</h3>"."<h3 id='occc'>".$proff."</h3>";
        $_SESSION['occup'] = $proff;
        $countries="select * from country";
        $areas="select * from area";
        $q1=mysqli_query($mysql,$countries);
        $q3=mysqli_query($mysql,$areas);
    ?></h5>
    <h3 id='<?php echo $logged_in ?>' class='loginstat'></h3>
    <p>Country: 
      <form method='post'>
          <select id="select" name='countries'>
             <option value=0>-</option>
            <?php 
            if(mysqli_num_rows($q1)>0 )
            {
              while($r1=mysqli_fetch_array($q1) )
              {
              ?>
            <option  value=<?php echo $r1['country_name'] ?> ><?php echo $r1['country_name'] ?> </option>
            <?php
                
              }
            }
    
?> 
    </select>
    
    </form>
    </p>

    <p>City: 
      <form >
        <select id='city_select' name='cities'>
          <option>-</option>
             </select>
      </form>
    </p>

    <p>Area: 
      <form >
      <select id='area_select' name='areas'>
        <option>-</option>
            </select>
      </form>
    </p>
    <br>    
      <div id='btn1' class="card" >
          
      </div>
      
      <!-- main body --></div>
     <!-- mb--> </div>

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
$(document).ready(function(){
  
  
    $('#select').change(function(){
     var name = $('#select').val();
     console.log(name);
     $.ajax({
      type: 'post',
      data: {'name':name},
      dataType: 'json',
      url: "fetchCountry.php",
      success:function(response){
        var len = response.length;
        $("#city_select").empty();
        $("#city_select").append("<option value=0>-</option>");
        for( var i = 0; i<len; i++){
            var id = response[i]['city_id'];
            var name = response[i]['city_name'];
        $("#city_select").append("<option value='"+id+"'>"+name+"</option>");
         }   
      }
     });
    });

    $('#city_select').change(function(){
     var name = $('#city_select').val();
     console.log(name);
     $.ajax({
      type: 'post',
      data: {'name':name},
      dataType: 'json',
      url: "fetchCity.php",
      success:function(response){
        var len = response.length;
        $("#area_select").empty();
        $("#area_select").append("<option value=0>-</option>");
        for( var i = 0; i<len; i++){
            var id1 = response[i]['area_id'];
            var name1 = response[i]['area_name'];
        $("#area_select").append("<option value='"+name1+"'>"+name1+"</option>");
         }   
      }
     });
    });
  

    $('#area_select').change(function(){
     var name = $('#area_select').val();
     var occ= $('#occc').text();
     $("#btn1").empty();
     $.ajax({
      type: 'post',
      data: {'name':name, 'occ':occ},
      dataType: 'json',
      url: "fetchArea.php",
      success:function(response){
        $('.card').show();
        var len = response.length;
        for( var i = 0; i<len; i++){
            var area_name = response[i]['area'];
            var worker_name = response[i]['worker_name'];
            var worker_id = response[i]['worker_id'];
            var phone_no = response[i]['phone_no'];
            var rate= response[i]['rating'];
            if(rate==null)
            rate='-';
            $("#btn1").append('<div class="card-header" id="headingTwo"><h2 class="mb-0" style="float:left;" ><button  style="padding: 0px;" class="btn btn-link collapsed apni" type="button" data-toggle="collapse" data-target="#id'+worker_id+'" aria-expanded="false" aria-controls="collapseFive"><h5> '+worker_name+' </h5></button></h2><button style="padding: 0px;float:right;" class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapsefour"><i class="fa fa-plus-circle" style="color:black" aria-hidden="true"></i></button></div><div id="id'+worker_id+'" class="collapse apni" aria-labelledby="headingTwo" ><div class="card-body"><p>Phone no:'+phone_no+'</p><p>Area :'+area_name+'</p><p>Rating:'+rate+'/5</p><input id="datet" type="date"><button id="'+worker_id+'" class="class">Book</button></div></div>');
            console.log(area_name,worker_name,worker_id,phone_no);
       } 
       ajaxcall1();

      }
     });
    });
  function ajaxcall1(){
    var stat=$('.loginstat').attr('id');
    console.log('thiss'+stat);
    
    
        $('.class').click(function(){
        var d = new Date();
        var strDate = d.getFullYear() + "-" + (d.getMonth()+1) + "-" + d.getDate();
        date=$(this).prev().val();
        console.log(strDate);
        if(stat!= 1){
          alert("Login First!");
       }  
       else{
        if(date=='' || date<strDate){
          alert("Choose a Valid Date First!");
        }
         else{
          
          id=$(this).attr('id'); 
          console.log(id);  
          console.log("hello worlds");
          
          $.ajax({
            type: "POST",
            data: {
            'id':id,
            'date':date,
            },
            url: "booking.php",
            success: function(msg){
              if(msg!= "You can only book a worker once per day!"){
                $('#'+id).remove();
              }
              alert(msg);
            }
        });
        }
       }
        });

  }
    
  
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


</script>

</body>

</html>