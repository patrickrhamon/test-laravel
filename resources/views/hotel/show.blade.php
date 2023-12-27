
<form>
    <label>Nome:</label> <input type="text" disabled name="name" value="{{ $hotel->name }}"><br />
    <label>Endereço:</label> <input type="text" disabled name="address" value="{{ $hotel->address }}"><br />
    <label>Cidade:</label> <input type="text" disabled name="city" value="{{ $hotel->city }}"><br />
    <label>Estado:</label> <input type="text" disabled name="state" value="{{ $hotel->state }}"><br />
    <label>CEP:</label> <input type="text" disabled name="zip_code" value="{{ $hotel->zip_code }}"><br />
    <label>Site:</label> <input type="text" disabled name="website" value="{{ $hotel->website }}">
</form>

<form action="{{ route('hotel.destroy', [$hotel->id]) }}" method="POST">
    {{ csrf_field() }}
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit">Deletar</button>
</form>
