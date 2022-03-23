(function($) {

  $('#TypeOfEstate').parent().append('<ul class="list-item" id="newTypeOfEstate" name="TypeOfEstate"></ul>');
  $('#TypeOfEstate option').each(function(){
      $('#newTypeOfEstate').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
  });
  $('#TypeOfEstate').remove();
  $('#newTypeOfEstate').attr('id', 'TypeOfEstate');
  $('#TypeOfEstate li').first().addClass('init');
  $("#TypeOfEstate").on("click", ".init", function() {
      $(this).closest("#TypeOfEstate").children('li:not(.init)').toggle();
  });
  
  var allOptions = $("#TypeOfEstate").children('li:not(.init)');
  $("#TypeOfEstate").on("click", "li:not(.init)", function() {
      allOptions.removeClass('selected');
      $(this).addClass('selected');
      $("#TypeOfEstate").children('.init').html($(this).html());
      allOptions.toggle();
  });

  var marginSlider = document.getElementById('slider-margin');
  if (marginSlider != undefined) {
      noUiSlider.create(marginSlider, {
            start: [500],
            step: 10,
            connect: [true, false],
            tooltips: [true],
            range: {
                'min': 0,
                'max': 1000
            },
            format: wNumb({
                decimals: 0,
                thousand: ',',
                prefix: '$ ',
            })
    });
  }
  $('#reset').on('click', function(){
      $('#register-form').reset();
  });

  $('#register-form').validate({
    rules : {
        AddressUser : {
            required: true,
        },
        AddressAdmin : {
            required: true,
        },
        Area : {
            required: true,
        },
        Price : {
            required: true,
        },
        PaymentMethod : {
            required: true
        },
        Owner : {
            required: true,
            email : true
        },
        OwnerNumber : {
            required: true,
        }
        DescriptionUser : {
            required: true,
        }
        DescriptionAdmin : {
            required: true,
        }
        name : {
            required: true,
            email : true
        },
        Priority : {
            required: true,
        }
    },
    onfocusout: function(element) {
        $(element).valid();
    },
});

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });
})(jQuery);