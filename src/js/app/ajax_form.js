$(document).ready(function() {

        $('#contactform').submit(function(event) {
            event.preventDefault();

            var contactform = $('#contactform');
            var formresult = $('#formresult');
            var formdata = $(contactform).serialize();

            $.ajax({
                type: 'POST',
                url: $(contactform).attr('action'),
                data: formdata,

                beforeSend: function() {
                    $(formresult).removeClass();
                    $(formresult).addClass('alert alert-info');
                    $(formresult).html("<span class='glyphicon glyphicon-refresh gly-spin' aria-hidden='true'></span>");
                },
                success:function(response) {
                    $(formresult).removeClass();
                    $(formresult).addClass('alert alert-success');
                    $(formresult).html(response);
                },
                error:function(data) {
                    $(formresult).removeClass();
                    $(formresult).addClass('alert alert-warning');
                    $(formresult).html(data.responseText);
                }
            });

        });


    });