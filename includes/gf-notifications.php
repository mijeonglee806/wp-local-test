<?php

function mag_admin_notification_template()
{
  ob_start();
  get_template_part('/includes/gf-notifications/admin');
  return ob_get_clean();
}

function mag_visitor_notification_template($message)
{
  ob_start();
  include(locate_template('includes/gf-notifications/auto-responder.php', false, false));
  return ob_get_clean();
}

// Append header to all emails
add_filter('gform_notification', 'mag_form_notification_email', 10, 3);

function mag_form_notification_email($notification, $form, $entry)
{
  $notification['message_format'] = 'html';
  $notification['disableAutoformat'] = true;
  if ($notification['name'] == 'Admin Notification') {
    $notification['message'] = mag_admin_notification_template();
  } else {
    $notification['message'] = mag_visitor_notification_template($notification['message']);
  }
  return $notification;
}
