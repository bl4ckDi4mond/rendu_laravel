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

                            @include('components.share', [ 'url' => request()->fullUrl()])


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
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <script>

        var popupSize = {
            width: 780,
            height: 550
        };

        $(document).on('click', '.social-buttons > a', function(e){

            var
                verticalPos = Math.floor(($(window).width() - popupSize.width) / 2),
                horisontalPos = Math.floor(($(window).height() - popupSize.height) / 2);

            var popup = window.open($(this).prop('href'), 'social',
                'width='+popupSize.width+',height='+popupSize.height+
                ',left='+verticalPos+',top='+horisontalPos+
                ',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1');

            if (popup) {
                popup.focus();
                e.preventDefault();
            }

        });
    </script>
@endsection
