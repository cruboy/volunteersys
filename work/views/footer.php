<?php if(!defined('EMLOG_ROOT')) {exit('error!');}?>
	</div><!--end container-->
	<div id="footer">版权所有 &copy;  
	  <a href="../" target="_blank" title="在新窗口浏站点">
    <?php 
    $blog_name = Option::get('blogname');
    echo empty($blog_name) ? '查看我的站点' : subString($blog_name, 0, 24);
    ?>
    </a> <?php echo Option::EMLOG_VERSION; ?></div>
</div><!--end mainpage-->
</body>
</html>