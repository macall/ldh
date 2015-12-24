<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="__URL__" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="_order" value="<?php echo ($_REQUEST["_order"]); ?>"/>
	<input type="hidden" name="_sort" value="<?php echo ($_REQUEST["_sort"]); ?>"/>
	<?php if(is_array($map)): $i = 0; $__LIST__ = $map;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$m): $mod = ($i % 2 );++$i;?><input type="hidden" name="<?php echo ($key); ?>" value="<?php echo ($_REQUEST[$key]); ?>"/><?php endforeach; endif; else: echo "" ;endif; ?>
</form>

<div class="pageHeader">
	<form rel="pagerForm" onsubmit="return navTabSearch(this);" action="__URL__" method="post">
	<div class="searchBar">
		<ul class="searchContent">
				<li>
					<label>产品：</label>
					<input type="text" name="product" value="" />
				</li>
				<li>
					<label>姓名：</label>
					<input type="text" name="uname" value="" />
				</li>
				<li>
					<label>状态：</label>
					<select class="" name="status">
						<option value="">--请选择状态 --</option>
						<option value="待处理">待处理</option>            
						<option value="询问中">询问中</option>
						<option value="有效单">有效单</option>
						<option value="待发货">待发货</option>
						<option value="发货中">发货中</option>
						<option value="已发货">已发货</option>
						<option value="成交">成交</option>
					</select>
				</li>
			</ul>
		<div class="subBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
			</ul>
		</div>
	</div>
	</form>
</div>

<div class="pageContent">
	<div class="panelBar">
		<ul class="toolBar">
		    <li><a title="[谨慎操作]确实要删除这些订单吗?" target="selectedTodo" target="dialog" rel="ids[]" href="__URL__/delAll" class="delete" ><span>批量删除</span></a></li>
			<li><a class="delete" href="__URL__/foreverdelete/id/{sid_user}/navTabId/__MODULE__" target="ajaxTodo" title="你确定要删除吗？" warn="请选择订单"><span>删除</span></a></li>
			<li><a class="edit" href="__URL__/edit/id/{sid_user}" target="dialog" mask="true" warn="请选择订单"><span>编辑/查看</span></a></li>
			<li class="line">line</li>
			<li><a class="icon" href="__URL__/excel" target="dwzExport" targetType="navTab" title="实要导出这些记录吗?"><span>导出EXCEL</span></a></li>
			<li><a class="icon" href="javascript:$.printBox('print_table')"><span>打印</span></a></li>
		</ul>
	</div>
	<div id="print_table">
	<table class="table" width="100%" layoutH="138">
		<thead>
		<tr>
		    <th width="60"><input type="checkbox" group="ids[]" class="checkboxCtrl">编号</th>
			<!--<th width="100" orderField="orderid" <?php if($_REQUEST["_order"] == 'orderid'): ?>class="<?php echo ($_REQUEST["_sort"]); ?>"<?php endif; ?>>订单号</th> -->
			<th>产品</th>
			<th>姓名</th>
			<th>数量</th>
			<th>订单状态</th>
			<th>地址&下单IP</th>
			<th>备注</th>
			<th>联系电话</th>
			<th>下单来源</th>			
			<th>下单时间</th>
		</tr>
		</thead>
		<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
			    <td><input name="ids[]" value="<?php echo ($vo['id']); ?>" type="checkbox"><?php echo ($vo['id']); ?></td>
				<!-- <td><?php echo ($vo['orderid']); ?></td> -->
				<td><?php echo ($vo['product']); ?></td>
				<td><?php echo ($vo['uname']); ?></td>
				<td><?php echo ($vo['number']); ?></td>
				<td><?php echo (getstats($vo['status'])); ?></td>
				<td><?php echo ($vo['province']); ?>-<?php echo ($vo['city']); ?>-<?php echo ($vo['dist']); ?>-<?php echo ($vo['address']); ?>【IP:<?php echo ($vo['ip']); ?>-<?php echo (ip($vo['ip'])); ?>】
				</td>
				<td><?php echo ($vo['message']); ?></td>
				<td><?php echo ($vo['tel']); ?></td>
				<td><?php echo ($vo['url']); ?></td>
				<td><?php echo date("Y-m-d H:i:s",$vo['create_time']); ?></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	</div>
	<div class="panelBar">
		<div class="pages">
			<span>共<?php echo ($totalCount); ?>条</span>
		</div>
		<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
	</div>

</div>