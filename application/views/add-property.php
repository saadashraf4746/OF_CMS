<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>Add New Property</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body class="dashbaord-body">
    <!-- left menu -->
    <?php include 'includes/left-menu.php'; ?>

    <div class="dashboard-content">
      <ul class="breadcrumb-realestate">
        <li><a href="/">Home</a></li>
        <li class="active">Search Results</li>
      </ul>

      <h1>Add New Property</h1>

      <div class="add-property-form-container">
        <form>
          <div class="upload-file">
            <input type="file" />
          </div>
          <div class="sliders-counter">
            <span>Upload More Photos <number id="gallery_images">(12)</number></span>
          </div>

          <h2>Property Details</h2>
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Add Title</label>
                <input type="text" class="form-control" placeholder="Enter property title" /> 
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Purpose of Property</label>
                <select class="form-control">
                  <option>Property for Rent</option>
                  <option>Property for Sale</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>City</label>
                <select class="form-control">
                  <option>Select City</option>
                  <option>Islamabad</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Property Location</label>
                <input type="text" class="form-control" placeholder="Enter property location" /> 
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Property Type</label>
                <select class="form-control">
                  <option>Select property type</option>
                  <option>abc</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Bedrooms</label>
                <select class="form-control">
                  <option>Enter no. of bedrooms</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Bathrooms</label>
                <select class="form-control">
                  <option>Enter no. of baths</option>
                  <option>2</option>
                  <option>3</option>
                </select>
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Area(sqft)</label>
                <input type="text" class="form-control" placeholder="Enter area in sqft" /> 
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Property Status</label>
                <input type="text" class="form-control" placeholder="Furnished" /> 
              </div>
            </div>
          </div>
          
          <!-- checkeboxes -->
          <label for="">Amenitis</label>
          <div class="row">
            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Study Room
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Central A/C & Heating
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Concierge Service
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Built in Wardrobes
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Private Garden
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  View of Landmark
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Pets Allowed
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Wifi
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Shared Pool
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Maid Service
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Balcony
                </label>
              </div>
            </div>

            <div class="col-md-3 col-sm-6">
              <div class="checkbox">
                <label>
                  <input type="checkbox" name="" /><span class="check"></span>
                  Dinning Table
                </label>
              </div>
            </div>
          </div>

          <label for="">Add Description</label>
          <div class="form-group">
            <textarea class="form-control" placeholder="Enter add description"></textarea>
          </div>

          <h2>Price Details</h2>
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Price</label>
                <input type="text" class="form-control" placeholder="Enter property price" /> 
              </div>
            </div>

            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Pricing Terms</label>
                <select class="form-control">
                  <option>Rent after 2 months</option>
                  <option>urgently</option>
                </select>
              </div>
            </div>
          </div>

          <h2>Ad Type</h2>
          <div class="row">
            <div class="col-xs-12 col-sm-6">
              <label class="radio-group-lg">
                <input type="radio" name="add_type" checked />
                <span class="radio"></span>

                <div class="detail">
                  <h4>Standard Ad</h4>
                  <span>Sell Your Car without any charges</span>
                </div>

                <div class="price">
                  <span class="price-label">Free Ad</span>
                </div>
              </label>
            </div>

            <div class="col-xs-12 col-sm-6">
              <label class="radio-group-lg">
                <input type="radio" name="add_type" />
                <span class="radio"></span>

                <div class="detail">
                  <h4>Sponsored Ad</h4>
                  <span>Your Ad stays on top to sell Quicky.</span>
                </div>
                <div class="price">
                  <span class="price-label">25AED</span>
                  <span class="label">per month</span>
                </div>
              </label>
            </div>
          </div>

          <h2>Property Details</h2>
          <div class="row">
            <div class="col-md-4 col-sm-6">
              <div class="form-group">
                <label>Contact Number</label>
                <input type="text" class="form-control" placeholder="Enter phone number" /> 
              </div>
            </div>
          </div>

          <hr />

          <div class="text-right">
            <button type="reset" class="btn mr-3">No, Cancel</button>
            <button type="reset" class="btn btn-warning">Save & Publish</button>

          </div>
          
        </form>
      </div>
    </div>

    <!-- footer -->
    <?php include 'footer-simple.php'; ?>
  </body>
</html>