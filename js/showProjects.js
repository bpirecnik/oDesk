var search;
var proName;
var proDesc;
var proDStart;
var proDEnd;
var proPrice;
var proSkill;
var proEmployer;
var count;
var numOfRows;
var edit = document.getElementById('currProject');

//Showing the first task and setting everything up
function firstShow() {
	numOfRows = document.getElementById("tableProjects").rows.length;
        
	if(numOfRows > 0){
		search = 'row' + numOfRows;
		
		var row = document.getElementsByClassName(search)[0];
		
		proName = row.getElementsByClassName('cell1')[0].innerHTML;
		proDesc = row.getElementsByClassName('cell2')[0].innerHTML;
		proDStart = row.getElementsByClassName('cell3')[0].innerHTML;
		proDEnd = row.getElementsByClassName('cell4')[0].innerHTML;
		proPrice = row.getElementsByClassName('cell5')[0].innerHTML;
		proSkill = row.getElementsByClassName('cell6')[0].innerHTML;
		
		document.getElementById('cProject').innerHTML = "/" + numOfRows;
		document.getElementById('currProject').innerHTML = numOfRows;
		
		document.getElementById('title').innerHTML = proName;
		document.getElementById('price').innerHTML = proPrice + " €";
		document.getElementById('start').innerHTML = "Started: " + proDStart;
		document.getElementById('end').innerHTML = "Ended: " + proDEnd;
		document.getElementById('desc').innerHTML = proDesc;
		document.getElementById('skill').innerHTML = "Worked with " + proSkill;
	}
	//-------------------------------------------------------------------------
	
	//Adds the event to the DIV userTasks to fire when arrows are clicked
	var activeP = document.getElementById('project_table');
	activeP.onkeyup = arrowChangeU;
}
//______________________________________________________________________

//Functions for next task and previous task --> changing one at a time
function nextTask(sender) {
	if(sender == "arrowRightUser"){
		numOfRows = document.getElementById("project_table").rows.length/2;
		if(count < numOfRows){
			count++;
			search = 'row' + count;
			row = document.getElementsByClassName(search)[0];
		}else{
			count = 1;
			search = 'row' + count;
			row = document.getElementsByClassName(search)[0];
		}
                changeProject();
	}
}
function previousTask(sender) {
	if(sender == "arrowLeftUser"){
		numOfRows = document.getElementById("tableProjects").rows.length;
		if(count > 1){
			count--;
			search = 'row' + count;
			row = document.getElementsByClassName(search)[0];
		}else{
			count = numOfRows;
			search = 'row' + count;
			row = document.getElementsByClassName(search)[0];
		}
                changeProject();
	}
}
//______________________________________________________________________

function changeProject() {
    proName = row.getElementsByClassName('cell1')[0].innerHTML;
    proDesc = row.getElementsByClassName('cell2')[0].innerHTML;
    proDStart = row.getElementsByClassName('cell3')[0].innerHTML;
    proDEnd = row.getElementsByClassName('cell4')[0].innerHTML;
    proPrice = row.getElementsByClassName('cell5')[0].innerHTML;
    proSkill = row.getElementsByClassName('cell6')[0].innerHTML;
    
    edit.innerHTML = count;

    document.getElementById('title').innerHTML = proName;
    document.getElementById('price').innerHTML = proPrice + " €";
    document.getElementById('start').innerHTML = "Started: " + proDStart;
    document.getElementById('end').innerHTML = "Ended: " + proDEnd;
    document.getElementById('desc').innerHTML = proDesc;
    document.getElementById('skill').innerHTML = "Worked with " + proSkill;
}

//______________________________________________________________________

//Changes the task based on which arrow is clicked
function arrowChangeU(event){
    var key = 0;
    key = event.keyCode;
    if (key == 39) {
            nextTask("arrowRightUser");
    }else if(key == 37){
            previousTask("arrowLeftUser");
    }
}
//_______________________________________________________________________
