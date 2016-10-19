<!DOCTYPE html>
<html>
    <head>
        <title>Cars</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>

        <div class="container">
          @if (Session::has('message'))
              <script type="text/javascript">alert("Procesado Exitosamente!");</script>
          @endif
        </div>

          <header>
            <div class="container">
                <h1>Cars</h1>
                <div class="content">
                  <a href="/car/create">
                    <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >New Car</button>
                  </a>
                </div>
            </div>
          </header>

          <section>
             <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading">Cars</div>
                  <table class="table">
                          <th>Models|Brands</th>
                          <th>Year</th>
                          <th>Kms</th>
                          <th>Color</th>
                          <th>Price</th>
                          <th>Features</th>
                          <th>Opciones</th>
                          @foreach($data as $car)

                          <tr>
                            <td>{{$car->modelo->name}} | {{$car->modelo->brand->name}}</td>
                            <td>{{$car->year}}</td>
                            <td>{{$car->kms}}</td>
                            <td>{{$car->color}}</td>
                            <td>{{$car->price}}</td>
                            @if($car->feature->isEmpty())
                              <td>Vacio</td>
                            @else
                            <td>
                              @foreach($car->feature as $carfeature)
                                {{$carfeature->name}} <br>
                              @endforeach
                            </td>
                            @endif
                            <td>

                                <!-- boton editar un post-->
                                <a href="/car/{{$car->id}}/edit">
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                    <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                                </button>
                                </a>

                                <!-- boton Eliminar un post -->
                                <form class="delete" action="/car/{{$car->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                                  <input type="hidden" name="_method" value="DELETE">
                                  <input type="submit" class='btn btn-default' value="Eliminar">
                                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                             </td>
                          </tr>

                        @endforeach
                        </table>
                      </div>
                  </div>
                </div>
            </section>

        </body>
</html>
