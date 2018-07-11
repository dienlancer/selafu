<?php 
global $zendvn_sp_settings;     
?>
<div class="vc_row wpb_row section vc_row-fluid">
    <div class=" full_section_inner clearfix">
        <div class="wpb_column vc_column_container vc_col-lg-9">
            <div class="vc_column-inner">
                <div class="box-logo">
                    <center><a href="<?php echo site_url(); ?>"><img width="200" src="<?php echo site_url('wp-content/uploads/logo.png'); ?>"></a></center>
                </div> 
            </div>

        </div>
        <div class="wpb_column vc_column_container vc_col-lg-3">
            <div class="vc_column-inner">
                <div class="hotline3">Selafu sẵn sàng phục vụ quý khách</div>
                <div class="hotline1">HOTLINE</div>
                <div class="hotline2"><?php echo @$zendvn_sp_settings['telephone']; ?></div>
            </div>

        </div>
    </div>    
</div>  