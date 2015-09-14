<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


	
    <title>ShareYourOffer</title>
    <script src="js/jquery-1.10.2.js"></script>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=902926083123155";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!--<a class="navbar-brand topnav" href="#">Home</a>-->
            </div>            			
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
					<li>
						<form class="navbar-form navbar-left" role="form">                            
							<!--<div class="form-group">
								<input type="text" placeholder="Email" class="form-control">
							</div>
							<div class="form-group">
								<input type="password" placeholder="Password" class="form-control">
							</div>-->
                            <!--<button type="button" id="buttonlogin" class="btn btn-success">Sign in</button>-->	
                            Sign In
                            <div class="form-group">
                            <?php
                            require_once __DIR__ . '/facebook-sdk-v5/autoload.php';

                            $fb = new Facebook\Facebook([
                              'app_id' => '1784238105136538',
                              'app_secret' => '9700a0e6a09f6042c12c8831742fe3f3',
                              'default_graph_version' => 'v2.4',
                              ]);

                            session_start();

                            $helper = $fb->getRedirectLoginHelper();
                            $permissions = [
                                'email'
                                ,'public_profile'
                                ,'user_friends'
                                ,'read_custom_friendlists'
                                ,'user_hometown'
                                ,'user_location'
                                ,'user_birthday'
                                ,'user_relationships'
                                ,'user_education_history'
                                ,'user_relationship_details'
                                ]; 
                            $loginUrl = $helper->getLoginUrl('http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0', $permissions);

                            echo '<a href="' . $loginUrl . '"><img src="img/facebook login.gif" class="form-control" style="padding:1px; width:initial" /></a>';

                            ?>
                            </div>
                            <div class="form-group">
                                <?php
                                require_once 'google-sdk/Google/Service/Client.php';
                                require_once 'google-sdk/Google/Service/PlusDomains.php';

                                session_start();
                                $ApplicationName='syotoday';
                                $clientId='574006003521-sgb65f00btj6klh0340qks330i3bdvo3.apps.googleusercontent.com';
                                $clientSecret='LGqs7dilRK34t7IPryo0TFRZ';
                                $RedirectUri='http://localhost:56501/index.php?XDEBUG_SESSION_START=BA5DFFA0';

                                $client = new Google_Client();
                                $client->setApplicationName($ApplicationName);
                                $client->setClientId($clientId);
                                $client->setClientSecret($clientSecret);
                                $client->setRedirectUri($RedirectUri);
                                $client->setScopes(array('https://www.googleapis.com/auth/plus.me',
                                                         'https://www.googleapis.com/auth/plus.circles.read'));
                                $plus = new Google_Service_PlusDomains($client);

                                if (isset($_REQUEST['logout'])) {
                                    unset($_SESSION['access_token']);
                                }

                                if (isset($_GET['code'])) {    
                                    $client->authenticate($_GET['code']);
                                    $_SESSION['access_token'] = $client->getAccessToken();
                                    header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['PHP_SELF']);
                                }

                                if (isset($_SESSION['access_token'])) {
                                    $client->setAccessToken($_SESSION['access_token']);
                                }

                                if ($client->getAccessToken()) {
                                }else {
                                    $authUrl = $client->createAuthUrl();
                                }


                                if(isset($authUrl)) {
                                    print "<a class='login' href='$authUrl'><img src=\"img/GooglePlusLogin.png\" class=\"form-control\" style=\"padding:1px; width:initial\" /></a>";
                                } 
                                else {
                                    print "<a class='logout' href='index.php?logout'>Logout</a>";
                                }

                            ?>
                                
                            </div>			
						</form>
					</li>					
				</ul>
				<ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li>
                        <a href="#people">People</a>
                    </li>
					<li>
                        <a href="#services">Services</a>
                    </li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>							
				</ul>				
            </div>
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">		
                <div class="col-lg-12">
				    <div class="intro-message">
                        <h1>ShareYourOffer</h1>
                        <h4>Don't miss the offer..!! Just share it..</h4>
                        <hr class="intro-divider">      
						<!--<div class="fb-like" data-href="http://shareyouroffer.com/ShareYourOfferBeta/index.php" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->
						<div class="cta-mail">
							<div class="container text-center">
							<div id="mc_embed_signup">
								<form role="form" action="http://www.google.com/search" method="get" id="mc-google-search-form" name="google-search-form" target="_blank" novalidate="">
									<div class="input-group input-group-lg">
										<input type="text" name="searchText" class="form-control" id="mce-searchText" placeholder="Search your partner...">
										<span class="input-group-btn">
											<button type="submit" name="search" id="mc-embedded-search" class="btn btn-default">Search</button>
										</span>
									</div>	
								</form>
							</div>
							<!-- End MailChimp Signup Form -->
						</div>
					</div>
                    </div>
                </div>				
			</div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

	
	
	<a  name="services"></a>
    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-sm-10">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">What it ShareYourOffer ?</h2>
					<h3>
					<p class = "lead">Now-a-days almost every company , online shops like flipkart, Myntra, amazon, jabong, makemytrip, easyrecharge and many more … 
					Gives there promotional coupons to  attract their customers. But with some condition like  “you have to purchase for this much amount” or  
					“you have to purchase these many pieces” and other such conditions. Some times we are interested in those coupons and can match those conditions 
					but sometimes NOT, then what to do with those coupons.. ??</p>
					<p class = "lead">If you cant use it…. which means you are wasting it..</p>
					<p class = "lead">So dont waste these promotional coupons, just share with your friends to match the required conditions and enjoy the benefits of those promotional coupons.</p>
					</h3>
                </div>
                
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">List of companies that we Support</h2>
                    <p class="lead">Turn your 2D designs into high quality, 3D product shots in seconds using free Photoshop actions by <a target="_blank" href="http://www.psdcovers.com/">PSDCovers</a>! Visit their website to download some of their awesome, free photoshop actions!</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="img/dog.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div class="content-section-a">

        <div class="container">

            <div class="row">
			<hr class="section-heading-spacer">
                <div class="col-lg-5 col-sm-6">                    
                    <div class="clearfix"></div>
                    <h2 class="section-heading"><h2>Connect to ShareYourOffer</h2></h2>
                    
                </div>	
				<div
					  class="fb-like"
					  data-share="true"
					  data-width="450"
					  data-show-faces="true">
				</div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <ul class = "list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
						<li>
                            <a href="#" class="btn btn-default btn-lg"><span class="network-name">Follow</span></a>
                        </li>
                    </ul>
                </div>
			<hr class="section-heading-spacer">
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
	<a  name="people"></a>
    <div class="banner">

        <div class="container">

            <div class="row">				
				<h2>Core Team</h2>
				<hr class="section-heading-spacer">
                <div class="col-lg-3">
                   <center> <h3>Anubhav Jain</h3></center>
					<img src="img/anubhav.jpg" class="img-circle" alt="Cinque Terre" width="220" height="260">
					<ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>   
                </div>
				<div class="col-lg-3">
                     <center> <h3>Amrit Jain</h3></center>
					<img src="img/amrit.jpg" class="img-circle" alt="Cinque Terre" width="220" height="260">
					<ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>   
                </div>
				<div class="col-lg-3">
                     <center> <h3>Saurabh Jain</h3></center>
					<img src="img/saurabh.jpg" class="img-circle" alt="Cinque Terre" width="220" height="260">
					<ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>   
                </div>
				<div class="col-lg-3">
                     <center> <h3>Shreya Jain</h3></center>
					<img src="img/shreya.jpg" class="img-circle" alt="Cinque Terre" width="220" height="260">
					<ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/shareyouroffers?fref=ts" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>   
                </div>
                <hr class="section-heading-spacer">
                                 
            </div>

        </div>        

    </div>
    <!-- /.banner -->
	<!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#about">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
						<li>
                            <a href="#people">People</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#services">Services</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#contact">Contact</a>
                        </li>
                    </ul>
					
                    <p class="copyright text-muted small">Copyright &copy; Your Company 2015. All Rights Reserved</p>
					<div
  class="fb-like"
  data-share="true"
  data-width="450"
  data-show-faces="true">
</div>

                </div>
            </div>
        </div>
    </footer>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
