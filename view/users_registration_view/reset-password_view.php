<?php
$content='<div class="wrapper">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="" method="POST"> 
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_password" class="form-control'.!empty($new_password_err).'" value="'.$new_password.'">
                <span class="invalid-feedback">'.$new_password_err.'</span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control'.!empty($confirm_password_err).'">
                <span class="invalid-feedback">'.$confirm_password_err.'</span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link ml-2" href="index.php?page=welcome">Cancel</a>
            </div>
        </form>
    </div>';
    
    
require'./view/template.php';    
    
