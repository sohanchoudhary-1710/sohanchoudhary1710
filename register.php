
<?php 
include "conn.php";
session_start();
if(isset($_SESSION["id"])){
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Registration Page</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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

<body class="hold-transition register-page">

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Register a new membership</p>
            <form id="fupForm" enctype="multipart/form-data" data-bvalidator-validate>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter email"
                        required />
                </div>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username"
                        required />
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


                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                I agree to the <a href="#">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block submitBtn">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            <a href="login.php" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
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
      

    });
    </script>

</body>

</html>