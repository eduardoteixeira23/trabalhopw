<?php
$server = "localhost";
$user = "root";
$pass = "";
$db_bd = "cadastro";

error_reporting(0);
// Cria a conexão com o banco de dados
$conn = mysqli_connect($server, $user, $pass, $db_bd);

// Checa conexão:
if (!$conn) {
  die("Falha na Conexão com o Banco de Dados: " . mysqli_connect_error());
}

?>

<?php



$username = $_POST['username'];
$email = $_POST['email'];
$tel = $_POST['telf'];
$cpf = $_POST['cpf'];
$num_casa = $_POST['num_casa'];
$cep = $_POST['cep'];

$sql2 =  "SELECT EMAIL FROM usuario";
$result_email = mysqli_query($conn, $sql2);

if (mysqli_num_rows($result_email) > 0) {
    while($teste5 = mysqli_fetch_assoc($result_email)){
      if($teste5["EMAIL"] == $email){
        echo "<script> window.alert('Email já cadastrado'); </script>";
        header( "refresh:0;url=cadastro.php" );
      }
    }
    }
else{

function get_endereco($cep){
    //formata cep, remove caracteres não numéricos
    $cep = preg_replace("/[^0-9]/", "", $cep);
    $url = "https://viacep.com.br/ws/$cep/xml/";
    $xml = simplexml_load_file($url);
    return $xml;
  }
  //$cep = preg_replace("/[^0-9]/", "", $cep);
  echo $cep;
  $cep = preg_replace("/[^0-9]/", "", $cep);
  $endereco = get_endereco($cep);
  $Rua = $endereco->logradouro;
  $Bairro=$endereco->bairro;
  $city = $endereco->localidade;
  
 $end = $Rua.", ".$Bairro.", ".$city.", ".$num_casa;
  // ---------------------------------------------------------
  
$imagem = $_FILES['foto']['tmp_name'];
$tamanho = $_FILES['foto']['size'];
$tipo = $_FILES['foto']['type'];
$nome = $_FILES['foto']['name'];

if ( $imagem != "none" )
{
    $fp = fopen($imagem, "rb");
    $conteudo = fread($fp, $tamanho);
    $conteudo = addslashes($conteudo);
    fclose($fp);
}

  //---------------------------------------------------------

  $sql = "INSERT INTO usuario (USERNAME, EMAIL, TEL, CPF, CEP, ENDERECO, FOTO) VALUES ('$username', '$email', '$tel', '$cpf', '$cep', '$end', '$conteudo')";
  if (mysqli_query($conn, $sql)) {
    echo "<script>window.alert('Usuario Adicionado');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
}
?>