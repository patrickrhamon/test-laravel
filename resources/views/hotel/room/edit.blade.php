<h1>Hotel <b>{{ $hotel->name }}</b></h1>

<form action="{{ route('room.update', [$hotel->id, $room->id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <label>Nome:</label> <input type="text" name="name" value="{{ $room->name }}"><br />
    <label>Descrição:</label> <input type="text" name="description" value="{{ $room->description }}"><br />
    <a href="{{ route('room.index', [$hotel->id]) }}">Voltar</a> <button type="submit">Salvar</button>
</form>