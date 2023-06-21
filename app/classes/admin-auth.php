<?php 
require_once'dbconnection.php';
use App\classes\dbconnection;

class adminAuth{
    public function adminLoginCheck($data){
       $email=$data['email'];
       $password=$data['password'];

       $sql="SELECT * From admins WHERE email='$email' AND password='$password'";
       $excute=mysqli_query(dbconnection::databaseConnection(),$sql);

       $fetch_data=mysqli_fetch_assoc($excute);

       if($fetch_data){
        session_start();
        $_SESSION['id']=$fetch_data['id'];
        $_SESSION['email']=$fetch_data['email'];
        header('Location:admin-dashboard.php');
       } else{
            header('Location:index.php?message='.urlencode('Invalid email or password. Please give correct email and password.'));
       }
      
    }//end method


    //admin logout
    public function adminLogout(){
        session_start();
        session_destroy();
        header('Location:index.php');
    }//end method
}//end class
?>
