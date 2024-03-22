<!DOCTYPE html>
<html>
<head>
  <title>Gusiba</title>
  <!--SWAL script -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <!-- -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="js/swal.js"></script>

</head>

</html>
<?php
session_start();
if(!isset($_SESSION['user_email']))
{
  header("index.php");
}

else{
  require 'connection/connection.php';



      if(isset($_GET['umuturage_id'])){
        $deleteID = $_GET['umuturage_id'];
        $checkChief1 = mysqli_query($connection,"SELECT * FROM nyirinzu WHERE umuturage_id = '$deleteID'");
        $checkChief2 = mysqli_query($connection,"SELECT * FROM umuyobozi_umuryango WHERE umuturage_id = '$deleteID'");
        $checkChief4 = mysqli_query($connection,"SELECT * FROM umuyobozi_isibo WHERE umuturage_id = '$deleteID'");
        if(mysqli_num_rows($checkChief1)>0){
          /* SWAL */
          $delete = "DELETE FROM nyirinzu WHERE umuturage_id = '$deleteID'";
          $result = mysqli_query($connection,$delete);

        }
        if(mysqli_num_rows($checkChief2)>0){
          /* SWAL */
          $delete = "DELETE FROM umuyobozi_umuryango WHERE umuturage_id = '$deleteID'";
          $result = mysqli_query($connection,$delete);

        }

        if(mysqli_num_rows($checkChief4)>0){
          /* SWAL */
          $delete = "DELETE FROM umuyobozi_isibo WHERE umuturage_id = $deleteID";
          $result = mysqli_query($connection,$delete);

        }
        $delete = "DELETE FROM umuturage WHERE umuturage_id = '$deleteID'" ;
        $result = mysqli_query($connection,$delete);


        if($result)
        {

          echo '
          <script type="text/javascript">
          swal.fire({
           title: "Byakoze",
           text: "Umuturage avuye muri sisiteme.",
           icon: "warning",
           timer: 89000
           }).then(function() {
              window.history.back();
          });


          </script>';
        }
        else{
          echo '
          <script type="text/javascript">
          swal.fire({
           title: "Byanze",
           text: "Umuturage ntabwo avuye muri sisiteme.",
           icon: "error",
           timer: 89000
           }).then(function() {
              window.history.back();
          });


          </script>';

        }


          }

  if(isset($_GET['umuryango_id'])){
    $deleteID = $_GET['umuryango_id'];
    $get_name = "select * from umuryango where umuryango_id='$deleteID'";
    $run_name = mysqli_query($connection,$get_name);
    $rowName = mysqli_fetch_array($run_name);
    $tur = $rowName['status_tura_kodesha'];
    $result = mysqli_query($connection,"SELECT * FROM andi_makuru_umuryango WHERE umuryango_id='$deleteID'");
    if(mysqli_num_rows($result)>0){
      $deleteAndiMakuru = "DELETE FROM andi_makuru_umuryango WHERE umuryango_id = '$deleteID'";
      $resultAndiMakuru = mysqli_query($connection,$deleteAndiMakuru);
    }
    $result = mysqli_query($connection,"SELECT * FROM umuyobozi_umuryango WHERE umuryango_id='$deleteID'");
    if(mysqli_num_rows($result)>0){
      $deleteChief = "DELETE FROM umuyobozi_umuryango WHERE umuryango_id = '$deleteID'";
      $resultChief = mysqli_query($connection,$deleteChief);
    }
    $result = mysqli_query($connection,"SELECT * FROM nyirinzu WHERE umuryango_id='$deleteID'");
    if(mysqli_num_rows($result)>0){
      $deleteChief = "DELETE FROM nyirinzu WHERE umuryango_id = '$deleteID'";
      $resultChief = mysqli_query($connection,$deleteChief);
    }

      $result=mysqli_query($connection,"SELECT * FROM umuturage WHERE umuryango_id='$deleteID'");
      if(mysqli_num_rows($result)>0){
        echo '
          <script type="text/javascript">
          swal.fire({
           title: "Byanze",
           text: "Haracyari abaturage babarizwa muri uyu muryango.",
           icon: "warning",
           timer: 89000
           }).then(function() {
              window.location.href = "umuryango_data.php";
          });


          </script>';
      }


    if (mysqli_num_rows($result)==0) {
      $deleteBig = "DELETE FROM umuryango WHERE umuryango_id = '$deleteID'";
    $resultBig = mysqli_query($connection,$deleteBig);
    if($resultBig)
    {

      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byakoze",
       text: "Umuryango uvuye muri sisiteme.",
       icon: "warning",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';
    }
    else{
      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byanze",
       text: "Umuryango ntabwo uvuye muri sisiteme.",
       icon: "error",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';

    }
    }


      }

  if(isset($_GET['inzu_id'])){
    $deleteID = $_GET['inzu_id'];

    $result2 = mysqli_query($connection,"SELECT * FROM nyirinzu WHERE inzu_id = '$deleteID'");

    if(mysqli_num_rows($result2)>0){
      $result = mysqli_query($connection,"DELETE FROM nyirinzu WHERE inzu_id='$deleteID'");
    }

    $delete = "DELETE FROM inzu WHERE inzu_id = '$deleteID'" ;
    $result = mysqli_query($connection,$delete);
    if($result)
    {

      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byakoze",
       text: "Inzu ivuye muri sisiteme.",
       icon: "warning",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';
    }
    else{
      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byanze",
       text: "Inzu ntabwo ivuye muri sisiteme.",
       icon: "error",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';

    }


      }


  if(isset($_GET['igipangu_id'])){
    $deleteID = $_GET['igipangu_id'];
    $result = mysqli_query($connection,"SELECT * FROM inzu WHERE igipangu_id = '$deleteID'");
    if(mysqli_num_rows($result)>0){
      echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Haracyari amazu muri iki gipangu",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
    }
    else{
      $delete = "DELETE FROM igipangu WHERE igipangu_id = '$deleteID'" ;
      $result = mysqli_query($connection,$delete);
      if($result)
      {

        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byakoze",
         text: "Igipangi kivuye muri sisiteme.",
         icon: "warning",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
      }
      else{
        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Igipangu ntabwo kivuye muri sisiteme.",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';

      }


  }
}


  if(isset($_GET['isibo_id'])){
    $deleteID = $_GET['isibo_id'];
    $result = mysqli_query($connection,"SELECT * FROM igipangu WHERE isibo_id = '$deleteID'");
    if(mysqli_num_rows($result)>0){
      /* SWAL modal */
      echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Hari ibipangu muri sisiteme bikibarizwa muri rino sibo.",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
    }
    else{
      $result = mysqli_query($connection,"SELECT * FROM umuyobozi_isibo WHERE isibo_id = '$deleteID'");
      if(mysqli_num_rows($result)>0){
        $resultChief = mysqli_query($connection,"DELETE FROM umuyobozi_isibo WHERE isibo_id = '$deleteID'");
      }

        $delete = "DELETE FROM isibo WHERE isibo_id = '$deleteID'" ;
        $result = mysqli_query($connection,$delete);

          if($result)
          {

            echo '
            <script type="text/javascript">
            swal.fire({
             title: "Byakoze",
             text: "Isibo rivuye muri sisiteme.",
             icon: "warning",
             timer: 89000
             }).then(function() {
                window.history.back();
            });


            </script>';
          }
          else{
            echo '
            <script type="text/javascript">
            swal.fire({
             title: "Byanze",
             text: "Isibo ntabwo rivuye muri sisiteme.",
             icon: "error",
             timer: 89000
             }).then(function() {
                window.history.back();
            });


            </script>';


        }



    }
  }


  if(isset($_GET['igikorwa_id'])){
    $deleteID = $_GET['igikorwa_id'];
    $getpicNameSql = mysqli_query($connection,"SELECT amafoto_name FROM amafoto WHERE igikorwa_id=$deleteID");
    while($picName = mysqli_fetch_assoc($getpicNameSql))
    {
      $newPicName = 'img/ibikorwa/'.$picName['amafoto_name'];
      unlink($newPicName);
    }

    $result = mysqli_query($connection,"SELECT * FROM amafoto WHERE igikorwa_id = '$deleteID'");
    if(mysqli_num_rows($result)>0){
      $delete1 = "DELETE FROM amafoto WHERE igikorwa_id = '$deleteID'" ;
    $result1 = mysqli_query($connection,$delete1);
    }
    $delete4 = "DELETE FROM andi_makuru_igikorwa WHERE igikorwa_id = '$deleteID'" ;
    $result4 = mysqli_query($connection,$delete4);

    $delete2 = "DELETE FROM igikorwa WHERE igikorwa_id = '$deleteID'" ;
    $result2 = mysqli_query($connection,$delete2);
    if($result2)
    {

      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byakoze",
       text: "Igikorwa kivuye muri sisiteme.",
       icon: "warning",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';
    }
    else{
      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byanze",
       text: "Igikorwa ntabwo kivuye muri sisiteme.",
       icon: "error",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';


  }



    }


  if(isset($_GET['ubwisungane_id'])){
    $deleteID = $_GET['ubwisungane_id'];
    $result1 = mysqli_query($connection,"SELECT * FROM umuturage WHERE ubwisungane_id = '$deleteID'");

    if((mysqli_num_rows($result1)>0)){

        $update = "UPDATE umuturage SET ubwisungane_id=NULL WHERE ubwisungane_id='$deleteID'";
        $result = mysqli_query($connection,$update);


    }

      $delete = "DELETE FROM ubwisungane WHERE ubwisungane_id = '$deleteID'" ;
      $result = mysqli_query($connection,$delete);
      if($result)
      {

        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byakoze",
         text: "Ubwisungane buvuye muri sisiteme.",
         icon: "warning",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
      }
      else{
        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Ubwisungane ntabwo buvuye muri sisiteme.",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';


    }


      }


  if(isset($_GET['ibyiciro_id'])){
    $deleteID = $_GET['ibyiciro_id'];
    $result1 = mysqli_query($connection,"SELECT * FROM umuturage WHERE ibyiciro_id = '$deleteID'");

    $result3 = mysqli_query($connection,"SELECT * FROM umuryango WHERE ibyiciro_id = '$deleteID'");
    if((mysqli_num_rows($result1)>0)||(mysqli_num_rows($result3)>0)){
      if(mysqli_num_rows($result1)>0){
        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Hari abaturage muri sisiteme bakibarizwa muri iki cyiciro",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
      }

      if(mysqli_num_rows($result3)>0){
        echo '
        <script type="text/javascript">
        swal.fire({
         title: "Byanze",
         text: "Hari imiryango muri sisiteme ikibarizwa muri iki cyiciro",
         icon: "error",
         timer: 89000
         }).then(function() {
            window.history.back();
        });


        </script>';
      }
    }
    else{
      $delete = "DELETE FROM igikorwa WHERE igikorwa_id = '$deleteID'" ;
      $result = mysqli_query($connection,$delete);

        if($result)
        {

          echo '
          <script type="text/javascript">
          swal.fire({
           title: "Byakoze",
           text: "Icyiciro cyavuye muri sisiteme.",
           icon: "warning",
           timer: 89000
           }).then(function() {
              window.history.back();
          });


          </script>';
        }
        else{
          echo '
          <script type="text/javascript">
          swal.fire({
           title: "Byanze",
           text: "Icyiciro ntabwo cyavuye muri sisiteme.",
           icon: "error",
           timer: 89000
           }).then(function() {
              window.history.back();
          });


          </script>';

        }



        }
      }


  if(isset($_GET['amafoto_id'])){
    $deleteID = $_GET['amafoto_id'];
    $getpicNameSql = mysqli_query($connection,"SELECT amafoto_name FROM amafoto WHERE amafoto_id=$deleteID");
    $picName = mysqli_fetch_assoc($getpicNameSql);
    $newPicName = $picName['amafoto_name'];
    $delete = "DELETE FROM amafoto WHERE amafoto_id = '$deleteID'" ;
    $result = mysqli_query($connection,$delete);
    if($result)
    {
      $unlinkURL = 'img/ibikorwa/'.$newPicName;
      if(unlink($unlinkURL)){
      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byakoze",
       text: "Ifoto yavuye muri sisiteme.",
       icon: "warning",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';}
    }
    else{
      echo '
      <script type="text/javascript">
      swal.fire({
       title: "Byanze",
       text: "Ifoto ntabwo ivuye muri sisiteme.",
       icon: "error",
       timer: 89000
       }).then(function() {
          window.history.back();
      });


      </script>';

    }
    }

//window.history.back();




  }
?>
