<?php
/**
 * Site content and LMS links.
 *
 * Edit course titles, blurbs, and lms_path here. Member Login, Become a
 * Member, and My Subscribed Courses all use dr_sidra_lms_base().
 */

if (!defined('ABSPATH')) {
    exit;
}

function dr_sidra_lms_base() {
    return 'http://179.197.250.131';
}

function dr_sidra_login_url() {
    return dr_sidra_lms_base() . '/login?redirect-to=/lms';
}

function dr_sidra_signup_url() {
    return dr_sidra_lms_base() . '/login';
}

function dr_sidra_portal_url() {
    return dr_sidra_lms_base() . '/lms';
}

function dr_sidra_course_url($path) {
    if (!$path) {
        return dr_sidra_portal_url();
    }
    if (strpos($path, 'http') === 0) {
        return $path;
    }
    return dr_sidra_lms_base() . $path;
}

function dr_sidra_contact() {
    return array(
        'email' => '',
        'whatsapp' => '',
        'telegram' => '',
        'instagram' => '',
    );
}

function dr_sidra_stats() {
    return array(
        array('value' => '9', 'label' => 'Courses prepared'),
        array('value' => '7', 'label' => 'Subject modules'),
        array('value' => '1', 'label' => 'Exam-week batch'),
        array('value' => 'AUD', 'label' => 'Prices in Australian dollars'),
    );
}

function dr_sidra_quotes() {
    return array(
        array(
            'quote' => 'Sample story. Replace this with a real message from a doctor who prepared with Dr. Sidra.',
            'name' => 'Sample student',
            'date' => 'Placeholder',
        ),
        array(
            'quote' => 'Sample story. A short note about structured theory, guidelines, and exam-week revision can go here.',
            'name' => 'Sample student',
            'date' => 'Placeholder',
        ),
        array(
            'quote' => 'Sample story. Keep the student’s own words once you have permission to publish them.',
            'name' => 'Sample student',
            'date' => 'Placeholder',
        ),
    );
}

function dr_sidra_courses() {
    return array(
        array(
            'slug' => 'amc-mcq-all-in-one',
            'title' => 'AMC MCQ All-in-One Preparatory Course',
            'group' => 'all-in-one',
            'group_label' => 'All-in-one',
            'blurb' => 'A full path through the AMC MCQ Part 1 syllabus, taught as connected clinical ideas rather than isolated facts.',
            'featured' => true,
            'lms_path' => '/lms/courses/amc-mcq-all-in-one-preparatory-course',
        ),
        array(
            'slug' => 'adult-health-medicine',
            'title' => 'Adult Health Medicine',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Cardiology, respiratory, endocrine, renal, and the other adult medicine topics the MCQ expects you to reason through.',
            'featured' => true,
            'lms_path' => '/lms/courses/adult-health-medicine',
        ),
        array(
            'slug' => 'surgery',
            'title' => 'Surgery',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'General surgery, acute abdomen, trauma, and the next safe step in surgical scenarios.',
            'featured' => true,
            'lms_path' => '/lms/courses/surgery',
        ),
        array(
            'slug' => 'womens-health',
            'title' => "Women's Health",
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Obstetrics and gynaecology framed around Australian guidelines and exam-style decisions.',
            'featured' => false,
            'lms_path' => '/lms/courses/women-s-health',
        ),
        array(
            'slug' => 'mental-health',
            'title' => 'Mental Health',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Psychiatry for the AMC MCQ: diagnosis, risk, and management that matches Australian practice.',
            'featured' => false,
            'lms_path' => '/lms/courses/mental-health',
        ),
        array(
            'slug' => 'population-health',
            'title' => 'Population Health, Biostatistics and Ethics',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Screening, study design, ethics, and the public-health questions that sit beside the clinical stems.',
            'featured' => false,
            'lms_path' => '/lms/courses/population-health-biostatistics-and-ethics',
        ),
        array(
            'slug' => 'emergency-medicine',
            'title' => 'Emergency Medicine',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Resuscitation, acute presentations, and how to choose the safest immediate action.',
            'featured' => true,
            'lms_path' => '/lms/courses/emergency-medicine',
        ),
        array(
            'slug' => 'pediatrics',
            'title' => 'Pediatrics',
            'group' => 'subject',
            'group_label' => 'Subject module',
            'blurb' => 'Common childhood illness, development, and the decisions the AMC tests in paediatric stems.',
            'featured' => false,
            'lms_path' => '/lms/courses/pediatrics',
        ),
        array(
            'slug' => 'exam-week',
            'title' => 'Exam-week high-yield sessions',
            'group' => 'exam-week',
            'group_label' => 'Exam week',
            'blurb' => 'A short batch of live revision before an exam sitting. Recordings and notes follow the session.',
            'featured' => true,
            'lms_path' => '/lms/batches/exam-week-high-yield-sessions',
        ),
    );
}

function dr_sidra_course_groups() {
    return array(
        'all-in-one' => 'All-in-one course',
        'subject' => 'Subject modules',
        'exam-week' => 'Exam week',
    );
}

function dr_sidra_faqs() {
    return array(
        array(
            'q' => 'What does Dr. Sidra teach?',
            'a' => 'Preparation for the AMC MCQ Part 1. You can take the all-in-one course, a single subject module, or the exam-week batch.',
        ),
        array(
            'q' => 'How do I enrol?',
            'a' => 'Create an account with Become a Member. That opens the learning portal, where you can join a published course. You can also write with your AMC placement letter and a photo ID. Hide your AMC number and your date of birth.',
        ),
        array(
            'q' => 'Where do I sign in?',
            'a' => 'Member Login and My Subscribed Courses both open the learning portal. Your account lives there, not on this public site.',
        ),
        array(
            'q' => 'How do I pay?',
            'a' => 'These starter courses are open for self-enrolment while prices are being set. When a fee applies, you pay inside the learning portal in Australian dollars. This website does not take card payments.',
        ),
        array(
            'q' => 'Can I study from outside Australia?',
            'a' => 'Yes. Lessons are online. Live exam-week sessions are scheduled in the batch, with recordings afterwards.',
        ),
    );
}
