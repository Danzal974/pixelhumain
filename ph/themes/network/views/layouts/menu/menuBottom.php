<div class="col-xs-12 main-bottom-menu no-padding"  data-tpl="default.menu.menuBottom">
	
	<?php if(@Yii::app()->session["userId"] && @$params['add']){ ?>
		<div class="showElementAdd">
		<div id="btn-menu-add-sub">
			
		<?php 
			$convertArray=array("one","two","three");
			$countAdd = count($params['add'])-1;
			$i=0;
			foreach($params['add'] as $key => $data){ 
				$href="javascript:elementLib.openForm('".$key."')";
				$lbh="";
				if($key=="organization")
					$bgStyle="	background-color: rgba(146, 191, 32, 0.6);";
				else if($key=="project")
					$bgStyle="background-color: rgba(140, 91, 161, 0.6);";
				else if($key=="event")
					$bgStyle="background-color: rgba(255, 163, 0, 0.6);";
				else if($key=="person"){
					$bgStyle="background-color: rgba(255, 200, 0, 0.6);";
					$href="#person.invite";
					$lbh="lbh";
				}
					//$bgClass="bg-yellow";
			?>
				<a href="<?php echo $href ?>" class="<?php echo $lbh ?> btn no-padding hoverDiv<?php echo $key ?> <?php echo $convertArray[$countAdd]; ?>div<?php echo $convertArray[$i] ?>" style="<?php echo $bgStyle ?>"> <span style="font-variant: small-caps;font-size: 17px;"><?php echo Yii::t("common",$key); ?></span></a>
			<?php $i++; } ?>
			
			<!--<a href="javascript:;" class="btn no-padding threedivone bg-green"> <span><?php echo Yii::t("common","Organizations"); ?></span></a>
			<a href="javascript:;" class="btn no-padding threedivtwo bg-orange"> <span><?php echo Yii::t("common","Organizations"); ?></span></a>
		<a href="javascript:;" class="btn no-padding threedivthree bg-purple"> <span><?php echo Yii::t("common","Organizations"); ?></span></a>-->

		</div>
		<a class="pull-left text-white"  id="btn-menu-add">
			<i class="fa fa-plus firstIcon"></i>	
		</a>
		</div>
	<?php } ?>
</div>
<script>
 // var timeoutGS = setTimeout(function(){ }, 100);
  //var timeoutDropdownGS = setTimeout(function(){ }, 100);
  jQuery(document).ready(function() {
	  $(".hoverDivorganization").hover(
	  	function(){
		  $(this).css("background-color","#93C020");
	  	}, function(){
		  $(this).css("background-color","rgba(146, 191, 32, 0.6)");
	  	});
	  $(".hoverDivperson").hover(
	  	function(){
		  $(this).css("background-color","#FFC600");
	  	}, function(){
		  $(this).css("background-color","rgba(255, 200, 0, 0.6)");
	  	});
	  $(".hoverDivevent").hover(
	  	function(){
		  $(this).css("background-color","#FFA200");
	  	}, function(){
		  $(this).css("background-color","rgba(255, 163, 0, 0.6)");
	  	});
	  	$(".hoverDivproject").hover(
	  	function(){
		  $(this).css("background-color","#8C5AA1");
	  	}, function(){
		  $(this).css("background-color","rgba(140, 91, 161, 0.6)");
	  	});

	  $(".showElementAdd").mouseenter(function(){
		  $("#btn-menu-add").addClass("active");
		  $("#btn-menu-add-sub").show(700);
	  }).mouseleave(function(){
		  $("#btn-menu-add").removeClass("active");
		  $("#btn-menu-add-sub").hide(700);		  
	  });
  });
</script>