<!-- start: TOP NAVIGATION MENU -->
<style>
	#dropdown_searchTop{
		padding: 0px 15px; 
		margin-left:215px; 
		width:300px;
	}

	#dropdownTags{
		padding: 0px 15px; 
		margin-left:3%; 
		width:275px;
	}
	.li-dropdown-scope{
		padding: 8px 3px;
		color: black;
		float:none;
		line-height: 20px;
	}
	.li-dropdown-scope:hover{
		/*background-color: #ccc;*/
	}

	#searchBar{
		max-width: 250px;
	}
	.searchList:hover{
		background-color: #ccc;
	}
	
	ol{ 
		padding-left:0; 
		list-style-position:inside; 
	}

	.city-search {
	    font-size: 0.95rem;
	    font-weight: 300;
	    line-height: 0.8125rem;
	}
	
	<?php if( Yii::app()->session[ "userIsAdmin"] && Yii::app()->controller->id == "admin" ){?>
	.top-navbar { background-color: #E33551; }
	<?php }?>
</style>

<header class="top-navbar collapse_list " >

	<div class="navbar-logo collapse_wrap">
		<?php 
			$serverInfo = Utils::getServerInformation();
			$platform = $serverInfo["platform"];
			$logoColor = $serverInfo["logoColor"];
			
			$contextInfo = (isset($this->version)) ? $platform." : ".$this->version : $platform;
		 ?>
		<h1 class="trigger collapse_trigger hide_on_active">
			<i class="fa fa-bars mainModuleMenu  " style="color:<?php echo $logoColor ?>;font-size: 32px;" title="<?php echo $contextInfo ?>"></i>
			<span class="fulltitle">full page title</span>
			<span class="menu-count badge badge-danger animated bounceIn"></span>
		</h1>

		<div class="inner collapse_box">
			<span class="trigger collapse_trigger">
				<i class="fa fa-bars mainModuleMenu " style="color:<?php echo $logoColor ?>;font-size: 32px;" title="<?php echo $contextInfo ?>"></i>
			</span>
			<?php if(isset(Yii::app()->session["userId"])){ ?>
				
				<a href="javascript:;" title="TAGS" onclick='openSlideBar("tags")'>
					<i class="fa fa-tags"></i>
					<span class="tags-count notifcation-counter badge badge-warning animated bounceIn"></span>
				</a>

				<a href="javascript:;" title="TERRITORIES"  onclick='openSlideBar("scope")'>
					<i class="fa fa-circle-o"></i>
					<span class="scopes-count notifcation-counter badge badge-warning animated bounceIn"></span>
				</a>

				<a href="javascript:;" onclick="openSubView('Your Network', '/communecter/sig/network', null)">
					<i class="fa fa-map-marker"></i>
				</a>

				<a href="javascript:;" onclick="openViewer()">
					<i class="fa fa-share-alt"></i>
				</a>
				
				<a href="javascript:;" onclick="openSubView('Directory View', '/communecter/default/directory<?php echo (isset(Yii::app()->controller->id)) ? "/type/".Yii::app()->controller->id : ""; ?><?php echo (isset($_GET['id'])) ? "/id/".$_GET['id'] : ""; ?>', null)">
					<i class="fa fa-align-justify"></i>
				</a>

				<?php //<a href="<?php echo Yii::app()->createUrl("/".$this->moduleId."/person/activities") ?>
				<a href="<?php echo Yii::app()->createUrl("/".$this->moduleId."/gamification"); ?>">
					<i class="fa fa-gamepad "></i>
					<span class="topbar-badgeL badge badge-warning animated bounceIn"><?php echo Gamification::badge( Yii::app()->session['userId'] ) ?></span>
				</a>
				<a href="#" class="sb_toggle" id="sbToogle">
					<i class="fa fa-cog"></i>
				</a>
				<a href="<?php echo Yii::app()->createUrl($this->moduleId."/person/logout") ?>" >
					<i class="fa fa-power-off text-yellow"></i>
				</a>
			<?php } else { ?>
				<a style="padding-right:30px;padding-left:30px;" href="<?php echo Yii::app()->createUrl("/".$this->moduleId."/person/login"); ?>" >
					<i class="fa fa-power-off"></i>
					<span > Se connecter   </span>
				</a>
			<?php }; ?>
		</div>
	</div>
		
	<style type="text/css">
	.whiteMenu{
		padding-left:20px;
		padding-right:30px; 
		background-color: white; 
		color: black; 
	}
	</style>
	<ul class="navbar-menu">

		<li class="collapse_wrap whiteMenu" >
			<?php echo $this->title ?>
		</li>
		
		<?php 
		/*if(isset($this->toolbarMBZ)){
			foreach ($this->toolbarMBZ as $value) {
				if( stripos( $value, "</li>" ) != "")
					echo $value;
				else
					echo "<li class='whiteMenu'>".$value."</li>";
			}
		} 

		if(isset($this->toolbarMenuAdd)){
			?>
		<!-- start: TO-DO DROPDOWN -->
		<li class="dropdown" style="padding-left:20px;padding-right:30px; background-color: white; color: black; ">
			<a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
				<i class="fa fa-plus"></i> AJOUTER
			</a>
			<ul class="dropdown-menu dropdown-light dropdown-subview " style=" background-color: white;">
				<?php 
		          foreach( $this->toolbarMenuAdd as $item )
		          {
		              $modal = (isset($item["isModal"])) ? 'role="button" data-toggle="modal"' : "";
		              $onclick = (isset($item["onclick"])) ? 'onclick="'.$item["onclick"].'"' : "";
		              $href = null;
		              if( isset($item["href"]) )
		              {
		              	if(stripos($item["href"], "http") >= 0 || stripos($item["href"], "#") >=0 )
		              		$href = $item["href"];
		              	else
		              		$href = Yii::app()->createUrl($item["href"]) ;
		              	}
		              $class = (isset($item["class"])) ? 'class="'.$item["class"].'"' : "";
		              $icon = (isset($item["iconClass"])) ? '<i class="'.$item["iconClass"].'"></i>' : '';
		              echo ($href) ? '<li><a href="'.$href.'" '.$modal.' '.$class.' '.$onclick.' >'.$icon.'<span class="title">'.$item["label"].'</span></li>' : '<li class="dropdown-header '.$class.'">'.$icon.' '.$item["label"].'</li>';
		              //This menu can have 2 levels 
		              if( isset($item["children"]) )
		              {
		                  foreach( $item["children"] as $item2 )
		                  {
		                      $onclick2 = (isset($item2["onclick"])) ? 'onclick="'.$item2["onclick"].'"' : ""; 
		                      $class = (isset($item2["class"])) ? 'class="'.$item2["class"].'"' : "";
		                      $href2 = "javascript:;";
				              if( isset($item2["href"]) )
				              {
				              	if(stripos($item2["href"], "http") >= 0 || stripos($item2["href"], "#") >=0 )
				              		$href2 = $item2["href"];
				              	else
				              		$href2 = Yii::app()->createUrl($item2["href"]); 
				              	}
		                      $icon = (isset($item2["iconClass"])) ? '<i class="'.$item2["iconClass"].'"></i>' : '';
		                      $iconStack = "";
		                      if((isset($item2["iconStack"]))){
		                      	$iconStack .= '<span class="fa-stack">';
		                      	foreach( $item2["iconStack"] as $i )
				                {
				                	$iconStack .= '<i class="'.$i.'"></i>';
				                }
		                      	$iconStack .= '</span>';
		                      }
		                      echo '<li><a href="'.$href2.'" '.$class.' '.$onclick2.'>'.$icon.''.$iconStack.' '.$item2["label"].'</a></li>';
		                  }
		              }else
		                echo ($href) ? "</a>" : "";
		          }
		       ?>
				
			</ul>
		</li>
		<?php }*/ ?>
		<li class="collapse_wrap">
			
			<div class="trigger collapse_trigger" id="searchForm">
				<i class="fa fa-search"></i>
			</div>

			<form class="inner">
				<input class='hide' id="searchId" name="searchId"/>
				<input class='hide' id="searchType" name="searchType"/>
				<input id="searchBar" name="searchBar" type="text" placeholder="Que recherchez-vous ?">
					<ul class="dropdown-menu" id="dropdown_searchTop" style="">
						<ol class="li-dropdown-scope">-</ol>
					</ul>
				</input>
			</form>

		</li>

		<li class="collapse_wrap">
			<a href="#" class="sb-toggle-right trigger">
				<i class="fa fa-globe toggle-icon"></i>
				<?php if( !empty( $this->notifications )  ){?>
				<span class="notifications-count topbar-badge badge badge-danger animated bounceIn"><?php count($this->notifications); ?></span>
				<?php } ?>
			</a>
		</li>

		

	</ul>
	<li class="dropdown pull-right">
		<a href="#" data-close-others="true" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">
			<img  style="float:right;margin:13px; height:35px;" src="<?php echo ($this->module) ? $this->module->assetsUrl."/images/logoSMclean.png" : Yii::app()->baseUrl."/images/logo/byPH.png" ?>"/>
		</a>
		<ul class="dropdown-menu">
			 <?php 
			 	if(isset(Menu::$infoMenu))
	          	{
	          		foreach( Menu::$infoMenu as $item )
			        {
			            Menu::buildLi2( $item );
			        }
			    }
	          ?>
		</ul>
	</li>
</header>
<!-- end: TOP NAVIGATION MENU -->

<script type="text/javascript">

	var timeout;
	var mapIconTop = {
	    "default" : "fa-arrow-circle-right",
	    "citoyen":"<?php echo Person::ICON ?>", 
	    "NGO":"<?php echo Organization::ICON ?>",
	    "LocalBusiness" :"<?php echo Organization::ICON_BIZ ?>",
	    "Group" : "<?php echo Organization::ICON_GROUP ?>",
	    "group" : "<?php echo Organization::ICON ?>",
	    "association" : "<?php echo Organization::ICON ?>",
	    "GovernmentOrganization" : "<?php echo Organization::ICON_GOV ?>",
	    "event":"<?php echo Event::ICON ?>",
	    "project":"<?php echo Project::ICON ?>",
	    "city": "<?php echo City::ICON ?>"
	  };

	jQuery(document).ready(function() 
	{

		$("#filterField").keyup(function(e){
			var str = $("#filterField").val();
			getFieldFilter(str, 2);
		});

		$("#filterCpField").keyup(function(e){
			var str = $("#filterCpField").val();
			getFieldFilter(str, 3);
		})

		$('#searchBar').keyup(function(e){
		    var name = $('#searchBar').val();
		    if(name.length>=3){
		    	clearTimeout(timeout);
		    	timeout = setTimeout('autoCompleteSearch("'+name+'")', 500);
		    }else{
		    	$("#dropdown_searchTop").css("display", "none");
		    }		
		});

		$("#searchForm").on("click", function(){
			$("dropdown_searchTop").css("display", "none");
		});

		$("#sbToogle").on("click", function(){
			getInfo();
		})
		// ---------- TAGS ------------
		if( window.localStorage && typeof localStorage!='undefined' && localStorage.myTagsCount )
			$(".tags-count").html(localStorage.myTagsCount);
		
		
		
		//-----Pluger Map ici-----

		$('#sigNetwork').keypress(function(e){
			if(e.keyCode == 13){
				var searchValue = $('#sigNetwork').val();
				checkListElementMap(map1)
			}
		});
		$('#searchBar').keypress(function(e){
			if(e.keyCode == 13){
				var type = $("#searchType").val();
				var id = $("#searchId").val();
				if(id != ""){
					window.location.href = baseUrl+"/" + moduleId + "/"+type+"/dashboard/id/"+id;
				}
				
			}
		});

		if($(".tooltips").length) {
	 		$('.tooltips').tooltip();
	 	}
	});

	
	function addEventOnSearch() {
		$('.searchEntry').off().on("click", function(){
			setSearchInput($(this).data("id"), $(this).data("type"));
		});
	}

	function setSearchInput(id, type){
		if(type=="citoyen"){
			type = "person";
		}
		window.location.href=baseUrl+"/" + moduleId + "/"+type+"/dashboard/id/"+id;
		/*
		$("#searchBar").val(name);
		$("#searchId").val(id);
		$("#searchType").val(type);
		$("#dropdown_searchTop").css({"display" : "none" });*/	
	}

	function autoCompleteSearch(name){
		var data = {"name" : name};
		$.ajax({
			type: "POST",
	        url: baseUrl+"/" + moduleId + "/search/globalautocomplete",
	        data: data,
	        dataType: "json",
	        success: function(data){
	        	if(!data){
	        		toastr.error(data.content);
	        	}else{
					str = "";
					var city, postalCode = "";
		 			$.each(data, function(i, v) {
		 				mylog.log(v, v.length, v.size);
		 				var typeIco = i;
		 				if(v.length!=0){
		 					$.each(v, function(k, o){
		 						city = "";
								postalCode = "";
		 						if(o.type){
			 						typeIco = o.type;
			 					}
			 					if (o.address != null) {
	 								city = o.address.addressLocality;
	 								postalCode = o.address.postalCode;
	 							}
			 					str += 	"<div class='searchList li-dropdown-scope' ><ol>"+
			 							"<a href='#'' data-id='"+ o._id["$id"] +"' data-type='"+ i +"' class='searchEntry'>"+
			 							"<span><i class='fa "+mapIconTop[typeIco]+"'></i></span>  " + o.name +
			 							"<span class='city-search'> "+postalCode+" "+city+"</span>"+
			 							"</a></ol></div>";
			 				})
		 				}
		  			}); 
		  			if(str == "") str = "<ol class='li-dropdown-scope'>Aucun résultat</ol>";
		  			$("#dropdown_searchTop").html(str);
		  			$("#dropdown_searchTop").css({"display" : "inline" });
		  			addEventOnSearch();
	  			}
			}	
		})
	}


	function getFieldFilter(str, col){
		if(str.length>=3){
			setDropdown(str, col);
			if(typeof(oTableOrganization)!= "undefined"){
				oTableOrganization.DataTable().column( col ).search( str , true , true ).draw();
			}
			if(typeof(oTableEvent)!= "undefined"){
				oTableEvent.DataTable().column( col ).search( str , true , true ).draw();
			}
			if(typeof(oTablePeople)!= "undefined"){
				oTablePeople.DataTable().column( col ).search( str , true , true ).draw();
			}
			if(typeof(oTableProject)!= "undefined"){
				oTableProject.DataTable().column( col ).search( str , true , true ).draw();
			}
		}
		else{
			closeDropdown(str, col);
			if(typeof(oTableOrganization)!= "undefined"){
				oTableOrganization.DataTable().column( col ).search( "" , true , true ).draw();
			}
			if(typeof(oTableEvent)!= "undefined"){
				oTableEvent.DataTable().column( col ).search( "" , true , true ).draw();
			}
			if(typeof(oTablePeople)!= "undefined"){
				oTablePeople.DataTable().column( col ).search( "" , true , true ).draw();
			}
			if(typeof(oTableProject)!= "undefined"){
				oTableProject.DataTable().column( col ).search( "" , true , true ).draw();
			}
		}
	}

	function setDropdown(str, location){
		var htmlres="";
		var arrayFilter;
		if(location == 2 && typeof(contextTags)!="undefined"){
			arrayFilter = contextTags;
		}else if(typeof(contextCp)!="undefined"){
			arrayFilter = contextCp;
		}
		if(typeof(arrayFilter)!="undefined"){
			for(var i = 0; i<arrayFilter.length; i++){
				if(arrayFilter[i].toLowerCase().indexOf(str.toLowerCase())>=0)
					htmlres += "<div class='searchList li-dropdown-scope' ><ol><a href='javascript:setTagsInput(\""+arrayFilter[i]+"\")'>" + arrayFilter[i] + "</a></ol></div>";
			}
			if(htmlres == "") htmlres = "<ol class='li-dropdown-scope'>Aucun résultat</ol>";
			if(location == 2){
				$("#dropdownTags").html(htmlres);
				$("#dropdownTags").css({"display" : "inline" });
			}
			else{
				$("#dropdownCp").html(htmlres);
				$("#dropdownCp").css({"display" : "inline" });
			}
			
		}
		
	}

	function setTagsInput(tags){
		$("#dropdownTags").css({"display" : "none" });
		$("#filterField").val(tags);
		if(typeof(oTableOrganization)!= "undefined"){
			oTableOrganization.DataTable().column( 2 ).search( tags , true , true ).draw();
		}
		if(typeof(oTableEvent)!= "undefined"){
			oTableEvent.DataTable().column( 2 ).search( tags , true , true ).draw();
		}
		if(typeof(oTablePeople)!= "undefined"){
			oTablePeople.DataTable().column( 2 ).search( tags , true , true ).draw();
		}
		if(typeof(oTableProject)!= "undefined"){
			oTableProject.DataTable().column( 2 ).search( tags , true , true ).draw();
		}
	}

	function closeDropdown(str, location){
		if(location == 2){
			$("#dropdownTags").css({"display" : "none" });
		}else{
			$("#dropdownCp").css({"display" : "none" });
		}
		
	}

	function popinInfo (title,message) {
		title = (title != "") ? title : "Popin info";
	    message = (message != "") ? message : "This feature isn't available yet";
		bootbox.dialog({
	            title: "<b class='text-bold text-red'>"+title+"</b>",
	            message: message,
	        }
	    );

	}

	function openViewer () { 
		var pathtab = window.location.href.split("#");
		mylog.log("openViewer",pathtab[0]);
		var idToSend = "<?php if(isset($_GET['id'])) echo $_GET['id']; else if(isset(Yii::app()->session["userId"])) echo Yii::app()->session["userId"];?>"
		if(typeof idToSend != 'undefined' && idToSend!='')
			openSubView('Network Viewer', '/communecter/graph/viewer/id/'+idToSend+'/type/<?php echo Yii::app()->controller->id ?>', null,null,function(){clearViewer();})
		else
			popinInfo("Network Graph Feature Unavailable", "This context hasn't been prepared to be viewed as a graph.");
	}
	
	var activeFilters = [];
	function bindTagEvents () { 
		$(".btn-my-tag, .btn-context-tag").off().on("click",function(){
			if(!$(this).hasClass("active"))
				$(this).addClass("active");
			else 
				$(this).removeClass("active");

			if(applyTagFilter && $.isFunction(applyTagFilter) ){
				count = applyTagFilter();
				$('.slidingbarTitle2Count').html('( '+count+' items found )');
			}
		});
		$(".btn-my-scope,.btn-context-scope").off().on("click",function(){
			if(!$(this).hasClass("active"))
				$(this).addClass("active");
			else 
				$(this).removeClass("active");

			if(applyScopeFilter && $.isFunction(applyScopeFilter) ){
				count = applyScopeFilter();
				$('.slidingbarTitleScopeCount').html('( '+count+' items found )');
			}
		});
		
		// ---------- SCOPES ------------
		$('.addScopeBtn, .addTagBtn').off().on("click",function(e){
			toastr.info('TODO : show add Scope Form!');
		});
	}

	var openSlideBarType = null;
	function  buildTagSlideBar (json) 
	{ 
		openSlideBarType = "tags"; 
		btnHTML = " <a href='#' class='addTagBtn btn btn-light-orange btn-xs'><i class='fa fa-plus'></i></a> ";
		$(".slidingbarTitle").html('<i class="fa fa-tags text-azure"></i> All your tags '+btnHTML);

		//Gather and activate personnal tags
		if ( debug || ( window.localStorage && typeof localStorage!='undefined' && !localStorage.myTags ) ) 
		{
			if(json.result && json.tags.length )
			{
				localStorage.myTagsCount = json.tags.length;
				var strHTML = buildTagListHTML (json.tags, json.activeTags, "btn-my-tag" );
				localStorage.myTags = strHTML;

				$(".slidingbarList").html( localStorage.myTags );
				$(".tags-count").html(localStorage.myTagsCount);
			} else {
				$(".slidingbarList").html("you don't have any tags, simply add some <a href='#'  class='addTagBtn btn btn-orange btn-xs'><i class='fa fa-plus'></i></a> ");
			}
		} else {
			mylog.log("localStorage.myTags exists ");
			$(".slidingbarList").html(localStorage.myTags);
			$(".tags-count").html(localStorage.myTagsCount);
		}

		//ADD context Tags
		if( contextMap.tags && contextMap.tags.length )
		{
			$(".slidingbarList").append( '<div class="space1"><li><h1 class="h1 slidingbarTitle2"><i class="fa fa-tags text-azure"></i> Context tags <span class="slidingbarTitle2Count"></span></h1></li><div class="space1">' );
			strHTML = buildTagListHTML ( contextMap.tags, null,"btn-context-tag");
			$(".slidingbarList").append( strHTML );
		}

		bindTagEvents ();
	}

	function buildTagListHTML (tagsArray,activeTags,classBtn,type) 
	{ 
		var strHTML = "";
		var classBtn = (classBtn) ? classBtn : "" ;
		$.each( tagsArray , function( k , v ) { 
			var active = (activeTags && inArray(v, activeTags)) ? "active" : "";
			if(!type)
				type = k;
			var metas = (openSlideBarType == "scope" ) ? ' data-val="'+v+'" data-type="'+type+'" ' : ' data-id="'+v+'" ';
			var lbl = (openSlideBarType == "scope" ) ? type+":"+v : v;
			strHTML += '<li><span class="btn btn-xs btn-tag '+classBtn+' '+active+'" '+metas+'><a href="#" class="del fa fa-times"></a> <i class="fa fa-tag"></i> '+lbl+'</span></li>';
		});
		return strHTML;
	}

	function buildScopeSlideBar (json) {
		openSlideBarType = "scope"; 
		btnHTML = "<a href='#'  class='addTagBtn btn btn-xs btn-orange'><i class='fa fa-plus'></i></a> ";
		$(".slidingbarTitle").html('<i class="fa fa-circle-o text-azure"></i> Tous vos térritoires : Géographique, Administratif, Organisations '+btnHTML);
		if ( ( window.localStorage && typeof localStorage!='undefined' && !localStorage.myScope ) ) 
		{	
			mylog.log("rebuild localStorage.myScope");
			$(".slidingbarList").html("<i class='fa fa-circle-o-notch fa-spin fa-3x'></i>");
			mylog.dir( json );
			if(json.result && Object.keys(json.scopes).length  )
			{
				var strHTML = "";
				localStorage.myScopeCount = Object.keys(json.scopes).length;
				if( Object.keys(json.scopes).length )
				{
					var strHTML = buildTagListHTML ( json.scopes , json.activeScopes, "btn-my-scope" );
					localStorage.myScope = strHTML;
				}

				$(".slidingbarList").html( localStorage.myScope );
				$(".scopes-count").html(localStorage.myScopeCount);
			} else {
				$(".slidingbarList").html("you don't have any scopes, simply add some <a href='#' class='addScopeBtn btn btn-orange'> <i class='fa fa-plus '></i> </a> ");
			}
		}
		else{
			mylog.log("localStorage.myScope exists ");
			$(".slidingbarList").html(localStorage.myScope);
		}

		//ADD context Tags
		if( contextMap.scopes && ( contextMap.scopes.codeInsee.length ||contextMap.scopes.codePostal.length ||contextMap.scopes.region.length) )
		{
			strHTML = "";
			if(contextMap.scopes.codeInsee.length)
				strHTML += buildTagListHTML ( contextMap.scopes.codeInsee , null,"btn-context-scope","codeInsee");
			
			if(contextMap.scopes.codePostal.length)
				strHTML += buildTagListHTML ( contextMap.scopes.codePostal , null,"btn-context-scope","codePostal");
			
			if(contextMap.scopes.region.length)
				strHTML += buildTagListHTML ( contextMap.scopes.region , null,"btn-context-scope","region");
			
			if(strHTML != "")
				$(".slidingbarList").append( '<div class="space1"><li><h1 class="h1 slidingbarTitleScope"><i class="fa fa-circle-o text-azure"></i> Context Scopes <span class="slidingbarTitleScopeCount"></span></h1></li><div class="space1">' );
			$(".slidingbarList").append( strHTML );
		}
		bindTagEvents ();
	}
	function openSlideBar(type)
	{
		mylog.log("openSlideBar",type);
		$(".slidingbar").slideDown();
		if ( debug || ( window.localStorage && typeof localStorage!='undefined' && !localStorage.myData ) ) 
		{	
			$(".slidingbarList").html("<i class='fa fa-circle-o-notch fa-spin fa-3x'></i>");
			$.ajax({
				url : baseUrl+"/" + moduleId +'/person/data',
				dataType : 'json',
				success : function(json) 
				{
					if( type == "tags")
						buildTagSlideBar (json);
					else if( type == "scope")
						buildScopeSlideBar (json);
				}
			});
		}
		else{
			if( type == "tags")
				buildTagSlideBar (json);
			else if( type == "scope")
				buildScopeSlideBar (json);
		}
	}

	function closeSlideBar() {  
		mylog.log("closeSlideBar",openSlideBarType);
		$(".topBtn").removeClass("open active");
		openSlideBarType = null;
	}

</script>	
