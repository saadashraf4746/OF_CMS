<!DOCTYPE html>
<html lang="en-US">
  <!-- figma design: https://www.figma.com/file/jkkuHgZswnclyeA3bsU88T/Real-Estate-Final?node-id=1%3A2 -->
  <head>
    <title>My Chats</title>
    <?php include 'includes/header-includes.php'; ?>
  </head>
  <body class="dashbaord-body">
    <!-- left menu -->
    <?php include 'includes/left-menu.php'; ?>

    <div class="dashboard-content">
      <h1>
        My Chats <span>12</span>
      </h1>

      <div class="chat-container">
        <div class="chat-left">
          <div class="search-chat">
            <form>
              <i><img src="assets/images/search-dark.svg" alt="" /></i>
              <input type="text" placeholder="Search a chat" class="form-control" />
            </form>
          </div>

          <!-- contact list -->
          <ul class="contact-list">
            <li>
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
            <li class="active">
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
            <li>
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
            <li>
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
            
            <li>
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
            <li>
              <div class="dp"><img src="assets/images/avatar.png" alt="" /></div>
                <h4>Ileen Shane</h4>
                <p>Appartment in jumeirah is still available?</p>
            </li>
          </ul>
        </div>
        <div class="chat-window">
          <ul>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li class="my-msg">
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li class="my-msg">
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li>
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
            <li class="my-msg">
              <div class="msg">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</div>
              <span>8:21</span>
            </li>
          </ul>
        </div>

        <!-- send message form -->
        <div class="send-msg-container">
          <input type="text" class="form-control" placeholder="Type a message" />
          <button type="button">Send message</button>
        </div>
      </div>
    </div>
    <!-- footer -->
    <?php include 'footer-simple.php'; ?>
  </body>
</html>