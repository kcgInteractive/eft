<form role="search" method="get" class="searchform" id="searchform" action="<?php echo esc_url(home_url('/')); ?>">
    <label class="screen-reader-text"><?php esc_html_e('Search for:', 'fluid'); ?></label>
    <div class="input-holder clearfix">
        <input type="search" class="search-field" placeholder="<?php esc_html_e('Search...', 'fluid'); ?>" value="" name="s" title="<?php esc_html_e('Search for:', 'fluid'); ?>"/>
        <button type="submit" id="searchsubmit"><?php esc_html_e('Go', 'fluid'); ?></button>
    </div>
</form>