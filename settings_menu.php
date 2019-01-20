<?php namespace Inspecties;

function add_menu() {
  add_menu_page(
    'Inspecties',
    'Inspecties',
    'manage_options',
    'inspecties',
    'Inspecties\render_settings_page',
    'dashicons-admin-plugins'
  );
}

function render_settings_page() {
  echo "<h3>Inspecties Settings Page</h3>";
}

add_action('admin_menu', 'Inspecties\add_menu');