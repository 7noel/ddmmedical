$(document).ready(function(){
	if ($('#is_import').val()==1) {
		$('.expenses').hide();
		$('.dam').hide();
	} else {
		$('.expenses').show();
		$('.dam').show();
	}
	if ($('#payment_condition_id').val()==1) {
		$('.due_date').hide();
	} else {
		$('.due_date').show();
	}

	$('.currency').each(function () {
		$currency = $(this);
		setCurrencyExpense($currency);
	});
	$('#txtCompany').autocomplete({
		source: "/api/companies/autocompleteAjax/",
		minLength: 4,
		select: function(event, ui){
			console.log(ui.item)
			$('#company_id').val(ui.item.id);
			$('#lstSeller').focus();
			if (ui.item.country_id==1461) {
				$('#is_import').val(0);
				$('.expenses').hide();
				$('.dam').hide();
			} else {
				$('#is_import').val(1);
				$('.expenses').show();				
				$('.dam').show();				
			}
		}
	});

//autocomplete para elementos agregados por javascript
	$(document).on('focus','.txtProduct', function (e) {
		$this = this;
		if ( !$($this).data("autocomplete") ) {
			e.preventDefault();
			$($this).autocomplete({
				source: "/api/products/autocompleteAjax",
				minLength: 4,
				select: function(event, ui){
					$p = ui.item.id;
					setRowProduct($this, $p);
				}
			});
		}
	});
	$(document).on('change','.txtCantidad, .txtPrecio, .txtDscto', function (e) {
		calcTotalItem(this);
		calcTotalOrder();
	});

	$(document).on('click','.expenses .btn', function (e) {
		e.preventDefault();
		$currency = $(this).parent().find('.currency');
		setCurrencyExpense();
	});
	
	$(document).on('change','.expense', function (e) {
		validateItem(this, '#'+this.id);
		calcCost();
	});
	$(document).on('change','#payment_condition_id', function (e) {
		if ($('#payment_condition_id').val()==1) {
			$('.due_date').hide();
		} else {
			$('.due_date').show();
		}
	});

	$('#btnAddProduct').click(function(e){
		addRowProduct();
	});
});

function setCurrencyExpense($currency) {
	currency = $currency.val();
	if (currency == 1) {
		$currency.parent().find('.labelCurrency').text('S/');
	} else if (currency == 2) {
		$currency.parent().find('.labelCurrency').text('$');
	} else {
		$currency.parent().find('.labelCurrency').text('€');
	}
}
function setRowProduct($this, $p) {
	if(isDesignEnabled($this, $p.id)){
		$($this).parent().parent().find('.productId').val($p.id);
		$($this).parent().parent().find('.txtProduct').val($p.name);
		$($this).parent().parent().find('.unitId').val($p.unit_id);
		$($this).parent().parent().find('.txtPrecio').val($p.price);
		$($this).parent().parent().find('.intern_code').text($p.intern_code);
		$($this).parent().parent().find('.txtCantidad').focus();
	}
}
function addRowProduct(data='') {
	var items = $('#items').val();
	if (items>0) {
		if ($("input[name='details["+(items-1)+"][product_id]']").val() == "") {
			$("input[name='details["+(items-1)+"][txtProduct]']").focus();
		} else{
			renderTemplateRowProduct(data);
		};
	} else{
		renderTemplateRowProduct(data);
	};
}

