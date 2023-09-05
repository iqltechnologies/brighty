<?php
namespace BrightyCorePlugin;

class Clients_Feature implements Brighty_Core_Plugin_Feature_Interface  {
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
            'name'                     => esc_html__( 'Clients', 'brighty' ),
            'singular_name'            => esc_html__( 'Client', 'brighty' ),
            'add_new'                  => esc_html__( 'Add New', 'brighty' ),
            'add_new_item'             => esc_html__( 'Add new client', 'brighty' ),
            'edit_item'                => esc_html__( 'Edit Client', 'brighty' ),
            'new_item'                 => esc_html__( 'New Client', 'brighty' ),
            'view_item'                => esc_html__( 'View Client', 'brighty' ),
            'view_items'               => esc_html__( 'View Clients', 'brighty' ),
            'search_items'             => esc_html__( 'Search Clients', 'brighty' ),
            'not_found'                => esc_html__( 'No clients found', 'brighty' ),
            'not_found_in_trash'       => esc_html__( 'No clients found in Trash', 'brighty' ),
            'parent_item_colon'        => esc_html__( 'Parent Client:', 'brighty' ),
            'all_items'                => esc_html__( 'All Clients', 'brighty' ),
            'archives'                 => esc_html__( 'Client Archives', 'brighty' ),
            'attributes'               => esc_html__( 'Client Attributes', 'brighty' ),
            'insert_into_item'         => esc_html__( 'Insert into client', 'brighty' ),
            'uploaded_to_this_item'    => esc_html__( 'Uploaded to this client', 'brighty' ),
            'featured_image'           => esc_html__( 'Featured image', 'brighty' ),
            'set_featured_image'       => esc_html__( 'Set featured image', 'brighty' ),
            'remove_featured_image'    => esc_html__( 'Remove featured image', 'brighty' ),
            'use_featured_image'       => esc_html__( 'Use as featured image', 'brighty' ),
            'menu_name'                => esc_html__( 'Clients', 'brighty' ),
            'filter_items_list'        => esc_html__( 'Filter clients list', 'brighty' ),
            'filter_by_date'           => esc_html__( '', 'brighty' ),
            'items_list_navigation'    => esc_html__( 'Clients list navigation', 'brighty' ),
            'items_list'               => esc_html__( 'Clients list', 'brighty' ),
            'item_published'           => esc_html__( 'Client published', 'brighty' ),
            'item_published_privately' => esc_html__( 'Client published privately', 'brighty' ),
            'item_reverted_to_draft'   => esc_html__( 'Client reverted to draft', 'brighty' ),
            'item_scheduled'           => esc_html__( 'Client scheduled', 'brighty' ),
            'item_updated'             => esc_html__( 'Client updated', 'brighty' ),
            'text_domain'              => esc_html__( 'brighty', 'brighty' ),
        ];
        $args = [
            'label'               => esc_html__( 'Clients', 'brighty' ),
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
            'menu_icon'           => 'dashicons-building',
            'capability_type'     => 'post',
            'supports'            => ['title', 'comments', 'revisions'],
            'taxonomies'          => [],
            'rewrite'             => [
                'with_front' => false,
            ],
        ];
    
    

        // Register the 'Clients' custom post type
        register_post_type('client', $args);
    }
}

