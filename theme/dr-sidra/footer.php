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
      <span class="footer-brand">Dr. Sidra</span>
      <p>AMC MCQ Part 1 preparation for international medical graduates.</p>
      <p>
        <?php if ($contact['email']) : ?>
          <a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a>
        <?php else : ?>
          Email to be added
        <?php endif; ?>
        <br>
        <?php if ($contact['whatsapp']) : ?>
          WhatsApp <?php echo esc_html($contact['whatsapp']); ?>
        <?php else : ?>
          WhatsApp to be added
        <?php endif; ?>
      </p>
    </div>
    <div>
      <p class="footer-label">Study</p>
      <p><a href="<?php echo esc_url(home_url('/courses/')); ?>">All courses</a></p>
      <p><a href="<?php echo esc_url(dr_sidra_login_url()); ?>">Member login</a></p>
      <p><a href="<?php echo esc_url(dr_sidra_portal_url()); ?>">Learning portal</a></p>
    </div>
    <div>
      <p class="footer-label">Academy</p>
      <p><a href="<?php echo esc_url(home_url('/contact/')); ?>">Contact</a></p>
      <p><a href="<?php echo esc_url(home_url('/terms/')); ?>">Terms and Conditions</a></p>
      <p><a href="<?php echo esc_url(home_url('/privacy/')); ?>">Privacy Policy</a></p>
      <p class="fine" style="margin-top:1rem">All prices are in Australian dollars.</p>
    </div>
  </div>
  <div class="wrap">
    <p class="fine">© <?php echo esc_html(gmdate('Y')); ?> Dr. Sidra. All rights reserved. Photographs by Markus Frieauff and Daniel Sone for the National Cancer Institute, on Unsplash.</p>
  </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
