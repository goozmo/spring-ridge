jQuery(function($) {


    (function () {

        var $donateButton     = $('.dntp-donate-button');
        var $donationModal    = $('#dntp-donation-modal');
        var $closeModalButton = $('.dntp-close-donation-modal');
        var $donateForm       = $('#dgx-donate-form');

        $donateButton.on('click', function(e) {
            e.preventDefault();

            var $this                  = $(this);
            var $givingLevel           = $this.parents('.scp_widget_single_cause').find('input[name=_dgx_donate_amount]:checked').val();
            var $correspondingCheckbox = $donateForm.find('input[name=_dgx_donate_amount][value=' + $givingLevel + ']');
            $correspondingCheckbox.prop('checked', true);

            $donationModal.removeClass('hidden');
        });
        $closeModalButton.on('click', function(e) {
            e.preventDefault();
            $donationModal.addClass('hidden');
        });

    })();


});
