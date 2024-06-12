<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario PHP</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
</head>
<body>
    
    <?php
        $nameErr = $emailErr = $generoErr = $websiteErr = "";

        $name = $email = $genero = $comment = $website = "";

        if ($_SERVER["REQUEST_METHOD"] ==  "POST"){
            if(empty($_POST["name"])){
                $nameErr = "Nome é obrigatório";    
            } else {
                $name = test_input($_POST["name"]);
            }

            if (empty($_POST["email"])){
                $emailErr = "Email é obrigatório";
            } else {
                $email = test_input($_POST["email"]);
            }
         
            if (empty($_POST["website"])){
                $website = "";
            } else {
                $website = test_input($_POST["website"]);
            }

            if (empty($_POST["genero"])){
                $generoErr = "Genero é obrigatório";
            } else {
                $genero = test_input($_POST["genero"]);
            }
        } 

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>

    <div class="container">
        <h2>Formulario em PHP</h2>
        <p><span class="erro">* obrigatório</span></p>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <span class="erro">* <?php echo $nameErr; ?></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" id="email">
                <span class="erro">* <?php echo $emailErr; ?></span>
            </div>

            <div class="form-group">
                <label for="website">Website:</label>
                <input type="text" name="website" id="website">
                <span class="erro">* <?php echo $websiteErr; ?></span>
            </div>

            <div class="form-group">
                <label for="comment">Comentario:</label>
                <textarea name="comment" id="comment" rows="5" cols="40"></textarea>
            </div>

            <div class="form-group">
                <label for="genero">Genero:</label>
                <input type="radio" name="genero" value="Feminino" id="genero-feminino">Feminino
                <input type="radio" name="genero" value="Masculino" id="genero-masculino">Masculino
                <input type="radio" name="genero" value="Outro" id="genero-outro">Outro
                <span class="erro">* <?php echo $generoErr; ?></span>
            </div>

            <input type="submit" name="submit" value="Submit">
        </form>

        <?php
            echo "<div class='output'>";
            echo "<h2>Saída de Dados:</h2>";
            echo "<p class='output-data'>$name</p>";
            echo "<p class='output-data'>$email</p>";
            echo "<p class='output-data'>$website</p>";
            echo "<p class='output-data'>$genero</p>";
            echo "</div>";
        ?>
    </div>
</body>
</html>