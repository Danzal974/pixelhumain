<?php $this->renderPartial('application.views.layouts.modals.loginForm');?>
<?php $this->renderPartial('application.views.layouts.modals.loginPwdForm');?>
<?php 
$account = (isset(Yii::app()->session["userId"])) ? Yii::app()->mongodb->citoyens->findOne(array("_id"=>new MongoId(Yii::app()->session["userId"]))) : null;
?>
<?php $this->renderPartial('application.views.layouts.modals.participer',array( "account" => $account));?>
<?php $this->renderPartial('application.views.layouts.modals.association',array( "account" => $account) );?>
<?php $this->renderPartial('application.views.layouts.modals.entreprise');?>
<?php $this->renderPartial('application.views.layouts.modals.invitation');?>
<?php $this->renderPartial('application.views.layouts.modals.boiteIdee');?>
<?php $this->renderPartial('application.views.layouts.modals.flashInfo');?>



<script type="text/javascript">
initT['modalsInit'] = function(){
    
    
};
function showEvent(id){
	$("#"+id).click(function(){
    	if($("#"+id).prop("checked"))
    		$("#"+id+"What").removeClass("hidden");
    	else
    		$("#"+id+"What").addClass("hidden");
    });
}
</script>