<?php
$content='<div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
            <div class="form-group">
                <label>Username</label>
                <input type="text" name="username" class="form-control'.!empty($username_err).'is-invalid" value="'.$username.'">
                <span class="invalid-feedback">'.$username_err.'</span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control'.!empty($password_err). 'is-invalid" value="'.$password.'">
                <span class="invalid-feedback">'.$password_err.'</span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control'.!empty($confirm_password_err).'is-invalid" value="'.$confirm_password.'">
                <span class="invalid-feedback">'.$confirm_password_err.'</span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <input type="reset" class="btn btn-secondary ml-2" value="Reset">
            </div>
            <p>Already have an account? <a href="index.php?page=login">Login here</a>.</p>
        </form>
    </div>';
require'./view/template.php';