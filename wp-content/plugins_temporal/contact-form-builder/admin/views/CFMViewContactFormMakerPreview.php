<?php

class CFMViewContactFormMakerPreview {
  ////////////////////////////////////////////////////////////////////////////////////////
  // Events                                                                             //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Constants                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Variables                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
  private $model;


  ////////////////////////////////////////////////////////////////////////////////////////
  // Constructor & Destructor                                                           //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function __construct($model) {
    $this->model = $model;
  }
  ////////////////////////////////////////////////////////////////////////////////////////
  // Public Methods                                                                     //
  ////////////////////////////////////////////////////////////////////////////////////////
  public function display() {
    if (isset($_GET['form_id']) && isset($_GET['test_theme'])) {
      wp_print_scripts('jquery');
      wp_print_scripts('jquery-ui-widget');
      wp_print_scripts('jquery-effects-shake');
      $cfm_settings = get_option('cfm_settings');
      $map_key = isset($cfm_settings['map_key']) ? $cfm_settings['map_key'] : '';
      ?>
      <script src="https://maps.google.com/maps/api/js?v=3.exp&key=<?php echo $map_key ?>" type="text/javascript"></script>
      <script src="<?php echo WD_CFM_URL . '/js/if_gmap_front_end.js'; ?>" type="text/javascript"></script>
      <script src="<?php echo WD_CFM_URL . '/js/cfm_main_front_end.js'; ?>" type="text/javascript"></script>
      <link media="all" type="text/css" href="<?php echo WD_CFM_URL . '/css/jquery-ui-1.10.3.custom.css'; ?>" rel="stylesheet">
      <link media="all" type="text/css" href="<?php echo WD_CFM_URL . '/css/contact_form_maker_frontend.css'; ?>" rel="stylesheet">
      <?php
      $form_id = esc_html(stripslashes($_GET['form_id']));
      $theme_id = esc_html(stripslashes($_GET['test_theme']));
      require_once (WD_CFM_DIR . '/frontend/controllers/CFMControllerForm_maker.php');
      $controller = new CFMControllerForm_maker();
      echo $controller->execute($form_id, $theme_id);
    }
    die();
  }

  ////////////////////////////////////////////////////////////////////////////////////////
  // Getters & Setters                                                                  //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Private Methods                                                                    //
  ////////////////////////////////////////////////////////////////////////////////////////
  ////////////////////////////////////////////////////////////////////////////////////////
  // Listeners                                                                          //
  ////////////////////////////////////////////////////////////////////////////////////////
}