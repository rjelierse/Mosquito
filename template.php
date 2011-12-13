<?php
/**
 * Mosquito theme.
 *
 * @file Functions for overriding theme behaviour.
 */

/**
 * Modify the variables that are pased to the page template.
 *
 *  - Adds the variable $in_admin, to indicate whether the page is within the Administration section.
 *  - Unset $breadcrumb when not inside the Administration section.
 *
 * @param array $variables
 *     The variables to pass to the page template.
 *
 * @return void
 *     Nothing.
 *
 * @seealso template_preprocess_page()
 */
function mosquito_preprocess_page(&$variables) {
    // Add modernizr to theme.
    drupal_add_js('sites/all/libraries/modernizr/modernizr.min.js', 'core');
    $variables['scripts'] = drupal_get_js();

    $variables['in_admin'] = false;

    if (arg(0) != 'admin') {
        $variables['in_admin'] = true;
        unset($variables['breadcrumb']);
    }
}

/**
 * Override the theme function for the breadcrumb.
 *
 * Enclose the breadcrumb in a nav-element instead of a div.
 *
 * @param array $breadcrumb
 *     The link elements that are part of the breadcrumb.
 *
 * @return string
 *     The rendered HTML.
 *
 * @seealso theme_breadcrumb()
 */
function mosquito_breadcrumb($breadcrumb) {
    if (!empty($breadcrumb)) {
        return '<nav id="breadcrumb">' . implode(' » ', $breadcrumb) . ' » </nav>';
    }
}

/**
 * Output section form element as HTML5 section.
 *
 * @param array $element
 *     The section element to theme.
 *
 * @return string
 *     The rendered HTML.
 *
 * @seealso theme_section()
 */
function mosquito_section($element) {
    $output = '<section' . drupal_attributes($element['#attributes']) . '>';
    if (!empty($element['#title'])) {
        $output .= '<header><h3>'.$element['#title'].'</h3></header>';
    }
    $output .= $element['#children'];
    $output .= $element['#value'];
    $output .= "</section>\n";

    return $output;
}

/**
 * Override like_button theme function.
 *
 * Always sets render mode to HTML5.
 *
 * @param string $type
 *     Set the type of Facebook Like widget that should be displayed.
 *     Can be either button or box.
 * @param array $attributes
 *     The attributes to set on the Like widget.
 * @param bool $html5
 *     Render the widget as HTML5 instead of XFBML.
 *
 * @return string
 *     The renderded Like widget.
 *
 * @seealso theme_like_button()
 */
function mosquito_like_button($type = 'button', $attributes = array(), $html5 = false) {
    return theme_like_button($type, $attributes, true);
}