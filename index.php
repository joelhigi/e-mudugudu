<!DOCTYPE html>
<?php
session_start();
  require 'connection/connection.php';
?>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E-Mudugudu</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
   <script src="js/swal.js"></script>
  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Murakaza neza E-Mudugudu</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" name="email" placeholder="Aderesi ya E-mail" required="required">
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Ijambo banga" name="password" required="required">
                    </div>

                    <input type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Kwinjira">

                   <!--  <hr>
                    <a href="index.php" class="btn btn-google btn-user btn-block">
                      <i class="fab fa-google fa-fw"></i> Login with Google
                    </a>
                    <a href="index.php" class="btn btn-facebook btn-user btn-block">
                      <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                    </a> -->
                  </form>
                  <?php
                      if(isset($_POST["login"]))
                      {

                            $email = mysqli_real_escape_string($connection, $_POST["email"]);
                            $password = mysqli_real_escape_string($connection, $_POST["password"]);
                            $query = "SELECT * FROM user WHERE email = '$email'";
                            $result = mysqli_query($connection, $query);

                            if(mysqli_num_rows($result) == 1)
                            {
                                 while($row = mysqli_fetch_array($result))
                                 {
                                      if(password_verify($password, $row["password"]))
                                      {
                                         $get_user = "select * from user where email='$email'";
                                         $run_user = mysqli_query($connection,$get_user);
                                         $row=mysqli_fetch_array($run_user);

                                         $user_id = $row['user_id'];
                                         $_SESSION['user_id'] = $user_id;
                                         $user_email = $row['email'];
                                           $_SESSION['user_email'] = $email;


                                           echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "BYAKUNZE",
                             text: "Imyirondoro Yemewe.",
                             icon: "success",
                             timer: 89000
                             }).then(function() {
                                window.location.href = "ishusho.php";
                            });


                            </script>';

                                      }
                                      else
                                      {
                                           //return false;

                                           echo '
                            <script type="text/javascript">
                            swal.fire({
                             title: "BYANZE",
                             text: "Imyirondoro washyizemo siyo .",
                             icon: "error",
                             timer: 89000
                             }).then(function() {
                                window.location.href = "index.php";
                            });


                            </script>';
                                      }
                                 }
                            }
                            else
                            {
                              echo '
                              <script type="text/javascript">
                              swal.fire({
                               title: "BYANZE",
                               text: "Imyirondoro washyizemo siyo",
                               icon: "error",
                               timer: 89000
                               }).then(function() {
                                  // window.location.href = "./amatables/igipangu_data.php";
                              });


                              </script>';
                            }

                      }
                  ?>
                  <!-- <hr> -->
                  <div class="text-center">
                    <a class="small" href="forgot-password.php">Mwibagiwe ijambo banga?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Gukora konti!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
