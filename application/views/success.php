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
               
	                       
			              
                <!-- Main content -->
                <section class="content">

                    <!-- row -->
                    <div class="row">                        
                        <div class="col-md-8"> 
                       <div class="box box-info">
                                <div class="box-header">
                                    <i class="fa fa-bullhorn"></i>
                                    <h3 class="box-title">Registration Successful</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div id="logMessage"></div>
                                    <div class="callout callout-info">
                                        <h4>Your registration has been completed</h4>
                                        <p>Check youe email for activation code</p>
                                       <div class="row">
                                        <div class="col-xs-3">
                                            <input type="text" id="ActCode" placeholder="Activation Code" class="form-control">
                                        </div>
                                        <div class="col-xs-4">
                                            <button class="form-control" id="ActBtn">Activate</button>
                                        </div>
                                        
                                    </div>
                                    </div>
                                   <div class="callout callout-danger">
                                        <?= print_r($debud);?>
                                    </div>
                                </div><!-- /.box-body -->
                            </div>
				</div><!-- /.col -->
                          <div class="col-md-4">
                          <?php $this->load->view('right_adds');?>
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
$("#ActBtn").click(function(e){
	var $btn = $(this).button('loading')
		   e.preventDefault();
		
				$.post("<?=base_url();?>user/activate",
				    { 
					actid: '<?=$user;?>',
					user_input: $('#ActCode').val()
				     
				    },
				    function(data, status){
					  
				    	$('#logMessage').html('<div class="alert alert-danger fade in"><button data-dismiss="alert" class="close"><span>x</span></button><strong>Oh!</strong> '+data+'</div>');
				    	 $btn.button('reset')
			
				    	
				    });
				
		});
</script>
<?php $this->load->view('includes/footer');?>
    </body>
</html>