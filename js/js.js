function reload(){
		window.location='login.php';
	}


function deleteContact(id){
	var r = confirm("Are you sure, Buddy?");
	if (r == true) {
    	document.location = '../controller/delete.php?line='+id;
	} else {
    	alert("You have cancelled deleting!")
	}
}

function showDiv(id) {   
   	document.getElementById('view').style.display = "block"; 
   	load_content(id);

}
function kharna() {
	document.getElementById('view').style.display = "none"; 
}

function load_content(id){
      var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200) {
		   		document.getElementById("view").innerHTML=xmlhttp.responseText;

		    }
		 }
		xmlhttp.open("GET","view/person.tmp.php?id="+id); //I think here is probably the fault
		xmlhttp.send();
		
 }
