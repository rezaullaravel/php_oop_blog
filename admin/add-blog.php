<?php 
   require_once'../app/classes/category.php';
   require_once'../app/classes/blog.php';
   use App\classes\blog;
   use App\classes\dbconnection;
   
   session_start();
   
   
   if($_SESSION["id"]==null){
       header('Location:index.php');
   }
   
   //get all category
   $sql="SELECT * FROM categories";
   $data=mysqli_query(dbconnection::databaseConnection(),$sql);

   
   //add blog
   if(isset($_POST['submit'])){
    blog::saveBlog($_POST);
   }

  
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Add Blog</title>
      <!-- Tell the browser to be responsive to screen width -->
      <?php
         include('css.php'); 
         ?>


   </head>
   <body class="hold-transition skin-blue sidebar-mini">
      <div class="wrapper">
         <?php
            include('header.php');
            ?>
         <!-- Left side column. contains the logo and sidebar -->
         <?php
            include('sidebar.php');
            ?>
         <!-- Content Wrapper. Contains page content -->
         <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
               <div class="container" style="margin-top:50px;">
                  <div class="row">
                     <div class="col-md-2"></div>
                     <div class="col-md-8">
                        <?php 
                           if(isset($_GET['message'])){
                             echo '<h2 class="text-success" id="message">'.$_GET['message']; '</h2>';
                           }
                           ?>
                            <h2>Add Blog</h2>
                        <div class="box">
                           <div class="box-body">
                            
                              <form role="form" action="" method="POST" enctype="multipart/form-data">

                                 <div class="form-group">
                                    <label>Category Name</label>
                                    <select name="category_id" class="form-control" required="">
                                        <option  disabled selected>Select Category</option>
                                        <?php while($row=mysqli_fetch_assoc($data)){?>
                                        <option value="<?php echo $row['id'];?>"><?php echo $row['category_name'];?></option>
                                        <?php }?>
                                        
                                    </select>
                                 </div>

                                 <div class="form-group">
                                    <label>Blog Title</label>
                                    <input type="text" name="title" class="form-control" required="">
                                        
                                 </div>

                                 <div class="form-group">
                                    <label>Blog Description</label>
                                    <textarea name="description" class="form-control" required="" rows="7"></textarea>
                                        
                                 </div>

                                 <div class="form-group">
                                    <label>Blog Image</label>
                                    <input type="file" name="photo" class="form-control" required="">
                                        
                                 </div>

                                 <div class="form-group">
                                    <label>Author Name</label>
                                    <input type="text" name="author_name" class="form-control" required="">
                                        
                                 </div>

                                 <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" name="date" class="form-control" required="">
                                        
                                 </div>


                                 <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                              </form>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-2"></div>
                  </div>
                  <!--end row-->
               </div>
            </section>
            <!-- /.content -->
         </div>
         <!-- /.content-wrapper -->
         <?php
            include('footer.php');
            ?>
         <!-- Control Sidebar -->
         <!-- /.control-sidebar -->
         <!-- Add the sidebar's background. This div must be placed
            immediately after the control sidebar -->
         <div class="control-sidebar-bg"></div>
      </div>
      <!-- ./wrapper -->
      <?php
         include('js.php');
         ?>
   </body>

   <script>
      $(document).ready(function(){
        
      });
   </script>

   <script>
      $(document).ready(function(){

         $('#message').click(function(){
            $('#message').hide();
         })

});
   </script>
</html>