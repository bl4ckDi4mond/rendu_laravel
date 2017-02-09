@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Dashboard</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('article.store')}}">
                            {{csrf_field()}}
                            <input required type="text" name="title">
                            <textarea name="content" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="Envoyer">

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
