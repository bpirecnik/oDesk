var search;
var taskName;
var taskDesc;
var taskDate;
var taskCreator;
var countU;
var countS;
var numOfRows;
var edit = document.getElementById('currTaskU');
var editS = document.getElementById('currTaskS');
var div = document.getElementById('userTasks');
var content = false;
var modal = document.getElementById('popup');
var btn = document.getElementById("openPop");
var span = document.getElementsByClassName("close")[0];

//Showing the first task and setting everything up
function firstShow() {
	numOfRows = document.getElementById("tableUT").rows.length;
	if(numOfRows > 0){
		content = true;
		search = 'row' + numOfRows;
		
		var row = document.getElementById(search);
		
		taskName = row.getElementsByClassName('cell1')[0].innerHTML;
		taskDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		taskDate = row.getElementsByClassName('cell3')[0].innerHTML;
		
		document.getElementById('cTaskU').innerHTML = "/" + numOfRows;
		
		document.getElementById('currTaskU').innerHTML = numOfRows;
		
		document.getElementById('nameOfTaskU').innerHTML = taskName;
		document.getElementById('descriptionOfTaskU').innerHTML = taskDesc;
		document.getElementById('dateOfTaskU').innerHTML = taskDate;
	}
	//-------------------------------------------------------------------------
	numOfRows = document.getElementById("tableST").rows.length;
	if(numOfRows > 0){
		content = true;
		search = 'Srow' + numOfRows;
		
		row = document.getElementById(search);
		
		taskName = row.getElementsByClassName('cell1')[0].innerHTML;
		taskDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		taskDate = row.getElementsByClassName('cell3')[0].innerHTML;
		taskCreator = row.getElementsByClassName('cell4')[0].innerHTML;
		
		document.getElementById('cTaskS').innerHTML = "/" + numOfRows;
		
		document.getElementById('currTaskS').innerHTML = numOfRows;
		
		document.getElementById('nameOfTaskS').innerHTML = taskName;
		document.getElementById('creatorOfTaskS').innerHTML = taskCreator;
		document.getElementById('descriptionOfTaskS').innerHTML = taskDesc;
		document.getElementById('dateOfTaskS').innerHTML = taskDate;
	}
	
	//Adds the event to the DIV userTasks to fire when arrows are clicked
	var activeU = document.getElementById('userTasks');
	activeU.onkeyup=arrowChangeU;
	
	var activeS = document.getElementById('sharedTasks');
	activeS.onkeyup=arrowChangeS;
}
//______________________________________________________________________

//Functions for next task and previous task --> changing one at a time
function nextTask(sender) {
	if(sender == "arrowRightUser"){
		numOfRows = document.getElementById("tableUT").rows.length;
		if(countU < numOfRows){
			countU++;
			search = 'row' + countU;
			row = document.getElementById(search);
			changeTask("user");
		}else{
			countU = 1;
			search = 'row' + countU;
			row = document.getElementById(search);
			changeTask("user");
		}
	}else if(sender == "arrowRightShared"){
		numOfRows = document.getElementById("tableST").rows.length;
		if(countS < numOfRows){
			countS++;
			search = 'Srow' + countS;
			row = document.getElementById(search);
			changeTask("shared");
		}else{
			countS = 1;
			search = 'Srow' + countS;
			row = document.getElementById(search);
			changeTask("shared");
		}
	}
}
function previousTask(sender) {
	if(sender == "arrowLeftUser"){
		numOfRows = document.getElementById("tableUT").rows.length;
		if(countU > 1){
			countU--;
			search = 'row' + countU;
			row = document.getElementById(search);
			changeTask("user");
		}else{
			countU = numOfRows;
			search = 'row' + countU;
			row = document.getElementById(search);
			changeTask("user");
		}
	}else if(sender == "arrowLeftShared"){
		numOfRows = document.getElementById("tableST").rows.length;
		if(countS > 1){
			countS--;
			search = 'Srow' + countS;
			row = document.getElementById(search);
			changeTask("shared");
		}else{
			countS = numOfRows;
			search = 'Srow' + countS;
			row = document.getElementById(search);
			changeTask("shared");
		}
	}
}
//______________________________________________________________________

function changeTask(field) {
	edit.contentEditable = false;
	editS.contentEditable = false;
	if(field=="user"){			
		taskName = row.getElementsByClassName('cell1')[0].innerHTML;
		taskDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		taskDate = row.getElementsByClassName('cell3')[0].innerHTML;
		
		edit.innerHTML = countU;
		document.getElementById('cTaskU').innerHTML = "/" + numOfRows;
		document.getElementById('nameOfTaskU').innerHTML = taskName;
		document.getElementById('descriptionOfTaskU').innerHTML = taskDesc;
		document.getElementById('dateOfTaskU').innerHTML = taskDate;
	}else if (field == "shared"){
		taskName = row.getElementsByClassName('cell1')[0].innerHTML;
		taskDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		taskDate = row.getElementsByClassName('cell3')[0].innerHTML;
		taskCreator = row.getElementsByClassName('cell4')[0].innerHTML;
		
		editS.innerHTML = countS;
		document.getElementById('cTaskS').innerHTML = "/" + numOfRows;
		document.getElementById('nameOfTaskS').innerHTML = taskName;
		document.getElementById('descriptionOfTaskS').innerHTML = taskDesc;
		document.getElementById('dateOfTaskS').innerHTML = taskDate;
		document.getElementById('creatorOfTaskS').innerHTML = taskCreator;
	}
}

//______________________________________________________________________

//Changes the task based on which arrow is clicked
function arrowChangeU(event){
	var key = 0;
	if(event && editing == false){
		key = event.keyCode;
		if (key == 39) {
			nextTask("arrowRightUser");
		}else if(key == 37){
			previousTask("arrowLeftUser");
		}
	}
}

function arrowChangeS(event){
	var key = 0;
	if(event && editingS == false){
		key = event.keyCode;
		if (key == 39) {
			nextTask("arrowRightShared");
		}else if(key == 37){
			previousTask("arrowLeftShared");
		}
	}
}
//_______________________________________________________________________
