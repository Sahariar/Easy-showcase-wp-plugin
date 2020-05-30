<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://sahariarkabir.com/
 * @since      1.0.0
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Easy_Work_Showcase
 * @subpackage Easy_Work_Showcase/public
 * @author     Sahariar Kabir <sahariark@gmail.com>
 */
class Easy_Work_Showcase_Public
{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $plugin_name;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */
    public function __construct($plugin_name, $version)
    {

        $this->plugin_name = $plugin_name;
        $this->version = $version;

    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_styles()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Easy_Work_Showcase_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Easy_Work_Showcase_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_style('ewc-tinys', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/tiny-slider.css', null, '1.0');
        wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/easy-work-showcase-public.css', array(), $this->version, 'all');

    }

    /**
     * Register the JavaScript for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public function enqueue_scripts()
    {

        /**
         * This function is provided for demonstration purposes only.
         *
         * An instance of this class should be passed to the run() function
         * defined in Easy_Work_Showcase_Loader as all of the hooks are defined
         * in that particular class.
         *
         * The Easy_Work_Showcase_Loader will then create the relationship
         * between the defined hooks and the functions defined in this
         * class.
         */
        wp_enqueue_script('ewc-tiniy-js', '//cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js', null, '1.0', true);
        wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/easy-work-showcase-public.js', array('jquery'), $this->version, true);

        $ewc_s_data = array(
            'items' => 2,
            'edgePadding' => 20,
            'loop' => false,
            'slideBy' => 'page',
            'swipeAngle' => false,
        );
        wp_localize_script($this->plugin_name, 'slidedata', $ewc_s_data);

    }

}

function eswc_shortcode_slider($arguments)
{
    $default = array(
        'cat_name' => '',
    );
    $attributes = shortcode_atts($default, $arguments);
    $args = array(
        'post_type' => 'workshowcase',
        'post_status' => 'publish',
        'orderby' => 'menu_order',
        'order' => 'DESC',
        'category_name' => $attributes['cat_name'],
    );
    ob_start();?>
	<div class="ewc-wrapper">
	<div class="my-slider">
	<?php
$ewspost = new WP_Query($args);
    if ($ewspost->have_posts()): while ($ewspost->have_posts()):
            $ewspost->the_post();?>

							<div class='slide'>
				          			<div class='ewc-img'><?php the_post_thumbnail('large');?></div>
				         			<p><?php the_title();?></p>
								<a class="ewc-link" href="<?php the_permalink();?>"></a>
				       		 </div>

				<!-- /#slide -->
                <?php endwhile; else : ?>
	                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif;
                
    wp_reset_query();?>
</div>
<ul class="controls" id="customize-controls">
            <li class="prev">
			<?php printf(
        '<img src="%1$s" alt="" />',
        plugins_url('img/angle-left.png', __FILE__)
    );?>
            </li>
            <li class="next">
			<?php printf(
        '<img src="%1$s" alt="" />',
        plugins_url('img/angle-right.png', __FILE__)
    );?>
            </li>
          </ul>
		  </div>
		<!-- /#slide wrapper -->
<?php
$content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('eswc', 'eswc_shortcode_slider');


function eswc_postslider_shortcode($arguments)
{
    // set default values
    $default = array(
        'cat_name' => '',
        'post_name__in' => array('hello-world','molestiae-doloru','aut-repell'),
    );
    // check with given value with $default value
    $attributes = shortcode_atts($default, $arguments);
    // set $default value with $arguments values
    $args = array(
        'post_type' => 'post',
        'category_name' => $attributes['cat_name'],
    );
    // start query about the parameter.
    // Get the ID of a given category
    $category_id = get_cat_ID( $attributes['cat_name'] );
    // Get the URL of this category
    $category_link = get_category_link( $category_id );
    ob_start();?>
	<div class="ewc-wrapper">
	<div class="postslider">
	<?php
    $ewc_postquery = new WP_Query($args);
    if ($ewc_postquery->have_posts()): while ($ewc_postquery->have_posts()):
            $ewc_postquery->the_post();?>

		                <div class='slide'>
		                    <div class='ewc-img'><?php the_post_thumbnail('large');?></div>
		                    
                            <a class="ewc-link" href="<?php the_permalink();?>"><?php the_title();?></a>
                            <a class="ewc-cat-link" href="<?php echo esc_url( $category_link ); ?>"><?php echo $attributes['cat_name']; ?> </a>
		                    </div>

		    <!-- /#slide -->

            <?php endwhile; else : ?>
	                <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif;
    wp_reset_query();?>
                    </div>
            <ul class="controls" id="customize-controls">
        <li class="prev">
        <?php printf(
        '<img src="%1$s" alt="" />',
        plugins_url('img/angle-left.png', __FILE__)
    );?>
        </li>
        <li class="next">
        <?php printf(
        '<img src="%1$s" alt="" />',
        plugins_url('img/angle-right.png', __FILE__)
    );?>
        </li>
      </ul>
      </div>
    <!-- /#slide wrapper -->
<?php
$content = ob_get_contents();
    ob_end_clean();

    return $content;
}
add_shortcode('eswc_postslide', 'eswc_postslider_shortcode');
