<DOCTYPE html>
<html>
  <head>
    <title>Skype Viewer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
    <link href="{$smarty.const.THEME_DIR}/css/bootstrap.css" rel="stylesheet" media="screen">
    <style type="text/css">
    {literal}
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
    {/literal}
    </style>
    <link href="{$smarty.const.THEME_DIR}/css/bootstrap-responsive.css" rel="stylesheet" media="screen">
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
            {foreach from=$chat_list item=chat}
            <li>
              {if $chat.name==$active_chatname}
                <li class="active">
                  <a href=?chatname={$chat.name|escape|urlencode}>{$chat.friendlyname}</a>
                </li>
              {else}
                <a href=?chatname={$chat.name|escape|urlencode}>{$chat.friendlyname}</a>
              {/if}
            </li>
            {/foreach}
          </ul>
        </div>
      </div>
      <div class="span9">
        <div class="hero-unit">
          <dl>
          {foreach from=$messages item=message}
            <small>
              <dt class="text-info">{$message.from_dispname} [{$message.timestamp|date_format:"%m/%d/%G %H:%M"}]:</dt>
              <dd>{$message.body_xml}</dd>
            </small>
          {/foreach}
          </dl>
        </div>
      </div>
    </div>
  </body>
<html>


