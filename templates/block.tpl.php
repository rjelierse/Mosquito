<?php
/**
 * Mosquito theme: block template.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $block->content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: This is a numeric id connected to each module.
 * - $block->region: The block region embedding the current block.
 *
 * Helper variables:
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 */
?>
<aside id="block-<?php echo $block->module .'-'. $block->delta; ?>" class="block block-<?php echo $block->module ?>">
    <?php if ($block->subject): ?>
    <header>
        <h3><?php echo $block->subject; ?></h3>
    </header>
    <?php endif;?>
    <section>
        <?php echo $block->content; ?>
    </section>
</aside>
