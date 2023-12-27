
<form action="{{ route('hotel.store') }}" method="POST">
    {{ csrf_field() }}
    <label>Nome:</label> <input type="text" name="name"><br />
    <label>Endereço:</label> <input type="text" name="address"><br />
    <label>Cidade:</label> <input type="text" name="city"><br />
    <label>Estado:</label> <input type="text" name="state"><br />
    <label>CEP:</label> <input type="text" name="zip_code"><br />
    <label>Site:</label> <input type="text" name="website"><br />
    <button type="submit">Salvar</button>
</form>