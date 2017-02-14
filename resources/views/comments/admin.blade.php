@extends('layouts.app')

@section('content')
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
<table class="table table-stripped table-bordered">
    <thead>
    <tr>
        <th>
            Commentaire
        </th>
        <th>
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    @forelse($comments as $comment)

        <th>{{ $comment->content }}</th>
        <th>
            {{ Form::open(['route' => ['comments.update', $comment->id], 'method'=> 'put']) }}

            {{ Form::text('content', '', ['class' => 'form-control']) }}

            {{ Form::submit('Modifier le commentaire', ['class' => 'btn btn-primary']) }}

            {{ Form::close() }}

            {{ Form::open(['route' => ['comments.delete', $comment->id], 'method'=> 'delete']) }}

            {{ Form::submit('Supprimer le commentaire', ['class' => 'btn btn-danger']) }}

            {{ Form::close() }}
        </th>

    @empty

        Pas de commentaires

    @endforelse
    </tbody>
</table>



@endsection