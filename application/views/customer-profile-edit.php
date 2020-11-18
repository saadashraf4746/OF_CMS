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
          <li><a href="/">My Profile</a></li>
          <li class="active">Edit Profile</li>
        </ul>

        <div class="page-title">
          <h1>My Profile</h1>
        </div>

        <!-- profile section -->
        <div class="profile-section agent-detail edit-profile">
          <div class="row">
            <div class="col-md-3">
              <div class="agent-dp">
                <img src="assets/images/agents/2.jpg" alt="">
              </div>
              <div class="upload-file-add">
                <input type="file" />
              </div>
            </div>
            <div class="col-md-8">
              <form>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Ahmad Abdullah" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="email" class="form-control" placeholder="ahmad.abdullah@gmail.com" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="+971 568 3879" />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="password" class="form-control" placeholder="xxxxxxxx" />
                    </div>
                  </div>
                </div>

                <div class="cta-wrapper">
                  <button class="btn mr-2" type="submit">No, Cancel</button>
                  <button class="btn btn-warning cta" type="submit">Search Properties</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- footer -->
    <?php include 'footer.php'; ?>
  </body>
</html>