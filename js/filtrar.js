
function alterarOrdem(tipoOrdem) {
    var urlAtual = new URL(window.location.href);
    var ordemAtual = urlAtual.searchParams.get('o');
    var chave = urlAtual.searchParams.get('c');
    var ordemElement = document.getElementById(tipoOrdem);


    if (ordemAtual == tipoOrdem) {
        urlAtual.searchParams.set('o', tipoOrdem + '-desc');
        ordemElement.classList.remove('asc')
        ordemElement.classList.add('desc')
        localStorage.setItem("ordem", "desc");
    } else {
        ordemElement.classList.remove('desc')
        ordemElement.classList.add('asc')
        urlAtual.searchParams.set('o', tipoOrdem);
        localStorage.setItem("ordem", "asc");
    }

    localStorage.setItem("tipoOrdem", tipoOrdem);
    var classeOrdem = ordemElement.classList.toString()
    localStorage.setItem("ordemClass", classeOrdem);
    urlAtual.searchParams.set('c', chave);

    window.location.href = urlAtual.toString();


}
