<?php 
$error1 = "";
$error2 = "";
session_start();
//------ PHP code for User registration form---

if (array_key_exists("signUp", $_POST)) {
 
     // Database Link
    include('linkDB.php');  
 
    //Taking HTML Form Data from User
    
    $email = mysqli_real_escape_string($linkDB, $_POST['email']);
    $password = mysqli_real_escape_string($linkDB,  $_POST['password']); 
    $repeatPassword = mysqli_real_escape_string($linkDB,  $_POST['repeatPassword']);
    $type = mysqli_real_escape_string($linkDB, $_POST['type']);
    $gender =  mysqli_real_escape_string($linkDB, $_POST['gender']);
    $fname = mysqli_real_escape_string($linkDB, $_POST['fname']);
    $lname = mysqli_real_escape_string($linkDB, $_POST['lname']);
    $NIC = mysqli_real_escape_string($linkDB, $_POST['NIC']);
    $phone = mysqli_real_escape_string($linkDB, $_POST['phone']);
    $dob = mysqli_real_escape_string($linkDB, $_POST['dob']);
    $emphone = mysqli_real_escape_string($linkDB, $_POST['emphone']);
    $emname = mysqli_real_escape_string($linkDB, $_POST['emname']);
     
    if($password!==$repeatPassword){
        $error1 = "<h3> Your Passwords does not match </h3>";
    }
    else{
                 
        //Check if email is already exist in the Database
 
        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($linkDB, $query);
        if (mysqli_num_rows($result) > 0) {
            $error1 = "<h3> Your email address has already been taken!  </h3>";
        } else {
 
            //Password encryption or Password Hashing
            $hashedPassword = md5($password); 
            $query = "INSERT INTO users (email, password, type, gender, fname, lname, NIC, phone, dob, emphone, emname) VALUES ('$email', '$hashedPassword', '$type', '$gender', '$fname', '$lname', '$NIC', '$phone', '$dob', '$emphone', '$emname')";
             
            if (!mysqli_query($linkDB, $query)){
                $error1 = "<h3> Could not sign you up - please try again.  </h3>";
                } else {
 
                    //session variables to keep user logged in
                $_SESSION['id'] = mysqli_insert_id($linkDB);  
                $_SESSION['email'] = $email;
 
                //Setcookie function to keep user logged in for long time
                // if ($_POST['stayLoggedIn'] == '1') {
                // setcookie('id', mysqli_insert_id($linkDB), time() + 60*60*365);
                // //echo "<p>The cookie id is :". $_COOKIE['id']."</P>";
                // }
                  
                //Redirecting user to home page after successfully logged in 

                if ($type=='client') {
                    header("Location: clientprofile.php");  
                }

                else{
                    header("Location: coachprofile.php");
                }
                
                }
             
            }
        }
        }  
    
    
      //-------User Login PHP Code ------------
     
if (array_key_exists("logIn", $_POST)) {
    
    // Database Link
    include('linkDB.php'); 
    
    //Taking form Data From User
    $email = mysqli_real_escape_string($linkDB, $_POST['email']);
    $password = mysqli_real_escape_string($linkDB,  $_POST['password']); 
    
    //matching email and password
    
    $query = "SELECT * FROM users WHERE email='$email'";
    $result = mysqli_query($linkDB, $query);
            $row = mysqli_fetch_array($result);
            $verify= md5($password);
            if (count($row)) {
                
                if ($verify==$row['password']) {
                    
                    //session variables to keep user logged in
                    $_SESSION['email'] = $row['email'];  
                    
                    // //Logged in for long time until user didn't log out
                    // if ($_POST['stayLoggedIn'] == '1') {
                    //     setcookie('email', $row['email'], time() + 60*60*24); //Logged in permanently
                    // }
                    if ($row['type']=='client') {
                        header("Location: clientdashboard.php");
                    }
                    else{
                        header("Location: coachdashboard.php");
                    }

                } else {
                    $error2 = "<h3>Combination of email/password does not match! </h3>";
                     }
   
                     } else {
                        $error2 = "<h3>Combination of email/password does not match! </h3>";
                 }
                 
        }
