<?php
/**
 * Mosquito theme.
 *
 * @file Functions for overriding theme behaviour.
 */

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