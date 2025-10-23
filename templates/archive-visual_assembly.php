<?php
/**
 * Archive Template for Visual Assemblies
 */

get_header();
?>

<main class="vad-container">
  <h1 class="vad-title">Visual Assemblies Directory</h1>

  <!-- Search Form -->
  <form method="get" class="vad-search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <input type="text" name="s" placeholder="Search assemblies..." value="<?php echo get_search_query(); ?>" />
    <input type="hidden" name="post_type" value="visual_assembly" />
    <button type="submit">Search</button>
  </form>

  <div class="vad-grid">
    <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="vad-item">
          <a href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <div class="vad-thumb"><?php the_post_thumbnail('medium'); ?></div>
            <?php endif; ?>

            <h2 class="vad-item-title"><?php the_title(); ?></h2>
            <p class="vad-item-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
          </a>
        </article>
      <?php endwhile; ?>
    <?php else : ?>
      <p>No Visual Assemblies found.</p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>
