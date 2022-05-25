let saldoTotal=0; 
var SaldoPixEnvio=0;
var SaldoPixRecebimento=0;


function enviarPix() {

    window.location.href = "pixenvio.html";
}

function receberPix() {

    window.location.href = "receber.html";
}

function carregarBancos() {

    console.log("carregarBancos");
   // fetch('https://brasilapi.com.br/api/banks/v1')
   fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
        .then(response => response.json())
        .then(data => preencherSelect(data, "bancos"))
        .catch(error => console.error(error));

}

function preencherSelect(data, campo) {

    let select = document.getElementById(campo);
   

    for (let index in data) {

        const { 
            id, 
            nome 
        } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;
        select.appendChild(option);

    }


}


function valorEnviado(valor){
   SaldoPixEnvio += valor;
   saldoTotal -=valor;

   console.log("SaldoPixEnvio", SaldoPixEnvio);
   console.log("saldoTotal", saldoTotal);
}


function SaldoPixRecebimento (valor){
    SaldoPixRecebimento += valor;
    saldo += valor;

    console.log("SaldoPixRecebimento", saldopixRecebimento);
    console.log("saldoTotal", saldoTotal);
}

function calcularSaldo(){

    var tipoTrasacao = document.getElementById("tipoTrasacao");

}