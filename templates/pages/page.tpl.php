<?php print $header; ?>

  <section id="h1-page">
    <div class="container dark">
      <h1 class="white"><?php print $title; ?></h1>
    </div>
  </section>

  <section class="content <?php print $classes; ?>" <?php print $attributes; ?>>
    <div class="container">
      <?php print render($page['sidebar_first']); ?>

      <main role="main">
        <section class="helper">
          <?php print $messages; ?>
          <?php print $breadcrumb; ?>
          <?php print render($page['help']); ?>

          <?php if ($action_links): ?>
            <ul class="action-links"><?php print render($action_links); ?></ul>
          <?php endif; ?>

          <?php if (!empty($tabs)): ?>
            <?php print render($tabs); ?>
          <?php endif; ?>
        </section>

        <?php print render($page['content']); ?>
      </main>
    </div>
  </section>

<?php print $footer; ?>