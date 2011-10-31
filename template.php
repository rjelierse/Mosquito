<?php
/**
 * Mosquito theme: template functions.
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

function mosquito_preprocess_page(&$variables) {
}