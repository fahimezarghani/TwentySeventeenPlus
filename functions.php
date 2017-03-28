<?php
//
// Recommended way to include parent theme styles.
//  (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
//  
add_action( 'wp_enqueue_scripts', 'twse_plus_theme_enqueue_styles' );

function twse_plus_theme_enqueue_styles() {
    wp_enqueue_style( 'twse-plus-parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'twse-plus-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
}

/**
 * Display a front page section.
 *
 * @param $partial WP_Customize_Partial Partial associated with a selective refresh request.
 * @param $id integer Front page section to display.
 */
function twse_front_page_section( $partial = null, $id = 0 ) {
    if ( is_a( $partial, 'WP_Customize_Partial' ) || is_a( $partial, 'SiteEditorPartial' ) ) {
        // Find out the id and set it up during a selective refresh.
        global $twentyseventeencounter;
        $id = str_replace( 'panel_', '', $partial->id );
        $twentyseventeencounter = $id;
    }

    global $post; // Modify the global post object before setting up post data.
    if ( get_theme_mod( 'panel_' . $id ) ) {
        global $post;
        $post = get_post( get_theme_mod( 'panel_' . $id ) );
        setup_postdata( $post );
        set_query_var( 'panel', $id );

        get_template_part( 'template-parts/page/content', 'front-page-panels' );

        wp_reset_postdata();
    } elseif ( is_customize_preview() || site_editor_app_on() ) {
        // The output placeholder anchor.
        echo '<article class="panel-placeholder panel twentyseventeen-panel twentyseventeen-panel' . $id . '" id="panel' . $id . '"><span class="twentyseventeen-panel-title">' . sprintf( __( 'Front Page Section %1$s Placeholder', 'twentyseventeen' ), $id ) . '</span></article>';
    }
}

function twse_the_copyright_text( $partial = null, $id = 0 ) {

    $copyright_text = esc_html( get_theme_mod( 'sed_copyright_text' ) );//apply_filters( "the_content" , get_theme_mod( 'sed_copyright_text' ) );

    $copyright_text = ( empty( $copyright_text ) ) ? sprintf( __( 'Proudly powered by %s', 'twentyseventeen' ), 'WordPress & SiteEditor' ) : $copyright_text;

    echo $copyright_text;

}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function twse_widgets_init() {

    register_sidebar( array(
        'name'          => __( 'Footer 3', 'twentyseventeen' ),
        'id'            => 'sidebar-4',
        'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer 4', 'twentyseventeen' ),
        'id'            => 'sidebar-5',
        'description'   => __( 'Add widgets here to appear in your footer.', 'twentyseventeen' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}

add_action( 'widgets_init', 'twse_widgets_init' , 11 );