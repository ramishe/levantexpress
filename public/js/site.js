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
  
//gerer popup d'inscription
let btn_close=document.getElementById('btnClose');
let btn_open_popup=document.getElementById('btn_open_popup');
let overlay=document.getElementById('overlay');
btn_open_popup.addEventListener('click',function(e){
     e.preventDefault();
    overlay.classList.remove('hidden');
btn_close.addEventListener('click',function(){
    overlay.classList.add('hidden');
});
});

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
});


let btn_add_produit = document.getElementsByClassName('btn_add_produit');
let list_panier = document.getElementById('list_panier');
let btn_close_popup_panier = document.getElementById('btn_close_popup_panier');
let cart_content = document.getElementById('cart_content');

btn_close_popup_panier.addEventListener('click',function(){
     list_panier.classList.add('hidden');
});

for(let i of btn_add_produit){
    i.addEventListener("click", function(e){
        e.preventDefault();
        // récupérer le id du produit cliqué
        let prod_id = e.target.id;
        console.log( prod_id);
        // ici faire un appel ajax
        let formData = new FormData();
        formData.append('prod_id', prod_id);
        let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/cart.php', obj)
            .then(response => response.text())
            .then(data => {
                cart_content.innerHTML = data;
            })
            .catch(err => console.error(err));
             
        
        // le fichier php ajoute cet id dans une variable de SESSION et affiche la liste des produits
        
        //dans le retour du ajax
            // on renvoi le resultat du php que l'on met dans le cart_content
            list_panier.classList.remove('hidden');
          
            
    });
}



});