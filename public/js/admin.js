window.addEventListener("DOMContentLoaded", (event) => {

let select_sections = document.getElementById('sections');
let affichage_operations_admin = document.getElementById('affichage_operations_admin');

 let categories = document.getElementById('categories');
 select_sections.addEventListener('change',function(){
   let value = select_sections.options[select_sections.selectedIndex].value;
   let formData = new FormData();
       formData.append('sections', value);
   let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/admin.php', obj)
            .then(response => response.text())
            .then(data => {
                categories.innerHTML = data;
               
            })
            .catch(err => console.error(err));
 })

let photo_produit = document.getElementById('photo_produit');
photo_produit.addEventListener('change', function(e){
 e.preventDefault()
 
 console.log(e);
 
})


});