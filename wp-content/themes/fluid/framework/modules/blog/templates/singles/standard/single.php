<?php

fluid_edge_get_single_post_format_html($blog_single_type);

fluid_edge_get_module_template_part('templates/parts/single/author-info', 'blog');

fluid_edge_get_module_template_part('templates/parts/single/single-navigation', 'blog');

fluid_edge_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

fluid_edge_get_module_template_part('templates/parts/single/comments', 'blog');