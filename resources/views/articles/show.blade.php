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
                                    {{-- Test Like button --}}

                                    <a href="#" id="like" class="btn btn-success btn-md ladda-button ajax-like" data-style="slide-right" data-size="l"><span class="ladda-label">Like</span></a>
                                    <script type="text/javascript">
                                        $(function() {
                                            $('.ajax-like').click(function(e) {
                                                e.preventDefault();
                                                var l = Ladda.create(this);
                                                var id=$(this).attr("id");
                                                l.start();
                                                $.article("/like", {
                                                    "article_id" : $(this).attr("id")
                                                }, function(response) {
                                                    if(response.result!=null&&response.result=="1"){
                                                        if(response.isunlike=="1"){
                                                            $("#"+id).removeClass("btn-success");
                                                            $("#"+id).addClass("btn-danger");
                                                            $("#"+id).html(response.text);
                                                        }else{
                                                            $("#"+id).removeClass('btn-danger');
                                                            $("#"+id).addClass("btn-success");
                                                            $("#"+id).html(response.text);
                                                        }
                                                    }else{
                                                        alert("Server Error");
                                                    }
                                                }, "json").always(function() {
                                                    l.stop();
                                                });
                                                return false;
                                            });
                                        });
                                    </script>

                                    {{-- Fin Test Like button --}}
                                    @empty
                                    <strong>Cet article n'a fait l'objet d'aucun commentaire(s) !</strong>
                                @endforelse
                                <h1>Laissez un commentaire</h1>
                                {{ Form::open(['route'=>['comment.create', $article->id], 'method'=>'POST'])}}
                                <div class="form-group">
                                    {{ Form::text('comment', '', ['class' => 'form-control'] ) }}
                                </div>

                                {{ Form::submit('Envoyer le commentaire') }}

                                {{ Form::close() }}

                            </div>
                            <a href="{{route('article.index')}}" class="btn btn-primary">Retour aux articles</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
