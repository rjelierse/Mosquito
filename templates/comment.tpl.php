<?php

/**
 * @file comment.tpl.php
 * Default theme implementation for comments.
 *
 * Available variables:
 * - $author: Comment author. Can be link or plain text.
 * - $content: Body of the post.
 * - $date: Date and time of posting.
 * - $links: Various operational links.
 * - $new: New comment marker.
 * - $picture: Authors picture.
 * - $signature: Authors signature.
 * - $status: Comment status. Possible values are:
 *   comment-unpublished, comment-published or comment-preview.
 * - $submitted: By line with date and time.
 * - $title: Linked title.
 *
 * These two variables are provided for context.
 * - $comment: Full comment object.
 * - $node: Node object the comments are attached to.
 *
 * @see template_preprocess_comment()
 * @see theme_comment()
 */
?>
<article class="comment<?php echo ($comment->new) ? ' comment-new' : ''; echo ' '. $status ?> clear-block">
    <?php if ($title || $submitted): ?>
    <header>
        <?php if ($title): ?>
        <h3><?php echo $title ?></h3>
        <?php endif; ?>
        
        <?php if ($submitted): ?>
        <div class="submitted"><?php echo $submitted ?></div>
        <?php endif; ?>
    </header>
    <?php endif; ?>
    
    <section class="content">
        <?php echo $content; ?>
    </section>

    <?php if ($signature): ?>
    <section class="signature">
        <?php echo $signature; ?>
    </section>
    <?php endif; ?>

    <?php if ($links): ?>
    <footer>
        <?php echo $links ?>
    </footer>
    <?php endif; ?>
</article>
