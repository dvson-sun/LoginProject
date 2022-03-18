<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrator</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/bootstrap-table.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">

	<!--Icons-->
	<script src="js/lumino.glyphs.js"></script>
	<script src="../ckeditor/ckeditor.js"></script>

	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><span>Manage </span>User</a>
				<div class="user-menu">
					<li class="dropdown pull-right">
						<i style="color: #fff;">
							<?php if (isset($_SESSION['user_mail'])) {
								echo $_SESSION['user_mail'];
							} ?>
						</i>
						<a href="index.php?controller=logout&action=logout" class="btn btn-primary" style="margin-bottom: 10px; margin-left: 10px;"> Đăng xuất</a>
					</li>
				</div>
			</div>

		</div><!-- /.container-fluid -->
	</nav>

	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
		<li class=""><a href="index.php"><svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user" />
					</svg>Dashboard</a></li>
			<li class=""><a href="index.php?controller=user"><svg class="glyph stroked male user ">
						<use xlink:href="#stroked-male-user" />
					</svg>Quản lý thành viên</a></li>
		</ul>

	</div>
	<!--/.sidebar-->

	<!-- master page layout -->

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home">
                        <use xlink:href="#stroked-home"></use>
                    </svg></a></li>
            <li class="active">Login Success</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">

        <p class="alert alert-success " style="margin-top: 50px; text-align: center; font-size: 30px;">Bạn đã đăng nhập thành công !!! </p>

    </div>
		<!--/.row
	</div>
	/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
</body>

</html>