(function($) {
    $(document).ready(function() {
        edgtfTwitterRequestToken();
    });

    function edgtfTwitterRequestToken() {
        if($('#edgtf-tw-request-token-btn').length) {
            $('#edgtf-tw-request-token-btn').click(function(e) {
                e.preventDefault();

                var that = $(this);
                var currentPageUrl = $('input[data-name="current-page-url"]').val();

                console.log(currentPageUrl);

                //@TODO get this from data attr
                $(this).text('Working...');

                var data = {
                    action: 'edgt_twitter_obtain_request_token',
                    currentPageUrl: currentPageUrl
                }

                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        if(typeof response.status !== 'undefined' && response.status) {
                            $(that).text('Redirect to Twitter...');

                            if(typeof response.redirectURL !== 'undefined' && response.redirectURL !== '') {
                                window.location = response.redirectURL;
                            }
                        } else {
                            alert(response.message);
                        }
                    }
                });
            });
        }
    }
})(jQuery)
