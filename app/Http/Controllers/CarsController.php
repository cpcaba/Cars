<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Helpers\Helper;
use App\Modelo;
use App\Feature;
use App\Car;
use App\Brand;
use Validator;

class CarsController extends Controller
{

     public function __construct(){
        $this->middleware('auth');
      //$this->middleware('admin',['except' => ['index','create','store','show']]);
        $this->middleware('admin',['only' => ['update','edit','destroy']]);
      }

  /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $cars=Car::with('Modelo')->get();
          return view('cars')->with('data',$cars);
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
        $car = New Car;
        $modelo = Modelo::all();
        $feature = Feature::all();
        $color= Helper::getPossibleColors();
        return view('createcar')->with('data', $car)->with('data1', $modelo)->with('data2',$feature )->with('data3',$color );

      }

      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'year'  => 'required',
            'kms'  => 'required',
            'price' => 'required',
            'data1' => 'required',
            'data2' => 'required',
            'data3' => 'required|in:Rojo,Azul,Verde,Negro,Blanco'
          );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('car/create')->withErrors($validator)->withInput();
        } else {
             //$request = Request::all();
            $car= New Car;
            $car->year =  $request->year;
            $car->kms =  $request->kms;
            $car->price =  $request->price;
            $car->modelo_id =  $request->data1;
            $car->color=  $request->data3;
            $car->save();
            $car->feature()->attach( $request->data2);
        }

        return redirect('/cars')->with('message', 'Creado exitosamente');
      }

      /**
       * Display the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function show($id)
      {
          //
      }

      /**
       * Show the form for editing the specified resource.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
        $car=Car::find($id);
        $modelo = Modelo::all();
        $feature = Feature::all();
        $color= Helper::getPossibleColors();
        return view('createcar')->with('data', $car)->with('data1', $modelo)->with('data2',$feature )->with('data3',$color );

      }

      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request, $id)
      {
        $rules = array(
            'year'  => 'required',
            'kms'  => 'required',
            'price' => 'required',
            'data1' => 'required',
            'data2' => 'required',
            'data3' => 'required|in:Rojo,Azul,Verde,Negro,Blanco'
        );

        $validator = Validator::make($request->all(), $rules);

        // process the login
        if ($validator->fails()) {
            return redirect('car/create')->withErrors($validator)->withInput();
        } else {
             //$request = Request::all();
            $car=Car::find($id);
            $car->year =  $request->year;
            $car->kms =  $request->kms;
            $car->price =  $request->price;
            $car->modelo_id =  $request->data1;
            $car->color=  $request->data3;
            $car->save();
            $car->feature()->sync( $request->data2);
        }

        return redirect('/cars')->with('message', 'Modificado exitosamente');
      }

      /**
       * Remove the specified resource from storage.
       *
       * @param  int  $id
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
        // delete
        $car = Car::find($id);
        $car->delete();
        return redirect('/cars')->with('message', 'Eliminado exitosamente');
      }
  }
