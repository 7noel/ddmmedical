$(document).ready(function(){
	//carga almacenes
	$('#btnNewStock').click(function() {
		renderTemplateRowStock();
		loadWarehouses();
	});
	/*$('#btnSaveStock').click(function() {
		loadStock();
	});*/

});


function activateTemplate (id) {
	var t = document.querySelector(id);
	return document.importNode(t.content, true);
}

function renderTemplateRowStock () {
	var clone = activateTemplate("#template-row-stock");
	var items = $('#items').val();
	clone.querySelector("[data-warehouse]").setAttribute("name", "details[" + items + "][warehouse_id]");
	if (items>0) {$("input[name='details["+(items-1)+"][txtDesign]']").attr('disabled', true);};
	
	$("#tbodyStocks").append(clone);
	items = parseInt(items) + 1;
	$('#items').val(items);
}

/*cargar almacenes*/
function loadWarehouses(){
	$('#stockini').val('');
	var page = "/listWarehouses";
	var destroy = false;
	$.get(page, function(data){
		$('#listWarehouses').empty();
		$('#listWarehouses').append("<option value=''> </option>");
		console.log(data);
		$.each(data, function (index, Obj) {
			$('#listWarehouses').append("<option value='"+Obj.id+"'>"+Obj.id+"</option>");
			$("#tableStocks tr").find('td:eq(0)').each(function () {
				destroy = false;
				codigo = $(this).html();
				if(codigo==Obj.id){
					destroy = true;
				}
				if (destroy === true) { $("#listWarehouses option[value='"+Obj.id+"']").remove(); }
			});
		});
		
	});
}

function loadStock () {
	var warehouse = $('#listWarehouses').val();
	var stock = parseFloat($('#stockini').val());
	var items = parseFloat($('#items').val());
	if (warehouse !== "") {
		$('#tableStocks').append("<tr><td>"+warehouse+"</td><td>"+stock+"</td><td><a href='#' class='btn-delete-stock btn btn-danger btn-xs'>Eliminar</a><input type='hidden' name='stocks["+items+"][warehouse_id]' value='"+warehouse+"'><input type='hidden' name='stocks["+items+"][stock]' value='"+stock+"'><input type='hidden' name='stocks["+items+"][id]' value=''></td><tr>");
		items = 1+items;
		$('#items').val(items);
	}
}