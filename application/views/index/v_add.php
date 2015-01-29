<div class="am-g">

	<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
		
	</div>

	<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
		<form class="am-form am-form-horizontal">
			<div class="am-form-group">
				<label for="pkg_name" class="am-u-sm-3 am-form-label">包名</label>
				<div class="am-u-sm-9">
					<input type="text" id="pkg_name" value="">
				</div>
			</div>

			<div class="am-form-group">
				<label for="app_name" class="am-u-sm-3 am-form-label">应用名</label>
				<div class="am-u-sm-9">
					<input type="text" id="app_name" value="">
				</div>
			</div>

			<div class="am-form-group">
				<div class="am-u-sm-9 am-u-sm-push-3">
					<button type="button" id="pkg_add_submit" class="am-btn am-btn-primary">保存添加</button>
					<button type="button" id="pkg_add_back" class="am-btn am-btn-primary">返回</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script>
	var pkg_add_url = "<?php echo my_site_url('c_index/pkg_add_do');?>";
	var list_url = "<?php echo my_site_url('c_index/manager');?>";
</script>