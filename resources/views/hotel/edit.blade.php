<form action="{{ route('hotel.update', [$hotel->id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="PUT">
    <label>Nome:</label> <input type="text" name="name" value="{{ $hotel->name }}"><br />
    <label>Endereço:</label> <input type="text" name="address" value="{{ $hotel->address }}"><br />
    <label>Cidade:</label> <input type="text" name="city" value="{{ $hotel->city }}"><br />
    <label>Estado:</label> <input type="text" name="state" value="{{ $hotel->state }}"><br />
    <label>CEP:</label> <input type="text" name="zip_code" value="{{ $hotel->zip_code }}"><br />
    <label>Site:</label> <input type="text" name="website" value="{{ $hotel->website }}">
    <button type="submit">Salvar</button>
</form>
