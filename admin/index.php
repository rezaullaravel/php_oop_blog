<?php 
require_once('../app/classes/admin-auth.php');


$admin=new adminAuth();
$message='';

if(isset($_POST['sub'])){
    $message=$admin->adminLoginCheck($_POST);
}

session_start();
if(isset($_SESSION["id"])){
    header('Location:admin-dashboard.php');
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Admin login</title>
</head>
<body>
  
<div class="container" style="margin-top:50px;">
    <div class="row">
        <div class="col-sm-8 offset-md-2">
            <div class="card">
                <div class="card-body">
                    <h2 class="text-center text-white bg-success">Admin panel</h2>
                    <?php 
                    if(isset($_GET['message'])){
                        echo '<h3 class="text-danger">'.$_GET['message'].'</h3>';
                    }
                    ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control"  placeholder="Enter email" required>
                        
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control"  placeholder="Password" required>
                    </div>
                
                   <button type="submit" name="sub" class="btn btn-success">Login</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>