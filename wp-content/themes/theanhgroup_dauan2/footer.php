<div class="clearfix"></div>
<footer id="footer">
	<div class="container">
		<ul class="row">
			<li class="col-xs-12 col-sm-6 col-lg-4">
				<span></span><?php _e('Đường Bờ Tây, xã Phước Lộc, huyện Nhà Bè
Tp. Hồ Chí Minh','theanhgroup');?>
			</li>
			<li class="col-xs-12 col-sm-6 col-lg-4">
				<span></span><?php _e('Điện thoại: 0984118912','theanhgroup');?>
			</li>
			<li class="col-xs-12 col-sm-6 col-lg-4">
				<span></span><?php _e('Fax: 0984118912','theanhgroup');?>
			</li>
		</ul>
	</div>
</footer>
</div><!--end #container-->
<?php wp_footer(); ?>
<?php if(is_home()):?>
<style>
.jssorb05{position:absolute}.jssorb05 div,.jssorb05 div:hover,.jssorb05 .av{position:absolute;width:16px;height:16px;background:url('img/b05.png') no-repeat;overflow:hidden;cursor:pointer}.jssorb05 div{background-position:-7px -7px}.jssorb05 div:hover,.jssorb05 .av:hover{background-position:-37px -7px}.jssorb05 .av{background-position:-67px -7px}.jssorb05 .dn,.jssorb05 .dn:hover{background-position:-97px -7px}.jssora22l,.jssora22r{display:block;position:absolute;width:40px;height:58px;cursor:pointer;background:url('img/a22.png') center center no-repeat;overflow:hidden}.jssora22l{background-position:-10px -31px}.jssora22r{background-position:-70px -31px}.jssora22l:hover{background-position:-130px -31px}.jssora22r:hover{background-position:-190px -31px}.jssora22l.jssora22ldn{background-position:-250px -31px}.jssora22r.jssora22rdn{background-position:-310px -31px}.jssora22l.jssora22lds{background-position:-10px -31px;opacity:.3;pointer-events:none}.jssora22r.jssora22rds{background-position:-70px -31px;opacity:.3;pointer-events:none}
</style>
<script>
	$(document).ready(function() {
  var owl = $("#owl-sp");
 
  owl.owlCarousel({
      items : 3, //10 items above 1000px browser width
      itemsDesktop : [1000,3], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })
 
});
</script>
<script>
	$(document).ready(function() {
  var owl = $("#owl-news");
 
  owl.owlCarousel({
      items : 2, //10 items above 1000px browser width
      itemsDesktop : [1000,2], //5 items between 1000px and 901px
      itemsDesktopSmall : [900,2], // betweem 900px and 601px
      itemsTablet: [600,1], //2 items between 600 and 0
      itemsMobile : false // itemsMobile disabled - inherit from itemsTablet option
  });
 
  // Custom Navigation Events
  $(".next").click(function(){
    owl.trigger('owl.next');
  })
  $(".prev").click(function(){
    owl.trigger('owl.prev');
  })

 
});
</script>
<script type="text/javascript">jssor_1_slider_init();</script>
<?php endif;?>
</body>
</html>