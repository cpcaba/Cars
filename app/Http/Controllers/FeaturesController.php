<?php

namespace App\Http\Controllers;

use Illuminate\Support\MessageBag;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Feature;
use Validator;

class FeaturesController extends Controller
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
      $features = Feature::all();
      return view('brands')->with('data', $features)->with('type', 'features');
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $feature = New Feature;
        return view('createBrand')->with('data', $feature )->with('type', 'features');
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
        return redirect('feature/createfeature')->withErrors($validator)->withInput();
      } else {
         //$request = Request::all();
        $feature = new Feature;
        $feature->name =  $request->name;
        $feature->save();
      }
      return redirect('/features')->with('message', 'Creado exitosamente');
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
        $feature=Feature::find($id);
        return view('createBrand')->with('data', $feature)->with('type', 'features');;

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
        return redirect('feature/createfeature')->withErrors($validator)->withInput();
      } else {
         //$request = Request::all();
        $feature = Feature::find($id);
        $feature->name =  $request->name;
        $feature->save();
      }
      return redirect('/features')->with('message', 'Modificado exitosamente');
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
        $feature = Feature::find($id);
        $feature->delete();
        return redirect('/features')->with('message', 'Modificado exitosamente');
    }
}
