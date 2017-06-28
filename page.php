<?php get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <?php if(have_posts()): the_post(); ?>
        <?php the_content(); ?>
        <?php endif; ?>
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>