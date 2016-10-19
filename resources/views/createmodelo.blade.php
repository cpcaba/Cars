<!DOCTYPE html>
<html>
    <head>
        <title>Car Model</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>
      <!--CREAR NUEVO-->
        <div class="container">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                  @if(empty($data->id))
                     <h1>New Model</h1>
                     <form action="/modelo" method="POST">    <!-- agregar la action en routes.php  -->
                  @else
                     <h1>Update Model</h1>
                     <form action="/modelo/{{$data->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                     <input type="hidden" name="_method" value="PUT">     <!-- forzar  que se ejecute PUT y no POST-->
                   @endif
                   <div class='form-group'>
                     <label>Description</label>
                     <input type="text" class="form-control" name="text" id="text" value="{{$data->name}}">
                   </div>
                   <div class='form-group'>
                     <label>Brand</label>
                     <select name= "data" class="form-control">
                         @foreach( $data1 as $brand )
                             @if($data->brand_id==$brand->id)
                                 <option  value={{$brand->id}} selected='selected'> {{$brand->name}}</option>
                             @else
                                 <option  value={{$brand->id}}> {{$brand->name}} </option>
                             @endif
                         @endforeach
                     </select>
                   </div>
                  <div class='form-group'>
                    <label></label>
                    <input type="submit" class='btn btn-default' value="Save"><br>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
        <!--fin CREAR NUEVO-->
    </body>
</html>
