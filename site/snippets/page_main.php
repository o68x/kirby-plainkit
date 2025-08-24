<?php
/** @var Kirby\Cms\Page $page
 *  @var Kirby\Cms\Site $site
 *  @var Kirby\Cms\App $kirby */
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Meta-tags defined with plugin in config.php -->
  <?= $page->metaTags() ?>

  <link rel="icon" type="image/ico" href="/favicon.ico" />
  <link rel="icon" type="image/png" href="/favicon.png" />
  <link rel="icon" type="image/svg+xml" href="/favicon.svg" />

  <?= css('assets/css/index.css') ?>
</head>

<body>
  <header>
    <?php snippet('page_header') ?>
  </header>
  <main>
    <?= $slots->default() ?>
  </main>
  <footer>
    <?php snippet('page_footer') ?>
  </footer>
</body>

<?= js('assets/js/index.js', ['module' => true]) ?>
</html>