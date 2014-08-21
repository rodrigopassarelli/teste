<html>
<head>
	<title></title>
</head>
<body>
	<?php 

	$dados = $this->session->userdata('logar');
	echo "Ola " . $dados['login'];
	
?>

	<a href="/index.php/login/logout">Deslogar</a>
</body>
</html>