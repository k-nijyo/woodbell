<?php
/*
Template Name: 商品管理カテゴリーのテンプレート
*/

get_header(); ?>
<div id="main" class="clearfix">
<?php get_sidebar(); ?>
    <div id="contents" class="s-page clearfix">
        <div id="furniture">
            <div class="box-row clearfix">

                <?php
                    // カスタム構造furnitureのカテゴリ名furniturecatに該当するデータを取得する 
                    $cat_args   = array(
                        'post_type' => 'furniture',
                        'taxonomy'  => 'furniturecat',
                        'hide_empty' => 0,
                    );
                    $categories = get_categories($cat_args);
                    // 取得したカテゴリーデータ群を一つ一つループしていく

                    foreach($categories as $category) :
                        /**
                         * アイキャッチ画像の取得
                         *
                         * カテゴリーにアイキャッチ画像があれば、$z_taxonomy_image_url変数に入れて呼び出しやすくしておく
                         *（カテゴリーにアイキャッチ画像を登録できるのはCategories Imagesプラグインでカスタマイズしているため)
                         */
                        if (function_exists('z_taxonomy_image_url')) { 
                            $z_taxonomy_image_url = z_taxonomy_image_url($category->cat_ID);
                        }
                ?>
                <div class="fur-box">
                <?php if($category -> description): ?>
                    <a href="<?php echo $category->description; ?>">
                <?php else: ?>
                    <a href="<?php echo home_url(); ?>/?page_id=<?php echo FURNITURE_CATEGORY_PAGE_ID; ?>&cat=<?php echo $category->cat_ID; ?>">
                <?php endif; ?>
                        <img src="<?php echo $z_taxonomy_image_url; ?>" alt="<?php echo $category->slug; ?>" class="pale">
                    </a>
                </div><!-- /.fur-box -->
                <?php endforeach; ?>
                
            </div><!-- /.box-row -->

        </div><!-- /#furniture -->
        
    </div><!-- /#contents -->
</div><!-- /#main -->
<?php get_footer(); ?>