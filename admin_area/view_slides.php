<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>
<div class="row"><!-- row 1 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <ol class="breadcrumb"><!-- breadcrumb Begin-->
      <li>

           <i class="fa fa-dashboard"></i> Dashboard / View Slides

      </li>
    </ol><!-- breadcrumb Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 1 Finish-->

<div class="row"><!-- row 2 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <div class="panel panel-default"><!--panel panel-default Begin-->
      <div class="panel-heading"><!--panel-heading Begin-->
        <h3 class="panel-title"><!--panel-title Begin-->

              <i class="fa fa-tags fa-fw"></i> View Slides

        </h3><!--panel-title Finish-->
      </div><!--panel-heading Finish-->

      <div class="panel-body"><!-- panel-body Begin-->

           <?php

               $get_slides = "select * from adverts";

               $run_slides = mysqli_query($con,$get_slides);

               while($row_slides=mysqli_fetch_array($run_slides)){

                    $slide_id = $row_slides['adverts_id'];
                    $slide_name = $row_slides['adverts_name'];
                    $slide_image = $row_slides['adverts_image'];


            ?>

            <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 Begin-->
              <div class="panel panel-primary"><!-- panel panel-primary Begin-->
                <div class="panel-heading"><!-- panel-heading Begin-->
                   <h3 class="panel-title" align="center"><!-- panel-title Begin-->

                     <?php echo $slide_name; ?>

                   </h3><!-- panel-title Finish-->
                </div><!-- panel-heading Finish-->

                <div class="panel-body"><!-- panel-body Begin-->

                  <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_name; ?>" class="img-responsive">

                </div><!-- panel-body Finish-->

                <div class="panel-footer"><!-- panel-footer Begin-->
                     <center><!-- center Begin-->

                         <a href="index.php?delete_slide=<?php echo $slide_id; ?>" class="pull-right"><!-- pull-right Begin-->

                               <i class="fa fa-trash"></i> Delete

                         </a><!-- pull-right Finish-->

                         <a href="index.php?edit_slide=<?php echo $slide_id; ?>" class="pull-left"><!-- pull-left Begin-->

                               <i class="fa fa-pencil"></i> Edit

                         </a><!-- pull-left Finish-->

                         <div class="clearfix"></div>

                         
                     </center><!-- center Finish-->

                </div><!-- panel-footer Finish-->

              </div><!-- panel panel-primary Finish-->
          </div><!-- col-lg-3 col-md-3 Finish-->

          <?php } ?>

     </div><!-- panel-body Finish-->

    </div><!--panel panel-default Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 2 Finish-->


<?php } ?>
