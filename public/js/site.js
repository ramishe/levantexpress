window.addEventListener("DOMContentLoaded", (event) => {
 console.log('fdfdfd');  
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
 
     $('.diapo_principal_photo_product').slick({
         slidesToShow: 1,
         slidesToScroll: 1,
         arrows: true,
         fade: true,
         asNavFor: '.diaporama_product'
     });
        $('.diaporama_product').slick({
        idesToShow: 2,
        idesToScroll: 1,
        NavFor: '.diapo_principal_photo_product',
        ts: true,
        nterMode: true,
        cusOnSelect: true
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
        // récupérer le id du produit cliqué
        
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
// function pour affichier un message 
function Message(message) {
       let msg=message;
       alert(msg);
   }
//gerer wishlist 
let user_name=document.getElementById('user_name');
let products_wishlist=document.getElementsByClassName('products_wishlist');
for(let i of products_wishlist){
    i.addEventListener("click", function(e){
        e.preventDefault();
       let WishListOK = this.firstChild.classList.toggle('black');
         console.log(WishListOK);
        console.log(this.id);
         let formDateWishList = new FormData();
        formData.append('prod_id', prod_id);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/ajax_wish_list.php', obj)
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
        console.log('toto');
        
        let formData = new FormData(form_signup_admin);
        
        let obj = { 'method': 'POST', 'body': formData }
        
        fetch('./controller/registeration_admin.php', obj)
            .then(response => response.text())
            .then(data => {
            //   document.querySelector('.container').innerHTML += data;
            })
            .catch(err => console.error(err));
    });
}

//form for update les infos dans checkout page

let form_update_users_infos=document.getElementById('form_update_users_infos');
if(form_update_users_infos){
    form_update_users_infos.addEventListener("submit", function(e){
        e.preventDefault();
           // console.log(e.target.id);
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
       // let submit = document.getElementById('submit').value;
        let formData = new FormData(form_update_users_infos);
        let obj = { 'method': 'POST', 'body': formData }
        //console.log(submit);
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
   console.log(wordsearch);
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


/*

//form identification et inscription       
let btn_create_account=document.getElementById('create_account');
let form_signin=document.getElementById('form_signin');
let form_signup=document.getElementById('form_signup');
let btn_register_compte=document.getElementById('btn_register_compte');
 form_signin.classList.remove('hidden');

   btn_create_account.addEventListener("click", function(e){
   e.preventDefault();
   form_signin.classList.add('hidden');
   form_signup.classList.remove('hidden');
   }); 
   
//gerer popup d'inscription
let btn_close=document.getElementById('btnClose');
let btn_open_popup=document.getElementById('btn_open_popup');
let overlay=document.getElementById('overlay');
let user_name=document.getElementById('user_name');
console.log(user_name.textContent);

btn_open_popup.addEventListener('click',function(e){
     e.preventDefault();
    if(!user_name.textContent){
    overlay.classList.remove('hidden');
    };
btn_close.addEventListener('click',function(){
    overlay.classList.add('hidden');

});
});   
   if(user_name.textContent){
       
  }else 
  {
        Message("Veuillez inscriez-vous");
  }
*/   
