<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{


 ?>

 <?php

   if(isset($_GET['edit_product'])){

     $edit_id = $_GET['edit_product'];
     $get_p = "select * from products where Prod_id='$edit_id'";
     $run_edit = mysqli_query($con,$get_p);
     $row_edit = mysqli_fetch_array($run_edit);
     $p_id = $row_edit['Prod_id'];
     $p_title = $row_edit['Prod_Title'];
     $p_cat_id = $row_edit['Prod_cat_id'];
     $cat_id = $row_edit['Cat_id'];
     $p_img1 = $row_edit['Prod_img1'];
     $p_img2 = $row_edit['Prod_img2'];
     $p_img3 = $row_edit['Prod_img3'];
     $p_price = $row_edit['Prod_price'];
     $p_keywords = $row_edit['Prod_keywords'];
     $p_desc = $row_edit['Prod_desc'];

   }

   $get_p_cat = "select * from products_categories where Prod_cat_id='$p_cat_id'";
   $run_p_cat = mysqli_query($con,$get_p_cat);
   $row_p_cat = mysqli_fetch_array($run_p_cat);
   $p_cat_title = $row_p_cat['Prod_Cat_Title'];

   $get_cat = "select * from categories where Cat_id='$cat_id'";
   $run_cat = mysqli_query($con,$get_cat);
   $row_cat = mysqli_fetch_array($run_cat);
   $cat_title = $row_cat['Cat_Title'];


  ?>

<!DOCTYPE html>
<html lang="en"
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=devise-width, initial-scale=1">
    <title>Edit Products</title>

  </head>
  <body>

<div class="row"><!-- row Begin --->

    <div class="col-lg-12"><!-- col-lg-12 Begin --->

      <ol class="breadcrumb"><!-- breadcrumb Begin --->

         <li class="active"><!-- active Begin --->

              <i class="fa fa-dashboard"></i> Dashboard / Edit Products

         </li><!-- active Finish --->

      </ol><!-- breadcrumb Finish --->

    </div><!-- col-lg-12 Finish --->

</div><!-- row Finish --->

<div class="row"><!-- row Begin --->

  <div class="col-lg-12"><!-- col-lg-12 Begin --->

       <div class="panel panel-default"><!--panel panel-default Begin --->

           <div class="panel-heading"><!--panel-heading Begin --->

             <h3 class="panel-title"><!--panel-title Begin --->

                  <i class="fa fa-money fa-fw"></i> Edit Product

             </h3><!--panel-title Finish --->

           </div><!--panel-heading Finish --->

           <div class="panel-body"><!--panel-body Begin --->

             <form method="post" class="form-horizontal" enctype="multipart/form-data"><!--form-horizontal Begin --->

                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Title </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="Prod_Title" type="text" class="form-control" required value="<?php echo $p_title; ?>">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->



                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Category </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                    <select name="Prod_Cat_Title" class="form-control"><!--form-control Begin --->

                         <option value="<?php echo  $p_title; ?>"> <?php echo $p_cat_title; ?> </option>

                          <?php

                          $get_p_cats = "SELECT * FROM products_categories";

                          $run_p_cats = mysqli_query($con,$get_p_cats);

                            while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                $p_cat_id = $row_p_cats['Prod_cat_id'];
                                $p_cat_title = $row_p_cats['Prod_Cat_Title'];

                                echo "<option value='$p_cat_id'> $p_cat_title </option>";

                            }

                          ?>

                    </select><!--form-control Finish --->

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Category </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                    <select name="cat" class="form-control"><!--form-control Begin --->

                         <option value="<?php echo $cat_id ?>"><?php echo $cat_title ?></option>

                          <?php

                          $get_cat = "SELECT * FROM categories";

                          $run_cat = mysqli_query($con,$get_cat);

                            while ($row_cat=mysqli_fetch_array($run_cat)){

                                $cat_id = $row_cat['Cat_id'];
                                $cat_title = $row_cat['Cat_Title'];

                                echo "<option value='$cat_id'> $cat_title </option>";

                            }

                          ?>

                    </select><!--form-control Finish --->

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Image 1</label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="product_img1" type="file" class="form-control" required>

                      <br>
                      <img width="70" height="70"src="product_images/<?php echo $p_img1; ?>" alt="<?php echo $p_img1; ?>">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Image 2</label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="product_img2" type="file" class="form-control">

                      <br>
                      <img width="70" height="70"src="product_images/<?php echo $p_img2; ?>" alt="<?php echo $p_img2; ?>">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Image 3</label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="product_img3" type="file" class="form-control form-height-custom">

                      <br>
                      <img width="70" height="70"src="product_images/<?php echo $p_img3; ?>" alt="<?php echo $p_img3; ?>">


                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Price </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="Prod_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Keywords </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="Prod_keywords" type="text" class="form-control" required value="<?php echo $p_keywords; ?>">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"> Product Desc </label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <textarea name="Prod_desc" cols="19" rows="6" class="form-control">

                       <?php echo $p_desc; ?>

                      </textarea>

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


                 <div class="form-group"><!--form-group Begin --->

                   <label class="col-md-3 control-label"></label>

                   <div class="col-md-6"><!--col-md-6 Begin --->

                      <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">

                   </div><!--col-md-6 Finish --->

                 </div><!--form-group Finish --->


             </form><!--form-horizontal Finish --->

           </div><!--panel-body Finish --->

       </div><!--panel panel-default Finish --->

  </div><!-- col-lg-12 Finish --->

</div><!-- row Finish  --->

          <script src="js/tinymce/tinymce.min.js"></script>
          <script>tinymce.init({ selector:'textarea'});</script>
  </body>
</html>

<?php

if(isset($_POST['update'])){

    $p_title = $_POST['Prod_Title'];
    $p_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $p_price = $_POST['Prod_price'];
    $p_keywords = $_POST['Prod_keywords'];
    $p_desc = $_POST['Prod_desc'];

    $p_img1 = $_FILES['Prod_img1']['name'];
    $p_img2 = $_FILES['Prod_img2']['name'];
    $p_img3 = $_FILES['Prod_img3']['name'];

    $temp_name1 = $_FILES['Prod_img1']['tmp_name'];
    $temp_name2 = $_FILES['Prod_img2']['tmp_name'];
    $temp_name3 = $_FILES['Prod_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"product_images/$p_img1");
    move_uploaded_file($temp_name2,"product_images/$p_img2");
    move_uploaded_file($temp_name3,"product_images/$p_img3");

    $update_product = "update products set
    Prod_cat_id='$p_cat_id', Cat_id='$cat_id', date=NOW(), Prod_Title='$p_title', Prod_img1='$p_img1', Prod_img2='$p_img2',
    Prod_img3='$p_img3', Prod_price='$p_price', Prod_keywords='$p_keywords',Prod_desc='$p_desc' where Prod_id='$p_id'";

    $run_product = mysqli_query($con,$update_product);
    if($run_product){
                 echo "<script>alert('Your Product has been updated Successfully')</script>";

                 echo "<script>window.open('index.php?view_products','_self')</script>";

    }
}
 ?>

<?php } ?>
