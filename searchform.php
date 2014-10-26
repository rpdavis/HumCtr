<?php do_action('foundationPress_before_searchform'); ?>
<form role="search" method="get" id="searchform" action="<?php  echo home_url('/'); ?>">
	<div class="column small-9 right no-pad-right">
	<div class="row collapse postfix-round">
		<?php do_action('foundationPress_searchform_top'); ?>
		<div class="small-10 columns ">
			<input type="text" class="radius " name="s" id="s" placeholder="<?php esc_attr_e('Search', 'FoundationPress'); ?>">
		</div>
		<?php do_action('foundationPress_searchform_before_search_button'); ?>
		<div class="small-2 columns">
		     <button type="submit" id="searchsubmit" value="<?php esc_attr_e('', 'FoundationPress'); ?>" class="postfix round button ">
                <i class="fi-magnifying-glass" style="position:relative;font-size:1.3em;color:white;"></i>
                </button>

        </div>
		<?php do_action('foundationPress_searchform_after_search_button'); ?>

	</div>
</div>
</form>

<?php do_action('foundationPress_after_searchform'); ?>
