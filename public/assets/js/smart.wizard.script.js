$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    // Step show event
    $("#smartwizard").on("showStep", function (e, anchorObject, stepNumber, stepDirection, stepPosition) {
        //alert("You are on step "+stepNumber+" now");
        if (stepPosition === 'first') {
            $("#prev-btn").addClass('disabled');
        } else if (stepPosition === 'final') {
            $("#next-btn").addClass('disabled');
        } else {
            $("#prev-btn").removeClass('disabled');
            $("#next-btn").removeClass('disabled');
        }
    });

    // Toolbar extra buttons
    var btnFinish = $('<button></button>').text('Finish')
        .addClass('btn btn-info')
        .on('click', function (event) { 
            
            let id = $("#startup_wizard input[name='id']").val();
            let office_address = $("#startup_wizard input[name='office_address']").val();
            let country = $("#startup_wizard input[name='country']").val();
            let establishment_date = $("#startup_wizard input[name='establishment_date']").val();
            let project_level = $("#startup_wizard input[name='project_level']").val();
            let bio = $("#startup_wizard textarea[name='bio']").val();
            // alert(id);
            
            var Startup = {
                office_address: office_address,
                country: country,
                establishment_date: establishment_date,
                project_level: project_level,
                bio: bio,
                _method: 'PUT',
            };

            // alert(data);

            event.preventDefault();
            var form = $("#startup_form");
            var formData = new FormData(form[0]);
            // alert(formData);
            // var formData = new FormData(this);
            // formData.append('office_address', office_address);
            // formData.append('country', country);
            
            $.ajax({
                type: "POST",
                url: $(form).prop("action"),
                //dataType: 'json', //not sure but works for me without this
                data: formData,
                contentType: false, //this is requireded please see answers above
                processData: false,
                success:function(data)
                {
                 var html = '';
                 if(data.errors)
                 {
                    html = '<div class="alert alert-danger">';
                    for(var count = 0; count < data.errors.length; count++)
                    {
                    html += '<p>' + data.errors[count] + '</p>';
                    }
                    html += '</div>';
                 }
                 if(data.success)
                 {
                    //  console.log(data);
                    //  debugger;
                    location.href = "/startup/"+ data.startupSlug
                 }
                }
               })

        });

    var btnCancel = $('<button></button>').text('Cancel')
        .addClass('btn btn-danger')
        .on('click', function () { $('#smartwizard').smartWizard("reset"); });


    // Smart Wizard
    $('#smartwizard').smartWizard({
        selected: 0,
        theme: 'default',
        transitionEffect: 'fade',
        showStepURLhash: true,
        toolbarSettings: {
            toolbarPosition: 'bottom',// none, top, bottom, both
            toolbarButtonPosition: 'end',// left, right, center
            toolbarExtraButtons: [btnFinish] //btnFinish, btnCancel
        }
    });


     // External Button Events
    //  $("#reset-btn").on("click", function () {
    //     // Reset wizard
    //     $('#smartwizard').smartWizard("reset");
    //     return true;
    // });

    // External Button Events
    $("#reset-btn").on("click", function () {
        // Reset wizard
        $('#smartwizard').smartWizard("reset");
        return true;
    });

    $("#prev-btn").on("click", function () {
        // Navigate previous
        $('#smartwizard').smartWizard("prev");
        return true;
    });

    $("#next-btn").on("click", function () {
        // Navigate next
        $('#smartwizard').smartWizard("next");
        return true;
    });

    $("#theme_selector").on("change", function () {
        // Change theme
        $('#smartwizard').smartWizard("theme", $(this).val());
        return true;
    });

    // Set selected theme on page refresh
    $("#theme_selector").change();
});