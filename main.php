<?php
class Login {
    private $db;

    public function __construct(){
        require 'sad/db.php';
        $this->db = $conn;
    }

    public function login($username, $password){
        $getUser = mysqli_query($this->db, "SELECT * FROM staff WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);

        if(isset($fetch)){
            // Verify the entered password against the stored hashed password
            if (password_verify($_POST['password'], $fetch['password'])) {
                $_SESSION['StaffID'] = $fetch['StaffID'];
                $_SESSION['FirstName'] = $fetch['FirstName'];
                $_SESSION['LastName'] = $fetch['LastName'];
                $_SESSION['username'] = $fetch['username'];

                return true;
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        }
    }


    public function adminlog($username, $password){
        $getUser = mysqli_query($this->db, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'");
        $fetch = mysqli_fetch_array($getUser);

        if(isset($fetch)){
            $_SESSION['id'] = $fetch['id'];
            $_SESSION['username'] = $fetch['username'];

            return true;
        } else {
            echo "User not found";
        }
    }
   
    public function loginByRole($username, $password, $role) {
        $table = $role === 'admin' ? 'admin' : ($role === 'staff' ? 'staff' : 'doctor');
        $roleField = $role === 'doctor' ? 'Password' : 'password';

        $getUser = mysqli_query($this->db, "SELECT * FROM $table WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);

        if ($fetch && isset($fetch[$roleField])) {
            if (password_verify($password, $fetch[$roleField])) {
                $_SESSION[$role === 'doctor' ? 'DoctorID' : 'StaffID'] = $fetch[$role === 'doctor' ? 'DoctorID' : 'StaffID'];
                $_SESSION['FirstName'] = $fetch['FirstName'];
                $_SESSION['LastName'] = $fetch['LastName'];
                $_SESSION['username'] = $fetch['username'];
                return true;
            } else {
                echo "Invalid password";
            }
        } else {
            echo "$role not found";
        }

        return false;
    }
    public function userlog($username, $password){
        $getUser = mysqli_query($this->db, "SELECT * FROM user WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);
    
        if(isset($fetch)){
            // Verify the entered password against the stored hashed password
            if (password_verify($_POST['password'], $fetch['password'])) {
                $_SESSION['id'] = $fetch['id'];
                $_SESSION['first_name'] = $fetch['first_name'];
                $_SESSION['last_name'] = $fetch['last_name'];
                $_SESSION['username'] = $fetch['username'];
    
                return true;
            } else {
                echo "Invalid password";
            }
        } else {
            echo "User not found";
        }
    }
    public function getStaffIdByUsername($username) {
        $getUser = mysqli_query($this->db, "SELECT StaffID FROM staff WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);
    
        return isset($fetch['StaffID']) ? $fetch['StaffID'] : null;
    }
    
    public function doctorlog($username, $password) {
        $getUser = mysqli_query($this->db, "SELECT * FROM doctor WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);
   
        if (isset($fetch)) {
            // Verify the entered password against the stored hashed password
            if (password_verify($password, $fetch['password'])) {
                $_SESSION['DoctorID'] = $fetch['DoctorID'];
                $_SESSION['FirstName'] = $fetch['FirstName'];
                $_SESSION['LastName'] = $fetch['LastName'];
                $_SESSION['username'] = $fetch['Username'];
   
                return true;
            } else {
                return "Invalid password";
            }
        } else {
            return "Doctor not found";
        }
   
        return false;
    }
   
    public function getDoctorIdByUsername($username) {
        $getUser = mysqli_query($this->db, "SELECT DoctorID FROM doctor WHERE username = '$username'");
        $fetch = mysqli_fetch_array($getUser);

        if (isset($fetch['DoctorID'])) {
            return $fetch['DoctorID'];
        } else {
            echo "Doctor not found";
            return null;
        }
    }
    
}
?>