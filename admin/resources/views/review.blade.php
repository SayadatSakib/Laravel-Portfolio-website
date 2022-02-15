@extends('Layout.app')
@section('title','Review')
@section('content')
    <div class="container d-none" id="reviewMainDiv">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="reviewAddBtnID" class="btn btn-default my-3">Add Review</button>
                <table id="reviewDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>

                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="review_table">

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="container" id="reviewLoadingDiv">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
            </div>
        </div>
    </div>

    <div class="container d-none" id="reviewWrongDiv">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h3>Something Went Wrong!!!</h3>
            </div>
        </div>
    </div>

    {{--        Delete Modal--}}
    <div class="modal fade" id="reviewDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                    <h5 class="mt-4">Do you want to delete?</h5>
                    <h6 id="reviewDeleteId" class="mt-4 d-none" > </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button  id="reviewDeleteBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Edit Modal--}}
    <div class="modal fade" id="reviewEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-5">
                    <h6 id="reviewEditId" class="mt-4 d-none" > </h6>
                    <div id="reviewEditForm" class="w-100 d-none">
                        <input type="text" id="reviewNameID" class="form-control mb-4 " placeholder=" Review Name ">
                        <input type="text" id="reviewDescID" class="form-control mb-4" placeholder="Review Description">
                        <input type="text" id="reviewImgID" class="form-control mb-4" placeholder="Review Image Link">

                    </div>

                    <img id="reviewEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                    <h6 id="reviewEditWrong" class="d-none">Something Went Wrong!!!</h6>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="reviewEditBtn" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Add Modal--}}
    <div class="modal fade" id="reviewAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-5">
                    <div id="reviewAddForm" class="w-100 ">
                        <input type="text" id="reviewNameAddID" class="form-control mb-4 " placeholder=" Review Name ">
                        <input type="text" id="reviewDescAddID" class="form-control mb-4" placeholder="Review Description">
                        <input type="text" id="reviewImgAddID" class="form-control mb-4" placeholder="Review Image Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button  id="ReviewAddNewBtnID" type="button" class="btn btn-sm btn-success">ADD New</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        getReviewData()

        function getReviewData(){
            axios.get('/getReviewData').then(function (response){

                if(response.status==200){
                    $('#reviewMainDiv').removeClass('d-none');
                    $('#reviewLoadingDiv').addClass('d-none');
                    $('#reviewDataTable').DataTable().destroy();
                    $('#review_table').empty();

                    let $jsonData = response.data;
                    $.each($jsonData,function (i){
                        $('<tr>').html(
                            "<td> " + $jsonData[i].name +"  </td>"+
                            "<td> " + $jsonData[i].des +"  </td>"+
                            "<td>  <a class='reviewEditBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-edit icon-placing'></i> </a> </td>"+
                            "<td>  <a class='reviewDeleteBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-trash-alt icon-placing'></i> </a> </td>"
                        ).appendTo('#review_table');
                    });

                    // Review Table Delete Icon click
                    $('.reviewDeleteBtn').click(function (){
                        let id=$(this).data('id');
                        $('#reviewDeleteId').html(id);
                        $('#reviewDeleteModal').modal('show');
                    })

                    //Reviews Table Edit Icon click
                    $('.reviewEditBtn').click(function (){
                        let id=$(this).data('id');
                        $('#reviewEditId').html(id);
                        ReviewEditDetails(id);
                        $('#reviewEditModal').modal('show');
                    })

                    // Add Review Button Click
                    $('#reviewAddBtnID').click(function (){
                        $('#reviewAddModal').modal("show")
                    });

                    // Data Table
                    $('#reviewDataTable').DataTable({"order": false});
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#reviewLoadingDiv').addClass('d-none');
                    $('#reviewWrongDiv').removeClass('d-none');
                }
            }).catch(function (error){
                $('#reviewLoadingDiv').addClass('d-none');
                $('#reviewWrongDiv').removeClass('d-none');
            });
        }

        //Review Delete Modal Yes button
        $('#reviewDeleteBtn').click(function (){
            let id=$('#reviewDeleteId').html();
            ReviewDelete(id);
        })

        // Review Delete
        function ReviewDelete(deleteID){
            $('#reviewDeleteBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.post('/reviewDelete',{id:deleteID}).then(function (response){
                $('#reviewDeleteBtn').html("Yes")
                if(response.status==200){
                    if(response.data==1){
                        $('#reviewDeleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getReviewData()
                    }
                    else {
                        $('#reviewDeleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getReviewData()

                    }
                }else{
                    $('#reviewDeleteModal').modal('hide');
                    toastr.error('Something Went Wrong!!!');
                    getReviewData()
                }
            }).catch(function (error){
                $('#reviewDeleteModal').modal('hide');
                toastr.error('Something Went Wrong!!!');
                getReviewData()
            })
        }

        // Edit Review Details
        function ReviewEditDetails(detailsID){
            axios.post('/reviewDetails',{id:detailsID}).then(function (response){
                if(response.status==200){
                    $('#reviewEditLoader').addClass('d-none');
                    $('#reviewEditForm').removeClass('d-none');

                    let $jsonData = response.data;
                    $('#reviewNameID').val($jsonData[0].name);
                    $('#reviewDescID').val($jsonData[0].des);
                    $('#reviewImgID').val($jsonData[0].img);
                }
                else {
                    $('#reviewEditLoader').addClass('d-none');
                    $('#reviewEditWrong').removeClass('d-none');
                }
            }).catch(function (error){
                $('#reviewEditLoader').addClass('d-none');
                $('#reviewEditWrong').removeClass('d-none');
            })
        }

        //Review Edit Modal Save button
        $('#reviewEditBtn').click(function (){
            let id=$('#reviewEditId' ).html();
            let name=$('#reviewNameID').val();
            let desc=$('#reviewDescID').val();
            let img=$('#reviewImgID').val();
            ReviewEdit(id,name,desc,img);
        })
        // Review Edit
        function ReviewEdit(editID,editName,editDesc,editImg) {
            $('#reviewEditBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (editName.length == 0) {
                toastr.error('Review Name is Empty! ');
            }
            else if(editDesc.length == 0)
            {
                toastr.error('Review Description is Empty!');
            }
            else if(editImg.length == 0)
            {
                toastr.error('Review Image is Empty! ');
            }
            else
            {

                axios.post('/reviewEdit', {

                    id: editID,
                    name: editName,
                    desc: editDesc,
                    img: editImg
                }).then(function (response) {
                    $('#reviewEditBtn').html("Yes")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#reviewEditModal').modal('hide');
                            toastr.success('Edit Success');
                            getReviewData()
                        } else {
                            $('#reviewEditModal').modal('hide');
                            toastr.error('Edit Failed');
                            getReviewData()
                        }
                    }
                    else{
                        $('#reviewEditModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getReviewData()
                    }

                }).catch(function (error) {
                    $('#reviewEditModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getReviewData()
                })
            }
        }


        //Review Add Modal AddNew button
        $('#ReviewAddNewBtnID').click(function (){
            let name=$('#reviewNameAddID').val();
            let desc=$('#reviewDescAddID').val();
            let img=$('#reviewImgAddID').val();
            ReviewInsert(name,desc,img);
        })

        // Add Review Insert Method
        function ReviewInsert(addName,addDesc,addImg) {
            $('#ReviewAddNewBtnID').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (addName.length == 0) {
                toastr.error('Review Name is Empty! ');
            }
            else if(addDesc.length == 0)
            {
                toastr.error('Review Description is Empty!');
            }
            else if(addImg.length == 0)
            {
                toastr.error('Review Image is Empty! ');
            }
            else
            {
                axios.post('/reviewAdd', {
                    name: addName,
                    desc: addDesc,
                    img: addImg
                }).then(function (response) {
                    $('#ReviewAddNewBtnID').html("Add New")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#reviewAddModal').modal('hide');
                            toastr.success('Add Success');
                            getReviewData()
                        } else {
                            $('#reviewAddModal').modal('hide');
                            toastr.error('Add Failed');
                            getReviewData()
                        }
                    }
                    else{
                        $('#reviewAddModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getReviewData()
                    }
                }).catch(function (error) {
                    $('#reviewAddModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getReviewData()
                })
            }
        }


    </script>
@endsection
