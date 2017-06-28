<?php
/*
Template Name: ブログページのテンプレート
*/

get_header(); ?>
<div id="main" class="clearfix">
    <?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <div id="blog">
            <?php $paged = get_query_var('paged');
            query_posts("cat=-3,-4&posts_per_page=4&paged=$paged&orderby=date&order=DESC");
            if (have_posts()) : ?>

            <?php if (have_posts()) : while (have_posts()) : the_post();?>
            <div class="post">
                <div class="caption-box">
                <h2 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink(); ?>">■ <?php the_title();?></a></h2>
                <p><?php the_time('Y.m.d'); ?></p>
                </div>
                <?php if ( has_post_thumbnail() ): ?>
                <div class="eyecatch">
                    <?php the_post_thumbnail('medium'); ?>
                </div>
                <?php endif; ?>
                <div class="entrytext">
                    <?php the_content('<p class="serif">このページの続きを読む &raquo;</p>'); ?>
                </div>
            </div><!-- /.post -->
            <?php edit_post_link('編集', '<p>', '</p>'); ?>
            <?php endwhile; endif; ?>
            <div class="wrap-col" id="pager">
                <?php wp_pagenavi(); ?>
            </div>
            <?php endif; wp_reset_query(); ?>
        </div><!-- /#blog -->

    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>