let po = document.getElementById("porder");
let phone = document.getElementById("phone");
let address = document.getElementById("address");

let alertt = document.getElementById("alertt");
let alertttt = document.getElementById("alertttt");
let alerttttt = document.getElementById("alerttttt");
let bankalert = document.getElementById("bankalert");

po.addEventListener('click', orderFunc);

function resetAlert() {
    if (alertt.classList.contains('d-none')) {
        alertt.classList.remove('d-none');
    }
}

function orderFunc(event){
    
    if(phone.value === "" || address.value === ""){
        // alertt.classList.remove('d-none');
        resetAlert();
        event.preventDefault();
    }else{
        alertt.classList.add('d-none');

    }

}


alertt.querySelector('.btn-close').addEventListener('click', function() {
    alertt.classList.add('d-none'); // Instead of complete removal, hide it
});

// ###################################################CHECK OUT PAGE######################################################
// ####################################Applying validation on each payment method#########################################
po.addEventListener('click', funccc);

function resetAlert2() {
    // if (alerttt.classList.contains('d-none')){
        alertttt.classList.remove('d-none');
    // }
}

function resetAlert3() {
    // if (alerttt.classList.contains('d-none')){
        alerttttt.classList.remove('d-none');
    // }
}

function resetAlertBank() {
    // if (alerttt.classList.contains('d-none')){
        bankalert.classList.remove('d-none');
    // }
}

function funccc(event){
    if(pmethod=="Jazz Cash"){
        let jazzPhone11 = document.getElementById('jazzphone1');
        let jazzTitle11 = document.getElementById('jazztitle1');

        if(jazzPhone11.value === '' || jazzTitle11.value === ''){
            
            resetAlert2();

            event.preventDefault();
        }else{
            alertttt.classList.add('d-none');
    
        }
    }else if(pmethod=="Easy Paisa"){
        let easyPhone11 = document.getElementById('easyphone1');
        let easyTitle11 = document.getElementById('easytitle1');

        if(easyPhone11.value === '' || easyTitle11.value === ''){
            
            resetAlert3();

            event.preventDefault();
        }else{
            alertttt.classList.add('d-none');
    
        }
    }else if(pmethod=="Bank Transfer"){
        let bankcardnumber1 = document.getElementById('cardnumber1');
        let bankcardname1 = document.getElementById('cardname1');
        let bankexpire1 = document.getElementById('expire1');
        let bankcvv1 = document.getElementById('bankcvv1');

        if(bankcardnumber1.value === '' || bankcardname1.value === '' || bankexpire1.value === '' || bankcvv1.value === ''){
            
            resetAlertBank();

            event.preventDefault();
        }else{
            bankalert.classList.add('d-none');
    
        }
    }
}

alertttt.querySelector('.btn-close').addEventListener('click', function() {
    alertttt.classList.add('d-none'); // Instead of complete removal, hide it
});

alerttttt.querySelector('.btn-close').addEventListener('click', function() {
    alerttttt.classList.add('d-none'); // Instead of complete removal, hide it
});

bankalert.querySelector('.btn-close').addEventListener('click', function() {
    bankalert.classList.add('d-none'); // Instead of complete removal, hide it
});