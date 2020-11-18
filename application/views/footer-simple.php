<footer class="simple">
  <div class="container">
    <div class="copy-right-text">© 2020 abc all right reserved.</div>
    <ul>
      <li><a href="#">FAQs</a></li>
      <li><a href="#">Terms & Conditios</a></li>
      <li><a href="#">Privacy Policy</a></li>
    </ul>
  </div>
</footer>

<!-- add footer includes files -->
<?php $this->load->view('includes/footer-includes.php');?>

<script type="text/javascript">
jQuery(document).ready(function(){
   setInterval(function(){
       jQuery.ajax({
           url: '<?=base_url('Auth/logout')?>',
           type: 'POST',
           success:function(response){
              location.reload();
           }
       });
   }, 1800000);
});
</script>