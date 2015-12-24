<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">


	<form method="post" action="__URL__/update/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="user_id" value="<?php echo $_SESSION[C('USER_AUTH_KEY')] ?>"/>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
		<div class="pageFormContent" layoutH="58">			
			<div class="unit">
				<label>姓名：</label>
				<?php echo ($vo['uname']); ?>
			</div>
			
			<div class="unit">
				<label>订单状态：</label>
				<select class="" name="status">
						<option value="">--请选择状态 --</option>
						<option <?php if(($vo["status"]) == "待处理"): ?>selected<?php endif; ?> value="待处理">待处理</option>      
						<option <?php if(($vo["status"]) == "询问中"): ?>selected<?php endif; ?> value="询问中">询问中</option>
						<option <?php if(($vo["status"]) == "有效单"): ?>selected<?php endif; ?> value="有效单">有效单</option>
						<option <?php if(($vo["status"]) == "待发货"): ?>selected<?php endif; ?> value="待发货">待发货</option>
						<option <?php if(($vo["status"]) == "发货中"): ?>selected<?php endif; ?> value="发货中">发货中</option>
						<option <?php if(($vo["status"]) == "已发货"): ?>selected<?php endif; ?> value="已发货">已发货</option>
						<option <?php if(($vo["status"]) == "成交"): ?>selected<?php endif; ?> value="成交">成交</option>
					</select>
			</div>
			<div class="unit">
				<label>订购产品：</label>
				  <?php echo ($vo['product']); ?>
			</div>
			<div class="unit">
				<label>收货地址：</label>
				  <?php echo ($vo['province']); ?>-<?php echo ($vo['city']); ?>-<?php echo ($vo['dist']); ?>
			</div>
			<div class="unit">
				<label>下单IP：</label>
				  <?php echo ($vo['ip']); ?>
			</div>			
			<div class="unit">
				<label>电话/手机号：</label>
				  <?php echo ($vo['tel']); ?>
			</div>
			<div class="unit">
				<label>订购数量：</label>
				  <?php echo ($vo['number']); ?>
			</div>
			<div class="unit">
				<label>留言：</label>
				<?php echo ($vo['message']); ?>
			</div>
			<div class="unit">
				<label>备  注：</label>
				<textarea class="large bLeft"  name="remark" rows="5" cols="50"><?php echo ($vo["remark"]); ?></textarea>
			</div>
		</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">提交</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
	
</div>