<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="http://phpxhub.com">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>  
  <?php 
    $layout = get_theme_mod( 'boxfull_en', 'fullwidth' );
    $headerlayout = get_theme_mod( 'head_style', 'solid' );
  ?> 
<div id="page" class="hfeed site <?php echo esc_attr($layout); ?>">
  <header id="masthead" class="site-header header header-<?php echo esc_attr($headerlayout);?>">
    <div class="container">
            <div class="main-menu-wrap row clearfix">
                <div class="col-sm-6 col-md-3 col-4 align-self-center">
                  <div class="themeum-navbar-header">
                    <div class="logo-wrapper">
                          <a class="themeum-navbar-brand" href="<?php echo esc_url(site_url()); ?>">
                                <?php
                                    $logoimg = get_theme_mod( 'logo', get_template_directory_uri().'/images/logo.png' );
                                    $logotext = get_theme_mod( 'logo_text', 'backer' );
                                    $logotype = get_theme_mod( 'logo_style', 'logoimg' );
                                    switch ($logotype) {
                                      case 'logoimg':
                                          if( !empty($logoimg) ) {?>
                                              <img class="enter-logo img-responsive" src="<?php echo esc_url( $logoimg ); ?>" alt="<?php esc_html_e( 'Logo', 'backer' ); ?>" title="<?php esc_html_e( 'Logo', 'backer' ); ?>">
                                          <?php }else{?>
                                              <h1> <?php  echo esc_html(get_bloginfo('name'));?> </h1>
                                          <?php }
                                        break;                       
 
                                        case 'logotext':
                                          if( $logotext ) { ?>
                                              <h1> <?php echo esc_html( $logotext ); ?> </h1>
                                          <?php }
                                          else
                                          {?>
                                            <h1><?php  echo esc_html(get_bloginfo('name'));?> </h1>
                                          <?php }
                                        break;
                                      
                                      default:
                                        if( $logotext ) { ?>
                                            <h1> <?php echo esc_html( $logotext ); ?> </h1>
                                        <?php }
                                        else
                                        {?>
                                          <h1><?php  echo esc_html(get_bloginfo('name'));?> </h1>
                                        <?php }
                                        break;
                                    } ?>
                             </a>
                      </div>     
                  </div><!--/#themeum-navbar-header-->   
                </div><!--/.col-sm-2-->
  
                <div class="mobile-register col-sm-6 col-md-9 col-8 hidden-lg-up align-self-center align-self-end"> 
                  <?php if( get_theme_mod( 'header_login', true ) ||get_theme_mod( 'header_search', false ) ): ?>
                    <div class="backer-login-register">
                      <?php if( get_theme_mod( 'header_search', false ) ): ?>
                        <div class="backer-search-wrap">
                          <a href="#" class="backer-search search-open-icon"><i class="fa fa-search"></i></a> 
                          <a href="#" class="backer-search search-close-icon"><i class="fa fa-times"></i></a>
                          <div class="top-search-input-wrap">
                            <div class="top-search-overlay"></div>
                            <form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
                              <div class="search-wrap">
                                <div class="search  pull-right backer-top-search">
                                  <div class="sp_search_input">
                                    <input type="hidden" value="product" name="post_type" />
                                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="form-control search-btn" placeholder="<?php esc_html_e('Search . . . . .','backer'); ?>" autocomplete="off" />
                                  </div>
                                </div>
                              </div>
                            </form>
                          </div>
                        </div>
                      <?php endif; ?>
                     
                      <?php if( get_theme_mod( 'header_login', true ) ): ?>
                       <ul>
                          <?php if ( !is_user_logged_in() ): ?>
                              <li><a class="backer-login backer-dashboard" data-toggle="modal" data-target="#myModal" href="#"><?php esc_html_e( 'Login','backer' ); ?></a></li>
                          <?php else: ?>
                            <?php $dashboard_id = get_option( 'wpneo_crowdfunding_dashboard_page_id','' ); ?>
                              <li><a class="backer-dashboard" href="<?php the_permalink( $dashboard_id ); ?>"><?php echo get_the_title( $dashboard_id ); ?></a> </li>
                          <?php endif; ?>
                       </ul>
                      <?php endif; ?>
                    </div> 
                  <?php endif; ?>
                  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>  
                </div>
 
                
                <div class="col-md-9 common-menu hidden-md-down">
                  <?php if ( has_nav_menu( 'primary' ) ) { ?>
                    <div id="main-menu" class="common-menu-wrap">
                        <?php 
                            wp_nav_menu(  array(
                                'theme_location' => 'primary',
                                'container'      => '', 
                                'menu_class'     => 'nav',
                                'fallback_cb'    => 'wp_page_menu',
                                'depth'          => 4,
                                'walker'         => new Megamenu_Walker()
                                )
                            ); 
                        ?>      
                    </div><!--/#main-menu-->
                  <?php  } ?>
                
 
                  <?php if( get_theme_mod( 'header_login', true ) || get_theme_mod( 'header_search', false ) ): ?>
                    <div class="backer-login-register">
                      <?php if( get_theme_mod( 'header_search', false ) ): ?>
                          <div class="backer-search-wrap">
                            <a href="#" class="backer-search search-open-icon"><i class="fa fa-search"></i></a> 
                            <a href="#" class="backer-search search-close-icon"><i class="fa fa-times"></i></a>
                            <div class="top-search-input-wrap">
                              <div class="top-search-overlay"></div>
                              <form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
                                <div class="search-wrap">
                                  <div class="search  pull-right backer-top-search">
                                    <div class="sp_search_input">
                                      <input type="hidden" value="product" name="post_type" />
                                      <input type="text" value="<?php echo get_search_query(); ?>" name="s" class="form-control search-btn" placeholder="<?php esc_html_e('Search . . . . .','backer'); ?>" autocomplete="off" />
                                    </div>
                                  </div>
                                </div>
                              </form>
                            </div>
                          </div>
                      <?php endif; ?>
                      <?php if( get_theme_mod( 'header_login', true ) ): ?>
                         <ul>
                            <?php if ( !is_user_logged_in() ): ?>
                                <li><a class="backer-login backer-dashboard" data-toggle="modal" data-target="#myModal" href="#"><?php esc_html_e( 'Login','backer' ); ?></a></li>
                            <?php else: ?>
                              <?php $dashboard_id = get_option( 'wpneo_crowdfunding_dashboard_page_id','' ); ?>
                                <li><a class="backer-dashboard" href="<?php the_permalink( $dashboard_id ); ?>"><?php echo get_the_title( $dashboard_id ); ?></a> </li>
                            <?php endif; ?>
                         </ul>
                       <?php endif; ?>
                    </div> 
                  <?php endif; ?>
 
                </div><!--/.col-sm-9--> 
                
                <div id="mobile-menu" class="hidden-lg-up">
                  <div class="collapse navbar-collapse">
                      <?php 
                        if ( has_nav_menu( 'primary' ) ) {
                            wp_nav_menu( array(
                                'theme_location'      => 'primary',
                                'container'           => false,
                                'menu_class'          => 'nav navbar-nav',
                                'fallback_cb'         => 'wp_page_menu',
                                'depth'               => 3,
                                'walker'              => new wp_bootstrap_mobile_navwalker()
                                )
                            ); 
                        }
                        ?>
                    </div>
                </div><!--/.#mobile-menu-->
            </div><!--/.main-menu-wrap-->     
    </div><!--/.container--> 
  </header><!--/.header-->
 
 
