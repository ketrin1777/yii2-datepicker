$(document).ready(function() {

    $('.date_time_pick_wrap').each(function(index, element) {
        var objWrap = $(this);

        objWrap.find('.outDateTime').on('change', function() {
            let datetime = $(this).val();
            let arr = new Date(datetime);
            let timestamp = arr.getTime() / 1000;
            if (timestamp > 0) {
                // console.log(timestamp);
                objWrap.find('.inputTime').val(timestamp);
            }
        });

        objWrap.find('.outDateTime').keyup(function(e) {

            let datetime = objWrap.find('.outDateTime').val();
            let arr = new Date(datetime);
            let timestamp = arr.getTime() / 1000;

            if (timestamp > 0) {
                // console.log(timestamp);
                objWrap.find('.inputTime').val(timestamp);
            }

        });

    });


});