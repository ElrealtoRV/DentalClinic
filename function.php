<?php
session_start();

if (isset($_POST['signin'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  // Perform a SQL query to check if the user exists
  $query = "SELECT id, first_name, password FROM user WHERE email = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("s", $email);
  $stmt->execute();
  $stmt->bind_result($id, $first_name, $hashed_db_password);

  if ($stmt->fetch() && password_verify($password, $hashed_db_password)) {
      // Login successful
      $_SESSION['id'] = $id;
      $_SESSION['first_name'] = $first_name;
      header("location: myservices.php");
      exit();
  } else {
      // Login failed
      echo "Invalid email or password.";
  }

}

class Signin {
  private $db, $email, $password;

  public function __construct()
  {
      require 'sad/db.php';
      $this->db = $conn;
  }

  public function signin($email, $password)
  {
      $getUser = mysqli_query($this->db, "SELECT * FROM user WHERE email = '$email'");
  
      // Fetch the user data
      $fetch = mysqli_fetch_array($getUser);
  
      if ($fetch && password_verify($password, $fetch['password'])) {
          // Password is correct
          $_SESSION['id'] = $fetch['id'];
          $_SESSION['first_name'] = $fetch['first_name'];
          $_SESSION['last_name'] = $fetch['last_name'];
          $_SESSION['password'] = $fetch['password'];
  
          return true;
      } else {
          // User not found or incorrect password
          echo "Invalid email or password";
          return false;
      }
  }
  
}


class Signup {
  private $db, $contactnum, $name, $email, $password, $vpword;

  public function __construct()
  {
    require 'dbconnect.php';
    $this->db = $con;
  }

  public function signup($contactnum, $name, $email, $password, $vpword){
    $this->contactnum = $contactnum;
    $this->name = $name;
    $this->email = $email;
    $this->password = sha1($password);

    $insertToDB =mysqli_query($this->db, "INSERT INTO users (contact_num,name,email,password)
    VALUES ('$contactnum','$name','$email','$password')");


    if($insertToDB){
      echo 'user successfully registered';
    }else{
      echo 'error';
  }
  }
}