<?php 
   require_once'../app/classes/category.php';
   use App\classes\category;
   
   session_start();
   
   
   if($_SESSION["id"]==null){
       header('Location:index.php');
   }
   
   
   
   //add category
   if(isset($_POST['submit'])){
    category::saveCategory($_POST);
   }

  
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Add Category</title>
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
                             echo '<h2 class="text-success">'.$_GET['message']; '</h2>';
                           }
                           ?>
                            <h2>Add Category</h2>
                        <div class="box">
                           <div class="box-body">
                            
                              <form role="form" action="" method="POST">
                                 <div class="form-group">
                                    <label>Category Name</label>
                                    <input type="text" name="category_name" class="form-control"  placeholder="Enter Category Name" required>
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
</html>