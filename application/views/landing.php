<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>Realestate Landing</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body>
    <!-- add header -->
    <?php include 'header-session-out.php'; ?>

    <div class="card-block">
      <div class="container">
        <div class="card-img">
          <img src="assets/images/card-img.jpg" alt="card image" />
        </div>
        <div class="card-detail">
          <h1>Largest Real Estate Marketplace</h1>
          <p>We are the largest real estate portal and got the largest user base in this region.</p>

          <h4>What We Offer?</h4>
          <ul>
            <li>25k Registered Users</li>
            <li>300k Daily Visistors on Platform</li>
            <li>Largest Real Estate Platform</li>
            <li>Multiple Payment Types</li>
            <li>Multiple Payment Tenures as per Owner Need</li>
          </ul>

          <a href="register.php" class="btn btn-warning btn-lg search-btn cta">Register Now</a>
        </div>
      </div>
    </div>

    <div class="feature-strip">
      <div class="container">
        <h2 class="text-center">How it Works</h2>
        <ul>
          <li>
            <div class="icon-wrapper"><img src="assets/images/building-icon.svg" alt=""/></div>
            <h5>Post Your Add</h5>
            <h6>Step-01</h6>
          </li>

          <li>
            <div class="icon-wrapper"><img src="assets/images/card-icon.svg" alt=""/></div>
            <h5>Get Offers</h5>
            <h6>Step-02</h6>
          </li>

          <li>
            <div class="icon-wrapper"><img src="assets/images/deal-icon.svg" alt=""/></div>
            <h5>Make Your Deal</h5>
            <h6>Step-03</h6>
          </li>
        </ul>
      </div>
    </div>

    <div class="container">
      <div class="register">
        <h2 class="text-center">Register Now</h2>

        <form>
          <div class="form-group">
            <div class="radio-group">
              <label>
                <input type="radio" name="houseType" checked="">
                <span><font>Landlord</font></span>
              </label>

              <label>
                <input type="radio" name="houseType">
                <span><font>Agent</font></span>
              </label>
            </div>
          </div>

          <h3>Register as Landlord with Kamal</h3>
          <p>Join the No.1 Real Estate Portal to rent and sale your properties at best prices.</p>

          <hr />

          <label class="bigger">Landlord Details</label>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter landlord ID" />
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter landlord deeds" />
              </div>
            </div>
          </div>

          <hr />
          <label class="bigger">Bank Details</label>
          <div class="row">
            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter account title" />
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter account number" />
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter IBANN number" />
              </div>
            </div>

            <div class="col-md-6 col-sm-12">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter swift code" />
              </div>
            </div>
          </div>

          <div class="form-group text-right">
            <button class="btn btn-warning btn-lg search-btn cta" type="submit">Register Now</button>
          </div>
        </form>
      </div>
    </div>
      
    <!-- login modal  -->
    <?php include 'login-modal.php'; ?>

    <!-- add footer -->
    <?php include 'footer-simple.php'; ?>
  </body>
</html>