<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>
 <div class="row"><!-- row 1 Begin-->
   <div class="col-lg-12"><!-- col-lg-12 Begin-->
     <ol class="breadcrumb"><!-- breadcrumb Begin-->
       <li>

            <i class="fa fa-dashboard"></i> Dashboard / Insert Slides

       </li>
     </ol><!-- breadcrumb Finish-->
   </div><!-- col-lg-12 Finish-->
 </div><!-- row 1 Finish-->

 <div class="row"><!-- row 2 Begin-->
   <div class="col-lg-12"><!-- col-lg-12 Begin-->
     <div class="panel panel-default"><!--panel panel-default Begin-->
       <div class="panel-heading"><!--panel-heading Begin-->
         <h3 class="panel-title"><!--panel-title Begin-->

               <i class="fa fa-money fa-fw"></i> Insert Slide

         </h3><!--panel-title Finish-->
       </div><!--panel-heading Finish-->

       <div class="panel-body"><!-- panel-body Begin-->
         <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Begin-->
             <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Slide Name

                 </label><!--control-label col-md-3 Finish-->
                 <div class="col-md-6"><!--col-md-6 Begin-->

                   <input name="adverts_name" type="text" class="form-control">

                 </div><!--col-md-6 Finish-->
             </div><!-- form-group Finish-->

             <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Slide Image

                 </label><!--control-label col-md-3 Finish-->
                 <div class="col-md-6"><!--col-md-6 Begin-->

                 <input type="file" name="adverts_image" class="form-control">

                 </div><!--col-md-6 Finish-->
             </div><!-- form-group Finish-->



             <div class="form-group"><!-- form-group Begin-->
                   <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin--> </label><!--control-label col-md-3 Finish-->

                   <div class="col-md-6"><!--col-md-6 Begin-->

                       <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control">

                   </div><!--col-md-6 Finish-->
               </div><!-- form-group Finish-->

         </form><!-- form-horizontal Finish-->
      </div><!-- panel-body Finish-->

     </div><!--panel panel-default Finish-->
   </div><!-- col-lg-12 Finish-->
 </div><!-- row 2 Finish-->

 <?php

    if(isset($_POST['submit'])){

      $slide_name = $_POST['adverts_name'];
      $slide_image = $_FILES['adverts_image']['name'];

      $temp_name = $_FILES['adverts_image']['tmp_name'];
      $view_slides = "select * from adverts";
      $view_run_slide = mysqli_query($con,$view_slides);

      $count = mysqli_num_rows($view_run_slide);

      if($count<4){

           move_uploaded_file($temp_name,"slides_images/$slide_image");

           $insert_slide = "insert into adverts (adverts_name,adverts_image) values ('$slide_name','$slide_image')";

           $run_slide = mysqli_query($con,$insert_slide);

           echo "<script>alert('Your new slide image has been inserted successfully')</script>";

           echo "<script>window.open('index.php?view_slides','_self')</script>";

        }else{

          echo "<script>alert('Your have already inserted 4 Slides')</script>";
        }


    }

  ?>

<?php } ?>
