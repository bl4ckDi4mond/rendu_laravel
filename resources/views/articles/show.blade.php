@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                        <h1>{{$article->title}}</h1>
                        <p>{{$article->content}}</p>
                        <p>
                            @if($article->user)
                                Posté par: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>
                            <div>
                                    <h1> Commentaires : </h1>
                                @forelse($comments as $comment)
                                    <h4>Commentaire posté par {{ $comment->user->name }}</h4>
                                    <p>{{ $comment->content }}</p>
                                    @empty
                                    <strong>Cet article n'a fait l'objet d'aucun commentaire(s) !</strong>
                                @endforelse


                            </div>
                        <a href="{{route('article.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
