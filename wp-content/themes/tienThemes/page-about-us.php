<?php get_header()
?>
<?php
$arg1 = [
    'term' => 'board_member',
    'title' => 'BOARD MEMBER'
];
$arg2 = [
    'term' => 'past-board_member',
    'title' => 'EDUGROWTH PAST BOARD MEMBERS'
];
$arg3 = [
    'term' => 'advisory_member',
    'title' => 'EDUGROWTH ADVISORY COUNCIL'
];
?>
<div id="content">
    <?php get_template_part('template-parts/banner'); ?>
    <?php get_template_part('template-parts/technology'); ?>
    <?php get_template_part('template-parts/history'); ?>

    <?php get_template_part('template-parts/members_list', 'members_list', $arg1); ?>
    <?php get_template_part('template-parts/members_list', 'members_list', $arg2); ?>
    <?php get_template_part('template-parts/members_list', 'members_list', $arg3); ?>
</div>

<?php get_footer() ?>