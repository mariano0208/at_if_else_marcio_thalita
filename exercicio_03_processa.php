<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Cálculo do IMC</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 40px auto; text-align: center; }
        h1 { color: #333; }
        p { font-size: 1.2em; }
        .classificacao { font-weight: bold; }
        .back-link { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .back-link:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado do IMC</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['peso']) && is_numeric($_POST['peso']) &&
                isset($_POST['altura']) && is_numeric($_POST['altura'])) {

                $peso = (float)$_POST['peso'];
                $altura = (float)$_POST['altura'];
                $classificacao = "";

                if ($altura > 0) {
                    $imc = $peso / ($altura * $altura);

                    if ($imc < 18.5) {
                        $classificacao = "Abaixo do peso normal";
                    } elseif ($imc >= 18.5 && $imc <= 24.9) {
                        $classificacao = "Peso normal";
                    } elseif ($imc >= 25.0 && $imc <= 29.9) {
                        $classificacao = "Excesso de peso";
                    } elseif ($imc >= 30.0 && $imc <= 34.9) {
                        $classificacao = "Obesidade classe I";
                    } elseif ($imc >= 35.0 && $imc <= 39.9) {
                        $classificacao = "Obesidade classe II";
                    } elseif ($imc >= 40.0) {
                        $classificacao = "Obesidade classe III";
                    }

                    echo "<p>Peso informado: " . htmlspecialchars($peso) . " kg</p>";
                    echo "<p>Altura informada: " . htmlspecialchars($altura) . " m</p>";
                    echo "<p>Seu IMC é: " . number_format($imc, 2, ',', '.') . "</p>";
                    echo "<p>Classificação: <span class='classificacao'>" . $classificacao . "</span></p>";
                } else {
                    echo "<p style='color:red;'>Altura inválida. Deve ser maior que zero.</p>";
                }

            } else {
                echo "<p style='color:red;'>Por favor, informe o peso e a altura com valores numéricos.</p>";
            }
        } else {
            echo "<p style='color:red;'>Método de requisição inválido.</p>";
        }
        ?>
        <a href="exercicio_03_form.html" class="back-link">Calcular Novamente</a>
        <a href="index.php" class="back-link">Voltar para Home</a>
    </div>
</body>
</html>