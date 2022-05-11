function limparSelect(campo) {
    const select = document.getElementById(campo);

    while (select.length > 1) {
        select.remove(1);
    }
}

function preencherSelect(id, campo) {

    let select = document.getElementById(campo);
    limparSelect(campo);

    // Arrow function
    id.sort( (a, b) => a.nome.localeCompare(b.nome) );

    for(let index in id) {
        const { id, nome } = id[index];

        let option = document.createElement("option");
        option.value = id;
        option.innerHTML = nome;

        select.appendChild(option);

    }


}

async function carregarBancos() {

    await fetch('https://brasilapi.com.br/api/banks/v1/{code}')
        .then(response => response.json())
        .then(id => preencherSelect(id, "bancos"))
        .catch(error => console.error(error));

}

