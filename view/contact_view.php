
<?php
ob_start();
?>
<div class="container_contact">
    <h1>LevantExpress</h1> 
    <p>Faire vos courses autrement</p> 
    <form>
        <div class="input_group">
            <input type="email" class="form_control" size="50" placeholder="Email Address" required>
            <button type="button" class="btn_add_produit">Inscription</button>
        </div>
    </form>
</div>

<div id="contact" class="container_contact">
    <h2 >CONTACT</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contact us and we'll get back to you within 24 hours.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Chicago, US</p>
            <p><span class="glyphicon glyphicon-phone"></span> +00 1515151515</p>
            <p><span class="glyphicon glyphicon-envelope"></span> myemail@something.com</p>
        </div>
        <div class="col-sm-7 slideanim">
            <div class="row">
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="name" name="name" placeholder="Name" type="text" required>
                </div>
                <div class="col-sm-6 form-group">
                    <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
                </div>
            </div>
            
            <textarea class="form-control" id="comments" name="comments" placeholder="Comment" rows="5"></textarea><br>
            <div class="row">
                <div class="col-sm-12 form-group">
                    <button class="btn btn-default pull-right" type="submit">Send</button>
                </div>
            </div>
            
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'template.php';