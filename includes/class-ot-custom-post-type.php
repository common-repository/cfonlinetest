<?php
/**
 * Online Test Custom Post Type
 *
 * @package   CFOnlineTest
 * @author    CodeFootsteps Team
 * @license   GPL-2.0-or-later
 * @link      https://wordpress.org/plugins/cfonlinetest/
 * @copyright 2020 CF Online Test
 */

defined('ABSPATH')
    or die('No, you cannot run this file directly!');

/**
 * Class CFOT_Custom_Post_Type
 *
 * This class is used to create custom post types.
 *
 * The three proposed custom post types would be Test, Test Question, & Test Response.
 *
 * 
 * @since 1.0.0
 */
class CFOT_Custom_Post_Type
{
    /**
     * Register all custom post types.
     *
     * @since 1.0.0
     * @return void
     */
    public static function registerCustomPostTypes()
    {
        // Register all custom post types
        self::registerTestsPostType();
        self::registerQuestionsPostType();
    }
    
    public static function registerCustomTaxonomies()
    {
        self::registerTestsTaxonomy();
    }
    
    /**
     * Register Tests Post Type
     */
    private static function registerTestsPostType()
    {
        $args = array(
            'public' => true,
            'label' => 'Online Tests',
            'labels' => array(
                'name' => 'Online Tests',
                'singular_name' => 'Test',
                'add_new_item' => 'Add New Test',
                'edit_item' => 'Edit Test',
                'search_items' => 'Search Tests',
                'not_found' => 'No tests found.',
                'not_found_in_trash' => 'No tests found in Trash.',
                'all_items' => 'All Tests',
                'featured_image' => 'Test featured image',
                'set_featured_image' => 'Set test featured image',
                'remove_featured_image' => 'Remove test featured image',
                'use_featured_image' => 'Use as test featured image',
                'item_published' => 'Test published',
                'item_published_privately' => 'Test published privately',
                'item_reverted_to_draft' => 'Test reverted to draft',
                'item_scheduled' => 'Test scheduled',
                'item_updated' => 'Test updated'
            ),
            'description' => 'This custom post type will be used to store all tests.',
            'exclude_from_search' => false,
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'),
            'taxonomies' => array('ottestcategory')
        );
        register_post_type('ottest', $args);
    }
    
    /**
     * Register Questions Post Type
     */
    private static function registerQuestionsPostType()
    {
        $args = array(
            'public' => true,
            'label' => 'Test Questions',
            'labels' => array(
                'name' => 'Test Questions',
                'singular_name' => 'Question',
                'add_new_item' => 'Add New Test Question',
                'edit_item' => 'Edit Test Question',
                'search_items' => 'Search Test Questions',
                'not_found' => 'No test questions found.',
                'not_found_in_trash' => 'No test questions found in Trash.',
                'all_items' => 'All Test Questions',
                'featured_image' => 'Test question featured image',
                'set_featured_image' => 'Set test question featured image',
                'remove_featured_image' => 'Remove test question featured image',
                'use_featured_image' => 'Use as test question featured image',
                'item_published' => 'Test question published',
                'item_published_privately' => 'Test question published privately',
                'item_reverted_to_draft' => 'Test question reverted to draft',
                'item_scheduled' => 'Test question scheduled',
                'item_updated' => 'Test question updated'
            ),
            'description' => 'This custom post type will be used to store all test questions.',
            'exclude_from_search' => false,
            'show_in_menu' => 'edit.php?post_type=ottest',
            'menu_icon' => 'dashicons-welcome-learn-more',
            'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'page-attributes'),
            'taxonomies' => array('otquestioncategory')
        );
        register_post_type('otquestion', $args);
    }
    
    private static function registerTestsTaxonomy()
    {
        $args = array(
            'label' => 'Test Categories',
            'labels' => array(
                'name' => 'Test Categories',
                'singular_name' => 'Test Category',
                'all_items' => 'All Test Categories',
                'edit_item' => 'Edit Test Category',
                'view_item' => 'View Test Category',
                'update_item' => 'Update Test Category',
                'add_new_item' => 'Add New Test Category',
                'new_item_name' => 'New Test Category Name',
                'parent_item' => 'Parent Test Category',
                'parent_item_colon' => 'Parent Test Category:',
                'search_items' => 'Search Test Categories',
                'not_found' => 'No test categories found.',
                'back_to_items' => '&#8592; Back to test categories'
            ),
            'show_in_rest' => true,
            'description' => 'This taxonomy is used as custom category for Test post type.',
            'hierarchical' => true
        );
        register_taxonomy('ottesttaxonomy', 'ottest', $args);
    }
}
