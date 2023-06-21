<?php
namespace  App\classes;

require_once'dbconnection.php';

use App\classes\dbconnection;

class blog{

 //save blog
    public function saveBlog($data){
       
        $imageName=rand().$_FILES['photo']['name'];
        $directory='../assets/upload/';
        $imageUrl=$directory.$imageName;

        move_uploaded_file($_FILES['photo']['tmp_name'],$imageUrl);
       
       
        $category_id=$data['category_id'];
        $title=$data['title'];
        $description=$data['description'];
        $author_name=$data['author_name'];
        $date=$data['date'];
      
        $sql="INSERT INTO blogs VALUES('id','$category_id','$title','$description','$imageUrl','$author_name','$date')";

        

        if(mysqli_query(dbconnection::databaseConnection(),$sql)){
            header('Location:add-blog.php?message='.urlencode('Blog Created Successfully'));
        }
    
    }//end method


   
}//class end