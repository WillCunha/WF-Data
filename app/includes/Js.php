<?php


namespace App\Includes;

class JS
{

    public function files()
    {

        wp_register_script("ajax-cookie", plugins_url('wfdata/app/src/js/cookie-script.js'), array('jquery'));

        wp_register_script("heatmap-min", plugins_url('wfdata/app/src/js/heatmap.min.js'), array('jquery'));

        wp_register_script("check-heatmap", plugins_url('wfdata/app/src/js/check-heatmap.js'), array('jquery'));

        wp_register_script("ajax-heatmap", plugins_url('wfdata/app/src/js/heatmap-user.js'), array('jquery'));
        
        wp_localize_script('ajax-cookie', 'myAjax', array('ajaxurl' => admin_url('admin-ajax.php')));

        wp_enqueue_script('ajax-cookie');
        
        wp_enqueue_script('heatmap-min');

        wp_enqueue_script('check-heatmap');

        wp_enqueue_script('ajax-heatmap');

        wp_enqueue_script('wfdata-js', plugins_url('../src/js/cookie-script.js', __FILE__));

        wp_enqueue_script('wfdata-js', plugins_url('../src/js/heatmap.min.js', __FILE__));

        wp_enqueue_script('wfdata-js', plugins_url('../src/js/heatmap-user.js', __FILE__));

        wp_enqueue_script('cookies', plugins_url('../src/js/jquery.cookie.js', __FILE__));
    }
}
