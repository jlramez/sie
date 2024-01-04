<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, th, td, tr {
                        border: 1px solid black;
                        border-collapse: collapse;
                        }
    </style>                    
    <link href="{{ public_path('css/app.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ public_path('js/app.js') }}"></script> 
    @vite(['resources/js/app.js'])
    <title>Cédula de registro de anexos</title>
</head>
<body>
    <div class="box box-info padding-1">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12"> 
                    <div class="card">
                                <div>
                                    <h3 align="center"> TRIBUNAL DE JUSTICIA LABORAL BUROCRÁTICA DEL ESTADO DE ZACATECAS</h3>
                                </div>
                            <div class="card-header">
                                    <h4 align="center">SECRETARÍA GENERAL DE ACUERDOS</h4>
                                    <h5 align="center"> CÉDULA DE REGISTRO DE ANEXOS</h5>
                                </div>
                                <div >
                                        <div><strong>Expediente:</strong> {{$expediente->noexp ?? ''}}</div>
                                        <div><strong>Actor:</strong> {{$expediente->actor ?? ''}}</div>
                                        <div><strong>Demandado:</strong> {{$expediente->demandado ?? ''}}</div>
                                        <div><strong>Folio:</strong> {{$promocion->folio ?? ''}}</div>
                                </div>
                            </div>
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                        <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-sm" style="width:100%;">
                                        <thead class="thead">
                                            <tr align="center"> 
                                                <td>#</td> 
                                                <th>Cantidad</th>
                                                <th>Fojas</th>
                                                <th>Documento</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($resultado as $row)
                                                <tr  align="center">
                                                    <td>{{ $loop->iteration }}</td> 
                                                    <td>{{ $row->cantidad }}</td>
                                                    <td>{{ $row->fojas }}</td>
                                                    <td>{{ $row->documento }}</td>
                                                </tr>
                                                @empty
                                                <tr  align="center">
                                                    <td class="text-center" colspan="100%">No se encontraron datos </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>				
                                </div>
                        </div>
                        <div class="card-footer" align="center">
                            <div>&nbsp;</div>
                            <div>&nbsp;</div>
                            <div>Firma de recibido</div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>
    </div>
</body>
</html>