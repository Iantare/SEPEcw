<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>

 <?php
       if(isset($_GET['edit_slide'])){

          $edit_slide_id = $_GET['edit_slide'];

          $edit_slide = "select * from adverts where adverts_id='$edit_slide_id'";
          $run_edit_slide = mysqli_query($con,$edit_slide);
          $row_slide = mysqli_fetch_array($run_edit_slide);

          $slide_id = $row_slide['adverts_id'];
          $slide_name = $row_slide['adverts_name'];
          $slide_image = $row_slide['adverts_image'];



       }


  ?>
 <div class="row"><!-- row 1 Begin-->
   <div class="col-lg-12"><!-- col-lg-12 Begin-->
     <ol class="breadcrumb"><!-- breadcrumb Begin-->
       <li>

            <i class="fa fa-dashboard"></i> Dashboard / Edit Slides

       </li>
     </ol><!-- breadcrumb Finish-->
   </div><!-- col-lg-12 Finish-->
 </div><!-- row 1 Finish-->

 <div class="row"><!-- row 2 Begin-->
   <div class="col-lg-12"><!-- col-lg-12 Begin-->
     <div class="panel panel-default"><!--panel panel-default Begin-->
       <div class="panel-heading"><!--panel-heading Begin-->
         <h3 class="panel-title"><!--panel-title Begin-->

               <i class="fa fa-money fa-fw"></i> Edit Slide

         </h3><!--panel-title Finish-->
       </div><!--panel-heading Finish-->

       <div class="panel-body"><!-- panel-body Begin-->
         <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Begin-->
             <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Slide Name

                 </label><!--control-label col-md-3 Finish-->
                 <div class="col-md-6"><!--col-md-6 Begin-->

                   <input name="adverts_name" type="text" class="form-control" value=" <?php echo $slide_name; ?>">

                 </div><!--col-md-6 Finish-->
             </div><!-- form-group Finish-->

             <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Slide Image

                 </label><!--control-label col-md-3 Finish-->
                 <div class="col-md-6"><!--col-md-6 Begin-->

                 <input type="file" name="adverts_image" class="form-control">

                 <br/>
                 <img src="slides_images/<?php echo $slide_image; ?>" class="img-responsive">

                 </div><!--col-md-6 Finish-->
             </div><!-- form-group Finish-->



             <div class="form-group"><!-- form-group Begin-->
                   <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin--> </label><!--control-label col-md-3 Finish-->

                   <div class="col-md-6"><!--col-md-6 Begin-->

                       <input type="submit" name="update" value="update Now" class="btn btn-primary form-control">

                   </div><!--col-md-6 Finish-->
               </div><!-- form-group Finish-->

         </form><!-- form-horizontal Finish-->
      </div><!-- panel-body Finish-->

     </div><!--panel panel-default Finish-->
   </div><!-- col-lg-12 Finish-->
 </div><!-- row 2 Finish-->

 <?php

    if(isset($_POST['update'])){

      $slide_name = $_POST['adverts_name'];
      $slide_image = $_FILES['adverts_image']['name'];

      $temp_name = $_FILES['adverts_image']['tmp_name'];

      move_uploaded_file($temp_name,"slides_images/$slide_image");

      $update_slide = "update adverts set adverts_name='$slide_name', adverts_image='$slide_image' where adverts_id='$slide_id'";

      $run_update_slide = mysqli_query($con,$update_slide);

      if($run_update_slide){

          echo "<script>alert('Your Slide has been updated successfully')</script>";
          echo "<script>window.open('index.php?view_slides','_self')</script>";
      }


    }

  ?>

<?php } ?>
