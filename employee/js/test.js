jQuery(function(){
    jQuery('#dashboard').click(function(){
        jQuery('.target').show();
    });

    jQuery('.Single').click(function(){
        jQuery('.target').hide();
        jQuery('#div'+$(this).attr('target')).show();
    });
});