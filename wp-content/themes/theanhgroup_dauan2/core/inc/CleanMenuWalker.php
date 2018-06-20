<?php
/**
 * Clean Menu Walker.
 *
 * @category    WordPress
 * @package     CleanMenuWalker
 * @author      Christopher Davis <http://christopherdavis.me>
 * @copyright   2012 Christopher Davis
 * @license     http://opensource.org/licenses/MIT MIT
 */

!defined('ABSPATH') && exit;

/**
 * The menu walker.  This is just the methods from `Walker_Nav_Menu` with
 * all of the whitespace generation (eg. `$indent` remove) as well as
 * some restrictions on the CSS classes that are added. Menu item IDs are also
 * removed.
 *
 * Most of the filters here are preserved so it should be backwards 
 * compatible.
 *
 * @since   0.1
 */
class CleanMenuWalker extends Walker_Nav_Menu
{
    /**
     * {@inheritdoc}
     */
    function start_lvl(&$output, $depth=0, $args=array())
    {
        $indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul>\n";
    }

    /**
     * {@inheritdoc}
     */
    function end_lvl(&$output, $depth=0, $args=array())
    {
        $output .= '</ul>';
    }

    /**
     * {@inheritdoc}
     */
    function start_el(&$output, $item, $depth=0, $args=array(), $id=0)
    {
        /*$class_names = '';

        $classes = empty($item->classes) ? array() : array_intersect($this->get_allowed_classes(), (array) $item->classes);
		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
			
		if( !empty($item->classes) && is_array($item->classes) && in_array('menu-item-has-children', $item->classes) ){
			$class_names .= 'has-dropdown not-click';
		}
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';
		
		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';*/
        
		$output .= '<li>';
		
		$attributes  = ! empty($item->attr_title) ? ' title="'  . esc_attr($item->attr_title) .'"' : '';
        $attributes .= ! empty($item->target)     ? ' target="' . esc_attr($item->target    ) .'"' : '';
        $attributes .= ! empty($item->xfn)        ? ' rel="'    . esc_attr($item->xfn       ) .'"' : '';
        $attributes .= ! empty($item->url)        ? ' href="'   . esc_attr($item->url       ) .'"' : '';
        $item_output = $args->before;
        $item_output .= '<a'. $attributes . '>';
        $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    /**
     * {@inheritdoc}
     */
    function end_el(&$output, $item, $depth = 0, $args = array()) {
        $output .= "</li>";
    }

    /**
     * Get the CSS classes that will be allowed on menu item li's.
     *
     * @since   1.0
     * @access  private
     * @uses    apply_filters.
     * @return  array
     */
    private function get_allowed_classes()
    {
        return apply_filters('clean_menu_walker_allowed_classes', array(
            'current-menu-item',
            'current-menu-ancestor',
        ));
    }
}
