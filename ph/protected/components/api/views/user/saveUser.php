<div class="apiForm createUser">
	name : <input type="text" name="nameSaveUser" id="nameSaveUser" value="<?php echo $this->module->id?> User" /><br/>
	email* : <input type="text" name="emailSaveUser" id="emailSaveUser" value="<?php echo $this->module->id?>@<?php echo $this->module->id?>.com" /><br/>
	cp* : <input type="text" name="postalcodeSaveUser" id="postalcodeSaveUser" value="97421" /><br/>
	pwd* : <input type="text" name="pwdSaveUser" id="pwdSaveUser" value="1234" /><br/>
	phoneNumber : <input type="text" name="phoneNumberSaveUser" id="phoneNumberSaveUser" value="1234" />(for SMS)<br/>
	
	<a class="btn" href="javascript:addUser()">Test it</a><br/>
	<br/><div id="createUserResult" class="result fss"></div>
	<script>
		function addUser(){
			params = { "email" : $("#emailSaveUser").val() , 
			    	   "name" : $("#nameSaveUser").val() , 
			    	   "cp" : $("#postalcodeSaveUser").val() ,
			    	   "pwd":$("#pwdSaveUser").val() ,
			    	   "phoneNumber" : $("#phoneNumberSaveUser").val(),
			    		"app" : "<?php echo $this->module->id?>"};
			ajaxPost("createUserResult",baseUrl+'/<?php echo $this->module->id?>/api/saveUser',params);
		}
	</script>
</div>