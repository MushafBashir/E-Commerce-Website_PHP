let orderBtn = document.getElementById("porder");

let cod1 = document.getElementById("cod");

let jazz1 = document.getElementById("jazz");

let easy1 = document.getElementById("easy");

let banktransfer1 = document.getElementById("banktransfer");

let paymentfield = document.getElementById('paymentmethod');



let pmethod = '';

orderBtn.addEventListener('click', funcc);

function funcc(event){
    if(pmethod == ''){
        event.preventDefault();
        resetAlert1();
    }
}

function resetAlert1(){
        if (alerttt.classList.contains('d-none')) {
            alerttt.classList.remove('d-none');
        }
    }


alerttt.querySelector('.btn-close').addEventListener('click', function() {
        alerttt.classList.add('d-none'); // Instead of complete removal, hide it
    });


cod1.addEventListener('click', func1);

function func1(){

    pmethod = "Cash on Delivery";

    paymentfield.value = pmethod;

}


jazz1.addEventListener('click', func2);

function func2(){

    pmethod = "Jazz Cash";
    
    paymentfield.value = pmethod;

}


easy1.addEventListener('click', func3);

function func3(){

    pmethod = "Easy Paisa";

    paymentfield.value = pmethod;
    
}



banktransfer1.addEventListener('click', func4);

function func4(){

    pmethod = "Bank Transfer";

    paymentfield.value = pmethod;

}


let jazzPhone = document.getElementById('jazzphone');
let jazzTitle = document.getElementById('jazztitle');

let easyPhone = document.getElementById('easyphone');
let easyTitle = document.getElementById('easytitle');

let cardNumber = document.getElementById('cardnumber');
let cardName = document.getElementById('cardname');
let expire = document.getElementById('expire');
let cvv = document.getElementById('cvv');


orderBtn.addEventListener('click', function() {
    if (pmethod == "Jazz Cash") {
        let jazzPhone1 = document.getElementById('jazzphone1').value;
        let jazzTitle1 = document.getElementById('jazztitle1').value;

        jazzPhone.value = jazzPhone1;
        jazzTitle.value = jazzTitle1;
    }else if(pmethod == "Easy Paisa"){
        let easyPhone1 = document.getElementById('easyphone1').value;
        let easyTitle1 = document.getElementById('easytitle1').value;

        easyPhone.value = easyPhone1;
        easyTitle.value = easyTitle1;
    }else if (pmethod == "Bank Transfer"){
        let cardNumber1 = document.getElementById('cardnumber1').value;
        let cardName1 = document.getElementById('cardname1').value;
        let expire1 = document.getElementById('expire1').value;
        let cvv1 = document.getElementById('cvv1').value;

        cardNumber.value = cardNumber1;
        cardName.value = cardName1;
        expire.value = expire1;
        cvv.value = cvv1;
    }
});

