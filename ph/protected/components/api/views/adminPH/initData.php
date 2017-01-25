<div class="fss">
	- check if init data is installed
<br/>
- list all files to import for initialisation
<?php 
if(file_exists(Yii::getPathOfAlias(Yii::app()->params["modulePath"].Yii::app()->controller->module->id.".data" )))
{
	foreach( CFileHelper::findFiles(Yii::getPathOfAlias(Yii::app()->params["modulePath"].Yii::app()->controller->module->id.".data" )) as $f)
	{?>
			
		<br/><a class="btn" href="#" onclick="alert('<?php echo $this->module->id."/data/".pathinfo($f, PATHINFO_FILENAME)?>');">
			<?php echo pathinfo($f, PATHINFO_FILENAME)?>
		</a>
<?php }
} else 
	echo "Nothing to import";
?>
									
<br/><br/>
	<a class="btn" href="javascript:initData()">initialise data</a><br/>
	<div id="initDataResult" class="result fss"></div>
	<script>
		function initData(){
			params = {}; 
			ajaxPost("initDataResult", baseUrl+'/<?php echo $this->module->id?>/api/initdata',params);
		}
	</script>
</div>
