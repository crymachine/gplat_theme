<form action="<?php echo home_url(); ?>" method="get" class="form-horizontal">
	<div class="form-group">
        <div class="col-sm-12">
			<input type="text" name="s" id="search" placeholder="<?php _e('Prova a scrivere qua quello che stavi cercando...', 'gplat'); ?>" value="<?php the_search_query(); ?>" class="form-control">
		</div>		
	</div>
	<div class="form-group">
		<div class="col-sm-4 text-center">
			<a href="<?php echo home_url(); ?>" class="btn btn-primary btn-block"><?php _e('Homepage', 'gplat'); ?></a>
		</div>
		<div class="col-sm-8 text-center">
			<button type="submit" class="btn w-xs btn-success btn-block"><?php _e('Cerca', 'gplat'); ?></button>
		</div>
	</div>
</form>