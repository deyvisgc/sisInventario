@extends('layaouts.admin')
@section('contenido')

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Detalle Mobiliario <a href="" data-target="" data-toggle="modal"><button
                            class="btn btn-danger"><i class="fa fa-eye" aria-hidden="true">Nuevo</i></button></a></h3>
            @include('Mobiliarios.searchMobi')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table id="myTable" class="table">
                    <thead>

                    <th>Nombre</th>
                    <th>Marca</th>
                    <th>Serie</th>
                    <th>Cantidad</th>
                    <th>Fecha</th>
                    <th>Comentario</th>
                    <th>Departamento</th>
                    <th>Categoria</th>
                    <th>Imagen</th>
                    <th>Estado</th>

                    <th>Opciones</th>
                    </thead>
                    @foreach ($mobiliarios as $mobi)

                        <tr>
                            <td>{{ $mobi->nombre_Mobi}}</td>
                            <td>{{ $mobi->marca_Mobi}}</td>
                            <td>{{ $mobi->serie_Mobi}}</td>
                            <td>{{ $mobi->cantidad_Mobi}}</td>
                            <td>{{ $mobi->fecaRe_Mobi}}</td>
                            <td>{{ $mobi->comentario}}</td>
                            <td>{{ $mobi->nombre_depar}}</td>
                            <td>{{ $mobi->nombre_cate}}</td>
                            <td>
                                <img src="{{asset('Imagenes/Mobiliario/'.$mobi->imagen)}}" alt="{{ $mobi->nombre_Mobi}}" height="60px" width="60px" class="img-thumbnail">
                            </td>
                            <td>{{ $mobi->estado}}</td>

                            <td>

                                <a href="" data-target="#modal-estado-{{$mobi->idMobiliario}}" data-toggle="modal"><button  class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true">Detalle</i></button></a>
                            </td>
                        </tr>
                        @include('MobiResponsable.estado')
                        @include('MobiResponsable.deletem')
                    @endforeach

                </table>

            </div>
            {{$mobiliarios->render()}}

        </div>
    </div>

@endsection


