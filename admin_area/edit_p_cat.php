<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>

 <?php
    if(isset($_GET['edit_p_cat'])){

     $edit_p_cat_id = $_GET['edit_p_cat'];
     $edit_p_cat_query = "select * from products_categories where Prod_cat_id = '$edit_p_cat_id '";
     $run_edit = mysqli_query($con,$edit_p_cat_query);
     $row_edit = mysqli_fetch_array($run_edit);

     $p_cat_id = $row_edit['Prod_cat_id'];
     $p_cat_title = $row_edit['Prod_Cat_Title'];
     $p_cat_desc = $row_edit['Prod_Cat_desc'];

    }



  ?>
<div class="row"><!-- row 1 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <ol class="breadcrumb"><!-- breadcrumb Begin-->
      <li>

           <i class="fa fa-dashboard"></i> Dashboard / Edit Product Category

      </li>
    </ol><!-- breadcrumb Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 1 Finish-->

<div class="row"><!-- row 2 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <div class="panel panel-default"><!--panel panel-default Begin-->
      <div class="panel-heading"><!--panel-heading Begin-->
        <h3 class="panel-title"><!--panel-title Begin-->

              <i class="fa fa-pencil fa-fw"></i> Edit Product Category

        </h3><!--panel-title Finish-->
      </div><!--panel-heading Finish-->

      <div class="panel-body"><!-- panel-body Begin-->
        <form action="" class="form-horizontal" method="post"><!-- form-horizontal Begin-->
            <div class="form-group"><!-- form-group Begin-->
                 <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Product Category Title

                </label><!--control-label col-md-3 Finish-->
                <div class="col-md-6"><!--col-md-6 Begin-->

                  <input value="<?php echo $p_cat_title; ?>" name="Prod_Cat_Title" type="text" class="form-control">

                </div><!--col-md-6 Finish-->
            </div><!-- form-group Finish-->

            <div class="form-group"><!-- form-group Begin-->
                 <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Product Category Description

                </label><!--control-label col-md-3 Finish-->
                <div class="col-md-6"><!--col-md-6 Begin-->

                <textarea type='text' name="Prod_Cat_desc" class="form-control"><?php echo $p_cat_desc; ?></textarea>

                </div><!--col-md-6 Finish-->
            </div><!-- form-group Finish-->



            <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->


                  </label><!--control-label col-md-3 Finish-->
                  <div class="col-md-6"><!--col-md-6 Begin-->

                        <input value="Update" name="update" type="submit" class="form-control btn btn-primary" >

                  </div><!--col-md-6 Finish-->
              </div><!-- form-group Finish-->

        </form><!-- form-horizontal Finish-->
     </div><!-- panel-body Finish-->

    </div><!--panel panel-default Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 2 Finish-->

<?php

   if(isset($_POST['update'])){

       $p_cat_title = $_POST['Prod_Cat_Title'];
       $p_cat_desc = $_POST['Prod_Cat_desc'];

      $update_p_cat = "update products_categories set Prod_cat_id='$p_cat_id', Prod_Cat_Title= '$p_cat_title', Prod_Cat_desc= '$p_cat_desc' where Prod_cat_id='$p_cat_id'";
      $run_p_cat = mysqli_query($con,$update_p_cat);

      if($run_p_cat){

              echo "<script>alert('Your Product Category has been updated')</script>";
              echo "<script>window.open('index.php?view_p_cats','_self')</script>";
      }




   }

 ?>

<?php } ?>
