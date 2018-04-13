<!DOCTYPE html>
<html<?php print $html_attributes; ?>>
<head>
  <?php print $head; ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <title><?php print $head_title; ?></title>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
<body class="<?php print $classes; ?>" <?php print $attributes; ?>>
  <section id="page-maintenance">
    <div class="vertical">
      <div class="wrapper horizontal">

        <header class="logo" role="banner">
          <?php if (!theme_get_setting('default_logo')): ?>
            <a href="<?php print $front_page; ?>" title="Главная" rel="home" id="logo">
              <img src="<?php print $logo; ?>" alt="<?php print variable_get('site_name'); ?>" />
            </a>
          <?php else: ?>
            <a href="/"><?php print variable_get('site_name'); ?></a>
          <?php endif; ?>
        </header>

        <section class="content">
          <h1>Сайт на обслуживании</h1>

          <?php print $content; ?>

          <div class="controls"><a class="button" href="/user">Войти</a></div>
        </section>
      </div>
    </div>
  </section> <!-- End page -->
</body>
</html>