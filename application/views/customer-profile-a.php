<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>Add Property</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body>
    <!-- left menu -->
    <?php include 'header.php'; ?>

    <section class="customer-detail">
      <div class="container">
        <!-- breadcrums -->
        <ul class="breadcrumb-realestate">
          <li><a href="/">Home</a></li>
          <li class="active">My Profile</li>
        </ul>

        <div class="page-title">
          <h1>My Profile</h1>
        </div>

        <!-- profile section -->
        <div class="profile-section agent-detail">
          <div class="row">
            <div class="col-md-4">
              <div class="agent-dp">
                <img src="assets/images/agents/2.jpg" alt="">
              </div>
            </div>
            <div class="col-md-8">
              <h2>Giedre Bucinskaite</h2>
              <div class="profession">Real Estate Consultant</div>

              <ul class="row more-info">
                <li class="col-md-6">
                  <div class="linear-tags">
                    Email : 
                    <span>ahmad.abdullah@gmail.com </span>
                  </div>
                </li>
                <li class="col-md-6">
                  <div class="linear-tags">
                  Phone Number : <span>+971 568 3879</span>
                  </div>
                </li>
                <li class="col-md-6">
                  <div class="linear-tags">
                    Password : 
                    <span>xxxxxxxx</span>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- tabs -->
        <div class="tabs-container">
          <!-- radio -->
          <div class="radio-group tabs">
            <label>
              <input type="radio" name="customer-property-details" value="customer_property_info" checked="checked">
              <span><font>My Properties</font></span>
            </label>

            <label>
              <input type="radio" name="customer-property-details" value="customer_payment_info">
              <span><font>Payment History</font></span>
            </label>
          </div>

          <!-- tabs content -->
          <div class="tabs-content">
            <div class="content" id="customer_property_info_data" style="display:
            block">
            <div class="property-listing">
              <div class="property-block">
                <div class="property-img">
                  <img src="assets/images/properties-images/property-1.jpg" alt="">
                </div>

                <div class="property-detail">
                  <div class="property-header">
                    <div class="label-container">
                      <span>For Sale</span>
                    </div>

                    <h3>3 Bed Room Commercial Villa in</h3>
                    <div class="address">23-B Town, Jumeirah island, dubai </div>
                  </div>

                  <div class="price-info">
                    <div class="label">Total Amount</div>
                    <div class="price">
                      <h5>2450 AED</h5>
                      <span>4 Payments</span>
                    </div>
                  </div>

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
              </div>
              <div class="property-block">
                <div class="property-img">
                  <img src="assets/images/properties-images/property-1.jpg" alt="">
                </div>

                <div class="property-detail">
                  <div class="property-header">
                    <div class="label-container">
                      <span>For Sale</span>
                    </div>

                    <h3>3 Bed Room Commercial Villa in</h3>
                    <div class="address">23-B Town, Jumeirah island, dubai </div>
                  </div>

                  <div class="price-info">
                    <div class="label">Total Amount</div>
                    <div class="price">
                      <h5>2450 AED</h5>
                      <span>4 Payments</span>
                    </div>
                  </div>

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
              </div>
              <div class="property-block">
                <div class="property-img">
                  <img src="assets/images/properties-images/property-1.jpg" alt="">
                </div>

                <div class="property-detail">
                  <div class="property-header">
                    <div class="label-container">
                      <span>For Sale</span>
                    </div>

                    <h3>3 Bed Room Commercial Villa in</h3>
                    <div class="address">23-B Town, Jumeirah island, dubai </div>
                  </div>

                  <div class="price-info">
                    <div class="label">Total Amount</div>
                    <div class="price">
                      <h5>2450 AED</h5>
                      <span>4 Payments</span>
                    </div>
                  </div>

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
              </div>
              <div class="property-block">
                <div class="property-img">
                  <img src="assets/images/properties-images/property-1.jpg" alt="">
                </div>

                <div class="property-detail">
                  <div class="property-header">
                    <div class="label-container">
                      <span>For Sale</span>
                    </div>

                    <h3>3 Bed Room Commercial Villa in</h3>
                    <div class="address">23-B Town, Jumeirah island, dubai </div>
                  </div>

                  <div class="price-info">
                    <div class="label">Total Amount</div>
                    <div class="price">
                      <h5>2450 AED</h5>
                      <span>4 Payments</span>
                    </div>
                  </div>

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
              </div>
              <div class="property-block">
                <div class="property-img">
                  <img src="assets/images/properties-images/property-1.jpg" alt="">
                </div>

                <div class="property-detail">
                  <div class="property-header">
                    <div class="label-container">
                      <span>For Sale</span>
                    </div>

                    <h3>3 Bed Room Commercial Villa in</h3>
                    <div class="address">23-B Town, Jumeirah island, dubai </div>
                  </div>

                  <div class="price-info">
                    <div class="label">Total Amount</div>
                    <div class="price">
                      <h5>2450 AED</h5>
                      <span>4 Payments</span>
                    </div>
                  </div>

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
              </div>
            </div>  
          </div>
            <div class="content" id="customer_payment_info_data">
              <table class="custom-table">
                <thead>
                  <tr>
                    <th>Payment Date</th>
                    <th>Type</th>
                    <th>Property Description</th>
                    <th>Landlord/Agent</th>
                    <th>Amount</th>
                    <th>Ref ID</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>12-05-2020</td>
                    <td>Property Rent</td>
                    <td>3 Bed Room Commercial Villa in Mid City</td>
                    <td>Asad Abdullah</td>
                    <td>2450 AED</td>
                    <td><a href="#">019182279</a></td>
                  </tr>

                  <tr>
                    <td>12-05-2020</td>
                    <td>Property Rent</td>
                    <td>3 Bed Room Commercial Villa in Mid City</td>
                    <td>Asad Abdullah</td>
                    <td>2450 AED</td>
                    <td><a href="#">019182279</a></td>
                  </tr>

                  <tr>
                    <td>12-05-2020</td>
                    <td>Property Rent</td>
                    <td>3 Bed Room Commercial Villa in Mid City</td>
                    <td>Asad Abdullah</td>
                    <td>2450 AED</td>
                    <td><a href="#">019182279</a></td>
                  </tr>

                  <tr>
                    <td>12-05-2020</td>
                    <td>Property Rent</td>
                    <td>3 Bed Room Commercial Villa in Mid City</td>
                    <td>Asad Abdullah</td>
                    <td>2450 AED</td>
                    <td><a href="#">019182279</a></td>
                  </tr>
                </tbody>
              </table>

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
        <div>
      </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php'; ?>
  </body>
</html>