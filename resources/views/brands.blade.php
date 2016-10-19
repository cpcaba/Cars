<!DOCTYPE html>
<html>
    <head>
      @if($type=='features')
        <title>Features</title>
       @else
         <title>Brands</title>
        @endif

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Lato:100" >
        <link rel='stylesheet' href="css/css.css" />
    </head>
    <body>
     <header>
        <div class="container">
          @if($type=='features')
           <h1>Features</h1>
           <div class="content">
             <a href="/feature/create">
               <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >New Feature</button>
             </a>
           </div>
           @else
            <h1>Brands</h1>
            <div class="content">
              <a href="/brand/create">
                <button  type="button" class="btn btn-default btn-md" aria-label="Left Align" >New Brand</button>
              </a>
            </div>
            @endif
        </div>

      </header>

      <section>
        <div class="container">

            <div class="panel panel-default">
                  <table class="table">
                      <th>Name</th>
                      <th>Options</th>
                      @foreach($data as $element)
                      <tr>
                        <td>{{$element->name}}</td>
                        <td>
                          <!-- boton editar un post-->
                          @if($type=='features')
                            <a href="/feature/{{$element->id}}/edit">
                          @else
                            <a href="/brands/{{$element->id}}/edit">
                          @endif
                          <button type="button" class="btn btn-default" aria-label="Left Align">
                                <span class="glyphicon  glyphicon-edit" aria-hidden="true"></span>
                          </button>
                          </a>
                           <!-- boton Eliminar un post -->
                          @if($type=='features')
                          <form class="delete" action="/feature/{{$element->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                          @else
                          <form class="delete" action="/brands/{{$element->id}}" method="POST">    <!-- agregar la action en routes.php  -->
                          @endif
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class='btn btn-default' value="Eliminar">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          </form>
                        </td>
                      </tr>
                    @endforeach
              </div>
            </div>
        </section>
      </body>
</html>
