<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>

 <div class="row"><!-- row Begin -->
   <div class="col-lg-12"><!-- col-lg-12 Begin -->
     <ol class="breadcrumb"><!-- breadcrumb Begin -->
       <li class="active"><!-- active Begin -->

           <i class="fa fa-dashboard"></i> Dashboard / View Orders

       </li><!-- active Finish -->
     </ol><!-- breadcrumb Finish -->
   </div><!-- col-lg-12 Finish -->
 </div><!-- row Finish -->

<div class="row"><!-- row Begin -->
  <div class="col-lg-12"><!-- col-lg-12 Begin -->
    <div class="panel panel-default"><!-- panel panel-default Begin-->
      <div class="panel-heading"><!-- panel-heading Begin-->
        <h3 class="panel-title"><!-- panel-title Begin-->

           <i class="fa fa-tags"></i> View Orders

        </h3><!-- panel-title Finish-->
      </div><!-- panel-heading Finish-->

       <div class="panel-body"><!-- panel-body Begin-->
         <div class="table-responsive"><!-- table-responsive Begin-->
           <table class="table table-stripe table-bordered table-hover"><!-- table table-stripe table-bordered table-hover Begin-->

                <thead><!-- thead Begin-->
                    <tr><!-- tr Begin-->
                        <th> N0: </th>
                        <th> Customer Email: </th>
                        <th> Invoice No: </th>
                        <th> Product Name: </th>
                        <th> Product Qty: </th>
                        <th> Product Size: </th>
                        <th> Order date: </th>
                        <th> Total Amount: </th>
                        <th> Status: </th>
                        <th> Delete: </th>
                    </tr><!-- tr Finish-->
                </thead><!-- thead Finish-->

               <tbody><!-- tbody Begin-->

                  <?php

                       $i=0;
                       $get_orders = "select * from pending_orders ";
                       $run_orders = mysqli_query($con,$get_orders);
                       while($row_order=mysqli_fetch_array($run_orders)){

                            $order_id = $row_order['order_id'];
                            $cust_id = $row_order['cust_id'];
                            $invoice_no = $row_order['invoice_no'];
                            $product_id = $row_order['Prod_id'];
                            $qty = $row_order['Qty'];
                            $size = $row_order['size'];
                            $order_status = $row_order['order_status'];

                            $get_products = "select * from products where Prod_id='$product_id '";
                            $run_products = mysqli_query($con,$get_products);
                            $row_products = mysqli_fetch_array($run_products);
                            $product_title = $row_products['Prod_Title'];

                            $get_customers = "select * from customers where cust_id='$cust_id'";
                            $run_customer = mysqli_query($con,$get_customers);
                            $row_customer = mysqli_fetch_array($run_customer);
                            $customer_email = $row_customer['cust_email'];

                            $get_cust_orders = "select * from customer_orders where order_id='$order_id'";
                            $run_cust_orders = mysqli_query($con,$get_cust_orders);
                            $row_cust_orders = mysqli_fetch_array($run_cust_orders);
                            $order_date = $row_cust_orders['order_date'];
                            $order_amount = $row_cust_orders['due_amount'];


                            $i++;


                   ?>
                  <tr><!-- tr Begin-->
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $customer_email; ?> </td>
                      <td> <?php echo $invoice_no; ?></td>
                      <td>  <?php echo $product_title; ?> </td>
                      <td> <?php echo $qty; ?> </td>
                      <td> <?php echo $size; ?> </td>
                      <td> <?php echo $order_date; ?>  </td>
                      <td> <?php echo $order_amount; ?> </td>
                      <td>
                          <?php
                                if($order_status=='Pending'){
                                  echo   $order_status='Pending';

                                  }else{

                                    echo $order_status='Complete';
                                  }

                           ?>

                      </td>

                      <td>
                           <a href="index.php?delete_order=<?php echo $order_id;?>">

                               <i class="fa fa-trash-o"></i> Delete

                           </a>
                    </td>

                  </tr><!-- tr Finish-->

                <?php } ?>

               </tbody><!-- tbody Finish-->

           </table><!-- table table-stripe table-bordered table-hover Finish-->
         </div><!-- table-responsive Finish-->
      </div><!-- panel-body Finish-->

    </div><!-- panel panel-default Finish -->
  </div><!-- col-lg-12 Finish -->
</div><!-- row Finish -->


<?php } ?>
