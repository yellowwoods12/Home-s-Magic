
function validate(){
	var reg_name = /^[A-Z][a-z]*$/;
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob_no = /^[0-9]{10}$/;

	if(document.application.fname.value=="")
		{alert("First Name cant be empty");}
	else if(!document.application.fname.value.match(reg_name))
		{alert("Invalid First name");}

	else if(document.application.father_name_personal.value=="")
		{alert("Father's Name cant be empty");}
	else if(!document.application.father_name_personal.value.match(reg_name))
		{alert("Invalid Middle name");}

	else if(document.application.lname.value=="")
		{alert("Last Name cant be empty");}
	else if(!document.application.lname.value.match(reg_name))
		{alert("Invalid Last name");}

	else if(document.application.DOB.value=="")
		{alert("DOB cant be blank");}

else if(!(document.getElementById('male').checked) && !(document.getElementById('female').checked))
		{alert("please select gender");}

	else if(document.application.address.value=="")
		{alert("Address cant be blank");}

	else if(document.application.email.value=="")
		{alert("Email address cant be blank");}
	else if(!document.application.email.value.match(reg_mail))
		{alert("Invalid email id");}

	else if(document.application.mobile.value=="")
		{alert("mobile no cant be empty");}
	else if(!document.application.mobile.value.match(mob_no))
		{alert("invalid number");}

	else if(document.application.bank_name.value=="")
		{alert("Bank Name cant be blank");}
	
	else if(document.application.card_no.value=="")
		{alert("Card No cant be empty");}

	else if(document.application.cvv.value=="")
		{alert("CVV cant be empty");}
		
	else
{
	alert("Payment successful");
	window.open('success.php');

}
	
}
