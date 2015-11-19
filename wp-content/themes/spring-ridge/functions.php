<?php
// put custom code here

 /* start */
function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(/wp-content/uploads/2015/11/screenshot.png) !important; }
    </style>';
}
add_action('login_head', 'custom_login_logo');
/* end */
