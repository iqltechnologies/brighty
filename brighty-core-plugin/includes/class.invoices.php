<?php
namespace BrightyCorePlugin;

class Invoices_Feature implements Brighty_Core_Plugin_Feature_Interface  {
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
            'name'                     => esc_html__( 'Invoices', 'brighty' ),
            'singular_name'            => esc_html__( 'Invoice', 'brighty' ),
            'add_new'                  => esc_html__( 'Add New', 'brighty' ),
            'add_new_item'             => esc_html__( 'Add new invoice', 'brighty' ),
            'edit_item'                => esc_html__( 'Edit Invoice', 'brighty' ),
            'new_item'                 => esc_html__( 'New Invoice', 'brighty' ),
            'view_item'                => esc_html__( 'View Invoice', 'brighty' ),
            'view_items'               => esc_html__( 'View Invoices', 'brighty' ),
            'search_items'             => esc_html__( 'Search Invoices', 'brighty' ),
            'not_found'                => esc_html__( 'No invoices found', 'brighty' ),
            'not_found_in_trash'       => esc_html__( 'No invoices found in Trash', 'brighty' ),
            'parent_item_colon'        => esc_html__( 'Parent Invoice:', 'brighty' ),
            'all_items'                => esc_html__( 'All Invoices', 'brighty' ),
            'archives'                 => esc_html__( 'Invoice Archives', 'brighty' ),
            'attributes'               => esc_html__( 'Invoice Attributes', 'brighty' ),
            'insert_into_item'         => esc_html__( 'Insert into invoice', 'brighty' ),
            'uploaded_to_this_item'    => esc_html__( 'Uploaded to this invoice', 'brighty' ),
            'featured_image'           => esc_html__( 'Featured image', 'brighty' ),
            'set_featured_image'       => esc_html__( 'Set featured image', 'brighty' ),
            'remove_featured_image'    => esc_html__( 'Remove featured image', 'brighty' ),
            'use_featured_image'       => esc_html__( 'Use as featured image', 'brighty' ),
            'menu_name'                => esc_html__( 'Invoices', 'brighty' ),
            'filter_items_list'        => esc_html__( 'Filter invoices list', 'brighty' ),
            'filter_by_date'           => esc_html__( '', 'brighty' ),
            'items_list_navigation'    => esc_html__( 'Invoices list navigation', 'brighty' ),
            'items_list'               => esc_html__( 'Invoices list', 'brighty' ),
            'item_published'           => esc_html__( 'Invoice published', 'brighty' ),
            'item_published_privately' => esc_html__( 'Invoice published privately', 'brighty' ),
            'item_reverted_to_draft'   => esc_html__( 'Invoice reverted to draft', 'brighty' ),
            'item_scheduled'           => esc_html__( 'Invoice scheduled', 'brighty' ),
            'item_updated'             => esc_html__( 'Invoice updated', 'brighty' ),
            'text_domain'              => esc_html__( 'brighty', 'brighty' ),
        ];
        $args = [
            'label'               => esc_html__( 'Invoices', 'brighty' ),
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
            'menu_icon'           => 'dashicons-index-card',
            'capability_type'     => 'post',
            'supports'            => ['title', 'revisions', 'author'],
            'taxonomies'          => ['product_type'],
            'rewrite'             => [
                'with_front' => false,
            ],
        ];

        // Register the 'Invoices' custom post type
        register_post_type('invoice', $args);
    }
}