function register_details(){
	var reg_name = /^[A-Z][a-z]*$/;
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob_no = /^[0-9]{10}$/;
	var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mail = $("#mail").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var pwd = $('#pwd').val();
	var cpwd = $('#cpwd').val();

	if(fname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>First name cant be empty</b></p>');
		$("#fname").focus();
	}

	else if(lname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Last name cant be empty</b></p>');
		$("#lname").focus();
	} 

	else if(mail=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	} 

	else if(phone=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Mobile no. cant be empty</b></p>');
		$("#phone").focus();
	} 

	else if(!phone.match(mob_no))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid mobile number</b></p>');
		$("#phone").focus();
	}

	else if(address=="")
	{
		$("#address").html('<p class="alert alert-warning" role="alert"><b>Address cant be empty</b></p>');
		$("#address").focus();
	}

	else if(pwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Password cant be empty</b></p>');
		$("#pwd").focus();
	}

	else if(cpwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter confirm password</b></p>');
		$("#cpwd").focus();
	}


	else if(pwd != cpwd)
	{
		$("#status").html('<p class="alert alert-danger" role="alert"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<b>Passwords dont match</b></p>');
		$("#cpwd").focus();
	} 
	else
	{
		var dataString = 'fname='+ fname + '&lname=' + lname + '&mail=' + mail + '&phone=' + phone + '&address=' + address + '&pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "insert.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#status").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Loading...Please Wait</p>")
			},
			success:function(msg){
				var response = String(msg);
				if(response=="Insertion Successful")
				{
					$("#status").html("<p class='alert alert-success' role='alert'>" + msg + "</p>")
				}
				else
				{
					$("#status").html("<p class='alert alert-warning' role='alert'>" + msg + "</p>")
				}	
			}
		}
		);
	}
}

function login()
{
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mail = $("#login_email").val();
	var pwd = $('#login_pwd').val();

	if(mail=="")
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#loginStatus").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	}

	else
	{
		var response;
		var dataString = 'login_email='+ mail + '&login_pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "login.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#loginStatus").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Verifying.....</p>")
			},
			success:function(msg){
				response = String(msg);
				if(response=="You have successfully logged in")
				{
				$("#loginStatus").html("<p class='alert alert-success' role='alert'>" + msg + "</p>");
				location.reload();
				}

				else
				{
					$("#loginStatus").html("<p class='alert alert-danger' role='alert'>" + msg + "</p>");
				}

			}
		}
		);
	} 
}

function register_restaurant()
{
	var reg_name = /^[A-Z][a-z]*$/;
	var reg_mail = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
	var mob_no = /^[0-9]{10}$/;
	var rest_name = $('#rest_sign_name').val();
	var rest_addr = $('#rest_sign_address').val();
	var rest_local = $('#rest_sign_local').val();
	var rest_phone = $('#rest_sign_phone').val();
	var rest_email = $('#rest_sign_email').val();
	var rest_pwd = $('#rest_sign_pwd').val();
	var rest_cpwd = $('#rest_sign_cpwd').val();
	var checked_items ="";
	var temp;
	var result = $('input[type="checkbox"]:checked');
	result.each(function(){
		temp = $(this).val();
		if(!(String(temp)==""))
			checked_items = checked_items + String(temp) + " ";
	});
	if(rest_name == "")
	{
		$("#rest_sign_stat").html("<p style='color:red;font-weight:bold;'>* Restaurant name is mandatory</p>");
		$('#rest_sign_name').focus();
	}
	else if(checked_items == "")
	{
		$("#rest_sign_stat").html("<p style='color:red;font-weight:bold;'>* Please select at least one speciality</p>");
	}
	/*var fname = $("#fname").val();
	var lname = $("#lname").val();
	var mail = $("#mail").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var pwd = $('#pwd').val();
	var cpwd = $('#cpwd').val();

	if(fname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>First name cant be empty</b></p>');
		$("#fname").focus();
	}

	else if(lname=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Last name cant be empty</b></p>');
		$("#lname").focus();
	} 

	else if(mail=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Email id cant be empty</b></p>');
		$("#mail").focus();
	} 

	else if(!mail.match(reg_mail))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid email id</b></p>');
		$("#mail").focus();
	} 

	else if(phone=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Mobile no. cant be empty</b></p>');
		$("#phone").focus();
	} 

	else if(!phone.match(mob_no))
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter valid mobile number</b></p>');
		$("#phone").focus();
	}

	else if(address=="")
	{
		$("#address").html('<p class="alert alert-warning" role="alert"><b>Address cant be empty</b></p>');
		$("#address").focus();
	}

	else if(pwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Password cant be empty</b></p>');
		$("#pwd").focus();
	}

	else if(cpwd=="")
	{
		$("#status").html('<p class="alert alert-warning" role="alert"><b>Enter confirm password</b></p>');
		$("#cpwd").focus();
	}


	else if(pwd != cpwd)
	{
		$("#status").html('<p class="alert alert-danger" role="alert"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;<b>Passwords dont match</b></p>');
		$("#cpwd").focus();
	} 
	else
	{
		var dataString = 'fname='+ fname + '&lname=' + lname + '&mail=' + mail + '&phone=' + phone + '&address=' + address + '&pwd=' + pwd;
		$.ajax(
		{
			type: "post",
			url: "insert.php",
			data: dataString,
			cache:false,
			beforeSend:function()
			{
				$("#status").html("<p><i class='fa fa-spinner' aria-hidden='true'></i>Loading...Please Wait</p>")
			},
			success:function(msg){
				var response = String(msg);
				if(response=="Insertion Successful")
				{
					$("#status").html("<p class='alert alert-success' role='alert'>" + msg + "</p>")
				}
				else
				{
					$("#status").html("<p class='alert alert-warning' role='alert'>" + msg + "</p>")
				}	
			}
		}
		);
	}*/

}



function logout()
 {
        $.ajax(
        {
          url:"logout.php",
          success:function(msg)
          {
            var response = String(msg);
            if(response=='successful')
            {
              location.reload();
            }
          }

        }
        );
 } 




