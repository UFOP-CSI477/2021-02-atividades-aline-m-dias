function validar(campo) {

    let n = campo.value;



}
function calcular() {

    let v1 = document.dados.valor1;
    let v2 = document.dados.valor2;


    let resultado = parseInt(v1) + parseInt(v2);

    document.dados.resultado.value = resultado;

}


//exercício 05
function limparSelect(campo) {
    const select = document.getElementById(campo);

    while (select.length > 1) {
        select.remove(1);
    }
}

function preencherSelect(data, campo) {

    let select = document.getElementById(campo);
    limparSelect(campo);

    // Arrow function
    data.sort((a, b) => a.nome.localeCompare(b.nome));

    for (let index in data) {
        const { id, nome } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        select.appendChild(option);

    }


}


async function carregarEstados() {

    await fetch('https://servicodados.ibge.gov.br/api/v1/localidades/estados')
        .then(response => response.json())
        .then(data => preencherSelect(data, "estados"))
        .catch(error => console.error(error));

}

function carregarCidades() {

    const estados = document.getElementById("estados");
    const estados_index = estados.selectedIndex;
    const estado_id = estados.options[estados_index].value;

    limparSelect("cidades");

    if (estado_id == "") {
        return;
    }

    const cidades_url = `https://servicodados.ibge.gov.br/api/v1/localidades/estados/${estado_id}/municipios`;

    fetch(cidades_url)
        .then(response => response.json())
        .then(data => preencherSelect(data, "cidades"))
        .catch(error => console.error(error));

}