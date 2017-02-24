<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,user-scalable=no,initial-scale=1,maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="theme-color" content="#4C7FF0">
    <title>Form generator dashboard</title>
    <link rel="stylesheet" href="styles/app.min.css">



        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 
    <!-- Bootstrap -->
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"-->
    <script src="config.js"></script>

    <!-- files for madal -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://w3schools.com/lib/w3.css">

    


</head>

<body onload="foo()">
<?php
require_once 'connection.php';
require_once 'Disp.php';
$disp = new Disp($conn);
?>


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



</script>











<script>
var form_id_for_builder =0 ;
function foo() {
    // body...
 var param1var = getQueryVariable("formid");
 
    function getQueryVariable(variable) {
      var query = window.location.search.substring(1);
      var vars = query.split("&");
      for (var i=0;i<vars.length;i++) {
        var pair = vars[i].split("=");
        if (pair[0] == variable) {
            if(!isNaN(pair[1])){
                var builder = document.getElementById('userRowLast');
                form_id_for_builder = pair[1];
                builder.style.display = 'block';    
            }
          //alert('param is '+pair[1]);
          //return pair[1];
        }
      } 
    }
}

function submitFormAtr(str)
{
  var tp = "jaimin";
  var formname,desc,conntab,fontname,fontsize,subbtntxt;
  formname = document.getElementById("formname").value;
  desc= document.getElementById("desc").value;
  conntab = document.getElementById("conntab").value;
  fontname = document.getElementById("font").value;
  fontsize = document.getElementById("fsize").value;
  subbtntxt = document.getElementById("btntext").value;


      
   // alert("please select form name first");
    //alert("please select form name first"+formname);
        if(formname == '')    
            alert("please enter form name");
        if(desc == '')    
            alert("please enter form description");
        if(conntab == '')    
            alert("please enter connected table");
        if(fontname == '')
            fontname = "Times New Roman";
        if(fontsize == '')
            fontsize = 18;
        if(subbtntxt == '')
            subbtntxt = "Submit";
            
    
    if(formname != '' && desc != '' && conntab!= ''){
        alert("Form structure successfully created.");
        //$('#myModal').modal('dismiss');
        //var div = document.getElementById("myModal").modal = 'hide';
        
        if (window.XMLHttpRequest)
          {// code for IE7+, Firefox, Chrome, Opera, Safari
          xmlhttp=new XMLHttpRequest();
          }
        else
          {// code for IE6, IE5
          xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }

        //create call to php
        xmlhttp.onreadystatechange=function()
          {
          if (this.readyState==4 && this.status==200)
            {
            var formID = this.responseText;
            window.location="http://localhost/Formcreator/adminDashBoard.php?formid="+formID;
        
            }
          }
        xmlhttp.open("GET","makeFormSchemaEntry.php?formname="+formname+"&desc="+desc+"&conntab="+conntab+"&fontname="+fontname+"&fontsize="+fontsize+"&subbtntxt="+subbtntxt,true);
        xmlhttp.send();


    }

    

  //kvnfvndfjnv
//create http request
}
</script>



<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter Form Attributes</h4>
      </div>
      <div class="modal-body">
        <form class="w3-containe">
          <p>
          <label>Form Name</label>
          <input id="formname" class="w3-input form-control" type="text" required="true"/></p>
          <p>
          <label>Connected Table</label>
          <input id="conntab" class="w3-input" type="text" required/></p>
          <p>
          <label>Description</label>
          <input id="desc" class="w3-input" type="text" required/></p>
          <p>
        <label>Font</label>
         <select id="font" class="form-control" required>
          <option value="Time New Roman">Times New Roman</option>
          <option value="Calibri">Calibri</option>
          <option value="Calibri Light">Calibri Light</option>
          <option value="Verdana">Verdana</option>
          <option value="WildWest">WildWest</option>
        </select>
        </p>
        <p>
          <label>Font Size</label>
          <input id="fsize" class="w3-input" type="number" required></p>
        </p>    
        <p>
          <label>Submit Button Text</label>
          <input id="btntext" class="w3-input" type="text" required></p>
        </p>    
        <p>
          <!--button type="button" class="btn btn-default" onclick="submitFormAtr()">Submit</button-->
        </p> 
        </form>




      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-default" onclick="submitFormAtr()">Submit</button>
      </div>
    </div>

  </div>
