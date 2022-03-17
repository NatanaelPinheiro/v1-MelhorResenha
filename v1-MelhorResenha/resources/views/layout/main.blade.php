<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>

	<!-- CSS BOOTSTRAP -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<!-- STYLE CSS -->
	<link rel="stylesheet" href="/css/style.css">

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav id="navbar" class="navbar navbar-expand-lg navbar-light" >
			<div class="container" >
				<span class="navbar-brand">MelhorResenha</span>

				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link" href="/">Ver resenhas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/review/create">Adicionar Resenha</a>
						</li>
						@auth
						<li class="nav-item">
							<a class="nav-link" href="/dashboard">Minhas Resenhas</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="/user/profile">Perfil</a>
						</li>
						<li class="nav-item">
							<form action="/logout" method="POST">
								@csrf
								<a href="/logout" class="nav-link" onclick="
								event.preventDefault();
								this.closest('form').submit();">
								Sair
							</a>
						</form>
					</li>
					@endauth

					@guest
					<li class="nav-item">
						<a class="nav-link" href="/login">Entrar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/register">Registrar</a>
					</li>
					@endguest



				</ul>
			</div>
		</div>
	</nav>
</header>
<main>
	<div class="container-fluid">
		<div class="row">
			@if(session('msg'))
			<p class="msg">{{ session('msg') }}</p>
			@endif
			@yield('content')
		</div>
	</div>
</main>


<footer>
	<p>{{date('Y')}} &copy; MelhorResenha</p>	
</footer>



<!-- ION-ICONS -->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<!-- BUNDLER BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>