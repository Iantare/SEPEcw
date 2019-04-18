<?php

$db = mysqli_connect("localhost","root","","good_cars");

/// Begin getRealIpUser function ///

function getRealIpUser(){

    switch(true){

           case(!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
           case(!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
           case(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];

           default : return $_SERVER['REMOTE_ADDR'];

    }

}

/// Finish getRealIpUser function ///

/// Begin add_cart function ///

function add_cart(){

     global $db;

     if(isset($_GET['add_cart'])){

        $ip_add = getRealIpUser();
        $P_id = $_GET['add_cart'];
        $Product_qty =  $_POST['Product_qty'];
        $product_size =  $_POST['product_size'];
        $check_product = "select * from basket where ip_add='$ip_add' AND P_id='$P_id'";
        $run_check = mysqli_query($db,$check_product);

        if(mysqli_num_rows($run_check)>0){

          echo "<script>alert('This Product has been already added in Your Basket')</script>";
          echo "<script>window.open('details.php?Prod_id=$P_id','_self')</script>";

        }else{

            $query = "insert into basket (P_id,ip_add,Prod_Qty,Size) values ('$P_id','$ip_add','$Product_qty','$product_size')";

            $run_query = mysqli_query($db,$query);

            echo "<script>window.open('details.php?Prod_id=$P_id','_self')</script>";

        }
     }
}


/// Finish add_cart function ///

/// Begin getPro function ///

function getPro(){

  global $db;
  $get_products = " select * from products order by 1 DESC LIMIT 0,8";
  $run_products = mysqli_query($db,$get_products);

  while($row_products=mysqli_fetch_array($run_products)){

    $pro_id = $row_products['Prod_id'];
    $pro_title = $row_products ['Prod_Title'];
    $pro_price = $row_products ['Prod_price'];
    $pro_img1 = $row_products ['Prod_img1'];

    echo "
     <div class='col-md-4 col-sm-6 single'>
       <div class='product'>
       <a href='details.php?Prod_id=$pro_id'>

            <img class='img-responsive' src='admin_area/product_images/$pro_img1'>
            </a>

            <div class= 'text'>

                <h3>
                     <a href='details.php?Prod_id=$pro_id'>
                     $pro_title

                     </a>
                </h3>

                <p class='price'>

                $ $pro_price

                </p>

                <p class='button'>

                <a class= 'btn btn-default'  href='details.php?Prod_id=$pro_id'>

                     view Details
                </a>

                <a class= 'btn btn-primary'  href='details.php?Prod_id=$pro_id'>

                     <i class='fa fa-shopping-cart'></i> Add to Cart
                </a>

                </p>

            </div>

       </div>

     </div>
    ";
  }
}

/// Finish getPro functions ///

/// Begin getPCats functions ///

function getPCats(){

  global $db;
  $get_products_categories = "select * from products_categories";
  $run_products_categories = mysqli_query($db,$get_products_categories);

   while ( $row_products_categories=mysqli_fetch_array($run_products_categories)){

      $Prod_cat_id = $row_products_categories['Prod_cat_id'];
      $Prod_Cat_Title = $row_products_categories['Prod_Cat_Title'];

      echo "
            <li>

            <a href='shop.php?products_categories= $Prod_cat_id'> $Prod_Cat_Title </a>

            </li>

      ";

   }
  }



/// Finish getPCats functions ///

/// Begin getCats functions ///

function getCats(){

  global $db;
  $get_categories = " select * from categories";
  $run_categories = mysqli_query($db,$get_categories);

   while ( $row_categories=mysqli_fetch_array($run_categories)){

      $Cat_id = $row_categories['Cat_id'];
      $Cat_Title = $row_categories['Cat_Title'];

      echo "
            <li>

            <a href='shop.php?categories= $Cat_id'> $Cat_Title </a>

            </li>

      ";

   }
  }



/// Finish getCats functions ///

/// begin getpcatpro functions ///

function getpcatpro(){

  global $db;
  if(isset($_GET['products_categories'])){

    $Prod_cat_id = $_GET['products_categories'];
    $get_p_cat ="select * from products_categories where Prod_cat_id='$Prod_cat_id'";
    $run_p_cat = mysqli_query($db,$get_p_cat);
    $row_p_cat = mysqli_fetch_array($run_p_cat);
    $Prod_Cat_Title = $row_p_cat['Prod_Cat_Title'];
    $Prod_Cat_desc = $row_p_cat['Prod_Cat_desc'];
    $get_p_cat ="select * from products where Prod_cat_id='$Prod_cat_id'";
    $run_products = mysqli_query($db,$get_p_cat);
    $count = mysqli_num_rows($run_products);
    if($count==0){

      echo "
            <div class='box'>

               <h1> No Product Found In This Product Categories </h1>

               </div>
      ";


    }else {
      echo "

         <div class='box'>

               <h1> $Prod_Cat_Title </h1>
               <p> $Prod_Cat_desc </p>

         </div>";
    }

    while($row_products=mysqli_fetch_array($run_products)){

      $Prod_id = $row_products['Prod_id'];
      $Prod_Title = $row_products ['Prod_Title'];
      $Prod_price = $row_products ['Prod_price'];
      $Prod_img1 = $row_products ['Prod_img1'];

      echo "<div class='col-md-4 col-sm-6 center-responsive'>
        <div class='product'>
        <a href='details.php?Prod_id=$Prod_id'>

             <img class='img-responsive' src='admin_area/product_images/$Prod_img1'>
             </a>

             <div class= 'text'>

                 <h3>
                      <a href='details.php?Prod_id=$Prod_id'>$Prod_Title

                      </a>
                 </h3>

                 <p class='price'>

                 $ $Prod_price

                 </p>

                 <p class='button'>

                 <a class= 'btn btn-default'  href='details.php?Prod_id=$Prod_id'>

                      view Details
                 </a>

                 <a class= 'btn btn-primary'  href='details.php?Prod_id=$Prod_id'>

                      <i class='fa fa-shopping-cart'></i> Add to Cart
                 </a>

                 </p>

             </div>

        </div>

      </div>
      ";

    }

  }
}

/// Finish getpcatpro functions ///

/// Begin getcatpro functions ///

function getcatpro(){

  global $db;
  if(isset($_GET['categories'])){

    $cat_id = $_GET['categories'];

    $get_cat = "select * from categories where Cat_id = '$cat_id'";
    $run_cat = mysqli_query($db,$get_cat);
    $row_cat = mysqli_fetch_array($run_cat);
    $cat_title = $row_cat['Cat_Title'];
    $cat_desc = $row_cat['Cat_desc'];

    $get_cat = "select * from products where Cat_id='$cat_id' LIMIT 0,6";

    $run_products = mysqli_query($db,$get_cat);

    $count = mysqli_num_rows($run_products);

    if($count==0){

       echo "
          <div class='box'>

              <h1> No Product Found In This Category </h1>

          </div>

       ";

    }else {
      echo "
            <div class='box'>

               <h1> $cat_title </h1>
               <p> $cat_desc </p>

               </div>
      ";
    }

    while($row_products=mysqli_fetch_array($run_products)){

          $Prod_id = $row_products['Prod_id'];
          $Prod_Title = $row_products['Prod_Title'];
          $Prod_price = $row_products['Prod_price'];
          $Prod_desc = $row_products['Prod_price'];
          $Prod_img1 = $row_products['Prod_img1'];

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


  }

}

/// Finish getcatpro functions ///
 ?>
