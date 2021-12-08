<?php
// add_action( 'init', 'cp_change_post_object' );
// add_action( 'init', 'register_my_cpts' );
// add_action( 'init', 'register_my_taxes' );
/*
|-----------------------------------------------------------------------------------
| Add new post type
|-----------------------------------------------------------------------------------
|
*/
function register_my_cpts() {

	/**
	 * Post type 1
	 * 
	 */
	$labels = [
		"name" => __( "Products" ),
		"singular_name" => __( "Product" ),
		"menu_name" => __( "Products" ),
		"all_items" => __( "All Products" ),
		"add_new" => __( "Add Product" ),
		"add_new_item" => __( "Add New Product" ),
		"edit_item" => __( "Edit Product" ),
		"new_item" => __( "New Product" ),
		"view_item" => __( "View Product" ),
		"view_items" => __( "View Products" ),
		"search_items" => __( "Search Products" ),
		"parent" => __( "Parent Product" ),
		"featured_image" => __( "Featured Image for this Product" ),
		"set_featured_image" => __( "Set featured image for this Product" ),
		"remove_featured_image" => __( "Remove featured image for this Product" ),
		"use_featured_image" => __( "Use as featured image for this Product" ),
		"archives" => __( "Product archives" ),
		"insert_into_item" => __( "Insert into Product" ),
		"uploaded_to_this_item" => __( "Uploaded to this Product" ),
		"filter_items_list" => __( "Filter Products list" ),
		"items_list_navigation" => __( "Products list navigation" ),
		"items_list" => __( "Products list" ),
		"attributes" => __( "Products Attributes" ),
		"name_admin_bar" => __( "Product" ),
		"item_published" => __( "Product published" ),
		"item_published_privately" => __( "Product published privately." ),
		"item_reverted_to_draft" => __( "Product reverted to draft" ),
		"item_scheduled" => __( "Product scheduled" ),
		"item_updated" => __( "Product updated" ),
		"parent_item_colon" => __( "Parent Product" )
	];

	register_post_type( "product", [
		"label" => __( "Products" ),
		"labels" => $labels,
		"description" => "This is Product post type description.",
		"public" => true,
		"publicly_queryable" => true,
		"show_ui" => true,
		"show_in_rest" => true,
		"rest_base" => "",
		"has_archive" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"delete_with_user" => false,
		"exclude_from_search" => true,
		"capability_type" => "post",
		"map_meta_cap" => true,
		"hierarchical" => true,
		"rewrite" => [ "slug" => "product", "with_front" => true ],
		"query_var" => true,
		// "menu_icon" => "/wp-content/uploads/icon.png",
		// 'menu_icon' =>'dashicons-products',
		"supports" => [ "title", "editor", "thumbnail", "excerpt", "trackbacks", "custom-fields", "comments", "revisions", "author", "page-attributes", "post-formats" ],
		"taxonomies" => [ "region" ]
	]);
}

/*
|-----------------------------------------------------------------------------------
| Add new taxonomy
|-----------------------------------------------------------------------------------
|
*/
function register_my_taxes() {

    /**
     * Taxonomy - 1
     * 
     */
	$labels = [
		"name" => __( "Brands" ),
		"singular_name" => __( "Brand" ),
	];

	register_taxonomy( "brand", [ "post", "product" ], [
		"label" => __( "Brands" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'brand', 'with_front' => true ],
		"show_admin_column" => true,
		"show_in_rest" => true,
		"show_in_quick_edit" => true
	]);
}


/*
|-----------------------------------------------------------------------------------
| Change dashboard Posts to News
|-----------------------------------------------------------------------------------
|
*/
function cp_change_post_object() {
    $get_post_type = get_post_type_object('post');
    $labels = $get_post_type->labels;
        $labels->name = 'News';
        $labels->singular_name = 'News';
        $labels->add_new = 'Add News';
        $labels->add_new_item = 'Add News';
        $labels->edit_item = 'Edit News';
        $labels->new_item = 'News';
        $labels->view_item = 'View News';
        $labels->search_items = 'Search News';
        $labels->not_found = 'No News found';
        $labels->not_found_in_trash = 'No News found in Trash';
        $labels->all_items = 'All News';
        $labels->menu_name = 'News';
        $labels->name_admin_bar = 'News';
}
