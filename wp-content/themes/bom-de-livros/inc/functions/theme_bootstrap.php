<?php 

class BDL_bootstrapping
{
    // Bloginfo for themes and stylesheet_directory_uri for child themes
    var $basePath;

    function __construct()
    {
        // Theme base path
		$this->set_base_path( get_bloginfo('template_url') );

		// Theme Supports
		add_action('after_setup_theme', [$this, 'theme_supports']);

        // Enqueue styles and scripts
		add_action('wp_enqueue_scripts', [$this, 'enqueue_scripts']);
		add_action('wp_enqueue_scripts', [$this, 'enqueue_styles']);
		add_action('wp_enqueue_scripts', [$this, 'hoist_vars']);
		add_action('wp_enqueue_scripts', [$this, 'dequeue_scripts']);

		// remove styles
		add_action('wp_print_styles', [$this, 'dequeue_styles']);
		
		// fucking emojis
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
		remove_action( 'wp_print_styles', 'print_emoji_styles' );
        remove_action( 'admin_print_styles', 'print_emoji_styles' );

        // Nav menus
		add_action('after_setup_theme', [$this, 'register_theme_menus']);
		
		// Post types
		// add_action('init', [$this, 'register_theme_post_types']);

		// Taxonomies
		// add_action('init', [$this, 'register_theme_taxonomies']);

		// Widgets 
		// add_action( 'widgets_init', [$this, 'register_theme_widgets'] );

		add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
    }

	public function set_base_path($path)
	{
		$this->basePath = $path;
	}

	public function get_base_path()
	{
		return $this->basePath;
    }

    public function enqueue_scripts()
    {
        wp_register_script('app', $this->get_base_path() . '/dist/app.js', null, true);
		wp_enqueue_script('app');
    }

    public function enqueue_styles()
	{
		wp_register_style('stylesheet', $this->get_base_path().  '/dist/main.css', null, 'all');
		wp_enqueue_style('stylesheet');
	}

	public function hoist_vars()
	{
		$vars = [];
		$vars['adminURL'] = admin_url('admin-ajax.php');
		$vars['templateURL'] = $this->get_base_path();
		$vars['homeURL'] = site_url('/');
		$vars['frontPage'] = is_front_page();
		$vars = json_encode($vars);

		wp_localize_script('app', 'wpVars', $vars);
	}

	public function dequeue_styles()
	{
		wp_deregister_style('dashicons');
		wp_dequeue_style('wp-block-library');
	}

	public function dequeue_scripts()
	{
		wp_deregister_script('wp-embed');
		wp_dequeue_style( 'select2' );
		wp_deregister_script('selectWoo');
	}

	public function theme_supports()
	{
		if ( function_exists('add_theme_support') ) {
			add_theme_support('post-thumbnails');
			add_theme_support( 'woocommerce' );
			// add_theme_support( 'wc-product-gallery-zoom' );
			// add_theme_support( 'wc-product-gallery-lightbox' );
		}

		if ( post_type_exists( 'product' ) ) {
			add_post_type_support( 'product', 'author' );
		}
    }

    public function register_theme_menus()
    {
        register_nav_menu('Menu Principal', 'Menu do Header');
	}
	
	public function register_theme_post_types()
	{
		// $labels = array(
		// 	'name'                  => _x( 'Cases', 'Post type general name', 'textdomain' ),
		// 	'singular_name'         => _x( 'Case', 'Post type singular name', 'textdomain' ),
		// 	'menu_name'             => _x( 'Cases', 'Admin Menu text', 'textdomain' ),
		// 	'name_admin_bar'        => _x( 'Case', 'Add New on Toolbar', 'textdomain' ),
		// 	'add_new'               => __( 'Adicionar novo', 'textdomain' ),
		// 	'add_new_item'          => __( 'Adicionar novo Case', 'textdomain' ),
		// 	'new_item'              => __( 'Novo Case', 'textdomain' ),
		// 	'edit_item'             => __( 'Editar Case', 'textdomain' ),
		// 	'view_item'             => __( 'Ver Case', 'textdomain' ),
		// 	'all_items'             => __( 'Todos Cases', 'textdomain' ),
		// 	'search_items'          => __( 'Buscar Case', 'textdomain' ),
		// 	'parent_item_colon'     => __( 'Case(s) pai(s):', 'textdomain' ),
		// 	'not_found'             => __( 'Nenhum Case encontrado.', 'textdomain' ),
		// 	'not_found_in_trash'    => __( 'Nenhum Case encontrado na Lixeira.', 'textdomain' ),
		// 	'archives'              => _x( 'Arquivos do Case', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
		// 	'insert_into_item'      => _x( 'Inserir no Case', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
		// 	'filter_items_list'     => _x( 'Filtrar Lista de Cases', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
		// 	'items_list'            => _x( 'Lista de Cases', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
		// );

		// $args = array(
		// 	'labels'             => $labels,
		// 	'public'             => true,
		// 	'publicly_queryable' => true,
		// 	'show_ui'            => true,
		// 	'show_in_menu'       => true,
		// 	'query_var'          => true,
		// 	'rewrite'            => true,
		// 	'capability_type'    => 'post',
		// 	'has_archive'        => false,
		// 	'hierarchical'       => false,
		// 	'menu_position'      => null,
		// 	'supports'           => array( 'title', 'thumbnail', 'editor'),
		// 	'menu_icon'          => 'dashicons-clipboard'
		// );

		// register_post_type( 'cases', $args );
	}

