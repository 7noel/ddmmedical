$(document).ready(function(){
	
	$('.btnAddProduct').click(function(e){
		renderTemplateRowProduct();
	});
	$("#table-products").on('change', 'input[data-profit_margin], input[data-last_purchase], input[data-stock_initial]', function(e){
		var p = $(this).parent().parent();
		var margin = parseFloat(p.find('[data-profit_margin]').val());
		var costo = parseFloat(p.find('[data-last_purchase]').val());
		var stock = parseInt(p.find('[data-stock_initial]').val());
		//console.log(stock);
		if (isNaN(margin)) {p.find('[data-profit_margin]').val("");};
		if (isNaN(costo)) {p.find('[data-last_purchase]').val("");};
		if (isNaN(stock)) {p.find('[data-stock_initial]').val("");} else {p.find('[data-stock_initial]').val(stock)};
		if (margin > 0 && costo > 0) {
			p.find('[data-price]').html((100+margin)*costo/100);
		} else {
			p.find('[data-price]').html("");
		};
	});
});

function activateTemplate (id) {
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}

function renderTemplateRowProduct () {
	var clone = activateTemplate("#template-row-product");
	var items = $('#items').val();
	clone.querySelector("[data-size_id]").setAttribute("name", "products[" + items + "][size_id]");
	clone.querySelector("[data-color_id]").setAttribute("name", "products[" + items + "][color_id]");
	clone.querySelector("[data-material_id]").setAttribute("name", "products[" + items + "][material_id]");
	clone.querySelector("[data-stock_initial]").setAttribute("name", "products[" + items + "][stock_initial]");
	clone.querySelector("[data-last_purchase]").setAttribute("name", "products[" + items + "][last_purchase]");
	clone.querySelector("[data-profit_margin]").setAttribute("name", "products[" + items + "][profit_margin]");
	clone.querySelector("[data-description]").setAttribute("name", "products[" + items + "][description]");
	items = parseInt(items) + 1;
	$('#items').val(items);
	$("#table-products").append(clone);
}