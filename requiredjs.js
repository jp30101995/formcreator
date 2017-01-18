$(document).ready(function(){

		$('#selected').sortable({
			axis:'y',
			update: function(){
				var datatosend = $(this).sortable("serialize");
				$.ajax({
					type: "GET",
					dataType: "JSON",
					url: "reorder.ajax.php",
					data: datatosend
				});
				//alert("ajax called");
			}
		});

	    $("#item_1").click(function(){
	        $("#menu1").load("demoText.html");
    	});

});