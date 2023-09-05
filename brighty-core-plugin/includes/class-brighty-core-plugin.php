<?php
namespace BrightyCorePlugin;

class BrightyCorePlugin {
    private $enabled_features = array();
    private $additional_features = array();
    private $core_features = array();
      

    public function __construct() {

        // Define a list of core features (Modules)
        $this->core_features = array(
            'clients' => 'BrightyCorePlugin\Clients_Feature',
            'invoices' => 'BrightyCorePlugin\Invoices_Feature',
            'domains' => 'BrightyCorePlugin\Domains_Feature',
            // 'hosting_accounts' => 'BrightyCorePlugin\Hosting_Accounts_Feature',
            // 'projects' => 'BrightyCorePlugin\Projects_Feature',
            // 'leads' => 'BrightyCorePlugin\Leads_Feature',
        );

        //enable all modules by default @options page
        if (get_option('brighty_core_plugin_enabled_features') === false) {
            update_option('brighty_core_plugin_enabled_features', $this->core_features);
        }
        // Load enabled features from options
        $this->enabled_features = get_option('brighty_core_plugin_enabled_features', array());
       
        // Register hooks
        add_action('admin_menu', array($this, 'add_settings_page'));
        add_action('admin_init', array($this, 'register_settings'));
        add_action( 'tgmpa_register', array($this, 'brighty_core_register_required_plugins'));
       
        // Initialize core features
        $this->init_core_features();

        // Initialize additional features registered by other plugins
        $this->init_additional_features();
    }

    public function sanitize_enabled_features($input) {
        
        // Filter the input to keep only valid core feature values
        $input = array_intersect($input, $this->$core_features);
    
        return $input;
    }

    public function brighty_core_register_required_plugins(){
            /* See TGMPA Documentation for details
             * Array of plugin arrays. Required keys are name and slug.
             * If the source is NOT from the .org repo, then source is also required.
             */
            $plugins = array(
                array(
                    'name'      => 'Metabox',
                    'slug'      => 'meta-box',
                    'required'  => true,
                ),

                array(
                    'name'      => 'Woocommerce',
                    'slug'      => 'woocommerce',
                    'required'  => true,
                ),

                array(
                    'name'      => 'Email Verification for WooCommerce',
                    'slug'      => 'woocommerce',
                    'required'  => true,
                ),
                array(
                    'name'      => 'TeraWallet',
                    'slug'      => 'woo-wallet',
                    'required'  => true,
                )
                ,
                array(
                    'name'      => 'WP Mail Log',
                    'slug'      => 'wp-mail-log',
                    'required'  => true,
                ),
            );
        
            $config = array(
                'id'           => 'brighty-core',          // Unique ID for hashing notices for multiple instances of TGMPA.
                'default_path' => '',                      // Default absolute path to bundled plugins.
                'menu'         => 'tgmpa-install-plugins', // Menu slug.
                'parent_slug'  => 'plugins.php',            // Parent menu slug.
                'capability'   => 'manage_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
                'has_notices'  => true,                    // Show admin notices or not.
                'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
                'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
                'is_automatic' => true,                   // Automatically activate plugins after installation or not.
                'message'      => '',                      // Message to output right before the plugins table.
            );
        
            tgmpa( $plugins, $config );
    }

    public function add_settings_page() {
        add_options_page(
            'Brighty Settings',
            'Brighty Core',
            'manage_options',
            'brighty-core-settings',
            array($this, 'render_settings_page')
        );
    }

    public function render_settings_page() {
        include(BRIGHTY_PLUGIN_DIR_PATH . 'templates/settings-page.php');
    }

    public function register_settings() {
        register_setting('brighty_core_plugin_options', 'brighty_core_plugin_enabled_features');
    }

    public function is_feature_enabled($feature) {
        if(is_array($this->enabled_features)){

            return in_array($feature, $this->enabled_features);
        }
        return false;
    }


    private function init_core_features() {
            // Include core feature classes and initialize them if enabled
            foreach ($this->core_features as $feature_name => $class_name) {
                // Include the class file conditionally based on the feature status
                if ($this->is_feature_enabled($feature_name)) {
                    require_once(BRIGHTY_PLUGIN_DIR_PATH . 'includes/class.' . strtolower($feature_name) . '.php');
                    
                    // Initialize the feature class
                    $feature_instance = new $class_name($this);
                    $feature_instance->init();
                }
            }

    }
    


    public function register_additional_feature($feature_class) {
        $this->additional_features[] = $feature_class;
    }

    private function init_additional_features() {
        foreach ($this->additional_features as $feature_class) {
            if (class_exists($feature_class) && in_array('Brighty_Core_Feature_Interface', class_implements($feature_class))) {
                $feature = new $feature_class($this);
                $feature->init();
            }
        }
    }
}
