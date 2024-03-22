<?php
 include("connection/connection.php");


 if(isset($_POST["register"]))
 {
      if(empty($_POST["email"]) || empty($_POST["password"]) || empty($_POST["fname"]) || empty($_POST["lname"]))
      {
           echo '<script>alert("Both Fields are required")</script>';
      }
      else{
        if (($_POST['password']) != ($_POST['repassword'])) {
            echo "<script>alert('Passwords entered are not the same')";
      }
      else
      {
          $fname = mysqli_real_escape_string($connection, $_POST["fname"]);
          $lname = mysqli_real_escape_string($connection, $_POST["lname"]);
           $email = mysqli_real_escape_string($connection, $_POST["email"]);
           $password = mysqli_real_escape_string($connection, $_POST["password"]);
           $passwordH = password_hash($password, PASSWORD_DEFAULT);
           $query = "INSERT INTO user(first_name, last_name, user_email, user_pword) VALUES('$fname','$lname','$email', '$passwordH')";
           if(mysqli_query($connection, $query))
           {
                echo '<script>alert("Registration Done")</script>';
                  echo '<script>window.location="index.php";</script>';

           }}
      }
 }
 if(isset($_POST["login"]))
 {
      if(empty($_POST["email"]) || empty($_POST["password"]))
      {
           echo '<script>alert("Both Fields are required")</script>';
      }
      else
      {
           $email = mysqli_real_escape_string($connection, $_POST["email"]);
           $password = mysqli_real_escape_string($connection, $_POST["password"]);
           $query = "SELECT * FROM user WHERE user_email = '$email'";
           $result = mysqli_query($connection, $query);

           if(mysqli_num_rows($result) == 1)
           {
                while($row = mysqli_fetch_array($result))
                {
                     if(password_verify($password, $row["user_pword"]))
                     {
                        $user = $_SESSION['user_email'];
                        $get_user = "select * from user where user_email='$user'";
                        $run_user = mysqli_query($connection,$get_user);
                        $row=mysqli_fetch_array($run_user);

                        $user_id = $row['user_id'];
                        $_SESSION['user_id'] = $user_id;
                        $user_email = $row['user_email'];
                          $_SESSION['user_email'] = $email;

                          echo '<script>window.location="index.php";</script>';
                     }
                     else
                     {
                          //return false;
                          echo '<script>alert("Wrong User Details")</script>';
                     }
                }
           }
           else
           {
                echo '<script>alert("Wrong User Details")</script>';
           }
      }
 }
 ?>
