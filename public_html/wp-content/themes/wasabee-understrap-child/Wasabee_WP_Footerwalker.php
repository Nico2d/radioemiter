<?php
class Wasabee_WP_Footerwalker extends Understrap_WP_Bootstrap_Navwalker {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $rootClassName = $depth === 0 ? ' --is-root' : '';
        $wrapper = $args->has_children ? "<div class='Footer__sitemap__links'>" : '';
        $content = sprintf(
            "\n%s<li class='%s'><a class='%s' href='%s'>%s</a></li>\n",
            $wrapper,
            "Footer__sitemap__linkWrapper{$rootClassName}",
            'Footer__sitemap__link',
            $item->url,
            $item->title
        );

        if($item->object === 'awards' && have_rows('carousel_elem_wrapper', $item->object_id)) {
            the_row();
            $icon = get_sub_field('image', $item->object_id);

            if(!empty($icon)){
                $content = sprintf(
                    "\n%s<li class='%s'><img class='%s' src='%s'/></li>\n",
                    $wrapper,
                    "Footer__sitemap__linkWrapper{$rootClassName}",
                    "Footer__awardImages",
                    $icon['url']
                );                
            } 
        }

        $output .= $content;
    }

    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $classes = ['Footer__sitemap__children'];
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $output .= "<ul$class_names>";
    }

    public function end_lvl(&$output, $depth = 0, $args = array()) {
        $output .= "</div>";
    }
}
