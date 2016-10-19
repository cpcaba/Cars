<!DOCTYPE html>
<html>
    <head>
        <title>Models</title>
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
                <h1>Models</h1>
                <div class="content">
                  <a href="/modelo/create">
                    <button  type="button" class="btn btn-default btn-md" aria-label="Left Align">New Model</button>
                  </a>
                </div>
            </div>
          </header>

          <section>
             <div class="container">
                <div class="panel panel-default">
                  <div class="panel-heading">Modelos</div>
                    <table class="table">
                          <th>Name</th>
                          <th>Brand</th>
                          <th>Opciones</th>

                          @foreach($data as $modelo)

                          <tr>
                            <td>{{$modelo->name}}</td>
                            <td>{{$modelo->brand->name}}</td>
                            <td>
                                <!-- boton editar un post-->
                                <a href="/modelo/{{$modelo->id}}/edit">
                                <button type="button" class="btn btn-default" aria-label="Left Align">
                                      <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                                </button>
                                </a>
                                <!-- boton Eliminar un post -->
                                <form class="delete" action="/modelo/{{$modelo->id}}" method="POST">    <!-- agregar la action en routes.php  -->
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
