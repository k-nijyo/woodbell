<?php get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <?php
            $cats = get_the_category();
            $cats = $cats[0];
        ?>
        <div id="single-box">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="caption-box">
                <h2><a href="<?php the_permalink(); ?>">■ <?php the_title(); ?></a></h2>
                <p class="date"><?php the_time('Y.m.d'); ?></p>
            </div>
            <div class="content-box">
                <?php the_post_thumbnail('thumbnail','class=eyecatch'); ?>
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
        <?php comments_template(); ?>
        </div><!-- /#single-box -->
        <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>