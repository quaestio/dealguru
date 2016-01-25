<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>dg </title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="<?=base_url();?>plugins/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css" />
       	<link href="<?=base_url();?>plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
       	<link href="<?=base_url();?>plugins/sky-forms/sky-forms.css" rel="stylesheet" type="text/css" />
       
        <!--[if lt IE 9]>
			<link rel="stylesheet" href="<?=base_url();?>plugins/sky-forms/css/sky-forms-ie8.css">
		<![endif]-->
       
        <!-- Theme style -->
        <link href="<?=base_url();?>css/style.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="<?=base_url();?>plugins/misc/html5shiv.js"></script>
          <script src="<?=base_url();?>plugins/misc/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
       <?php $this->load->view('includes/header');?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('includes/left');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
             
	                         <section class="content-header">
			                   <form class="sidebar-form" method="get" action="#">
			                        <div class="input-group">
			                            <input type="text" placeholder="Search..." class="form-control" name="q">
			                            <span class="input-group-btn">
			                                <button class="btn btn-flat" id="search-btn" name="seach" type="submit"><i class="fa fa-search"></i></button>
			                            </span>
			                        </div>
			                    </form>
			                </section>
			              
                <!-- Main content -->
                <section class="content">

                    <!-- row -->
                    <div class="row">                        
                        <div class="col-md-12">
                            <!-- The time line -->
                            <ul class="timeline">
                            <?php foreach($deals as $items):?>
                                <!-- timeline time label -->
                                
                                <!-- timeline item -->
                                <li>
                                      <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> <?=post_time(strtotime($items['date_created']));?></span>
                                        <h3 class="timeline-header">
                                        	<div class="pull-left image">
                           				 		<img alt="<?=$this->session->userdata('full_name')?>" class="img-circle" src="<?=base_url();?>user_imgs/<?=md5($this->session->userdata('id_user')).$this->session->userdata('mime')?>" onError="this.onerror=null;this.src='<?=base_url();?>img/user.png';" width="40px">
                        					</div>
                        					<a href="#"><?=$items['full_name'];?></a></h3>
	                                        <div class="timeline-body">
	                                            <?=$items['deal_summery'];?>
	                                        </div>
	                                         <?php foreach($items['images'] as $Imgitems):?>
	                                        <div class="timeline-body">
	                                            <img class="img-thumbnail" src="<?=base_url()."/adds_images/".$Imgitems['IMG_ID'].$Imgitems['MIME'];?>" />
	                                        </div>
	                                         <?php endforeach;?>
                                        <div class='timeline-footer'>
                                        	<span class='tag_category'><i class="fa fa-tag"></i> <a href="<?=base_url().$items['category']['CATEGORY_NAME'];?>"><?=($items['category']['CATEGORY_NAME']);?></a></span>
                                           
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach;?>
                                <!-- END timeline item -->
                                
                            </ul>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                    

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Deal Details</h4>
      </div>
      <div class="modal-body">
       	<form action="" id="PostAdd" class="sky-form">
       	
       	<fieldset>					
					<div class="row">
						
						<section class="col-md-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="start" id="start" placeholder="Start date">
							</label>
						</section>
						<section class="col-md-6">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="finish" id="finish" placeholder="Expected finish date">
							</label>
						</section>
						<section class="col-md-12">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="deal_title" id="deal_title" placeholder="Whole Cooked Roast Chicken - Now $8 @ Coles">
							</label>
						</section>
						<section class="col-md-12">
							<label class="textarea">
								<textarea rows="3" name="info" placeholder="Deal info"></textarea>
							</label>
						</section>
					
						<section class="col-md-4">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="price" id="price" placeholder="Price Save">
							</label>
						</section>
						<section  class="col-md-8">
							
							<label class="select">
							<select name="category" id="category">
							<option value="">--Select Category--</option>
								<?php foreach($deal_categories as $cItems):?>
								<option value="<?=$cItems['CATEGORY_ID']?>"><?=$cItems['CATEGORY_NAME']?></option>
								<?php endforeach;?>
							</select>
								<i></i>
							</label>
							
						</section>
						<section  class="col-md-12">
							<label class="label">Image</label>
							<label class="input input-file state-success" for="file">
								<div class="button"><input type="file" onchange="this.parentNode.nextSibling.value = this.value" id="userfile" name="userfile" />Browse</div><input type="text" readonly="" />
							</label>
							
					</section>
					</div>
		</fieldset>			
       	</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnPostAdd" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
       $(function() {
    	   
       $('#start').datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>'
		});
		$('#finish').datepicker({
			dateFormat: 'yy-mm-dd',
			prevText: '<i class="fa fa-chevron-left"></i>',
			nextText: '<i class="fa fa-chevron-right"></i>'
		});
		});
   			
		
       </script>
       <script type="text/javascript">
$(document).ready(function (e) {
	$("#PostAdd").on('submit',(function(e) {
		e.preventDefault();
		$.ajax({
        	url: "<?=base_url();?>adds/post_add",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {var obj = JSON.parse(data);
        		if(data.error=="")
        		{
					$dt='<li>
                    <div class="timeline-item">
                    <span class="time"><i class="fa fa-clock-o"></i> Just Now</span>
                    <h3 class="timeline-header">
                    	<div class="pull-left image">
       				 		<img alt="<?=$this->session->userdata('full_name')?>" class="img-circle" src="<?=base_url();?>user_imgs/<?=md5($this->session->userdata('id_user')).$this->session->userdata('mime')?>" onError="this.onerror=null;this.src='<?=base_url();?>img/user.png';" width="40px">
    					</div>
    					<a href="#"><?=$items['full_name'];?></a></h3>
                        <div class="timeline-body">'+DEAL_SUMMARY+'</div>
                        
                        <div class="timeline-body">
                            Image will be shown when uploaded
                        </div>
                       
                   
                </div>
            </li>';
            		
        			$( ".timeline" ).prepend( "<li>"+dt+"</li>" );
        		}
		    },
		  	error: function() 
	    	{
		    	alert(data);
	    	} 	        
	   });
	}));
	$( "#btnPostAdd" ).click(function() {
		  $( "#PostAdd" ).submit();
		});
});
</script>
<?php $this->load->view('includes/footer');?>
    </body>
</html>