	public function register_theme_taxonomies()
	{

		// // Soluções - para pages
		// $typeLabels = [
		// 	'name'              => _x( 'Soluções', 'taxonomy general name'),
		// 	'singular_name'     => _x( 'Tipo de Solução', 'taxonomy singular name'),
		// 	'search_items'      => __( 'Procurar Soluções'),
		// 	'all_items'         => __( 'Todos Soluções'),
		// 	'parent_item'       => __( 'Tipo de Solução pai'),
		// 	'parent_item_colon' => __( 'Tipo de Solução pai:'),
		// 	'edit_item'         => __( 'Editar Tipo de Solução'),
		// 	'update_item'       => __( 'Atualizar Tipo de Solução'),
		// 	'add_new_item'      => __( 'Adicionar novo Tipo de Solução'),
		// 	'new_item_name'     => __( 'Novo Tipo de Solução'),
		// 	'menu_name'         => __( 'Soluções'),
		// ];

		// $typeArgs = [
		// 	'hierarchical'      => false,
		// 	'labels'            => $typeLabels,
		// 	'show_ui'           => true,
		// 	'show_admin_column' => true,
		// 	'query_var'         => true,
		// 	'rewrite'           => ['with_front'=>true],
		// ];

		// register_taxonomy('solucoes', 'page', $typeArgs);
		
		// // Categorias do post type "media"
		// $mediaCatArgs = [
		// 	'hierarchical' => true, 
		// 	'label' => 'Categorias', 
		// 	'singular_label' => 'Categoria', 
		// 	'rewrite' => array( 'slug' => 'categorias', 'with_front'=> false )
		// ];

		// register_taxonomy( 'categorias', 'media', $mediaCatArgs );

	}

	public function register_theme_widgets()  {

		// Footer widgets 

		// First Column
		register_sidebar([
			'name' 				=> 'Primeira Coluna do Footer', 
			'id'				=> 'footer_1', 
			'description'		=> 'Widget da primeira coluna do Footer', 
			'before_widget'		=> '<div class="footer-widget">', 
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="t-xxg t-white margin-s bold">',
			'after_title'		=> '</h4>'
		]);

		// Second Column
		register_sidebar([
			'name' 				=> 'Segunda Coluna do Footer', 
			'id'				=> 'footer_2', 
			'description'		=> 'Widget da segunda coluna do Footer', 
			'before_widget'		=> '<div class="footer-widget">', 
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="t-xxg t-white margin-s bold">',
			'after_title'		=> '</h4>'
		]);

		// Third Column
		register_sidebar([
			'name' 				=> 'Terceira Coluna do Footer', 
			'id'				=> 'footer_3', 
			'description'		=> 'Widget da terceira coluna do Footer', 
			'before_widget'		=> '<div class="footer-widget">', 
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="t-xxg t-white margin-s bold">',
			'after_title'		=> '</h4>'
		]);

		// Fourth Column
		register_sidebar([
			'name' 				=> 'Quarta Coluna do Footer', 
			'id'				=> 'footer_4', 
			'description'		=> 'Widget da Quarta coluna do Footer', 
			'before_widget'		=> '<div class="footer-widget">', 
			'after_widget'		=> '</div>',
			'before_title'		=> '<h4 class="t-xxg t-white margin-s bold">',
			'after_title'		=> '</h4>'
		]);
	}
}

$bootstrap = new BDL_bootstrapping();