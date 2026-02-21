<?php

add_action('wp_ajax_load_blog_posts', 'load_blog_posts');
add_action('wp_ajax_nopriv_load_blog_posts', 'load_blog_posts');

function load_blog_posts()
{
    if (!isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'blog_nonce')) {
        wp_send_json_error('Permission denied');
    }

    $paged = intval($_POST['page']);
    $cat = sanitize_text_field($_POST['category']);

    if ($cat && $cat !== 'all') {

        $term = get_term_by('slug', $cat, 'category');

        if (!$term || is_wp_error($term)) {
            $cat = 'all';
        }
    }

    $ppp = intval($_POST['posts_per_page']);

    $args = [
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => $ppp,
        'paged' => $paged,
    ];

    if ($cat !== 'all') {
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field' => 'slug',
                'terms' => $cat,
            ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>

            <div class="flex flex-col">

                <?php if (has_post_thumbnail()): ?>
                    <div class="mb-6">
                        <img src="<?= get_the_post_thumbnail_url() ?>"
                             alt="<?= the_title() ?>"
                             class="w-full lg:h-100! h-55! object-cover object-center">
                    </div>
                <?php endif; ?>
                <div class="grow flex flex-col gap-8">

                    <div class="grow">

                        <p class="text-body-md text-[#737373] mb-4"><?= get_the_date('d M Y'); ?></p>
                        <h4 class="text-heading-4 mb-4"><?= the_title(); ?></h4>
                        <p class="text-body-lg text-[#404040]"><?= wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>

                    </div>
                    <a href="<?php the_permalink(); ?>"
                       class="w-fit text-body-lg underline! underline-offset-4! hover:opacity-70">
                        View article
                    </a>

                </div>

            </div>

        <?php endwhile;
    endif;

    $html = ob_get_clean();

    wp_reset_postdata();

    wp_send_json_success([
        'html' => $html,
        'found_posts' => $query->found_posts,
        'max_pages' => $query->max_num_pages,
    ]);
}