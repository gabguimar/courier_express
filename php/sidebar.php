<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sidebar</title>
	<!-- Biblioteca bootstrap para utilizar icones - bootstrap-icons -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="../src/css/styles.css">
</head>
<body>
<nav class="menu-lateral">
	<div class="btn-expandir">
		<i class="bi bi-list"></i>
	</div>
	<ul>
		<li class="item-menu">
			<a href="#">
				<span class="icon"><i class="bi bi-house"></i></span>
				<span class="txt-link">&nbsp;Início</span>
            </a>
        </li>
		<li class="item-menu">
			<a href="#" id="encomendas-link">
				<span class="icon"><i class="bi bi-box2"></i></span>
				<span class="txt-link">&nbsp;Encomendas</span>
			</a>
			<ul id="item-drop-menu">
				<li class="item-dropdown-nav">
					<a href="#">
						<span class="icon"><i class="bi bi-chevron-right"></i></span>
						<span class="txt-link">&nbsp;Criar</span>
					</a>
				</li>
				<li class="item-dropdown-nav">
					<a href="#">
						<span class="icon"><i class="bi bi-chevron-right"></i></span>
						<span class="txt-link">&nbsp;Acompanhar</span>
					</a>
				</li>
			</ul>
		</li>
		</li>
		<li class="item-menu">
			<a href="#">
				<span class="icon"><i class="bi bi-box-arrow-right"></i></span>
				<span class="txt-link">&nbsp;Logout</span>
            </a>
        </li>
	</ul>
</nav>
	<script src="../src/javascript.js"></script>
</body>
</html>