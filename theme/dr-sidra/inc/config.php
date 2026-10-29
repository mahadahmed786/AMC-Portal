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
        array('value' => '1', 'label' => 'Course prepared'),
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
            'slug' => 'amc-mcq-part-1',
            'title' => 'AMC MCQ Part 1',
            'group' => 'part-1',
            'group_label' => 'Part 1 course',
            'blurb' => 'A guided first pass through the AMC MCQ Part 1: how the paper is built, how to read a stem, 12 original practice questions, and a written case.',
            'featured' => true,
            'image' => 'course-amc.jpg',
            'image_alt' => 'A stethoscope beside an open laptop',
            'lms_path' => '/lms/courses/amc-mcq-part-1',
        ),
    );
}

function dr_sidra_course_groups() {
    return array(
        'part-1' => 'AMC MCQ Part 1',
    );
}

function dr_sidra_faqs() {
    return array(
        array(
            'q' => 'What does Dr. Sidra teach?',
            'a' => 'Preparation for the AMC MCQ Part 1. The course includes an overview, study notes, practice questions, and a written case.',
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
            'a' => 'This course is open for self-enrolment while the price is being set. When a fee applies, you pay inside the learning portal in Australian dollars. This website does not take card payments.',
        ),
        array(
            'q' => 'Can I study from outside Australia?',
            'a' => 'Yes. Lessons are online, so you can study from outside Australia.',
        ),
    );
}
