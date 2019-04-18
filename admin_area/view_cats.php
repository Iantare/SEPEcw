<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>
<div class="row"><!-- row 1 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <ol class="breadcrumb"><!-- breadcrumb Begin-->
      <li>

           <i class="fa fa-dashboard"></i> Dashboard / View Categories

      </li>
    </ol><!-- breadcrumb Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 1 Finish-->

<div class="row"><!-- row 2 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <div class="panel panel-default"><!--panel panel-default Begin-->
      <div class="panel-heading"><!--panel-heading Begin-->
        <h3 class="panel-title"><!--panel-title Begin-->

              <i class="fa fa-tags fa-fw"></i> View Categories

        </h3><!--panel-title Finish-->
      </div><!--panel-heading Finish-->

      <div class="panel-body"><!-- panel-body Begin-->
         <div class="table-responsive"><!-- table-responsive Begin-->
            <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered Begin-->
              <thead><!-- thead Begin-->
                <tr><!-- tr Begin-->
                  <th> Category ID </th>
                  <th> Category Title</th>
                  <th> Category Desc </th>
                  <th> Edit Category </th>
                  <th> Delete Category </th>
                </tr><!-- tr Finish-->
              </thead><!-- thead Finish-->

              <tbody><!-- tbody Begin-->

                  <?php
                        $i=0;

                        $get_cats = "select * from categories";
                        $run_cats = mysqli_query($con,$get_cats);
                        while($row_cats=mysqli_fetch_array($run_cats)){

                           $cat_id = $row_cats['Cat_id'];
                           $cat_title = $row_cats['Cat_Title'];
                           $cat_desc = $row_cats['Cat_desc'];

                           $i++;



                   ?>

                   <tr><!-- tr Begin-->

                       <td> <?php echo $i; ?> </td>
                       <td> <?php echo $cat_title; ?> </td>
                       <td width="300"> <?php echo $cat_desc; ?> </td>
                       <td>
                         <a href="index.php?edit_cat= <?php echo $cat_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                         </a>
                       </td>

                       <td>
                         <a href="index.php?delete_cat= <?php echo $cat_id; ?>">
                             <i class="fa fa-trash"></i> Delete
                         </a>
                       </td>


                   </tr><!-- tr Finish-->

                   <?php } ?>

              </tbody><!-- tbody Finish-->
          </table><!-- table table-hover table-striped table-bordered Finish-->

        </div><!-- table-responsive Finish-->

     </div><!-- panel-body Finish-->

    </div><!--panel panel-default Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 2 Finish-->


<?php } ?>
