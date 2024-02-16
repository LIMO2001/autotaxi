<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['atsmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$eid=$_GET['editid'];
 $status=$_POST['status'];
$remark=$_POST['remark'];
$price=$_POST['price'];
 $query=mysqli_query($con,"update tblstandentry set Remark='$remark',Status='$status',Price=$price where  ID='$eid'");
 

    if ($query) {
  
    echo '<script>alert("Auto/Taxi Remark has been Updated.")</script>';
  }
  else
    {
      
      echo '<script>alert("Something Went Wrong. Please try again.")</script>';
    }

  
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Title Page-->
    <title>Auto/Taxi Stand Management System Auto/Taxi Details</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
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
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                          
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Auto/Taxi</strong>Entry  Details
                                    </div>
                                    <div class="card-body card-block">
                                        
                                            

  <?php
 $eid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblstandentry where ID='$eid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?><table border="1" class="table table-bordered mg-b-0">
    <tr>
    <th>Parking Number</th>
    <td><?php  echo $row['ParkingNumber'];?></td>
  </tr>
                                            <tr>
    <th>Type of Vehicle</th>
    <td><?php  echo $row['VehicleType'];?></td>
  </tr>
  
<tr>
    <th>Driver Name</th>
    <td><?php  echo $row['DriverName'];?></td>
  </tr>
  <tr>
    <th>Driver Mobile Number</th>
    <td><?php  echo $row['Drivermobilenumber'];?></td>
  </tr>
  <tr>
    <th>Driver License Number</th>
    <td><?php  echo $row['Driverlicensenumber'];?></td>
  </tr>
  <tr>
    <th>Vehicle Registration Number</th>
    <td><?php  echo $row['Vehicleregistrationnumber'];?></td>
  </tr>
  <tr>
      <tr>
    <th>Vehicle Entry Time</th>
    <td><?php  echo $row['EntryDate'];?></td>
  </tr>
   <tr>
    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Taxi/Auto In";
}
if($row['Status']=="Out")
{
  echo "Taxi/Auto out";
}

     ;?></td></tr>

<?php if($row['Status']==""){ ?>
    <form method="post">
         <tr>
    <th>Outing Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>  
   <tr>
    <th>Price :</th>
    <td>
    <input name="price" class="form-control wd-450" required="true"></td>
  </tr> 
  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control" required="true" >
     <option value="Out">Outgoing Taxi/Auto</option>
   </select></td>
  </tr>                            
 <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button></td>
  </tr>
                                        </form>
               <?php } else { ?>

<tr>
    <th>Outing Remark </th>
    <td><?php echo $row['Remark']; ?></td>
  </tr>

<tr>
    <th>Price </th>
    <td><?php echo $row['Price']; ?></td>
  </tr>
<tr>
<th>Vehicle Out Time</th>
<td><?php echo $row['OutDate']; ?>  </td> 
<?php } ?>
</tr>
</table>                        
                                    </div>
                                   
                                </div>
                       
                        </div>
                            </div>
    
<?php include_once('includes/footer.php');?>
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
<!-- end document-->
<?php }  ?>
<?php }  ?>