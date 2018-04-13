<section id="page-error">
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
                <h1>403 - Доступ запрещён</h1>

                <div class="column">
                    <a class="button expand" href="javascript:history.go(-1);">Назад</a>
                </div>
                <div class="column">
                    <a class="button expand" href="/">На главную</a>
                </div>
                <div class="column">
                    <a class="button expand" href="/user">Личный кабинет</a>
                </div>
            </section>
        </div>
    </div>
</section> <!-- End page -->