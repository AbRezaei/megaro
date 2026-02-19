<?php

class BlogList extends \Elementor\Widget_Base
{
  public function get_name(): string
  {
    return 'blog_list';
  }

  public function get_title(): string
  {
    return 'Blog List';
  }

  public function get_icon(): string
  {
    return 'eicon-post-list';
  }

  public function get_categories(): array
  {
    return ['megaro'];
  }

  protected function register_controls()
  {
    $this->start_controls_section(
        'section_content',
        [
            'label' => esc_html__('Content', 'megaro'),
            'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
        ]
    );

    $this->end_controls_section();
  }

  protected function render()
  {
    $settings = $this->get_settings_for_display();
    $posts_per_page = 12;
    $post_page_url = strtok((isset($_SERVER['HTTPS']) ? 'https://' : 'http://') .
        $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'], '?');

    $active_category = isset($_GET['category']) ? sanitize_text_field($_GET['category']) : 'all';

    $categories = get_categories(array(
        'hide_empty' => true,
        'orderby' => 'name',
        'order' => 'ASC'
    ));


    $paged = (get_query_var('cpage')) ? get_query_var('cpage') : 1;
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
    );

    if ($active_category !== 'all')
      $args['category_name'] = $active_category;

    $query = new WP_Query($args);

    ?>


    <section id="posts-list">

      <div
          x-data="{activeItem: '<?= $active_category; ?>'}"
          class="container"
      >
        <div
            x-data="{isDropdownOpen: false}"
            class="relative md:cursor-default cursor-pointer md:mb-8 mb-6"
        >
          <div
              @click="isDropdownOpen = !isDropdownOpen"
              class="md:hidden flex items-center text-primary border border-primary/20 rounded px-4 py-2"
          >
            <span class="uppercase"><?= $active_category ?></span>
            <div
                class="w-5 size-5 inline-flex items-center justify-center min-w-5 duration-300 ml-auto"
                :class="{'rotate-180': isDropdownOpen}"
            >
              <svg viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd"
                      d="M15 19.1378L22.2262 11.9134L20.9006 10.5859L15 16.4866L9.10124 10.5859L7.77374 11.9134L15 19.1378Z"
                      fill="#192959"
                />
              </svg>
            </div>
          </div>

          <div
              x-show="!$store.page.mobileMode || isDropdownOpen"
              @click.outside="$store.page.mobileMode ? (isDropdownOpen = false) : ''"
              x-collapse
              x-cloak
              x-collapse-on-mobile
              class="md:block! md:h-auto! md:static absolute z-10 top-[calc(100%+2px)] left-0 bg-white md:w-auto w-full lg:text-[28px] md:text-2xl text-primary text-nowrap md:rounded-none rounded md:shadow-none shadow-md md:p-2"
          >
            <div
                class="md:flex gap-8 md:divide-y-0 divide-y divide-primary/10  hidden-scrollbar md:p-0 p-2"
            >

              <a href="<?= $post_page_url . '?category=all' ?>"
                 class="block relative cursor-pointer px-2 py-2 <?= 'all' === $active_category ? 'font-bold!' : '' ?>"
              >
                <span class="uppercase">all</span>
                <div
                    class="md:block hidden absolute -bottom-px -left-0.5 w-[calc(100%+4px)] bg-primary h-1.5 opacity-0 duration-300 <?= 'all' === $active_category ? 'opacity-100!' : '' ?>"
                >
                </div>
              </a>

              <?php foreach ($categories as $category): ?>
                <a href="<?= $post_page_url . '?category=' . $category->slug ?>"
                   class="block relative cursor-pointer px-2 py-2 <?= $category->slug === $active_category ? 'font-bold!' : '' ?>"
                >
                  <span class="uppercase"><?= $category->name ?></span>
                  <div
                      class="md:block hidden absolute -bottom-px -left-0.5 w-[calc(100%+4px)] bg-primary h-1.5 opacity-0 duration-300 <?= $category->slug === $active_category ? 'opacity-100!' : '' ?>"
                  >
                  </div>
                </a>
              <?php endforeach; ?>

            </div>
          </div>
        </div>


        <div>
          <?php
          if ($query->have_posts()):?>
            <div class="grid grid-cols-12 md:gap-x-8 md:gap-y-10 gap-y-8">
              <?php
              while ($query->have_posts()):
                $query->the_post();

                $link = get_permalink();
                $title = get_the_title();
                $thumbnail_id = get_post_thumbnail_id(get_the_ID());
                $thumbnail_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
                $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);
                $short_description = get_field('short_description', get_the_ID());
                $excerpt = wp_trim_words(get_the_excerpt(), 10, '...');
                $excerpt = $short_description ?: $excerpt;
                ?>

                <div class="xl:col-span-4 md:col-span-6 col-span-full">
                  <div class="group relative aspect-square md:rounded-md rounded-lg overflow-hidden md:mb-4 mb-3">
                    <img class="h-full! w-full! object-cover"
                         src="<?php echo esc_url($thumbnail_url); ?>" alt="<?= $thumbnail_alt ?>"
                    >

                    <!-- desktop hover -->
                    <div
                        class="md:flex hidden absolute left-0 top-full group-hover:top-0 h-full w-full flex-col md:items-center md:justify-center justify-end md:text-center text-left bg-black/70 text-white rounded-md duration-300 p-5"
                    >
                      <div class="md:text-[28px] md:leading-9 text-xl font-bold mb-3"> <?= $title ?> </div>
                      <div class="md:block hidden w-24 bg-white h-0.5 rounded mb-4"></div>
                      <div class="md:text-xl text-sm mb-6"> <?= $excerpt ?> </div>
                      <a href="<?= $link ?>" class="btn-outline-2"> VIEW </a>
                    </div>

                    <!-- mobile -->
                    <a href="<?= $link ?>"
                       class="md:hidden flex absolute left-0 top-0 h-full w-full flex-col justify-end bg-[linear-gradient(180deg,rgba(217,217,217,0)_0%,#000000_100%)] text-white rounded-md px-6 py-4"
                    >
                      <div class="font-bold mb-2"> <?= $title ?> </div>
                      <div class="text-sm"> <?= $excerpt ?> </div>
                    </a>
                  </div>

                  <a href="<?= $link ?>" class=" text-primary md:block hidden">
                    <div class="line-clamp-2 text-primary md:text-[28px] md:leading-9 leading-5 font-bold">
                      <?= $title ?>
                    </div>
                  </a>
                </div>
              <?php endwhile; ?>
            </div>


            <div class="blog-list-pagination md:my-24 my-12 flex justify-center gap-2">
              <?php
              echo paginate_links(array(
                  'total' => $query->max_num_pages,
                  'current' => $paged,
                  'format' => '?cpage=%#%',
                  'add_args' => $active_category ? array('category' => $active_category) : false,
              ));
              ?>
            </div>


          <?php else: ?>
            <div class="py-12 text-center text-primary heading-2 ">
              No posts found!
            </div>
          <?php endif;
          wp_reset_postdata(); ?>
        </div>


      </div>

      <script>
        document.addEventListener("DOMContentLoaded", function () {
          const params = new URLSearchParams(window.location.search);
          if (params.has("category")) {
            const postsList = document.getElementById("posts-list");
            if (postsList) {
              postsList.scrollIntoView({behavior: "smooth"});
            }
          }
        });
      </script>
    </section>


    <?php
  }
}
