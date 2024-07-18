<style>
.navbar-default .navbar-collapse, .navbar-default .navbar-form {
    border-color: #ddd;
    background-color: white;
}
.navbar-default .navbar-text {
    color: #fcfcfc;
    background-color: #2196f3;
    
}
.navbar-text {
    margin: 0;
    padding: 4px 95.2px;
    
}

</style>
<div class="navbar-default navbar-sm navbar-fixed-bottom">
  <ul class="nav navbar-nav no-border visible-xs-block">
    <li><a class="text-center collapsed" data-toggle="collapse" data-target="#navbar-second"><i class="icon-circle-up2"></i></a></li>
  </ul>
  <div class="navbar-collapse collapse" id="navbar-second">
    <div class="navbar-text">
      &copy; <?= date('Y'); ?> <a style="color: #ffffff;" href="https://www.buroforce.com">Buro Force </a>
    </div>
    <div class="navbar-right">
      <ul class="nav navbar-nav">
        <li class="nav-item">
          <a href="<?= base_url(); ?>admin/Feedback" class="navbar-nav-link" target="_blank"><i class="icon-comment-discussion mr-2" style="margin-right: 5px;"></i> Feedback</a>
        </li>
      </ul>
    </div>
  </div>
</div>