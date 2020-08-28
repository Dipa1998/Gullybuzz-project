/*Registration validation*/
function validate(){
	var name          = document.getElementById("name").value.trim();
	var phone         = document.getElementById("phone").value.trim();
	var email         = document.getElementById("email").value.trim();
	var password      = document.getElementById("password").value.trim();
	var cnfm_password = document.getElementById("cnfm_password").value.trim();

	var passcheck  	=/^([A-Z][a-z]{3,12}[0-9]{1,5}[!@#$%^&*]?)$/;
	var namecheck	=/^[A-Za-z ]{3,}$/;
	var phonecheck	=/^([6-9][0-9]{9})$/;
	var mailcheck	=/^\w+([\.-]?\w+)@\w+([\.-]?\w+)(\.\w{2,3})+$/;

	if(namecheck.test(name)){
			document.getElementById('username').innerHTML=" ";
		}else{
			document.getElementById('username').innerHTML=
			"**Name is Invalid";
			return false;
		}
		if(phonecheck.test(phone)){
			document.getElementById('userphone').innerHTML=" ";
		}else{
			document.getElementById('userphone').innerHTML=
			"**Phone is Invalid";
			return false;
		}
		if(mailcheck.test(email)){
			document.getElementById('useremail').innerHTML=" ";
		}else{
			document.getElementById('useremail').innerHTML=
			"**Email is Invalid";
			return false;
		}
		if(passcheck.test(password)){
			document.getElementById('userpassword').innerHTML=" ";
		}else{
			document.getElementById('userpassword').innerHTML=
			" **Password is Invalid";
			return false;
		}
		if(cnfm_password.match(password)){
			document.getElementById('cnformpassword').innerHTML=" ";
		}else{
			document.getElementById('cnformpassword').innerHTML=
			" **Your password not matched";
			return false;
		
	}
}