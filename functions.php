<?php 

//サイトナビゲーション用
register_nav_menus(array('nav' => 'ナビゲーション'));

// アイキャッチ挿入
add_theme_support( 'post-thumbnails', array( 'post', 'furniture' ) );

// カテゴリー説明文からPタグを除去
remove_filter('term_description', 'wpautop');

// 抜粋から[…]を消去
function new_excerpt_more($more) {
      return '……<a href="' . get_permalink() . '">' . __('→続きを読む') . '</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

// 新しい投稿タイプ（furniture管理用）
function new_post_type(){
    // トピックスを作る
    register_post_type(
        'furniture',
        array(
            'label' => 'furniture管理',
            'public' => true,
            'hierarchical' => false,
            'has_archive' => true,
            'taxonomies' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'custom-fields'
            ),
            'menu_position' => 4,
            'rewrite'  => false,
        )
    );
    // 新規タクソノミーを作成
    register_taxonomy(
        'furniturecat',
        'furniture',
        array(
            'label' => '商品カテゴリー',
            'public' => true,
            'hierarchical' => true,
        )
    );
}
add_action('init', 'new_post_type');

// コンタクトフォームメールアドレス確認用
add_filter( 'wpcf7_validate_email', 'wpcf7_text_validation_filter_extend', 11, 2 );
add_filter( 'wpcf7_validate_email*', 'wpcf7_text_validation_filter_extend', 11, 2 );
function wpcf7_text_validation_filter_extend( $result, $tag ) {
    $type = $tag['type'];
    $name = $tag['name'];
    $_POST[$name] = trim( strtr( (string) $_POST[$name], "\n", " " ) );
    if ( 'email' == $type || 'email*' == $type ) {
        if (preg_match('/(.*)_confirm$/', $name, $matches)){
            $target_name = $matches[1];
            if ($_POST[$name] != $_POST[$target_name]) {
                if (method_exists($result, 'invalidate')) {
                    $result->invalidate( $tag,"確認用のメールアドレスが一致していません");
                } else {
                    $result['valid'] = false;
                    $result['reason'] = array( $name => '確認用のメールアドレスが一致していません' );
                }
            }
        }
    }
    return $result;
}


?>