<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>

 <div class="row"><!-- row Begin -->
   <div class="col-lg-12"><!-- col-lg-12 Begin -->
     <ol class="breadcrumb"><!-- breadcrumb Begin -->
       <li class="active"><!-- active Begin -->

           <i class="fa fa-dashboard"></i> Dashboard / View Customers

       </li><!-- active Finish -->
     </ol><!-- breadcrumb Finish -->
   </div><!-- col-lg-12 Finish -->
 </div><!-- row Finish -->

<div class="row"><!-- row Begin -->
  <div class="col-lg-12"><!-- col-lg-12 Begin -->
    <div class="panel panel-default"><!-- panel panel-default Begin-->
      <div class="panel-heading"><!-- panel-heading Begin-->
        <h3 class="panel-title"><!-- panel-title Begin-->

           <i class="fa fa-tags"></i> View Customers

        </h3><!-- panel-title Finish-->
      </div><!-- panel-heading Finish-->

       <div class="panel-body"><!-- panel-body Begin-->
         <div class="table-responsive"><!-- table-responsive Begin-->
           <table class="table table-stripe table-bordered table-hover"><!-- table table-stripe table-bordered table-hover Begin-->

                <thead><!-- thead Begin-->
                    <tr><!-- tr Begin-->
                        <th> N0: </th>
                        <th> Name: </th>
                        <th> Image: </th>
                        <th> E-mail: </th>
                        <th> Country: </th>
                        <th> City: </th>
                        <th> Address: </th>
                        <th> Contact: </th>
                        <th> Delete: </th>
                    </tr><!-- tr Finish-->
                </thead><!-- thead Finish-->

               <tbody><!-- tbody Begin-->

                  <?php

                       $i=0;
                       $get_cust = "select * from customers ";
                       $run_cust = mysqli_query($con,$get_cust);
                       while($row_cust=mysqli_fetch_array($run_cust)){

                            $cust_id = $row_cust['cust_id'];
                            $cust_name = $row_cust['cust_name'];
                            $cust_img = $row_cust['cust_image'];
                            $cust_email = $row_cust['cust_email'];
                            $cust_country = $row_cust['cust_country'];
                            $cust_city = $row_cust['cust_city'];
                            $cust_address = $row_cust['cust_Address'];
                            $cust_contact = $row_cust['cust_contact'];

                            $i++;


                   ?>
                  <tr><!-- tr Begin-->
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $cust_name; ?> </td>
                      <td> <img src="../customer/customer_images/<?php echo $cust_img; ?>" width="60" height="60"></td>
                      <td>  <?php echo $cust_email; ?> </td>
                      <td> <?php echo $cust_country; ?> </td>
                      <td> <?php echo $cust_city; ?> </td>
                      <td> <?php echo $cust_address; ?> </td>
                      <td> <?php echo $cust_contact; ?> </td>
                      <td>
                           <a href="index.php?delete_customer=<?php echo $cust_id;?>">

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
