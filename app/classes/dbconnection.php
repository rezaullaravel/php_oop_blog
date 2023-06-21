<?php 
namespace App\classes;

class dbconnection{
    public function databaseConnection(){
        $hostName='localhost';
        $userName='root';
        $password='';
        $databaseName='php_oop_blog';

        $link=mysqli_connect($hostName,$userName,$password,$databaseName);
        return  $link;

    }//end method
}//end class
?>