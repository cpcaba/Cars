<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Modelo;

use App\Brand;

use Validator;

class ModelsController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
      $this->middleware('admin',['except' => ['index']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $modelos = Modelo::with('Brand')->get();
      return view('modelos')->with('data', $modelos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $modelo = New Modelo;
    $brands = Brand::all();
    return view('createmodelo')->with('data', $modelo)->with('data1', $brands);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = array(
              'text'  => 'required',
              'data' => 'required',
          );

          $validator = Validator::make($request->all(), $rules);

          // process the login
          if ($validator->fails()) {
              return redirect('modelo/create')->withErrors($validator)->withInput();
          } else {
              $modelo = new Modelo;
              $modelo->name =  $request->text;
              $modelo->brand_id=  $request->data;
              $modelo->save();
            }
              // redirect
              return redirect('/modelos')->with('message', 'Procesado exitosamente');
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
          $modelo=Modelo::find($id);
          $brands = Brand::all();
          return view('createmodelo')->with('data', $modelo)->with('data1', $brands);
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
          // validate
          // read more on validation at http://laravel.com/docs/validation
          // validate
          // read more on validation at http://laravel.com/docs/validation
          $rules = array(
            'text'  => 'required',
            'data' => 'required',
          );

          $validator = Validator::make($request->all(), $rules);

          // process the login
          if ($validator->fails()) {
              return redirect('modelo/create')->withErrors($validator)->withInput();
          } else {
              $modelo = Modelo::find($id);
              $modelo->name =  $request->text;
              $modelo->brand_id=  $request->data;
              $modelo->save();
            }
          // redirect
          return redirect('/modelos')->with('message', 'Procesado exitosamente');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $modelo = Modelo::find($id);
    // evaluar que pasa con CARS
      $modelo->delete();
      return redirect('/modelos')->with('message', 'Eliminado exitosamente');
      }
}
