<?php
/**
 * Template Name: aggiungi scheda
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
    div#wizardControl{border-bottom: 1px solid #E4E5E7;padding-bottom:20px;margin-bottom:0px;}
    div#wizardControl > a.wizard-step-first{border-bottom-right-radius: 0px;border-top-right-radius: 0px;}
    div#wizardControl > a.wizard-step{border-radius:0px;}
    div#wizardControl > a.wizard-step-last{border-bottom-left-radius: 0px;border-top-left-radius: 0px;}
    div.wizard-nav{border-top:1px solid #E4E5E7;padding-top:20px;margin:20px -15px 0px -15px;}
    /* div.tab-pane > div.row{margin-bottom:20px;}*/
    /* div.tab-pane > div.row > div h3, div.tab-pane > div.row div h4 {margin:0px 0px 20px 0px !important;} */
    div#map{width:100%;height:300px;background:#eee;border:1px solid rgb(228, 229, 231);border-radius:4px;}
</style>
<div class="normalheader small-header">
    <div class="hpanel">
        <div class="panel-body">
            <a class="small-header-action" href="">
                <div class="clip-header">
                    <i class="fa fa-arrow-up"></i>
                </div>
            </a>
	    	<h2 class="font-light m-b-xs"><?php echo __('Immobili', gplat_textdomain) . ' - ' . __('Aggiungi Scheda', gplat_textdomain); ?></h2>
            <small><?php _e('Inserire qui una descrizione lunga a piacere sull\'utilizzo di questa pagina e delle sue funzionalità.', gplat_textdomain); ?></small>
        </div>
    </div>
