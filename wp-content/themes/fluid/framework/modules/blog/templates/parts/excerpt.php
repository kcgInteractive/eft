<?php
$excerpt_length = isset($params['excerpt_length']) ? $params['excerpt_length'] : '';
$excerpt = fluid_edge_excerpt($excerpt_length);
?>
<?php if($excerpt !== '') { ?>
    <div class="edgtf-post-excerpt-holder">
        <p itemprop="description" class="edgtf-post-excerpt">
            <?php print $excerpt; ?>
        </p>
    </div>
<?php } ?>
