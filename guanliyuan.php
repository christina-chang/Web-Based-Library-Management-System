<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>My Library</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="navbar navbar-inverse">
            <div class="navbar-inner">
              <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <div class="nav-collapse collapse">
                  <ul class="nav">
                    <li>
                      <a href="library.html">
                        Home
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                    <li>
                      <a href="guanliyuan.html">
                        Admin Login
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
					<li>
                      <a href="http://libweb.zju.edu.cn/libweb">
                        ZJU Library
                        <span class="navbar-unread">1</span>
						</a>
                    </li>
                    <li>
                      <a href="#">
                        Help
                        <span class="navbar-unread">1</span>
                      </a>
                    </li>
                  </ul>
                </div><!--/.nav-collapse -->
              </div>
            </div>
          </div>
        </div>
      </div> <!-- /row -->

		<div class="login">
        <div class="login-screen">
          <div class="login-icon">
            <img src="images/illustrations/book.png" alt="Welcome to My Library" />
            <h4>Welcome to <small>My Library</small></h4>
          </div>
		  <div class="login-form">
            <div class="control-group">
              <input type="text" class="login-field" value="" placeholder="Enter your name" id="login-name" />
              <label class="login-field-icon fui-man-16" for="login-name"></label>
            </div>

            <div class="control-group">
              <input type="password" class="login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock-16" for="login-pass"></label>
            </div>

            <a class="btn btn-primary btn-large btn-block" href="#">Login</a>
          </div>
        </div>
      </div>

		
      <footer>
      <div class="container">
      </div>
    </footer> 
    </div> <!-- /container -->
	
  </body>
</html>
