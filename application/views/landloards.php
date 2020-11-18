<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
	<title>Realestate</title>
	<?php include 'includes/header-includes.php'; ?>
  </head>
  <body>
		<!-- add header -->
	  <?php include 'header.php'; ?>

		

		<section class="agents-page">
			<div class="container">
				<div class="page-title"><h1>Landlord/Agent</h1></div>

				<!-- filter -->
				<div class="filters">
					<form>
						<div class="row">
							<div class="col-lg-3 col-md-4 col-xs-12">
								<div class="form-group switch">
									<div class="radio-group">
										<label>
											<input type="radio" name="landloards" checked="">
											<span><font>Landlords</font></span>
										</label>

										<label>
											<input type="radio" name="landloards">
											<span><font>Agents</font></span>
										</label>
									</div>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-4 col-md-6">
								<div class="form-group">
									<div class="input-group mb-3">
										<div class="input-group-prepend">
											<button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Abu Dhabi
											</button>
											<div class="dropdown-menu">
												<a class="dropdown-item" href="#">Pakistan</a>
												<a class="dropdown-item" href="#">China</a>
												<a class="dropdown-item" href="#">USA</a>
											</div>
										</div>
										<input type="text" class="form-control with-left-icon location-map" aria-label="Text input with dropdown button" placeholder="What area(s) are you looking for">
									</div>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<div class="form-group">
									<input type="text" class="form-control with-left-icon search" placeholder="Agent Name">
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<div class="form-group">
									<select class="form-control">
										<option>Services Required</option>
										<option>House</option>
										<option>Flats</option>
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<div class="form-group">
									<select class="form-control">
										<option>Languages Known</option>
										<option>House</option>
										<option>Flats</option>
									</select>
								</div>
							</div>
							<div class="col-lg-2 col-md-6">
								<button class="btn btn-warning btn-lg search-btn cta" type="submit">Find Now</button>
							</div>
						</div>
					</form>
				</div>

				<!-- Agent list -->
				<div class="agent-list">
					<div class="row">
						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
							<a href="#" class="agent-block">
								<div class="img"><img src="assets/images/agents/1.jpg" alt="" /></div>
								<div class="detail">
									<h4>Adel ElSayed</h4>
									<div class="languages">
										Languages : 
										<span>English</span>
										<span>Arabic</span>
										<span>Spannish</span>
									</div>

									<div class="property-info">
										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Rent</div>
											<div class="property-count">08</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Sale</div>
											<div class="property-count">04</div>
										</div>

										<div class="item">
											<div class="icon-wrapper">
												<img src="assets/images/feature-icons/house-type.svg" alt="" />
											</div>
											<div class="property-type">Commercial</div>
											<div class="property-count">12</div>
										</div>
									</div>
								</div>
							</a>
						</div>

						
					</div>

					<div class="costum-pagination text-center">
						<ul>
							<li class="previous"><a href="#">Previous</a></li>
							<li class="active"><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">4</a></li>
							<li class="next"><a href="#">Next</a></li>
						</ul>

						<div class="show-per-page">
							Results Per Page:
							<select class="form-control">
								<option>12</option>
								<option>20</option>
								<option>30</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- add footer -->
	<?php include 'footer.php'; ?>
  </body>
</html>