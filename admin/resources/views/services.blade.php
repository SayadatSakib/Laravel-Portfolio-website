@extends('Layout.app')
@section('title','Service')
@section('content')
        <div class="container d-none" id="mainDiv">
            <div class="row">
                <div class="col-md-12 p-5">
                    <button id="addBtnID" class="btn btn-default my-3">Add Service</button>
                <table id="serviceDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                    <tr>
                      <th class="th-sm">Image</th>
                      <th class="th-sm">Name</th>
                      <th class="th-sm">Description</th>
                      <th class="th-sm">Edit</th>
                      <th class="th-sm">Delete</th>
                    </tr>
                  </thead>
                  <tbody id="service_table">

                  </tbody>
                </table>

                </div>
            </div>
        </div>

        <div class="container" id="loadingDiv">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

                </div>
            </div>
        </div>

        <div class="container d-none" id="wrongDiv">
            <div class="row">
                <div class="col-md-12 text-center p-5">
                    <h3>Something Went Wrong!!!</h3>

                </div>
            </div>
        </div>

        {{--        Delete Modal--}}
        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body text-center p-3">
                        <h5 class="mt-4">Do you want to delete?</h5>
                        <h6 id="serviceDeleteId" class="mt-4 d-none" > </h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                        <button  id="serviceDeleteBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                    </div>
                </div>
            </div>
        </div>

        {{--        Edit Modal--}}
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center p-5">
                        <h6 id="serviceEditId" class="mt-4 d-none" > </h6>
                        <div id="serviceEditForm" class="w-100 d-none">
                            <input type="text" id="serviceNameID" class="form-control mb-4 serviceNameID" placeholder=" Service Name ">
                            <input type="text" id="serviceDescID" class="form-control mb-4" placeholder="Service Description">
                            <input type="text" id="serviceImgID" class="form-control mb-4" placeholder="Service Image Link">

                        </div>

                        <img id="serviceEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                        <h6 id="serviceEditWrong" class="d-none">Something Went Wrong!!!</h6>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                        <button  id="serviceEditBtn" type="button" class="btn btn-sm btn-success">Save</button>
                    </div>
                </div>
            </div>
        </div>

        {{--        Add Modal--}}
        <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Service</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body text-center p-5">
                        <div id="serviceAddForm" class="w-100 ">
                            <input type="text" id="serviceNameAddID" class="form-control mb-4 " placeholder=" Service Name ">
                            <input type="text" id="serviceDescAddID" class="form-control mb-4" placeholder="Service Description">
                            <input type="text" id="serviceImgAddID" class="form-control mb-4" placeholder="Service Image Link">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                        <button  id="addNewBtnID" type="button" class="btn btn-sm btn-success">ADD New</button>
                    </div>
                </div>
            </div>
        </div>

@endsection

