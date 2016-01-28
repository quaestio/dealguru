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
        <style>
        .loadButton {
            position: relative;
            text-align: center;
            border: 1px solid darkgray;
            width: 810px;
            padding: 10px 0px 10px 0px;
            margin: 0 auto;
            background: #c1dae4;
            color: #303030;
            font-family: Arial,Helvetica,sans-serif;
        }
        
        .loadButton:hover {
            background: azure;
        }
        </style>
    </head>
    <body class="skin-blue fixed">
        <!-- header logo: style can be found in header.less -->
       <?php $this->load->view('includes/header');?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('includes/left');?>

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
             
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
                            <!-- The time line -->
                            <ul class="timeline">
                            <?php foreach($deals as $items):?>
                                <!-- timeline time label -->
                                
                                <!-- timeline item -->
                                <li>
                                      <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i> <?=post_time(strtotime($items['date_created']));?></span>
                                        <div class="timeline-header">
                                        		<img alt="<?=$this->session->userdata('full_name')?>" class="img-circle" src="<?=base_url();?>user_imgs/<?=md5($this->session->userdata('id_user')).$this->session->userdata('mime')?>" onerror="this.onerror=null;this.src='<?=base_url();?>img/user.png';" width="40px" />
                        					
                        					<a href="#"><?=$items['full_name'];?></a>
                        					<div class="deal_title text-blue "><?=$items['deal_title'];?></div>
                        				</div>
	                                        <div class="timeline-body">
	                                            <?=$items['deal_summery'];?>
	                                        </div>
	                                         <?php foreach($items['images'] as $Imgitems):?>
	                                        <div class="timeline-body">
	                                            <img class="img-thumbnail" src="<?=base_url()."/adds_images/thumb/".$Imgitems['IMG_ID']."_thumb".$Imgitems['MIME'];?>" />
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
                             <div id="loadButton" class="loadButton">Load More</div>
                        </div><!-- /.col -->
                          <div class="col-md-4">
                          adds
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
		$('#myModal').modal('hide')
		$.ajax({
        	url: "<?=base_url();?>adds/post_add",
			type: "POST",
			data:  new FormData(this),
			contentType: false,
    	    cache: false,
			processData:false,
			success: function(data)
		    {
    		    var obj = JSON.parse(data);
    		         		
        			if(obj.stat)
        			{
	            		var timeline_data='<li> <div class="timeline-item">'+
	            		'<span class="time"><i class="fa fa-clock-o"></i> </span>'+
	            		'<h3 class="timeline-header">'+
	            		'<div class="pull-left image">'+
	            		'<img width="40px" src="'+obj.user_image_url+'" class="img-circle" alt="'+obj.full_name+'">'+
	            		'</div>'+
	            		'<a href="#">'+obj.full_name+'</a>'+
			            '<div>'+obj.deal_details.DEAL_TITLE+'</div>'+
			            '</h3>'+
			            '<div class="timeline-body">'+obj.deal_details.DEAL_SUMMARY+'</div>'+
			            '<div class="alert alert-danger alert-dismissable"><i class="fa fa-ban"></i><button aria-hidden="true" data-dismiss="alert" class="close" type="button">x</button><b>Alert!</b> Image will be displayed after moderator verification</div>'+
						
			             '	</div>'+
			            '</li>';
	        			$( ".timeline" ).prepend( timeline_data );
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
<script type="text/javascript">
        $(document).ready(function(){
            $.ajaxSetup({cache: false}); // disabling cache, omit if u dont need
            var defaultBtnText = "Load More Content";
            var buttonLoadingText = "<img src='img/loading.gif' alt='' /> Loading..";
            $(document).scroll(function(){
                if ($(window).scrollTop() + $(window).height() >= $(document).height())
                {
                    
                    loadMore();
                }
            });
            
            
                loadMore();
            
            
            function loadMore()
            {
                $("#loadButton").html(buttonLoadingText);
                $.ajax({
                    url: '<?=base_url();?>adds/load_posts',
                    method: 'get',
                    success: function(data){
                        $(".timeline").append(data);
                        $("#loadButton").html(defaultBtnText);
                    }
                });
            }
            
        });
    </script>
<?php $this->load->view('includes/footer');?>
    </body>
</html>