
<?php
      $active='Shop';
     include("includes/header.php");
 ?>

<div id="content"><!-- content Begin -->
  <div class="container"><!-- container Begin -->
    <div class="col-md-12"><!-- col-md-12 Begin -->

      <ul class="breadcrumb"><!-- breadcrumb Begin -->
        <li>

           <a href="index.php">Home</a>

        </li>
        <li>
          shop
        </li>

      </ul><!-- breadcrumb Finish -->

    </div><!-- col-md-12 Finish -->

    <div class="col-md-3"><!-- col-md-3 Begin -->

      <?php

      include("includes/sidebar.php");

       ?>

    </div><!-- col-md-3 Finish -->

    <div class="col-md-9"><!-- col-md-9 Begin -->

        <?php

        if(!isset($_GET['products_categories'])) {

           if(!isset($_GET['categories'])) {

        echo "

        <div class='box'><!-- box Begin -->

           <h1>Shop</h1>
           <p>
           You are welcome in Our Online Shop satisfying Your need is Our priority One;
           You are welcome in Our Online Shop satisfying Your need is Our priority One;
           You are welcome in Our Online Shop satisfying Your need is Our priority One.
           </p>

        </div><!-- box Finish -->
     ";
    }

      }
      ?>



        <div class="row"><!-- row Begin -->

          <?php

          if(!isset($_GET['products_categories'])) {

             if(!isset($_GET['categories'])) {

               $per_page=6;

               if(isset($_GET['page'])){

                 $page = $_GET['page'];

                   }else{

                   $page=1;
                  }

                 $start_from = ($page-1) * $per_page;
                 $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";
                 $run_products = mysqli_query($con,$get_products);
                 while($row_products=mysqli_fetch_array($run_products)){

                   $Prod_id = $row_products['Prod_id'];
                   $Prod_Title = $row_products ['Prod_Title'];
                   $Prod_price = $row_products ['Prod_price'];
                   $Prod_img1 = $row_products ['Prod_img1'];

                   echo "

                         <div class='col-md-4 col-sm-6 center-responsive'>

                            <div class='product'>

                                  <a href='details.php?Prod_id=$Prod_id'>

                                     <img class='img-responsive' src='admin_area/product_images/$Prod_img1'>

                                  </a>

                                  <div class='text'>

                                  <h3>
                                        <a href='details.php?Prod_id=$Prod_id'> $Prod_Title </a>
                                  </h3>

                                  <p class='price'>

                                      $$Prod_price

                                  </p>

                                  <p class='buttons'>

                                  <a class='btn btn-default' href='details.php?Prod_id=$Prod_id'>

                                    View Details

                                   </a>

                                   <a class='btn btn-primary' href='details.php?Prod_id=$Prod_id'>

                                      <i class='fa fa-shopping-cart'></i> Add To Cart

                                    </a>

                                  </p>

                              </div>

                          </div>

                    </div>

                   ";

               }

        ?>


        </div><!-- row Finish -->

        <center>
          <ul  class="pagination"><!-- pagination Begin -->
         <?php

         $query = "select * from products";

         $result = mysqli_query($con,$query);

         $total_records = mysqli_num_rows($result);

         $total_pages = ceil($total_records / $per_page);

           echo "
               <li>

                  <a href='shop.php?page=1'>".'First Page'."</a>

              </li>

           ";

           for($i=1; $i<=$total_pages; $i++){

             echo "
                 <li>

                    <a href='shop.php?page=".$i."'> ".$i."</a>

                </li>

             ";

           };

           echo "
               <li>

                  <a href='shop.php?page=$total_pages'>".'Last Page'."</a>

              </li>

           ";
              }

        }
?>


          </ul><!-- pagination Finish -->
        </center>


       <?php

       getpcatpro();
       getcatpro();

        ?>

    </div><!--col-md-9 Finish -->

  </div><!-- container Finish -->

</div><!-- content Finish -->

<?php

include("includes/footer.php");

 ?>

      <script src="js/jquery-331.min.js"></script>
      <script src="js/bootstrap-337.min.js"></script>


  </body>
</html>
