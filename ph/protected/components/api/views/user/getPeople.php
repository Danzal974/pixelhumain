<div class="fss">
	cp* : <input type="text" name="postalcodegetPeople" id="postalcodegetPeople" value="97421" /><br/>
	<br/>
	<a class="btn" href="javascript:getpeopleby(1)">Test it</a> <a class="btn" href="javascript:getpeopleby(0)">as Json</a> <a class="btn" href="javascript:countpeopleby()">Count it</a><br/>
	<div id="getPeopleResult" class="result fss"></div>
	<script>
		function getpeopleby(asjson){
			params = { 
				"cp" : $("#postalcodegetPeople").val(),
				"app" : "<?php echo $this->module->id?>"
			 };
			 callback = (asjson) ? function(resp){
				$('#getPeopleResult').columns({
			      data:Object2Array(resp)
			    });
			}: null ;
			testitpost("getPeopleResult",baseUrl+'/<?php echo $this->module->id?>/api/getpeopleby',params,callback);
		}
		function countpeopleby(){
			params = { 
				"cp" : $("#postalcodegetPeople").val(),
				"app" : "<?php echo $this->module->id?>",
				"count" : 1
			};
			testitpost("getPeopleResult",baseUrl+'/<?php echo $this->module->id?>/api/getpeopleby/count/1',params);
		}
	</script>
</div>
<a class="btn" href="javascript:test()">Test</a>
<a class="btn" href="javascript:test1()">Test1</a>
<a class="btn" href="javascript:reset()">Reset</a>
<a class="btn" href="javascript:setMaster()">set Master</a>

<script type="text/javascript">
function reset(){
	$('#columns').columns('resetData');
}
function setMaster(){
	var json = [{"col1":"row1", "col2":"row1", "col3":"row1"}, {"col1":"row2", "col2":"row2", "col3":"row2"}]; 
	$('#columns').columns('setMaster', json);
}
function test(){

    var json = [{'Emp. Number': 00001, 'First Name':'John', 'Last Name':'Smith' },
          {'Emp. Number': 00002, 'First Name':'Jane', 'Last Name':'Doe' },
          {'Emp. Number': 00003, 'First Name':'Ted', 'Last Name':'Johnson' },
          {'Emp. Number': 00004, 'First Name':'Betty', 'Last Name':'Smith' },
          {'Emp. Number': 00005, 'First Name':'Susan', 'Last Name':'Wilson' },
          {'Emp. Number': 00006, 'First Name':'John', 'Last Name':'Doe' },
          {'Emp. Number': 00007, 'First Name':'Bill', 'Last Name':'Watson' },
          {'Emp. Number': 00008, 'First Name':'Walter', 'Last Name':'Wright' }]; 
    $('#columns').columns({
      data:json
    });
  
}
function test1(){

    var json = [{"col1":"row1", "col2":"row1", "col3":"row1"}, {"col1":"row2", "col2":"row2", "col3":"row2"}]; 
    
    $('#columns').columns({
      data:json
    });
  
}
</script>