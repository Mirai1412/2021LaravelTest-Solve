<x-guest-layout>
    <div>
        <div class="w-1/3 my-2">
            {{$car->company->name}}
            {{$car->name}}
            {{-- <img src="{{'/storage'.$car->image}}"> --}}
            <img src="{{$car->image}}">
            {{$car->year}}
            {{$car->price}}
            {{$car->type}}
            {{$car->style}}
        </div>
    </div>
</x-guest-layout>

