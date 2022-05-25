function converter() {

    window.location.href = "http://127.0.0.1:5500/Atividades/atividade-pratica-01/Conversor%20de%20moedas/resultado.html";
}
function carregarMoedas() {

    console.log("carregarMoedas");
    fetch('https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/Moedas?$top=100&$format=json')
        .then(response => response.json())
        .then(data => preencherSelect(data, "moedas"))
        .catch(error => console.error(error));

}

function preencherSelect(data, campo) {

    let select = document.getElementById(campo);
  
    for (let index in data) {
        const { id, nome } = data[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        select.appendChild(option);

    }


}
