<?php

function portfolio_enqueue_assets() {

    wp_enqueue_style('main-style', get_stylesheet_uri(), array(), time());
    
    wp_enqueue_script('portfolio-js', get_template_directory_uri() . '/app.js', array(), time(), true);
}
add_action('wp_enqueue_scripts', 'portfolio_enqueue_assets');


function create_project_post_type() {
    register_post_type('projects',
        array(
            'labels'      => array('name' => 'Projects', 'singular_name' => 'Project'),
            'public'      => true,
            'has_archive' => true,
            'menu_icon'   => 'dashicons-portfolio',
            'supports'    => array('title', 'editor', 'thumbnail', 'excerpt'),
        )
    );
}
add_action('init', 'create_project_post_type');

function dev_project_grid_shortcode() {
    ob_start();
    
    $query = new WP_Query([
        'post_type' => 'projects', 
        'posts_per_page' => 12,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    
    echo '<div class="project-grid">';
    
    $counter = 1; 
    
if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
    
        $is_new = (time() - get_the_time('U')) < (60*60*24*7);
        $last_update = date("F d Y H:i", filemtime(get_stylesheet_directory() . '/style.css'));
        $status_label = $is_new ? "NEW_DEPLOY" : "STABLE_BUILD";
        $status_class = $is_new ? "neon-active" : "neon-stable";
        
        $display_id = str_pad($counter, 3, '0', STR_PAD_LEFT);
        ?>
            
            <div class="project-card <?php echo $status_class; ?>">
            <div class="card-header">
            <span class="status-tag">
            <?php echo $status_label; ?>
            </span>
            <span class="project-id">INDEX_ID: <?php echo $display_id . " "; echo "[LAST_PUSH: " . $last_update . "]";?></span>
            </div>
            
            <h3><?php the_title(); ?></h3>
            
            <div class="excerpt-view">
                <?php the_excerpt(); ?>
            </div>
            
            <div class="full-view">
                <?php the_content(); ?>
            </div>
            
        </div>

    <?php 
    $counter++; 
    endwhile; endif; wp_reset_postdata();
    
    echo '</div>';
    
    return ob_get_clean();
}
add_shortcode('dev_projects', 'dev_project_grid_shortcode');