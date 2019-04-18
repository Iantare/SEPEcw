
<div class="box"><!-- box Begin -->

  <?php

        $session_email = $_SESSION['cust_email'];

        $select_customer = "select * from customers where cust_email='$session_email'";

        $run_customer = mysqli_query($con,$select_customer);

        $row_customer = mysqli_fetch_array($run_customer);

        $customer_id = $row_customer['cust_id'];

   ?>

  <h1 class="text-center">Payment Options For You</option>

    <p class="lead text-center"><!-- lead text-center Begin -->

      <a href="order.php?c_id=<?php echo $customer_id ?>"> Offline Payment </a>

    </p><!-- lead text-center Finish -->

    <center><!-- center Begin -->

        <p class="lead"><!-- lead Begin -->

          <a href="#">

              Paypal Payment

              <img class="img-responsive" src="images/paypall_img.jpg" alt="img-paypall">

          </a>

        </p><!-- lead Finish -->

    </center><!-- center Finish -->

</div><!-- box Finish -->
