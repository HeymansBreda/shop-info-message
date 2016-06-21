<?php if ($_SESSION['username'] <> ''){ ?>
<div class="gh-nav">
	<div class="container g-clear" style="width:980px; ">

		<div class="g-right">
		<a href="index.php">返回首页</a><span class="line">|</span>
           		<span class="text">您好
                    <?php echo $_SESSION['username']; ?>
                </span>
           			<span class="line">|</span>
           			<a href="home.php" onmousedown="return _smartlog(this,'TOP')">个人中心</a> 
					<span class="line">|</span>	
					<a href="login_out.php">退出</a> 
			
			
		</div>
	</div>
</div>
<?php } else {?>
<div class="gh-nav">
	<div class="container g-clear" style="width:980px; ">

		<div class="g-right">
		<a href="index.php">返回首页</a><span class="line">|</span>
				<span class="text">您好！ 请</span>
				<span class="login"></span>
				<a href="login.php" id="login">考生登录</a>
				<span class="line">|</span>
				<a href="reg.php" id="reg">考生注册</a>

		</div>
	</div>
</div>
<?php } ?>