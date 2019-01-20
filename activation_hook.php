<?php namespace Inspecties;

function activation_hook() {
  mkdir(WP_CONTENT_DIR . '/uploads/inspecties');
}