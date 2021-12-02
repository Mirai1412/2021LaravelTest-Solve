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
        <button>
            <a href="{{ route('cars.index') }}">
                목록보기
            </a>
        </button>
        <button>
            <a href="{{ route('cars.edit',['car' => $car->id]) }}">
               수정하기
            </a>
        </button>
        <button>
            <a href="{{ route('cars.destroy',['car' => $car->id]) }}">
            삭제
        </button>
    </div>
</x-guest-layout>
