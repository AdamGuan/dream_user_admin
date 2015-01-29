<div class="am-g">
	<div class="am-u-md-6 am-cf">
		<div class="am-fl am-cf">
			<div class="am-btn-toolbar am-fl">
				<div class="am-btn-group am-btn-group-xs">
					<button type="button" class="am-btn am-btn-default am-btn-xs am-text-secondary" id="pkg_add" url="<?php echo get_pkg_add_url();?>"><span class="am-icon-plus"></span>新增</button>
					<button type="button" class="am-btn am-btn-default am-btn-xs am-text-danger" id="pkgs_delete"><span class="am-icon-remove"></span> 删除</button>
				</div>
			</div>
		</div>
	</div>

	<div class="am-u-md-3 am-cf">
		<div class="am-fr">
			<div class="am-input-group am-input-group-sm">
				<input type="text" class="am-form-field" id="search_text" placeholder="输入包名或应用名搜索" value="<?php echo isset($search)?$search:'';?>">
                <span class="am-input-group-btn">
                  <button class="am-btn am-btn-default" type="button" id="search_btn_search"><i class="am-icon-search"></i>搜索</button>
                </span>
			</div>
		</div>
	</div>

</div>


<div class="am-g">
<div class="am-u-sm-12">
<form class="am-form">


<table class="am-table am-table-striped am-table-hover table-main">
<thead>
<tr>
	<th class="table-check"><input type="checkbox" id="pkg_select" /></th><th>序号</th><th>包名</th><th>应用名</th><th>管理</th>
</tr>
</thead>
<tbody>
<?php foreach($list as $k=>$item){
	$edit_url = get_pkg_edit_url(array("F_pkg"=>$item["F_pkg"]));
	$str = '';
	$str .= '<tr>';
	$str .= '<td><input type="checkbox" F_pkg="'.$item['F_pkg'].'" id="pkg_check'.$item['F_pkg'].'" /></td>';
	$str .= '<td>'.($k+1).'</td>';
	$str .= '<td>'.$item['F_pkg'].'</td>';
	$str .= '<td>'.$item['F_app_name'].'</td>';
	$tmp  = "";
	$tmp .= '<button class="am-btn am-btn-default am-btn-xs am-text-secondary" F_pkg="'.$item['F_pkg'].'"  id="pkg_edit'.$k.'" url="'.$edit_url.'"><span class="am-icon-pencil-square-o"></span> 编辑</button>';
	$str .= '<td>
		<div class="am-btn-toolbar">
			<div class="am-btn-group am-btn-group-xs">'.$tmp.'</div>
		</div>
	</td></tr>';
	echo $str;
}?>
</tbody>
</table>


<div class="am-cf">
	共 <?php echo $total;?> 条记录
	<div class="am-fr">
		<ul class="am-pagination">
			<?php $page_pre_class = "am-disabled";if($page_pre_active){$page_pre_class = "";} ?>
			<?php $page_next_class = "am-disabled";if($page_next_active){$page_next_class = "";} ?>
			<li class="<?php echo $page_pre_class;?>"><a href="<?php echo $page_pre_url;?>">«</a></li>
			<?php foreach($page_list as $page){
				$class = "";
				if($page['active'])
				{
					$class = "am-active";
				}
				echo '<li class="'.$class.'"><a href="'.$page['url'].'">'.$page['page'].'</a></li>';
			}?>
			<li class="<?php echo $page_next_class;?>"><a href="<?php echo $page_next_url;?>">»</a></li>
		</ul>
	</div>
</div>
</form>
</div>

</div>



<script>
	var pkg_delete_uri = "<?php echo get_pkg_delete_url(array());?>";
</script>