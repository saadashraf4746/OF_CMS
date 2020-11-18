<div class="left-menu">
  <div class="logo">
    <img src="">
  </div>

  <ul class="menu">
    <li class="active">
      <a href="<?=base_url('/')?>">
        <span><img src="<?=base_url()?>assets/images/leftbar-icons/dashboard-icon.svg" alt="" /></span>
        My Dashboard
      </a>
    </li>

    <li>
      <a href="<?=base_url('seasons')?>">
        <span><img src="<?=base_url()?>assets/images/leftbar-icons/home-icon-outlined.svg" alt="" /></span>
        Manage Gardens
      </a>
    </li>

    <li>
      <a href="<?=base_url('factory')?>">
        <span><img src="<?=base_url()?>assets/images/leftbar-icons/offer-icon.svg" alt="" /></span>
        Manage Factory
      </a>
    </li>
  </ul>

<select onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
    <option value="english" <?php if($this->session->userdata('site_lang') == 'english') echo 'selected="selected"'; ?>>English</option>
    <option value="urdu" <?php if($this->session->userdata('site_lang') == 'urdu') echo 'selected="selected"'; ?>>اردو</option>   
</select>
  <!-- user info -->
  <div class="user-info-container">
    <div class="user-info">
      <div class="user-dp">RM</div>
      <div class="user-detail">
        <h4>Rana Mehboob</h4>
        <p>ADMINISTRATOR</p>
        <a href="<?=base_url()?>auth/logout">Logout</a>
      </div>
    </div>


  </div>
</div>