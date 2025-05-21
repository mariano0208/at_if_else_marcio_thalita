<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado - Média de Notas</title>
    <style>
        body { font-family: sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); max-width: 500px; margin: 40px auto; text-align: center; }
        h1 { color: #333; }
        p { font-size: 1.2em; }
        .aprovado { color: green; font-weight: bold; }
        .reprovado { color: red; font-weight: bold; }
        .back-link { display: inline-block; margin-top: 20px; padding: 10px 15px; background-color: #6c757d; color: white; text-decoration: none; border-radius: 4px; }
        .back-link:hover { background-color: #5a6268; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Resultado da Média</h1>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verifica se as notas foram enviadas e são numéricas
            if (isset($_POST['nota1']) && is_numeric($_POST['nota1']) &&
                isset($_POST['nota2']) && is_numeric($_POST['nota2']) &&
                isset($_POST['nota3']) && is_numeric($_POST['nota3'])) {

                $nota1 = (float)$_POST['nota1'];
                $nota2 = (float)$_POST['nota2'];
                $nota3 = (float)$_POST['nota3'];

                $media = ($nota1 + $nota2 + $nota3) / 3;
                $situacao = "";
                $classe_css = "";

                if ($media >= 7) {
                    $situacao = "APROVADO";
                    $classe_css = "aprovado";
                } else {
                    $situacao = "REPROVADO";
                    $classe_css = "reprovado";
                }

                echo "<p>Nota 1: " . htmlspecialchars($nota1) . "</p>";
                echo "<p>Nota 2: " . htmlspecialchars($nota2) . "</p>";
                echo "<p>Nota 3: " . htmlspecialchars($nota3) . "</p>";
                echo "<p>Média: " . number_format($media, 2, ',', '.') . "</p>";
                echo "<p>Situação: <span class='" . $classe_css . "'>" . $situacao . "</span></p>";

            } else {
                echo "<p class='reprovado'>Por favor, informe todas as três notas com valores numéricos.</p>";
            }
        } else {
            echo "<p class='reprovado'>Método de requisição inválido.</p>";
        }
        ?>
        <a href="exercicio_01_form.html" class="back-link">Calcular Novamente</a>
        <a href="index.php" class="back-link">Voltar para Home</a>
    </div>
</body>
</html>