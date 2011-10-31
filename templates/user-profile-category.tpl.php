<?php
/**
 * Mosquito theme: user profile category template.
 *
 * Available variables:
 * - $title: Category title for the group of items.
 * - $profile_items: All the items for the group rendered through
 *   user-profile-item.tpl.php.
 * - $attributes: HTML attributes. Usually renders classes.
 */
 
?>

<section class="profile-category">
    <?php if (!empty($title)): ?>
    <header>
        <h3><?php echo $title; ?></h3>
    </header>
    <?php endif; // !empty($title); ?>

    <dl<?php echo $attributes; ?>>
        <?php echo $profile_items; ?>
    </dl>
</section>