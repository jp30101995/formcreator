var lastClicked = 12;
var arrcount = [];
//numbre of time add pressed
var choicecount =1;
//add field button check
var newchoicecounter = new Array(20).fill(1) ;

//array for title, instruction, required, 
var arrtitle = new Array(20).fill("Undefined");
var arrInstruction = new Array(20).fill("Undefined");
var arrRequired = new Array(20).fill("true");
var arrPlaceholder = new Array(20).fill("Undefined");
var arrPrepend = new Array(20).fill("Undefined");
var arrAppend = new Array(20).fill("Undefined");


//for checkbox...
var split = "";
var strId = "";
var cid = 0;
var cindex = 0;


var arrChoice = [];
for(var i=0;i<20;i++)
    arrChoice[i] = [];
/*
for(var i=0;i<20;i++){
    for(var j=0;j<20;j++)
        arrChoice[i][j] = "null";
}*/
var arrCountForChoice = new Array(20).fill(1); 


//for radio...



//counters
var titleCounter = 0;
var instructionCounter = 0;
var requiredCounter = 0;
var placeholderCounter = 0;
var prependCounter = 0;
var appendCounter = 0;
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
  //kvnfvndfjnv
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
        top.location = "http://localhost/Formcreator/GenerateForm.php?form_id="+str;
    //document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
xmlhttp.open("GET","getsth.php?form_id="+str+"&arrTitle="+arrtitle+"&count="+count+"&arrCount="+arrcount+"&arrInstruction="+arrInstruction+"&arrRequired="+arrRequired+"&arrPlaceholder="+arrPlaceholder+"&arrPrepend="+arrPrepend+"&arrAppend="+arrAppend+"&arrChoice="+arrChoice,true);
xmlhttp.send();
}

