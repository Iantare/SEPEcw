<?php

if(!isset($_SESSION['admin_email'])){

    echo "<script>window.open('login.php','_self')</script>";

}else{

 ?>

 <div class="row"><!-- row Begin -->
   <div class="col-lg-12"><!-- col-lg-12 Begin -->
     <ol class="breadcrumb"><!-- breadcrumb Begin -->
       <li class="active"><!-- active Begin -->

           <i class="fa fa-dashboard"></i> Dashboard / View Users

       </li><!-- active Finish -->
     </ol><!-- breadcrumb Finish -->
   </div><!-- col-lg-12 Finish -->
 </div><!-- row Finish -->

<div class="row"><!-- row Begin -->
  <div class="col-lg-12"><!-- col-lg-12 Begin -->
    <div class="panel panel-default"><!-- panel panel-default Begin-->
      <div class="panel-heading"><!-- panel-heading Begin-->
        <h3 class="panel-title"><!-- panel-title Begin-->

           <i class="fa fa-tags"></i> View Users

        </h3><!-- panel-title Finish-->
      </div><!-- panel-heading Finish-->

       <div class="panel-body"><!-- panel-body Begin-->
         <div class="table-responsive"><!-- table-responsive Begin-->
           <table class="table table-stripe table-bordered table-hover"><!-- table table-stripe table-bordered table-hover Begin-->

                <thead><!-- thead Begin-->
                    <tr><!-- tr Begin-->
                        <th> N0: </th>
                        <th> User Name: </th>
                        <th> User Image: </th>
                        <th> User Email: </th>
                        <th> User Country: </th>
                        <th> User Job: </th>
                        <th> User Contact: </th>
                        <th> Edit: </th>
                        <th> Delete: </th>
                    </tr><!-- tr Finish-->
                </thead><!-- thead Finish-->

               <tbody><!-- tbody Begin-->

                  <?php

                       $i=0;
                       $get_Users = "select * from admins ";
                       $run_Users = mysqli_query($con,$get_Users);
                       while($row_Users=mysqli_fetch_array($run_Users)){

                            $user_id = $row_Users['admin_id'];
                            $user_name = $row_Users['admin_name'];
                            $user_img = $row_Users['admin_image'];
                            $user_email = $row_Users['admin_email'];
                            $user_country = $row_Users['admin_country'];
                            $user_job = $row_Users['admin_job'];
                            $user_contact = $row_Users['admin_contact'];

                            $i++;


                   ?>
                  <tr><!-- tr Begin-->
                      <td> <?php echo $i; ?> </td>
                      <td> <?php echo $user_name; ?> </td>
                      <td> <img src="../admin_area/admin_images/<?php echo $user_img ; ?>" width="60" height="60"></td>
                      <td> <?php echo $user_email; ?> </td>
                      <td> <?php echo $user_country; ?> </td>
                      <td> <?php echo $user_job; ?> </td>
                      <td> <?php echo $user_contact; ?> </td>
                      <td>
                           <a href="index.php?user_profile=<?php echo $user_id;?>">

                               <i class="fa fa-pencil"></i> Edit

                           </a>
                    </td>

                    <td>
                         <a href="index.php?delete_user=<?php echo $user_id;?>">

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
