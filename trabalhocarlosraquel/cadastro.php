

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css" type="text/css">
    <link rel="icon" href="cadastro-icon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>Cadastro com Imagem</title>
</head>
<body>
    <header>
        <ul>
            <li>
                Home
            </li>
            <li>
                Cadastro
            </li>
</ul>

</header>


    <div class="form1">
    <form method="POST" action="envia.php" id="form" enctype="multipart/form-data">
        <h1 id="fz">
            Fazer Cadastro
        </h1>
        <input type="text" name="username" required="true" placeholder="Digite o seu nome...">
        <input type="email" name="email" required="true" placeholder="Digite o seu email...">
        <input type="tel" name="telf" required="true" placeholder="Digite o seu celular" pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" id="tel" maxLength="6">
        <input type="text" name="cpf" required="true" placeholder="Digite o seu CPF..." pattern="\([0-9]{2}\)[\s][0-9]{4}-[0-9]{4,5}" id="cpf">
    <input type="file" name="foto" required="true" placeholder="coloque sua foto" id="file">
        <input type="submit" value="Fazer Cadastro" id="cadastro">
    </form>
    </div>

    <script type="text/javascript">
        $("#tel").mask("(00) 00000-0000");
        $("#cpf").mask('000.000.000-00');
 
      
    const colorDiv = document.querySelector('#form');
    let counter = 0;

const colorArr = ['rgb(199, 20, 176)', 'rgb(140,0,255)', 'rgb(124,118,129)', 'rgb(95,18,90)']

setInterval(
	()=> {
		counter++
		
		if (counter == colorArr.length) {
			counter = 0
		}
		
		colorDiv.style.borderTopColor = colorArr[counter];
        colorDiv.style.borderRightColor = colorArr[counter];
        colorDiv.style.borderBottomColor = colorArr[counter-1];
        colorDiv.style.borderLeftColor = colorArr[counter-1];
    }, 1000
)

    </script>
</body>
</html>