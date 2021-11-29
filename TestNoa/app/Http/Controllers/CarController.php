<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Company;
use App\View\Components\CarShow;
use Illuminate\Http\Request;

class CarController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']); // 제외 except, 지정 only
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 1. DB 에서 리스트를 가져온다.
        // $cars = Car::all();
        $cars = Car:: latest()->paginate(5);
        // 2. 그 리스트를 블레이드 컴포넌트에게 전달한다.
        return view('components.cars.index', ['cars'=>$cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $companies = Company::all();
        return view('components.cars.register-car',['companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 1. 자동차 정보 저장에 필요한
        // 데이터가 모두, 그리고 적절한 형태로
        // 왔는지 정당성 검사를 수행하자.

        $now = now();
        $now -> year;
        $data = $request->validate([
            'image'=>'required|image',
            'name' => 'required|unique:cars',
            'company_id' => 'required',
            'year' => 'required|numeric|min:1800|max:'.($now->year+1), //숫자이고 4자리
            'price'=> 'required|numeric|min:1',
            'type' => 'required',
            'style'=> 'required'
        ]);//이미지 필수 AND 이미지인지 확인

        //2. 이미지를 파일 시스템의 특정 위치에 저장한다.
        $path = $request->image->store('images', 'public');

        /**
         * 3. 요청정보에서 ($request) 필요한 데이터를
         * 꺼내가지고 DB에 저장한다.
         */

        $data = array_merge($data, ['image' => $path]);
        Car::create($data);

        //4. cars.index로 redirection
        return redirect()->route('cars.index');

        // dd($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {

        return view('components.cars.car-show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
