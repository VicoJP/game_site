document.addEventListener("DOMContentLoaded", function () {
    var gameDelete = document.querySelectorAll(".delete-game");
    gameDelete.forEach(function (button) {
        button.addEventListener("click", function (e) {
            const gameId = e.currentTarget.getAttribute("data-game-id");
            if (confirm("Deseja realmente excluir este jogo?")) {
                fetch('game-delete.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                      },
                    body: `gameid=${gameId}`
                })
                .then(function(response) {
                    if(response.status == 200){
                        window.location.reload()
                    } else {
                        console.error("Ocorreu um erro para excluir o jogo");
                    } ;
                })
            }
        })
    })
});



