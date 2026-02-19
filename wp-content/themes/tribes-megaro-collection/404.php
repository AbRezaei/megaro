<?php get_header(); ?>

<section class="error404-page" aria-labelledby="error404-title">
  <div class="error404-page__inner">
    <p class="error404-page__code">404</p>
    <h1 id="error404-title" class="error404-page__title"><?php esc_html_e('Page Not Found', 'tribes-barnham'); ?></h1>
    <p class="error404-page__text"><?php esc_html_e('The page you are looking for does not exist or may have moved.', 'tribes-barnham'); ?></p>

    <div class="error404-page__actions">
      <a class="btn-fill" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html_e('Back To Home', 'tribes-barnham'); ?></a>
    </div>

  </div>
</section>

<style>
  .error404-page {
    min-height: calc(100vh - 220px);
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 4rem 1rem;
    background: rgba(0, 0, 0, .5);
  }

  .error404-page__inner {
    width: 100%;
    max-width: 42rem;
    text-align: center;
    background: #fff;
    border: 1px solid rgba(25, 41, 89, 0.15);
    border-radius: 0.75rem;
    padding: 2rem 1.25rem;
    box-shadow: 0 14px 30px rgba(25, 41, 89, 0.08);
  }

  .error404-page__code {
    margin: 0;
    font-size: clamp(3rem, 12vw, 5.5rem);
    line-height: 1;
    font-weight: 700;
    color: rgb(25, 41, 89);
  }

  .error404-page__title {
    margin: 0.75rem 0 0;
    color: rgb(25, 41, 89);
    font-size: clamp(1.5rem, 4vw, 2.25rem);
    line-height: 1.2;
    font-weight: 700;
  }

  .error404-page__text {
    margin: 0.75rem auto 0;
    max-width: 34rem;
    color: #3f4f7a;
    font-size: 1.1rem;
    line-height: 1.45;
  }

  .error404-page__actions {
    margin-top: 1.5rem;
  }

  .error404-page__search {
    margin: 1.5rem auto 0;
    max-width: 30rem;
    display: grid;
    gap: 0.75rem;
    grid-template-columns: 1fr auto;
  }

  .error404-page__search input {
    width: 100%;
    min-height: 2.8rem;
    border: 1px solid rgba(25, 41, 89, 0.28);
    border-radius: 0.375rem;
    padding: 0 0.9rem;
    color: rgb(25, 41, 89);
    background: #fff;
  }

  .error404-page__search input:focus {
    outline: 2px solid rgba(25, 41, 89, 0.3);
    outline-offset: 0;
    border-color: rgb(25, 41, 89);
  }

  @media (max-width: 640px) {
    .error404-page {
      min-height: calc(100vh - 170px);
      padding: 2.5rem 1rem;
    }

    .error404-page__search {
      grid-template-columns: 1fr;
    }

    .error404-page__search .btn-outline {
      width: 100%;
    }
  }
</style>

<?php get_footer(); ?>
