<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Brand;
use Validator;

class BrandsController extends Controller
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
      $brands = Brand::all();
      return view('brands')->with('data', $brands)->with('type', 'brands');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = New Brand;
        return view('createBrand')->with('data', $brand)->with('type', 'brands');
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
        'name'  => 'required',
      );

      $validator = Validator::make($request->all(), $rules);
      // process the login
      if ($validator->fails()) {
        return redirect('brand/createBrand')->withErrors($validator)->withInput();
      } else {
         //$request = Request::all();
        $brand = new Brand;
        $brand->name =  $request->name;
        $brand->save();
      }
      return redirect('/brands')->with('message', 'Creado exitosamente');
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
        $brand=Brand::find($id);
        return view('createBrand')->with('data', $brand);

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
      $rules = array(
        'name'  => 'required',
      );

      $validator = Validator::make($request->all(), $rules);
      // process the login
      if ($validator->fails()) {
        return redirect('brand/createBrand')->withErrors($validator)->withInput();
      } else {
         //$request = Request::all();
        $brand = Brand::find($id);
        $brand->name =  $request->name;
        $brand->save();
      }
      return redirect('/brands')->with('message', 'Modificado exitosamente');
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
        $brand = Brand::find($id);
        $modelos = $brand->modelo;
        foreach ($modelos as $modelo){
          $modelo->delete();
        }
        $brand->delete();
        return redirect('/brands')->with('message', 'Modificado exitosamente');
    }
}
