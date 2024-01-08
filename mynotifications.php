<?php
session_start();

?>
<?php 
include("Header_delivery.php");
include("dbConnection.php");
$centerid = $_SESSION['userregid'];

?>

<!-- inner banner -->
<section class="inner-banner py-5">
        <div class="w3l-breadcrumb py-lg-5">
            <div class="container pt-4 pb-sm-4">
                <h4 class="inner-text-title pt-5">Delivery Home</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a>Home</a></li>
                    <li class="active"><i class="fas fa-angle-right"></i></li>
                </ul>
            </div>
        </div>
    </section>
   
    <!-- courses section -->
    <div class="w3l-grids-block-5 home-course-bg py-5" id="courses">
        <div class="container py-md-5 py-4">
            <div class="title-main text-center mx-auto mb-md-5 mb-4" style="max-width:500px;">
                <h3>New Assigned Notification from Admin</h3>
            </div>
            <div class="row justify-content-center">
            <?php


$qry = "SELECT dids FROM `getdata` ";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            if ($row = mysqli_fetch_array($result)) {
$get=$row["dids"];
         // echo $get; 
$qry = "SELECT assigndelivery.*,`tb_product`.*,`cart`.*,`payment`.* FROM `payment`,`cart`,`tb_user_register`,`delivery`,`tb_product`,`assigndelivery` WHERE `payment`.`payid`=`assigndelivery`.`payid` AND `assigndelivery`.`deliveryid`=`delivery`.`did` AND `assigndelivery`.`type`='assign' AND `payment`.`pdid`=`cart`.`cid` AND `cart`.`pid`=`tb_product`.`productcode` AND `assigndelivery`.`deliveryid`='$centerid' AND `cart`.uid=`tb_user_register`.`ureg_id`";
$result = mysqli_query($conn, $qry);
      if ($result->num_rows > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="coursecard-single">
                        <div class="grids5-info position-relative">
                        <?php
                          echo "<img src='./". $row['image']. "'/>";
                            ?>
                        <div class="meta-list">
                            </div>
                        </div>
                        <div class="content-main-top">
                            <div class="content-top mb-4 mt-3">
                                <ul class="list-unstyled d-flex align-items-center justify-content-between">
                                    <li> <i class="fas fa-book-open"></i>Warranty  : <?php echo  $row['features'] ?> </li>
                                    <li> <i class="fas fa-book-open"></i>Brand   : <?php echo  $row['brand'] ?> </li>
                                </ul>
                                <hr>
                        </div>
                            <h4><a href="courses.html"><?php echo  $row['productname'] ?> </a></h4>
                            <p>Category : <?php echo  $row['category'] ?> </p>
                            <div class="top-content-border d-flex align-items-center justify-content-between mt-4 pt-4">
                                <h6>$ <?php echo  $row['price'] ?> </h6>
                                <hr>
                                <h6><?php echo  $row['warranty'] ?> </h6>
                                </div>

                                <?php              
               echo "
               <a href='deliveryupdates.php?ids=" . $row['agid'] . " '>  
               <button type='submit'  class='btn btn-success btn-lg'  style='padding-left: 2.5rem; radius:240px; padding-right: 2.5rem;background-color: #14b38b;float:right' name='login'>
                Delivery</button ></a>";
              ?>
                        </div>
                    </div>
                </div>
                <?php
                }
             }
             else {
                echo "  <center> <h2 style='color: red;'>.... No Data Found ...</h2></center> ";
            }}
} else {
    echo "  <center> <h2 style='color: red;'>.... No Data Found ...</h2></center> ";
}
?>

             


            </div>
          
        </div>
    </div>
    <!-- //courses section -->

<?php
include("footer.php");
?>