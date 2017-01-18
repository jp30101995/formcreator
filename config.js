var lastClicked = 12;
var arrcount = [];
//numbre of time add pressed
var choicecount =1;
//add field button check
var newchoicecounter =1 ;

//array for title, instruction, required, 
var arrtitle = ["jimmy","jaimin","nirri","mislo"];
var arrInstruction = [];
var arrRequired = [];
var arrChoice = [[]];

//counters
var titleCounter = 0;
var instructionCounter = 0;
var requiredCounter = 0;

//checking form array
var formArr;

function counter(count,id){
arrcount[count] = id;
count++;
//    document.getElementById("menu1").innerHTML = arrcount;

}

function submitForm(str)
{
  var tp = "jaimin";
//create http request
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
    document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
xmlhttp.open("GET","getsth.php?arrTitle="+arrtitle+"&count="+count+"&arrCount="+arrcount+"&arrInstruction="+arrInstruction,true);
xmlhttp.send();
}

function addCheckbox(id){
	choicecount++;
	newchoicecounter++;
	if(newchoicecounter==1){
		var btn = document.getElementById("addchoicebtn");
		btn.parentNode.removeChild(btn);
	}


    var choice1T = document.createElement("INPUT");
    choice1T.setAttribute("type", "text");
    choice1T.setAttribute("class", "form-control");
    choice1T.setAttribute("id", "choice_"+choicecount);
	var mydiv = document.getElementById("menu1");
    mydiv.appendChild(choice1T);
    var brTag = document.createElement("br");
    mydiv.appendChild(brTag);

    var choicePlus = document.createElement("button");
    choicePlus.setAttribute("type", "button");
    choicePlus.setAttribute("value","add");
    choicePlus.setAttribute("id","choice_add_"+choicecount);
    choicePlus.setAttribute("onclick","addCheckbox()");
    choicePlus.textContent = "Add";
    choicePlus.setAttribute("class", "btn xsmall btn-success");
    mydiv.appendChild(choicePlus);

    var space = document.createElement("p");

    space.textContent = " ";
    mydiv.appendChild(space);

    var choiceMinus = document.createElement("button");
    choiceMinus.setAttribute("type", "button");
    choiceMinus.setAttribute("value","minus");
    choiceMinus.setAttribute("id","choice_remove_"+choicecount);
    choiceMinus.setAttribute("onclick","removeCheckbox("+choicecount+")");
    choiceMinus.textContent = "Remove";
    choiceMinus.setAttribute("class", "btn xsmall btn-danger");
    mydiv.appendChild(choiceMinus);

}
function removeCheckbox(id){
	newchoicecounter--;
	if(newchoicecounter==0){
		var mydiv = document.getElementById("menu1");
		var addchoicebtn = document.createElement("button");
		addchoicebtn.setAttribute("id","addchoicebtn");
		addchoicebtn.setAttribute("class","form-control");
		addchoicebtn.setAttribute("onclick", "addCheckbox()")
		addchoicebtn.textContent = "+ Add Choice";
		mydiv.appendChild(addchoicebtn);
	}
	//var form = document.getElementById("formField");
	var element = document.getElementById("choice_"+id);
	var addbtn = document.getElementById("choice_add_"+id);
	var rmvbtn = document.getElementById("choice_remove_"+id);
	element.parentNode.removeChild(element);
	addbtn.parentNode.removeChild(addbtn);
	rmvbtn.parentNode.removeChild(rmvbtn);
	
}

//save title in array
function saveTitle(index,id){
	var i=id;
	arrtitle[index] = document.getElementById("title_"+i).value;
}
//save instu in array
function saveInst(index){
	var i=index;
	arrInstruction[index] = document.getElementById("instruction_"+i).value;
}
//nirri's duty










