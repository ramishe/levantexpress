window.addEventListener("DOMContentLoaded", (event) => {

let select_sections = document.getElementById('sections');
let affichage_operations_admin = document.getElementById('affichage_operations_admin');
let categories = document.getElementById('categories');
if(select_sections!=null){
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
   });

}
let products = document.getElementById('products');
let nbr_photos = document.getElementById('nbr_photos');
let filed_photos_product = document.getElementById('filed_photos_product');
if(products != null && nbr_photos != null ){
 
    products.addEventListener('change',function(){
        let value_id_product = products.options[products.selectedIndex].value;
        addPhotoSelector(1, value_id_product);
        nbr_photos.value = 1;
        nbr_photos.addEventListener('change',function(){
             let  value_nbr_photos = nbr_photos.options[nbr_photos.selectedIndex].value;
             addPhotoSelector(value_nbr_photos, value_id_product);
        });
    });

    }
if(categories != null){
categories.addEventListener('change',function(){
     let value_id_category = categories.options[categories.selectedIndex].value;
     let formData = new FormData();
    formData.append('id_category', value_id_category);
    console.log(value_id_category);
    let obj = { 'method': 'POST', 'body': formData }
    fetch('./ajax/admin.php', obj)
        .then(response => response.text())
        .then(data => {
            products.innerHTML = data;
        })
        .catch(err => console.error(err));
})
}

function addPhotoSelector(value_nbr_photos, value_id_product) {
    let formData = new FormData();
    formData.append('products', value_id_product);
    formData.append('nbr_photos', value_nbr_photos);
    let obj = { 'method': 'POST', 'body': formData }
    fetch('./ajax/admin.php', obj)
        .then(response => response.text())
        .then(data => {
            filed_photos_product.innerHTML = data;
        })
        .catch(err => console.error(err));
}




});


