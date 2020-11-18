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
				<!-- breadcrumbs -->
				<ul class="breadcrumb-realestate">
          <li><a href="/">Home</a></li>
          <li><a href="#">Landlord/Agent</a></li>
					<li class="active">Everything You need to know about Buying Off Plan</li>
				</ul>
				
				<!-- title -->
				<div class="page-title"><h1>Landlord/Agent</h1></div>

				<div class="row">
					<div class="col-md-8">
						<div class="agent-detail">
							<div class="row">
								<div class="col-md-4">
									<div class="agent-dp">
										<img src="assets/images/agents/1.jpg" alt="" />
									</div>
								</div>
								<div class="col-md-8">
									<h2>Giedre Bucinskaite</h2>
									<div class="profession">Real Estate Consultant</div>

									<ul class="row more-info">
										<li class="col-md-6">
											<div class="linear-tags">
												Languages : 
												<span>English</span>
												<span>Arabic</span>
												<span>Spannish</span>
											</div>
										</li>
										<li class="col-md-6">
											<div class="linear-tags">
												BBRN# : <span>449842</span>
											</div>
										</li>
										<li class="col-md-6">
											<div class="linear-tags">
												Areas : 
												<span>Palm Jumeirah</span>
												<span>Jumeirah</span>
												<span>Bluewaters</span>
											</div>
										</li>
										<li class="col-md-6">
											<div class="linear-tags">
												Services :
												<span>Rent</span>
												<span>Sale</span>
												<span>Commercial</span>
											</div>
										</li>
									</ul>

									<div class="row">
										<div class="col-md-6">
											<div class="property-info">
												<div class="item">
													<div class="icon-wrapper">
														<img src="assets/images/feature-icons/house-type.svg" alt="">
													</div>
													<div class="property-type">Rent</div>
													<div class="property-count">08</div>
												</div>

												<div class="item">
													<div class="icon-wrapper">
														<img src="assets/images/feature-icons/house-type.svg" alt="">
													</div>
													<div class="property-type">Sale</div>
													<div class="property-count">04</div>
												</div>

												<div class="item">
													<div class="icon-wrapper">
														<img src="assets/images/feature-icons/house-type.svg" alt="">
													</div>
													<div class="property-type">Commercial</div>
													<div class="property-count">12</div>
												</div>
											</div>
										</div>
										<div class="col-md-6 property-logo">
											<img src="assets/images/building-img.jpg" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- right side -->
					<div class="col-md-4">
						<div class="shaded-box">
							<h5>Contact Agent</h5>

							<div class="btns">
								<button class="btn btn-warning with-left-icon mb-3">
									<span><img src="assets/images/phone-white.svg" alt="phone icon"></span> Call Now
								</button>

								<button type="button" class="btn btn-primary with-left-icon" data-toggle="modal" data-target="#send_message">
									<span><img src="assets/images/email-white.svg" alt="phone icon"></span> Send Message
								</button>
							</div>
						</div>
					</div>
				</div>

				<!-- detail tabs -->
				<div class="agent-detail-tabs">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<div class="radio-group" id="agent-detail-data">
									<label>
										<input type="radio" name="detail-info" value="about" checked="checked">
										<span><font>About</font></span>
									</label>

									<label>
										<input type="radio" name="detail-info" value="properties">
										<span><font>Properties</font></span>
									</label>

									<label>
										<input type="radio" name="detail-info" value="ratings">
										<span><font>Ratings</font></span>
									</label>

									<label>
										<input type="radio" name="detail-info" value="comments">
										<span><font>Comments</font></span>
									</label>
								</div>
							</div>
						</div>
					</div>

					<div class="landload-detail-tabs-container">
						<div class="detail-tabs-data" id="about-data" style="display:block">
							<div class="row">
								<div class="col-md-8">
									<p>Nataliya Skrypal is a full-time Real Estate Agent with fam Properties from 2018, specializing 
									in luxury properties in areas like Palm Jumeirah, Dubai Marina, JBR, and BlueWaters. 
									She previously worked in sales most of her life. Living in UAE since 2001, she knows the 
									area well and has acquired extensive knowledge in local housing market and business development. 
									Nataliya is a hardworking professional who sees her work as an opportunity to connect with people 
									from different walks of life. Her dedication to helping clients achieve their estate needs and goals 
									with no hassle involved is always her top priority. She looks forward to helping everyone rent, 
									buy or sell a home!</p>
								</div>
							</div>
						</div>
						<div class="detail-tabs-data" id="properties-data">
							<div class="row">
								<div class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-1.jpg" alt="peroperty image">
										</div>
										
										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Spacious the Best layout 2 bed</h3>
											<div class="price">1200 <span>AED</span></div>

											<div class="features">
												<div class="item beds">2 Beds</div>
												<div class="item baths">2 Baths</div>
												<div class="item area">1075 sqft</div>
											</div>
										</div>
									</a>
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-2.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>3 Bed Room Commercial Villa in</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init aos-animate" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/peroperty-3.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Perfect Family Villa in Downtown.</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/peroperty-3.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Perfect Family Villa in Downtown.</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-1.jpg" alt="peroperty image">
										</div>
										
										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Spacious the Best layout 2 bed</h3>
											<div class="price">1200 <span>AED</span></div>

											<div class="features">
												<div class="item beds">2 Beds</div>
												<div class="item baths">2 Baths</div>
												<div class="item area">1075 sqft</div>
											</div>
										</div>
									</a>
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-2.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>3 Bed Room Commercial Villa in</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-1.jpg" alt="peroperty image">
										</div>
										
										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Spacious the Best layout 2 bed</h3>
											<div class="price">1200 <span>AED</span></div>

											<div class="features">
												<div class="item beds">2 Beds</div>
												<div class="item baths">2 Baths</div>
												<div class="item area">1075 sqft</div>
											</div>
										</div>
									</a>
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-2.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>3 Bed Room Commercial Villa in</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/peroperty-3.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Perfect Family Villa in Downtown.</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/peroperty-3.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Perfect Family Villa in Downtown.</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-1.jpg" alt="peroperty image">
										</div>
										
										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>Spacious the Best layout 2 bed</h3>
											<div class="price">1200 <span>AED</span></div>

											<div class="features">
												<div class="item beds">2 Beds</div>
												<div class="item baths">2 Baths</div>
												<div class="item area">1075 sqft</div>
											</div>
										</div>
									</a>
								</div>
								
								<div class="col-lg-4 col-md-6 col-sm-12 aos-init" data-aos="fade-up">
									<a href="#" class="property-block width-detail">
										<div class="property-img">
											<img src="assets/images/properties-images/property-2.jpg" alt="peroperty image">
										</div>

										<label>
											<input type="checkbox">
											<span></span>
										</label>

										<div class="property-description">
											<h4>Jumeirah Island</h4>
											<h3>3 Bed Room Commercial Villa in</h3>
											<div class="price">2450 <span>AED</span></div>

											<div class="features">
												<div class="item beds">3 Beds</div>
												<div class="item baths">3 Baths</div>
												<div class="item area">2200 sqft</div>
											</div>
										</div>
									</a>
								</div>

							</div>
						</div>
						
						<div class="detail-tabs-data" id="comments-data">
							<div class="row">
								<div class="col-md-8">
									<ul class="comments-list">
										<li>
											<div class="user-dp">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>

											<h4>Ileen Shane</h4>
											<span class="comments-time">2 days ago</span>

											<div class="comments">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
												Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
											</div>

											<div class="replies">
												<h5>Hide Replies</h5>

												<div class="reply-list">
													<ul class="comments-list">
														<li>
															<div class="user-dp">
																<img src="assets/images/avatar-2.jpg" alt="" />
															</div>

															<h4>Ileen Shane</h4>
															<span class="comments-time">2 days ago</span>

															<div class="comments">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
																Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
															</div>
														</li>

														<li>
															<div class="user-dp">
																<img src="assets/images/avatar-2.jpg" alt="" />
															</div>

															<h4>Ileen Shane</h4>
															<span class="comments-time">2 days ago</span>

															<div class="comments">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
																Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
															</div>
														</li>
													</ul>

													<div class="add-comments">
														<div class="user-dp">
															<img src="assets/images/avatar-2.jpg" alt="" />
														</div>
														<form>
															<input type="text" class="form-control" placeholder="Reply With Your Comment" />
															<button>Add Comment</button>
														</form>
													</div>
												</div>

											</div>
										</li>

										<li>
											<div class="user-dp">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>

											<h4>Ileen Shane</h4>
											<span class="comments-time">2 days ago</span>

											<div class="comments">
												Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
												Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
											</div>

											<div class="replies">
												<h5>Hide Replies</h5>
												
												<div class="reply-list">
													<ul class="comments-list">
														<li>
															<div class="user-dp">
																<img src="assets/images/avatar-2.jpg" alt="" />
															</div>

															<h4>Ileen Shane</h4>
															<span class="comments-time">2 days ago</span>

															<div class="comments">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
																Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
															</div>
														</li>

														<li>
															<div class="user-dp">
																<img src="assets/images/avatar-2.jpg" alt="" />
															</div>

															<h4>Ileen Shane</h4>
															<span class="comments-time">2 days ago</span>

															<div class="comments">
																Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
																Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
															</div>
														</li>
													</ul>

													<div class="add-comments">
														<div class="user-dp">
															<img src="assets/images/avatar-2.jpg" alt="" />
														</div>
														<form>
															<input type="text" class="form-control" placeholder="Reply With Your Comment" />
															<button>Add Comment</button>
														</form>
													</div>
												</div>

											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>

						<div class="detail-tabs-data" id="ratings-data">
							<div class="row">
								<div class="col-md-8">
									<ul class="reviews-container">
										<li>
											<div class="client-img">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>
											<div class="rating-detail">
												<h4>Ileen Shane</h4>
												<div class="rating star-5"></div>
												<div class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
													Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
													when an unknown printer took a galley of type and scrambled it to make a type 
													specimen book.
												</div>
											</div>
										</li>

										<li>
											<div class="client-img">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>
											<div class="rating-detail">
												<h4>Ileen Shane</h4>
												<div class="rating star-5"></div>
												<div class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
													Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
													when an unknown printer took a galley of type and scrambled it to make a type 
													specimen book.
												</div>
											</div>
										</li>

										<li>
											<div class="client-img">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>
											<div class="rating-detail">
												<h4>Ileen Shane</h4>
												<div class="rating star-5"></div>
												<div class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
													Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
													when an unknown printer took a galley of type and scrambled it to make a type 
													specimen book.
												</div>
											</div>
										</li>

										<li>
											<div class="client-img">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>
											<div class="rating-detail">
												<h4>Ileen Shane</h4>
												<div class="rating star-5"></div>
												<div class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
													Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
													when an unknown printer took a galley of type and scrambled it to make a type 
													specimen book.
												</div>
											</div>
										</li>

										<li>
											<div class="client-img">
												<img src="assets/images/avatar-2.jpg" alt="" />
											</div>
											<div class="rating-detail">
												<h4>Ileen Shane</h4> 
												<div class="rating star-5"></div>
												<div class="comments">Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
													Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
													when an unknown printer took a galley of type and scrambled it to make a type 
													specimen book.
												</div>
											</div>
										</li>
									</ul>

									<button class="btn btn-warning with-left-icon mb-3">
                    <span><img src="assets/images/edit-white.svg" alt="phone icon"></span> Write Your Review
                  </button>
								</div>
							<div>
						</div>
					</div>

				</div>
			</div>
		</section>

		<!-- add footer -->
	<?php include 'footer.php'; ?>
  </body>
</html>