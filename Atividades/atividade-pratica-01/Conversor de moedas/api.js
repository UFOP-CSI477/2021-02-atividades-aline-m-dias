var operacoes_realizadas = [];

async function carregarMoedas() {
    await fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json')
        .then(response => response.json())
        .then(data => preencherSelect(data.value, "moedaOrigem"))
        .catch(error => console.error(error));

    await fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json')
        .then(response => response.json())
        .then(data => preencherSelect(data.value, "moedaDestino"))
        .catch(error => console.error(error));
}

function preencherSelect(data, campo) {

    let select = document.getElementById(campo);

    for (let index in data) {
        const { simbolo, nomeFormatado } = data[index];
        let option = document.createElement("option");
        option.value = simbolo;
        option.innerHTML = nomeFormatado;
        select.appendChild(option);

    }
}

function limpar(){
    document.getElementById('moedaOrigem').value = '';
    document.getElementById('moedaDestino').value = '';
    document.getElementById('valor').value = '';
    document.getElementById('data').value = '';
}
async function converter() {
    var moeda1 = document.getElementById('moedaOrigem');
    var moeda2 = document.getElementById('moedaDestino');

    var valor = document.getElementById('valor');
    var data = document.getElementById('data');

    if (valor == 0 || moeda1 == 0 || moeda2 == 0 || data.value == 0) {
        window.alert('Existem campos vazios, preencha todos os campos!');
    }
    else {

        const conversao = {
            Moeda1: moeda1.value,
            Moeda2: moeda2.value,
            Valor: valor.value,
            Data: data.value
        }

        console.log(conversao);

        operacoes_realizadas.push(conversao);
        console.log(operacoes_realizadas);

        window.alert('Operação efetuada com sucesso!')

        limpar();

    }

}

