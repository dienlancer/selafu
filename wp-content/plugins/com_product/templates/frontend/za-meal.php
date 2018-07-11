<?php 
get_header(); 
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "header-top.php";
require_once PLUGIN_PATH . DS . "templates" . DS . "frontend". DS . "banner.php";
global $zController,$zendvn_sp_settings;    
$vHtml=new HtmlControl();
$productModel=$zController->getModel("/frontend","ProductModel"); 	
$the_query = $wp_query;
$totalItemsPerPage=0;
$pageRange=10;
$currentPage=1; 
$totalItemsPerPage=9;
if(!empty(@$_POST["filter_page"]))          {
	$currentPage=@$_POST["filter_page"];  
}
if(!empty(@$zendvn_sp_settings["article_number"])){
	$totalItemsPerPage=(int)@$zendvn_sp_settings["article_number"];        
}
$productModel->setWpQuery($the_query);   
$productModel->setPerpage($totalItemsPerPage);        
$productModel->prepare_items();               
$totalItems= $productModel->getTotalItems();               
$arrPagination=array(
	"totalItems"=>$totalItems,
	"totalItemsPerPage"=>$totalItemsPerPage,
	"pageRange"=>$pageRange,
	"currentPage"=>$currentPage   
);    
$pagination=$zController->getPagination("Pagination",$arrPagination); 
?>
<form  method="post"  class="frm margin-top-15" name="frm">
	<input type="hidden" name="filter_page" value="1" />
	<div class="vc_row wpb_row section vc_row-fluid grid_section">
		<div class=" section_inner clearfix">
			<?php           		            
			if($the_query->have_posts()){       
				$k=0;						
				while ($the_query->have_posts()){
					$the_query->the_post();
					$post_id=$the_query->post->ID;																		
					$permalink=get_the_permalink($post_id);
					$title=get_the_title($post_id);
					$thumbnail=get_the_post_thumbnail_url($post_id, 'thumbnail');								
					$intro=get_post_meta($post_id,"intro",true);		
					if($k%2 == 0){
						echo '<div class="section_inner_margin clearfix">';
					}
					?>
					<div class="wpb_column vc_column_container vc_col-sm-6">
						<div class="vc_column-inner">
							<div class="margin-top-15">
							<div>
								<center><figure><a href="<?php echo @$permalink; ?>"><img src="<?php echo @$thumbnail; ?>" alt="<?php echo @$title; ?>"></a></figure></center>

							</div>						 
							<div class="box-news-title margin-top-5">

								<a href="<?php echo @$permalink; ?>" title="<?php echo @$title; ?>" ><b><?php echo @$title; ?></b></a>	

							</div>
							<div class="box-news-intro margin-top-5">
								<?php echo $intro; ?>
							</div>
							<div class="product-readmore padding-bottom-15 padding-left-15 padding-right-15">
								<div class="xem-them">
									<a href="<?php echo $permalink; ?>" >
										<div class="narit">
											<div >Xem thêm</div>
											<div class="margin-left-5"><i class="fas fa-arrow-circle-right"></i></div>											
										</div>								
									</a>
								</div>
							</div>
						</div>					
						</div>								
					</div>         
					<?php
					$k++;
					if($k%2==0 || $k == $the_query->post_count){
						echo '</div>';
					}               
				}
				wp_reset_postdata();    			                 
			}       
			?>
			<div class="section_inner_margin clearfix">
				<div class="wpb_column vc_column_container vc_col-sm-12">
					<div class="vc_column-inner">
						<?php 
					echo $pagination->showPagination(); 
					?>
					</div>
					
				</div>
			</div>				
		</div>		
	</div>	
</form>	
<?php get_footer(); ?>
<?php wp_footer();?>