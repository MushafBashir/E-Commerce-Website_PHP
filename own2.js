let jazzSection = document.getElementById("jazz-section");
let jazz = document.getElementById("jazz");
let cod = document.getElementById("cod");
let codSection = document.getElementById("cod-section");
let easy = document.getElementById("easy");
let easySection = document.getElementById("easy-section");
let banktransfer = document.getElementById("banktransfer");
let banktransferSection = document.getElementById("banktransfer-section");
let codc = document.getElementById("codc");

let totalprice = document.getElementById('totalprice');

let totalpricevalue = document.getElementById('totalpricevalue');

let totalpricee = document.getElementById('totalpricee').textContent;

totalprice.textContent = Number(totalpricee).toLocaleString();

totalpricevalue.value = Number(totalpricee).toLocaleString();


let realTotalPrice = totalprice.textContent;


jazz.addEventListener('click', jazzf);

function jazzf(){
    jazzSection.style.display = "block";
    codSection.style.display = "none";
    easySection.style.display = "none";
    banktransferSection.style.display = "none";
    codc.style.display = "none";

    // jazz.style.border = "1px solid rgba(0, 0, 0, 0.4)";
    jazz.style.transition = "0.6s";
    jazz.style.boxShadow = "rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset";

    cod.style.transition = "0.6s";
    cod.style.boxShadow = "none";

    easy.style.transition = "0.6s";
    easy.style.boxShadow = "none";

    banktransfer.style.transition = "0.6s";
    banktransfer.style.boxShadow = "none";

    totalprice.textContent = realTotalPrice;

    totalpricevalue.value = realTotalPrice;

    isUpdated = false;
}

let isUpdated = false;

cod.addEventListener('click', codf);

function codf(){
    codSection.style.display = "block";
    jazzSection.style.display = "none";
    easySection.style.display = "none";
    banktransferSection.style.display = "none";
    codc.style.display = "block";


    cod.style.transition = "0.6s";
    cod.style.boxShadow = "rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset";

    jazz.style.transition = "0.6s";
    jazz.style.boxShadow = "none";

    easy.style.transition = "0.6s";
    easy.style.boxShadow = "none";

    banktransfer.style.transition = "0.6s";
    banktransfer.style.boxShadow = "none";

    // ######################################Total Price Functionality###################################################
    
    if(!isUpdated){
       let totalPriceArray = totalprice.textContent.split('')

        for(let i = 0; i < totalPriceArray.length; i++){
            if(totalPriceArray[i] == ','){
                totalPriceArray.splice(i, 1)
                i--;
            }else{
                i;
            }
        }

        let UpdatedTotalPrice = totalPriceArray.join('');

        totalprice.textContent = (Number(UpdatedTotalPrice) + 99).toLocaleString();

        totalpricevalue.value = (Number(UpdatedTotalPrice) + 99).toLocaleString();

        isUpdated = true;
    }
    // ##################################################################################################################

}


easy.addEventListener('click', easyf);

function easyf(){
    easySection.style.display = "block";
    jazzSection.style.display = "none";
    banktransferSection.style.display = "none";
    codSection.style.display = "none";
    codc.style.display = "none";

    easy.style.transition = "0.6s";
    easy.style.boxShadow = "rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset";

    jazz.style.transition = "0.6s";
    jazz.style.boxShadow = "none";

    cod.style.transition = "0.6s";
    cod.style.boxShadow = "none";

    banktransfer.style.transition = "0.6s";
    banktransfer.style.boxShadow = "none";

    totalprice.textContent = realTotalPrice;

    totalpricevalue.value = realTotalPrice;

    isUpdated = false;
}

banktransfer.addEventListener('click', banktranserf);

function banktranserf(){
    banktransferSection.style.display = "block";
    jazzSection.style.display = "none";
    codSection.style.display = "none";
    easySection.style.display = "none";
    codc.style.display = "none";

    banktransfer.style.transition = "0.6s";
    banktransfer.style.boxShadow = "rgba(0, 0, 0, 0.4) 0px 2px 4px, rgba(0, 0, 0, 0.3) 0px 7px 13px -3px, rgba(0, 0, 0, 0.2) 0px -3px 0px inset";

    jazz.style.transition = "0.6s";
    jazz.style.boxShadow = "none";

    cod.style.transition = "0.6s";
    cod.style.boxShadow = "none";

    easy.style.transition = "0.6s";
    easy.style.boxShadow = "none";

    totalprice.textContent = realTotalPrice;

    totalpricevalue.value = realTotalPrice;

    isUpdated = false;
}
// ######################################################################################################################





