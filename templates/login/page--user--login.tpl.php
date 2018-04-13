<section id="login-page">
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
                <?php print $messages; ?>

                <?php print SL7ApiForm::getRenderForm('user_login'); ?>
            </section>
        </div>
    </div>
</section> <!-- End page -->