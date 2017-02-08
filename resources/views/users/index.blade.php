@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <h1>Mes articles</h1>

                        @forelse(Auth::user()->articles as $article)
                            <h2>{{$article->title}}</h2>
                            <p>{{$article->content}}</p>
                        @empty
                            Rien
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
