<?php
/**
 * Site header.
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main">Skip to content</a>
<header class="site-header">
  <div class="header-inner">
    <a class="brand" href="<?php echo esc_url(home_url('/')); ?>">
      <span class="brand-mark" aria-hidden="true">S</span>
      <span>Dr. Sidra</span>
    </a>
    <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
    <nav id="site-nav" class="site-nav" aria-label="Primary">
      <a href="<?php echo esc_url(home_url('/')); ?>"<?php echo dr_sidra_nav_current('/'); ?>>Home</a>
      <a href="<?php echo esc_url(home_url('/contact/')); ?>"<?php echo dr_sidra_nav_current('contact'); ?>>Contact</a>
      <a href="<?php echo esc_url(home_url('/courses/')); ?>"<?php echo dr_sidra_nav_current('courses'); ?>>All Courses</a>
      <a href="<?php echo esc_url(dr_sidra_login_url()); ?>">Member Login</a>
      <a class="nav-cta" href="<?php echo esc_url(dr_sidra_signup_url()); ?>">Become a Member</a>
      <a href="<?php echo esc_url(dr_sidra_portal_url()); ?>">My Subscribed Courses</a>
    </nav>
  </div>
</header>
<main id="main">
