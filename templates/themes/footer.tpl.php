<footer role="contentinfo">
  <div class="container">
    <?php if ($footer_right || $footer): ?>
      <section class="region region-footer">
        <?php print render($footer); ?>
        <div class="sl7-copyright"><?php print theme('sl7_copyright'); ?></div>
      </section>
      <section class="region region-footer-right"><?php print render($footer_right); ?></section>
    <?php endif; ?>
  </div>
</footer>