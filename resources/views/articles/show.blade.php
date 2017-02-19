@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Article</div>

                    <div class="panel-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{session('success')}}
                            </div>
                        @endif

                            @if(!empty($article->image))
                                <img src="{{ asset('images/' . $article->image) }}" width="720" height="340" />
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
                                    <h2> Commentaires : </h2>
                                @forelse($comments as $comment)
                                    <h4>Commentaire posté par {{ $comment->user->name }}</h4>
                                    <p>{{ $comment->content }}</p>
                                    @if(! empty($comment->image))
                                    <img src="{{ asset('images/' . $comment->image) }}" width="320" height="240" />
                                    @endif
                                    @empty
                                    <strong>Cet article n'a fait l'objet d'aucun commentaire(s) !</strong>
                                @endforelse
                                <h3>Laissez un commentaire</h3>
                                {{ Form::open(['route'=>['comment.create', $article->id], 'method'=>'POST', 'files' => true])}}
                                <div class="form-group">

                                    {{ Form::text('content', '', ['class' => 'form-control'] ) }}


                                    {{ Form::file('image') }}


                                {{ Form::submit('Envoyer le commentaire') }}

                                {{ Form::close() }}
                                </div>
                            </div>
                            <a href="{{route('article.index')}}" class="btn btn-primary">Retour aux articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
