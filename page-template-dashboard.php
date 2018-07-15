<?php
/**
 * Template Name: dashboard
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
require gplat_dir_path . 'views/commons/ui-commons.php';

$items_count = 10;

    
get_header();
include 'header-default.php'; ?>
<style>
    time.icon *{display: block;width: 100%;font-size: 1em;font-weight: bold;font-style: normal;text-align: center;}
    time.icon{font-size: 0.65em; /* change icon size */display: block;position: relative;width: 7em;height: 7em;background-color: #fff;border-radius: 0.4em;box-shadow: 0 1px 0 #666, 0 2px 0 #fff, 0 3px 0 #ccc, 0 4px 0 #fff, 0 5px 0 #eee, 0 0 0 1px #666;overflow: hidden;}
    time.icon strong{position: absolute;top: 0;padding: 0.4em 0;color: #fff;background-color: #dd0000;border-bottom: 1px dashed #550000;box-shadow: 0 2px 0 #ccc;}
    time.icon em{position: absolute;bottom: 0.3em;color: #888;}
    time.icon span{font-size: 2.8em;letter-spacing: -0.05em;padding-top: 0.8em;color: #222;}
    div#map_container{padding:0px !important;}
    div#map{width:100%;height:250px;}
</style>
<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
	    	<h2 class="font-light m-b-xs"><?php echo __('Dashboard', gplat_textdomain); ?></h2>
            <small><?php _e('Inserire qui una descrizione lunga a piacere sull\'utilizzo di questa pagina e delle sue funzionalità.', gplat_textdomain); ?></small>
        </div>
    </div>
</div>
<div class="content">
    <div class="row" style="margin-bottom:20px;">
        <div class="col-lg-3"><button class="btn btn-primary btn-block" type="button" style="height:70px;"><i class="fa fa-calendar-o"></i><br/><?php _e('Agenda', gplat_textdomain); ?></button></div>
        <div class="col-lg-3"><button class="btn btn-primary btn-block" type="button" style="height:70px;"><i class="fa fa-home"></i><br/><?php _e('Immobili', gplat_textdomain); ?></button></div>
        <div class="col-lg-3"><button class="btn btn-primary btn-block" type="button" style="height:70px;"><i class="fa fa-inbox"></i><br/><?php _e('Richieste Clienti', gplat_textdomain); ?></button></div>
        <div class="col-lg-3"><button class="btn btn-primary btn-block" type="button" style="height:70px;"><i class="fa fa-bar-chart-o"></i><br/><?php _e('Rendimento Immobili', gplat_textdomain); ?></button></div>
	</div>
    
    <div class="row">
        <div class="col-lg-12">

            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <?php _e('Schede su Mappa', gplat_textdomain); ?>
                </div>
                <div id="map_container" class="panel-body">
                    <div id="map"></div>
                </div>
                <div class="panel-footer">
                    122 Notizie | 23 Incarichi
                </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-3">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <i class="fa fa-calendar-o" style="margin-right:5px;"></i><?php _e('Appuntamenti', gplat_textdomain); ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                Non sono previsti appuntamenti per i prossimi 10 giorni.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <i class="fa fa-check-square-o" style="margin-right:5px;"></i><?php _e('Schede e Pendenze da Gestire', gplat_textdomain); ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>
                                Non sono previsti appuntamenti per i prossimi 10 giorni.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        </div>
        <div class="col-lg-2">
        
            <div class="hpanel">
                <div class="panel-body">
                    <div class="text-center">
                        <div class="m">
                            <i class="fa fa-birthday-cake fa-5x"></i>
                        </div>
                        <h2 class="m-b-xs"><?php _e('Compleanni', gplat_textdomain); ?></h2>
                        <p class="font-bold text-success small"><?php printf(__('%d Contatti compiono gli anni oggi.', 5, gplat_textdomain), 5); ?></p>
                        <button class="btn btn-success btn-sm"><?php _e('Mostra', gplat_textdomain); ?></button>
                    </div>
                </div>
            </div>        

        </div>
        <div class="col-lg-4">
            <!-- Incarichi in Scadenza -->
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <i class="fa fa-clock-o" style="margin-right:5px;"></i><?php _e('Incarichi in Scadenza', gplat_textdomain); ?>
                </div>
                <div class="panel-body no-padding">
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="#" title="30/05/2018 - Manca Lettera Rinnovo - Rif: 44/17 - Via Torino">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2 text-center">
                                            <time datetime="2014-09-20" class="icon" title="30/05/2018">
                                                <em>Mercoledì</em>
                                                <strong>Maggio</strong>
                                                <span>30</span>
                                            </time>
                                        </div>
                                        <div class="col-lg-10">
                                            <h5>Manca Lettera Rinnovo</h5>
                                            Rif: 44/17 - Via Torino<br />
                                            <button type="button" class="btn btn-sm btn-default" style="margin-top:5px;" data-container="body" data-toggle="popover" data-placement="left" data-title="Martinelli, Simonetta" data-content="tel: +39 333 9829955">
                                                <i class="fa fa-info-circle" style="margin-right:5px;"></i><?php _e('Mostra Contatto', gplat_textdomain); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="list-group-item ">
                            <a href="#" title="30/06/2018 - Manca Lettera Rinnovo - Rif: 43/17 - Ind: via Paolo Poggi">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-2 text-center">
                                            <time datetime="2014-09-20" class="icon" title="30/06/2018">
                                                <em>Sabato</em>
                                                <strong>Giugno</strong>
                                                <span>30</span>
                                            </time>
                                        </div>
                                        <div class="col-lg-10">
                                            <h5>Manca Lettera Rinnovo</h5>
                                            Rif: 43/17- Ind: via Paolo Poggi<br />
                                            <button type="button" class="btn btn-sm btn-default" style="margin-top:5px;" data-container="body" data-toggle="popover" data-placement="left" data-title="Ranalli, Paolo" data-content="tel: +39 340 3913739">
                                                <i class="fa fa-info-circle" style="margin-right:5px;"></i><?php _e('Mostra Contatto', gplat_textdomain); ?>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        </div>
    </div>
</div>

<?php  
    function page_script() { ?>
        <script async src="https://maps.googleapis.com/maps/api/js?key=<?php echo 'AIzaSyBZNSyCls4CLl8SzFK7j_bxNUeUDp5uiLY'; ?>&callback=initMap" async defer></script>
        <script>
            function initMap() {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (xmlhttp.readyState == XMLHttpRequest.DONE) {
                        if (xmlhttp.status == 200) {
                            var map = new google.maps.Map(document.getElementById("map"), {disableDefaultUI: true, zoom: 10});
                            var bounds = new google.maps.LatLngBounds();
                            var locations = eval(xmlhttp.responseText);
                            for (i = 0; i < locations.length; i++) {
                                var marker = new google.maps.Marker({position: new google.maps.LatLng(locations[i][1], locations[i][2]), map: map});
                                bounds.extend(marker.position);
                                map.fitBounds(bounds);
                            }
                        }
                        else if (xmlhttp.status == 400) {
                            //alert('There was an error 400');
                        }
                        else {
                            //alert('something else other than 200 was returned');
                        }
                    }
                };
                xmlhttp.open("GET", "<?php 	echo gplat_dir_url . 'services/news-service.php?service=get_news_coords&news=' . $realestate_news_id ?>", true);
                xmlhttp.send();
            }            
        </script>
<?php   
    }
    add_action('wp_footer', 'page_script', 50);
?>
<?php get_footer(); ?>