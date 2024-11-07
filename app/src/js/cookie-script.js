jQuery(document).ready(function (event) {
    
    var cookie = jQuery.cookie('wfdata')
    var pathname = jQuery(location).attr("pathname");
    
    if (jQuery.cookie('wfdata') == null) {
        $i = 0;
        if ($i == 0) {
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: myAjax.ajaxurl,
                data: { action: 'cookie', cookie: "NULL" },
                success: function (response) {
                    $i++;
                    if (response.type == 'success') {
                    } else {
                    }
                }
            })
        }
    } else {
        var id = JSON.parse(cookie);
        $i = 0;
        if ($i == 0) {
            jQuery.ajax({
                type: 'POST',
                dataType: 'json',
                url: myAjax.ajaxurl,
                data: { action: 'cookie', cookie: id.id, pageName: pathname },
                encode: true,
                success: function (res) {
                    $i++;
                }
            }).done(function () {
            })
        }
    }




    function updateDateTime() {
        // var cookie = jQuery.cookie('wfdata')
        var id = JSON.parse(cookie);
        var pathname = jQuery(location).attr("pathname");
        console.log({ action: 'dateTime', cookie: id.id, pageName: pathname })
        jQuery.ajax({
            type: 'POST',
            dataType: 'json',
            url: myAjax.ajaxurl,
            data: { action: 'dateTime', cookie: id.id, pageName: pathname },
            encode: true,
            success: function (res) {
          //      console.log(res);
            }
        }).done(function () {
        })
    }

    setInterval(() => {
        updateDateTime();
    }, 9000);




});