function checked_position(){
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			myObj = JSON.parse(this.responseText);
			//document.getElementById("demo").innerHTML = myObj.position;
			var position = myObj.position
			switch(position){
			case "HR SUPERVISOR":
				document.getElementById('adminControls').style.display = 'block';
				break;
			case "IT SUPERVISOR":
				document.getElementById('adminControls').style.display = 'block';
				break;
			default :
				document.getElementById('adminControls').style.display = 'none';
			}
		}
	};
	xmlhttp.open("GET", "json.php", true);
	xmlhttp.send();
}






//HR REPRESENTATIVE
//HR SUPERVISOR
//SALES REPRESENTATIVE
//SALES SUPERVISOR
//ACCOUNTING REPRESENTATIVE
//ACCOUNTING SUPERVISOR
//IT PERSONNEL
//IT SUPERVISOR
//TECHNICIAN
//OPERATION REPRESENTATIVE
//OPERATION SUPERVISOR
//DRIVER