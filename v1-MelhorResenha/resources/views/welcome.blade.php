@extends('layout.main')

@section('title', 'Melhor Resenha')

@section('content')

<div id="search-container" class="col-md-12">
	<h1>Busque resenhas</h1>

	<form action="/" method="GET">
		<input type="text" id="search" name="search" class="form-control" placeholder="procure por títulos de livros">
	</form>
</div>

<div id="reviews-container" class="col-md-12">
	@if($search)
	<h2>Buscando por: {{ $search }}</h2>
	@else
	<h2>Resenhas</h2>
	<p class="subtitle">Veja as resenhas criadas</p>
	@endif

	<div id="cards-container" class="row">
		@foreach($reviews as $review)
		<div class="card col-md-3">
			<img src="/img/reviews/{{ $review->image }}" alt="{{ $review->title}}">

			<div class="card-body">
				<p class="card-date">{{ date('Y', strtotime($review->release)) }}</p>
				<h5 class="card-title">
					{{ $review->title}}
				</h5>
				<p class="card-author">{{ $review->author }}</p>
				<p class="card-saves">
					<ion-icon name="heart"></ion-icon>
					{{ count($review->users) }}
				</p>
				<a href="/review/{{$review->id}}" class="btn btn-primary" id="btn-primary">Ver mais</a>
			</div>
		</div>
		@endforeach	
	</div>
	@if(count($reviews) == 0 && $search)
	<p>
		Não foi possível encontrar nenhuma resenha com {{ $search }}!<br>
		<a href="/">Ver todas</a>
	</p>
	@elseif(count($reviews) == 0)
	<p>
		Não há resenhas disponíveis, 
		<a href="/review/create">clique aqui</a> para criar resenhas.
	</p>
	@endif
</div>


@endsection