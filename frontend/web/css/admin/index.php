<?php //header('Location: home.php?show=last30days'); ?>
<?php include('header.php'); ?>

<!-- main content starts from here -->

				<div class="main-content">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="icon-home home-icon"></i>
								<a href="#">Home</a>
							</li>
							<li class="active">Dashboard</li>
						</ul><!-- .breadcrumb -->

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="icon-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- #nav-search -->
					</div>

					<div class="page-content">
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="icon-double-angle-right"></i>
									overview &amp; stats
								</small>							
							</h1>
											
						</div><!-- /.page-header -->


						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->


<div id="key" style="display: none; visibility: hidden;"><?php echo $_SESSION['key'];?></div>
<div id="emailId" style="display: none; visibility: hidden;"><?php echo $_SESSION['email'];?></div>
<div id="company_id" style="display: none; visibility: hidden;"><?php echo $_SESSION['company_id'];?></div>

<hr>
</div>


	<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='./../manage/assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='./../manage/assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='./../manage/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="./../manage/assets/js/bootstrap.min.js"></script>
		<script src="./../manage/assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->

		<script src="./../manage/assets/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="./../manage/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="./../manage/assets/js/jquery.slimscroll.min.js"></script>
		<script src="./../manage/assets/js/jquery.easy-pie-chart.min.js"></script>
		<script src="./../manage/assets/js/jquery.sparkline.min.js"></script>
		<script src="./../manage/assets/js/flot/jquery.flot.min.js"></script>
		<script src="./../manage/assets/js/flot/jquery.flot.pie.min.js"></script>
		<script src="./../manage/assets/js/flot/jquery.flot.resize.min.js"></script>


		<!-- ace scripts -->

		<script src="./../manage/assets/js/ace-elements.min.js"></script>
		<script src="./../manage/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
<script>
	var skin_class = 'skin-1';

	var body = $(document.body);
	body.removeClass('default skin-2 skin-3');


	if(skin_class != 'default') body.addClass(skin_class);

	if(skin_class == 'skin-1') {
		$('.ace-nav > li.grey').addClass('dark');
	}
	else {
		$('.ace-nav > li.grey').removeClass('dark');
	}
</script>
			</body>
</html>