
<form>
    <a href="{{ route('hotel.create') }}">Novo</a>
</form>

<ul>
    @foreach($hotels as $hotel)
        <li>{{ $hotel->name }} -
            <a href="{{ route('hotel.show', [$hotel->id]) }}">Mostrar</a>
            <a href="{{ route('hotel.edit', [$hotel->id]) }}">Editar</a>
            <a href="{{ route('room.index', [$hotel->id]) }}">Quartos</a>
        </li>
    @endforeach
</ul>