</div>
<div class="content">
	<div class="row" style="margin-bottom:20px;">
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/aggiungi-scheda'); ?>" class="btn btn-primary btn-block" style="height:70px;"><i class="fa fa-calendar-plus-o"></i><br/><?php _e('Aggiungi Scheda', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-notizie'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-list"></i><br/><?php _e('Consulta Notizie', gplat_textdomain); ?><span class="label label-info" style="margin-left:5px;">2</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-incarichi'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-tasks"></i><br/><?php _e('Consulta Incarichi', gplat_textdomain); ?><span class="label label-warning" style="margin-left:5px;">4</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/gestione-incarichi'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-check-square-o"></i><br/><?php _e('Gestione Incarichi', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/schede-da-assegnare'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-user-plus"></i><br/><?php _e('Schede da Assegnare', gplat_textdomain); ?></a></div>
	</div>

    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-heading">
                    <div class="panel-tools">
                        <a class="showhide"><i class="fa fa-chevron-up"></i></a>
                        <a class="closebox"><i class="fa fa-times"></i></a>
                    </div>
                    <?php _e('Nuova Scheda', gplat_textdomain); ?>
                </div>
                <div class="panel-body">
                    <div class="text-left m-b-md" id="wizardControl">
                        <a class="btn btn-primary wizard-step-first" disabled href="#step1" data-step="step1" data-toggle="tab"><span class="small"><?php _e('Step 1 di 6', gplat_textdomain); ?></span> - <?php _e('Tipo di Scheda', gplat_textdomain); ?></a>
                        <a class="btn btn-default wizard-step"       disabled href="#step2" data-step="step2" data-toggle="tab"><span class="small"><?php _e('Step 2 di 6', gplat_textdomain); ?></span> - <?php _e('Informazioni Scheda', gplat_textdomain); ?></a>
                        <a class="btn btn-default wizard-step"       disabled href="#step3" data-step="step3" data-toggle="tab"><span class="small"><?php _e('Step 3 di 6', gplat_textdomain); ?></span> - <?php _e('Informazioni Proprietario', gplat_textdomain); ?></a>
                        <a class="btn btn-default wizard-step"       disabled href="#step4" data-step="step4" data-toggle="tab"><span class="small"><?php _e('Step 4 di 6', gplat_textdomain); ?></span> - <?php _e('Informazioni Immobile', gplat_textdomain); ?></a>
                        <a class="btn btn-default wizard-step"       disabled href="#step5" data-step="step5" data-toggle="tab"><span class="small"><?php _e('Step 5 di 6', gplat_textdomain); ?></span> - <?php _e('Commenti', gplat_textdomain); ?></a>
                        <a class="btn btn-default wizard-step-last"  disabled href="#step6" data-step="step6" data-toggle="tab"><?php _e('Fine', gplat_textdomain); ?></a>
                    </div>

                    <div class="tab-content">

                        <div id="step1" class="p-m tab-pane active">
                            <form id="form_step1" method="post" action="">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <h4><?php _e('Tipo di Scheda', gplat_textdomain); ?></h4>
                                        <p class="small">Inserire qui una descrizione dello step del wizard che spiega un pochino come compilare i campi seguenti o semplicemente utilizzare la form...</p>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="row">
                                    <?php $realestate_news_types = R::getAll("SELECT * FROM gplat_wa_news_types");
                                    if($realestate_news_types): ?>
                                    <div class="col-lg12">
                                    <?php foreach($realestate_news_types as $item): ?>
                                        <a href="#" class="btn btn-primary  wizard-nav-button next" data-news-type-id="<?php echo $item['id']; ?>" style="width:<?php echo number_format((float)(100/count($realestate_news_types)), 0, '.', ''); ?>%;height:60px;line-height:45px;"><?php echo $item['text'] ?></a>
                                    <?php endforeach ?>
                                    </div>
                                    <?php else: ?>
                                    <div class="col-lg-12 text-center">
                                        <?php _e('Non ci sono Tipi di Scheda al momento, non è possibile creare la scheda!', gplat_textdomain); ?>
                                    </div>
                                    <?php endif ?>
                                </div>
                            </form>
                        </div>

                        <div id="step2" class="p-m tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><?php _e('Informazioni Scheda', gplat_textdomain); ?></h4>
                                    <p class="small">Inserire qui una descrizione dello step del wizard che spiega un pochino come compilare i campi seguenti o semplicemente utilizzare la form...</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"><?php _e('Categoria', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="realestate_category" name="realestate_category">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                    <?php $realestate_news_categories = R::getAll("SELECT * FROM gplat_wa_realestate_categories");
                                                    foreach($realestate_news_categories as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label"><?php _e('Tipologia', gplat_texdomain); ?></label>
                                        <div class="col-sm-3">
                                            <select class="form-control m-b" id="realestate_category_type" name="realestate_category_type">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label"><?php _e('Data Notizia', gplat_texdomain); ?></label>
                                        <div class="col-sm-2 input-group date" id="datetimepicker1">
                                            <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-1 control-label"><?php _e('Provenienza', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="news_from" name="news_from">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                <?php $realestate_news_categories = R::getAll("SELECT * FROM gplat_wa_news_from");
                                                foreach($realestate_news_categories as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>

                                        <label class="col-sm-1 control-label"><?php _e('Fonte', gplat_texdomain); ?></label>
                                        <div class="col-sm-3">
                                            <select class="form-control m-b" id="news_source" name="news_source">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                            </select>
                                        </div>

                                        <label class="col-sm-1"><?php _e('Altra Agenzia', gplat_textdomain); ?></label>
                                        <label class="col-sm-2">
                                            <div class="icheckbox_square-green" style="position: relative;">
                                                <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs wizard-nav">
                                <a class="btn btn-default  wizard-nav-button prev" href="#"><i class="fa fa-angle-left" style="margin-right:5px;"></i><?php _e('Indietro', gplat_textdomain); ?></a>
                                <a class="btn btn-primary  wizard-nav-button next" href="#"><?php _e('Avanti', gplat_textdomain); ?><i class="fa fa-angle-right" style="margin-left:5px;"></i></a>
                            </div>
                        </div>

                        <div id="step3" class="p-m tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><?php _e('Informazioni Proprietario', gplat_textdomain); ?></h4>
                                    <p class="small">Inserire qui una descrizione dello step del wizard che spiega un pochino come compilare i campi seguenti o semplicemente utilizzare la form...</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Nome', gplat_textdomain); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="realestate_owner_firstname" name="realestate_owner_firstname" />
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Cognome', gplat_textdomain); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="realestate_owner_lastname" name="realestate_owner_lastname" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:15px;">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Email', gplat_textdomain); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="realestate_owner_firstname" name="realestate_owner_firstname" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Telefono', gplat_textdomain); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="realestate_owner_lastname" name="realestate_owner_lastname" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row" style="margin-top:40px;">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="col-sm-12">
                                            <div class="icheckbox_square-green" style="position: relative;margin-right:5px;">
                                                <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            <a href="#" class="text-muted font-normal text-info"><?php _e('Verbale Informativa Privacy', gplat_textdomain); ?></a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs wizard-nav">
                                <a class="btn btn-default  wizard-nav-button prev" href="#"><i class="fa fa-angle-left" style="margin-right:5px;"></i><?php _e('Indietro', gplat_textdomain); ?></a>
                                <a class="btn btn-primary  wizard-nav-button next" href="#"><?php _e('Avanti', gplat_textdomain); ?><i class="fa fa-angle-right" style="margin-left:5px;"></i></a>
                            </div>
                        </div>

                        <div id="step4" class="p-m tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><?php _e('Informazioni Immobile', gplat_textdomain); ?></h4>
                                    <p class="small">Inserire qui una descrizione dello step del wizard che spiega un pochino come compilare i campi seguenti o semplicemente utilizzare la form...</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Zona', gplat_texdomain); ?></label>
                                        <div class="col-sm-10">
                                            <select class="form-control m-b" id="district" name="district">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                    <?php $districts = R::getAll("SELECT * FROM gplat_wa_districts");
                                                    foreach($districts as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Indirizzo Reale', gplat_texdomain); ?></label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="pac-input" name="pac-input">
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top:25px;">
                                        <label class="col-sm-2 control-label"><?php _e('Scala', gplat_texdomain); ?></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label"><?php _e('Interno', gplat_texdomain); ?></label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                        <label class="col-sm-1 control-label"><?php _e('Piano', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="floor" name="floor">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                    <?php $floors = R::getAll("SELECT * FROM gplat_wa_floors");
                                                    foreach($floors as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="map"></div>
                                </div>
                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Tipo Proprietà', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="district" name="district">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                    <?php $realestate_types = R::getAll("SELECT * FROM gplat_wa_realestate_types");
                                                    foreach($realestate_types as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <label class="col-sm-2 control-label"><?php _e('Condizioni Interne', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <select class="form-control m-b" id="district" name="district">
                                                <option value="-1" class="font-bold"><?php _e('Seleziona', gplat_texdomain); ?></option>
                                                    <?php $realestate_types = R::getAll("SELECT * FROM gplat_wa_realestate_types");
                                                    foreach($realestate_types as $item): ?>
                                                <option value="<?php echo $item['id']; ?>" ><?php echo $item['text']; ?></option>
                                                    <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Mq Commerciali', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control">
                                        </div>
                                        <label class="col-sm-2 control-label"><?php _e('N° Vani/Locali', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Posti Auto', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control">
                                        </div>
                                        <label class="col-sm-2 control-label"><?php _e('Box', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top:25px;">
                                        <label class="col-sm-2 control-label"><?php _e('Prezzo Richiesto', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                            <div class="input-group m-b"><span class="input-group-addon">€</span> <input type="number" class="form-control"> <span class="input-group-addon">,00</span></div>
                                        </div>
                                        <label class="col-sm-2 control-label"><?php _e('Attributi Immobile', gplat_texdomain); ?></label>
                                        <div class="col-sm-4">
                                        <?php $relaestate_facilities = R::getAll("SELECT * FROM gplat_wa_realestate_facilities");
                                        foreach($relaestate_facilities as $item): ?>
                                            <label>
                                                <div class="icheckbox_square-green" style="position: relative;margin-left:5px;">
                                                    <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div>
                                                <span class="font-normal">&nbsp;&nbsp;<?php echo $item['text']; ?></span>
                                            </label>
                                            <br />
                                        <?php endforeach; ?>            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs wizard-nav">
                                <a class="btn btn-default  wizard-nav-button prev" href="#"><i class="fa fa-angle-left" style="margin-right:5px;"></i><?php _e('Indietro', gplat_textdomain); ?></a>
                                <a class="btn btn-primary  wizard-nav-button next" href="#"><?php _e('Avanti', gplat_textdomain); ?><i class="fa fa-angle-right" style="margin-left:5px;"></i></a>
                            </div>
                        </div>

                        <div id="step5" class="p-m tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><?php _e('Commenti', gplat_textdomain); ?></h4>
                                    <p class="small">Inserire qui una descrizione dello step del wizard che spiega un pochino come compilare i campi seguenti o semplicemente utilizzare la form...</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                                <div class="col-lg-8">
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label"><?php _e('Aggiungi un commento', gplat_textdomain); ?></label>
                                        <div class="col-sm-10">
                                            <div class="summernote"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label"><?php _e('Da Ricontattare il', gplat_texdomain); ?></label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-8 pull-right">
                                            <div class="icheckbox_square-green" style="position: relative;margin-left:5px;">
                                                <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            <span class="font-normal">&nbsp;&nbsp;<?php _e('Contatto Avvenuto', gplat_textdomain); ?></span>
                                        </label>
                                        <br />
                                        <label class="col-sm-8 pull-right">
                                            <div class="icheckbox_square-green" style="position: relative;margin-left:5px;">
                                                <input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
                                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                            </div>
                                            <span class="font-normal">&nbsp;&nbsp;<?php _e('Non Risponde', gplat_textdomain); ?></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-right m-t-xs wizard-nav">
                                <a class="btn btn-default  wizard-nav-button prev" href="#"><i class="fa fa-angle-left" style="margin-right:5px;"></i><?php _e('Indietro', gplat_textdomain); ?></a>
                                <a class="btn btn-primary  wizard-nav-button next" href="#"><?php _e('Avanti', gplat_textdomain); ?><i class="fa fa-angle-right" style="margin-left:5px;"></i></a>
                            </div>
                        </div>

                        <div id="step6" class="p-m tab-pane">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><?php _e('Fine', gplat_textdomain); ?></h4>
                                    <p class="small">In questo step verrà mostrato il riepilogo di tutti i campi valorizzati...</p>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>
                            <div class="row">
                            </div>
                            <div class="text-right m-t-xs wizard-nav">
                                <a class="btn btn-default  wizard-nav-button prev" href="#"><i class="fa fa-angle-left" style="margin-right:5px;"></i><?php _e('Indietro', gplat_textdomain); ?></a>
                                <a class="btn btn-success submitWizard save-close" href="#"><i class="fa fa-save" style="margin-right:5px;"></i><?php _e('Salva e Chiudi', gplat_textdomain); ?></a>
                                <a class="btn btn-success submitWizard save-manage" href="#"><i class="fa fa-save" style="margin-right:5px;"></i><?php _e('Salva e Gestisci', gplat_textdomain); ?></a>
                                <a class="btn btn-success submitWizard save-add-details" href="#"><i class="fa fa-save" style="margin-right:5px;"></i><?php _e('Salva e Aggiungi Dettagli', gplat_textdomain); ?></a>
                            </div>
                        </div>

                    </div>

                    <div class="m-t-md text-center">
                        <p class="font-trans"><?php _e('Testo da aggiungere al footer del wizard di inserimento nuova scheda notizia...', gplat_textdomain); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php   function page_script() { ?>
            <script>
                function fetch_cascading_dropdown(parentDropDownId, url, childDropDownId) {
                    $("#" + parentDropDownId).on("change", function() {
                        var id = $(this).val();
                        $.ajax({
                            type: "GET",
	                        url: url + id,
                            dataType: 'json',
                            beforeSend: function () {
                                $("#" + childDropDownId).empty();
                                $("#" + childDropDownId).append($("<option value=\"-1\" class=\"font-bold\"><?php _e('Caricamento...', gplat_texdomain); ?></option>"));
                            },
                            success: function(data){
                                $("#" + childDropDownId).empty();
                                $("#" + childDropDownId).append($("<option value=\"-1\" class=\"font-bold\"><?php _e('Seleziona', gplat_texdomain); ?></option>"));
                                $.each(data, function(i, value) {
                                    console.log(value.id, value.text);
                                    $("#" + childDropDownId).append($('<option>').text(value.text).attr('value', value.id));
                                });
                            }
                        });
                    });
                }
                $(function () {
                    var newsTypeId = 0;         // realestate_news_type_id

                    // realestate_category > realestate_category_type
                    fetch_cascading_dropdown("realestate_category", "<?php echo gplat_dir_url . 'services/domains-service.php?service=gplat_get_realestate_category_type_by_parent&parent_id='; ?>", "realestate_category_type");
                    // news_from > news_source
                    fetch_cascading_dropdown("news_from", "<?php echo gplat_dir_url . 'services/domains-service.php?service=gplat_get_news_sources_by_parent&parent_id='; ?>", "news_source");

                    $("#datetimepicker1").datetimepicker();
                    
                    $(".summernote").summernote({
                        toolbar: [
                            ['style', ['bold', 'italic', 'underline', 'clear']],
                            ['font', ['strikethrough', 'superscript', 'subscript']],
                            ['color', ['color']],
                            ['para', ['ul', 'ol', 'paragraph']],
                        ],
                        height: 150,
                    });

                    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
                        $('a[data-toggle="tab"]').removeClass('btn-primary');
                        $('a[data-toggle="tab"]').addClass('btn-default');
                        $(this).removeClass('btn-default');
                        $(this).addClass('btn-primary');
                        console.log($(this));
                    });
                    
                    $('.wizard-nav-button').click(function() {
                        var stepId = 0;
                        var step = $(this);
                        if(newsTypeId ) { 
                            $('#realestate_news_type').val(newsTypeId); 
                        }
                        if(step.hasClass('next')) {
                            stepId = step.parents('.tab-pane').next().attr("id");
                        } else if(step.hasClass('prev')) {
                            stepId = step.parents('.tab-pane').prev().attr("id");
                        }
                        $('a[href="#' + stepId + '"]').tab('show');
                    });
                    
                    $('.submitWizard').click(function(){

                        var approve = $(".approveCheck").is(':checked');
                        if(approve) {
                            // Got to step 1
                            $('[href=#step1]').tab('show');

                            // Serialize data to post method
                            var datastring = $("#wizard_form").serialize();

                            // Show notification
                            swal({
                                title: "Thank you!",
                                text: "You approved our example form!",
                                type: "success"
                            });
                            //            Example code for post form
                            //            $.ajax({
                            //                type: "POST",
                            //                url: "your_link.php",
                            //                data: datastring,
                            //                success: function(data) {
                            //                    // Notification
                            //                }
                            //            });
                        } else {
                            // Show notification
                            swal({
                                title: "Error!",
                                text: "You have to approve form checkbox.",
                                type: "error"
                            });
                        }
                    })
                });
            </script>
            <script>
                function initMap() {

                    var geocoder;
                    var map = new google.maps.Map(document.getElementById('map'), {
                            center: {lat: 43.3253398, lng: 8.3555761},
                            disableDefaultUI: true,
                            zoom: 5
                        });
                    var card = document.getElementById('pac-card');
                    var input = document.getElementById('pac-input');
                    var types = document.getElementById('type-selector');
                    var strictBounds = document.getElementById('strict-bounds-selector');

                    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

                    var autocomplete = new google.maps.places.Autocomplete(input);

                    // Bind the map's bounds (viewport) property to the autocomplete object,
                    // so that the autocomplete requests use the current map bounds for the
                    // bounds option in the request.
                    autocomplete.bindTo('bounds', map);

                    // Set the data fields to return when the user selects a place.
                    autocomplete.setFields(['address_components', 'geometry', 'icon', 'name']);
                    autocomplete.setTypes(['address']);
                    autocomplete.setOptions({strictBounds: true});
                    autocomplete.setComponentRestrictions({'country': ['it']});

                    var infowindow = new google.maps.InfoWindow();
                    var infowindowContent = document.getElementById('infowindow-content');
                    infowindow.setContent(infowindowContent);
                    var marker = new google.maps.Marker({map: map, anchorPoint: new google.maps.Point(0, -29)});

                    autocomplete.addListener('place_changed', function() {
                        infowindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            window.alert("No details available for input: '" + place.name + "'");
                            return;
                        }
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);  // Why 17? Because it looks good.
                        }
                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);

                        var address = '';
                        if (place.address_components) {
                            address = [
                            (place.address_components[0] && place.address_components[0].short_name || ''),
                            (place.address_components[1] && place.address_components[1].short_name || ''),
                            (place.address_components[2] && place.address_components[2].short_name || '')
                            ].join(' ');
                        }

                        infowindowContent.children['place-icon'].src = place.icon;
                        infowindowContent.children['place-name'].textContent = place.name;
                        infowindowContent.children['place-address'].textContent = address;
                        infowindow.open(map, marker);
                    });
                }
            </script>
            <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo gplat_googlemap_apikey;?>&libraries=places&language=IT&callback=initMap" async defer></script>            
<?php   }
add_action('wp_footer', 'page_script', 50);
?>
<?php get_footer(); ?>