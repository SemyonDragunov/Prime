<header role="banner">
  <div class="header-left">
    <?php if (!theme_get_setting('default_logo')): ?>
      <a href="/" title="Главная" rel="home" id="logo">
        <img src="<?php print theme_get_setting('logo'); ?>" alt="<?php print variable_get('site_name'); ?>" />
      </a>
    <?php else: ?>
      <?php if (drupal_is_front_page()): ?>
        <h1><?php print variable_get('site_name'); ?></h1>
      <?php else: ?>
        <a title="Главная" href="/"><?php print variable_get('site_name'); ?></a>
      <?php endif; ?>
    <?php endif; ?>
  </div>
  <div class="header-right">
    <div class="wrapper">
      <?php
      $menu = menu_navigation_links('main-menu');
      print theme('links__main_menu', array(
        'links' => $menu,
        'attributes' => array(
          'id' => 'main-menu-links',
          'class' => array('links', 'list-inline'),
        )));
      ?>
    </div>
    <div class="wrapper">
      <?php if ($action): ?>
        <section class="region region-action"><?php print render($action); ?></section>
      <?php endif; ?>
    </div>
  </div>
</header>