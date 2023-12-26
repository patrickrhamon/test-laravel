
<ul>
    @foreach($hotels as $hotel)
        <li>{{ $hotel->name }}</li>
    @endforeach
</ul>