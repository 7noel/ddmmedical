<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		
	</style>
	<link rel="stylesheet" href="./css/print_pdf.css">
</head>
<body>
	<script type="text/php">
	if (isset($pdf)) {
		$x = 260;
        $y = 770;
        $text = "Página {PAGE_NUM} de {PAGE_COUNT}";
        $font = null;
        $size = 8;
        $color = array(0, 0, 0);
        $word_space = 0.0;  //  default
        $char_space = 0.0;  //  default
        $angle = 0.0;   //  default
        $pdf->page_text($x, $y, $text, $font, $size, $color, $word_space, $char_space, $angle);
	}
	</script>
	<footer>
		<div class="center">Av. Alfredo Benavides Nº1555 - Oficina 306 - Miraflores, Lima - Perú</div>
		<div class="center"><strong>T:</strong> (511) 6833-0884 <strong>E:</strong> contactenos@ddmmedical.com <strong>W:</strong> www.ddmmedical.com</div>
	</footer>
	<div class="">
		<div class="part">
			<div>
				<img src="./img/logo.png" alt="" width="200px">
			</div>
			<p>Sres.:</p>
			<div>CLINICA LIMA NORTE</div>
			<div>Atencion: Dr. José Luis Huerta</div>
			<div>Presente:</div>
		</div>
		<div class="part">
			<div class="ruc">RUC: 20600096622</div>
			<div>Cotización:</div>
			<div>Tel.</div>
			<div>+51-1-683-0884</div>
			<div>Cel.</div>
			<div>+51-983509797</div>
			<div>E-mail</div>
			<div>contactenos@ddmmedical.com</div>
			<p>Lima, {{ $model->created_at->formatLocalized('%A %d de %B de %Y') }}</p>
		</div>
	</div>
	<br><br>
	<div class="asunto">
		<p>Asunto:</p>
		<p>MONITOR DE SIGNOS VITALES - ADVANCED</p>
		<p>Estimados Sras. /Sres.</p>
		<p>Tomando como referencia su solicitud arriba mencionada, le adjuntamos la correspondiente oferta. Contiene una descripcion de los productos solicitados. Si tiene alguna consulta, por favor no dude en contactarnos.</p>
	</div>
	<div class="container-items">
		<table class="table-items">
			<thead>
				<tr>
					<th class="th1 border center">ITEM</th>
					<th class="th2 border center">DESCRIPCION DEL PRODUCTO</th>
					<th class="th3 border center">UND</th>
					<th class="th4 border center">P. UNIT.</th>
					<th class="th5 border center">TOTAL</th>
				</tr>
			</thead>
			<tbody>
				@foreach($model->details as $key => $detail)
				<tr>
					<td class="border center">{{ $key + 1 }}</td>
					<td class="border">
						<span>{{ $detail->product->name }}</span>
						<div>
							{!! nl2br($detail->product->description) !!} <br /> hola
						</div>
					</td>
					<td class="border center">{{ $detail->quantity }}</td>
					<td class="border center">{{ $detail->price }}</td>
					<td class="border center">{{ $detail->total }}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
		<table class="table-total">
			<tbody>
				<tr>
					<td class="th1"></td>
					<td class="th2"></td>
					<td class="th3"></td>
					<td class="th4 border right">SubTot.:</td>
					<td class="th5 border center">{{ $model->subtotal }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="border right">IGV:</td>
					<td class="border center">{{ $model->tax }}</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td class="border right">Total:</td>
					<td class="border center">{{ $model->total }}</td>
				</tr>
			</tbody>
		</table>

	</div>
	<div class="condiciones">
		<p>CONDICIONES DE PAGO</p>
		<table>
			<tr>
				<td>Forma de Pago:</td>
				<td>Contado</td>
			</tr>
			<tr>
				<td>Cuenta Corriente Dólares Interbank:</td>
				<td>631-3001268591 <strong>CCI</strong> 003-631-003001268591-90</td>
			</tr>
			<tr>
				<td>Validez de la oferta</td>
				<td>30 días</td>
			</tr>
		</table>
		<p>CONDICIONES COMERCIALES</p>
		<table>
			<tr>
				<td>Plazo de Entrega</td>
				<td>30 :días (Previa confirmación de la transferencia)</td>
			</tr>
			<tr>
				<td>Lugar de Entrega:</td>
				<td>Lima</td>
			</tr>
		</table>
		
	</div>
	<div class="firma">
		
	</div>
</body>
</html>