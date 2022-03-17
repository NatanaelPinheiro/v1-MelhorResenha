@extends('layout.main')

@section('title', 'Editando: '.$review->title)

@section('content')


<div class="col-md-6 offset-md-3 container-xl" id="review-create-container">
	<h1>Editando: {{ $review->title }}</h1>
	<form action="/review/update/{{$review->id}}" method="POST" enctype="multipart/form-data">
		@csrf
		@method('PUT')

		<div class="form-group">
			<label for="image">Capa do livro: </label>
			<input type="file" id="image" name="image" class="form-control-file">
			<img src="/img/reviews/{{$review->image}}" alt="{{$review->title}}" class="img-preview">
		</div>

		<div class="form-group">
			<label for="title">Livro: </label>
			<input type="text" id="title" name="title" class="form-control" placeholder="Nome do livro" value="{{$review->title}}">
		</div>

		<div class="form-group">
			<label for="author">Autor: </label>
			<input type="text" id="author" name="author" class="form-control" placeholder="Autor do livro" value="{{$review->author}}">
		</div>

		<div class="form-group">
			<label for="release">Lançamento: 
			</label>
			<input type="date" id="release" name="release" class="form-control" value="{{ date('Y-m-d', strtotime($review->release))}}">
		</div>

		<div class="form-group">
			<label for="description">Resenha: </label>
			<textarea name="description" id="description" placeholder="Escreva a resenha do livro" class="form-control" maxlength="900" minlength="50">{{$review->description}}</textarea>
		</div>

		<input type="submit" value="Editar Resenha" class="btn btn-primary" id="btn-primary">
		
	</form>
</div>
@endsection