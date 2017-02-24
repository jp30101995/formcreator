<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Form Builder</title>
    <!-- jquery and jquery ui -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="requiredjs.js"></script>
    <script src="config.js"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  <hr>
<?php
require_once 'connection.php';
require_once 'Disp.php';
$disp = new Disp($conn);
?>

  <div class="container">
	  <div class="row">
		  <!-- form left panel -->
		  <div class="col-md-4">
		  	<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
			  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
			  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
			</ul>

			<div class="tab-content">
			  <div id="home" class="tab-pane fade in active">
			  		<br>
			  		<ul id="available">
			  			<?php echo $disp->available(); ?>	
			  		<ul>
			  </div>
			  <div id="menu1" class="tab-pane fade">
			    <button class="btn btn-default" onclick="formCreator()">Click me</button>
			    <!-- selected form field elements -->
			  </div>
			  <div id="menu2" class="tab-pane fade">
			    <!-- form style elements-->
			  </div>
			</div>
			
		  </div>
		  <!-- form right panel -->
		  <div class="col-md-7 col-md-offset-1">
			<ul class="nav nav-tabs">
			  <li class="active"><a data-toggle="tab" href="#Mhome">Home</a></li>
			  <li><a data-toggle="tab" href="#Mmenu1">Menu 1</a></li>
			  <li><a data-toggle="tab" href="#Mmenu2">Menu 2</a></li>
			</ul>

			<div class="tab-content">
			  <div id="Mhome" class="tab-pane fade in active">
			  	<br>
			  		<div class="dynamicElement" id="selected">
			  			
			  		</div>
			  		<br>
			  		<button class="btn btn-success" onclick="submitForm()">Submit</button>
			  		<p id="txtHint"></p>
			  </div>
			  <div id="Mmenu1" class="tab-pane fade">
			    <h3>Menu 1</h3>
			    <p>Some content in menu 1.</p>
			  </div>
			  <div id="Mmenu2" onclick="checkingForm()" class="tab-pane fade">
			    <h3>Menu 2</h3>
			    <p>Some content in menu 2.</p>
			  </div>
			</div>
		  </div>
	  </div>
  </div>
<script>
var count =0;
function checkingForm(){
	var formArr = document.getElementById("formField").value;
	document.getElementById("Mmenu2").innerHTML = formArr;
}
function myFunction(id) {
	count++;
	counter(count,id);
	if(id==1)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Text Box</li>");
	if(id==2)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Text</li>");
	if(id==3)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Checkbox</li>");
	if(id==4)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Radio Button</li>");
	if(id==5)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Date</li>");
	if(id==6)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Number</li>");
	if(id==7)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>URL</li>");
	if(id==8)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Upload</li>");
	if(id==9)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>List</li>");
	if(id==10)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Password</li>");
	if(id==11)
    $("#selected").append("<li id="+count+" onclick='formCreator("+id+","+count+")' class='btn btn-default btn-block'>Email</li>");
}


//not used
function addElementField(id){
	//alert("You entered p1!");
$("#item_1").click(function(){
    $("#menu1").load("demoText.html");
});
	<?php 
		//$arr = $disp->menu1();
		$div = "<label for='Title'>Title</label>
		<input type='email' class='form-control' id='Title'>
		
		<label for='required'>Required</label>
		<input type='checkbox' class='form-control' id='required'>
		
		<label for='instruction'>Instruction</label>
		<textarea name='textarea' id='textarea'>
		</textarea> 
		
		<label for='placeholder'>Place Holder</label>
		<input type='text' class='form-control' id='placeholder'>

		<label for='prepend'>Prepend</label>
		<input type='text' class='form-control' id='prepend'>

		<label for='append'>Append</label>
		<input type='text' class='form-control' id='append'>";

	?>
	document.getElementById("menu1").innerHTML = "<form action='formEntry.php?id="+id+"' method='post'><label for='Title'>Title</label><input type='text' class='form-control' name='title'><label for='required'>Required</label><input type='checkbox' class='form-control' name='required'><label for='instruction'>Instruction</label><textarea name='instruction'></textarea><label for='placeholder'>Place Holder</label><input type='text' class='form-control' name='placeholder'><label for='prepend'>Prepend</label><input type='text' class='form-control' name='prepend'><label for='append'>Append</label><input type='text' class='form-control' name='append'><input type='submit' value='Submit'></form>";
}


//$(document).ready(function(){
/*		$('#selected').sortable({
			connectwith: '#available',
		});
		$('#available').sortable({
			connectwith: '#selected',
		});
*/
/*
var asd = $("#selected");
$(asd).sortable();
var data = $(asd).sortable('serialize');
//				var datatosend = $(this).sortable("serialize");
				$.ajax({
					type: "GET",
					dataType: "JSON",
					url: "reorder.ajax.php",
					data: data
				});
*/

//});

</script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
   </body>
</html>