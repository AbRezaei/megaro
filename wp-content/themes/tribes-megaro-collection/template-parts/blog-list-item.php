<?php

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