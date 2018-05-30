@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('companies.index') }}" class="thumbnail">EMPRESAS
                                <img src="/img/companies.jpg" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('products.index') }}" class="thumbnail">PRODUCTOS
                                <img src="/img/medical-devices.jpg" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('orders.index') }}" class="thumbnail">COTIZACIONES
                                <img src="/img/pedido2.png" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('purchases.index') }}" class="thumbnail">COMPRAS
                                <img src="/img/buy.png" alt="...">
                            </a>
                        </div>
                    </div>

  <div class="dropdown">
    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a tabindex="-1" href="#">HTML</a></li>
      <li><a tabindex="-1" href="#">CSS</a></li>
      <li class="dropdown-submenu">
        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
          <li class="dropdown-submenu">
            <a class="test" href="#">Another dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">3rd level dropdown</a></li>
              <li><a href="#">3rd level dropdown</a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
