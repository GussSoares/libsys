<?php 
// session_start inicia a sessão
session_start();

// as variáveis email e senha recebem os dados digitados na página anterior
$user = $_POST['user'];
$password = $_POST['password'];
//coneção com o banco de dados
$conn = mysqli_connect("localhost","root","","server");
$sql = "SELECT * FROM usuario WHERE email = '$user' AND senha = '$password'";
$result = mysqli_query($conn, $sql);
// A variavel $result pega as varias $email e $senha, faz uma 
//pesquisa na tabela de usuarios
// $result = mysqli_query($sql);
/* Logo abaixo temos um bloco com if e else, verificando se a variável $result foi 
bem sucedida, ou seja se ela estiver encontrado algum registro idêntico o seu valor
será igual a 1, se não, se não tiver registros seu valor será 0. Dependendo do 
resultado ele redirecionará para a página site.php ou retornara  para a página 
do formulário inicial para que se possa tentar novamente realizar o email */

if(mysqli_num_rows ($result) > 0 )
{
$_SESSION['user'] = $user;
$_SESSION['password'] = $password;
header('location:pages/user-page.html');
}
else{
  unset ($_SESSION['user']);
  unset ($_SESSION['password']);
  header('location:index.html');
}
mysqli_close($conn);
?>