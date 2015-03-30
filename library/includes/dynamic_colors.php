<?php
  $color = get_option('kopa_theme_options_color_code', '#e03d3d');
?>
<style>
  .article-list li .entry-item .tags a,
  .article-list li .entry-title,
  .article-list li .entry-item .tags {
    background-color: <?= $color ?>;
  }

  .multiline-overflow {
    background: linear-gradient(to bottom, rgba(0, 0, 0, 0), rgba(<?= implode(', ', hex2rgb($color)); ?>, 1));
  }

  .mailchimp-signup-form .input[type=submit] {
    background-color: #6babff;
  }
</style>