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
                                Utilisateur: {{$article->user->name}}
                            @else
                                Pas d'utilisateur
                            @endif
                        </p>
                            <div>
                                    <h1> Commentaires : </h1>
                                @if($article->comment)
                                    Commentaire: {{$article->comment->content}}
                                @else
                                    Pas de commentaires
                                @endif


                            </div>
                        <a href="{{route('article.index')}}">Retour</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
