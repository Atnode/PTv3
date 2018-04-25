$(document).ready(function() {
            // Fix slide up on focus
            $('.tips .back a,.tips .back button').on('focus', function() {
                $('.tip-content').removeClass('show-back');
                $(this).parent().parent().parent('.tip-content').addClass('show-back');
            });
            $('.tips .back a,.tips .back button').on('focusout', function() {
                $('.tip-content').removeClass('show-back');
            });
            $('.credits button').each(function() {
                $(this).popover({
                    html: true,
                    trigger: 'click',
                    placement:'top'
                });
                $(this).removeAttr('title');
            });
        });