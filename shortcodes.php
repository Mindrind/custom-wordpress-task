// Create Shortcode to Display media slider

function diwp_create_shortcode_media_slider(){
$result ="";

$args = array(
'post_type' => 'post', // don't forget to replace it with your custom post type name
'posts_per_page' => '',
'taxonomies' => array('category', 'post_tag'),
);

$query = new WP_Query($args);

if($query->have_posts()) :
$result .= '<div class="media">';
    $result .= '<div class="container">';
        $result .= '<div class="media__slider">';
            $result .= '<section class="regular slider">';
                while($query->have_posts()) :

                $query->the_post() ;



                $result .= '<div>';
                    $result .= '<a href="'.get_the_permalink().'" class="media__slider-img">' . get_the_post_thumbnail() . '</a>';
                    $result .= '<a href="'.get_the_permalink().'" class="media__slider-title">' . get_the_title() . '</a>';
                    $result .= '</div>';


                endwhile;

                wp_reset_postdata();
                $result .= '</section>';
            $result .= '</div>';
        $result .= '</div>';
    $result .= '</div>';

endif;

return $result;
}

add_shortcode( 'media-slider', 'diwp_create_shortcode_media_slider' );