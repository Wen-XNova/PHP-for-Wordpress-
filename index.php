<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WP Portfolio</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header>
    <h1 class="glitch" data-text="CORE_ARCHITECTURE">CORE_ARCHITECTURE</h1>
    <p class="accent-text">// ORACLE_CLOUD_NODE: 129.151.XXX.XXX [ENCRYPTED]</p>
    </header>

    <main>
    <?php echo do_shortcode('[dev_projects]'); ?>
    </main>

    <?php wp_footer(); ?>
    <div id="system-readout" style="padding: 15px 20px; font-family: monospace; color: #39FF14; font-size: 10px; letter-spacing: 1px;">
    <div style="max-width: 1200px; margin: 0 auto; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 15px;">
        
        <div class="sys-left">
            <span>[ ENGINE: Wordpress_<?php echo get_bloginfo('version'); ?> ]</span>
            <span style="margin-left: 15px;">[ MEM_USAGE: <?php echo round(memory_get_usage() / 1024 / 1024, 2); ?>MB ]</span>
            <span style="margin-left: 15px;">[ LATENCY: <?php echo timer_stop(0, 3); ?>s ]</span>
        </div>

        <div class="sys-mid" style="color: #fff; text-shadow: 0 0 5px #39FF14;">
            <span class="pulse">●</span> STATUS: OPERATIONAL // NODE: OCI_ORACLE_BT2
        </div>

        <div class="sys-right">
            <a href="/wp-admin" style="color: #000; background: #39FF14; text-decoration: none; padding: 2px 8px; font-weight: bold; border-radius: 2px;">ACCESS_GATE</a>
        </div>
        
    </div>
</div>
</body>
</html>