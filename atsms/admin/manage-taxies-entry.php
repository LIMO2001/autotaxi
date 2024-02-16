<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['atsmsaid']==0)) {
  header('location:logout.php');
  } else{

//Code for deletion
if (isset($_GET['del'])) {
$atid=intval($_GET['del']);    
$query=mysqli_query($con,"delete from tblstandentry where ID='$atid'");
    if ($query) {
     echo "<script>alert('deleted vehicle entry');</script>";
     echo "<script>window.location.href='manage-autoortaxi-entry.php'</script>";
  } else {
    echo "<script>alert('Something Went Wrong. Please try again.');</script>";
    echo "<script>window.location.href='manage-autoortaxi-entry.php'</script>";
    }
}

  ?>

<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Title Page-->
    <title>Auto/Taxi Stand Management System || Manage Auto/Taxi Entry</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
      <?php include_once('includes/sidebar.php');?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
      
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <?php include_once('includes/header.php');?>
            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                              <h3>Manage Taxies Entry Details</h3>
                            <hr />
                            <div class="col-lg-12" style="margin-top:2%">
                                <div class="table-responsive table--no-card m-b-30">
                                    <table class="table table-borderless table-striped table-earning">
                                         <thead>
                                        
                                            <tr>
                  <th>S.NO</th>
            <th>Parking Number</th>
                  <th>Type</th>
              <th>Driver Name</th>
              <th>Entry Date</th>
              <th>Status</th>
                   <th>Action</th>
                </tr>
                                       
                                        </thead>
<?php
$ret=mysqli_query($con,"select * from tblstandentry where VehicleType='Taxi'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
              
                <tr>
                  <td><?php echo $cnt;?></td>
            <td><?php  echo $row['ParkingNumber'];?></td>
                  <td><?php  echo $row['VehicleType'];?></td>
                  <td><?php  echo $row['DriverName'];?></td>
                
                <td><?php  echo $row['EntryDate'];?></td>
                <?php if($row['Status']==""){ ?>
                     <td><?php echo "Not Updated Yet"; ?></td>
<?php } else { ?> <td><?php  echo htmlentities($row['Status']);?>
                  </td>
                  <?php } ?>         
                  <td><a href="auto-taxi-entry-detail.php?editid=<?php echo $row['ID'];?>" title="View Full Details" class="btn btn-success">Edit</a> <a href="print.php?vid=<?php echo $row['ID'];?>" style="cursor:pointer" target="_blank" class="btn btn-warning">Print</a> <a href="manage-autoortaxi-entry.php?del=<?php echo $row['ID'];?>" onclick="return confirm('Do you really want to delete the vehicle entry?');" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                <?php 
$cnt=$cnt+1;
}?>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                        
                        
          
<?php include_once('includes/footer.php');?>
          </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<?php }  ?>
