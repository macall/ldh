<?php if (!defined('THINK_PATH')) exit();?><div class="page">
	<div class="pageContent">
	
	<form method="post" action="__URL__/change/navTabId/__MODULE__" class="pageForm required-validate" onsubmit="return validateCallback(this, dialogAjaxDone)">
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>">
		<div class="pageFormContent" layoutH="58">
		
	<div class="unit">
		<label>昵称：</label>
		<input type="text" class="required"  name="nickname" value="<?php echo ($vo["nickname"]); ?>"/>
	</div>
	
	<div class="unit">
		<label>邮箱：</label>
		<input type="text" class="required email"  name="email" value="<?php echo ($vo["email"]); ?>"/>
	</div>
	
	<div class="unit">
		<label>备注：</label>
		<textarea class="required"  name="remark"  rows="5" cols="57" ><?php echo ($vo["remark"]); ?></textarea>
	</div>

</div>
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">Submit</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">Cancel</button></div></div></li>
			</ul>
		</div>
	</form>
	
	</div>
</div>