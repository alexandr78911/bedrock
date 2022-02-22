<section class="intro_section">
    <div class="intro">
      <h1><?php the_sub_field('title') ?></h1>
      <div class="intro_info">
        <?php the_sub_field('description') ?>
      </div>
      <ul class="intro_tabs">
        <?php
          $all_categories = get_categories();
          $category_array = array();
          $first = true; 
          foreach( $all_categories as $single_cat ){
            if ( $first ) { ?>
              <li class="active"><a href="#">{!! $single_cat->name !!}</a></li>
            <?php
              $first = false;
            } else { ?>
                <li ><a href="#">{!! $single_cat->name !!}</a></li>
            <?php }
          }
        ?>
      </ul>
    </div>
</section>
<section class="posts">
  <div class="container-x">
      <?php 
        $first = true; 
        foreach( $all_categories as $single_cat ){
          if ( $first ) {
      ?>
        <div class="tabs__content active">
          <?php
          $first = false;
        } else { ?>
        <div class="tabs__content">
          <?php }
            $cat_id = $single_cat->cat_ID;
            if ( have_posts() ) :
            query_posts('cat=' . $cat_id);
            while (have_posts()) : the_post();
          ?>
          <div class="post_item">
            <div class="post_item_img">
              <?php the_post_thumbnail( 'full' ); ?>
            </div>
            <div class="post_content">
              <div class="post_info">
                by <?php the_author(); ?> / <?php the_modified_date( 'j M' ); ?>
              </div>
              <div class="post_title"><?php the_title(); ?></div>
              <div class="post_teaser"><?php the_excerpt(); ?></div>
              <div class="tags"><?php the_category(); ?></div>
              <a class="post_link" href="<?php echo get_permalink(); ?>">Podcast anhören</a>
            </div>
          </div>
          <?php
            endwhile;
          endif;
          wp_reset_query();
          ?>
        </div>
      <?php 
        }
      ?>
  </div>
</section>