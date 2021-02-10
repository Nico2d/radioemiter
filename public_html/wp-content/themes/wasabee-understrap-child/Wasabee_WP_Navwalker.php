<?php
class Wasabee_WP_Navwalker extends Understrap_WP_Bootstrap_Navwalker {
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        $parentClassName = $args->has_children ? ' --is-parent' : '';
        $rootClassName = $depth === 0 ? ' --is-root' : '';
        $expandArrow = $args->has_children ? '<div class="Header__content__expandArrow"></div>' : '';
        $wrapperDiv = $args->has_children ? '<div class="Header__content__linkWithDropdown">' : '';

        $output .= sprintf(
            "\n<li class='%s'><a id='%s' class='%s' href='%s'%s>%s</a>{$expandArrow}</li>\n",
            "Header__content__linkWrapper{$parentClassName}{$rootClassName}",
            $item->object_id,
            'Header__content__link',
            $item->url,
            ($item->object_id === get_the_ID()) ? ' class="current"' : '',
            $item->title
        );
    }

    public function start_lvl(&$output, $depth = 0, $args = array()) {
        $classes = ['Header__content__dropdown'];
        $class_names = join(' ', apply_filters('nav_menu_submenu_css_class', $classes, $args, $depth));
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
        $labelledby = "";

        preg_match_all('<a id=\'(.*?)\'>', $output, $matches, PREG_PATTERN_ORDER);

        if (end($matches[1])) {
            $labelledby = "aria-labelledby=\"" . end($matches[1]) . "\"";
        }

        $output .= "<ul$class_names $labelledby aria-expanded=\"false\" aria-label=\"Toggle dropdown\" role=\"menu\">";
    }
}