<?php if ( !is_user_logged_in() ): ?>
    <!-- Login -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php esc_html_e( 'Login','backer' ); ?></h4>
                </div>
                <div class="modal-body">
                    <form id="login" action="login" method="post">
                        <div class="login-error alert alert-danger" role="alert"></div>
                        <input type="text"  id="username" name="username" class="form-control" placeholder="<?php esc_html_e( 'Username','backer' ); ?>">
                        <input type="password" id="password" name="password" class="form-control" placeholder="<?php esc_html_e( 'Password','backer' ); ?>">
                        <input type="checkbox" id="remember" name="remember" ><label for="cbox2"><?php esc_html_e( 'Remember me','backer' ); ?></label>
                        <button type="submit" class="btn btn-primary submit_button"><?php esc_html_e('Log In', 'backer'); ?></button>
                        <div class="lost-pass"><a href="<?php echo esc_url(wp_lostpassword_url()); ?>"><?php esc_html_e( 'Forgot password?','backer' ); ?></a></div>
                        <?php wp_nonce_field( 'ajax-login-nonce', 'security' ); ?>
                    </form>
                  <div class="haveaccount"><span><?php esc_html_e( "Don't have an account?","backer" ); ?></span></div>
                  <p><a data-toggle="modal" data-target="#register" href="#" data-dismiss="modal" ><?php esc_html_e( 'Sign Up','backer' ); ?></a></p>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><?php esc_html_e( 'Sign Up','backer' ); ?></h4>
                </div>
                <div class="modal-body">
                    <form id="register" action="login" method="post">
                        <div class="login-error alert alert-danger" role="alert"></div>
                        <input type="text" id="username" name="username" class="form-control" placeholder="<?php esc_html_e( 'Username','backer' ); ?>">
                        <input type="text" id="email" name="email" class="form-control" placeholder="<?php esc_html_e( 'Email','backer' ); ?>">
                        <input type="password" id="password" name="password" class="form-control" placeholder="<?php esc_html_e( 'Password','backer' ); ?>">
                        
                        <?php 
                            $wpneo_recaptcha_site_key = get_option('wpneo_recaptcha_site_key');
                            $wpneo_enable_recaptcha   = get_option('wpneo_enable_recaptcha'); 
                            if ( isset($wpneo_enable_recaptcha) && $wpneo_enable_recaptcha == 'true') {  ?>
                              <div class="g-recaptcha" data-sitekey="<?php echo $wpneo_recaptcha_site_key; ?>"></div> <br>  
                            <?php } ?>
 
                        <button type="submit" class="btn btn-primary register_button"><?php esc_html_e('Register', 'backer'); ?></button>
                        <?php wp_nonce_field( 'ajax-register-nonce', 'security' ); ?>
 
                    </form>
                    <p class="condition"><?php esc_html_e( 'By signing up & purchasing via phphub you agree to all the Terms & Services.','backer' ); ?></p>
                    <div class="haveaccount"><span><?php esc_html_e( 'Already have an account?','backer' ); ?></span></div>
                    <p><a data-toggle="modal" data-target="#myModal" href="#" data-dismiss="modal" ><?php esc_html_e( 'login','backer' ); ?></a></p>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>
