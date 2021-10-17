
<?php

session_start();
  
if(isset($_SESSION['log'])==false){
	echo("<script>window.location = 'http://intranet.aniger/index.php';</script>");
}

$users=$_SESSION['user'];

$sala=$_POST['sala'];

// ini_set('display_errors', 0 );
// error_reporting(0);

include 'conexao.php'; 

?>

<?php

$sql = "DELETE FROM salas WHERE titulo ='$sala'";
$result = mysqli_query($conn, $sql) or die("Erro ao retornar dados");

{ echo "<meta http-equiv=refresh content='0; URL=index.php';> "; }

?>

