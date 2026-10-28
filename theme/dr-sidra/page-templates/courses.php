<?php
/**
 * Template Name: All Courses
 */
get_header();
$groups = dr_sidra_course_groups();
$courses = dr_sidra_courses();
?>
<section class="page-hero">
  <div class="wrap">
    <p class="eyebrow" style="color:var(--teal)">Catalog</p>
    <h1>All courses</h1>
    <p class="lede">Choose the full AMC MCQ course, one subject, or the exam-week batch. Opening a course takes you to the learning portal.</p>
  </div>
</section>
<section class="section" style="padding-top:1rem">
  <div class="wrap">
    <?php foreach ($groups as $key => $label) : ?>
      <h2 class="group"><?php echo esc_html($label); ?></h2>
      <div class="cards">
        <?php foreach ($courses as $course) : ?>
          <?php if ($course['group'] !== $key) { continue; } ?>
          <article class="card">
            <div class="kicker"><?php echo esc_html($course['group_label']); ?></div>
            <h3><?php echo esc_html($course['title']); ?></h3>
            <p><?php echo esc_html($course['blurb']); ?></p>
            <a class="more" href="<?php echo esc_url(dr_sidra_course_url($course['lms_path'])); ?>">View in the portal</a>
          </article>
        <?php endforeach; ?>
      </div>
    <?php endforeach; ?>
  </div>
</section>
<?php
get_footer();
