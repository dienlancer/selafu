<?php 
get_header(); 
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "header-top.php";
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "banner.php";
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();    
$width=$zendvn_sp_settings["product_width"];    
$height=$zendvn_sp_settings["product_height"];    
$width_thumbnail=$width/5;
$height_thumbnail=$height/5;
$post_id=0;
$term_id=0;
$the_query=$wp_query;
if($the_query->have_posts()){
    while ($the_query->have_posts()){
        $the_query->the_post();                            
        $post_id=$the_query->post->ID; 
        $title=get_the_title($post_id);  
        $permalink=get_the_permalink($post_id);      
        $term = wp_get_object_terms( $post_id,  'za_category' );   
        $term_id=$term[0]->term_id;                          
        $term_name=$term[0]->name;
        $term_slug=$term[0]->slug;
        $featured_img=get_the_post_thumbnail_url($post_id, 'full');        
        $thumbnail=$vHtml->getSmallImage($featured_img);                      
        $thanh_phan=get_post_meta($post_id,"thanh_phan",true); 
        $chi_tieu_chat_luong=get_post_meta($post_id,'chi_tieu_chat_luong',true);   
        $chi_tieu_chat_luong= apply_filters( 'the_content', $chi_tieu_chat_luong );        
        $huong_dan_su_dung=get_post_meta($post_id,'huong_dan_su_dung',true);   
        $bao_quan=get_post_meta($post_id,'bao_quan',true);   
        $thong_tin_chi_tiet=get_post_meta($post_id,'thong_tin_chi_tiet',true);   
        ?>        
        <div class="box-zaproduct">
            <div class="vc_row wpb_row section vc_row-fluid grid_section">
                <div class="section_inner clearfix">
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="margin-top-30">
                                    <img src="<?php echo $featured_img; ?>">
                                </div>
                            </div>                            
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="box-zaproduct-flex margin-top-30">
                                <div class="tom-tat">
                                    <div class="box-zaproduct-title"><center><?php echo $title; ?></center></div>
                                    <div class="box-zaproduct-content"><?php the_content(); ?></div>
                                </div>
                            </div>                 
                            </div>                                   
                        </div>
                    </div>
                    <div class="section_inner_margin clearfix">
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                <div class="margin-top-15"><b>Thành phần :</b>&nbsp;<?php echo $thanh_phan; ?></div>
                            <div class="margin-top-15"><b>Chỉ tiêu chất lượng chủ yếu :</b></div>
                            <div class="margin-top-5"><?php echo $chi_tieu_chat_luong; ?></div>
                            <div class="margin-top-15"><b>Hướng dẫn sử dụng :</b></div>
                            <div class="margin-top-5"><?php echo $huong_dan_su_dung; ?></div>
                            <div class="margin-top-15"><b>Thông tin chi tiết :</b></div>
                            <div class="margin-top-5 table-left">
                                <?php echo $thong_tin_chi_tiet; ?>
                            </div>
                            <div class="margin-top-15"><b>Bảo quản :</b></div>
                            <div class="margin-top-5"><?php echo $bao_quan; ?></div>
                            </div>                            
                        </div>
                        <div class="wpb_column vc_column_container vc_col-sm-6">
                            <div class="vc_column-inner">
                                 <?php 
                            $args2 = array(
                                'post_type' => 'zaproduct',  
                                'orderby' => 'id',
                                'order'   => 'DESC',     
                                'post__not_in'=>array($post_id),                                   
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'za_category',
                                        'field'    => 'term_id',
                                        'terms'    => array($term_id),                                  
                                    ),
                                ),
                            );                     
                            $the_query2 = new WP_Query( $args2 );
                            if($the_query2->have_posts()){
                                ?>
                                <div class="related-product"><b>Sản phẩm tương tự :</b></div>
                                <div>
                                    <ul class="related-news-lst">
                                        <?php 
                                        while ($the_query2->have_posts()){
                                            $the_query2->the_post();
                                            $post_id2=$the_query2->post->ID;                                                                        
                                            $permalink2=get_the_permalink($post_id2);
                                            $title2=get_the_title($post_id2);
                                            ?>  
                                            <li><a href="<?php echo $permalink2; ?>"><?php echo $title2; ?></a></li>                                                              
                                            <?php
                                        }
                                        wp_reset_postdata();    
                                        ?>
                                    </ul>
                                </div>   
                                <?php                                                     
                            }
                            ?>               
                            </div>                                                    
                        </div>
                    </div>
                </div>                
            </div>
        </div>            
    </div>
    <?php
}
wp_reset_postdata();     
}
get_footer();
wp_footer();
?>