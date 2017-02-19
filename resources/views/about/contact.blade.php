@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Formulaire de contact</div>

                    <div class="panel-body">
                        <form method="POST" action="{{route('contact_store')}}">
                            {{csrf_field()}}
                            <input required type="text" name="name" placeholder="Votre nom">
                            <input required type="text" name="email" placeholder="Votre email">
                            <textarea name="content" placeholder="Ecrivez votre message" id="" cols="30" rows="10"></textarea>
                            <input type="submit" value="Envoyer">

                        @include('messages.errors')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
