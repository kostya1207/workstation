/* ------------------------------------------------------------------------------
*
*  # Form validation
*
*  Demo JS code for form_validation.html page
*
* ---------------------------------------------------------------------------- */

document.addEventListener('DOMContentLoaded', function() {


    // Form components
    // ------------------------------

    // Switchery toggles
    var elems = Array.prototype.slice.call(document.querySelectorAll('.switchery'));
    elems.forEach(function(html) {
        var switchery = new Switchery(html);
    });


    // Touchspin
    $(".touchspin-postfix").TouchSpin({
        min: 0,
        max: 100,
        step: 0.1,
        decimals: 2,
        postfix: '%'
    });


    // Styled checkboxes, radios
    $(".styled").uniform();


    // Styled file input
    $(".file-styled").uniform({
        fileButtonClass: 'action btn bg-blue'
    });


    // Bootstrap Switch
    $(".switch").bootstrapSwitch({
        onSwitchChange: function(state) {
            if(state) {
                $(this).valid(true);
            }
            else {
                $(this).valid(false);
            }
        }
    });


    //
    // Select2 select
    //

    // Initialize
    var $select = $('.select').select2({
        minimumResultsForSearch: Infinity
    });
    
    // Trigger value change when selection is made
    $select.on('change', function() {
        $(this).trigger('blur');
    });



    // Setup validation
    // ------------------------------

    // Initialize
    var validator = $(".form-validate-jquery").validate({
        ignore: 'input[type=hidden], .select2-search__field', // ignore hidden fields
        errorClass: 'validation-error-label',
        successClass: 'validation-valid-label',
        highlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },
        unhighlight: function(element, errorClass) {
            $(element).removeClass(errorClass);
        },

        // Different components require proper error label placement
        errorPlacement: function(error, element) {

            // Styled checkboxes, radios, bootstrap switch
            if (element.parents('div').hasClass("checker") || element.parents('div').hasClass("choice") || element.parent().hasClass('bootstrap-switch-container') ) {
                if(element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                    error.appendTo( element.parent().parent().parent().parent() );
                }
                 else {
                    error.appendTo( element.parent().parent().parent().parent().parent() );
                }
            }

            // Unstyled checkboxes, radios
            else if (element.parents('div').hasClass('checkbox') || element.parents('div').hasClass('radio')) {
                error.appendTo( element.parent().parent().parent() );
            }

            // Input with icons and Select2
            else if (element.parents('div').hasClass('has-feedback') || element.hasClass('select2-hidden-accessible')) {
                error.appendTo( element.parent() );
            }

            // Inline checkboxes, radios
            else if (element.parents('label').hasClass('checkbox-inline') || element.parents('label').hasClass('radio-inline')) {
                error.appendTo( element.parent().parent() );
            }

            // Input group, styled file input
            else if (element.parent().hasClass('uploader') || element.parents().hasClass('input-group')) {
                error.appendTo( element.parent().parent() );
            }

            else {
                error.insertAfter(element);
            }
        },
        validClass: "validation-valid-label",
        success: function(label) {
            label.addClass("validation-valid-label").text("Success.")
        },
        rules: {
            password: {
                minlength: 5
            },
            repeat_password: {
                equalTo: "#password"
            },
            email: {
                email: true
            },
            repeat_email: {
                equalTo: "#email"
            },
            age: {
                range: [0, 99]
            },
            phone_no: {
                number: true
            }/*,
            country_code: {
                number: true
            }*/
        },
        messages: {
            username: {
                required: 'Enter your username'
            },
            email: {
                required: 'Enter your email'
            },
            password: {
                required: 'Enter your password'
            },
            country_code: {
                required: 'Please input'
            },
            phone_no: {
                required: 'Please input'
            },
            age: {
                required: 'Enter your age'
            }
        }
    });

    // Reset form
    $('#reset').on('click', function() {
        validator.resetForm();
    });

});
