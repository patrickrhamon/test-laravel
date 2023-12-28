<h1>Hotel <b>{{ $hotel->name }}</b></h1>

<form>
    <label>Nome:</label> <input type="text" disabled name="name" value="{{ $room->name }}"><br />
    <label>Descrição:</label> <input type="text" disabled name="description" value="{{ $room->description }}"><br />
</form>

<form action="{{ route('room.destroy', [$hotel->id, $room->id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <a href="{{ route('room.index', [$hotel->id]) }}">Voltar</a>
    <button type="submit">Deletar</button>
</form>