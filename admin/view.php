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

  <title>Admin- Dashboard</title>

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
          <a class="dropdown-item" href="view_students.php">View all Students</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Supervisors</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_supervisors.php">Assign Supervisor</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Projects</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
          <h6 class="dropdown-header">Activity</h6>
          <a class="dropdown-item" href="view_project.php">View all Projects</a>
          <a class="dropdown-item" href="asign_supervisor.php">Asign Student</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="confirm_reg.php">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Grant User Acess</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="add_admin.php">
          <i class="fas fa"></i>
          <span>Add Admin</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">
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
        <div class="containter-fluid">
          <div class="col-md-12">
            <div class="row">
              <table class="table table-bordered">
                <tr>
                  <th class="text-center">Final copy</th>
                </tr>
                <tr>
                <?php
                if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $query = "SELECT * FROM propose_project WHERE id='$id'";
                  $no = mysqli_query($conn,$query);
                  while($row = mysqli_fetch_assoc($no)){
                  if ($row['final_copy'] == '0') {
                    echo "<td><h6 class='text-center'>Not submitted yet!</h6></td>";
                  }else{
                    echo "<td>".$row['final_copy']."</td>";
                  }
                }
                }
                ?>
              </tr>
              </table>
            </div>
          </div>
        </div>
        <?php
        include("footer.php");
       ?>