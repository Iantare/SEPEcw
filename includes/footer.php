<div id="footer"><!--#footer Begin -->
  <div class="container"><!--container Begin -->
    <div class="row"><!--row Begin -->
      <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 Begin -->

          <h4>Pages</h4>

        <ul><!--ul Begin -->
          <li><a href="../cart.php">Shopping Cart</a></li>
          <li><a href="../contact.php">Contact Us</a></li>
          <li><a href="../shop.php">Shop</a></li>
          <li><a href="my_account.php">My Account</a></li>
        </ul><!--ul Finish -->

        <hr>

        <h4>User Section</h4>

        <ul><!--ul Begin -->

          <?php
               if(!isset($_SESSION['cust_email'])){

                   echo"<a href='checkout.php'>Login</a>";

               }else {

                   echo "<a href='customer/my_account.php?my_orders'>My Account</a>";

               }

           ?>
          <li><a href="../customer_register.php">Register</a></li>
        </ul><!--ul Finish -->

        <hr class="hidden-md hidden-lg hidden-sm">

      </div><!--col-sm-6 col-md-3  Finish -->

      <div class="com-sm-6 col-md-3"><!--com-sm-6 col-md-3  Begin -->

        <h4> Top Products Categories</h4>

        <ul><!--ul Begin -->

           <?php
               $get_p_cats = "select * from products_categories";

               $run_p_cats = mysqli_query($con,$get_p_cats);

               while($row_p_cats=mysqli_fetch_array($run_p_cats)){

                    $Prod_cat_id = $row_p_cats['Prod_cat_id'];
                    $Prod_Cat_Title = $row_p_cats['Prod_Cat_Title'];

                    echo "

                    <li>

                        <a href='shop.php?p_cat=$Prod_cat_id'>

                            $Prod_Cat_Title

                            </a>

                            </li>



                    ";

               }



            ?>


        </ul><!--ul Finish -->

          <hr class="hidden-md hidden-lg">

      </div><!--com-sm-6 col-md-3  Finish -->

      <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3  Begin -->

        <h4>Find Us</h4>

        <p><!--p  Begin -->

          <strong>GC Dealers inc.</strong>
          <br/>Busness Special Zone
          <br/>Kigali
          <br/>Rwanda
          <br/>250-788-000-987
          <br/>gcd@gmail
          <br/><strong>MrNick</strong>

        </p><!--p Finish-->

        <a href="../contact.php">checkout Our Contact Page</a>

        <hr class="hidden-md hidden-lg">

      </div><!--col-sm-6 col-md-3 Finish -->

      <div class="col-sm-6 col-md-3"><!--col-sm-6 col-md-3 Begin-->

        <h4>Get The News</h4>

        <p class="text-muted">
             Don't miss out Our latest Product

        </p>

        <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"
        onsubmit="windiw.open('https://feedburner.google.com/fb/a/mailverify?uri=SEPEcw','popupwindow',
        'scrollbars=yes,width=550,height=520');return true" method="post"><!--form Begin -->

            <div class="input-group"><!--input-group Begin -->

              <input type="text" class="form-control" name="email">

              <input type="hidden" value="SEPEcw" name="uri"/><input type="hidden" name="loc" value="en_US"/>

              <span class="input-group-btn"><!--input-group-btn Begin-->

                <input type="submit" value="subscribe" class="btn btn-default">



              </span><!--input-group-btn Finish-->

            </div><!--input-group Finish -->

        </form><!--form Finish -->

        <hr>
        <h4>Keep in Touch</h4>

        <p class="social">
          <a href="#" class="fa fa-facebook"></a>
          <a href="#" class="fa fa-twitter"></a>
          <a href="#" class="fa fa-instagram"></a>
          <a href="#" class="fa fa-google-plus"></a>
          <a href="#" class="fa fa-envelope"></a>
        </p>

      </div><!--col-sm-6 col-md-3 Finish

      -->

    </div><!--row Finish -->

  </div><!--container Finish -->

</div><!--#footer Finish -->

<div id="copyright"><!--#copyright Begin -->
  <div class="container"><!--container Begin -->
    <div class="col-md-6"><!--col-md-6 Begin -->

      <p class="pull-left">&copy; 2019 GC Dealers Inc All Rights Reserved</p>

    </div><!--col-md-6 Finish -->
    <div class="col-md-6"><!--col-md-6 Begin -->

      <p class="pull-right">Theme by: <a href="#">Mr Ntare</a></p>

    </div><!--col-md-6 Finish -->

  </div><!--container Finish -->

</div><!--#copyright Finish -->
