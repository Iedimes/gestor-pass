@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.credenciale.actions.index'))

@section('body')

<div class="card">
    <div class="card-header text-center">
    <h2>DETALLE CREDENCIAL </h2>
        {{-- <h6>{{ $credenciale->grupo->nombre }}</h6> --}}
    </div>

    <div class="card-body">

        <div class="row">
            <div class="form-group col-sm-2">
            <p class="card-text"><strong>SERVICIO:</strong>  {{ $credenciale->grupo->nombre }}</p>
            </div>
            <div class="form-group col-sm-3">
                <p class="card-text"><strong>ENLACE:</strong>  {{ $credenciale->enlace }}</p>
            </div>
            <div class="form-group col-sm-3">
                <p class="card-text"><strong>IP/SERVIDOR:</strong> {{ $credenciale->servidor->ip }}</p>
            </div>
            <div class="form-group col-sm-4">
                <p class="card-text"><strong>PUERTO:</strong> {{$credenciale->servidor->puerto }} </p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-2">
                            <p class="card-text"><strong>FECHA PUBLICACION:</strong> {{date("d/m/Y", strtotime($credenciale->fecha))}}</p>

        </div>
            <div class="form-group col-sm-3">

                            <p class="card-text"><strong>ESTADO:</strong> {{$credenciale->estado->nombre }} </p>

            </div>
            <div class="form-group col-sm-4">
                            <p class="card-text"><strong>TIPO DE CONEXION:</strong> {{$credenciale->tipodeconexion->nombre }} </p>

                <td style="text-align:center;">




                </td>
            </div>

        </div>

 </div>
 </div>

 <div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header text-center">
                ACCESO:
            </div>
                <div class="card-body">
                <div class="form-group">
                    <label for="usuario">Usuario:</label>
                    <input type="text" id="usuario" name="usuario" class="form-control custom-input" value="{{ $credenciale->usuario }}" disabled>

                </div>


                           <!-- Modal para verificar contraseña -->
                    <div class="modal fade" id="verificar-modal" tabindex="-1" role="dialog" aria-labelledby="verificar-modal-label" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                               <div class="modal-content">
                                    <form id="verificar-form" method="POST" action="/verificar-contrasena">
                                        @csrf
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="verificar-modal-label">Verificar contraseña</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                    <div class="form-group">
                                    <label for="contrasena">Contraseña:</label>
                                    <input type="password" id="contrasena" name="contrasena" class="form-control custom-input">
                                    <input type="text" id="login" name="login" class="form-control custom-input" value="{{ $login }}" style="display:none;">
                                    <input type="text" id="credencial" name="credencial" class="form-control custom-input" value="{{ $credenciale->id }}" style="display:none;">
                                    <input type="text" id="credenciales" name="credenciales" class="form-control custom-input" value="{{ $credenciale }}" style="display:none;">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Verificar</button>
                            </div>
                            </form>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                @if (empty(old('contrasena_dev', session('contrasena_dev'))))

                    <input type="password" id="contrasena" name="contrasena" class="form-control custom-input" value="****" disabled>

                @else
                    <!-- obtener el valor de la variable de sesión flash y pasarlo al campo -->
                <input type="text" id="contrasena_dev" name="contrasena_dev" class="form-control custom-input" value="{{ old('contrasena_dev', session('contrasena_dev')) }}" readonly>

                @endif


            </div>

         <div class="row">
    <div class="col">
    @if(Auth::user()->rol->role_id != 3)
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verificar-modal">
            Verificar Contraseña
        </button>
    @endif
    </div>
</div>

        </div>
    </div>
    @if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->has('contrasena'))
    <div id="error-message" class="alert alert-danger">
        {{ $errors->first('contrasena') }}
    </div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // hacer desaparecer el mensaje de éxito después de 10 segundos
        setTimeout(function() {
            $("#success-message").fadeOut("slow");
        }, 5000);

        // hacer desaparecer el mensaje de error después de 10 segundos
        setTimeout(function() {
            $("#error-message").fadeOut("slow");
        }, 10000);
    });
</script>
</div>






    <div class="col-6">
        <div class="card">
            <div class="card-header text-center">
             INFORMACION ADICIONAL
            </div>
            <div class="card-body">
        <div class="form-row">
  <div class="form-group col-md-4">
    <label for="tipo_bd">Tipo de Base de Datos:</label>
    @if (empty($credenciale->cat_informaciones->tipodebd->nombre))

    @else
    <input type="text" id="tipo_bd" name="tipo_bd" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->tipodebd->nombre }}" readonly>
    @endif

  </div>

  <div class="form-group col-md-4">

 <label for="version_bd">Version de la BD:</label>
      @if (empty($credenciale->cat_informaciones->tipodebd ->version))

      @else
      <input type="text" id="version_bd" name="version_bd" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->tipodebd ->version}}" readonly>
      @endif



  </div>

  <div class="form-group col-md-4">
  <label for="nombre_bd">Nombre de BD:</label>
      @if (empty($credenciale->cat_informaciones->nombredebd))

      @else
      <input type="text" id="nombre_bd" name="nombre_bd" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->nombredebd }}" readonly>
      @endif

  </div>
</div>
<div class="row">
  <div class="col-md-4">

    <div class="form-group">

 <label for="venc_ssl">Fecha de Venc. SSL:</label>
      @if (empty($credenciale->cat_informaciones->fecha_vec_ssl))

      @else
      <input type="text" id="venc_ssl" name="venc_ssl" class="form-control custom-input" value=" {{date("d/m/Y", strtotime($credenciale->cat_informaciones->fecha_vec_ssl))}} " readonly>
      @endif

    </div>
    <div class="form-group">
<label for="version">Versión de CMS :</label>
      @if (empty($credenciale->cat_informaciones->versiones))

      @else
      <input type="text" id="version" name="version" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->versiones }}" readonly>
      @endif
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">
      <label for="venc_dominio">Fecha de Venc. Dominio: </label>
      @if (empty($credenciale->cat_informaciones->fecha_vec_dominio))

      @else
      <input type="text"class="form-control custom-input"value="{{date("d/m/Y", strtotime($credenciale->cat_informaciones->fecha_vec_dominio))}} " readonly>
      @endif

    </div>
    <div class="form-group">

        <div class="form-group">

  <label for="ssl">Tipo Servicio:</label>
      @if (empty($credenciale->cat_informaciones->ssl))

      @else
      <input type="text" id="ssl" name="ssl" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->tipo_servicios->nombre  }}" readonly>
      @endif
    </div>

    <div class="form-group">


          </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="form-group">

  <label for="ssl">Cuenta con SSL:</label>
      @if (empty($credenciale->cat_informaciones->ssl))

      @else
      <input type="text" id="ssl" name="ssl" class="form-control custom-input" value="{{ $credenciale->cat_informaciones->ssl }}" readonly>
      @endif

    </div>
    <div class="form-group">

    </div>
    @if  (empty($credenciale->cat_informaciones))
    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/cat-informaciones/'.$credenciale->id.'/createdetail') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('Agregar') }}</a>
    @else
    @if (Auth::user()->rol->role_id !== 3)

    <a class="btn btn-primary btn-spinner btn-sm pull-right m-b-0 rounded-pill" href="{{ url('admin/cat-informaciones/'.$credenciale->id.'/modificar') }}" role="button"><i class="fa fa-plus"></i>&nbsp; {{ trans('Editar') }}</a>
    @endif

    @endif

  </div>
</div>



            </div>
        </div>
    </div>
</div>

@endsection
