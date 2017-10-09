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

              <div class="wpMediaCND-setup-steps">
                <div class="wpMediaCDN-step active step-google-login">
                  <img src="" >
                  <div class="wpMediaCDN-step-title">
                    <h3><?php _e('Google Login') ?></h3>
                    <p><?php _e('Login with the Google account you want to associated with this website'); ?></p>
                  </div>
                  <a id="google-login" href="#<?php echo urlencode(get_settings_page_url('?page =MediaCDN-setup&step=google-login') ); ?>" class="btn btn-googly-red"> <?php _e('Google Login'); ?></a>
                </div>

                <div class="wpMediaCDN-step-setup-project">
                  <div class="wpMediaCDN-step-title">
                    <h3><?php _e( 'Set Project &amp; Bucket' ); ?></h3>
                    <p><?php _e( 'Create a Google Cloud project and bucker that will store your Wordpress media files.' ); ?></p>
                  </div>
                  <div class="wpMediaCDN-userinfo">
                    <div class="photo-wrapper">
                      <img src=" <?php echo  ?> " alt="">
                    </div>
                    <div class="user-detail">
                      <h4><span class="user-name"></span> <a class="logout" href="#google-logout"> <?php _e('Logout'); ?></a> </h4>
                      <p class="user-email"></p>
                    </div>
                  </div>

                  <div class="wpMediaCDN-step-setup-form">
                    <form action="#" method="post">
                      <div id="wpMediaCDN-notification" class="error">
                      <!-- CREATE A PROJECT HERE OR CHOOSE EXISTING PROJECT   -->
                      </div>
                      <div class="wpMediaCDN-single-step-input">
                        <label>
                          <h4><?php _e( 'Google Cloud Project' ); ?></h4>
                          <p><?php _e( 'By default we create a new project for you, or if you prefer, select an existing project.' ); ?></p>
                        </label>
                        <div class="wpMediaCDN-combo-box project">
                          <input type="hidden" class="id" value="<?php echo $project_id; ?>">
                          <input type="text" class="name" value="<?php echo $project_name; ?>" placeholder="Select or Create New Project">
                          <div class="circle-loader">
                            <div class="checkmark draw"</div>
                          </div>
                          <div class="wpMediaCDN-input-dropdown">
                            <div class="wpMediaCDN-create-new">
                              <h5><?php _e( 'Create New Project' ); ?></h5>
                              <ul>
                                <li class="custom-name"></li>
                                <li class="perdefined-name active" data-id="<?php echo $project_id ?>" data-name="<?php echo $project_name ?>">
                                  <?php echo "$project_name ($project_id)"; ?>
                                </li>
                              </ul>
                            </div>
                            <div class="wpMediaCDN-existing">
                              <h5><?php _e( 'Existing Projects' ); ?></h5>
                              <ul></ul>
                            </div>
                          </div>
                          <div class="error"></div>
                        </div>
                      </div>
                      <!-- CREATE CLOUD BUCKET OR CHOOSE EXISTING BUCKET -->
                      <div class="wpMediaCDN-single-step-input">
                        <label>
                          <h4><?php _e( 'Google Cloud Bucket' ); ?></h4>
                          <p><?php _e( 'By default we create a new for you, or if you prefer, select an existing bucket.' ); ?></p>
                        </label>
                        <div class="wpMediaCDN-combo-box bucket">
                          <input type="text" class="name" value="<?php echo $bucket_id; ?>" placeholder="Select or Create New Project">
                          <div class="circle-loader">
                            <div class="chechmark draw"></div>
                          </div>
                          <div class="wpMediaCDN-input-dropdown">
                            <div class="wpMediaCDN-create-new">
                              <h5><?php _e( 'Create New Bucket' ); ?></h5>
                              <ul>
                                <li class="custom-name"></li>
                                <li class="project-derived-name"></li>
                                <li class="perdefined-name active" data-id="<?php echo $bucket_id ?>" data-name="<?php echo $bucket_id ?>">
                                  <?php echo $bucket_id; ?>
                                </li>
                              </ul>
                            </div>
                            <div class="wpMediaCDN-existing">
                              <h5><?php _e( 'Existing Projects' ); ?></h5>
                              <ul></ul>
                            </div>
                          </div>
                          <div class="error"> </div>
                        </div>
                      </div>
                      <!-- ADD BUCKET REGION  -->
                      <div class="wpMediaCDN-single-step-input">
                        <label>
                          <h4><?php _e( 'Google Cloud Bucket Multi-Regional Location' ); ?></h4>
                          <p><?php _e( 'Your newly created bucket will be provisioned with a mutli-regional storage class. Select the region that is Closest to the majority of your website\'s visitors.' ); ?></p>
                        </label>
                        <div class="wpMediaCDN-combo-box region">
                          <input type="hidden" class="name" value="us">
                          <input type="text" class="name" readonly="readonly" value="United States" placeholder="Select Location">
                          <div class="circle-loader">
                            <div class="checkmark-draw"></div>
                          </div>
                          <div class="wpMediaCDN-input-dropdown">
                            <div class="wpMediaCDN-static">
                              <ul>
                                <li data-id="asia" data-name"Asia Pacific">Asia Pacific</li>
                                <li data-id="eu" data-name="European Union">European Union</li>
                                <li data-id="us" data-name="United States">United States</li>
                              </ul>
                            </div>
                          </div>
                          <div class="error"></div>
                        </div>
                      </div>
                      <!-- CREATE GOOGLE CLOUD BILLING ACCOUNT HERE OR ACCESS EXIST ACCOUNT -->
                      <div class="">
                        <label>
                          <h4><?php _e( 'Google Cloud Billing' ); ?></h4>
                          <p><?php _e( 'You will need to set a billing account in order to activate your google cloud storage.' ) ?></p>
                        </label>
                        <a href="https://console.cloud.google.com/billing" class="btn btn-green create-billing-account no-billing-account">
                          <?php _e('Create New Billing Account'); ?>
                          <span class="wpMediaCDN-loading">(<?php _e( 'Checking'; ) ?> <span>.</span> <span>.</span> <span>.</span>)</span>
                        </a>
                        <div class="wpMediaCDN-combo-box billing-account" style="display: none;">
                          <input type="hidden" class="id" value="">
                          <input type="text" class="name" readonly="readonly" placeholder="Select Billing Account">
                          <div class="circle-loader">
                            <div class="checkmark draw"></div>
                          </div>
                          <div class="wpMediaCDN-existing">
                            <h5><?php _e( 'Existing Billing Accounts' ); ?></h5>
                            <ul></ul>
                            <a href="https://console.cloud.google.com/billing" class="btn btn-green create-billing-account no-billing-account">
                              <?php _e('Create New Billing Account'); ?>
                              <span class="wpMediaCDN-loading">(<?php _e( 'Checking'; ) ?> <span>.</span> <span>.</span> <span>.</span>)</span>
                            </a>
                          </div>
                        </div>
                      </div>
                      <!-- CONTINUE BUTTON -->
                      <div class="wpMediaCDN-single-step-input text-center input-submit">
                        <a class="btn btn-green get-json-key" type="submit"><span class="submit-button-text">(<?php _e( 'Countinue' ); ?></span> <span class="wpMediaCDN-loading"><?php _e( 'Building' ); ?> <span>.</span> <span>.</span> <span>.</span>)</span></a>
                      </div>
                      
                    </form>
                  </div>

                  <div class="wpMediaCDN-user-hasno-project-billing">
                    <h4><?php _e( 'Set Google Cloud Billing Account' ); ?></h4>
                    <p><?php _e( 'Click the button below to setup a billing account with Google cloud. Once configures, return here and click continue.' ); ?></p>
                    <a href="http://console.cloud.google.com/billing" class="btn btn-green create-billing-account" target="_blank">
                      <span><?php _e( 'Set Google Billing' ); ?></span>
                      <span class="wpMediaCDN-loading">(<?php _e( 'Checking'; ) ?> <span>.</span> <span>.</span> <span>.</span>)</span>
                    </a>
                  </div>
                </div>
                <!-- FINAL STEP OF SETUP -->
                <div class="wpMediaCDN-step step-final">
                  <img src="<?php img url goes here  ?>">
                  <div class="wpMediaCDN-step-title">
                    <h3><?php _e( 'Setup is Complete!' ); ?></h3>
                    <p><?php _e( 'Any media file you upload to Wordpress will now be uploaded to Google Cloud Storage and served to your users from Google servers!' ); ?></p>
                  </div>
                  <p><?php printf(_( 'To further customize your WP_MEDIA_CDN setup, visit the <a class="btn-link" href="%s"> WP-Media_CDN settings Panel!</a>' )); ?></p>
                  <a href="<?php echo admin_url( 'media-new.php' ) ?>" class="btn btn-green"> <?php _e( 'Upload Somethong!' ); ?></a>
                </div>   <!-- End of Final Step -->
                
              </div>   <!-- End of the Setup Process -->
            </div>   <!-- End of wpMediaCDN-setup-step class -->
          </div>    <!-- End of col-wx-12 class -->
        </div>     <!-- End of row class -->
      </div>      <!-- End of Container -->
    </div>


  </div>
</div>
