<?php /* Smarty version 2.6.26, created on 2013-07-10 12:05:27
         compiled from /home/hideyuki-utsunomiya/public_html/skype_viewer/tpl/messages.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', '/home/hideyuki-utsunomiya/public_html/skype_viewer/tpl/messages.tpl', 67, false),array('modifier', 'urlencode', '/home/hideyuki-utsunomiya/public_html/skype_viewer/tpl/messages.tpl', 67, false),array('modifier', 'date_format', '/home/hideyuki-utsunomiya/public_html/skype_viewer/tpl/messages.tpl', 82, false),)), $this); ?>
<DOCTYPE html>
<html>
  <head>
    <title>Skype Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <link href="<?php echo @THEME_DIR; ?>
/css/bootstrap.css" rel="stylesheet" media="screen">
    <style type="text/css">
    <?php echo '
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }

      @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
          float: none;
          padding-left: 5px;
          padding-right: 5px;
        }
      }
    '; ?>

    </style>
    <link href="<?php echo @THEME_DIR; ?>
/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="#">Skype Viewer</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              Logged in as <a href="#" class="navbar-link">Username</a>
            </p>
            <ul class="nav">
              <li class="active"><a href="#">Home</a></li>
              <li><a href="#about">About</a></li>
              <li><a href="#contact">Contact</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="span3">
        <div class="well sidebar-nav">
          <ul class="nav nav-list">
            <li class="nav-header">Chat list</li>
            <?php $_from = $this->_tpl_vars['chat_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['chat']):
?>
            <li>
              <?php if ($this->_tpl_vars['chat']['name'] == $this->_tpl_vars['active_chatname']): ?>
                <li class="active">
                  <a href=?chatname=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['chat']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
><?php echo $this->_tpl_vars['chat']['friendlyname']; ?>
</a>
                </li>
              <?php else: ?>
                <a href=?chatname=<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['chat']['name'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('urlencode', true, $_tmp) : urlencode($_tmp)); ?>
><?php echo $this->_tpl_vars['chat']['friendlyname']; ?>
</a>
              <?php endif; ?>
            </li>
            <?php endforeach; endif; unset($_from); ?>
          </ul>
        </div>
      </div>
      <div class="span9">
        <div class="hero-unit">
          <dl>
          <?php $_from = $this->_tpl_vars['messages']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['message']):
?>
            <small>
              <dt class="text-info"><?php echo $this->_tpl_vars['message']['from_dispname']; ?>
 [<?php echo ((is_array($_tmp=$this->_tpl_vars['message']['timestamp'])) ? $this->_run_mod_handler('date_format', true, $_tmp, "%m/%d/%G %H:%M") : smarty_modifier_date_format($_tmp, "%m/%d/%G %H:%M")); ?>
]:</dt>
              <dd><?php echo $this->_tpl_vars['message']['body_xml']; ?>
</dd>
            </small>
          <?php endforeach; endif; unset($_from); ?>
          </dl>
        </div>
      </div>
    </div>
  </body>
<html>

