if (window.location.href.search("Profile") != -1) {
    $(document).ready(function (e) {
        $('#imageUploadForm').on('submit',(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
    
            $.ajax({
                type:'POST',
                url: 'ImageAjax',
                data:formData,
                cache:false,
                contentType: false,
                processData: false,
                success:function(data){
                    console.log("success");
                    console.log(formData);
                    document.getElementById('imageContainer').innerHTML = data;
                },
                error: function(data){
                    console.log("error");
                    console.log(data);
                }
            });
        }));
    
        $("#fileToUpload").on("change", function() {
            $("#imageUploadForm").submit();
        });
    });




}

