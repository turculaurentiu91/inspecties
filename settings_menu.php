<?php namespace Inspecties;

function add_menu() {
  add_menu_page(
    'Inspecties',
    'Inspecties',
    'manage_options',
    'inspecties'
  );
}

add_action('admin_menu', 'Inspecties\add_menu');