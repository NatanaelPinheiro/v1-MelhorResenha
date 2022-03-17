@extends('layout.main')

@section('title', $review->title)

@section('content')

<div class="col-md-10 offset-md-1">
    <div class="row">
    	<div id="image-container" class="col-md-6 text-center">
    		<img src="/img/reviews/{{$review->image}}" alt="{{$review->title}}" class="img-fluid">
    	</div>
    	<div id="info-container" class="col-md-6">
    		<h1>{{$review->title}}</h1>
    		<p class="review-author">
    			<ion-icon name="person-outline"></ion-icon>
    			Por {{$review->author}}
    		</p>
    		<p class="review-release">
    			<ion-icon name="star-outline"></ion-icon>
    			lançado em {{ date('Y', strtotime($review->release))}}</p>

              <h3>Resenha do livro:</h3>

              <p id="review-owner">Resenha escrita por {{ $reviewOwner['name']}}</p>

              <p class="review-description">
                 {{$review->description}}
             </p>

             @if(!$hasUserSaved)
             <form action="/review/save/{{$review->id}}" method="POST">
                @csrf
                <a href="/review/save/{{$review->id}}"
                    class="btn btn-danger review-save"
                    id="review-submit"
                    onclick="event.preventDefault();
                    this.closest('form').submit();">
                    Salvar Resenha
                </a>
            </form>
            <p class="review-save-numbers">Salvo por {{ count($review->users)}} pessoas</p>
            @else
            <p class="already-saved-msg">Você já salvou essa resenha.</p>
            @endif

        </div>
    </div>
</div>



@endsection