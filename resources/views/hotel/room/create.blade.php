<h1>Hotel <b>{{ $hotel->name }}</b></h1>

<form action="{{ route('room.store', [$hotel->id]) }}" method="POST">
    {{ csrf_field() }}
    <label>Nome:</label> <input type="text" name="name"><br />
    <label>Descrição:</label> <input type="text" name="description"><br />
    <a href="{{ route('room.index', [$hotel->id]) }}">Voltar</a> <button type="submit">Salvar</button>
</form>