<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div>
        <form action="{{ route('cars.update',['car'=>$car->id]) }}"
            enctype="multipart/form-data"
            {{-- 타입이파일인경우 필수 --}}
            method="post"
            class="justify-start">
        @method('patch')
        @csrf
            <div class="w-1/3 my-2">
                <label for="original">원본 이미지</label>
                <img src="{{ '$car->image' }}">
                <label for="image">자동차 이미지: </label>
                <input
                type="file" id="image" name="image"\>
                @error('image')
                <div class="my-4 text-red-300">
                    <span> {{ $message }}</span>
                </div>
                @enderror
            </div>
            <div class="w-2/3 my-2">
                <label for="company">제조회사: </label>
                <select
                value="{{ old('company_id')? old('company_id'): $car->company_id }}"
                name="company_id" id="company">
                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('company')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="name">자동차명: </label>
                <input type="text" id="name"
                value="{{ old('name')? old('name'): $car->name }}"
                name="name">
            </div>
            @error('name')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="year">제조년도: </label>
                <input type="number" id="year" name="year"
                value="{{ old('year')? old('year'): $car->year }}"
                {{-- 쓰던거 중간에 저장 --}}
            </div>
            @error('year')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <div class="w-2/3 my-2">
                <label for="price">가격: </label>
                <input type="number" id="price" name="price"
                value="{{ old('price')? old('price'): $car->price }}">
            </div>
            @error('price')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <div class="w-2/3 my-2">
                <div class="w-2/3 ">
                <label for="type">차종: </label>
                <input type="text" id="type" name="type"
                value="{{ old('type')? old('type'): $car->type }}">
            </div>
            @error('type')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <div class="w-2/3 my-2">
                <div class="w-2/3 ">
                <label for="style">외형: </label>
                <input type="text" id="style" name="style"
                value="{{ old('style')? old('style'): $car->style }}">
            </div>
            @error('style')
            <div class="my-4 text-red-300">
                <span> {{ $message }}</span>
            </div>
            @enderror
            <button class="my-4 px-3 py-2 bg-blue-400 rounded shadow text-white">등록</button>
        </form>
    </div>
</x-app-layout>
