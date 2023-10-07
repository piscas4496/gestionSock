<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Profile</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/Logo.jpg">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/Logo.jpg">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/Logo.jpg">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="src/plugins/cropperjs/dist/cropper.css">
	<link rel="stylesheet" type="text/css" href="vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
	<style type="text/css">
	#log{
		width: 100px;		
	}
	</style>
</head>
<body>
	<div class="pre-loader">
		<div class="pre-loader-box">
			<div id="log" class="loader-logo"><h1>Stock manager</h1></div>
			<div class='loader-progress' id="progress_div">
				<div class='bar' id='bar1'></div>
			</div>
			<div class='percent' id='percent1'>0%</div>
			<div class="loading-text">
				Loading...
			</div>
		</div>
	</div>
		<?php
			include 'header.php';
		?>	
	<div class="right-sidebar">
		<div class="sidebar-title">
			<h3 class="weight-600 font-16 text-blue">
				Layout Settings
				<span class="btn-block font-weight-400 font-12">User Interface Settings</span>
			</h3>
			<div class="close-sidebar" data-toggle="right-sidebar-close">
				<i class="icon-copy ion-close-round"></i>
			</div>
		</div>
		<div class="right-sidebar-body customscroll">
			<div class="right-sidebar-body-content">
				<h4 class="weight-600 font-18 pb-10">Header Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary header-white active">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary header-dark">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Sidebar Background</h4>
				<div class="sidebar-btn-group pb-30 mb-10">
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-light ">White</a>
					<a href="javascript:void(0);" class="btn btn-outline-primary sidebar-dark active">Dark</a>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu Dropdown Icon</h4>
				<div class="sidebar-radio-group pb-10 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-1" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-1" checked="">
						<label class="custom-control-label" for="sidebaricon-1"><i class="fa fa-angle-down"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-2" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-2">
						<label class="custom-control-label" for="sidebaricon-2"><i class="ion-plus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebaricon-3" name="menu-dropdown-icon" class="custom-control-input" value="icon-style-3">
						<label class="custom-control-label" for="sidebaricon-3"><i class="fa fa-angle-double-right"></i></label>
					</div>
				</div>

				<h4 class="weight-600 font-18 pb-10">Menu List Icon</h4>
				<div class="sidebar-radio-group pb-30 mb-10">
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-1" name="menu-list-icon" class="custom-control-input" value="icon-list-style-1" checked="">
						<label class="custom-control-label" for="sidebariconlist-1"><i class="ion-minus-round"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-2" name="menu-list-icon" class="custom-control-input" value="icon-list-style-2">
						<label class="custom-control-label" for="sidebariconlist-2"><i class="fa fa-circle-o" aria-hidden="true"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-3" name="menu-list-icon" class="custom-control-input" value="icon-list-style-3">
						<label class="custom-control-label" for="sidebariconlist-3"><i class="dw dw-check"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-4" name="menu-list-icon" class="custom-control-input" value="icon-list-style-4" checked="">
						<label class="custom-control-label" for="sidebariconlist-4"><i class="icon-copy dw dw-next-2"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-5" name="menu-list-icon" class="custom-control-input" value="icon-list-style-5">
						<label class="custom-control-label" for="sidebariconlist-5"><i class="dw dw-fast-forward-1"></i></label>
					</div>
					<div class="custom-control custom-radio custom-control-inline">
						<input type="radio" id="sidebariconlist-6" name="menu-list-icon" class="custom-control-input" value="icon-list-style-6">
						<label class="custom-control-label" for="sidebariconlist-6"><i class="dw dw-next"></i></label>
					</div>
				</div>

				<div class="reset-options pt-30 text-center">
					<button class="btn btn-danger" id="reset-settings">Reset Settings</button>
				</div>
			</div>
		</div>
	</div>
		<?php
			include 'menu.php';
		?>
	<div class="mobile-menu-overlay"></div>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Profile</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.php">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Profile</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
								<img src="vendors/images/naomie.jpg" alt="" class="avatar-photo">
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-body pd-5">
												<div class="img-container">
													<img id="image" src="vendors/images/naomie.jpg" alt="Picture">
												</div>
											</div>
											<div class="modal-footer">
												<input type="submit" value="Update" class="btn btn-primary">
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<h5 class="text-center h5 mb-0">Naomi Rebecca</h5>
							<p class="text-center text-muted font-14">Lorem ipsum dolor sit amet</p>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Contact Information</h5>
								<ul>
									<li>
										<span>Adresse Email:</span>
										FerdinandMChilds@test.com
									</li>
									<li>
										<span>Telephone:</span>
										619-229-0054
									</li>
									<li>
										<span>Adresse:</span>
										America
									</li>
									<li>
										<span>Genre:</span>
										1807 Holden Street<br>
										San Diego, CA 92115
									</li>
								</ul>
							</div>					
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
										</li>										
										<li class="nav-item">
											<a class="nav-link" data-toggle="tab" href="#setting" role="tab">Settings</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">												
												<form class="form-horizontal" method="POST" Action="#" autocomplete="off">
                                                            <div  class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="nom">Nom</label>
                                                                        <input value="" id="nom" name="nom" type="text" class="form-control" required/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="prenom">Prénom</label>
                                                                        <input value="" id="prenom" name="prenom" type="text" class="form-control" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div  class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                    <label>Genre :</label>
                                                                    <select class="form-control" id="sexe" name="sexe">															
                                                                        <option>M</option>
                                                                        <option>F</option>																											
                                                                    </select>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="datenaissance">Date naissance</label>
                                                                        <input value="" id="datenaissance" name="datenaissance" type="date" class="form-control" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div  class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="addresse">Adresse</label>
                                                                        <input placeholder="Entrer adresse" id="addresse" name="addresse" type="text" class="form-control" required/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="telephone">Telephone</label>
                                                                        <input value="" id="telephone" name="telephone" type="text" class="form-control" required/>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div  class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="email">Email</label>
                                                                        <input value="" id="email" name="email" type="email" class="form-control" required/>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <label for="profession">Profession</label>
                                                                        <input value="" id="profession" name="profession" type="text" class="form-control" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            
                                                            <div  class="form-group">
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <label for="currency_demo" >Photo</label>
                                                                        <input value="" id="niveauEtude" name="niveauEtude" type="file" class="form-control" required/>
                                                                    </div>										
                                                                </div>
                                                            </div>								
                                                            <div class="line"></div>
                                                                <div class="form-group row">
                                                                <div class="col-sm-9 offset-sm-1">
                                                                    <input type="submit" name="submit" id="submit" class="btn btn-primary col-md-12 offset-0 " value="Modifier" />										
                                                                </div>
                                                            </div>
                                                        </form>
												</div>
											</div>
										</div>
										<!-- Timeline Tab End -->
					
										<!-- Setting Tab start -->
										<div class="tab-pane fade height-100-p" id="setting" role="tabpanel">
											<div class="profile-setting">
												<form><br>
													<div class="form-group row">
														<label class="col-sm-5 form-control-label offset-1">Statut :</label>
														<div class="col-sm-8 offset-1">
														<select class="form-control" id="niveau" name="niveau">															
															<option>Etudiant</option>
															<option>Formateur</option>
															<option>Admin</option>                                                																											
														</select>
														</div>
													</div>									
													<div class="line"></div>								
													<div class="form-group row">
														<label class="col-sm-5 form-control-label offset-1">Username :</label>
														<div class="col-sm-8 offset-1">
															<input type="text" class="form-control" placeholder="Username" id="username" name="username" required/>
														</div>
													</div>	
													<div class="line"></div>
													<div class="form-group row">
														<label class="col-sm-5 form-control-label offset-1">Password :</label>
														<div class="col-sm-8 offset-1">
															<input type="password" class="form-control" placeholder="Enter your password" id="password" name="password" required/>
														</div>
													</div>
													<div class="line"></div>
													<div class="form-group row">
														<div class="col-sm-4 offset-sm-2">
															<input type="submit" name="submit" id="submit" class="btn btn-primary col-md-12 offset-0 " value="Modifier" />										
														</div>
													</div>
												</form>
											</div>
										</div>
										<!-- Setting Tab End -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				include 'footer.php'
			?>
		</div>
	</div>
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/cropperjs/dist/cropper.js"></script>
	<script>
		window.addEventListener('DOMContentLoaded', function () {
			var image = document.getElementById('image');
			var cropBoxData;
			var canvasData;
			var cropper;

			$('#modal').on('shown.bs.modal', function () {
				cropper = new Cropper(image, {
					autoCropArea: 0.5,
					dragMode: 'move',
					aspectRatio: 3 / 3,
					restore: false,
					guides: false,
					center: false,
					highlight: false,
					cropBoxMovable: false,
					cropBoxResizable: false,
					toggleDragModeOnDblclick: false,
					ready: function () {
						cropper.setCropBoxData(cropBoxData).setCanvasData(canvasData);
					}
				});
			}).on('hidden.bs.modal', function () {
				cropBoxData = cropper.getCropBoxData();
				canvasData = cropper.getCanvasData();
				cropper.destroy();
			});
		});
	</script>
</body>
</html>