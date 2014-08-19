<html>
<head>
	<title></title>
</head>
<body>
	<?php 


 if($this->session->userdata('logar')=="") {
		
		redirect('/index.php/login/index');
 }

	$dados = $this->session->userdata('logar');
	echo "Ola " . $dados['login'];
	
?>

	<a href="/index.php/login/logout">Deslogar</a>
</body>
</html>