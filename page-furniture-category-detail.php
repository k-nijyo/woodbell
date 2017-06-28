<?php
/*
Template Name: 商品管理カテゴリー詳細のテンプレート
*/

get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <div id="furniture">
            <div class="box-row clearfix">
                <?php
                    /**
                     * 今いるページのカテゴリーに一致する記事データを取得する
                     *
                     * カスタム構造を使っていて複雑なためいつもの query_posts ではなく WP_Query を使用しているが、
                     * 記事データを取ってくる、というやっていることは同じ
                     */
                    $term       = get_term(intval(get_query_var('cat')), 'furniturecat');
                    $query_args = array(
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'furniturecat',
                                'field'    => 'term_id',
                                'terms'    => $term->term_id,
                            )
                        )
                    );
                    $the_query = new WP_Query($query_args);
                ?>
                <?php if ($the_query->have_posts()) : /* if(have_posts()): と同義 */ ?>
                <?php while ($the_query->have_posts()) : $the_query->the_post(); /* while(have_posts()): the_post();と同義 */ ?>

                <div class="fur-box">
                    <a href="<?php echo home_url(); ?>/?post_type=<?php echo $term->slug; ?>&p=<?php the_ID(); ?>">
                        <?php the_post_thumbnail(array(360, 240), array('class' => 'pale')); ?>
                    </a>
                </div>

                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div><!-- /.box-row-detail -->

        </div><!-- /#furniture -->
        
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>