<?php
ob_start();
?>
<div class="container_about_page">
    <img src="./public/images/about/about_photo.jpg"></img>
    <div class="map_google_box">
        <div class="text_map">
            <p>Notre boutique en ligne est la promière boutique qui Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
            sed diam nonummy nibh euismod tincidunt ut laoreet dolore
            magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
            quis nostrud exerci tation ullamcorper suscipit lobortis nisl
            ut aliquip ex ea commodo consequat. Duis autem vel eum iriure
            dolor in hendrerit in vulputate velit esse molestie consequat,
            vel illum dolore eu feugiat nulla facilisis at vero eros et
            accumsan et iusto odio dignissim qui blandit praesent luptatum
            zzril delenit augue duis dolore te feugait nulla facilisi.
            . </p>
        </div>
        <div class="google_map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2695.785084008218!2d-0.5762955844624644!3d47.49409997917737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48087ed32996811b%3A0x26083fb81ffa6f7!2s89%20Rue%20des%20Artilleurs%2C%2049100%20Angers!5e0!3m2!1sfr!2sfr!4v1655800154118!5m2!1sfr!2sfr" width="100%" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require 'template.php';