<?php
/**
 * Template Name: consulta notizie
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
    div#map_container{padding:0px !important;}
    div#map {width:100%;height:200px;}
</style>
<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
	    	<h2 class="font-light m-b-xs"><?php echo __('Immobili', gplat_textdomain) . ' - ' . __('Lista Notizie', gplat_textdomain); ?></h2>
            <small><?php _e('Inserire qui una descrizione lunga a piacere sull\'utilizzo di questa pagina e delle sue funzionalità.', gplat_textdomain); ?></small>
        </div>
    </div>
</div>
<div class="content">
	<div class="row" style="margin-bottom:20px;">
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/aggiungi-scheda'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-calendar-plus-o"></i><br/><?php _e('Aggiungi Scheda', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-notizie'); ?>" class="btn btn-primary btn-block" style="height:70px;"><i class="fa fa-list"></i><br/><?php _e('Consulta Notizie', gplat_textdomain); ?><span class="label label-info" style="margin-left:5px;">2</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-incarichi'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-tasks"></i><br/><?php _e('Consulta Incarichi', gplat_textdomain); ?><span class="label label-warning" style="margin-left:5px;">4</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/gestione-incarichi'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-check-square-o"></i><br/><?php _e('Gestione Incarichi', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/schede-da-assegnare'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-user-plus"></i><br/><?php _e('Schede da Assegnare', gplat_textdomain); ?></a></div>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<!-- Filtri panel -->
            <div class="hpanel collapsed">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                    </div>
                    <?php _e('Filtri', gplat_textdomain); ?>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6 border-right">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae ultrices accumsan. Aliquam ornare lacus
                            </p>
                        </div>
                        <div class="col-lg-6 ">
                            <p>
                                posuere lectus et, fringilla augue.<br />
                                ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum tincidunt est vitae  accumsan.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    This is standard panel footer
                </div>
            </div>
		</div>
	</div>

	<div class="row" style="margin-bottom:20px;">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading hbuilt">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <?php printf(_n('E\' presente %d scheda.', 'Sono presenti %d schede', $items_count, gplat_textdomain ), $items_count ); ?>
                </div>
                <div class="panel-body">

                    <div class="row" style="padding-bottom:10px;margin-bottom:20px;border-bottom:1px solid #E4E5E7;">
                        <div class="col-lg-8 border-right float-e-margins">
                            <button class="btn btn-default" type="button" style="margin-right:10px;"><i class="fa fa-check" style="margin-right:5px;"></i>Bianche<span class="label" style="color:#6a6c6f !important;margin-left:5px;">(255)</span></button>
                            <button class="btn btn-success" type="button" style="margin-right:10px;"><i class="fa fa-upload" style="margin-right:5px;"></i>Verdi<span class="label" style="margin-left:5px;">(136)</span></button>
                            <button class="btn btn-warning" type="button" style="margin-right:10px;"><i class="fa fa-paste" style="margin-right:5px;"></i>Gialle<span class="label" style="margin-left:5px;">(130)</span></button>
                            <button class="btn btn-primary pull-right" type="button" style="margin-right:10px;"><i class="fa fa-map-marker" style="margin-right:5px;"></i>Prioritarie<span class="label" style="margin-left:5px;">(5)</span></button>
                            <button class="btn btn-primary pull-right" type="button" style="margin-right:10px;"><i class="fa fa-trash-o" style="margin-right:5px;"></i>Da Sviluppare<span class="label" style="margin-left:5px;">(9)</span></button>
                        </div>
                        <div class="col-lg-4 text-center">
                            Ordinamento<br />Da Ricontattare il | Priorità | Data | Prezzo | Mq | Contatto | Appuntamento
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-10">
                            <div class="hpanel">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a data-toggle="tab" href="#tab-1"><i class="fa fa-clock-o" style="margin-right:5px;"></i><?php _e('Notizie Attive', gplat_textdomain); ?></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-history" style="margin-right:5px;"></i><?php _e('Notizie Storicizzate', gplat_textdomain); ?></a></li>
                                    <li class=""><a data-toggle="tab" href="#tab-2"><i class="fa fa-bar-chart-o" style="margin-right:5px;"></i><?php _e('Rendimento Schedario', gplat_textdomain); ?></a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane active">
                                        <div class="panel-body">
                                            <table id="r_table" class="table table-hover table-sm"></table>
                                        </div>
                                    </div>
                                    <div id="tab-2" class="tab-pane">
                                        <div class="panel-body">
                                            <strong>Donec quam felis</strong>

                                            <p>Thousand unknown plants are noticed by me: when I hear the buzz of the little world among the stalks, and grow familiar with the countless indescribable forms of the insects
                                                and flies, then I feel the presence of the Almighty, who formed us in his own image, and the breath </p>

                                            <p>I am alone, and feel the charm of existence in this spot, which was created for the bliss of souls like mine. I am so happy, my dear friend, so absorbed in the exquisite
                                                sense of mere tranquil existence, that I neglect my talents. I should be incapable of drawing a single stroke at the present moment; and yet.</p>
                                        </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="hpanel hgreen">
                                <div class="panel-heading">
                                    <div class="panel-tools">
                                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                                        <a class="closebox"><i class="fa fa-times"></i></a>
                                    </div>
                                    <?php _e('Notizie su Mappa', gplat_textdomain); ?>
                                </div>
                                <div id="map_container" class="panel-body">
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="panel-footer">&nbsp;</div>
            </div>
        </div>
	</div>
</div>

<?php   function page_script() { ?>
            <script async src="https://maps.googleapis.com/maps/api/js?key=<?php echo gplat_googlemap_apikey; ?>&language=IT&callback=initMap" async defer></script>
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
            <script>
                $(function () {

                    var dt = $('#r_table').DataTable({
                        ajax: "<?php echo gplat_dir_url . 'services/news-service.php?service=get_news' ?>",
                        <?php ui_commons::datatable_options(); ?>
                        columns: [
                            { title: "<?php _e('Rif.', gplat_textdomain) ?>", data: "realestate_news_ref", width: "40px", className: "small text-right", type: "string" },
                            {
                                title: "<?php _e('Notizia', gplat_textdomain) ?>", 
                                data: null,
                                className: "small text-left", 
                                type: "string",
                                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                    var html =  "<strong>" + oData.news_type_text + "</strong> - " + oData.realestate_category_text + ", " + oData.realestate_category_type_text + " (" + oData.realestate_news_square_meters + " mq, " + oData.realestate_news_rooms + " vani)<br />" +
                                                "<?php _e('in zona', gplat_textdomain); ?> " + oData.district_text + ", " +
                                                oData.realestate_news_address
                                    $(nTd).html(html);
                                }
                            },
                            {
                                title: "<?php _e('Richiesta', gplat_textdomain) ?>", 
                                data: null,
                                className: "small text-right", 
                                type: "string",
                                fnCreatedCell: function (nTd, sData, oData, iRow, iCol) {
                                    var html =  numeral(oData.realestate_news_price).format("$ 0,0.0");
                                    $(nTd).html(html);
                                }
                            },				
                        ],
                    }); 

                });
            </script>
<?php   }
add_action('wp_footer', 'page_script', 50);
?>

<?php get_footer(); ?>