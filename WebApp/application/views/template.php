<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>СпортРегістр</title>
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
						<span class="glyphicon glyphicon-search"></span>
					</a>
					<form id="search-form" class="dropdown-menu content-block">
						<div class="input-group">
				            <input type="text" name="query" class="form-control" placeholder="Пошук..." name="q">
				            <div class="input-group-btn">
				                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
				            </div>
				        </div>
					</form>
				</li>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
						<?php echo $_SESSION["user"]["first_name"]?> <span class="caret"></span> 
					</a>
					<ul class="dropdown-menu content-block">
						<li><a href="user?id=<?php echo $_SESSION["user"]["id"] ?>">Моя сторінка</a></li>
						<li><a href="new_institution">Новий заклад</a></li>
						<li><a href="logout">Вихід</a></li>
					</ul>
				</li>
			<?php } else if (!isset($params["isLogin"])) { ?>
				<li class="dropdown">
					<a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
						Увійти <span class="caret"></span> 
					</a>
					<div class="dropdown-menu content-block">
						<form id="login-form" class="center-block">
							<h4>Вхід</h4>
							<input type="email" id="email" name="email" placeholder="Електронна Адреса" class="form-control input">
							<input type="password" id="password" name="password" placeholder="Пароль" class="form-control input">
							<button type="submit" class="btn btn-primary btn-block">Надіслати</button>
							<a href="signup" class="small-text ">Реєстрація</a>
						</form>
					</div>
				</li>
			<?php } ?>
			
		</ul>
	</header>
	<?php include 'application/views/'.$content_view; ?>
	<footer id="footer">
		Автор: Андрій Колесник
	</footer>
	<div class="modal fade" id="search-modal">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	        <h4 class="modal-title">Результати пошуку</h4>
	      </div>
	      <div class="modal-body row" id="search-results">
	        
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>