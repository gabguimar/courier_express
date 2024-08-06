<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sidebar</title>
	<!-- Biblioteca bootstrap para utilizar icones - bootstrap-icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="../src/css/styles.css">
	
</head>
<body>
	<!-- HTML Atualizado -->
	<div class="header">
		<a href="#" class="btn-expandir" id="toggle-sidebar"><i class="bi bi-list btn-header"></i></a>
		<a href=""><img src="../src/img/logo.png" class="logo-img" alt="Logo"></a>
	</div>
	<nav class="menu-lateral contraido"> <!-- Começa no estado contraído -->
		<ul style="padding: 0;">
			<li id="encomendas-link"></li>
			<li class="item-menu">
				<a href="index.php">
					<span class="icon"><i class="bi bi-house"></i></span>
					<span class="txt-link">&nbsp;Início</span>
				</a>
			</li>

			<li class="item-menu">
				<a href="criar.php">
					<span class="icon"><i class="bi bi-box2"></i></span>
					<span class="txt-link">&nbsp;Criar</span>
				</a>
			</li>

			<li class="item-menu">
				<a href="#">
					<span class="icon"><i class="bi bi-search"></i></span>
					<span class="txt-link">&nbsp;Acompanhar</span>
				</a>
			</li>
			<li class="item-menu logout">
				<a href="#">
					<span class="icon"><i class="bi bi-box-arrow-right"></i></span>
					<span class="txt-link">&nbsp;Logout</span>
				</a>
			</li>
		</ul>
	</nav>
	<script src="../src/javascript.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>