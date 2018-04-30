@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-md-3">
                            <a href="{{ route('companies.index') }}" class="thumbnail">CLIENTES
                                <img src="/img/companies.jpg" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="{{ route('products.index') }}" class="thumbnail">PRODUCTOS
                                <img src="/img/medical-devices.jpg" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="{{ route('orders.index') }}" class="thumbnail">PEDIDOS
                                <img src="/img/pedido2.png" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <a href="{{ route('purchases.index') }}" class="thumbnail">Compras
                                <img src="/img/billings.png" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
