<?php
/**
 * Home page.
 */
get_header();
$featured = array_values(array_filter(dr_sidra_courses(), function ($course) {
    return !empty($course['featured']);
}));
?>
<section class="hero">
  <div class="hero-bg" role="img" aria-label="A stethoscope on a pale surface"></div>
  <div class="wrap hero-copy">
    <p class="eyebrow">AMC MCQ Part 1</p>
    <h1>AMC MCQ 1 preparation with Dr. Sidra</h1>
    <p class="tagline">Focused. Structured. Concept-driven.</p>
    <p>Passing the AMC MCQ starts with clear clinical understanding. This academy is for international medical graduates who want high-yield teaching, Australian guidelines, and a way to think through a stem instead of memorising a list.</p>
    <div class="btn-row">
      <a class="btn btn-teal" href="<?php echo esc_url(home_url('/courses/')); ?>">Explore Courses</a>
      <a class="btn btn-line" href="<?php echo esc_url(dr_sidra_signup_url()); ?>">Become a Member</a>
    </div>
    <p class="quiet">The AMC MCQ Part 1 course opens in the learning portal.</p>
  </div>
</section>

<section class="section">
  <div class="wrap enroll-grid">
    <div class="enroll">
      <h2>How to enrol</h2>
      <p class="lede">Join from the learning portal, or write to us with the documents below. Hide your AMC number and your date of birth.</p>
      <ol>
        <li>AMC placement letter, with your AMC number hidden.</li>
        <li>Proof of identity, with your date of birth hidden.</li>
      </ol>
      <?php $contact = dr_sidra_contact(); ?>
      <?php if ($contact['email'] || $contact['whatsapp']) : ?>
        <p>
          <?php if ($contact['email']) : ?>
            Email <?php echo esc_html($contact['email']); ?>.
          <?php endif; ?>
          <?php if ($contact['whatsapp']) : ?>
            WhatsApp <?php echo esc_html($contact['whatsapp']); ?>.
          <?php endif; ?>
        </p>
      <?php else : ?>
        <p class="placeholder">Email and WhatsApp will be listed here. Until then, use Become a Member to open the learning portal.</p>
      <?php endif; ?>
    </div>
    <div class="panel">
      <h2>Where study happens</h2>
      <p class="lede">Accounts, lessons, and batches live in the learning portal. This site is the public catalog.</p>
      <div class="btn-row">
        <a class="btn btn-teal" href="<?php echo esc_url(dr_sidra_signup_url()); ?>">Become a Member</a>
        <a class="btn btn-line" href="<?php echo esc_url(dr_sidra_portal_url()); ?>">My Courses</a>
      </div>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h2>Explore our courses</h2>
        <p class="lede">AMC MCQ Part 1, with the overview, notes, practice questions, and written case. Study happens in the learning portal after you become a member.</p>
      </div>
      <a class="btn btn-teal" href="<?php echo esc_url(home_url('/courses/')); ?>">View all courses</a>
    </div>
    <div class="cards">
      <?php foreach ($featured as $course) : ?>
        <article class="card">
          <?php if (!empty($course['image'])) : ?>
            <img class="card-photo" src="<?php echo esc_url(get_template_directory_uri() . '/assets/' . $course['image']); ?>" alt="<?php echo esc_attr($course['image_alt']); ?>">
          <?php endif; ?>
          <div class="card-body">
          <div class="kicker"><?php echo esc_html($course['group_label']); ?></div>
          <h3><?php echo esc_html($course['title']); ?></h3>
          <p><?php echo esc_html($course['blurb']); ?></p>
          <a class="more" href="<?php echo esc_url(dr_sidra_course_url($course['lms_path'])); ?>">View in the portal</a>
          </div>
        </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="wrap">
    <div class="section-head">
      <div>
        <h2>What students say</h2>
        <p class="lede">These cards are samples. Real messages will replace them when students agree to be quoted.</p>
      </div>
    </div>
    <div class="quotes">
      <?php foreach (dr_sidra_quotes() as $quote) : ?>
        <blockquote class="quote">
          <span class="sample-flag">Sample</span>
          <p><?php echo esc_html($quote['quote']); ?></p>
          <footer><?php echo esc_html($quote['name']); ?> · <?php echo esc_html($quote['date']); ?></footer>
        </blockquote>
      <?php endforeach; ?>
    </div>
  </div>
</section>
<?php
get_footer();
