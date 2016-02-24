<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>dg </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?=base_url();?>plugins/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
       	<link href="<?=base_url();?>plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
       	<link href="<?=base_url();?>plugins/sky-forms/sky-forms.css" rel="stylesheet" type="text/css" />
       <link rel="stylesheet" href="<?=base_url();?>plugins/sky-forms/version-2.0.1/css/custom-sky-forms.css">
     
        <!--[if lt IE 9]>
			<link rel="stylesheet" href="<?=base_url();?>plugins/sky-forms/css/sky-forms-ie8.css">
		<![endif]-->
        <!-- Theme style -->
        <link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" />

        <!--[if lt IE 9]>
          <script src="<?=base_url();?>plugins/misc/html5shiv.js"></script>
          <script src="<?=base_url();?>plugins/misc/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
       <?php $this->load->view('includes/header');?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('includes/left');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
               
	                         <section class="content-header clearfix">
			                   <form class="sky-form" method="get" action="#">
			                    <section  class="col-md-6 col-xs-6">
							
									<label class="select">
									<select name="Search_category" id="Search_category">
									<option value="">--Select Category--</option>
										<?php foreach($deal_categories as $cItems):?>
										<option value="<?=$cItems['CATEGORY_ID']?>"><?=$cItems['CATEGORY_NAME']?></option>
										<?php endforeach;?>
									</select>
										<i></i>
									</label>
							
								</section>
								<section  class="col-md-6 col-xs-6">
							
									<label class="select">
									<select name="Search_City" id="Search_City">
									<option value="">--Select City--</option>
										
									</select>
										<i></i>
									</label>
							
								</section>
			                       
			                    </form>
			                </section>
			              
                <!-- Main content -->
                <section class="content">

                    <!-- row -->
                    <div class="row">                        
                        <div class="col-md-8"> 
                        <div class="box"> 
				<!--h1 class="main_title entry-title"><span>SIGN IN OR <span class="color-green">CREATE A NEW ACCOUNT</span></span></h1-->
				
				<form name="reg-form" class="sky-form" id="reg-form" method="post" action="<?=base_url();?>user/register">
					 <header>Register</header>
					<?php echo @$msg; ?>

					  <fieldset>
							<section>
								<div class="row">
									<label class="label col col-4">Name :</label>
									<div class="col col-8">
										<label class="input">
											<input name="full_name" type="text" value='<?php echo @$form_data['FULL_NAME']; ?>'>
											<b class="tooltip tooltip-bottom-right">Needed to enter  name</b>
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">Birth Date</label>
									<div class="col col-8">
										<label class="input">
											<input name="birthdate" id="birthdate" type="text" value='<?php echo @$form_data['BIRTHDAY']; ?>' class="st">
											<b class="tooltip tooltip-bottom-right">Enter Birth Date </b>
										</label>
									</div>
								</div>
					        </section>
					        <section>
								<div class="row">
									<label class="label col col-4">Marital Status :</label>
									<div class="col col-8">
										<label class="select">
										<select id='mstat' name='mstat'>
											
												<option value="">Marital Status</option>
												<option value="M">Married</option>
												<option value="F">Single</option>
												
											</select>
											<b class="tooltip tooltip-bottom-right"> Marital Status</b>
										<i></i>	
										</label>
									</div>
								</div>
					        </section>
					        <section>
								<div class="row">
									<label class="label col col-4">Sex :</label>
									<div class="col col-8">
										<label class="select">
										<select id='sex' name='sex'>
											
												<option value="">Select Sex</option>
												<option value="M">Male</option>
												<option value="F">Female</option>
												
											</select>
											<b class="tooltip tooltip-bottom-right"> Sex</b>
										<i></i>
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">Address :</label>
									<div class="col col-8">
										<label class="input">
											<input name="address" type="text" value='<?php echo @$form_data['ADDRESS']; ?>' class="st">
											<b class="tooltip tooltip-bottom-right">Needed to enter Address Line 1</b>
										</label>
									</div>
								</div>
					        </section>
							
							
							<section>
								<div class="row">
									<label class="label col col-4">Country :</label>
									<div class="col col-8">
										<label class="select">
											<select id='country' name='country'>
											
												<option value="">Select Country</option>
												<?php foreach($country_list as $cItems)
											{
												echo '<option value="'.$cItems['countries_id'].'">'.$cItems['countries_name'].'</option>';
												
												
											}?>
											</select>
											<b class="tooltip tooltip-bottom-right">Country</b>
										<i></i></label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">City :</label>
									<div class="col col-8">
										<label class="select">
											<select id='city' name='city'>
											
												<option value="">Select City</option>
												
												
											</select>
											<b class="tooltip tooltip-bottom-right"> Select City</b>
										<i></i>	
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">ZIP/Postal Code :</label>
									<div class="col col-8">
										<label class="input">
											<input name="zip" max-length="6" type="text" value='<?php echo @$form_data['ZIP']; ?>' class="st">
											<b class="tooltip tooltip-bottom-right">Postal Code</b>
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">Mobile :</label>
									<div class="col col-8">
										<label class="input">
											<input name="mobile" type="text" max-length="10" value='<?php echo @$form_data['MOBILE']; ?>' class="st">
											<b class="tooltip tooltip-bottom-right">Contact no</b>
										</label>
									</div>
								</div>
					        </section>
					  
					 </fieldset>
					 <header>LOGIN INFORMATION</header>
					 <fieldset>
							<section>
								<div class="row">
									<label class="label col col-4">E-Mail :</label>
									<div class="col col-8">
										<label class="input">
											<input name="email" type="text" value='<?php echo @$form_data['EMAIL_ID']; ?>' class="st">
											<b class="tooltip tooltip-bottom-right">Needed to enter E-Mail</b>
										</label>
									</div>
								</div>
					        </section>
							
							<section>
								<div class="row">
									<label class="label col col-4">Password :</label>
									<div class="col col-8">
										<label class="input">
											<input name="pass" id="pass"  type="password"  class="st">
											<b class="tooltip tooltip-bottom-right">Needed to type Password</b>
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<label class="label col col-4">Retype Password :</label>
									<div class="col col-8">
										<label class="input">
											<input name="repass" id="repass"  type="password" class="st">
											<b class="tooltip tooltip-bottom-right">Needed your Password</b>
										</label>
									</div>
								</div>
					        </section>
							<section>
								<div class="row">
									<div class="col col-4"></div>
									<div class="col col-8">
										<label class="checkbox"><input type="checkbox" id="ch" name="terms" value="ON">
										<i></i><a onclick="window.open('<?=base_url()?>/terms','popup','width=416,height=318,scrollbars=yes');popup.focus();return(false);" href="javascript:void();">Terms &amp; Conditions</a>
										
										</label>
									</div>
								</div>
							</section>
					    
					  <section>
											<label class="label">Enter characters below</label>
											<label class="input input-captcha">
												<img src="<?=base_url();?>captcha/<?php echo $captcha_img['filename']; ?>" width="100"  alt="Captcha image" />
												<input type="text" maxlength="6" name="captcha" id="captcha">
											</label>
										</section>
					   
					  </fieldset>
					   <footer>
										<input type="submit" value="Register" name="reg_submit" class="btn btn-info pull-right"> 
									</footer>
						
					    
					</form>
				
				</div><!-- /.box -->
				</div><!-- /.col -->
                          <div class="col-md-4">
                          <img src="<?php echo base_url();?>adds_images/thumb/8_thumb.jpg">
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->



        <!-- jQuery 2.0.2 -->
        <script src="<?=base_url();?>plugins/jquery.min.js"></script>
        <script src="<?=base_url();?>plugins/jquery-ui.min.js"></script> 
        <!-- Bootstrap -->
        <script src="<?=base_url();?>plugins/bootstrap.min.js" type="text/javascript"></script>
       
       <script src="<?=base_url();?>plugins/jquery.validate.min.js"></script>
      
		<!--[if lt IE 10]>
			<script src="<?=base_url();?>plugins/jquery.placeholder.min.js"></script>
		<![endif]-->		
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
			<script src="<?=base_url();?>plugins/sky-forms/sky-forms-ie8.js"></script>
		<![endif]-->
        <script src="<?=base_url();?>plugins/app.js" type="text/javascript"></script>
      
    
       <script type="text/javascript">
		$(function()
		{
			// Validation
			$("#reg-form").validate(
			{					
				// Rules for form validation
				rules:
				{
					
					full_name:{required: true},
					address:{required: true},
					country:{required: true},
					city:{required: true},
					zip:{required: true},
					phone:{required: true},
					email:{required: true,email: true},
					pass:{required: true},
					repass:{equalTo: "#pass"}
				},
									
				// Messages for form validation
				messages:
				{
					
					full_name:{required: 'Enter your Name',},
					address:{required: 'Enter your Address',},
					country:{required: 'Enter your Country',},
					city:{required: 'Enter your City',},
					zip:{required: 'Enter your Postal code',},
					mobile:{required: 'Enter your Phone',},
					email:{required: 'Enter your email',email: 'Enter a Valid email'},
					pass:{required: 'Enter your Password'},
					repass:{required: 'Password and confirm password not matched'}
				},
									
				
				// Do not change code below
				errorPlacement: function(error, element)
				{
					error.insertAfter(element.parent());
				}
			});
		});			
	</script>
	<script type="text/javascript">
	  $(function() {
		    $( "#birthdate" ).datepicker({
		        changeMonth: true,
		        changeYear: true,
		        dateFormat:'yy-mm-dd'
		      });
		  });
	
	$('select#country').change(function (event) {loadlist($('select#city').get(0),'<?=base_url();?>user/get_zones/'+$('select#country').val()+'','zone_name','zone_id');});
	function loadlist(selobj,url,nameattr,valueattr)
	{

	    $(selobj).empty();
	    $.getJSON(url,{},function(data)
	    {$(selobj).append($('<option></option>').val('').html('--Please Select--'));
	        $.each(data, function(i,obj)
	        {
	             
	             $(selobj).append($('<option></option>').val(obj[valueattr]).html(obj[nameattr]));
	        });
	    });
	}
	</script>
<?php $this->load->view('includes/footer');?>
    </body>
</html>