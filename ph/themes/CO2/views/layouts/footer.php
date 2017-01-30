<?php $layoutPath = 'webroot.themes.'.Yii::app()->theme->name.'.views.layouts.'; ?>
<style>
    .footer-above{
        background-color: #F2F2F2!important;
    }
    .btn-outline{
        background-color: rgba(255,255,255,0.5);
    }



@media screen and (max-width: 1024px) {
    
    .col-footer a.lbh{
        padding: 4px;
        display: inline-block;
    }
}

@media (max-width: 768px) {

    .col-footer-ph{
        text-align: right!important
    }
}

    
</style>
<!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
<div class="radio-tool">
    <a class="btn btn-primary" href="#page-top" data-target="#modalRadioTool" data-toggle="modal">
        <i class="fa fa-microphone"></i>
    </a>
</div>

<div class="scroll-top page-scroll">
    <a class="btn btn-primary" href="#page-top">
        <i class="fa fa-chevron-up"></i>
    </a>
</div>


<?php //if(@$subdomain == "web" || @$subdomain == "social"){ ?>
<!-- Footer -->
<footer class="text-center col-xs-12 pull-left no-padding">
    <div class="footer-below">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 text-left col-footer">
                    <h5><i class="fa fa-info-circle hidden-xs"></i> Informations générales</h5>
                    <a href="#co2.info.p.cgu" class="lbh text-white"><i class="fa fa-angle-right"></i> Conditions d'utilisations</a><br>
                    <a href="#co2.info.p.apropos" class="lbh text-white"><i class="fa fa-angle-right"></i> A propos</a><br>
                    <a href="#co2.info.p.alphatango" class="lbh text-white"><i class="fa fa-angle-right"></i> Alpha Tango</a><br><br>

                    <button class="btn btn-link text-white"  
                        data-toggle="modal" data-target="#modalLogin"><i class="fa fa-lock"></i> Admin</button><br>
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 col-footer-ph">
                    <span class="font-blackoutT text-yellow-PH" style="font-size:20px;">by</span> 
                    <a href="https://github.com/pixelhumain" target="_blank">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/LOGO_PIXEL_HUMAIN.png" height=70>
                    </a><br><br>
                    <a href="https://www.communecter.org/" target="_blank" class=" hidden-xs">
                        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/img/CO2r.png" height=30>
                    </a>
                    <!-- <h5 class="homestead letter-red">COMMUNECTER</h5> -->
                    
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-right col-footer hidden-xs">
                    <h5>Contacter <span class="letter-green">@Alpha_Tango</span> <i class="fa fa-address-card"></i></h5>
                    <ul class="list-inline">
                        <li>
                            <a href="#" class="btn-social btn-outline text-dark"><i class="fa fa-fw fa-github"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline text-dark"><i class="fa fa-fw fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#" class="btn-social btn-outline text-dark"><i class="fa fa-fw fa-envelope-o"></i></a>
                        </li>
                    </ul>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php //} ?>
    


