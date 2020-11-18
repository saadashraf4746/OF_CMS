<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>Saved Properties</title>
    <?php include 'includes/header-includes.php'; ?>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
  </head>
  <body>
    <!-- add header -->
      <?php include 'header.php'; ?>

    <!-- property detail page content -->
    <section class="property-detail">

      <div class="container">
        <!-- breadcrums -->
        <ul class="breadcrumb-realestate">
          <li><a href="/">Home</a></li>
          <li class="active">My Profile</li>
        </ul>
        
        <div class="hero-slider-lg">
          <ul id="hero-carousel-lg" class="owl-carousel carousel">
            <li><img src="assets/images/hero-slider-img.jpg" alt="Hero image"/></li>
            <li><img src="assets/images/hero-slider-img.jpg" alt="Hero image"/></li>
            <li><img src="assets/images/hero-slider-img.jpg" alt="Hero image"/></li>
            <li><img src="assets/images/hero-slider-img.jpg" alt="Hero image"/></li>
            <li><img src="assets/images/hero-slider-img.jpg" alt="Hero image"/></li>
          </ul>
  
          <div class="sliders-counter">
            <span>View <number id="gallery_images">5</number> Photos</span>
          </div>
        </div>

        
      </div>
      

      <!-- detail colums -->
      <div class="detail-container">
        <div class="container">
          <div class="property-short-info">
            <p>Home  |  Buy  |  High End Custom Built Spacious Living  Pool</p>
            <h1>High End | Custom Built | Spacious Living | Pool</h1>

            <div class="location-info">
              <span class="location">Jumeirah Island</span>
              <span class="tag">For Sale</span>
            </div>

            <h3 class="mt-5">Property Status</h3>
            <div class="more-info">
              <div class="item">
                <div class="icon">
                  <img src="assets/images/user-icon.svg" alt="">
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="">
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="">
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="">
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="">
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">
              <div class="features">
                <div class="item house-type">Villa</div>
                <div class="item beds">3 Beds</div>
                <div class="item baths">3 Baths</div>
                <div class="item area">2200 sqft</div>
              </div>

              <!-- amenities -->
              <div class="detail-section">
                <h3>Amenities</h3>
                <ul>
                  <li>Study Room</li>
                  <li>Central A/C & Heating</li>
                  <li>Concierge Service</li>
                  <li>Built in Wardrobes</li>
                  <li>Walk-in Closet</li>
                  <li>Private Garden</li>
                  <li>View of Landmark</li>
                  <li>Pets Allowed</li>
                  <li>Wifi</li>
                  <li>Shared Pool</li>
                  <li>Maid Service</li>
                  <li>Balcony</li>
                </ul>
              </div>

              <!-- location -->
              <div class="detail-section">
                <h3>Location</h3>
                <div class="map">
                 <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3320.5450300315465!2d72.99617706454374!3d33.66894883071183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95ff25ef0ae9%3A0xd74faf85d90645e5!2sG-11%20Markaz%20G%2011%20Markaz%20G-11%2C%20Islamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1584561311726!5m2!1sen!2s" width="100%" height="210" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                </div>
              </div>

              <!-- description -->
              <div class="detail-section">
                  <h3>Description</h3>
                  <p>
                  Cool, calm and sophisticated with a youthful edge, this functional home is 
                  enveloped in light and comfort. The living is easy in this impressive, 
                  generously proportioned contemporary villa, with lush green views, located in a 
                  very quiet courtyard.</p>
                  <p>Approx BUA 5200 sqft</p>
                  <p>Approx Plot 6500 sqft</p>
                  <p>4 Bedrooms +Study +Family Area</p>
                  <p>Massive Basement with Sitting Area, Shower room and Gym
                    Spacious Living and Dining Area with a beautiful false ceiling with three layers of lighting
                    Modern Kitchen with Quality Appliances overlooking the very comfortable Family Area
                    Separate Office Space /Study on the ground floor
                  </p>
              </div>
            </div>

            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="shaded-box">
                <h3 class="property-rate">1,00,000 AED ...</h3>
                <p class="estimated-note">Estimated Mort</p>

                <div class="btns">
                  <button class="btn btn-warning btn-lg with-left-icon mb-3">
                    <span><img src="assets/images/phone-white.svg" alt="phone icon"/></span> Call Now
                  </button>

                  <button type="button" class="btn btn-primary btn-lg with-left-icon mb-3" 
                  data-toggle="modal" data-target="#send_message">
                    <span><img src="assets/images/email-white.svg" alt="phone icon"/></span> Send Message
                  </button>

                  <button class="btn btn-outline-success btn-lg with-left-icon mb-3">
                    <span><img src="assets/images/whatsapp.svg" alt="phone icon"/></span> Whatsapp
                  </button>

                  <button class="btn btn-outline-primary btn-lg with-left-icon">
                    <span><img src="assets/images/map-marker-blue.svg" alt="phone icon"/></span> Schedule a Viewing
                  </button>

                </div>
              </div>

              <div class="shaded-box">
                <div class="text-center">
                  <div class="building-img">
                    <img src="assets/images/building-img.jpg" alt="Building Image" />
                  </div>

                  <h4>Taurus Floor Real Estate</h4>
                  <span class="tag-label btn">Verified</span>

                  <div class="building-info">
                    <ul>
                      <li>RERA Permit Number: <span>20281</span></li>
                      <li>RERA Registration Number: <span>20281</span></li>
                      <li>DED License Number: <span>794945</span></li>
                    </ul>
                  </div>
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>    
    </section>

    <section class="recomended-properties aos-init aos-animate" data-aos="fade-up">
      <div class="container">
        <div class="row">
          <div class="col-md-8" data-aos="fade-up">
            <h3>Landlord Feedback</h3>
              <!-- comments/ratings -->
              <div class="tabs-container">
                <div class="radio-group tabs">
                  <label>
                    <input type="radio" name="detail_property_rating" checked="" value="detail_ratings">
                    <span><font>Rating</font></span>
                  </label>

                  <label>
                    <input type="radio" name="detail_property_rating" value="detail_comments">
                    <span><font>Comments</font></span>
                  </label>
                </div>

                <div class="tabs-content">
                  <div class="content" id="detail_ratings_data" style="display:block">
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

                  <div class="content" id="detail_comments_data">
                    <ul class="comments-list">
                      <li>
                        <div class="user-dp">
                          <img src="assets/images/avatar-2.jpg" alt="">
                        </div>

                        <h4>Ileen Shane</h4>
                        <span class="comments-time">2 days ago</span>

                        <div class="comments">
                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. 
                          Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </div>

                        <div class="replies opened">
                          <h5>Hide Replies</h5>

                          <div class="reply-list">
                            <ul class="comments-list">
                              <li>
                                <div class="user-dp">
                                  <img src="assets/images/avatar-2.jpg" alt="">
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
                                  <img src="assets/images/avatar-2.jpg" alt="">
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
                                <img src="assets/images/avatar-2.jpg" alt="">
                              </div>
                              <form>
                                <input type="text" class="form-control" placeholder="Reply With Your Comment">
                                <button>Add Comment</button>
                              </form>
                            </div>
                          </div>

                        </div>
                      </li>

                      <li>
                        <div class="user-dp">
                          <img src="assets/images/avatar-2.jpg" alt="">
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
                                  <img src="assets/images/avatar-2.jpg" alt="">
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
                                  <img src="assets/images/avatar-2.jpg" alt="">
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
                                <img src="assets/images/avatar-2.jpg" alt="">
                              </div>
                              <form>
                                <input type="text" class="form-control" placeholder="Reply With Your Comment">
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
          </div>

          <div class="col-md-4" data-aos="fade-up">
            <a href="#" class="show-more">Show More</a>
            <h3>Similar Ads</h3>
            
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
        </div>
      </div>
    </section>

    <!-- send message modal -->
    <div class="modal fade custom-modal" id="send_message" tabindex="-1" role="dialog" aria-labelledby="send_messageLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Send Message</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter your name" />      
              </div>

              <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter your email" />      
              </div>

              <div class="form-group">
                <input type="tel" class="form-control" placeholder="Enter your phone number" />      
              </div>

              <div class="form-group">
                <textarea class="form-control" placeholder="Enter your message"></textarea>
              </div>

              <div class="text-center">
                <button class="btn btn-warning btn-lg search-btn cta" type="submit">Send Message</button>        
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

      
    <!-- add footer -->
    <?php include 'footer.php'; ?>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
  </body>
</html>