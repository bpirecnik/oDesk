var search;
var proName;
var proDesc;
var proDStart;
var proDEnd;
var proPrice;
var count;
var numOfRows;

//Showing the first task and setting everything up
function firstShow() {
	numOfRows = document.getElementById("tableProjects").rows.length;
        
	if(numOfRows > 0){
		search = 'row' + numOfRows;
		
		var row = document.getElementById(search);
		
		proName = row.getElementsByClassName('cell1')[0].innerHTML;
		proDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		proDStart = row.getElementsByClassName('cell3')[0].innerHTML;
		proDEnd = row.getElementsByClassName('cell4')[0].innerHTML;
		proPrice = row.getElementsByClassName('cell5')[0].innerHTML;
		
		document.getElementById('cProject').innerHTML = "/" + numOfRows;
		document.getElementById('currProject').innerHTML = numOfRows;
		
		document.getElementById('title').innerHTML = proName;
		document.getElementById('price').innerHTML = proPrice + " €";
		document.getElementById('start').innerHTML = "Started: " + proDStart;
		document.getElementById('end').innerHTML = "Ended: " + proDEnd;
		document.getElementById('desc').innerHTML = proDesc;
	}
	//-------------------------------------------------------------------------
	
	//Adds the event to the DIV userTasks to fire when arrows are clicked
	var activeP = document.getElementById('tableProjects');
	activeP.onkeyup=arrowChangeU;
}
//______________________________________________________________________

//Functions for next task and previous task --> changing one at a time
function nextTask(sender) {
	if(sender == "arrowRightUser"){
		numOfRows = document.getElementById("tableProjects").rows.length;
		if(count < numOfRows){
			count++;
			search = 'row' + count;
			row = document.getElementById(search);
			changeTask("user");
		}else{
			count = 1;
			search = 'row' + count;
			row = document.getElementById(search);
			changeTask("user");
		}
	}
}
function previousTask(sender) {
	if(sender == "arrowLeftUser"){
		numOfRows = document.getElementById("tableProjects").rows.length;
		if(count > 1){
			count--;
			search = 'row' + count;
			row = document.getElementById(search);
			changeTask("user");
		}else{
			count = numOfRows;
			search = 'row' + count;
			row = document.getElementById(search);
			changeTask("user");
		}
	}
}
//______________________________________________________________________

function changeTask(field) {
	if(field=="user"){			
		taskName = row.getElementsByClassName('cell1')[0].innerHTML;
		taskDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		taskDate = row.getElementsByClassName('cell3')[0].innerHTML;
		
		edit.innerHTML = countU;
		document.getElementById('cTaskU').innerHTML = "/" + numOfRows;
		document.getElementById('nameOfTaskU').innerHTML = taskName;
		document.getElementById('descriptionOfTaskU').innerHTML = taskDesc;
		document.getElementById('dateOfTaskU').innerHTML = taskDate;
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
//_______________________________________________________________________
