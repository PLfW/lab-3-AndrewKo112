<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>СпортРегістр</title>
	<?php $app_name = "/WPL/"; ?>
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="/css/styles.css" />
	<script src="/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src="/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="/js/main.js" type="text/javascript"></script>
</head>
<body>
	<!-- Header -->
	<header class="header">
		<ul class="nav-top">
			<li><img src="favicon.ico" class="header-logo"></li>
			<li><a href="index">Головна</a></li>
		</ul>
		<ul class="nav-top nav-top-right">
			<?php if ($_SESSION["user"]) { ?>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
						<?php echo $_SESSION["user"]["first_name"]?> <span class="caret"></span> 
					</a>
					<ul class="dropdown-menu content-block">
						<li><a href="login/logout">Вихід</a></li>
					</ul>
				</li>
			<?php } else { ?>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
						Увійти <span class="caret"></span> 
					</a>
					<div class="dropdown-menu content-block">
						<form action="login/confirm_login" class="center-block">
							<h4>Вхід</h4>
							<input type="email" name="email" placeholder="Електронна Адреса" class="form-control input">
							<input type="password" name="password" placeholder="Пароль" class="form-control input">
							<button type="submit" class="btn btn-primary btn-block">Надіслати</button>
							<a href="signup" class="small-text ">Реєстрація</a>
						</form>
					</div>
				</li>
			<?php } ?>
			
		</ul>
	</header>
	<?php include 'application/views/'.$content_view; ?>
	<footer>
		
	</footer>
</body>
</html>