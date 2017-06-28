<?php get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="clearfix">
        <p id="slide-top">
           <img src="<?php bloginfo('template_url'); ?>/images/kitchen.jpg" alt="kitchen" class="active">
           <img src="<?php bloginfo('template_url'); ?>/images/kitchen2.jpg" alt="kitchen2">
           <img src="<?php bloginfo('template_url'); ?>/images/table2.jpg" alt="table">
           <img src="<?php bloginfo('template_url'); ?>/images/plant.jpg" alt="plant">
        </p>
        <div id="news-top">
            <p class="heading">news</p>
            <?php query_posts('category_name=news,blog&posts_per_page=2'); ?>
            <?php if(have_posts()): ?>
            <dl>
                <?php while(have_posts()): the_post(); ?>
                <?php
                $cats = get_the_category();
                $cats = $cats[0];
                ?>
                <dt><span class="category"><?php echo $cats->category_nicename; ?></span>
                    <span class="date"><?php the_time('Y.m.d'); ?></span></dt>
                    <dd><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                <?php endwhile; ?>
            </dl>
        <?php endif; wp_reset_query(); ?>
        </div><!-- /#news-top -->
        <div id="contents-box">
            <?php query_posts('category_name=pickup'); ?>
            <?php if(have_posts()): ?>
                <?php while(have_posts()): the_post(); ?>
                <?php
                $cats = get_the_category();
                $cats = $cats[0];
                ?>
                <div class="<?php echo (++$j % 2 == 0) ? 'evenpost' : 'oddpost'; ?>">
                    <a href="<?php $link_url = get_post_meta(get_the_ID(), 'pickup_link_url', true);
                                if (! empty($link_url)) { echo $link_url; } ?>"><?php the_post_thumbnail(array(390)); ?></a>
                </div>
                <?php endwhile; ?>
            <?php endif; wp_reset_query(); ?>
        </div><!-- /#contents-box -->
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>