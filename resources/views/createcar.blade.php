<!DOCTYPE html>
<html>
    <head>
        <title>New Car</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' type="text/css" href="css/css.css" />
    </head>
    <body>
      <!--CREAR NUEVO POST-->
        <div class="container">
               @if(empty($data->id))
                  <h1>New Car</h1>
                  <form action="/car" method="POST">    <!-- agregar la action en routes.php  -->
               @else
                  <h1>Update Car</h1>
                  <form action="/car/{{$data->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                  <input type="hidden" name="_method" value="PUT">     <!-- forzar  que se ejecute PUT y no POST-->
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class='form-group'>
                  <label>Modelo</label>
                  <select name= "data1" class="form-control">
                      @foreach( $data1 as $modelo )
                          @if($modelo->id==$data->model_id)
                              <option value = {{$modelo->id}} selected='selected'> {{$modelo->name}} - {{$modelo->brand->name}} </option>
                          @else
                              <option value = {{$modelo->id}} >{{$modelo->name}} - {{$modelo->brand->name}} </option>
                          @endif
                      @endforeach
                  </select>
                </div>

                  <div class='form-group'>
                    <label>Year </label>
                      <input class="form-control" type="date" name="year" value="{{$data->year}}" ><br>
                  </div>
                  <div class='form-group'>
                    <label>Kilometraje</label>
                      <input class="form-control" type="text" name="kms" id="kms" value= "{{$data->kms}}"><br>
                  </div>
                  <div class='form-group'>
                    <label>Color</label>
                    <select name= "data3" class="form-control">
                     @foreach( $data3 as $color )
                      <option value ="{{$color}}"> {{$color}} </option>
                     @endforeach
                    </select>
                  </div>

                  <div class='form-group'>
                    <label>Features</label>
                    <select multiple name= "data2[]" class="form-control">

                        @foreach( $data2 as $feature )

                          @if($data->feature->contains($feature->id))
                            <option value = {{$feature->id}}  selected='selected'> {{$feature->name}} </option>
                          @else
                             <option value = {{$feature->id}}> {{$feature->name}} </option>
                          @endif
                        @endforeach
                    </select>
                  </div>
                  <div class='form-group'>
                    <label>Price $</label>
                    <input class="form-control" type="number" min="0" step="any" name="price" id="price" value= "{{$data->price}}"><br>
                  </div>
                  <div class='form-group'>
                    <label></label>
                    <input type="submit" class='btn btn-default' value="Save"><br>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
        <!--fin CREAR NUEVO -->
    </body>
</html>
