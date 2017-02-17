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
                        @forelse($articles as $article)
                            <h1>{{ $article->title }}</h1>
                            <p>{{ $article->content }}</p>
                            <a href="{{route('article.show', ['id' => $article->id])}}"><button class="btn btn-primary">
                                Voir l'article
                            </button></a>
                                @foreach ($article->likes as $user)
                                    {{ $user->name }} likes this !
                                @endforeach
                                @if ($article->isLiked)
                                    <a href="{{ route('article.like', $article->id) }}">Unlike this shit</a>
                                @else
                                    <a href="{{ route('article.like', $article->id) }}">Like this awesome product!</a>
                                @endif
                        @empty
                            Rien du tout
                        @endforelse
                    </div>
                    <div class="text-center">
                        {{$articles->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
