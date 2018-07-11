<?php 
$slug='';
$name='';
$source_term=null;
if(is_archive()){
    $term_id = get_queried_object_id();
    $source_term= get_term_by('id', $term_id, 'category');
    if($source_term == null){
        $source_term= get_term_by('id', $term_id, 'za_category');
    }
    if($source_term == null){
        $source_term= get_term_by('id', $term_id, 'za_meal');
    }    
    if($source_term != null){
        $slug=@$source_term->slug;  
        $name=@$source_term->name;  
    }    
}   
if(is_single()){
    if(have_posts()){
        while (have_posts()) {
            the_post();             
            $post_id= get_the_id();
            $source_term = wp_get_object_terms( $post_id,  'category' );                        
        }
        wp_reset_postdata();  
    }
    if($source_term == null){
        if(have_posts()){
            while (have_posts()) {
                the_post();             
                $post_id= get_the_id();
                $source_term = wp_get_object_terms( $post_id,  'za_category' );                        
            }
            wp_reset_postdata();  
        }
    }
    if($source_term == null){
        if(have_posts()){
            while (have_posts()) {
                the_post();             
                $post_id= get_the_id();
                $source_term = wp_get_object_terms( $post_id,  'za_meal' );                        
            }
            wp_reset_postdata();  
        }
    }
    if($source_term != null){
        $slug=@$source_term[0]->slug;
        $name=@$source_term[0]->name;
    }
    
}
if(is_page()){    
    if(have_posts()){
        while (have_posts()) {
            the_post();             
            $post_id= get_the_id();
            $name=get_the_title($post_id);
            $slug = basename( get_permalink($post_id) );                          
        }
        wp_reset_postdata();  
    }   
}
$source_slug=array($slug);
$args = array(
    'post_type' => 'zabanner',  
    'orderby' => 'id',
    'order'   => 'DESC',                                                  
    'tax_query' => array(
        array(
            'taxonomy' => 'za_banner',
            'field'    => 'slug',
            'terms'    => $source_slug,                                  
        ),
    ),
); 
$the_query = new WP_Query( $args );
if($the_query->have_posts()){
    ?>
    <div class="margin-top-15 box-meal">
        <div>
            <script type="text/javascript" language="javascript">
                jQuery(document).ready(function(){
                    jQuery(".banner").owlCarousel({
                        autoplay:true,                    
                        loop:true,
                        margin:0,                        
                        nav:false,            
                        mouseDrag: true,
                        touchDrag: true,                                
                        responsiveClass:true,
                        responsive:{
                            0:{
                                items:1
                            },
                            600:{
                                items:1
                            },
                            1000:{
                                items:1
                            }
                        }
                    });

                });                
            </script>
            <div class="owl-carousel banner owl-theme">
                <?php      
                while ($the_query->have_posts()){
                    $the_query->the_post();
                    $post_id=$the_query->post->ID;  
                    $featured_img=get_the_post_thumbnail_url($post_id, 'full'); 
                    ?>
                    <div><img src="<?php echo $featured_img; ?>"></div>
                    <?php
                }
                wp_reset_postdata();  
                ?>
            </div>
        </div>  
        <div class="single-cat-title"><?php echo @$name; ?></div>
    </div>
    <?php
}
?>
