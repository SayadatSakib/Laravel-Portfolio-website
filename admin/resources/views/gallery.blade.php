@extends('Layout.app')
@section('title','Gallery')
@section('content')
    <div class="container" id="mainDivPhoto">
        <div class="row mt-3">
                <button id="addPhotoBtnID" class="btn btn-default my-3">Add Photo</button>
        </div>
    </div>

    <div class="container" id="DivPhoto">
        <div class="row imgRow">

        </div>
        <button id="loadMoreBtn" class="btn btn-amber my-3">Load More</button>
    </div>



    {{--        Add Modal--}}
    <div class="modal fade" id="addPhotoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Photo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <input id="imgInputId" type="file" class="form-control">
                    <img id="imgPreview" class="imgSize mt-3" src="{{asset('images/default.jpg')}}" alt=" ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="addPhotoSaveBtn" type="button" class="btn  btn-sm  btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('script')
    <script type="text/javascript">
        // getGalleryData();
        $('#addPhotoBtnID').click( function (){
            $('#addPhotoModal').modal("show");
        })

        $('#imgInputId').change(function () {
            let reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload=function (event){
                let ImgSrc = event.target.result;
                $('#imgPreview').attr('src',ImgSrc);
            }

        })

        $('#addPhotoSaveBtn').click(function (){
            $('#addPhotoSaveBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
        })

        $('#addPhotoSaveBtn').click(function (){
            let $photoFile = $('#imgInputId').prop('files')[0];
            let formData = new FormData();
                formData.append('photo',$photoFile);

            axios.post("/photoUpload",formData).then(function (response){
                if(response.status==200){
                    if (response.data == 1) {
                        $('#addPhotoSaveBtn').html('Save');
                        toastr.success('Upload Success');
                        $('#addPhotoModal').modal('hide');
                        window.location.href="/gallery"
                    }else{
                        $('#addPhotoModal').modal('hide');
                        $('#addPhotoSaveBtn').html('Save');
                        toastr.success('Upload Failed');
                        window.location.href="/gallery"
                    }
                }else{
                    $('#addPhotoModal').modal('hide');
                    $('#addPhotoSaveBtn').html('Save');
                    toastr.success('Upload Failed');
                    window.location.href="/gallery"
                }
            }).catch(function (error){
                $('#addPhotoModal').modal('hide');
                $('#addPhotoSaveBtn').html('Save');
                toastr.success('Upload Failed');
                window.location.href="/gallery"
            })

        })

        loadPhoto();
        function loadPhoto(){
            axios.get('/imgJson').then(function (response) {
                let $jsonData= response.data;
                $.each($jsonData,function (i){
                    $("<div class='col-md-3 p-2'>").html(
                        "<img data-id="+$jsonData[i].id+" class='imgOnRow' src="+$jsonData[i].location+">"
                    ).appendTo('.imgRow');
                });
            }).catch(function (error){

            })
        }

        $('#loadMoreBtn').click(function (){
            let FirstImgID = $(this).closest('div').find('img').data('id');
            LoadByID(FirstImgID);
        })

        let imgID = 0;
        function LoadByID(FirstImgID){
            imgID = imgID+4;
            let loadMoreImgID = imgID+FirstImgID;
            let url = "/imgJsonByID/"+loadMoreImgID;
            $('#loadMoreBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.get(url).then(function (response) {
                $('#loadMoreBtn').html("Load More")

                let $jsonData= response.data;
                $.each($jsonData,function (i){
                    $("<div class='col-md-3 p-2'>").html(
                        "<img data-id="+$jsonData[i].id+" class='imgOnRow' src="+$jsonData[i].location+">"
                    ).appendTo('.imgRow');
                });


            }).catch(function (error){

            })
        }

    </script>
@endsection
