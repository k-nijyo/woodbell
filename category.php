<?php get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents">
        <?php $cats = get_the_category();
                $cats = $cats[0]; ?>

        <div id="<?php echo $cats -> category_nicename; ?>">

            <?php if(have_posts()): ?>
                <dl>
                <?php while (have_posts()): the_post(); ?>
                <div class="<?php echo $cats -> category_nicename; ?>-box">
                    <dt class="caption-box"><span class="cap-left"><?php the_time('Y.m.d'); ?></span></base><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dt>
                    <dd class="content-box"><?php the_excerpt(); ?></dd>
                </div><!-- /.<?php echo $cats -> category_nicename; ?>-box -->
                <?php endwhile; ?>
                </dl>
            <?php endif; ?>

        </div><!-- /#<?php echo $cats -> category_nicename; ?> -->

    <?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } ?>

    </div><!-- /#contents -->

<?php get_sidebar(); ?>

</div><!-- /#container -->

<?php get_footer(); ?>