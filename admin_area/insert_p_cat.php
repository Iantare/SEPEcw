<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>
<div class="row"><!-- row 1 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <ol class="breadcrumb"><!-- breadcrumb Begin-->
      <li>

           <i class="fa fa-dashboard"></i> Dashboard / Insert Product Category

      </li>
    </ol><!-- breadcrumb Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 1 Finish-->

<div class="row"><!-- row 2 Begin-->
  <div class="col-lg-12"><!-- col-lg-12 Begin-->
    <div class="panel panel-default"><!--panel panel-default Begin-->
      <div class="panel-heading"><!--panel-heading Begin-->
        <h3 class="panel-title"><!--panel-title Begin-->

              <i class="fa fa-money fa-fw"></i> Insert Product Category

        </h3><!--panel-title Finish-->
      </div><!--panel-heading Finish-->

      <div class="panel-body"><!-- panel-body Begin-->
        <form action="" class="form-horizontal" method="post"><!-- form-horizontal Begin-->
            <div class="form-group"><!-- form-group Begin-->
                 <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Product Category Title

                </label><!--control-label col-md-3 Finish-->
                <div class="col-md-6"><!--col-md-6 Begin-->

                  <input name="Prod_Cat_Title" type="text" class="form-control">

                </div><!--col-md-6 Finish-->
            </div><!-- form-group Finish-->

            <div class="form-group"><!-- form-group Begin-->
                 <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->

                  Product Category Description

                </label><!--control-label col-md-3 Finish-->
                <div class="col-md-6"><!--col-md-6 Begin-->

                <textarea type='text' name="Prod_Cat_desc" id="" cols="30" rows="10" class="form-control"></textarea>

                </div><!--col-md-6 Finish-->
            </div><!-- form-group Finish-->



            <div class="form-group"><!-- form-group Begin-->
                  <label for="" class="control-label col-md-3"><!--control-label col-md-3 Begin-->


                  </label><!--control-label col-md-3 Finish-->
                  <div class="col-md-6"><!--col-md-6 Begin-->

                        <input value="Submit" name="submit" type="submit" class="form-control btn btn-primary" >

                  </div><!--col-md-6 Finish-->
              </div><!-- form-group Finish-->

        </form><!-- form-horizontal Finish-->
     </div><!-- panel-body Finish-->

    </div><!--panel panel-default Finish-->
  </div><!-- col-lg-12 Finish-->
</div><!-- row 2 Finish-->

<?php

   if(isset($_POST['submit'])){

       $p_cat_title = $_POST['Prod_Cat_Title'];
       $p_cat_desc = $_POST['Prod_Cat_desc'];

       $insert_p_cat = "insert into products_categories (Prod_Cat_Title,Prod_Cat_desc) values ('$p_cat_title','$p_cat_desc')";
       $run_p_cat = mysqli_query($con,$insert_p_cat);
       if($run_p_cat){

            echo "<script>alert('Your New Product Category Has Been Inserted Successfully')</script>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";

       }

   }

 ?>

<?php } ?>