@section('script')
    <script type="text/javascript">
        getServiceData();

        // For services table
        function getServiceData(){
            axios.get('/getServiceData').then(function (response){

                if(response.status==200){
                    $('#mainDiv').removeClass('d-none');
                    $('#loadingDiv').addClass('d-none');
                    $('#serviceDataTable').DataTable().destroy();
                    $('#service_table').empty();

                    let $jsonData = response.data;
                    $.each($jsonData,function (i){
                        $('<tr>').html(
                            "<td> <img class='table-img' src="+ $jsonData[i].service_img +"> </td>"+
                            "<td> " + $jsonData[i].service_name +"  </td>"+
                            "<td> " + $jsonData[i].service_des +"  </td>"+
                            "<td>  <a class='serviceEditBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-edit icon-placing'></i> </a> </td>"+
                            "<td>  <a class='serviceDeleteBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-trash-alt icon-placing'></i> </a> </td>"
                        ).appendTo('#service_table');
                    });

                    //Services Table Delete Icon click
                    $('.serviceDeleteBtn').click(function (){
                        let id=$(this).data('id');
                        $('#serviceDeleteId').html(id);
                        $('#deleteModal').modal('show');
                    })

                    //Services Table Edit Icon click
                    $('.serviceEditBtn').click(function (){
                        let id=$(this).data('id');
                        $('#serviceEditId').html(id);
                        ServiceEditDetails(id);
                        $('#editModal').modal('show');
                    })

                    // Data Table
                    $('#serviceDataTable').DataTable({"order": false});
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#loadingDiv').addClass('d-none');
                    $('#wrongDiv').removeClass('d-none');
                }
            }).catch(function (error){
                $('#loadingDiv').addClass('d-none');
                $('#wrongDiv').removeClass('d-none');
            });
        }

        //Service Delete Modal Yes button
        $('#serviceDeleteBtn').click(function (){
            let id=$('#serviceDeleteId').html();
            ServiceDelete(id);
        })

        // Service Delete
        function ServiceDelete(deleteID){
            $('#serviceDeleteBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.post('/serviceDelete',{id:deleteID}).then(function (response){
                $('#serviceDeleteBtn').html("Yes")
                if(response.status==200){
                    if(response.data==1){
                        $('#deleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getServiceData()
                    }
                    else {
                        $('#deleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getServiceData()

                    }
                }else{
                    $('#deleteModal').modal('hide');
                    toastr.error('Something  Went Wrong');
                    getServiceData()
                }
            }).catch(function (error){
                $('#deleteModal').modal('hide');
                toastr.error('Something  Went Wrong');
                getServiceData()
            })
        }



        // Edit Service Details
        function ServiceEditDetails(detailsID){
            axios.post('/serviceDetails',{id:detailsID}).then(function (response){
                if(response.status==200){
                    $('#serviceEditLoader').addClass('d-none');
                    $('#serviceEditForm').removeClass('d-none');

                    let $jsonData = response.data;
                    $('.serviceNameID').val($jsonData[0].service_name);
                    $('#serviceDescID').val($jsonData[0].service_des);
                    $('#serviceImgID').val($jsonData[0].service_img);
                }
                else {
                    $('#serviceEditLoader').addClass('d-none');
                    $('#serviceEditWrong').removeClass('d-none');
                }
            }).catch(function (error){
                $('#serviceEditLoader').addClass('d-none');
                $('#serviceEditWrong').removeClass('d-none');
            })
        }

        //Service Edit Modal Save button
        $('#serviceEditBtn').click(function (){
            let id=$('#serviceEditId' ).html();
            let name=$('#serviceNameID').val();
            let desc=$('#serviceDescID').val();
            let img=$('#serviceImgID').val();
            ServiceEdit(id,name,desc,img);
        })
        // Service Edit
        function ServiceEdit(editID,editName,editDesc,editImg) {
            $('#serviceEditBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (editName.length == 0) {
                toastr.error('Service Name is Empty! ');
            }
            else if(editDesc.length == 0)
            {
                toastr.error('Service Description is Empty!');
            }
            else if(editImg.length == 0)
            {
                toastr.error('Service Image is Empty! ');
            }
            else
            {

                axios.post('/serviceEdit', {

                    id: editID,
                    name: editName,
                    desc: editDesc,
                    img: editImg
                }).then(function (response) {
                    $('#serviceEditBtn').html("Yes")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#editModal').modal('hide');
                            toastr.success('Edit Success');
                            getServiceData()
                        } else {
                            $('#editModal').modal('hide');
                            toastr.error('Edit Failed');
                            getServiceData()
                        }
                    }
                    else{
                        $('#editModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getServiceData()
                    }

                }).catch(function (error) {
                    $('#editModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getServiceData()
                })
            }
        }

        // Add Service Button Click
        $('#addBtnID').click(function (){
            $('#addModal').modal("show")
        });

        //Service Add Modal AddNew button
        $('#addNewBtnID').click(function (){
            let name=$('#serviceNameAddID').val();
            let desc=$('#serviceDescAddID').val();
            let img=$('#serviceImgAddID').val();
            ServiceInsert(name,desc,img);
        })

        // Add Service Insert Method
        function ServiceInsert(addName,addDesc,addImg) {
            $('#addNewBtnID').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (addName.length == 0) {
                toastr.error('Service Name is Empty! ');
            }
            else if(addDesc.length == 0)
            {
                toastr.error('Service Description is Empty!');
            }
            else if(addImg.length == 0)
            {
                toastr.error('Service Image is Empty! ');
            }
            else
            {
                axios.post('/serviceAdd', {
                    name: addName,
                    desc: addDesc,
                    img: addImg
                }).then(function (response) {
                    $('#addNewBtnID').html("Add New")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#addModal').modal('hide');
                            toastr.success('Add Success');
                            getServiceData()
                        } else {
                            $('#addModal').modal('hide');
                            toastr.error('Add Failed');
                            getServiceData()
                        }
                    }
                    else{
                        $('#addModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getServiceData()
                    }
                }).catch(function (error) {
                    $('#addModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getServiceData()
                })
            }
        }


    </script>
@endsection


