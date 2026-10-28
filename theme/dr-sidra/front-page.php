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
  <div class="wrap hero-inner">
    <p class="eyebrow">AMC MCQ Part 1</p>
    <h1>AMC MCQ 1 preparation with Dr. Sidra</h1>
    <p class="tagline">Focused. Structured. Concept-driven.</p>
    <p>Passing the AMC MCQ starts with clear clinical understanding. This academy is for international medical graduates who want high-yield teaching, Australian guidelines, and a way to think through a stem instead of memorising a list.</p>
    <p>Strong theory is what you take into the exam and into practice. Prepare with a plan, learn the decision, and keep the foundation after the result.</p>
    <div class="btn-row">
      <a class="btn" href="<?php echo esc_url(home_url('/courses/')); ?>">Explore Courses</a>
      <a class="btn btn-teal" href="<?php echo esc_url(dr_sidra_signup_url()); ?>">Become a Member</a>
    </div>
  </div>
</section>

<section class="section">
  <div class="wrap steps">
    <div>
      <h2>How to enrol</h2>
      <p class="lede">Join from the learning portal, or write to us with the documents below. Hide your AMC number and your date of birth.</p>
      <div class="enroll">
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
    </div>
    <div>
      <h2>At a glance</h2>
      <div class="stats">
        <?php foreach (dr_sidra_stats() as $stat) : ?>
          <div class="stat">
            <strong><?php echo esc_html($stat['value']); ?></strong>
            <span><?php echo esc_html($stat['label']); ?></span>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="wrap">
    <h2>Explore our courses</h2>
    <p class="lede">Subject modules, a full preparatory course, and an exam-week batch. Study happens in the learning portal after you become a member.</p>
    <div class="carousel" data-carousel>
      <div class="carousel-track">
        <?php foreach ($featured as $course) : ?>
          <article class="card">
            <div class="kicker"><?php echo esc_html($course['group_label']); ?></div>
            <h3><?php echo esc_html($course['title']); ?></h3>
            <p><?php echo esc_html($course['blurb']); ?></p>
            <a class="more" href="<?php echo esc_url(dr_sidra_course_url($course['lms_path'])); ?>">View in the portal</a>
          </article>
        <?php endforeach; ?>
      </div>
    </div>
    <p style="margin-top:1.4rem"><a class="btn btn-teal" href="<?php echo esc_url(home_url('/courses/')); ?>">View all courses</a></p>
  </div>
</section>

<section class="section" style="padding-top:0">
  <div class="wrap">
    <h2>What students say</h2>
    <p class="lede">These cards are samples. Real messages will replace them when students agree to be quoted.</p>
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
