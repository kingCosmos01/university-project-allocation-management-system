<?php
include("../db.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Supervisor- Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="index.php">University Project Management System</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
   <?php include("header.php"); ?>

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
     <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Students</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_students.php">View Student</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_students.php">View Project</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Logout</span></a>
      </li>
      
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="#">Supervisor Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Completed Projects</li>
        </ol>
        <?php
        
        ?>
        <div class="containter-fluid">
          <div class="col-md-12">
            <div class="row">
              <table class="table table-bordered">
                <tr>
                  <th class="text-center" colspan="4">Student</th>
                  <th class="text-center">Work</th>
                </tr>
                <?php
                $username = $_SESSION['id'];
                $qu = "SELECT * FROM supervisor WHERE username='$username'";
                $has = mysqli_query($conn,$qu);
                $rol = mysqli_fetch_assoc($has);
                $ram =  $rol['stud_assigned'];
                if ($rol['stud_assigned'] != 0) {
                  $query = "SELECT * FROM propose_project WHERE project_id='$ram'";
                  $no = mysqli_query($conn,$query);
                
                while ($row = mysqli_fetch_assoc($no)) {
                  
               $timeStamp  = $row['date'];
                $date = date('d<\s\up>S</\s\up> M, Y',strtotime($timeStamp));
                if($count = mysqli_num_rows($no) > 0){
                if($row['final_copy'] != '0'){
                echo"<tr>
                <td><h6 class='bg-dark text-white text-center'>NAME</h6>".$row['student']."</td>
                       <td><h6 class='bg-dark text-white text-center'>MATRIC NUMBER</h6>".$row['mat_no']."</td>
                       <td><h6 class='bg-dark text-white text-center'>DEPARTMENT</h6>".$row['department']."</td>
                       <td><h6 class='bg-dark text-white text-center'>FACULTY</h6>".$row['faculty']."</td>
                      <td><h6 class='bg-dark text-white text-center'>Project Topic</h6>".$row['second_proposal']."</td>
                     <td><h6 class='bg-dark text-white text-center'>Date</h6>$date</td>
                          <td  class='bg-light'>
                         <a href='view.php?id=".$row['id']."'><button class='btn btn-primary'>click to view</button></a>
                        </td> 
                   </tr>";
                }
              }
              else{
                echo "<tr><td><h6 class='text-center'>None is submitted as of Nown</h6></td></tr>";
              }
              }
            }
               ?> 
              </table>
            </div>
          </div>
        </div>



        <?php
        include("footer.php");

       ?>