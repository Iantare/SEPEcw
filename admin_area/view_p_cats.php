<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>
<div class="row"><!-- row 1 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <ol class="breadcrumb"><!-- breadcrumb Begin-->
      <li>

           <i class="fa fa-dashboard"></i> Dashboard / View Product Categories

      </li>
    </ol><!-- breadcrumb Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 1 Finish-->

<div class="row"><!-- row 2 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <div class="panel panel-default"><!--panel panel-default Begin-->
      <div class="panel-heading"><!--panel-heading Begin-->
        <h3 class="panel-title"><!--panel-title Begin-->

              <i class="fa fa-tags fa-fw"></i> View Product Categories

        </h3><!--panel-title Finish-->
      </div><!--panel-heading Finish-->

      <div class="panel-body"><!-- panel-body Begin-->
         <div class="table-responsive"><!-- table-responsive Begin-->
            <table class="table table-hover table-striped table-bordered"><!-- table table-hover table-striped table-bordered Begin-->
              <thead><!-- thead Begin-->
                <tr><!-- tr Begin-->
                  <th> Product Category ID </th>
                  <th> Product Category Title</th>
                  <th> Product Category Desc </th>
                  <th> Edit Product Category </th>
                  <th> Delete Product Category </th>
                </tr><!-- tr Finish-->
              </thead><!-- thead Finish-->

              <tbody><!-- tbody Begin-->

                  <?php
                        $i=0;

                        $get_p_cats = "select * from products_categories";
                        $run_p_cats = mysqli_query($con,$get_p_cats);
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                           $p_cat_id = $row_p_cats['Prod_cat_id'];
                           $p_cat_title = $row_p_cats['Prod_Cat_Title'];
                           $p_cat_desc = $row_p_cats['Prod_Cat_desc'];

                           $i++;



                   ?>

                   <tr><!-- tr Begin-->

                       <td> <?php echo $i; ?> </td>
                       <td> <?php echo $p_cat_title; ?> </td>
                       <td width="300"> <?php echo $p_cat_desc; ?> </td>
                       <td>
                         <a href="index.php?edit_p_cat= <?php echo $p_cat_id; ?>">
                             <i class="fa fa-pencil"></i> Edit
                         </a>
                       </td>

                       <td>
                         <a href="index.php?delete_p_cat= <?php echo $p_cat_id; ?>">
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
