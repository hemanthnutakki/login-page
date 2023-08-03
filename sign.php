<?php
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username=$_POST['username'];
    $password=$_POST['password']; 

   // $sql="insert into `registration`(username,password) values('$username','$password')";
   //$result=mysqli_query($con,$sql);

  //  if($result){
    //    echo "Data inserted successfully";
    //}else{
    //    die(mysqli_error($con));
    //}

    $sql="Select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
            $num=mysqli_num_rows($result);
            if($num>0){
                //echo "USER ALREADY EXIST";
                $user=1;
                header('location:register.php');
            }else{
                 
              $sql="insert into `registration`(username,password) values('$username','$password')";
              $result=mysqli_query($con,$sql);
              if($result){
               // echo "Data inserted successfully";
               $success=1;
            }else{
                die(mysqli_error($con));
            }
            }
        }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Signup page</title>
  </head>
  <body>

  <?php
if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>SORRY!!</strong> USER ALREADY EXISTS.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

  ?>

<?php
if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!!</strong> YOU ARE SUCCESSFULLY SIGNEDUP.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

  ?>
    <h1 class="text-center">Welcome To The Page</h1>
    <div class="container mt-5">
    <form action="sign.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password">
  </div>

  <button type="submit" class="btn btn-primary w-25 ">SIGN UP</button>
</form>
    </div>

  </body>
</html>