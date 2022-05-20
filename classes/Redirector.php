<?php

namespace redgreenbird;

class Redirector
{
    function __construct()
    {
        add_action('init', [$this, 'redirect_non_logged_users_to_specific_page']);
    }

    function redirect_non_logged_users_to_specific_page()
    {
        // Check if user is in backend
        if (\is_admin())
            return;

        // Check if user is logged in
        if (\is_user_logged_in())
            return;

        // Check if user is on login page
        if ($GLOBALS['pagenow'] === 'wp-login.php')
            return;

        // Redirect to specific page
        wp_redirect('https://redgreenbird.com/');
        exit;
    }
}