function addCheckbox(id,index){
	choicecount++;
    arrCountForChoice[index]++;

	newchoicecounter[index]++;
	if(newchoicecounter==1){
		var btn = document.getElementById("addchoicebtn");
		btn.parentNode.removeChild(btn);
	}


    var choice1T = document.createElement("INPUT");
    choice1T.setAttribute("type", "text");
    choice1T.setAttribute("class", "form-control");
    choice1T.setAttribute("id", "choice_"+arrCountForChoice[index]+"_"+index);
	choice1T.setAttribute("onchange","saveChoice(choice_"+arrCountForChoice[index]+"_"+index+","+arrCountForChoice[index]+","+index+")");
    var mydiv = document.getElementById("menu1");
    mydiv.appendChild(choice1T);
    var brTag = document.createElement("br");
    mydiv.appendChild(brTag);
    

    var choicePlus = document.createElement("button");
    choicePlus.setAttribute("type", "button");
    choicePlus.setAttribute("value","add");
    choicePlus.setAttribute("id","choice_add_"+arrCountForChoice[index]+"_"+index);
    choicePlus.setAttribute("onclick","addCheckbox("+arrCountForChoice[index]+","+index+")");
    choicePlus.textContent = "Add";
    choicePlus.setAttribute("class", "btn xsmall btn-success");
    mydiv.appendChild(choicePlus);

    var space = document.createElement("p");

    space.textContent = " ";
    mydiv.appendChild(space);

    var choiceMinus = document.createElement("button");
    choiceMinus.setAttribute("type", "button");
    choiceMinus.setAttribute("value","minus");
    choiceMinus.setAttribute("id","choice_remove_"+arrCountForChoice[index]+"_"+index);
    choiceMinus.setAttribute("onclick","removeCheckbox("+arrCountForChoice[index]+","+index+")");
    choiceMinus.textContent = "Remove";
    choiceMinus.setAttribute("class", "btn xsmall btn-danger");
    mydiv.appendChild(choiceMinus);

}
function removeCheckbox(id,index){
	newchoicecounter[index]--;
	if(newchoicecounter[index]==0){
		var mydiv = document.getElementById("menu1");
		var addchoicebtn = document.createElement("button");
		addchoicebtn.setAttribute("id","addchoicebtn");
		addchoicebtn.setAttribute("class","form-control");
		addchoicebtn.setAttribute("onclick", "addCheckbox("+arrCountForChoice[index]+","+index+")")
		addchoicebtn.textContent = "+ Add Choice";
		mydiv.appendChild(addchoicebtn);
	}
	//var form = document.getElementById("formField");
	var element = document.getElementById("choice_"+id+"_"+index);
	var addbtn = document.getElementById("choice_add_"+id+"_"+index);
	var rmvbtn = document.getElementById("choice_remove_"+id+"_"+index);
	element.parentNode.removeChild(element);
	addbtn.parentNode.removeChild(addbtn);
	rmvbtn.parentNode.removeChild(rmvbtn);
	arrChoice[index][id] = null;
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
//save instu in array
function saveReq(index){
    var i=index;
    arrRequired[index] = document.getElementById("required_"+i).checked;
}
//save instu in array
function savePlaceHolder(index){
    var i=index;
    arrPlaceholder[index] = document.getElementById("placeholder_"+i).value;
}
//save prepend in array
function savePrepend(index){
    var i=index;
    arrPrepend[index] = document.getElementById("prepend_"+i).value;
}
//save append in array
function saveAppend(index){
    var i=index;
    arrAppend[index] = document.getElementById("append_"+i).value;
}
//save choice
function saveChoice(cvalue,id,index){
    strId = cvalue.value;
    cid = id;
    cindex = index;
    arrChoice[index][id] = strId+"_"+index+"_"+id;
    

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


    var val = false;
    if(arrRequired[index]){
        val = true;
    }
	var checkbox = document.createElement("INPUT");
    checkbox.setAttribute("type", "checkbox");
    checkbox.setAttribute("id","required_"+index);
    if(val){
        checkbox.setAttribute("checked","checked");
    }
    checkbox.setAttribute("onchange","saveReq("+index+")"); //add finally
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


    var TPplaceholder = document.createElement("INPUT");
    TPplaceholder.setAttribute("type", "text");
    TPplaceholder.setAttribute("value", arrPlaceholder[index]);
    TPplaceholder.textContent = arrPlaceholder[index];
    TPplaceholder.setAttribute("class", "form-control");
    TPplaceholder.setAttribute("onchange","savePlaceHolder("+index+")"); //add finally
    TPplaceholder.setAttribute("id","placeholder_"+index);
    x.appendChild(TPplaceholder);


if(id==1 ||id ==7||id==6){
    var prepend = document.createElement("label");
    prepend.textContent = "Prepend : ";
    x.appendChild(prepend);

    var Tprepend = document.createElement("INPUT");
    Tprepend.setAttribute("type", "text");
    Tprepend.setAttribute("value", arrPrepend[index]);
    Tprepend.textContent = arrPrepend[index];
    Tprepend.setAttribute("class", "form-control");
    Tprepend.setAttribute("onchange","savePrepend("+index+")"); //add finally
    Tprepend.setAttribute("id","prepend_"+index);
    x.appendChild(Tprepend);


    var append = document.createElement("label");
    append.textContent = "Append : ";
    x.appendChild(append);

    var Tappend = document.createElement("INPUT");
    Tappend.setAttribute("type", "text");
    Tappend.setAttribute("value", arrAppend[index]);
    Tappend.textContent = arrAppend[index];
    Tappend.setAttribute("class", "form-control");
    Tappend.setAttribute("onchange","saveAppend("+index+")"); //add finally
    Tappend.setAttribute("id","append_"+index);
    x.appendChild(Tappend);

}
if(id==3 ||id==4){
    var choice = document.createElement("label");
    choice.textContent = "Choice : ";
    x.appendChild(choice);

    for(var i=1;i<=arrCountForChoice[index];i++){
        var choice1T = document.createElement("INPUT");
        choice1T.setAttribute("type", "text");
        choice1T.setAttribute("class", "form-control");
        if(arrChoice[index][i] != null){
            var arrSliced = arrChoice[index][i].slice(0,-4);
        }
        choice1T.setAttribute("value",arrSliced);
        choice1T.textContent = arrSliced;
        choice1T.setAttribute("onchange","saveChoice(choice_"+i+"_"+index+","+i+","+index+")");
        choice1T.setAttribute("id","choice_"+i+"_"+index);
        x.appendChild(choice1T);
     	x.appendChild(brTag);

        var extdiv = document.createElement("div");
        extdiv.setAttribute("id", "extdiv");
        x.appendChild(extdiv);

        var choicePlus = document.createElement("button");
        choicePlus.setAttribute("type", "button");
        choicePlus.setAttribute("value","add");
        choicePlus.setAttribute("id","choice_add_"+i+"_"+index);
        choicePlus.setAttribute("onclick","addCheckbox("+i+","+index+")");
        choicePlus.textContent = "Add";
        choicePlus.setAttribute("class", "btn xsmall btn-success");
        x.appendChild(choicePlus);

        var space = document.createElement("p");

        space.textContent = " ";
        x.appendChild(space);

        var choiceMinus = document.createElement("button");
        choiceMinus.setAttribute("type", "button");
        choiceMinus.setAttribute("value","minus");
        choiceMinus.setAttribute("id","choice_remove_"+i+"_"+index);
        choiceMinus.setAttribute("onclick", "removeCheckbox("+i+","+index+")");
        choiceMinus.textContent = "Remove";
        choiceMinus.setAttribute("class", "btn xsmall btn-danger");
        x.appendChild(choiceMinus);
    }
}


//checkbox elements

//radio elements



}
//getValues methods for various parameters