function formCreator(id,index){
//reset elements
//arrcount[count] = id;
//count++;

    document.getElementById("menu1").innerHTML = "";

//form element
    var x = document.createElement("FORM");
    x.setAttribute("id", "formField");
    x.setAttribute("method", "POST");
    x.setAttribute("action", "formEntry.php");
    document.getElementById("menu1").appendChild(x);

    var brTag = document.createElement("br");


//other form elements
//common elements

	var title = document.createElement("label");
    title.textContent = "Title :";
    x.appendChild(title);

    titleCounter++;
    var y = document.createElement("INPUT");
    y.setAttribute("type", "text");
    y.setAttribute("value",arrtitle[index]);    //add for value retrieval
    y.textContent = arrtitle[index];    //added finally
    y.setAttribute("onchange","saveTitle("+index+","+index+")"); //add finally
    y.setAttribute("id","title_"+index);
    y.setAttribute("class","form-control");
    //y.setAttribute("value", "");
    x.appendChild(y);
 

	var required = document.createElement("label");
    required.textContent = "Required :";
    x.appendChild(required);

	var checkbox = document.createElement("INPUT");
    checkbox.textContent = "Required : ";
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("value", "required");
//    checkbox.setAttribute("class","form-control");
 
    //z.setAttribute("value", arrcount[4]);
    x.appendChild(checkbox);

	x.appendChild(brTag); 
	var instruction = document.createElement("label");
    instruction.textContent = "Instruction :";
    x.appendChild(instruction);

	var textarea = document.createElement("TEXTAREA");
    //z.setAttribute("type", "");
    textarea.setAttribute("id","instruction_"+index);
    textarea.setAttribute("class","form-control");
    textarea.setAttribute("value",arrInstruction[index]);
    textarea.setAttribute("onchange","saveInst("+index+")")
    textarea.textContent = arrInstruction[index];
    //z.setAttribute("value", arrcount[4]);
    x.appendChild(textarea);

    var Lplaceholder = document.createElement("label");
    Lplaceholder.textContent = "Placeholder : ";
    x.appendChild(Lplaceholder);

    var Tplaceholder = document.createElement("INPUT");
    Tplaceholder.setAttribute("type", "text");
    Tplaceholder.setAttribute("class", "form-control");
    x.appendChild(Tplaceholder);


if(id==1 ||id ==7||id==6){
    var prepend = document.createElement("label");
    prepend.textContent = "Prepend : ";
    x.appendChild(prepend);

    var Tprepend = document.createElement("INPUT");
    Tprepend.setAttribute("type", "text");
    Tprepend.setAttribute("class", "form-control");
    x.appendChild(Tprepend);


    var append = document.createElement("label");
    append.textContent = "Append : ";
    x.appendChild(append);

    var Tappend = document.createElement("INPUT");
    Tappend.setAttribute("type", "text");
    Tappend.setAttribute("class", "form-control");
    x.appendChild(Tappend);

}
if(id==3 ||id==4){
    var choice = document.createElement("label");
    choice.textContent = "Choice : ";
    x.appendChild(choice);

    var choice1T = document.createElement("INPUT");
    choice1T.setAttribute("type", "text");
    choice1T.setAttribute("class", "form-control");
    choice1T.setAttribute("value",arrChoice[index]);
    choice1T.textContent = arrChoice[index];
    choice1T.setAttribute("onchange","saveChoice()");
    choice1T.setAttribute("id","choice_1");
    x.appendChild(choice1T);
 	x.appendChild(brTag);

    var extdiv = document.createElement("div");
    extdiv.setAttribute("id", "extdiv");
    x.appendChild(extdiv);

    var choicePlus = document.createElement("button");
    choicePlus.setAttribute("type", "button");
    choicePlus.setAttribute("value","add");
    choicePlus.setAttribute("id","choice_add_1");
    choicePlus.setAttribute("onclick","addCheckbox("+choicecount+")");
    choicePlus.textContent = "Add";
    choicePlus.setAttribute("class", "btn xsmall btn-success");
    x.appendChild(choicePlus);

    var space = document.createElement("p");

    space.textContent = " ";
    x.appendChild(space);

    var choiceMinus = document.createElement("button");
    choiceMinus.setAttribute("type", "button");
    choiceMinus.setAttribute("value","minus");
    choiceMinus.setAttribute("id","choice_remove_1");
    choiceMinus.setAttribute("onclick", "removeCheckbox(1)");
    choiceMinus.textContent = "Remove";
    choiceMinus.setAttribute("class", "btn xsmall btn-danger");
    x.appendChild(choiceMinus);

}


//checkbox elements

//radio elements



}
//getValues methods for various parameters
