<?php
	if(isset($_GET['id']))
	{
		$content =  file_get_contents("http://localhost/Personel_manengment/App/controller/User/Personal/findById.php?id=".$_GET['id']);
		$user = json_decode($content); //on a converti le contenu json vers un tableau associaive
	}
?>
<div class="content-page">
	<div class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xl-12">
					<div class="card-box">
						<div class="dropdown float-right">
							<a href="#" class="dropdown-toggle arrow-none card-drop" data-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right">
								<a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>
						<h4 class="header-title mt-0 mb-3">
							Add New Personal
						</h4>
						<form method="post" action="../App/controller/ajoutpersonnel.php" >
							<input type="text" id="id" name="id" value="<?php echo $user->id ?>" hidden />
							<div class="form-group">
								<label for="first_name">First name</label>
								<input type="text" value="<?php echo $user->first_name  ?>" name="first_name" parsley-trigger="change" required
                                                   placeholder="Enter first name" class="form-control" id="first_name" />
                            </div>
							<div class="form-group">
								<label for="lastname">Last Name</label>
                                    <input type="text" value="<?php echo $user->last_name  ?>" name="last_name" parsley-trigger="change" required
                                                   placeholder="Enter last name" class="form-control" id="last_name" />
                            </div>
							<div class="form-group">
                                <label for="cin">CIN</label>
                                <input type="text" value="<?php echo $user->cin  ?>" name="cin" parsley-trigger="change" required
                                    placeholder="Enter CIN" class="form-control" id="cin" />
                            </div>
							<div class="form-group">
                                <label for="emailAddress">Email address</label>
                                <input type="email" value="<?php echo $user->email  ?>" name="email" parsley-trigger="change" required
                                                   placeholder="Enter email" class="form-control" id="email" />
                            </div>
							<div class="form-group">
								<label for="login">Login</label>
                                <input id="login" value="<?php echo $user->login  ?>" type="login" placeholder="Enter login" required
                                    class="form-control" name="login" />
                            </div>
							<div class="form-group text-right mb-0">
                                <button class="btn btn-primary waves-effect waves-light mr-1" id="btSubmit" type="submit">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                    Cancel
                                </button>
                            </div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="assets/js/vendor.min.js"></script>
<script src="assets/libs/jquery-knob/jquery.knob.min.js"></script>
<script src="assets/libs/morris-js/morris.min.js"></script>
<script src="assets/libs/raphael/raphael.min.js"></script>
<script src="assets/js/pages/dashboard.init.js"></script>
<script src="assets/js/app.min.js"></script>
<script>
	function IsEmail(email)
    {
    	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(String(email).toLowerCase());
    }
	
	function updatePersonal(id,first_name, last_name, email, cin, login)
	{
		$.ajax
                (
                    {
                        async: false, //if you want to change a global variable you should add this instruction
                        type: 'POST',
                        url: "../App/controller/User/Personal/update.php",
                        data:
                        {
							'id' : id,
                            'first_name' : first_name,
							'last_name' : last_name,
							'email' : email,
							'cin' : cin,
							'login' : login,
                        },
                        success: 
                        function(result)
                        {
							json = JSON.parse(result);
							if(json.code == 0)
							{
								alertify.error(json.response);
								e.preventDefault();
							}
							else
							{
								alertify.success(json.response);
								e.preventDefault();
							}
                        }
                    }
                );
	}
	
	$(document).ready
		(
			function()
			{
				$("#btSubmit").click
				(
					function(e)
					{
						var id = $("#id").val();
						var first_name = $('#first_name').val();
						var last_name = $('#last_name').val();
						var cin = $('#cin').val();
						var email = $('#email').val();
						var login = $('#login').val();
						var password = $('#password').val();
						var confirm_password = $('#confirm_password').val();
						if(first_name === "")
						{
							$("#first_name").focus();
							alertify.error('You Should enter the first name of the personal');
							e.preventDefault();  
						}
						else
						{
							if(last_name === "")
							{
								$("#last_name").focus();
								alertify.error('You Should enter the last name of the the personal');
								e.preventDefault();  
							}
							else
							{
								if(cin === "")
								{
									$("#cin").focus();
									alertify.error('You Should enter the cin of the personal');
									e.preventDefault();  
								}
								else
								{
									if(email === "")
									{
										$("#email").focus();
										alertify.error('You Should enter the email personal');
										e.preventDefault();  
									}
									else
									{
										if(login === "")
										{
											$("#login").focus();
											alertify.error('You Should enter the login of the personal');
											e.preventDefault();  
										}
										else
										{
											if(password === "")
											{
												$("#password").focus();
												alertify.error('You Should enter the password');
												e.preventDefault();  
											}
											else
											{
												if(confirm_password === "")
												{
													$("#first_name").focus();
													alertify.error('You Should confirm this password');
													e.preventDefault();  
												}
												else
												{
													if(IsEmail(email) == false)
													{
														$("#email").focus();
														alertify.error('You Should enter an email format');
														e.preventDefault();
													}
													else
													{
														if(password != confirm_password)
														{
															$("#confirm_password").focus();
															alertify.error('Please verif the password');
															e.preventDefault();	
														}
														else
														{
															updatePersonal(id,first_name, last_name, email, cin, login);
														}
													}
												}
											}
										}
									}
								}
							}
						}
						e.preventDefault();
					}
				);
			}
		);
</script>