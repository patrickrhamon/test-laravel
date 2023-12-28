<h1>Hotel <b>{{ $hotel->name }}</b></h1>

<form>
    <a href="{{ route('room.create', [$hotel->id]) }}">Novo Quarto</a>
</form>

<ul>
    @foreach($rooms as $room)
        <li>{{ $room->name }} -
            <a href="{{ route('room.show', [$hotel->id, $room->id]) }}">Mostrar</a>
            <a href="{{ route('room.edit', [$hotel->id, $room->id]) }}">Editar</a>
        </li>
    @endforeach
</ul>

<a href="{{ route('hotel.index') }}">Voltar</a>