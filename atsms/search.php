<?php session_start();
error_reporting(0);
include('admin/includes/dbconnection.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    

    <!-- Title Page-->
    <title>Auto/Taxi Stand Management System || Search Taxi or Auto</title>

    <!-- Fontfaces CSS-->
    <link href="admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
                <h3 align="center" style="margin-top:1%">Auto/Taxi Stand Management System</h3>
                <hr />

        <!-- PAGE CONTAINER-->
        <div>
            <!-- HEADER DESKTOP-->

            <!-- END HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content" style="margin-top:-4%">

                <div>
                    <div>
                        <div class="row" align="center">

<div align="center" style="margin-left:20%">
    <form class="form-header" name="search"  method="post">
     <input class="au-input au-input--xl" type="text" name="searchdata" id="searchdata" placeholder="Search by names &amp; mobile number..." required />
                                <button class="au-btn--submit" type="submit" name="search">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
</div>

                            <div class="col-lg-12">
                                <div class="table-responsive table--no-card m-b-30">
<?php
if(isset($_POST['search']))
{ 
$sdata=$_POST['searchdata'];
  ?>
  <hr />
  <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
  <hr />   

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
$ret=mysqli_query($con,"select *from tblstandentry where DriverName like '$sdata%'||Drivermobilenumber like '$sdata%'");
$num=mysqli_num_rows($ret);
if($num>0){
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
<?php } else { ?>                  <td><?php  echo htmlentities($row['Status']);?>
                  </td>
                  <?php } ?>         
                  <td><a href="print.php?vid=<?php echo $row['ID'];?>" style="cursor:pointer" target="_blank" class="btn btn-warning">Print</a> 
                  </td>
                </tr>
                 <?php
                $cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php } }?>
                                    </table>
                                </div>
                            </div>
                          
                        </div>
                        
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php include_once('includes/footer.php');?>
    <!-- Jquery JS-->
    <script src="admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="admin/vendor/slick/slick.min.js">
    </script>
    <script src="admin/vendor/wow/wow.min.js"></script>
    <script src="admin/vendor/animsition/animsition.min.js"></script>
    <script src="admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="admin/js/main.js"></script>

</body>

</html>

