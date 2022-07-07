window.addEventListener("DOMContentLoaded", (event) => {
  
   //treter sub menu pour affiche les rayon
let rayons = document.getElementById('rayon');
let list_rayon = document.getElementById('liste_rayon');
let btnClose1 = document.getElementById('btnClose1');

rayons.addEventListener('click', e => {
    e.preventDefault();
    list_rayon.classList.toggle('is_active');
})
btnClose1.addEventListener('click', e => {
    e.preventDefault();
    list_rayon.classList.toggle('is_active');
})
  
  
$(document).ready(function($) {
    $('.diaporama').slick({
        autoplay:true,
        autoplaySpeed: 1000,
        dots: true,
        arrows: true,
        infinite: true,
    });
  
    $('.diaporama_product').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.diapo_principal_photo_product',
        dots: false,
        centerMode: false,
        focusOnSelect: true
    });
    
    $('.diapo_principal_photo_product').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        centerMode: false,
        focusOnSelect: true
    }); 
    
    $('.lazy').slick({
        lazyLoad: 'ondemand',
        slidesToShow: 5,
        slidesToScroll: 1,
        infinite: true,
        autoplay:true,
        autoplaySpeed: 500,
    });
}); 
    // Zoom
let diapo_zoom = document.querySelectorAll('.diapo_principal_product_item');
let zoom_image_product= document.getElementById('zoom_image_product');
if(diapo_zoom!=null) {
    for(let i of diapo_zoom) {
        i.addEventListener('mouseover', function() {
        zoomIn();
        document.addEventListener('mousemove', coordonnees);
        });
        i.addEventListener('mouseout', function(e) {
        zoomOut();
        document.removeEventListener('mousemove', coordonnees);
        });
    }
}
    
function zoomIn(event) {
    zoom_image_product.classList.remove('hidden');
}

function zoomOut() {
    zoom_image_product.classList.add('hidden');
}
     
function coordonnees(e) {
    let img = document.querySelector('.diapo_principal_photo_product');
    let position = img.getBoundingClientRect();
    let xx = position.left+100;
    let yy = position.top+70;
    let x = e.clientX-xx;     
    let y = e.clientY-yy;
    let realWidth = e.target.naturalWidth;
    let realHeight = e.target.naturalHeight;
    let Width = e.target.offsetWidth;
    let Height = e.target.offsetHeight;
    let propX = (realWidth*2)/Width;
    let propY = realHeight/Height;
    console.log(Width, Height);
    zoom_image_product.innerHTML = '<img src="'+e.target.src+'" style="position:absolute; top:-'+y*propY+'px; left:-'+x*propX+'px;">';
}

let btn_add_produit = document.getElementsByClassName('btn_add_produit');
let list_panier = document.getElementById('list_panier');
let btn_close_popup_panier = document.getElementById('btn_close_popup_panier');
let cart_content = document.getElementById('cart_content');
let number_articles_in_basket=document.getElementById('number_articles_in_basket');

btn_close_popup_panier.addEventListener('click',function(){
    list_panier.classList.add('hidden');
});
for(let i of btn_add_produit){
    i.addEventListener("click", function(e){
        e.preventDefault();
        let prod_id = e.target.id;
        let formData = new FormData();
        formData.append('prod_id', prod_id);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/cart.php', obj)
        .then(response => response.text())
        .then(data => {
        cart_content.innerHTML = data;
        let nb_cart = document.getElementsByClassName('cart_item').length;
        number_articles_in_basket.innerHTML = nb_cart;
        })
        .catch(err => console.error(err));
        list_panier.classList.remove('hidden');
    });
}
function Message(message){
    let msg=message;
    alert(msg);
}
//gerer wishlist
let products_wishlist=document.getElementsByClassName('products_wishlist');
let list_wishlist = document.getElementById('list_wishlist');
let btn_close_popup_wishlist = document.getElementById('btn_close_popup_wishlist');
let number_articles_in_wishlist=document.getElementById('number_articles_in_wishlist');
let wishlist_content=document.getElementById('wishlist_content');
 if (number_articles_in_wishlist.textContent > 0){
            number_articles_in_wishlist.classList.remove('hidden')
        }else {
            number_articles_in_wishlist.classList.add('hidden')
        }
