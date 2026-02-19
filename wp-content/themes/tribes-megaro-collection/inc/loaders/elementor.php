<?php
function loadElementorWidgets()
{

    add_action('elementor/elements/categories_registered', function ($elements_manager) {
        $elements_manager->add_category('barnham', [
            'title' => 'Barnham',
            'icon' => 'fa fa-plug',
        ]);
    });

    add_action('elementor/widgets/register', function ($widgets_manager) {
        require_once get_template_directory() . '/template-parts/elementor/shared/SharedControls.php';

        $dir = get_stylesheet_directory() . '/template-parts/elementor';
        foreach (scandir($dir) as $file) {
            if (pathinfo($file, PATHINFO_EXTENSION) !== 'php') continue;
            $class = pathinfo($file, PATHINFO_FILENAME);
            require_once $dir . '/' . $file;

            if (class_exists($class) && is_subclass_of($class, \Elementor\Widget_Base::class)) {
                $widgets_manager->register(new $class());
                error_log("Registered widget: $class");
            }
        }
    });
}

add_action('elementor/init', 'loadElementorWidgets');