function validateItem (myElement, id) {
	n = $(myElement).parent().parent().find(id).val();
	n = Math.round(parseFloat(n)*100)/100;
	if (isNaN(n)) {n=0.00};
	$(myElement).parent().parent().find(id).val(n.toFixed(2));
	return n;
}
function calcTotalItem (myElement) {
	cantidad = validateItem(myElement,'.txtCantidad');
	precio = validateItem(myElement,'.txtPrecio');
	dscto = validateItem(myElement,'.txtDscto');
	D = Math.round(cantidad * precio * dscto) / 100;
	total = Math.round((cantidad*precio-D)*100)/100;
	$(myElement).parent().parent().find('.txtTotal').text( total.toFixed(2) );
}
function calcTotalOrder () {
	var gross_value = 0;
	var discount = 0;
	var subtotal = 0;
	var total = 0;
	var q,p,d;
	$('#tableItems tr').each(function (index, vtr) {
		q = parseFloat($(vtr).find('.txtCantidad').val());
		p = parseFloat($(vtr).find('.txtPrecio').val());
		//d = parseFloat($(vtr).find('.txtDscto').val());
		d = 0;
		gross_value = Math.round(q*p*100)/100 + gross_value;
		//discount = Math.round(q*p*d)/100 + discount;
	});

	$('#mGrossValue').text(gross_value.toFixed(2));
	$('#mDiscount').text(discount.toFixed(2));
	calcCost();
}

function calcFactor() {
	var e = parseFloat($('#e1').val()) + parseFloat($('#e2').val()) + parseFloat($('#e3').val()) + parseFloat($('#e4').val()) + parseFloat($('#e5').val()) + parseFloat($('#e6').val()) + parseFloat($('#e7').val()) + parseFloat($('#e8').val());
	var exw = parseFloat($('#mGrossValue').text());
	var subtotal = exw + parseFloat($('#e1').val()) + parseFloat($('#e2').val()) + parseFloat($('#e3').val());
	var total = Math.round(subtotal * (100 + 18))/100;
	$('#mSubTotal').text(subtotal.toFixed(2));
	$('#mTotal').text(total.toFixed(2));
	if (exw > 0) {
		return (exw + e)/(exw);
	} else {
		return 1;
	}
}
function calcCost() {
	$factor = calcFactor();
	$('#tableItems tr .txtPrecio').each(function (index, d) {
		$(d).parent().parent().find('.txtCost').val( ($(d).val() * $factor).toFixed(2) );
	});

}

function activateTemplate (id) {
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}

function renderTemplateRowProduct (data) {
	if (data != "") {
		ele = document.getElementById("tableItems").lastElementChild.querySelector("[data-product]");
		if (!isDesignEnabled(ele, data.id)) {return true;}
		
		
	}
	var clone = activateTemplate("#template-row-item");
	var items = $('#items').val();
	clone.querySelector("[data-productid]").setAttribute("name", "details[" + items + "][product_id]");
	clone.querySelector("[data-unitid]").setAttribute("name", "details[" + items + "][unit_id]");
	clone.querySelector("[data-product]").setAttribute("name", "details[" + items + "][txtProduct]");
	clone.querySelector("[data-cantidad]").setAttribute("name", "details[" + items + "][quantity]");
	clone.querySelector("[data-precio]").setAttribute("name", "details[" + items + "][price]");
	clone.querySelector("[data-cost]").setAttribute("name", "details[" + items + "][cost]");
	clone.querySelector("[data-isdeleted]").setAttribute("name", "details[" + items + "][is_deleted]");
	if (items>0) {$("input[name='details["+(items-1)+"][txtProduct]']").attr('disabled', true);};
	
	items = parseInt(items) + 1;
	$('#items').val(items);
	$("#tableItems").append(clone);
	el = document.getElementById("tableItems").lastElementChild.querySelector("[data-product]");
	if (data != '') {
		setRowProduct(el, data);
	}

	$("input[name='details["+(items-1)+"][txtProduct]']").focus();
}
function isDesignEnabled (myElement, product_id) {
	var b = true
	$('#tableItems tr .productId').each(function (index, d) {
		if ($(d).val() == product_id) {
			alert("Este producto ya fue registrado");
			setTimeout(function(){
				$(d).parent().find('.isdeleted').attr('checked', false);
				$(d).parent().find('.txtCantidad').focus();
			}, 300);
			b = false;
		};
	});
	return b;
}