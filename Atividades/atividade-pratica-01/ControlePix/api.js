var operacoes_realizadas = [];


async function carregarBancos() {

    await fetch('https://brasilapi.com.br/api/banks/v1')
        .then(response => response.json())
        .then(data => preencherSelect(data, "banco"))
        .catch(error => console.error(error));

}


function preencherSelect(data, campo) {

    let select = document.getElementById(campo);

    for (let index in data) {

        const {
            code,
            name
        } = data[index];

        let option = document.createElement("option");
        option.value = code;
        option.innerHTML = name;
        select.appendChild(option);

    }

}

function limpar(){
    
    document.getElementById('chave').value = '';
    document.getElementById('valor').value = '';
    document.getElementById('data').value = '';
    document.getElementById('descricao').value = '';
    document.getElementById('banco').value = '';
    document.getElementById('tipoChave').value = '';
    document.getElementById('operacao').value = '';
   
}
function calcularSaldo() {

    var tipo = document.getElementById('operacao');
    var chave = document.getElementById('chave');
    var valor = document.getElementById('valor');
    var data = document.getElementById('data');

    if (chave.value == 0 || valor.value == 0 || data.value == 0) {
        window.alert('Existem campos vazios, preencha todos os campos!');
    }
    else {

        const operacao = {
            Tipo: tipo.value,
            Chave: chave.value,
            Valor: valor.value,
            Data: data.value
        }
        console.log(operacao);
        operacoes_realizadas.push(operacao);
        console.log(operacoes_realizadas);
        window.alert('Operação efetuada com sucesso!')
        limpar();

    }

}

function extrato() {

    var somaPixEnviado = 0;
    var somaPixRecebido = 0;

    var saldoFinalEnviado = document.getElementById('saldo_total_enviado');
    var saldoFinalRecebido = document.getElementById('saldo_total_recebido');

    for (i in operacoes_realizadas) {

        if (operacoes_realizadas[i].Tipo == 'Envio') {
            somaPixEnviado += Number(operacoes_realizadas[i].Valor);
            saldoFinalEnviado.innerHTML = `Saldo  Total de PIX enviado: ${somaPixEnviado}`;
        }
        else if (operacoes_realizadas[i].Tipo == 'Recebimento') {
            somaPixRecebido += Number(operacoes_realizadas[i].Valor);
            saldoFinalRecebido.innerHTML = `Saldo Total de PIX recebido: ${somaPixRecebido}`;
        }
    }


    var saldo = somaPixRecebido - somaPixEnviado;
    saldoFinalMovimentado.innerHTML = `Saldo atual: R$${saldo}`;
    document.getElementById('saldoFinalMovimentado').innerHTML = `Saldo Disponível: R$ ${saldo}`;

}

