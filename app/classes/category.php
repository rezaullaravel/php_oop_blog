<?php
namespace App\classes;
require_once'dbconnection.php';

use App\classes\dbconnection;


class category{
    //save category
    public function saveCategory($data){
        $categoryName=$data['category_name'];
        $sql="INSERT INTO categories(category_name) VALUES ('$categoryName')";

        if(mysqli_query(dbconnection::databaseConnection(),$sql)){
            header('Location:add-category.php?message='.urlencode('Category Added Successfully'));
        } else{
            die('Query problem'.mysqli_error(dbconnection::databaseConnection()));
        }
    }//end method



    //get all category
    public function getAllCategory(){
        $sql="SELECT * FROM categories ORDER BY id desc";

        if(mysqli_query(dbconnection::databaseConnection(),$sql)){
          $data=mysqli_query(dbconnection::databaseConnection(),$sql);
        //   $fetch=mysqli_fetch_assoc($data);
        //   echo '<pre>';
        //   print_r($fetch);
        return $data;
        } else{
            die('Query problem'.mysqli_error(dbconnection::databaseConnection()));
        }


    }//end method



    //get category by id
    public function getCategoryById($id){
        $sql="SELECT * FROM categories where id='$id'";

        if(mysqli_query(dbconnection::databaseConnection(),$sql)){
            $data=mysqli_query(dbconnection::databaseConnection(),$sql);
             $fetch=mysqli_fetch_assoc($data);
            // echo '<pre>';
            // print_r($fetch);
           return $fetch;
          } else{
              die('Query problem'.mysqli_error(dbconnection::databaseConnection()));
          }
    }//end method



    //update category
    public function updateCategoryById($data){
        $id=$data['id'];
        $categery_name=$data['category_name'];

        $sql="UPDATE categories SET category_name='$categery_name' Where id='$id'";

        if(mysqli_query(dbconnection::databaseConnection(),$sql)){
            header('Location:manage-categor.php?message='.urlencode('Category Updated Successfully'));
        } else{
            die('Query problem'.mysqli_error(dbconnection::databaseConnection()));
        }
    }//end method



}//end class
?>