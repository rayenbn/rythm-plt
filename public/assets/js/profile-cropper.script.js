$(document).ready(function(){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var $modal = $('#cover_image_modal');

    var image = document.getElementById('cover_image');

    var cropper;

    $('#cover-upload').change(function(event){
        var files = event.target.files;

        var done = function(url){
            image.src = url;
            $modal.modal('show');
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            // aspectRatio: 1,
            // viewMode: 3,
            // preview:'.preview'
            dragMode: 'move',
            background:false,
            cropBoxMovable: true,
            cropBoxResizable: false,
            data:{ //define cropbox size
                width: 1335,
                height: 300,
            },
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });

    $('#crop-cover-image').click(function(){
        canvas = cropper.getCroppedCanvas({
            width:1335,
            height:300
        });

        canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                console.log(base64data);
                $.ajax({
                    url:'profile/cover-image/save',
                    method:'PUT',
                    data:{image:base64data},
                    success:function(data)
                    {
                        $modal.modal('hide');
                        location.reload(); 
                    }
                });
            };
        });
    });


    // profile image
    var $profileModal = $('#profile_image_modal');

    var profileImage = document.getElementById('profile_image');

    var cropper;

    $('#profile-image-upload').change(function(event){
        var files = event.target.files;

        var done = function(url){
            profileImage.src = url;
            $profileModal.modal('show');
        };

        if(files && files.length > 0)
        {
            reader = new FileReader();
            reader.onload = function(event)
            {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $profileModal.on('shown.bs.modal', function() {
        cropper = new Cropper(profileImage, {
            aspectRatio: 1,
            // viewMode: 3,
            // preview:'.preview'
            dragMode: 'move',
            background:false,
            cropBoxMovable: true,
            cropBoxResizable: false,
            // data:{
            //     width: 1335,
            //     height: 300,
            // },
        });
    }).on('hidden.bs.modal', function(){
        cropper.destroy();
        cropper = null;
    });

    $('#crop-portfolio-image').click(function(){
    canvas = cropper.getCroppedCanvas({
        width:120,
        height:120
    });

    canvas.toBlob(function(blob){
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function(){
                var base64data = reader.result;
                console.log(base64data);
                $.ajax({
                    url:'profile/profile-image/save',
                    method:'PUT',
                    data:{image:base64data},
                    success:function(data)
                    {
                        $profileModal.modal('hide');
                        location.reload(); 
                    }
                });
            };
        });
    });
});