// var ordemNome = document.querySelector("#ord-nome");
// var ordemProd = document.querySelector("#ord-prod");
// var ordemNota = document.querySelector("#ord-nota");
// var ordemGen = document.querySelector("#ord-gen");

// var ordem = document.querySelectorAll(".ordem");

// ordem.forEach(function (ord) {
//     console.log(ord)
//     ord.addEventListener("click", (e) => {
//         const ordemAtual = e.currentTarget.getAttribute("id");
//         const ordemAtualElement = document.querySelector("#" + ordemAtual);
//         var classItem = ordemAtualElement.classList.contains('down');
//         console.log(classItem)

//         if (classItem) {
//             ordemAtualElement.classList.remove("down");
//             ordemAtualElement.classList.add('up')



//             window.location.href = `index.php?o=${ordemAtual}-asc&c=`



//             // fetch('index.php', {
//             //     method: 'POST',
//             //     headers: {
//             //         'Content-Type': 'application/x-www-form-urlencoded',
//             //     },
//             //     body: `'ordem=${ordemAtual}-asc'`
//             // })
//         } else {
//             ordemAtualElement.classList.remove("up");
//             ordemAtualElement.classList.add('down');
//             localStorage.setItem(`ordem-${ordemAtual}`, 'up')

//             window.location.href = `index.php?o=${ordemAtual}-desc&c=`


//         //     fetch('index.php', {
//         //         method: 'POST',
//         //         headers: {
//         //             'Content-Type': 'application/x-www-form-urlencoded',
//         //         },
//         //         body: `'ordem=${ordemAtual}-desc'`
//         //     })
//         // }

//         }
//     })

// })




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
