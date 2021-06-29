$(function () {
    "use strict";

    var numberInput = function () {
            $('.numberOnly').toArray().forEach(function (field) {
                new Cleave(field, {
                    numeral: true,
                    numeralThousandsGroupStyle: 'thousand',
                    numeralDecimalScale: 2
                });
            });
        },
        integerInput = function () {
            $('.integerOnly').toArray().forEach(function (field) {
                new Cleave(field, {
                    numeral: true,
                    delimiter: "",
                    numeralThousandsGroupStyle: "thousand",
                    onlyPositive: true
                });
            });
        };

    $(document).on('click', '.save_and_back', function (e) {
        var form = $(this).closest('form')
        form.find('input[name="back"]').val(1)
        form.find('.btn_save_form').trigger('click')
    });

    numberInput();
    integerInput();
});

function openCity(evt, cityName) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].className = tabcontent[i].className.replace(" active", "");
        console.log('22')
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(cityName).className += " active";
    evt.currentTarget.className += " active";
}

// CKEDITOR.config.pasteFromWordRemoveFontStyles = true;

function sendRequest(id,url_update_status){
    $.ajax({
        url:url_update_status,
        method:'post',
        data:{id:id},
        success:function(data){
            swal('Thành công!', 'Cập nhật danh mục thành công', 'success');
        },
        error:function(jqXhr,status,error){
            swal('Thất bại!', 'Có lỗi xảy ra! Vui lòng thử lại sau', 'warning');
        }
    });
}

function validate(evt) {
    var theEvent = evt || window.event;

    // Handle paste
    if (theEvent.type === 'paste') {
        key = event.clipboardData.getData('text/plain');
    } else {
        // Handle key press
        var key = theEvent.keyCode || theEvent.which;
        key = String.fromCharCode(key);
    }
    var regex = /[0-9]|\./;
    if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
    }
}