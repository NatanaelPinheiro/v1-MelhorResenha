@extends('layout.main')

@section('title', 'Melhor Resenha')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Minhas Resenhas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reviews-container">
    @if(count($reviews) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Autor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviews as $review)
            <tr>
                <td scope="row">{{ $loop->index + 1}}</td>
                <td><a href="/review/{{$review->id}}">{{$review->title}}</a></td>
                <td>{{ $review->author}} </td>
                <td>
                    <a href="/review/edit/{{$review->id}}" class="btn btn-info edit-btn">
                        <ion-icon name="create-outline"></ion-icon>
                        Editar
                    </a>
                    <form action="/review/{{$review->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-btn">
                            <ion-icon name="trash-outline"></ion-icon>
                            Deletar
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @else
    <p>
        Você ainda não tem resenhas, 
        <a href="/review/create">clique aqui</a> para criar uma.
    </p>
    @endif
</div>

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Resenhas Salvas</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-reviews-container">
    @if(count($reviewsAsParticipant) > 0)
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Autor</th>
                <th scope="col">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reviewsAsParticipant as $review)
            <tr>
                <td scope="row">{{ $loop->index + 1}}</td>
                <td><a href="/review/{{$review->id}}">{{$review->title}}</a></td>
                <td>{{ $review->author}} </td>
                <td>
                    <form action="/review/leave/{{$review->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger delete-bnt">
                            <ion-icon name="trash-outline"></ion-icon> Remover
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>
        Você ainda não salvou nenhuma resenha,
        <a href="/">clique aqui</a> para ver todas as resenhas.
    </p>
    @endif


</div>


@endsection