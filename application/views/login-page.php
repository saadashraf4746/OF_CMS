<?php $this->load->view('includes/header-includes'); ?>
<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
  .login-block{
    background: #DE6262;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #7fea7c, #f18c15); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    float:left;
    width:100%;
    height: 100%;
    padding : 50px 0;
  }
  .banner-sec{background:url()  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
  .container{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
  .carousel-inner{border-radius:0 10px 10px 0;}
  .carousel-caption{text-align:left; left:5%;}
  .login-sec{padding: 50px 30px; position:relative;}
  .login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
  .login-sec .copy-text i{color:#FEB58A;}
  .login-sec .copy-text a{color:#E36262;}
  .login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #ff782d;}
  .btn-login{background: #DE6262; color:#fff; font-weight:600;}
  .banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
  .banner-text h2{color:#fff; font-weight:600;}
  .banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
  .banner-text p{color:#fff;}
  .img-fluid-banner{max-width: 100%;height: 500;};
  .error p { color: red; };
</style>
<section class="login-block">
  <div class="container">
   <div class="row">
    <div class="col-md-4 login-sec">
      <h2 class="text-center">ADMIN LOGIN</h2>
      <?php if(validation_errors() || isset($error)) { ?>
      <div class="error"><?php echo validation_errors(); echo isset($error) ? $error : ''; ?></div>
      <?php } ?>
      <?php if($this->session->flashdata('message')) { ?>
        <div class="error"><?php echo $this->session->flashdata('message') ?></div>
      <?php } ?>
      <form class="login-form" method="post" action="<?=base_url('auth/login')?>">
        <div class="form-group">
          <label for="exampleInputEmail1" class="text-uppercase">Email</label>
          <input type="text" name="identity" class="form-control" placeholder="email" id="identity">

        </div>
        <div class="form-group">
          <label for="exampleInputPassword1" class="text-uppercase">Password</label>
          <input type="password" name="password" id="password" class="form-control" placeholder="Password">
        </div>


          <button type="submit" class="btn btn-block btn-warning">Login</button>

      </form>
      <!-- <div class="copy-text">Created with <i class="fa fa-heart"></i> by Grafreez</div> -->
    </div>
    <div class="col-md-8 banner-sec">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img class="d-block img-fluid-banner" src="<?=base_url()?>assets/images/login-slider/image.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <div class="banner-text">
              <h2>Orange Factory</h2>
              <p>This is paragraph This is paragraph This is paragraph This is paragraph This is paragraph This is paragraph This is paragraph This is paragraph This is paragraph.</p>
            </div>	
          </div>
        </div>
<!--         <div class="carousel-item">
          <img class="d-block img-fluid" src="https://images.pexels.com/photos/7097/people-coffee-tea-meeting.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <div class="banner-text">
              <h2>This is Heaven</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
            </div>	
          </div>
        </div> -->
      </div>	   
    </div>
  </div>
</div>
</section>
<?php $this->load->view('includes/footer-includes'); ?>
