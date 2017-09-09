function paymentMethod(){
	var document_type = document.getElementById('payment_method').value;
	alert(document_type);
}
function findAccountDetails(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			var responseArray = xmlhttp.responseText.split("||");
			document.getElementById("company_name").value = responseArray[0];
			document.getElementById("account_name").value = responseArray[1];
			document.getElementById("account_number").value = responseArray[2];
		}
	}
	
	xmlhttp.open('GET', 'payments_details.php?payment_method='+document.payments_details_form.payment_method.value,true);
	xmlhttp.send();
}

function admin_food_cat_edit_find_position(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			document.getElementById('admin_foodcat_edit_position').value =  xmlhttp.responseText;
		}
	}
	
	xmlhttp.open('GET', 'admin_foodcat_edit_position.php?category_id='+document.admin_foodcat_edit_form.admin_foodcat_edit_cat_name.value,true);
	xmlhttp.send();
}

function admin_food_edit_find_details(){
	if (window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
	}
	
	xmlhttp.onreadystatechange = function(){
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200){
			//document.getElementById('food_price').value =  xmlhttp.responseText;
			var responseArray = xmlhttp.responseText.split("||");
			
			document.getElementById("food_category").value = responseArray[0];
			document.getElementById("food_price").value = responseArray[1];
			document.getElementById("food_remarks").value = responseArray[2];
			document.getElementById("food_image_path").value = responseArray[3];
			document.getElementById("food_visible").value = responseArray[4];
		}
	}
	
	xmlhttp.open('GET', 'admin_foodedit_script.php?food_id='+document.admin_food_edit_form.food_name.value,true);
	xmlhttp.send();
}

function admin_payments_confirm_values(){
	document.getElementById('pay_code').value = this.options[this.selectedIndex].text;
}
/* $document.ready(function (){
	$('#admin_foodcat_edit_cat_name').onchange(function (){
		var 
		
	});
});
 */
$(document).ready(function (){
	var totalAmount = 0;
	$("input[type='checkbox']").click(function (){
		if ($(this).prop("checked") == true){
			$('#customer_orders td').each(function() {
				var text = $(this).eq(0).text();
				alert(text);
			});
			
			// $('#customer_orders tr').each(function() {
				// $('td:first-child').each(function(){
					// totalAmount = totalAmount + $(this).html;
					// alert(totalAmount);
				// });
			// });
		}
		else if($(this).prop("checked") == false){
			alert("Checkbox unchecked!");
		}
	});
});