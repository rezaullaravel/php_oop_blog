<?php 
   require_once'../app/classes/category.php';
   use App\classes\category;
   
   session_start();
   
   
   if($_SESSION["id"]==null){
       header('Location:index.php');
   }
   
   
   
   //view category
   //  $data=category::getAllCategory();

   
   
 
  
   ?>
<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Manage Category</title>
      <!-- Tell the browser to be responsive to screen width -->
      <?php
         include('css.php'); 
         ?>

         <style>
            .linkdsgn{
               font-size: 15px;
               margin: 4px;
               margin-top: 8px;
               display: inline-block;
               padding: 8px;
            }
         </style>
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
                            <h2>All Category</h2>
                        <div class="box">
                           <div class="box-body">
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Name</th>
                                        <th>Action</th>
                                    </tr>
                                 </thead>

                                 <tbody>
                                    <?php
                                    $sql1="SELECT * FROM categories";
                                    $conn1=mysqli_connect('localhost','root','','php_oop_blog');
                                  
                                    $data1=mysqli_query($conn1,$sql1);
                                    $num_rows=mysqli_num_rows($data1);
                                    $divied_num= ($num_rows/5) + 1;
                                    $offset='';
                                    $pageno_increment='';
                                    $pageno_decrement='';
                                    if(isset($_GET['pageno'])){
                                       $pageno=$_GET['pageno'];
                                       $offset= ($pageno-1)*5;
                                       $pageno_decrement=$pageno-1;
                                       $pageno_increment=$pageno+1;
                                    } else{
                                       $offset=0;
                                       $pageno=1;
                                    }
                                
  
                                    $sql="SELECT * FROM categories LIMIT 5  OFFSET $offset";
                                    $conn=mysqli_connect('localhost','root','','php_oop_blog');
                                  
                                    $data=mysqli_query($conn,$sql);
                                    ?>
                                <?php while($result=mysqli_fetch_assoc($data)){?>    
                                    <tr>
                                        <td><?php echo $result['id'];?></td>
                                        <td><?php echo $result['category_name'];?></td>
                                       
                                        <td>
                                            <a href="edit-category.php?id=<?php echo $result['id'];?>" class="btn btn-success">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                 </tbody>
                              </table>
                              <?php
                              if($pageno_decrement<1){
                                 echo "<span class='label  bg-red linkdsgn'><< PREVIOUS</span>";
                              } else {
                                 echo "<a href='manage-categor.php?pageno=$pageno_decrement'><span class='label  bg-red linkdsgn'><< PREVIOUS</span></a>";
                              }
                             
                              for($x=1; $x<$divied_num; $x++){
                                 if($pageno==$x){
                                    echo "<span class='label  bg-red linkdsgn'>$x</span>";
                                 } else {
                                    echo "<span><a href='manage-categor.php?pageno=$x' class='label  bg-green linkdsgn'> $x </a></span>";
                                 }

                              
                              } 

                             

                              

                              if($offset==0 && $pageno==1){
                                 echo "<a href='manage-categor.php?pageno=2'><span class='label  bg-red linkdsgn'> NEXT >></span></a>";
                              } else{

                                 if($pageno_increment>=$divied_num){
                                    echo "<span class='label  bg-red linkdsgn'> NEXT >></span>";
                                 } else {
                                    echo "<a href='manage-categor.php?pageno=$pageno_increment'><span class='label  bg-red linkdsgn'> NEXT >></span></a>";
                                 }

                              }

                             
                                ?>
                             
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