btn_close_popup_wishlist.addEventListener('click',function(){
    list_wishlist.classList.add('hidden');
});
for(let i of products_wishlist){
    i.addEventListener("click", function(e){
        e.preventDefault();
        if (number_articles_in_wishlist.textContent >= 0){
            number_articles_in_wishlist.classList.remove('hidden')
        }else {
            number_articles_in_wishlist.classList.add('hidden')
        }
        let prod_id1 = i.id;
        let formData = new FormData();
        formData.append('prod_id1', prod_id1);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/ajax_wishlist.php', obj)
        .then(response => response.text())
        .then(data => {
        wishlist_content.innerHTML = data;
        let nb_cart_wishlist = document.getElementsByClassName('cart_item_wishlist').length;
        number_articles_in_wishlist.innerHTML = nb_cart_wishlist;
        e.target.classList.toggle('active');
        })
        .catch(err => console.error(err));
        list_wishlist.classList.remove('hidden');

    });
}

let form_signin=document.getElementById('form_signin');
if(form_signin!=null) {
    form_signin.addEventListener("submit", function(e){
        e.preventDefault();
        console.log(form_signin);
        overlay.classList.add('hidden');
        let formData = new FormData(form_signin);
        
        let obj = { 'method': 'POST', 'body': formData }
        
        fetch('./controller/checkout.php', obj)
        .then(response => response.text())
        .then(data => {
        console.log('data')
        //   document.querySelector('.container').innerHTML += data;
        })
        
        .catch(err => console.error(err));
    });
}

//formulaire admin registration
let form_signup_admin=document.getElementById('form_signup_admin');
let overlay=document.getElementById('overlay');
if(form_signup_admin != null) {
    form_signup_admin.addEventListener("submit", function(e){
        e.preventDefault();
        let formData = new FormData(form_signup_admin);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./controller/registeration_admin.php', obj)
        .then(response => response.text())
        .then(data => {
        })
        .catch(err => console.error(err));
    });
}

//form for update les infos dans checkout page

let form_update_users_infos=document.getElementById('form_update_users_infos');
if(form_update_users_infos){
    form_update_users_infos.addEventListener("submit", function(e){
        e.preventDefault();
        let username = document.getElementById('username').value;
        let first_name = document.getElementById('first_name').value;
        let last_name = document.getElementById('last_name').value;
        let birth_date = document.getElementById('birth_date').value;
        let mail = document.getElementById('mail').value;
        let telephone = document.getElementById('telephone').value;
        let shipping_address = document.getElementById('shipping_address').value;
        let home_address = document.getElementById('home_address').value;
        let country = document.getElementById('country').value;
        let city = document.getElementById('code_postal').value;
        let formData = new FormData(form_update_users_infos);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/checkout.php', obj)
        .then(response => response.text())
        .then(data => {
        document.querySelector('.infos_personnelles_checkout').innerHTML = data;
        })
        .catch(err => console.error(err));
    });

};


//gerer final operation pour paiment
let form_for_payer=document.getElementById('form_for_payer');
if(form_for_payer){
    form_for_payer.addEventListener("submit", function(e){
        e.preventDefault();
           // console.log(e.target.id);
        let container_checkout = document.getElementById('container_checkout');
        let radio = document.querySelector('input[name="radio"]:checked').value;
        let formData = new FormData(form_for_payer);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/checkout.php', obj)
        .then(response => response.text())
        .then(data => {
       //document.querySelector('.final_panier_pour_payment').innerHTML = data;
        container_checkout.innerHTML = data;
        })
        .catch(err => console.error(err));
    });

};

//gérer fomulaire search
let bar_recherch = document.getElementById('bar_recherch');
bar_recherch.addEventListener("input", function(){
    let wordsearch = document.getElementById('bar_recherch').value;     
    let formData = new FormData();
    formData.append('wordsearch',wordsearch);
    let obj = { 'method': 'POST', 'body': formData }
    fetch('./ajax/search.php', obj)
    .then(response => response.text())
    .then(data => {
    document.querySelector('.box_search').innerHTML = data;
    })
    .catch(err => console.error(err));

});





});


