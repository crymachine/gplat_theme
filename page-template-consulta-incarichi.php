<?php
/**
 * Template Name: consulta incarichi
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

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
	    	<h2 class="font-light m-b-xs"><?php echo __('Immobili', gplat_textdomain) . ' - ' . __('Lista Incarichi', gplat_textdomain); ?></h2>
            <small><?php _e('Inserire qui una descrizione lunga a piacere sull\'utilizzo di questa pagina e delle sue funzionalità.', gplat_textdomain); ?></small>
        </div>
    </div>
</div>
<div class="content">
	<div class="row" style="margin-bottom:20px;">
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/aggiungi-scheda'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-calendar-plus-o"></i><br/><?php _e('Aggiungi Scheda', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-notizie'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-list"></i><br/><?php _e('Consulta Notizie', gplat_textdomain); ?><span class="label label-info" style="margin-left:5px;">2</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/consulta-incarichi'); ?>" class="btn btn-primary btn-block" style="height:70px;"><i class="fa fa-tasks"></i><br/><?php _e('Consulta Incarichi', gplat_textdomain); ?><span class="label label-warning" style="margin-left:5px;">4</span></a></div>
        <div class="col-lg-1"></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/gestione-incarichi'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-check-square-o"></i><br/><?php _e('Gestione Incarichi', gplat_textdomain); ?></a></div>
        <div class="col-lg-2"><a href="<?php echo home_url('immobile/schede-da-assegnare'); ?>" class="btn btn-default btn-block btn-outline" style="height:70px;"><i class="fa fa-user-plus"></i><br/><?php _e('Schede da Assegnare', gplat_textdomain); ?></a></div>
	</div>
</div>

<?php get_footer(); ?>