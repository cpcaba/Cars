<!DOCTYPE html>
<html>
    <head>
        <title>Brands</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>
      <!--CREAR NUEVO POST-->
        <div class="container">
               @if(empty($data->id))
                  @if($type=='features')
                  <h1>New feature</h1>
                  <form action="/feature" method="POST">    <!-- agregar la action en routes.php  -->
                  @else
                  <h1>New Brand</h1>
                  <form action="/brands" method="POST">    <!-- agregar la action en routes.php  -->
                  @endif

               @else
                  @if($type=='features')
                     <h1>Update Feature</h1>
                     <form action="/feature/{{$data->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                  @else
                     <h1>Update Brand</h1>
                     <form action="/brands/{{$data->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                  @endif
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
                    <label>Nombre </label>
                      <input class="form-control" type="text" name="name" value="{{$data->name}}" ><br>
                  </div>
                  <div class='form-group'>
                    <label></label>
                    <input type="submit" class='btn btn-default' value="Save"><br>
                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </form>
        </div>
        <!--fin CREAR NUEVO POST-->
    </body>
</html>
