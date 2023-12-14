<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jogo da Forca</title>
    <link rel="stylesheet" href="style.css">
    <script src="javascript.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@300;400;500;600;700&family=Roboto:wght@100;300;400;500&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="inicio.php">Início</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="letters-menu">
            <div class="left">
                <form method="post" onsubmit="return valida_form(this)">
                    <p>
                        <label>Digite uma letra: </label><br>
                        <input type="text" name="letra" id="letra">
                    </p>
                    <?php
                    $existe = false;
                    if (isset($_POST["erro"])) {
                        $erro = $_POST["erro"];
                    } else {
                        $erro = 0;
                    }

                    if (empty($_POST["palavraForca"])) {
                        $artistas = ['Dolly Parton', 'Farrah Fawcett', 'Morgan Freeman', 'Diana Ross', 'Clint Eastwood'];
                        $palavraForca = $artistas[rand(0, 4)];
                        $vetorPalavraForca = str_split($palavraForca);
                    } else {
                        $palavraForca = $_POST["palavraForca"];
                        $vetorPalavraForca = str_split($palavraForca);
                    }

                    echo '<input type="text" name="palavraForca" id="palavraForca" value="' . $palavraForca . '" hidden> ';

                    $palavraAdivinhada = "";
                    if (empty($_POST["palavraAdivinhada"])) {
                        foreach ($vetorPalavraForca as $letra) {
                            $palavraAdivinhada .= "_";
                            $vetorPalavraAdivinhada = str_split($palavraAdivinhada);
                        }
                        if (!empty($_POST["letra"])) {
                            for ($i = 0; $i < sizeof($vetorPalavraForca); $i++) {
                                if (strtolower($vetorPalavraForca[$i]) == $_POST["letra"]) {
                                    $vetorPalavraAdivinhada[$i] = $vetorPalavraForca[$i];
                                }
                            }
                        }
                    } else {
                        $palavraAdivinhada = $_POST["palavraAdivinhada"];
                        $vetorPalavraAdivinhada = str_split($palavraAdivinhada);
                        if (!empty($_POST["letra"])) {
                            for ($i = 0; $i < sizeof($vetorPalavraForca); $i++) {
                                if (strtolower($vetorPalavraForca[$i]) == $_POST["letra"]) {
                                    $vetorPalavraAdivinhada[$i] = $vetorPalavraForca[$i];
                                    $existe = true;
                                } else {
                                    if ($vetorPalavraAdivinhada[$i] != "_") {
                                        $vetorPalavraAdivinhada[$i] = $vetorPalavraAdivinhada[$i];
                                    } else {
                                        $vetorPalavraAdivinhada[$i] = "_";
                                    }
                                }
                            }
                        }
                    }

                    if (!$existe) {
                        $erro++;
                    }

                    $palavraAdivinhada = "";
                    $palavraAdivinhadaTela = "";
                    foreach ($vetorPalavraAdivinhada as $letra) {
                        $palavraAdivinhada .= $letra;
                        $palavraAdivinhadaTela = $palavraAdivinhadaTela . " " . $letra;
                    }

                    echo '<input type="text" name="erro" id="erro" value="' . $erro . '" hidden>';
                    echo '<input type="text" name="palavraAdivinhada" id="palavraAdivinhada" value="' . $palavraAdivinhada .'" hidden>';
                    echo '<h2>' . $palavraAdivinhadaTela . '</h2>';
                    ?>
                    <p><input type="submit" value="Enviar"></p>
                </form>
            </div>
            <div class="right">
                <?php
                if($erro == 1){
                    echo '<img src="img/forca.svg" alt="">';
                }
                if ($erro == 2) {
                    echo '<img src="img/forca1.svg" alt="">';
                }
                if ($erro == 3) {
                    echo '<img src="img/forca2.svg" alt="">';
                }
                if ($erro == 4) {
                    echo '<img src="img/forca3.svg" alt="">';
                }
                if ($erro == 5) {
                    echo '<img src="img/forca4.svg" alt="">';
                }
                if ($erro == 6) {
                    echo '<img src="img/forca5.svg" alt="">';
                }
                if ($erro == 7) {
                    echo '<img src="img/forca6.svg" alt="">';
                }
                ?>
            </div>
        </div>
    </main>

</body>

</html>