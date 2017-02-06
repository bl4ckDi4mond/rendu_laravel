<h1>Mes tests</h1>


@if($age >= 18)
    <h2>Vous êtes majeur !</h2>
@else
    <h2>Vous êtes mineur !</h2>
@endif

<ul>
    @foreach($tasks as $task)
        <li>{{$task}}</li>
    @endforeach
</ul>