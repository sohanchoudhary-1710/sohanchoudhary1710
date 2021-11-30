<?php 
include "conn.php";
session_start();
if(!isset($_SESSION["id"])){
  header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | DataTables</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="bvalidator-master/dist/jquery.bvalidator.min.js"></script>
    <script src="bvalidator-master/dist/themes/presenters/default.min.js"></script>
    <script src="bvalidator-master/dist/themes/gray/gray.js"></script>
    <link href="bvalidator-master/dist/themes/gray/gray.css" rel="stylesheet" />
    <script type="text/javascript">
    function passwordFormat(password) {
        regex = new RegExp(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/); // number, a-z, A-Z, min 8 chars
        if (regex.test(password))
            return true;
        return false;
    }
    </script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index.php" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-comments"></i>
                        <span class="badge badge-danger navbar-badge">3</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user1-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 mr-3 img-circle">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Brad Diesel
                                        <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">Call me whenever you can...</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user8-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        John Pierce
                                        <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">I got your message bro</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">
                                <img src="dist/img/user3-128x128.jpg" alt="User Avatar"
                                    class="img-size-50 img-circle mr-3">
                                <div class="media-body">
                                    <h3 class="dropdown-item-title">
                                        Nora Silvester
                                        <span class="float-right text-sm text-warning"><i
                                                class="fas fa-star"></i></span>
                                    </h3>
                                    <p class="text-sm">The subject goes here</p>
                                    <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                </div>
                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-bell"></i>
                        <span class="badge badge-warning navbar-badge">15</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <span class="dropdown-item dropdown-header">15 Notifications</span>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index.php" class="brand-link">
                <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light">AdminLTE 3</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php $img = $_SESSION['file'];?>
                        <img src="./uploads/<?php echo $img ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block"> <?php 
                        print_r($_SESSION["name"]);
                         ?></a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="User-List.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>User List</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="logout.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Log Out</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="datatable.php" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>datatable</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- Sidebar Menu -->

            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">User manager</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">

                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </section>
            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-12">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Manage <b>Users</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
                                    class="material-icons"></i> <span>Add New User</span></a>
                            <!-- <a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i
                                    class="material-icons"></i> <span>Delete</span></a> -->
                        </div>
                    </div>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="selectAll">
                                        <label for="selectAll"></label>
                                    </span>
                                </th>
                                <th>SL NO</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>USERNAME</th>
                                <th>PASSWORD</th>
                                <th>FILE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
				$result = mysqli_query($conn,"SELECT * FROM `admin`");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
				?>
                            <tr id="<?php echo $row["id"]; ?>">
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" class="user_checkbox"
                                            data-user-id="<?php echo $row["id"]; ?>">
                                        <label for="checkbox2"></label>
                                    </span>
                                </td>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $row["name"]; ?></td>
                                <td><?php echo $row["email"]; ?></td>

                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["password"]; ?></td>
                                <td><?php echo $row["file"]; ?></td>

                                <td>
                                    <a href="#editEmployeeModal" class="edit" data-toggle="modal">
                                        <i class="material-icons update" data-toggle="tooltip"
                                            data-id="<?php echo $row["id"]; ?>" data-name="<?php echo $row["name"]; ?>"
                                            data-email="<?php echo $row["email"]; ?>"
                                            data-username="<?php echo $row["username"]; ?>"
                                            data-password="<?php echo $row["password"]; ?>"
                                            data-file="<?php echo $row["file"] ?>"
                                            title="Edit"><button>EDIT</button></i>
                                    </a>
                                    <a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["id"]; ?>"
                                        data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
                                            title="Delete">
                                            <buttton>DELETE</button>
                                        </i></a>
                                </td>
                            </tr>
                            <?php
				$i++;
				}
				?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- <form id="user_form">
                        <div class="modal-header">
                            <h4 class="modal-title">Add User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>NAME</label>
                                <input type="text" id="name" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>EMAIL</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>USERNAME</label>
                                <input type="phone" id="username" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>PASSWORD</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" class="form-control" id="file" name="file" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="1" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-success" id="btn-add">Add</button>
                        </div>
                    </form> -->
                    <form id="fupForm" enctype="multipart/form-data" data-bvalidator-validate>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                                required />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                placeholder="Enter username" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter password" data-bvalidator="passwordFormat,required"
                                data-bvalidator-msg="Min 8 characters including a number, letters a-z, A-Z" />
                        </div>
                        <div class="form-group">
                            <label for="cpassword">Confirm Password</label>
                            <input type="password" class="form-control" id="cpassword" name="cpassword"
                                placeholder="Enter password" data-bvalidator="equal[password],required"
                                data-bvalidator-msg-equal="Please enter the same password again" />
                            <div style="margin-top: 7px;" id="CheckPasswordMatch"></div>
                        </div>





                        <div class="form-group">
                            <label for="file">File</label>
                            <input type="file" class="form-control" id="file" name="file" required />
                        </div>
                        <!-- <div class="modal-footer">
                            <input type="hidden" value="1" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-success" id="btn-add">Add</button>
                        </div> -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block submitBtn">Register</button>
                        </div>

                        <!-- <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                                    <label for="agreeTerms">
                                        I agree to the <a href="#">terms</a>
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block submitBtn">Register</button>
                            </div>
                        /.col -->
                </div> -->
                </form>
            </div>
        </div>
    </div>
    <!-- Edit Modal HTML -->
    <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <!--  <form id="update_form">
                        <div class="modal-header">
                            <h4 class="modal-title">Edit User</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">
                            <input type="hidden" id="id_u" name="id" class="form-control" required>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" id="name_u" name="name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email_u" name="email" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>username</label>
                                <input type="phone" id="username_u" name="username" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>password</label>
                                <input type="password" id="password_u" name="password" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="file">File</label>
                                <input type="file" class="form-control" id="file_u" name="file" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input type="hidden" value="2" name="type">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <button type="button" class="btn btn-info" id="update">Update</button>
                        </div>
                    </form> -->
                <form id="fupForms" enctype="multipart/form-data" data-bvalidator-validate>
                    <input type="hidden" id="id_u" name="id" class="form-control" required>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name_u" name="name" placeholder="Enter name" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email_u" name="email" placeholder="Enter email" />
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username_u" name="username"
                            placeholder="Enter username" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password_u" name="password"
                            placeholder="Enter password" data-bvalidator="passwordFormat"
                            data-bvalidator-msg="Min 8 characters including a number, letters a-z, A-Z" />
                    </div>






                    <div class="form-group">
                        <label for="file_u">File</label>
                        <input type="file" class="form-control" id="file_u" name="file_u" />
                    </div>


                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="#">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <!-- <button type="submit" class="btn btn-primary btn-block submitBtn">update</button> -->
                            <div class="modal-footer">
                                <input type="hidden" value="2" name="type">
                                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                <button type="submit" class="btn btn-info" >Update</button>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>

                    <div class="modal-header">
                        <h4 class="modal-title">Delete User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="id_d" name="id" class="form-control">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-danger" id="delete">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 3.1.0
        </div>
        <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables  & Plugins -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="plugins/jszip/jszip.min.js"></script>
    <script src="plugins/pdfmake/pdfmake.min.js"></script>
    <script src="plugins/pdfmake/vfs_fonts.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <!-- <script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
    $(document).ready(function(e) {
        // Submit form data via Ajax
        $("#fupForm").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'admin.php',
                data: new FormData(this),
                dataType: 'html',

                contentType: false,
                cache: false,
                processData: false,

                success: function(data) { //console.log(response);
                    alert(data);

                }
            });
        });
        $("#file").change(function() {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office',
                'image/jpeg', 'image/png', 'image/jpg'
            ];
            if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (
                    fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))) {
                alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
                $("#file").val('');
                return false;
            }
        });


   
    $("#fupForms").on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: 'update.php',
                data: new FormData(this),
                dataType: 'html',

                contentType: false,
                cache: false,
                processData: false,

                success: function(data) { //console.log(response);
                    alert(data);

                }
            });
        });
        $("#file_u").change(function() {
            var file = this.files[0];
            var fileType = file.type;
            var match = ['application/pdf', 'application/msword', 'application/vnd.ms-office',
                'image/jpeg', 'image/png', 'image/jpg'
            ];
            if (!((fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (
                    fileType == match[3]) || (fileType == match[4]) || (fileType == match[5]))) {
                alert('Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.');
                $("#file_u").val('');
                return false;
            }
        });


    });

    // $(document).on('click', '#btn-add', function(e) {
    //     var data = $("#user_form").serialize();
    //     alert(data);
    //     $.ajax({
    //         data: data,
    //         type: "post",
    //         url: "save.php",
    //         datatype: 'html',
    //         success: function(data) {
    //             alert(data);
    //         }
    //     });
    // });
    $(document).on('click', '.update', function(e) {
        var id = $(this).attr("data-id");
        var name = $(this).attr("data-name");
        var email = $(this).attr("data-email");
        var username = $(this).attr("data-username");
        var password = $(this).attr("data-password");

        var files =  $(this).attr("data-file");
       
    //     //fd.append('file',files);

    //     // $('#myimage').attr('src', '/imagePath/');
        $('#id_u').val(id);
        $('#name_u').val(name);
        $('#email_u').val(email);
        $('#username_u').val(username);
        $('#password_u').val(password);
    //    // $('#file_u').val(file);
    });

//   //  $(document).on('click', '#update', function(e) {
//         var data = $("#update_form").serialize();
//         //let d=new formData(data);
//         $.ajax({
//             data:data,
//             type: "post",
//             url: "update.php",
//             datatype: 'html',
//             success: function(data) {
//                 alert(data)
//             },
//         });
//     });
    $(document).on("click", ".delete", function() {
        var id = $(this).attr("data-id");
        $('#id_d').val(id);

    });
    $(document).on("click", "#delete", function() {
        $.ajax({
            url: "delete.php",
            type: "POST",
            cache: false,
            datatype: 'html',
            data: {
                type: 3,
                id: $("#id_d").val()
            },
            success: function(data) {
                alert(data);
            }
        });
    });
    </script>



</body>

</html>