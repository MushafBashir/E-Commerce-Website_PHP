let password = document.getElementById('password');
let msg = document.getElementById('msg');
let msg1 = document.getElementById('msg-1');
let form = document.getElementById("signupform");

password.addEventListener('input', func);

function func(){
    let length = password.value.length;

    if(length > 4 && length < 9){
        msg.innerHTML = "Password is meadium.";
        msg.style.color = 'blue';
        msg1.style.color = 'red';
    }else if(length > 0 && length < 5){
        msg.innerHTML = "Password is weak.";
        msg.style.color = 'red';
        msg1.style.color = 'red';
        msg1.innerHTML = "Password must consists on 8 letters or more.";
    }else if(length > 8){
        msg.innerHTML = "Password is strong.";
        msg.style.color = 'green';
        msg1.style.color = 'green';
        
    }else{
        msg.innerHTML = "";
        msg1.innerHTML = "";
    }
}



