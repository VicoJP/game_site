document.addEventListener("DOMContentLoaded", function () {
    var gameDelete = document.querySelectorAll(".delete-game");
    gameDelete.forEach(function (button) {
        button.addEventListener("click", function (e) {
            const gameId = e.currentTarget.getAttribute("data-game-id");
            if (confirm("Deseja realmente excluir este jogo?")) {
                // console.log(gameId); //return null
                // const xhr = new XMLHttpRequest();
                // xhr.open("POST", "game-delete.php", true);
                // xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                // xhr.onreadystatechange = function () {
                //     if (xhr.readyState === 4 && xhr.status === 200) {
                //         window.location.reload();
                //     }
                // };
                // xhr.send("gameid=" + gameId);
                
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



