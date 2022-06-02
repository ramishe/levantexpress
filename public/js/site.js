window.addEventListener("DOMContentLoaded", (event) => {
   
   //treter sub menu pour affiche les rayon
let rayons = document.getElementById('rayon');
let list_rayon = document.getElementById('liste_rayon');
   
rayons.addEventListener('click', e => {
    e.preventDefault();
    list_rayon.classList.toggle('is_active');
   })
 list_rayon.addEventListener('click', e => {
    e.preventDefault();
    list_rayon.classList.toggle('is_active');
   })
   
   
$(document).ready(function($) {
    $('.diaporama').slick({
    autoplay:true,
    autoplaySpeed: 2000,
    dots: true,
    infinite: true,
    arrows: false,
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

let form_signin=document.getElementById('form_signin');
    form_signin.addEventListener("submit", function(e){
      e.preventDefault();
    console.log(form_signin);
    overlay.classList.add('hidden');
    let formData = new FormData(form_signin);
     
       let obj = { 'method': 'POST', 'body': formData }
          console.log(obj);
        
        fetch('./controller/users.php', obj)
            .then(response => response.text())
            .then(data => {
             //   document.querySelector('.container').innerHTML += data;
            })
            .catch(err => console.error(err));
        
      
        
        });



//formulaire admin registration
let form_signup_admin=document.getElementById('form_signup_admin');
let overlay=document.getElementById('overlay');
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
   
*/   
