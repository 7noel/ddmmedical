var addAccessory = false;
$(document).ready(function(){
	if ($('#with_tax').val() == 1) {
		$('.withTax').show();
		$('.withoutTax').hide();
	} else {
		$('.withTax').hide();
		$('.withoutTax').show();
	}

	$('#with_tax').change(function(){
		$('.withTax').toggle();
		$('.withoutTax').toggle();
	})

	$('#txtCompany').autocomplete({
		source: "/api/companies/autocompleteAjax/",
		minLength: 4,
		select: function(event, ui){
			$('#company_id').val(ui.item.id);
			$('#lstSeller').focus();
		}
	});

//autocomplete para elementos agregados por javascript
	$(document).on('focus','.txtProduct', function (e) {
		//console.log($(this));
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
	$(document).on('change','.txtCantidad, .txtPrecio, .txtValue, .txtDscto', function (e) {
		calcTotalItem(this);
		calcTotalOrder();
	});
	$(document).on('click','.select-accessory a', function (e) {
		e.preventDefault();
		window.addAccessory = true;
		accessoryId = this.getAttribute('data-accessoryId');
		page = "/api/products/getById/" + accessoryId;
		$.get(page, function(data){
			addRowProduct(data);
			window.addAccessory = false;
		});
	});

	$('#btnAddProduct').click(function(e){
		addRowProduct();
	});
});

function setRowProduct($this, $p) {
	//console.log($this)
	if(isDesignEnabled($this, $p.id)){
		$($this).parent().parent().find('.productId').val($p.id);
		$($this).parent().parent().find('.txtProduct').val($p.name);
		$($this).parent().parent().find('.unitId').val($p.unit_id);
		$($this).parent().parent().find('.txtPrecio').val($p.value);
		$($this).parent().parent().find('.txtValue').val(($p.value*1.18).toFixed(2));
		$($this).parent().parent().find('.intern_code').text($p.intern_code);
		$($this).parent().parent().find('.txtCantidad').focus();
	}
	$ul = $($this).parent().parent().find('.select-accessory');
	$ul.empty();
	$.each($p.accessories, function (index, $a) {
		renderTemplateLiAccessory($ul, $a.accessory);
	});
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
	if ($('#with_tax').val() == 1){
		$('.withTax').show();
		$('.withoutTax').hide();
	} else {
		$('.withTax').hide();
		$('.withoutTax').show();
	}
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
	value = validateItem(myElement,'.txtValue');
	dscto = validateItem(myElement,'.txtDscto');
	if ($(myElement).hasClass('txtPrecio')) {
		$(myElement).parent().parent().find('.txtValue').val( (precio/1.18).toFixed(2) )
		value = validateItem(myElement,'.txtValue');
	} else if($(myElement).hasClass('txtValue')) {
		$(myElement).parent().parent().find('.txtPrecio').val( (value*1.18).toFixed(2) )
		precio = validateItem(myElement,'.txtPrecio');
	}
	D = Math.round(cantidad * value * dscto) / 100;
	total = Math.round((cantidad*value-D)*100)/100;
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
		v = parseFloat($(vtr).find('.txtValue').val());
		d = parseFloat($(vtr).find('.txtDscto').val());
		gross_value = Math.round(q*v*100)/100 + gross_value;
		discount = Math.round(q*v*d)/100 + discount;
	});
	subtotal = gross_value - discount;
	total = Math.round(subtotal * (100 + 18))/100;


	$('#mGrossValue').text(gross_value.toFixed(2));
	$('#mDiscount').text(discount.toFixed(2));
	$('#mSubTotal').text(subtotal.toFixed(2));
	$('#mTotal').text(total.toFixed(2));
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
	clone.querySelector("[data-dscto]").setAttribute("name", "details[" + items + "][discount]");
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
function renderTemplateLiAccessory ($ul, $a) {
	var clone = activateTemplate("#template-li-accessory");
	clone.querySelector("[data-accessoryId]").setAttribute("data-accessoryId", $a.id);
	clone.querySelector("[data-accessoryId]").textContent = $a.intern_code + " | " + $a.name;
	$($ul).append(clone);
}
function isDesignEnabled (myElement, product_id) {
	var b = true
	$('#tableItems tr .productId').each(function (index, d) {
		if ($(d).val() == product_id) {
			alert("Este producto ya fue registrado");
			setTimeout(function(){ 
				if (window.addAccessory == true) {$(myElement).parent().parent().find('.txtProduct').val('');}
				$(d).parent().find('.isdeleted').attr('checked', false);
				$(d).parent().find('.txtCantidad').focus();
			}, 300);
			b = false;
		};
	});
	return b;
}