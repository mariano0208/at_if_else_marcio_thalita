<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Temperatura</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 40px auto; text-align: center; }
        h1 { color: #333; }
        p { font-size: 1.2em; }
        .mensagem { font-weight: bold; }
        .back-link { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .back-link:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Classificação da Temperatura</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            if (isset($_GET['temperatura']) && is_numeric($_GET['temperatura'])) {
                $temperatura = (float)$_GET['temperatura'];
                $mensagem = "";

                if ($temperatura < 0) {
                    $mensagem = "Congelante";
                } elseif ($temperatura >= 0 && $temperatura < 15) {
                    $mensagem = "Muito frio";
                } elseif ($temperatura >= 15 && $temperatura < 25) {
                    $mensagem = "Razoável";
                } elseif ($temperatura >= 25) {
                    $mensagem = "Calor";
                }

                echo "<p>Temperatura informada: " . htmlspecialchars($temperatura) . "°C</p>";
                echo "<p>Mensagem: <span class='mensagem'>" . $mensagem . "</span></p>";

            } else {
                echo "<p style='color:red;'>Por favor, informe um valor numérico para a temperatura.</p>";
            }
        } else {
            echo "<p style='color:red;'>Método de requisição inválido.</p>";
        }
        ?>
        <a href="exercicio_02_form.html" class="back-link">Verificar Novamente</a>
        <a href="index.php" class="back-link">Voltar para Home</a>
    </div>
</body>
</html>