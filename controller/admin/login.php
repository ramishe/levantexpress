<?php

if(isset($_SESSION["loggedin_admin"]) && $_SESSION["loggedin_admin"] === true){
   header("location:index.php?page=welcome_admin");
  
    exit;
}
 
// Include config file
require_once "./config/config_admin.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if( isset( $_POST ) && !empty( $_POST ) ){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    } 
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        
        // Prepare a select statement
        $sql = "SELECT id, username, psd FROM admins WHERE username = ?";
        
      

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
               
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                  
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                           
                            // Store data in session variables
                            $_SESSION["loggedin_admin"] = true;
                            $_SESSION["id_admin"] = $id;
                            $_SESSION["username_admin"] = $username;                            
                            
                            // Redirect user to previous page
                            /*
                            if(isset($_GET['from'])) {
                                $page = $_GET['from'];
                            } else {
                                $page = $_GET['welcome'];
                            }
                            */
                            header("location:index.php?page=welcome_admin");
                            exit;
                            
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                              
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                   
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
 require'./view/admin/login_view.php'; 