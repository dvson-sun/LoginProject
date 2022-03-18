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
			<li class=""><a href="index.php?page_layout=user"><svg class="glyph stroked male user ">
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
				<li class="active">Danh sách thành viên</li>
			</ol>
		</div>
		<!--/.row-->

		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Danh sách thành viên</h1>
			</div>
		</div>
		<!--/.row-->
		<div id="toolbar" class="btn-group" style="margin-bottom: 20px;">
			<a href="index.php?controller=user&action=create" class="btn btn-success">
				<i class="glyphicon glyphicon-plus"></i> Thêm thành viên
			</a>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<table class="table table-bordered" style="margin-top:20px;">
							<thead>
								<tr class="bg-primary">
									<th> STT</th>
									<th> Họ và tên</th>
									<th> Email</th>
									<th width='18%'> Tùy chọn</th>
								</tr>
							</thead>
							<tbody>
                                <?php 
									$count = 0;
                                    foreach($users as $item){
                                ?>
								<tr>
									<td><?= ++$count ?></td>
                                    <td><?= $item['user_name'] ?></td>
									<td><?= $item['user_mail'] ?></td>
                                    
									<td>
										<a href="index.php?controller=user&action=edit&user_id= <?= $item['user_id']?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
										
										<a href="index.php?controller=user&action=delete&user_id=<?= $item['user_id']?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"></i> Xóa</a>
										
									</td>
								</tr>
                                <?php
                                    }
                                ?>


							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!--/.row-->
	</div>
	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>
</body>

</html>