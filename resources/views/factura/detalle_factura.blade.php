<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Datatable -->
        <link href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css" rel="stylesheet">

        
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

       
    </head>
    <body>
        <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
              <div class="card-header"><strong>Factura </strong><small>Detalle</small>
                <div class="card-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      Numero Factura: {{ $factura->id }}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      Fecha Factura: {{ \Carbon\Carbon::parse($factura->created_at)->format('d/m/Y') }}
                    </div>
                  </div> 
                  <div class="col-md-6">
                    <div class="form-group">
                      Numero de items: {{ $numItems }}
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      Total Factura: {{ number_format($total_factura, 2) }}
                    </div>
                  </div>    
                  <div class="col-md-10">
                    <div class="content">
                      <table id="tabla_factura">
                        <thead>
                          <tr>
                            <th scope="col">Descripcion</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Subtotal</th>
                          </tr>
                        </thead>
                      <tbody>
                      @foreach($factura->detalle as $row)
                        <tr>
                          <td>{{ $row->producto->descripcion }}</td>
                          <td>{{ $row->cantidad }}</td>
                          <td>{{ $row->producto->precio }}</td>
                          <td>{{ number_format($row->cantidad * $row->producto->precio, 2) }}</td>
                        </tr>
                      @endforeach   
                    </tbody>
                    <tfoot>
                      <td></td>
                      <td></td>
                      <td>T O T A L</td>
                      <td>{{ number_format($total_factura, 2) }}</td>
                    </tfoot>    
                  </table>    
                </div>
              </div>
            </div>
        </div>
        </div>  
    </body>

    <script src="https://code.jquery.com/jquery-3.5.0.js"></script>

    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>


</html>

<script type="text/javascript">
  $(document).ready(function() {
    $('#tabla_factura').DataTable( {
      paging: false,
      searching: false,
      info: false,
      bSort : false
    } );
} );
    
</script>

   