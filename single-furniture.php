<?php get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <div id="furniture-single">
            <div class="fur-detail-box clearfix">
                <div id="slider" class="flexslider">
                    <ul class="slides">
                        <?php
                            $size = 'full'; //画像サイズthumbnail, small , midium, large, full
                            $post_custom_multi = post_custom('furniture_image');
                            if(isset($post_custom_multi) && is_array($post_custom_multi)) :
                        ?>
                        <?php foreach($post_custom_multi as $var) :
                            $post_img = wp_get_attachment_image($var, $size);
                        ?>
                        <li><?php echo $post_img; ?></li>
                        <?php endforeach; ?>
                        <?php else : ?>
                        <li><?php echo $post_img = wp_get_attachment_image($post_custom_multi, $size); ?></li>
                        <?php endif; ?>
                    </ul>
                </div>
                <div id="carousel" class="flexslider">
                    <ul class="slides">
                        <?php
                            $size = 'midium'; //画像サイズthumbnail, small , midium, large, full
                            $post_custom_multi = post_custom('furniture_image');
                            if(isset($post_custom_multi)) :
                        ?>
                        <?php
                            foreach($post_custom_multi as $var) :
                            $post_img = wp_get_attachment_image($var, $size);
                        ?>
                        <li><?php echo $post_img; ?></li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div><!-- /.fur-detail-box -->

            <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="fur-detail-text">
                <h2><?php echo trim(wp_title('', false)); if (wp_title('', false)) ?></h2>
                <?php the_content(); ?>
            </div><!-- /.fur-detail-text -->
            <?php endwhile; endif; ?>

        </div><!-- /#furniture -->
        
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>