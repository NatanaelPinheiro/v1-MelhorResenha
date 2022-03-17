@extends('layout.main')

@section('title', 'MelhorResenha')

@section('content')


<div class="col-md-6 offset-md-3 container-xl" id="review-create-container">
	<h1>Crie uma resenha</h1>
	<form action="/review" method="POST" enctype="multipart/form-data">
		@csrf

		<div class="form-group">
			<label for="image">Capa do livro: </label>
			<input type="file" id="image" name="image" class="form-control-file">
		</div>

		<div class="form-group">
			<label for="title">Livro: </label>
			<input type="text" id="title" name="title" class="form-control" placeholder="Nome do livro">
		</div>

		<div class="form-group">
			<label for="author">Autor: </label>
			<input type="text" id="author" name="author" class="form-control" placeholder="Autor do livro">
		</div>

		<div class="form-group">
			<label for="release">Lançamento: </label>
			<input type="date" id="release" name="release" class="form-control" placeholder="Ano de lançamento">
		</div>

		<div class="form-group">
			<label for="description">Resenha: </label>
			<textarea name="description" id="description" placeholder="Escreva a resenha do livro" class="form-control" maxlength="900" minlength="50"></textarea>
		</div>

		<input type="submit" value="Criar Resenha" class="btn btn-primary" id="btn-primary">
		
	</form>
</div>
@endsection