<div class="am-g">

	<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
		<div class="am-panel am-panel-default">
			<div class="am-panel-bd">
				<div class="am-g">
					<div class="am-u-md-4">
						<img class="am-img-circle am-img-thumbnail" id="headerImg" src="" alt="老师头像,规格为：212w*182h"/>
					</div>
					<div class="am-u-md-8">
						<p>图片格式：png<br />头像规格为：212*182</p>
						<form class="am-form" id="teacher_upload_header" name="form" action="" method="POST" enctype="multipart/form-data">
							<div class="am-form-group">
								<input type="file" id="user-pic" name="user-pic"><br />
								<button type="button" id="teacher_upload_header_submit" class="am-btn am-btn-primary
								am-btn-xs">保存</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
		<form class="am-form am-form-horizontal">
			<div class="am-form-group">
				<label for="teacher_login_name" class="am-u-sm-3 am-form-label">帐号</label>
				<div class="am-u-sm-9">
					<input type="text" id="teacher_login_name" value="" placeholder="输入老师的帐号,长度小于等于30个字符">
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_login_pwd" class="am-u-sm-3 am-form-label">密码</label>
				<div class="am-u-sm-9">
					<input type="password" id="teacher_login_pwd" placeholder="输入老师的密码,6-10位字母、数字以及下划线." value="">
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_realname" class="am-u-sm-3 am-form-label">名字</label>
				<div class="am-u-sm-9">
					<input type="text" id="teacher_realname" placeholder="输入老师的名字,长度小于等于12个字符" value="">
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_gender" class="am-u-sm-3 am-form-label">性别</label>
				<div class="am-u-sm-9">
					<select id="teacher_gender">
						<?php foreach($gender_list as $k=>$gender){
							echo "<option value='".$k."'>".$gender."</option>";
						}?>
					</select>
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_grade" class="am-u-sm-3 am-form-label">年级</label>
				<div class="am-u-sm-9">
					<select id="teacher_grade">
						<?php foreach($grade_list as $k=>$grade){
							echo "<option value='".$k."'>".$grade."</option>";
						}?>
					</select>
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_experience" class="am-u-sm-3 am-form-label">经验</label>
				<div class="am-u-sm-9">
					<select id="teacher_experience">
						<?php
							for($i=1;$i<=15;++$i)
							{
								echo "<option value='".$i."'>".$i."年</option>";
							}
						?>
					</select>
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_subject" class="am-u-sm-3 am-form-label">擅长</label>
				<div class="am-u-sm-9">
					<select id="teacher_subject">
						<?php foreach($subject_list as $k=>$subject){
							echo "<option value='".$k."'>".$subject."</option>";
						}?>
					</select>
				</div>
			</div>

			<?php
			if(isset($teacher_info['F_subject_ids']))
			{
				$subjects = explode(",",$teacher_info['F_subject_ids']);
			}
			?>

			<div class="am-form-group">
				<label for="teacher_subjects" class="am-u-sm-3 am-form-label">能力</label>
				<div class="am-u-sm-9">
					<select class="teacher_subjects">
						<option value="0">无</option>
						<?php foreach($subject_list as $k=>$subject){
							echo "<option value='".$k."'>".$subject."</option>";
						}?>
					</select>
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_subjects" class="am-u-sm-3 am-form-label"></label>
				<div class="am-u-sm-9">
					<select class="teacher_subjects">
						<option value="0">无</option>
						<?php foreach($subject_list as $k=>$subject){
							echo "<option value='".$k."'>".$subject."</option>";
						}?>
					</select>
				</div>
			</div>

			<div class="am-form-group">
				<label for="teacher_subjects" class="am-u-sm-3 am-form-label"></label>
				<div class="am-u-sm-9">
					<select class="teacher_subjects">
						<option value="0">无</option>
						<?php foreach($subject_list as $k=>$subject){
							echo "<option value='".$k."'>".$subject."</option>";
						}?>
					</select>
				</div>
			</div>

			<!--
			<?php if(check_privity("c_teacher/teacher_set_test")){?>
			<div class="am-form-group">
				<label for="teacher_type" class="am-u-sm-3 am-form-label">类型</label>
				<div class="am-u-sm-9">
					<select id="teacher_type">
						<option value="0">正式帐号</option>
						<option value="4">测试帐号</option>
					</select>
				</div>
			</div>
			<?php }?>
			-->

			<div class="am-form-group">
				<label for="teacher_description" class="am-u-sm-3 am-form-label">简介</label>
				<div class="am-u-sm-9">
					<textarea class="" rows="5" id="teacher_description" placeholder="输入老师的个人简介"></textarea>
				</div>
			</div>

			<div class="am-form-group">
				<div class="am-u-sm-9 am-u-sm-push-3">
					<button type="button" id="teacher_add_submit" class="am-btn am-btn-primary">提交保存</button>
					<button type="button" id="teacher_add2_submit" class="am-btn am-btn-primary">保存并继续添加</button>
					<button type="button" id="teacher_add_back" class="am-btn am-btn-primary">返回</button>
				</div>
			</div>
		</form>
	</div>
</div>



<script>
	var upload_url = "<?php echo $upload_url;?>";
	var manager_test_url = "<?php echo $manager_test_url;?>";
//	var manager_url = "<?php //echo $manager_url;?>//";
	var teacher_add_do_url = "<?php echo my_site_url('c_teacher/teacher_add_do');?>";
</script>