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
            width: 100%;
            padding: 5px;
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
			                   <form class="sky-form" method="get" action="#" style="border:none">
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
										<?php 
											foreach($deal_zones as $cItems){
											echo'<option value="'.$cItems['city_id'].'"';
											if($this->session->userdata('default_zone')==$cItems['city_name']) echo ' selected="selected"';
											echo'>'.$cItems['city_name'].'</option>';
											}?>
									</select>
										<i></i>
									</label>
							
								</section>
			                       
			                    </form>
			                </section>
			              
                <!-- Main content -->
                <section class="content">
				<div id='sys-msg'></div>
                    <!-- row -->
                    <div class="row">                        
                        <div class="col-md-8">                       
                            <!-- The time line -->
                            <ul class="timeline">
                            
                            </ul>
                             <div id="loadButton" class="loadButton">Load More</div>
                        </div><!-- /.col -->
                          <div class="col-md-4">
                          <?php $this->load->view('right_adds');?>
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
								<textarea rows="3" name="info" placeholder="Deal info" ></textarea>
							</label>
						</section>
						<section  class="col-md-6">
							<label class="select">
							<select name="deal_country" id="deal_country">
							<option value="">--Select Country--</option>
								<?php 
								foreach($deal_countries as $cItems){
								echo'<option value="'.$cItems['country_id'].'"';
								if($this->session->userdata('default_country')==$cItems['countries_name']) echo ' selected="selected"';
								echo'>'.$cItems['countries_name'].'</option>';
								}
								
								?>
							</select>
								<i></i>
							</label>
							
						</section>
						<section  class="col-md-6">
							<label class="select">
							<select name="deal_zones" id="deal_zones">
							<option value="">--Select City--</option>
								
							</select>
								<i></i>
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
						<section class="col-md-4">
							<label class="input">
								<i class="icon-append fa fa-calendar"></i>
								<input type="text" name="price" id="price" placeholder="Price Save">
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
	$.ajaxSetup({cache: false}); 
	$("#PostAdd").on('submit',(function(e) {
		e.preventDefault();
		$('#myModal').modal('hide')
		$.ajax({
        	url: "<?=base_url();?>deals/post_deal",
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
        				
		 					$('#sys-msg').html('Your deal posted successfully, will be posted shortly');
		 					$('#sys-msg').addClass('alert alert-success alert-dismissable');
							$('#sys-msg').delay(3000).fadeOut();
	            		
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
	$( "#loadButton" ).click(function() {
		loadMore();
		});
	
    
	  
    
            // disabling cache, omit if u dont need
           var defaultBtnText = "Load More";
           var buttonLoadingText = "<img src='img/loading.gif' alt='' /> Loading..";
            $(document).scroll(function(){
                if ($(window).scrollTop() + $(window).height() >= $(document).height())
                  loadMore();
                
            });
            
            var offset=0;
            var limit=5;
            var loading=false;
                loadMore();
            	
            
            function loadMore()
            {
            	
                if(!loading){
                	loading=true;
                $("#loadButton").html(buttonLoadingText);
                $.ajax({
                    url: '<?=base_url();?>timeline/load_posts/'+offset+'/'+limit,
                    method: 'get',
                    success: function(data){
                    	//$(".timeline").append(data); 
                        var TimeLineData="";
                       	var dData=JSON.parse(data);
                      
                       		
                    	for (var i = 0, len = dData.length; i < len; ++i) {
		  					TimeLineData=  '<li><div class="timeline-item">'+
		  						'<div class="timeline-header clearfix">'+
					  				'<img width="40px" src="'+dData[i].user_image+'" class="UserPhoto UserPhoto_medium pull-left img-circle" alt="'+dData[i].full_name+'">'+
					  				'<a class="deal_title text-blue ">'+dData[i].deal_title+'</a> By	<a class="timeline-user" href="#">'+dData[i].full_name+'</a>'+
					  				'<span class="time pull-right"><i class="fa fa-clock-o"></i> '+dData[i].date_created+'</span>'+
				  				'</div>'+
				  				'<div class="timeline-body clearfix">';
				  				 //dImages=JSON.parse(dData[i].images);
			  						lenImg = dData[i].images.length;
			  						colWidth=12;
			  						if(lenImg>0) colWidth=8; 
			  						
			  						TimeLineData= TimeLineData +'<div class="col-md-'+colWidth+'">'+dData[i].deal_summery+'</div>';		
			  						TimeLineData= TimeLineData +'<div class="col-md-4">';
			  						for (var img = 0; img < lenImg; ++img) {
			  							TimeLineData= TimeLineData +'<img src="<?=base_url();?>adds_images/thumb/'+dData[i].images[img].IMG_ID+'_thumb'+dData[i].images[img].MIME+'" class="img-responsive adds-image">';
			  							

				  						}
				  					TimeLineData= TimeLineData +'</div>'+
				  				'</div>'+
				  				'<!--commentPanel box-->'+
				  				'<div class="commentPanel clearfix" data-id="'+dData[i].deal_id+'" id="CommentPosted'+dData[i].deal_id+'">';
				  				len_deal_comments = dData[i].deal_comments.length;
				  				for (var dc = 0; dc < len_deal_comments; ++dc) {
				  					
				  					TimeLineData= TimeLineData +'<div align="left" class="commentBox" data-comment-id="'+dData[i].deal_comments[dc].COMMENT_ID+'" id="record-'+dData[i].deal_comments[dc].COMMENT_ID+'">'+
									
										'<img align="left" src="'+dData[i].deal_comments[dc].C_IMG+'" class="UserPhoto UserPhoto_mini left" style="float:left;" alt="">'+
										'<p><a href="javascript:void(0);">'+dData[i].deal_comments[dc].FULL_NAME+'</a>  <span class="date">'+dData[i].deal_comments[dc].DATE_TIME+'</span>	'+dData[i].deal_comments[dc].COMMENT+'</p>'+
									'</div>';
				  				}
				  				TimeLineData= TimeLineData +'</div>';
				  				
				  			
				  				<?php 
				  				if($this->session->userdata('id_user')!="")
				  				{
					  					?>
					  					TimeLineData= TimeLineData +'<div class="commentBox clearfix" data-id="'+dData[i].deal_id+'" id="commentBox-'+dData[i].deal_id+'">'+
					  				'<img src="<?=$this->session->userdata('user_image_url')==""?'img/user.png':$this->session->userdata('user_image_url');?>" class="UserPhoto UserPhoto_mini left" style="float:left;" alt="">'+
					  						'<input type="text" class="commentMark" id="commentMark-'+dData[i].deal_id+'" data-deal-id="'+dData[i].deal_id+'" placeholder="Write a comment...">'+
					  						'<button class="btnPost btn btn-primary" id="D-'+dData[i].deal_id+'" data-deal-id="'+dData[i].deal_id+'">POST</button>'+
					  					
					  				'</div>';
				  					<?php } ?>

								
								var love_count=dData[i].love_arr.length;
								var hate_count=dData[i].hate_arr.length;
								//alert(dData[i].love_arr.length);
				  				TimeLineData= TimeLineData +'<div class="timeline-footer">'+
				  				'<span class="tag_category"><i class="fa fa-pencil-square-o"></i> <a href="http://localhost/quaestio/deal_guru/Food">Food</a></span>'+
				  				'<span class="tag-like pull-right"><i class="fa fa-heart"></i> <a class="like" data_id="'+dData[i].deal_id+'" href="javascript:void(0)">'+love_count+' Love</a></span>'+
				  				'<span class="tag-hate pull-right"><i class="fa fa-frown-o"></i> <a class="hate" data_id="'+dData[i].deal_id+'" href="javascript:void(0)">'+hate_count+' Dislike</a></span>'+
				  			   
				  			'</div>'+
				  			'</div><!--timeline item--></li>';              	 
                    	     
                    	    
                    	$(".timeline").append(TimeLineData); 

                    	}//for
                    	 
                        
                        $("#loadButton").html(defaultBtnText);
                    },//success
                    complete: function(data){
                    	loading=false;
                    	offset=offset+limit;
                        //alert (loading);
                        }
                });
                
                }//load more check
            }
          
         // end of comment
         $(document).on('click', "a.like", function(e) {
         
      		   e.preventDefault();
      		 
      		   $.post("<?=base_url();?>deals/love",
      				    { 
      			   			did: $(this).attr("data_id")
      				     
      				    },
      				    function(data, status){
      						
      				    		var HData=JSON.parse(data);
  				    			$('#sys-msg').html(HData.MSG);
  				    			if(!HData.STAT)
  				 					$('#sys-msg').addClass('alert alert-danger alert-dismissable');
  				    			else
				 					$('#sys-msg').addClass('alert alert-success alert-dismissable');
  		  				 			
  				 				$('#sys-msg').delay(3000).fadeOut();
  				 			
      				    	
      				    });
      		  
      		});
         $(document).on('click', "a.hate", function(e) {
        	
      		   e.preventDefault();
      		 
      		   $.post("<?=base_url();?>deals/hate",
      				    { 
 				   			did: $(this).attr("data_id")
      				     
      				    },
      				    function(data, status){
      							var HData=JSON.parse(data);
      							$('#sys-msg').html(HData.MSG);
      							if(!HData.STAT)
  				 					$('#sys-msg').addClass('alert alert-danger alert-dismissable');
  				    			else
				 					$('#sys-msg').addClass('alert alert-success alert-dismissable');
      							$('#sys-msg').delay(3000).fadeOut();
      				    });
      		  
      		});
      	  //comment
         // $(".commentMark").bind("keydown", function(event) {
       $(document).on('click', "button.btnPost", function(e) {	 
      	//	var keycode = (event.keyCode ? event.keyCode : (event.which ? event.which : event.charCode));

      	 	var deal_id=$(this).attr("data-deal-id");
      	 	
      	 	
	      	 if($("#commentMark-"+deal_id+"").val() != "")
	      	{
      			$.post("<?=base_url();?>deals/post_comment",{
	      			did:deal_id,
	      			cmt:$("#commentMark-"+deal_id+"").val() 
	      		}, function(response){
      			 	var objCmtRes = JSON.parse(response);
      				var Reshtml='<div align="left" class="commentBox" data-comment-id="'+objCmtRes.comment_id+'" id="record-'+objCmtRes.comment_id+'">'+
      					 '<img align="left" src="'+objCmtRes.user_image+'" class="UserPhoto UserPhoto_mini left" style="float:left;" alt="">'+
      					 '<p><a href="javascript:void(0);">'+objCmtRes.full_name+'</a>  <span class="date">Just now</span>'+objCmtRes.comment+'</p>'+
      					 '</div>';
      			
      				$("#CommentPosted"+deal_id+"").append($(Reshtml).fadeIn('slow'));
      				$("#commentMark-"+ deal_id +"").val("");
      		 });
      	}

       return false;
      
      }); 
   $('select#deal_country').change(function (event) {loadlist($('select#deal_zones').get(0),'<?=base_url();?>timeline/load_zones/'+$('select#deal_country').val()+'','city_name','city_id');});
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
	loadlist($('select#deal_zones').get(0),'<?=base_url();?>timeline/load_zones/'+$('select#deal_country').val()+'','city_name','city_id');
   



    });//document ready
    </script>
<?php $this->load->view('includes/footer');?>
    </body>
</html>