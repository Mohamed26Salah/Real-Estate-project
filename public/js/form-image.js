if (window.location.href.search("Profile") != -1) {
    $(document).ready(function (e) {

        let input = document.getElementById("inputTag");
        let imageName = document.getElementById("imageName")
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

            let inputImage = document.querySelector("input[type=file]").files[0];
            if(inputImage==null) {
                
            }
            else {
                $("#imageUploadForm").submit();
                imageName.innerText = inputImage.name;
            }
            
            

           
        });
    });




}

