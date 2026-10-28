<?php
/**
 * Site footer.
 */
$contact = dr_sidra_contact();
?>
</main>
<footer class="site-footer">
  <div class="wrap footer-grid">
    <div>
      <strong>Dr. Sidra</strong>
      <p>AMC MCQ Part 1 preparation for international medical graduates.</p>
      <p>
        <?php if ($contact['email']) : ?>
          <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
        <?php else : ?>
          <span class="placeholder">Email to be added</span>
        <?php endif; ?>
        <br>
        <?php if ($contact['whatsapp']) : ?>
          WhatsApp <?php echo esc_html($contact['whatsapp']); ?>
        <?php else : ?>
          <span class="placeholder">WhatsApp to be added</span>
        <?php endif; ?>
      </p>
    </div>
    <div>
      <p>
        <a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms and Conditions</a><br>
        <a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy Policy</a><br>
        <a href="<?php echo esc_url(dr_sidra_portal_url()); ?>">Learning portal</a>
      </p>
      <p class="fine">All prices are in Australian dollars.</p>
    </div>
  </div>
  <div class="wrap">
    <p class="fine">© <?php echo esc_html(gmdate('Y')); ?> Dr. Sidra. All rights reserved.</p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
