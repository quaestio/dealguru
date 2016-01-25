<div class="modal fade" id="mLogin" tabindex="-1" role="dialog" aria-labelledby="mLoginLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Login</h4>
      </div>
      <div class="modal-body">
       	<form action="" id="PostLogin" class="sky-form">
       	
       	<fieldset>					
					<div class="row">
						<div id="logMessage"></div>
						<section class="col-md-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="email" id="email" placeholder="email">
							</label>
						</section>
						<section class="col-md-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="password" name="pass" id="pass" placeholder="Password">
							</label>
						</section>
						
					</div>
		</fieldset>			
       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnLogin" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
$("#btnLogin").click(function(e){
		   e.preventDefault();
		
				$.post("<?=base_url();?>user/login",
				    { 
					email: $('#email').val(),
					pass: $('#pass').val()
				     
				    },
				    function(data, status){
					    if(data){
					    	 location.reload();
					    }
					    else 
				    	$('#logMessage').html('<div class="alert alert-danger fade in"><button data-dismiss="alert" class="close"><span>x</span></button><strong>Oh!</strong> Invalid username and/or password</div>');
				  		
				  		
				    	
				    });
				
		});
</script>