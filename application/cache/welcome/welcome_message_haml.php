<?php
require_once '/Applications/XAMPP/xamppfiles/htdocs/sbobet-dev/system/libraries/phamlp/haml/HamlHelpers.php';
?><!DOCTYPE html>
<html lang="en"><head><title>Welcome to CodeIgniter</title><style type="text/css">
/*<![CDATA[*/
::selection{ background-color: #E13300; color: white; }
::moz-selection{ background-color: #E13300; color: white; }
::webkit-selection{ background-color: #E13300; color: white; }
body {
  background-color: #fff;
  margin: 40px;
  font: 13px/20px normal Helvetica, Arial, sans-serif;
  color: #4F5155;
}
p.footer{
  text-align: right;
  font-size: 11px;
  border-top: 1px solid #D0D0D0;
  line-height: 32px;
  padding: 0 10px 0 10px;
  margin: 20px 0 0 0;
}
a {
  color: #003399;
  background-color: transparent;
  font-weight: normal;
}
h1 {
  color: #444;
  background-color: transparent;
  border-bottom: 1px solid #D0D0D0;
  font-size: 19px;
  font-weight: normal;
  margin: 0 0 14px 0;
  padding: 14px 15px 10px 15px;
}
code {
  font-family: Consolas, Monaco, Courier New, Courier, monospace;
  font-size: 12px;
  background-color: #f9f9f9;
  border: 1px solid #D0D0D0;
  color: #002166;
  display: block;
  margin: 14px 0 14px 0;
  padding: 12px 10px 12px 10px;
}
#container{
  margin: 10px;
  border: 1px solid #D0D0D0;
  -webkit-box-shadow: 0 0 8px #D0D0D0;
}
#body{
  margin: 0 15px 0 15px;
}
/*]]>*/
</style>
</head><body><div id="container"><h1>Welcome to CodeIgniter!</h1><div id="body"><p>This page is rendered using the HAML Template engine.</p><p>Remember that your files have to end with ".haml", and the standard ".php"(or wharever is your extension that you set on you config file) it's the priority so, if the CI_Loader finds a ".php" file with the name of your view, it will be loaded insted your HAML template if they have the same file name.</p><p>The most important thing that you need to remeber when using HAML templates that, since it follow the Ruby On Rails standards, then the cache path structure will be: cache_path/current_controller/cached_view_file<br />Keep it in mind so you won't have problems of rendering unwanted templates.</p><p>If you would like to edit this page you'll find it located at: <code>application/views/welcome_message.haml</code> </p><p><?php echo $this->load->view('welcome_message_partial'); ?></p></div><p class="footer">Page rendered in  <strong>{elapsed_time}</strong> seconds.<?php echo (ENVIRONMENT == 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : ''; ?></p></div></body></html>