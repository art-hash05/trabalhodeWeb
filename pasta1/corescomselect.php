<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cores</title>
</head>
<body>
    <h1>Escolha sua cor!</h1>

    <form action="corespapi.php" method="post">
        
        <select name="cor">
            <option value="Tomato">Tomate</option>
            <option value="DodgerBlue">Azul</option>
            <option value="Gray">Cinza</option>
            <option value="Violet">Violeta</option>
            <option value="Orange">Laranja</option>
            <option value="MediumSeaGreen">Verde Marinho</option>
            <option value="SlateBlue">Roxo</option>
            <option value="LightGray">Cinza Claro</option>
        </select>
        <br><br>
        <button type="submit">Ver a cor!</button>

    </form>
</body>
</html>