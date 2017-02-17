@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="container">
        <h2>Admin Action</h2>
        <p>Votre rôle d'admin vous permet de modifier ou supprimer les commentaires :</p>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Commentaires</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($comments as $comment)
            <tr>
                <td>{{ $comment->content }}</td>
                <td>{{ Form::open(['route' => ['comments.update', $comment->id], 'method'=> 'put']) }}

                    {{ Form::text('content', '', ['class' => 'form-control']) }}

                    {{ Form::submit('Modifier le commentaire', ['class' => 'btn btn-primary']) }}

                    {{ Form::close() }}

                    {{ Form::open(['route' => ['comments.delete', $comment->id], 'method'=> 'delete']) }}

                    {{ Form::submit('Supprimer le commentaire', ['class' => 'btn btn-danger']) }}

                    {{ Form::close() }}

    @empty

        Pas de commentaires

    @endforelse
                    </td>
                </tr>
            </tbody>
        </table>
    </div>




@endsection