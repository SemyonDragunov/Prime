<?php
/**
 * @file
 * Block template.
 *
 * $block_id - blocks unique id (integer).
 * $block_html_id - block system name.
 * $classes - classes list for this block.
 * $title - block title.
 */
?>
<section id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>">
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
        <h2 class="title"><?php print $title; ?></h2>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <div class="content-wrapper">
        <?php print $content; ?>
    </div>
</section>