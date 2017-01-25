<?php 
$cs = Yii::app()->getClientScript();

$cs->registerScriptFile('http://mbostock.github.com/d3/d3.js?2.6.0' , CClientScript::POS_END);
?>

    	
<script type="text/javascript">
var BrowserDetect = {
		init: function () {
			this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
			this.version = this.searchVersion(navigator.userAgent)
				|| this.searchVersion(navigator.appVersion)
				|| "an unknown version";
			this.OS = this.searchString(this.dataOS) || "an unknown OS";
		},
		searchString: function (data) {
			for (var i=0;i<data.length;i++)	{
				var dataString = data[i].string;
				var dataProp = data[i].prop;
				this.versionSearchString = data[i].versionSearch || data[i].identity;
				if (dataString) {
					if (dataString.indexOf(data[i].subString) != -1)
						return data[i].identity;
				}
				else if (dataProp)
					return data[i].identity;
			}
		},
		searchVersion: function (dataString) {
			var index = dataString.indexOf(this.versionSearchString);
			if (index == -1) return;
			return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
		},
		dataBrowser: [
			{
				string: navigator.userAgent,
				subString: "Chrome",
				identity: "Chrome"
			},
			{ 	string: navigator.userAgent,
				subString: "OmniWeb",
				versionSearch: "OmniWeb/",
				identity: "OmniWeb"
			},
			{
				string: navigator.vendor,
				subString: "Apple",
				identity: "Safari",
				versionSearch: "Version"
			},
			{
				prop: window.opera,
				identity: "Opera",
				versionSearch: "Version"
			},
			{
				string: navigator.vendor,
				subString: "iCab",
				identity: "iCab"
			},
			{
				string: navigator.vendor,
				subString: "KDE",
				identity: "Konqueror"
			},
			{
				string: navigator.userAgent,
				subString: "Firefox",
				identity: "Firefox"
			},
			{
				string: navigator.vendor,
				subString: "Camino",
				identity: "Camino"
			},
			{		// for newer Netscapes (6+)
				string: navigator.userAgent,
				subString: "Netscape",
				identity: "Netscape"
			},
			{
				string: navigator.userAgent,
				subString: "MSIE",
				identity: "Explorer",
				versionSearch: "MSIE"
			},
			{
				string: navigator.userAgent,
				subString: "Gecko",
				identity: "Mozilla",
				versionSearch: "rv"
			},
			{ 		// for older Netscapes (4-)
				string: navigator.userAgent,
				subString: "Mozilla",
				identity: "Netscape",
				versionSearch: "Mozilla"
			}
		],
		dataOS : [
			{
				string: navigator.platform,
				subString: "Win",
				identity: "Windows"
			},
			{
				string: navigator.platform,
				subString: "Mac",
				identity: "Mac"
			},
			{
				   string: navigator.userAgent,
				   subString: "iPhone",
				   identity: "iPhone/iPod"
		    },
			{
				string: navigator.platform,
				subString: "Linux",
				identity: "Linux"
			}
		]

	};
	
