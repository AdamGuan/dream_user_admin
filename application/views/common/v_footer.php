</div>
<!-- content end -->
</div>

<div class="am-modal am-modal-alert" tabindex="-1" id="my-alert">
	<div class="am-modal-dialog">
		<div class="am-modal-bd" id="my-alert-message">
			Hello world！
		</div>
		<div class="am-modal-footer">
			<span class="am-modal-btn">确定</span>
		</div>
	</div>
</div>

<div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
  <div class="am-modal-dialog">
    <div class="am-modal-hd"></div>
    <div class="am-modal-bd" id="my-confirm-msg">

    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-cancel>取消</span>
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>

<footer>
	<hr>
	<p class="am-padding-left"><?php echo $global_web_license;?></p>
</footer>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="<?php echo get_assets_js_url('polyfill/rem.min.js');?>""></script>
<script src="<?php echo get_assets_js_url('polyfill/respond.min.js');?>"></script>
<script src="<?php echo get_assets_js_url('amazeui.legacy.js');?>"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="<?php echo get_assets_js_url('jquery.min.js');?>"></script>
<script src="<?php echo get_assets_js_url('amazeui.min.js');?>"></script>
<!--<![endif]-->

<?php if(isset($js_list) && is_array($js_list) && count($js_list) > 0){
	foreach($js_list as $js)
	{
		echo "<script src='".$js."'></script>";
	}
}?>
<script src="<?php echo get_assets_js_url($global_js);?>"></script>

<script>
	//退出
	var exitUrl = "<?php echo get_login_out_url();?>";
	$(document).ready(function(){
		$("#exit").click(function(){
			var $btn = $(this);
            $("#my-confirm-msg").html("确定退出?");
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    //loading start
	                $.AMUI.progress.start();
                    location.href = exitUrl;
                },
                onCancel: function() {
                }
            });

			return false;
		});

		$(".leftbara").click(function(){
			$.AMUI.progress.done();
		});
	});
</script>

</body>
</html>