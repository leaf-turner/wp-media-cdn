<?php
//HTTP_Host: returns the header from current request of the clientexample
//SERVER_NAME: returns the server name defined in tour host configuration
$serverName = $_SERVER['HTTP_HOST']?$_SERVER['HTTP_HOST']: $_SERVER["SERVER_NAME"];
$id           = str_replace('.','-',$server_name);
$project_name = trim(substr($id, 0, 30), '-');
$project_id   = trim(substr($id, 0, 23), '-');
$bucket_id    = trim("stateless-" . substr($id, 0, 20), '-');
?>
<div id="wp-stateless-wrapper">
  <div  id="wpStatelessInner">

    <div class="wpMediaCDN-header">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="wpMediaCDN-welcome-text">
              <!-- header for google setup page -->
              <h1><?php _e( 'WP-Media-CDN Setup'); ?></h1>
              <p><?php _e( 'Just follow these easy three steps.'); ?></p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="wpMediaCND-setup-step-area">
      <div class="container">
        <div class="row">
          <div class="col-wx-12">
            <div class="wpMediaCND-setup-step">
              <div class="wpMediaCDN-setup-step-bars">
                <!-- This menu list contains three steps to complete the setup process. -->
                <ul>
                  <li class="step-google-login">
                    <span>1</span> <?php _e('Google Login'); ?>
                  </li>
                  <li class="step-setup-project">
                    <span>2</span> <?php _e('Project &amp; Bucket'); ?>
                  </li>
                  <li class="step-final">
                    <span><?php echo number_format_i18n(3); ?></span> <?php _e('Complete'); ?>
                  </li>
                </ul>
              </div>
               <!-- First Setup step which is to create login button -->
              <div class="wpMediaCND-setup-steps">
                <div class="wpMediaCDN-step active step-google-login">
                  <img src="" >
                  <div class="wpMediaCDN-step-title">
                    <h3><?php _e('Google Login') ?></h3>
                    <p><?php _e('Login with the Google account you want to associated with this website'); ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>