initT['animInit'] = function(){
	BrowserDetect.init();
	if(BrowserDetect.browser != "Chrome"){
		alert("désolé cette démo ne fonctionne sur Chrome pour le moment");
		window.location.href="<?php echo Yii::app()->createUrl('index.php/commune/view/cp/'.$_GET['cp'])?>";
	} else {
    	var w = document.width, h = document.height;
    
    	var labelDistance = 0;
    
    	var vis = d3.select("body").append("svg:svg").attr("width", w).attr("height", h);
    
    	var nodes = [];
    	<?php $people = Yii::app()->mongodb->citoyens->find(array("cp"=>$_GET["cp"]));
    	foreach ($people as $p)
    	{?>
    		nodes.push({label:"<?php echo substr($p["email"], 0, stripos($p["email"], "@"))?>"});
    	<?php }	?>
    	
    	var labelAnchors = [];
    	var labelAnchorLinks = [];
    	var links = [
    	  {source:nodes[0],  target:nodes[24], weight:1},
    	  {source:nodes[1],  target:nodes[3], weight:1},
    	  {source:nodes[2],  target:nodes[5], weight:1},
    	  {source:nodes[3],  target:nodes[32], weight:1},
    	  {source:nodes[4],  target:nodes[1], weight:1},
    	  {source:nodes[5],  target:nodes[6], weight:1},
    	  {source:nodes[6],  target:nodes[7], weight:1},
    	  {source:nodes[7],  target:nodes[9], weight:1},
    	  {source:nodes[8],  target:nodes[4], weight:1},
    	  {source:nodes[9],  target:nodes[12], weight:1},
    	  {source:nodes[10], target:nodes[33], weight:1},
    	  {source:nodes[11], target:nodes[12], weight:1},
    	  {source:nodes[12], target:nodes[13], weight:1},
    	  {source:nodes[13], target:nodes[16], weight:1},
    	  {source:nodes[14], target:nodes[38], weight:1},
    	  {source:nodes[15], target:nodes[17], weight:1},
    	  {source:nodes[16], target:nodes[11], weight:1},
    	  {source:nodes[17], target:nodes[18], weight:1},
    	  {source:nodes[18], target:nodes[15], weight:1},
    	  {source:nodes[19], target:nodes[40], weight:1},
    	  {source:nodes[20], target:nodes[22], weight:1},
    	  {source:nodes[21], target:nodes[19], weight:1},
    	  {source:nodes[22], target:nodes[52], weight:1},
    	  {source:nodes[23], target:nodes[52], weight:1},
    	  {source:nodes[24], target:nodes[31], weight:1},
    	  {source:nodes[25], target:nodes[42], weight:1},
    	  {source:nodes[26], target:nodes[42], weight:1},
    	  {source:nodes[27], target:nodes[51], weight:1},
    	  {source:nodes[28], target:nodes[48], weight:1},
    	  {source:nodes[29], target:nodes[38], weight:1},
    	  {source:nodes[30], target:nodes[51], weight:1},
    	  {source:nodes[31], target:nodes[29], weight:1},
    	  {source:nodes[32], target:nodes[1],  weight:1},
    	  {source:nodes[33], target:nodes[34], weight:1},
    	  {source:nodes[34], target:nodes[10], weight:1},
    	  {source:nodes[35], target:nodes[36], weight:1},
    	  {source:nodes[36], target:nodes[49], weight:1},
    	  {source:nodes[37], target:nodes[39], weight:1},
    	  {source:nodes[38], target:nodes[1],  weight:1},
    	  {source:nodes[39], target:nodes[41], weight:1},
    	  {source:nodes[40], target:nodes[21], weight:1},
    	  {source:nodes[41], target:nodes[29], weight:1},
    	  {source:nodes[42], target:nodes[27], weight:1},
    	  {source:nodes[43], target:nodes[27], weight:1},
    	  {source:nodes[44], target:nodes[46], weight:1},
    	  {source:nodes[45], target:nodes[44], weight:1},
    	  {source:nodes[46], target:nodes[45], weight:1},
    	  {source:nodes[47], target:nodes[45], weight:1},
    	  {source:nodes[48], target:nodes[47], weight:1},
    	  {source:nodes[49], target:nodes[35], weight:1},
    	  {source:nodes[50], target:nodes[25], weight:1},
    	  {source:nodes[51], target:nodes[41], weight:1},
    	  {source:nodes[52], target:nodes[20], weight:1},
    	  {source:nodes[53], target:nodes[23], weight:1},
    	  {source:nodes[0],  target:nodes[15], weight:1},
    	  {source:nodes[1],  target:nodes[29], weight:1},
    	  {source:nodes[2],  target:nodes[6],  weight:1},
    	  {source:nodes[3],  target:nodes[4],  weight:1},
    	  {source:nodes[5],  target:nodes[7],  weight:1},
    	  {source:nodes[7],  target:nodes[11], weight:1},
    	  {source:nodes[8],  target:nodes[10], weight:1},
    	  {source:nodes[9],  target:nodes[11], weight:1},
    	  {source:nodes[11], target:nodes[13], weight:1},
    	  {source:nodes[13], target:nodes[8], weight:1},
    	  {source:nodes[14], target:nodes[32], weight:1},
    	  {source:nodes[15], target:nodes[33], weight:1},
    	  {source:nodes[16], target:nodes[17], weight:1},
    	  {source:nodes[17], target:nodes[0], weight:1},
    	  {source:nodes[18], target:nodes[0], weight:1},
    	  {source:nodes[19], target:nodes[22], weight:1},
    	  {source:nodes[20], target:nodes[40], weight:1},
    	  {source:nodes[21], target:nodes[22], weight:1},
    	  {source:nodes[23], target:nodes[20], weight:1},
    	  {source:nodes[24], target:nodes[15], weight:1},
    	  {source:nodes[25], target:nodes[26], weight:1},
    	  {source:nodes[26], target:nodes[43], weight:1},
    	  {source:nodes[28], target:nodes[49], weight:1},
    	  {source:nodes[30], target:nodes[28], weight:1},
    	  {source:nodes[31], target:nodes[34], weight:1},
    	  {source:nodes[34], target:nodes[15], weight:1},
    	  {source:nodes[35], target:nodes[30], weight:1},
    	  {source:nodes[36], target:nodes[48], weight:1},
    	  {source:nodes[37], target:nodes[2], weight:1},
    	  {source:nodes[38], target:nodes[8], weight:1},
    	  {source:nodes[39], target:nodes[51], weight:1},
    	  {source:nodes[40], target:nodes[52], weight:1},
    	  {source:nodes[43], target:nodes[46], weight:1},
    	  {source:nodes[44], target:nodes[47], weight:1},
    	  {source:nodes[46], target:nodes[51], weight:1},
    	  {source:nodes[48], target:nodes[44], weight:1},
    	  {source:nodes[50], target:nodes[20], weight:1},
    	  {source:nodes[51], target:nodes[44], weight:1},
    	  {source:nodes[53], target:nodes[20], weight:1},
    	  {source:nodes[13], target:nodes[17], weight:1},
    	  {source:nodes[14], target:nodes[24], weight:1},
    	  {source:nodes[19], target:nodes[23], weight:1},
    	  {source:nodes[21], target:nodes[53], weight:1},
    	  {source:nodes[35], target:nodes[48], weight:1},
    	  {source:nodes[36], target:nodes[44], weight:1},
    	  {source:nodes[37], target:nodes[14], weight:1},
    	  {source:nodes[50], target:nodes[53], weight:1},
    	  {source:nodes[37], target:nodes[50], weight:1}
    	];
    
    	for(var i = 0; i < nodes.length; i++) {
    	  //var node = {
    	  //	label : "node " + i
    	  //};
    	  //nodes.push(node);
    	  labelAnchors.push({
    	    node : nodes[i]
    	  });
    	  labelAnchors.push({
    	    node : nodes[i]
    	  });
    	};
    
    	for(var i = 0; i < nodes.length; i++) {
    	  //for(var j = 0; j < i; j++) {
    	  //	if(Math.random() > .95)
    	  //		links.push({
    	  //			source : i,
    	  //			target : j,
    	  //			weight : Math.random()
    	  //		});
    	  //}
    	  labelAnchorLinks.push({
    	    source : i * 2,
    	    target : i * 2 + 1,
    	    weight : 1
    	  });
    	};
    
    	var force = d3.layout.force().size([w, h]).nodes(nodes).links(links).gravity(1).linkDistance(50).charge(-3000).linkStrength(function(x) {
    	  return x.weight * 10
    	});
    
    
    	force.start();
    
    	var force2 = d3.layout.force().nodes(labelAnchors).links(labelAnchorLinks).gravity(0).linkDistance(0).linkStrength(8).charge(-100).size([w, h]);
    	force2.start();
    
    	var link = vis.selectAll("line.link").data(links).enter().append("svg:line").attr("class", "link").style("stroke", "#ccc");
    
    	var node = vis.selectAll("g.node").data(force.nodes()).enter().append("svg:g").attr("class", "node");
    	node.append("svg:circle").attr("r", 5).style("fill", "#555").style("stroke", "#FFF").style("stroke-width", 3);
    	node.call(force.drag);
    
    
    	var anchorLink = vis.selectAll("line.anchorLink").data(labelAnchorLinks)//.enter().append("svg:line").attr("class", "anchorLink").style("stroke", "#999");
    
    	var anchorNode = vis.selectAll("g.anchorNode").data(force2.nodes()).enter().append("svg:g").attr("class", "anchorNode");
    	anchorNode.append("svg:circle").attr("r", 0).style("fill", "#fff");
    	anchorNode.append("svg:text").text(function(d, i) {
    	  return i % 2 == 0 ? "" : d.node.label
    	}).style("fill", "#555").style("font-family", "Helvetica").style("font-size", 12);
    
    	var updateLink = function() {
    	  this.attr("x1", function(d) {
    	    return d.source.x;
    	  }).attr("y1", function(d) {
    	    return d.source.y;
    	  }).attr("x2", function(d) {
    	    return d.target.x;
    	  }).attr("y2", function(d) {
    	    return d.target.y;
    	  });
    	  
    	}
    
    	var updateNode = function() {
    	  this.attr("transform", function(d) {
    	    return "translate(" + d.x + "," + d.y + ")";
    	  });
    	  
    	}
    
    
    	force.on("tick", function() {
    	  
    	  force2.start();
    	  
    	  node.call(updateNode);
    	  
    	  anchorNode.each(function(d, i) {
    	    if(i % 2 == 0) {
    	      d.x = d.node.x;
    	      d.y = d.node.y;
    	    } else {
    	      var b = this.childNodes[1].getBBox();
    	      
    	      var diffX = d.x - d.node.x;
    	      var diffY = d.y - d.node.y;
    	      
    	      var dist = Math.sqrt(diffX * diffX + diffY * diffY);
    	      
    	      var shiftX = b.width * (diffX - dist) / (dist * 2);
    	      shiftX = Math.max(-b.width, Math.min(0, shiftX));
    	      var shiftY = 5;
    	      this.childNodes[1].setAttribute("transform", "translate(" + shiftX + "," + shiftY + ")");
    	    }
    	  });
    	  
    	  
    	  anchorNode.call(updateNode);
    	  
    	  link.call(updateLink);
    	  anchorLink.call(updateLink);
    	  
    	});
	}
  
};
</script>