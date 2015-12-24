<?php if (!defined('THINK_PATH')) exit();?>	
<div class="accordion" fillSpace="sideBar">
<?php if(is_array($groups)): $i = 0; $__LIST__ = $groups;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$group): $mod = ($i % 2 );++$i;?><div class="accordionHeader">
		<h2><span>Folder</span><?php echo ($group["title"]); ?></h2>
	</div>
	<div class="accordionContent">

		<ul class="tree treeFolder">
			<?php if(is_array($menu[$group['id']])): $i = 0; $__LIST__ = $menu[$group['id']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i; if(($item['access']) == "1"): if(($item["level"]) == "3"): ?><li>
				<a href="__GROUP__/<?php echo ($parents[$item['pid']]['name']); ?>/<?php echo ($item['name']); ?>" target="navTab" rel="<?php echo ($parents[$item['pid']]['name']); ?>.<?php echo ($item['name']); ?>"><?php echo ($item['title']); ?></a></li>
				<?php else: ?>
				<li><a href="__GROUP__/<?php echo ($item['name']); ?>" target="navTab" rel="<?php echo ($item['name']); ?>"><?php echo ($item['title']); ?></a></li><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
		</ul>

	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>