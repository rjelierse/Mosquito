<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
$node = node_load($row->nid);
$group = $view->name.'-'.$row->term_data_tid;
$GLOBALS['groups'][$group] = $row->term_data_name;
?>

<a class="image image-thumbnail" rel="<?php echo $group; ?>" title="<?php echo check_plain($node->title); ?>" href="<?php echo url($node->images[IMAGE_PREVIEW], array('absolute' => true)); ?>">
    <img src="<?php echo url($node->images[IMAGE_THUMBNAIL], array('absolute' => true)); ?>" alt="<?php echo check_plain($node->title); ?>" />
</a>