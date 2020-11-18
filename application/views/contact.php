<!DOCTYPE html>
<html lang="en-US">

  <head>
    <title>contact</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body>

  <!-- add header -->
    <?php include 'header.php'; ?>
    
    <!-- small objects -->
    <span class="object orange"></span>
    <span class="object blue"></span>

  <!-- contact page content -->
    <section class="contact">
        
        <div class=container>
            <h1 class="page-heading" data-aos="fade-up">Contact Us</h1>
            <h2 data-aos="fade-up">How can we help you?</h2>
            <form data-aos="fade-up">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your name">
                        </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your email">
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your phone number">
                        </div> 
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Enter your subject">
                        </div> 
                    </div>
                </div> 

                <div class="row">
                    <div class="col-md-12">
                        <textarea class="form-control" placeholder="Enter your message"></textarea>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-warning btn-lg search-btn cta">Send Message</button>

            </form>

            <div class="contact-info-container" data-aos="fade-up">
                <div class="row">
                    <div class="col-md-7">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3320.5450300315465!2d72.99617706454374!3d33.66894883071183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x38df95ff25ef0ae9%3A0xd74faf85d90645e5!2sG-11%20Markaz%20G%2011%20Markaz%20G-11%2C%20Islamabad%2C%20Islamabad%20Capital%20Territory%2C%20Pakistan!5e0!3m2!1sen!2s!4v1584561311726!5m2!1sen!2s" width="100%" height="210" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>  
                    <div class="col-md-5">
                        <ul class="contact-info">
                            <li class="address">Address: 4th Floor, Beverly Centre, Blue Area, Dubai</li>
                            <li class="email"><a href="mailto: info@graana.com">Mail:info@graana.com</a></li>
                            <li class="phone"><a href="tell: 123456789">Uan:123456789</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- add footer -->
    <?php include 'footer.php'; ?>
  </body>
</html>