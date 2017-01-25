<style>
h2 {
	font-family: "Homestead";
  position:relative;
  top:0px;
  left:0px;
  color: #324553;
  
}
ul{
	list-style:none;
}
</style>
<div class="container graph">
    <br/>
    <div class="hero-unit">
    <div class='pull-left' style="width:70%">
        <h2>Actualité Ville de St Joseph</h2>
        <p>Agreger toute les sources d'information locales interressantes pour une commune </p>
        <p>Filtrable par mot clef</p>
    
<?php 

    $content = file_get_contents('http://www.saintjoseph.re/spip.php?page=rss_nouveautes');  
    $x = new SimpleXmlElement($content);  
      
    echo "<ul>";  
      
    foreach($x->channel->item as $entry) {  
        echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";  
    }  
    echo "</ul>";  
?>
</div>
<div class='pull-right' style="width:30%">
<?php 
	$this->widget('application.extensions.YiiTagCloud.YiiTagCloud', 
            array(
                'beginColor' => '00089A',
                'endColor' => 'A3AEFF',
                'minFontSize' => 8,
                'maxFontSize' => 20,
                'arrTags' => array (
            			'Petites Annonces'      => array('weight'=> 6),
                		'Emploi'      => array('weight'=> 9),
                        'Culture'     => array('weight'=> 5),
                        'Évennement'     => array('weight'=> 9),
                        'Action'   => array('weight'=> 8),
                        'Projet'  => array('weight'=> 6),
                        'Surf'     => array('weight'=> 3),
                        'Aménagement'     => array('weight'=> 4),
                        'Marmaille'     => array('weight'=> 9),
                        'Creche'     => array('weight'=> 3),
                        'Handicap'     => array('weight'=> 2),
                        'Guitar'     => array('weight'=> 6),
                        'Tennis'     => array('weight'=> 4),
                        'Football'     => array('weight'=> 9),
                        'Auto'     => array('weight'=> 5),
                        'Moto'     => array('weight'=> 4),
                        'Médecin'     => array('weight'=> 7),
                        'Garagiste'     => array('weight'=> 5),
                        'Restaurant'     => array('weight'=> 9),
                        'Recette'      => array('weight'=> 2),
                        'Artisan'      => array('weight'=> 6),
                        'Epicerie'      => array('weight'=> 2),
                    	'Monnaie Locale'      => array('weight'=> 8),
                        'Actualité'      => array('weight'=> 9),
                        'Arts'      => array('weight'=> 9),
                        'Arts'      => array('weight'=> 5),
                        'Donne Fruit'      => array('weight'=> 6),
                        'Instrument'      => array('weight'=> 4),
                        'Plante'      => array('weight'=> 9),
                        'Jardin Communal'      => array('weight'=> 9),
                        'Femme de ménage'      => array('weight'=> 9),
                        'Jardinage'      => array('weight'=> 5),
                        'Nounou'      => array('weight'=> 4),
                        'Administration'      => array('weight'=> 6),
            			'Assistante Maternelle'      => array('weight'=> 9),
            			'Aide a domicile'      => array('weight'=> 4),
                        'Pharmacie de Garde'      => array('weight'=> 7),
                        'Accident'      => array('weight'=> 9)
                ),
          )
    );
	?>
	</div>
	<div class="clear"></div>
</div></div>
<script type="text/javascript"		>
initT['animInit'] = function(){
(function ani(){
	  TweenMax.staggerFromTo(".container h2", 4, {scaleX:0.4, scaleY:0.4}, {scaleX:1, scaleY:1},1);
})();
};
</script>			