</div>


    <div class="app">
        <div class="off-canvas-overlay" data-toggle="sidebar"></div>
        <div class="sidebar-panel">
            <div class="brand"> <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen hidden-lg-up"><i class="material-icons">menu</i> </a>
                <a class="brand-logo"><h2><b>Form</b>creator</h2> </a>
            </div>
            <div class="nav-profile dropdown">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <div class="user-image"><img src="images/avatar.jpg" class="avatar img-circle" alt="user" title="user"></div>
                    <div class="user-info expanding-hidden">Disha Patani <small class="bold">Administrator</small></div>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="javascript:;">UserID</a>
                    <a class="dropdown-item" href="javascript:;">Email</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Change Password</a>
                    <a class="dropdown-item" href="#">Logout</a>
                </div>
            </div>
            <nav>
                <p class="nav-title">NAVIGATION</p>
                <ul class="nav">
                    <li><a href="#"><i class="material-icons text-primary">home</i> <span>Home</span></a></li>
                    <li><a href="javascript:;"><span class="menu-caret"><i class="material-icons">arrow_drop_down</i> </span><i class="material-icons">line_weight</i><span>Forms</span></a>
                        <ul class="sub-menu">
                            <li><a><span><div id="showFormBuilder" data-toggle="modal" data-target="#myModal">Create new</div></span></a></li>
                            <li><a><span><div id="delFormBuilder" onclick="">Open Existing</div></span></a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav">
                    <li><a href="javascript:;"><span class="menu-caret"><i class="material-icons">arrow_drop_down</i> </span><i class="material-icons">local_library</i> <span>Active Users</span></a>
                        <ul class="sub-menu">
                            <li><a href="map-google.html"><span>User 1</span></a></li>
                            <li><a href="map-googlefull.html"><span>User 2</span></a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="main-panel">
            <nav class="header navbar">
                <div class="header-inner">
                    <div class="navbar-item navbar-spacer-right brand hidden-lg-up"> <a href="javascript:;" data-toggle="sidebar" class="toggle-offscreen"><i class="material-icons">menu</i> </a>
                        <a class="brand-logo hidden-xs-down"><img src="images/logo_white.png" alt="logo"> </a>
                    </div><a class="navbar-item navbar-spacer-right navbar-heading hidden-md-down" href="#"><span>Dashboard</span></a>
                    <div class="navbar-item nav navbar-nav">
                        <div class="nav-item nav-link dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"><span>Logout</span></a>
                        </div>
                        <!--a href="javascript:;" class="nav-item nav-link nav-link-icon" data-toggle="modal" data-target=".chat-panel" data-backdrop="false"><i class="material-icons">chat_bubble</i></a-->
                    </div>
                </div>
            </nav>
            <div class="main-content">
                <div id="mainDivToDisplay" class="content-view">
                    <h4>Users</h4>
                    <br>
                    <div id="userRow" class="row">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-success" style="width: 16px">arrow_drop_up</i> <span style="line-height: 24px">+76%</span> </span><span>804</span></h5>
                                <div class="small text-overflow text-muted">Memory usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>05:35 AM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right tag bg-success p-y-0 p-x-xs" style="line-height: 24px"><span>+20K</span> </span><span>403</span></h5>
                                <div class="small text-overflow text-muted">Disk usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>12:42 PM</span></div>
                            </div>
                        </div>
                    </div>
                    <h4>Forms</h4>
                    <br>
                    <div id="formRow" class="row">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-success" style="width: 16px">arrow_drop_up</i> <span style="line-height: 24px">+76%</span> </span><span>804</span></h5>
                                <div class="small text-overflow text-muted">Memory usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>05:35 AM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right tag bg-success p-y-0 p-x-xs" style="line-height: 24px"><span>+20K</span> </span><span>403</span></h5>
                                <div class="small text-overflow text-muted">Disk usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>12:42 PM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-danger" style="width: 16px">arrow_drop_down</i> <span style="line-height: 24px">+40%</span> </span><span>976</span></h5>
                                <div class="small text-overflow text-muted">GPU compute</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>09:26 AM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-success" style="width: 16px">arrow_drop_up</i> <span style="line-height: 24px">+94%</span> </span><span>457</span></h5>
                                <div class="small text-overflow text-muted">CPU usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>06:45 AM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-danger" style="width: 16px">arrow_drop_down</i> <span style="line-height: 24px">+04%</span> </span><span>239</span></h5>
                                <div class="small text-overflow text-muted">Ram usage</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>11:23 PM</span></div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <div class="card card-block">
                                <h5 class="m-b-0 v-align-middle text-overflow"><span class="small pull-xs-right"><i class="material-icons text-success" style="width: 16px">arrow_drop_up</i> <span style="line-height: 24px">+67%</span> </span><span>392</span></h5>
                                <div class="small text-overflow text-muted">RAM test</div>
                                <div class="small text-overflow">Updated:&nbsp;<span>08:52 AM</span></div>
                            </div>
                        </div>
                    </div>
                    <div style="display: none" id="userRowLast">
                        <div class="container">
                            <div class="row">
                                <!-- form left panel -->
                                <div class="col-md-4">
                                    <ul class="nav-mine nav-tabs-mine">
                                            <li><a data-toggle="tab" href="#home"><h4>Fields</h4></a></li>
                                            <li><a data-toggle="tab" href="#menu1"><h7>Field Details</h7></a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="home" class="tab-pane fade in active">
                                            <br>
                                            <ul id="available">
                                                <?php echo $disp->available(); ?>
                                                    <ul>
                                        </div>
                                        <div id="menu1" class="tab-pane fade">
                                            <h5>Oops! Select an element first.</h5>
                                            <!-- selected form field elements -->
                                        </div>
                                        <div id="menu2" class="tab-pane fade">
                                            <!-- form style elements-->
                                        </div>
                                    </div>

                                </div>
                                <!-- form right panel -->
                                <div class="col-md-7 col-md-offset-1">
                                <br>
                                <br>
                                <br>

                                    <div class="tab-content">
                                        <div id="Mhome" class="tab-pane fade in active">
                                            <br>
                                            <div class="dynamicElement" id="selected">

                                            </div>
                                            <br>
                                            <button class="btn btn-success" onclick="submitForm(form_id_for_builder)">Submit</button>
                                            <button class="btn btn-success">Generate code</button>
                                            
                                            <p id="txtHint"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="content-footer">
                    <nav class="footer-left">
                        <ul class="nav">
                            <li><a href="javascript:;"><span>Copyright</span> &copy; 2016 MNJ Developers Pvt Ltd</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

    </div>
    <script src="scripts/app.min.js"></script>
    <!--script src="scripts/dashboard/dashboard.js"></script-->





    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>










</body>
<!-- Mirrored from milestone.nyasha.me/latest/html/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 11 Feb 2017 08:08:50 GMT -->

</html>