let userName = document.getElementById('username');
let email = document.getElementById('email');
let passsword = document.getElementById('password');
let submitBtn = document.getElementById('submitbtn');
let signUpAlert = document.getElementById('signupalert');
let passwordStrongAlert = document.getElementById('password-strong-alert');
let emailAlert = document.getElementById('email-alert');

submitBtn.addEventListener('click', checkFunction)

function checkFunction(event){
    if(userName.value === '' || email.value === '' || passsword.value === ''){
        event.preventDefault();
        signUpAlert.classList.remove('d-none')

        // submitBtn.addEventListener('click', passwordFunction);

        // function passwordFunction(event){
        //     let passwordLength = passsword.value.length;

        //     if(passwordLength < 9){
        //         event.preventDefault();
        //         passwordStrongAlert.classList.remove('d-none');
        //     }
        // }
    }
}

signUpAlert.querySelector('.btn-close').addEventListener('click', function(){
    signUpAlert.classList.add('d-none');
});

submitBtn.addEventListener('click', passwordFunction);

function passwordFunction(event){
    let passwordLength = passsword.value.length;

     if(passwordLength < 9 && passwordLength > 0){
        event.preventDefault();
        passwordStrongAlert.classList.remove('d-none');
     }

}

passwordStrongAlert.querySelector('.btn-close').addEventListener('click', function(){
    passwordStrongAlert.classList.add('d-none');
});

submitBtn.addEventListener('click', emailFunction);

function emailFunction(event){
    let emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.(com)$/;

    if(email.value.length > 0){
    if(!emailRegex.test(email.value)){
        let emailMsg = document.getElementById('email-msg');
        event.preventDefault();
        emailAlert.classList.remove('d-none');
    }
}
}

emailAlert.querySelector('.btn-close').addEventListener('click', function(){
    emailAlert.classList.add('d-none');
});