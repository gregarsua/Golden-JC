function addRow() {
	$("#addRowBtn").button("loading");

	var tableLength = $("#productTable tbody tr").length;

	var tableRow;
	var arrayNumber;
	var count;

	if(tableLength > 0) {	
		tableRow = $("#productTable tbody tr:last").attr('id');
		arrayNumber = $("#productTable tbody tr:last").attr('class');
		count = tableRow.substring(3);
		count = Number(count) + 1;
		arrayNumber = Number(arrayNumber) + 1;			
	} else {
		// no table row
		count = 1;
		arrayNumber = 0;
	}

	$.ajax({
		url: 'php_action/fetchProductData.php',
		type: 'post',
		dataType: 'json',
		success:function(response) {
			$("#addRowBtn").button("reset");			

			var tr = '<tr id="row'+count+'" class="'+arrayNumber+'">'+			  				
                '<td>'+
                    '<div class="form-group">'+
                        '<input type="text" name="name" style="width:50px;" autocomplete="off" class="form-control input-sm" value="" id="name'+count+'" required>'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<input type="text" name="number" style="width:50px;" autocomplete="off" class="form-control input-sm" value="" id="#'+count+'" required>'
                    '</div>'+
					'<div class="form-group">'+
					'<select class="form-control" name="productname[]" id="productname'+count+'" onchange="getProductData('+count+')" >'+
						'<option value="">~~SELECT~~</option>';
						// console.log(response);
						$.each(response, function(index, value) {
							tr += '<option value="'+value[0]+'">'+value[1]+'</option>';							
						});
													
					tr += '</select>'+
					'</div>'+
				'</td>'+
				'<td">'+
					'<input type="text" name="rate[]" id="rate'+count+'" autocomplete="off" disabled="true" class="form-control" />'+
					'<input type="hidden" name="rateValue[]" id="rateValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td">'+
				'<td>'+
					//'<div class="form-group">'+
					'<input type="number" name="off[]" id="off'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control"/>'+
					//'</div>'+
				'</td>'+
				'<td>'+
					'<div class="form-group">'+
					'<input type="number" name="quantity[]" id="quantity'+count+'" onkeyup="getTotal('+count+')" autocomplete="off" class="form-control" min="1" />'+
					'</div>'+
				'</td>'+
				'<td>'+
					'<input type="text" name="total[]" id="total'+count+'" autocomplete="off" class="form-control" disabled="true" />'+
					'<input type="hidden" name="totalValue[]" id="totalValue'+count+'" autocomplete="off" class="form-control" />'+
				'</td>'+
				'<td>'+
					'<button class="btn btn-default removeProductRowBtn" type="button" onclick="removeProductRow('+count+')"><i class="glyphicon glyphicon-trash"></i></button>'+
				'</td>'+
			'</tr>';
			if(tableLength > 0) {							
				$("#productTable tbody tr:last").after(tr);
			} else {				
				$("#productTable tbody").append(tr);
			}		

		} // /success
	});	// get the product data

}