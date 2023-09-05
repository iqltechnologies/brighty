<?php
namespace BrightyCorePlugin;

class Domains_Feature implements Brighty_Core_Plugin_Feature_Interface  {
    private $plugin;

    public function __construct($plugin) {
        $this->plugin = $plugin;
    }

    public function init() {
        // Register the custom post type 'Invoices'
        add_action('init', array($this, 'register_custom_post_type'));
    }

    public function register_custom_post_type() {
        $labels = [
            'name'                     => esc_html__( 'Domains', 'your-textdomain' ),
            'singular_name'            => esc_html__( 'Domain', 'your-textdomain' ),
            'add_new'                  => esc_html__( 'Add New', 'your-textdomain' ),
            'add_new_item'             => esc_html__( 'Add new domain', 'your-textdomain' ),
            'edit_item'                => esc_html__( 'Edit Domain', 'your-textdomain' ),
            'new_item'                 => esc_html__( 'New Domain', 'your-textdomain' ),
            'view_item'                => esc_html__( 'View Domain', 'your-textdomain' ),
            'view_items'               => esc_html__( 'View Domains', 'your-textdomain' ),
            'search_items'             => esc_html__( 'Search Domains', 'your-textdomain' ),
            'not_found'                => esc_html__( 'No domains found', 'your-textdomain' ),
            'not_found_in_trash'       => esc_html__( 'No domains found in Trash', 'your-textdomain' ),
            'parent_item_colon'        => esc_html__( 'Parent Domain:', 'your-textdomain' ),
            'all_items'                => esc_html__( 'All Domains', 'your-textdomain' ),
            'archives'                 => esc_html__( 'Domain Archives', 'your-textdomain' ),
            'attributes'               => esc_html__( 'Domain Attributes', 'your-textdomain' ),
            'insert_into_item'         => esc_html__( 'Insert into domain', 'your-textdomain' ),
            'uploaded_to_this_item'    => esc_html__( 'Uploaded to this domain', 'your-textdomain' ),
            'featured_image'           => esc_html__( 'Featured image', 'your-textdomain' ),
            'set_featured_image'       => esc_html__( 'Set featured image', 'your-textdomain' ),
            'remove_featured_image'    => esc_html__( 'Remove featured image', 'your-textdomain' ),
            'use_featured_image'       => esc_html__( 'Use as featured image', 'your-textdomain' ),
            'menu_name'                => esc_html__( 'Domains', 'your-textdomain' ),
            'filter_items_list'        => esc_html__( 'Filter domains list', 'your-textdomain' ),
            'filter_by_date'           => esc_html__( '', 'your-textdomain' ),
            'items_list_navigation'    => esc_html__( 'Domains list navigation', 'your-textdomain' ),
            'items_list'               => esc_html__( 'Domains list', 'your-textdomain' ),
            'item_published'           => esc_html__( 'Domain published', 'your-textdomain' ),
            'item_published_privately' => esc_html__( 'Domain published privately', 'your-textdomain' ),
            'item_reverted_to_draft'   => esc_html__( 'Domain reverted to draft', 'your-textdomain' ),
            'item_scheduled'           => esc_html__( 'Domain scheduled', 'your-textdomain' ),
            'item_updated'             => esc_html__( 'Domain updated', 'your-textdomain' ),
            'text_domain'              => esc_html__( 'your-textdomain', 'your-textdomain' ),
        ];
        $args = [
            'label'               => esc_html__( 'Domains', 'your-textdomain' ),
            'labels'              => $labels,
            'description'         => '',
            'public'              => true,
            'hierarchical'        => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'show_ui'             => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'show_in_rest'        => true,
            'query_var'           => true,
            'can_export'          => true,
            'delete_with_user'    => true,
            'has_archive'         => true,
            'rest_base'           => '',
            'show_in_menu'        => true,
            'menu_position'       => '',
            'menu_icon'           => 'dashicons-admin-site-alt2',
            'capability_type'     => 'post',
            'supports'            => ['title'],
            'taxonomies'          => [],
            'rewrite'             => [
                'with_front' => false,
            ],
        ];

        // Register the 'Invoices' custom post type
        register_post_type('domain', $args);
    }
}