@extends('brackets/admin-ui::admin.layout.default')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

@section('body')



<div class="card">
  <div class="card-header">
    <h3 class="card-title mb-0 text-primary font-weight-bold text-uppercase">Tablero</h3>
  </div>
  <div class="card-body">
 <div class="row">
  <div class="col-md-4">
    <div class="card bg-green text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-person-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px">{{ $userCount}}</h5>
        <p class="card-text fs-5">TOTAL DE USUARIOS</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-gray text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-gear-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px"></h5>
        <p class="card-text fs-5">TOTAL DE SERVICIOS</p>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="card bg-dark text-white rounded-3 shadow-sm">
      <div class="card-body text-center">
        <div class="icon-container">
          <i class="bi bi-credit-card-2-front-fill"></i>
        </div>
        <h5 class="card-title fw-bold mb-3" style="font-size: 40px"></h5>
        <p class="card-text fs-5">TOTAL DE CREDENCIALES</p>
      </div>
    </div>
  </div>
</div>

<style>
  .icon-container {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%; /* ajusta la altura del contenedor según tus necesidades */
    display: flex;
    justify-content: center;
    align-items: center;
    opacity: 0.5; /* ajusta la opacidad según tus necesidades */
  }

  .icon-container i {
    font-size: 40px;
  }

  .card-body {
    position: relative;
    height: 200px; /* ajusta la altura de la tarjeta según tus necesidades */
  }
</style>
  </div>
</div>

@endsection
