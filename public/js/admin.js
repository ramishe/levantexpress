window.addEventListener("DOMContentLoaded", (event) => {

//formulaire admin registration
let form_signup_admin=document.getElementById('form_signup_admin');
    form_signup_admin.addEventListener("submit", function(e){
      e.preventDefault();
    let firstname=document.getElementById('firstname').value;
    let lastname=document.getElementById('lastname').value;
    let birth_date=document.getElementById('birth_date').value;
    let mail=document.getElementById('mail').value;
    let psd_admin=document.getElementById('psd_admin').value;
    let formData = new FormData(form_signup_admin);
    let obj = { 'method': 'POST', 'body': formData }
        fetch('./ajax/registeration.php', obj)
            .then(response => response.text())
            .then(data => {
               document.querySelector('body').innerHTML = data;
            })
            .catch(err => console.error(err));

      
        
        });


});