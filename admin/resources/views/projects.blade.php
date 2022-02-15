@extends('Layout.app')
@section('title','Project')
@section('content')
    <div class="container d-none" id="projectMainDiv">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="projectAddBtnID" class="btn btn-default my-3">Add Project</button>
                <table id="projectDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>

                        <th class="th-sm">Name</th>
                        <th class="th-sm">Description</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="project_table">

                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <div class="container" id="projectLoadingDiv">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
            </div>
        </div>
    </div>

    <div class="container d-none" id="projectWrongDiv">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h3>Something Went Wrong!!!</h3>
            </div>
        </div>
    </div>

    {{--        Delete Modal--}}
    <div class="modal fade" id="projectDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                    <h5 class="mt-4">Do you want to delete?</h5>
                    <h6 id="projectDeleteId" class="mt-4 d-none" > </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button  id="projectDeleteBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Edit Modal--}}
    <div class="modal fade" id="projectEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-5">
                    <h6 id="projectEditId" class="mt-4 d-none" > </h6>
                    <div id="projectEditForm" class="w-100 d-none">
                        <input type="text" id="projectNameID" class="form-control mb-4 " placeholder=" Project Name ">
                        <input type="text" id="projectDescID" class="form-control mb-4" placeholder="Project Description">
                        <input type="text" id="projectLinkID" class="form-control mb-4" placeholder="Project Link">
                        <input type="text" id="projectImgID" class="form-control mb-4" placeholder="Project Image Link">

                    </div>

                    <img id="projectEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                    <h6 id="projectEditWrong" class="d-none">Something Went Wrong!!!</h6>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="projectEditBtn" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Add Modal--}}
    <div class="modal fade" id="projectAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center p-5">
                    <div id="projectAddForm" class="w-100 ">
                        <input type="text" id="projectNameAddID" class="form-control mb-4 " placeholder=" Project Name ">
                        <input type="text" id="projectDescAddID" class="form-control mb-4" placeholder="Project Description">
                        <input type="text" id="projectLinkAddID" class="form-control mb-4" placeholder="Project Link">
                        <input type="text" id="projectImgAddID" class="form-control mb-4" placeholder="Project Image Link">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                    <button  id="ProjectAddNewBtnID" type="button" class="btn btn-sm btn-success">ADD New</button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        getProjectData()
        function getProjectData(){
            axios.get('/getProjectData').then(function (response){

                if(response.status==200){
                    $('#projectMainDiv').removeClass('d-none');
                    $('#projectLoadingDiv').addClass('d-none');
                    $('#projectDataTable').DataTable().destroy();
                    $('#project_table').empty();

                    let $jsonData = response.data;
                    $.each($jsonData,function (i){
                        $('<tr>').html(
                            "<td> " + $jsonData[i].project_name +"  </td>"+
                            "<td> " + $jsonData[i].project_des +"  </td>"+
                            "<td>  <a class='projectEditBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-edit icon-placing'></i> </a> </td>"+
                            "<td>  <a class='projectDeleteBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-trash-alt icon-placing'></i> </a> </td>"
                        ).appendTo('#project_table');
                    });

                    // Project Table Delete Icon click
                    $('.projectDeleteBtn').click(function (){
                        let id=$(this).data('id');
                        $('#projectDeleteId').html(id);
                        $('#projectDeleteModal').modal('show');
                    })

                    //Projects Table Edit Icon click
                    $('.projectEditBtn').click(function (){
                        let id=$(this).data('id');
                        $('#projectEditId').html(id);
                        ProjectEditDetails(id);
                        $('#projectEditModal').modal('show');
                    })

                    // Add Project Button Click
                    $('#projectAddBtnID').click(function (){
                        $('#projectAddModal').modal("show")
                    });

                    // Data Table
                    $('#projectDataTable').DataTable({"order": false});
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#projectLoadingDiv').addClass('d-none');
                    $('#projectWrongDiv').removeClass('d-none');
                }
            }).catch(function (error){
                $('#projectLoadingDiv').addClass('d-none');
                $('#projectWrongDiv').removeClass('d-none');
            });
        }

        //Project Delete Modal Yes button
        $('#projectDeleteBtn').click(function (){
            let id=$('#projectDeleteId').html();
            ProjectDelete(id);
        })

        // Project Delete
        function ProjectDelete(deleteID){
            $('#projectDeleteBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.post('/projectDelete',{id:deleteID}).then(function (response){
                $('#projectDeleteBtn').html("Yes")
                if(response.status==200){
                    if(response.data==1){
                        $('#projectDeleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getProjectData()
                    }
                    else {
                        $('#projectDeleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getProjectData()

                    }
                }else{
                    $('#projectDeleteModal').modal('hide');
                    toastr.error('Something Went Wrong!!!');
                    getProjectData()
                }
            }).catch(function (error){
                $('#projectDeleteModal').modal('hide');
                toastr.error('Something Went Wrong!!!');
                getProjectData()
            })
        }

        // Edit Project Details
        function ProjectEditDetails(detailsID){
            axios.post('/projectDetails',{id:detailsID}).then(function (response){
                if(response.status==200){
                    $('#projectEditLoader').addClass('d-none');
                    $('#projectEditForm').removeClass('d-none');

                    let $jsonData = response.data;
                    $('#projectNameID').val($jsonData[0].project_name);
                    $('#projectDescID').val($jsonData[0].project_des);
                    $('#projectLinkID').val($jsonData[0].project_link);
                    $('#projectImgID').val($jsonData[0].project_img);
                }
                else {
                    $('#projectEditLoader').addClass('d-none');
                    $('#projectEditWrong').removeClass('d-none');
                }
            }).catch(function (error){
                $('#projectEditLoader').addClass('d-none');
                $('#projectEditWrong').removeClass('d-none');
            })
        }

        //Project Edit Modal Save button
        $('#projectEditBtn').click(function (){
            let id=$('#projectEditId' ).html();
            let name=$('#projectNameID').val();
            let desc=$('#projectDescID').val();
            let link=$('#projectLinkID').val();
            let img=$('#projectImgID').val();
            ProjectEdit(id,name,desc,link,img);
        })
        // Project Edit
        function ProjectEdit(editID,editName,editDesc,editLink,editImg) {
            $('#projectEditBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (editName.length == 0) {
                toastr.error('Project Name is Empty! ');
            }
            else if(editDesc.length == 0)
            {
                toastr.error('Project Description is Empty!');
            }
            else if(editLink.length == 0)
            {
                toastr.error('Project Link is Empty! ');
            }
            else if(editImg.length == 0)
            {
                toastr.error('Project Image is Empty! ');
            }
            else
            {

                axios.post('/projectEdit', {

                    id: editID,
                    name: editName,
                    desc: editDesc,
                    link: editLink,
                    img: editImg
                }).then(function (response) {
                    $('#projectEditBtn').html("Yes")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#projectEditModal').modal('hide');
                            toastr.success('Edit Success');
                            getProjectData()
                        } else {
                            $('#projectEditModal').modal('hide');
                            toastr.error('Edit Failed');
                            getProjectData()
                        }
                    }
                    else{
                        $('#projectEditModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getProjectData()
                    }

                }).catch(function (error) {
                    $('#projectEditModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getProjectData()
                })
            }
        }


        //Project Add Modal AddNew button
        $('#ProjectAddNewBtnID').click(function (){
            let name=$('#projectNameAddID').val();
            let desc=$('#projectDescAddID').val();
            let link=$('#projectLinkAddID').val();
            let img=$('#projectImgAddID').val();
            ProjectInsert(name,desc,link,img);
        })

        // Add Project Insert Method
        function ProjectInsert(addName,addDesc,addLink,addImg) {
            $('#ProjectAddNewBtnID').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (addName.length == 0) {
                toastr.error('Project Name is Empty! ');
            }
            else if(addDesc.length == 0)
            {
                toastr.error('Project Description is Empty!');
            }
            else if(addLink.length == 0)
            {
                toastr.error('Project Link is Empty! ');
            }  else if(addImg.length == 0)
            {
                toastr.error('Project Image is Empty! ');
            }
            else
            {
                axios.post('/projectAdd', {
                    name: addName,
                    desc: addDesc,
                    link: addLink,
                    img: addImg
                }).then(function (response) {
                    $('#ProjectAddNewBtnID').html("Add New")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#projectAddModal').modal('hide');
                            toastr.success('Add Success');
                            getProjectData()
                        } else {
                            $('#projectAddModal').modal('hide');
                            toastr.error('Add Failed');
                            getProjectData()
                        }
                    }
                    else{
                        $('#projectAddModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getProjectData()
                    }
                }).catch(function (error) {
                    $('#projectAddModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getProjectData()
                })
            }
        }

    </script>
@endsection
