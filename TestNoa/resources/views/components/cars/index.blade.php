<div>
    <!-- When there is no desire, all things are at peace. - Laozi -->
    @foreach($cars as $car)
        <div>{{ $car->name }}</div>
    @endforeach
    <div>
        {{ $cars->links() }}
    </div>
</div>
