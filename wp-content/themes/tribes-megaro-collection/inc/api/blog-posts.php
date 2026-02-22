<?php
add_action('wp_ajax_fetch_blog_posts', 'fetch_blog_posts');
add_action('wp_ajax_nopriv_fetch_blog_posts', 'fetch_blog_posts');

function fetch_blog_posts(): void
{
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'blog_nonce')) {
        wp_send_json_error('Permission denied');
    }

    $paged = intval($_POST['page']);
    $category = sanitize_text_field($_POST['category']);
    $posts_per_page = intval($_POST['posts_per_page']);

    if ($category && $category !== 'all') {
        $term = get_term_by('slug', $category, 'category');

        if (!$term || is_wp_error($term)) {
            $category = 'all';
        }
    }

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    ];

    if ($category !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $category,
            ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            get_template_part('template-parts/blog-list-item');
        endwhile;
    endif;

    $html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success([
        'html' => $html,
        'found_posts' => $query->found_posts,
        'max_pages' => $query->max_num_pages,
    ]);
}