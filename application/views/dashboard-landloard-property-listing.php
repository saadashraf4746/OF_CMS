<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>Add Property</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body class="dashbaord-body">
    <!-- left menu -->
    <?php include 'includes/left-menu.php'; ?>

    <div class="dashboard-content">
      <h1>My Properties <span>48</span></h1>
      <div class="radio-group status">
        <label>
          <input type="radio" name="property-status" checked="">
          <span><font>Booked</font></span>
        </label>

        <label>
          <input type="radio" name="property-status">
          <span><font>Open</font></span>
        </label>
      </div>

      <div class="dashboard-search">
        <form>
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Property Purpose</option>
                  <option value="">Rent</option>
                  <option value="">For Sale</option>
                </select>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">Property Type</option>
                  <option value="">Rent</option>
                  <option value="">For Sale</option>
                </select>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-group">
                <select name="" id="" class="form-control">
                  <option value="">City</option>
                  <option value="">Islamabad</option>
                  <option value="">Sargodha</option>
                </select>
              </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Search by property name" />
              </div>
            </div>
          </div>
          
          <button type="submit" class="btn btn-warning">
            <img src="assets/images/search-icon.svg" alt="" />
          </button>
        
        </form>
      </div>

      <div class="property-listing">
        <div class="property-block">
          <div class="property-img">
            <img src="assets/images/properties-images/property-1.jpg" alt="" />
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
                  <img src="assets/images/user-icon.svg" alt="" />
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="" />
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="" />
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>

          </div>
        </div>
        <div class="property-block">
          <div class="property-img">
            <img src="assets/images/properties-images/property-1.jpg" alt="" />
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
                  <img src="assets/images/user-icon.svg" alt="" />
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="" />
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="" />
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>

          </div>
        </div>
        <div class="property-block">
          <div class="property-img">
            <img src="assets/images/properties-images/property-1.jpg" alt="" />
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
                  <img src="assets/images/user-icon.svg" alt="" />
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="" />
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="" />
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>

          </div>
        </div>
        <div class="property-block">
          <div class="property-img">
            <img src="assets/images/properties-images/property-1.jpg" alt="" />
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
                  <img src="assets/images/user-icon.svg" alt="" />
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="" />
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="" />
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>

          </div>
        </div>
        <div class="property-block">
          <div class="property-img">
            <img src="assets/images/properties-images/property-1.jpg" alt="" />
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
                  <img src="assets/images/user-icon.svg" alt="" />
                </div>

                <h4>Tenant</h4>
                <span>Abdullah Asad</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/heart-icon.svg" alt="" />
                </div>

                <h4>In Wishlist of</h4>
                <span>20 visitors</span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Received</h4>
                <span class="price blue">1800 AED <font>3 Payments</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/card-icon-2.svg" alt="" />
                </div>

                <h4>Payment Remaining</h4>
                <span class="price orange">650 AED <font>1 Payment</font></span>
              </div>

              <div class="item">
                <div class="icon">
                  <img src="assets/images/calendar.svg" alt="" />
                </div>

                <h4>Next Due Date</h4>
                <span>01-04-2020</span>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

    <!-- footer -->
    <?php include 'footer-simple.php'; ?>
  </body>
</html>