function valida_form() {
    if (document.getElementById("palavraAdivinhada").value == document.getElementById("palavraForca").value) {
        let final = confirm("Parabéns você acertou!\nA palavra era " + document.getElementById("palavraForca").value + "\nClique ok para jogar novamente");
        if (final == true) {
            window.location.href = "inicio.php";
        }
        return true
    } else {
        if (document.getElementById("erro").value >= 7) {
            let resultado = confirm('Acabaram suas chances! Clique ok para jogar novamente');
            if (resultado == true) {
                window.location.href = "inicio.php";
            }
            return false
        }
        if (document.getElementById("letra").value == "") {
            alert('Por favor, preencha o campo letra');
            document.getElementById("letra").focus();
            return false
        }
    }

}