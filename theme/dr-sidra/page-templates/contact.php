<?php
/**
 * Template Name: Contact
 */
get_header();
$contact = dr_sidra_contact();
?>
<section class="page-band">
  <div class="wrap">
    <h1>Contact</h1>
    <p class="lede">Questions about a module, a batch, or access after you join. The learning portal is where you sign in.</p>
  </div>
</section>
<section class="section" style="padding-top:0">
  <div class="wrap">
    <div class="contact-grid">
      <article class="contact-card">
        <h2>Email</h2>
        <?php if ($contact['email']) : ?>
          <p><a href="mailto:<?php echo esc_attr($contact['email']); ?>"><?php echo esc_html($contact['email']); ?></a></p>
        <?php else : ?>
          <p class="placeholder">Email address to be added.</p>
        <?php endif; ?>
      </article>
      <article class="contact-card">
        <h2>WhatsApp and Telegram</h2>
        <?php if ($contact['whatsapp']) : ?>
          <p>WhatsApp <?php echo esc_html($contact['whatsapp']); ?></p>
        <?php else : ?>
          <p class="placeholder">WhatsApp number to be added.</p>
        <?php endif; ?>
        <?php if ($contact['telegram']) : ?>
          <p>Telegram <?php echo esc_html($contact['telegram']); ?></p>
        <?php else : ?>
          <p class="placeholder">Telegram to be added.</p>
        <?php endif; ?>
      </article>
    </div>
    <h2 class="group">Questions</h2>
    <div class="faq">
      <?php foreach (dr_sidra_faqs() as $item) : ?>
        <details>
          <summary><?php echo esc_html($item['q']); ?></summary>
          <p><?php echo esc_html($item['a']); ?></p>
        </details>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
get_footer();
