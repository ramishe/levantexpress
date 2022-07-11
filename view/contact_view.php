
<?php
ob_start();
?>
<div class="contactnewsl color3">
    <h1>LevantExpress</h1> 
    <p>Faire vos courses autrement</p> 
    <form>
        <div class="input_group">
            <input type="email" class="contactnewslemail"  placeholder="Email Address" required>
            <button type="button" class="button_normal block">Inscription</button>
        </div>
    </form>
</div>

<div class="contactnewsl color2">
    <h2 >CONTACT</h2>
    <p>Contact us and we'll get back to you within 24 hours.</p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Angers</p>
    <p><span class="glyphicon glyphicon-phone"></span> 0033 0761703769</p>
    <p><span class="glyphicon glyphicon-envelope"></span> info@levantexpress.store</p>
    <div class="col_sm1 contactnewsl">
        <input class="form-control" id="name" name="name" placeholder="Nom" type="text" required>
        <input class="form-control" id="email" name="email" placeholder="Email" type="email" required>
        <textarea  name="comments" placeholder="Commentaire" rows="10"></textarea><br>
         <button type="button" class="button_normal block">Send</button>
    </div>
</div>
<?php
$content = ob_get_clean();
require 'template.php';