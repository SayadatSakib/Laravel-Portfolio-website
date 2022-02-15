@extends('Layout.app')
@section('title','Course')
@section('content')
    <div class="container d-none" id="mainDivCourse">
        <div class="row">
            <div class="col-md-12 p-5">
                <button id="addCourseBtnID" class="btn btn-default my-3">Add Course</button>
                <table id="courseDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Course fee</th>
                        <th class="th-sm">Class</th>
                        <th class="th-sm">Enroll</th>
                        <th class="th-sm">Edit</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="course_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" id="loadingDivCourse">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

            </div>
        </div>
    </div>

    <div class="container d-none" id="wrongDivCourse">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h3>Something Went Wrong!!!</h3>

            </div>
        </div>
    </div>

    {{--        Add Modal--}}
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6">
                                <input id="CourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <input id="CourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <input id="CourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <input id="CourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="CourseClassId" type="text" class="form-control mb-3" placeholder="Total Class">
                                <input id="CourseLinkId" type="text" class="form-control mb-3" placeholder="Course Link">
                                <input id="CourseImgId" type="text"  class="form-control mb-3" placeholder="Course Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="addCourseSaveBtn" type="button" class="btn  btn-sm  btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Delete Modal--}}
    <div class="modal fade" id="deleteCourseModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                    <h5 class="mt-4">Do you want to delete?</h5>
                    <h6 id="courseDeleteId" class="mt-4 d-none" > </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button  id="courseDeleteBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>

    {{--        Edit Modal--}}
    <div class="modal fade" id="editCourseModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body  text-center">
                    <div class="container">
                        <h6 id="courseEditId" class="mt-1 mb-4 d-none" > </h6>
                        <div class="row">

                            <div class="col-md-6">
                                <input id="editCourseNameId" type="text" id="" class="form-control mb-3" placeholder="Course Name">
                                <input id="editCourseDesId" type="text" id="" class="form-control mb-3" placeholder="Course Description">
                                <input id="editCourseFeeId" type="text" id="" class="form-control mb-3" placeholder="Course Fee">
                                <input id="editCourseEnrollId" type="text" id="" class="form-control mb-3" placeholder="Total Enroll">
                            </div>
                            <div class="col-md-6">
                                <input id="editCourseClassId" type="text" class="form-control mb-3" placeholder="Total Class">
                                <input id="editCourseLinkId" type="text" class="form-control mb-3" placeholder="Course Link">
                                <input id="editCourseImgId" type="text"  class="form-control mb-3" placeholder="Course Image">
                            </div>
                        </div>

                            <img id="courseEditLoader" class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">
                            <h6 id="courseEditWrong" class="d-none">Something Went Wrong!!!</h6>


                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">Cancel</button>
                    <button  id="courseEditSaveBtn" type="button" class="btn btn-sm btn-success">Save</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script type="text/javascript">
        getCourseData();
        // For course table
        function getCourseData(){
            axios.get('/getCourseData').then(function (response){
                if(response.status==200){
                    $('#mainDivCourse').removeClass('d-none');
                    $('#loadingDivCourse').addClass('d-none');
                    $('#courseDataTable').DataTable().destroy();
                    $('#course_table').empty();

                    let $jsonData = response.data;
                    $.each($jsonData,function (i){
                        $('<tr>').html(
                            "<td>"+ $jsonData[i].course_name +"</td>"+
                            "<td> " + $jsonData[i].course_fee +"  </td>"+
                            "<td> " + $jsonData[i].course_totalenroll +"  </td>"+
                            "<td> " + $jsonData[i].course_totalclass +"  </td>"+
                            "<td>  <a class='courseEditBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-edit icon-placing'></i> </a> </td>"+
                            "<td>  <a class='courseDeleteBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-trash-alt icon-placing'></i> </a> </td>"
                        ).appendTo('#course_table');
                    });

                    // Course Table Delete Icon click
                    $('.courseDeleteBtn').click(function (){
                        let id=$(this).data('id');
                        $('#courseDeleteId').html(id);
                        $('#deleteCourseModal').modal('show');
                    })

                    // Course Table Edit Icon click
                    $('.courseEditBtn').click(function (){
                        let id=$(this).data('id');
                        $('#courseEditId').html(id);
                        CourseEditDetails(id);
                        $('#editCourseModal').modal('show');
                    })

                    // Data Table
                    $('#courseDataTable').DataTable({"order": false});
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#loadingDivCourse').addClass('d-none');
                    $('#wrongDivCourse').removeClass('d-none');
                }
            }).catch(function (error){
                $('#loadingDivCourse').addClass('d-none');
                $('#wrongDivCourse').removeClass('d-none');
            });
        }

        // Add Course Button Click
        $('#addCourseBtnID').click(function (){
            $('#addCourseModal').modal("show")
        });

        //Course Add Modal AddNew button
        $('#addCourseSaveBtn').click(function (){
            let C_name=$('#CourseNameId').val();
            let C_desc=$('#CourseDesId').val();
            let C_fee=$('#CourseFeeId').val();
            let C_enroll=$('#CourseEnrollId').val();
            let C_class=$('#CourseClassId').val();
            let C_link=$('#CourseLinkId').val();
            let C_img=$('#CourseImgId').val();
            CourseInsert(C_name,C_desc,C_fee,C_enroll,C_class,C_link,C_img);
        })

        // Add Course Insert Method
        function CourseInsert(C_name,C_desc,C_fee,C_enroll,C_class,C_link,C_img) {
            $('#addCourseSaveBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (C_name.length == 0) {
                toastr.error('Service Name is Empty! ');
                $('#addCourseSaveBtn').html("Save");
            }
            else if(C_desc.length == 0)
            {
                toastr.error('Service Description is Empty!');
                $('#addCourseSaveBtn').html("Save")
            }
            else if(C_fee.length == 0)
            {
                toastr.error('Service Image is Empty! ');
                $('#addCourseSaveBtn').html("Save")
            }
            else if(C_enroll.length == 0)
            {
                toastr.error('Service Image is Empty! ');
                $('#addCourseSaveBtn').html("Save")
            }
            else if(C_class.length == 0)
            {
                toastr.error('Service Image is Empty! ');
                $('#addCourseSaveBtn').html("Save")
            }
            else if(C_link.length == 0)
            {
                toastr.error('Service Image is Empty! ');
                $('#addCourseSaveBtn').html("Save")
            }
            else if(C_img.length == 0)
            {
                toastr.error('Service Image is Empty! ');
                $('#addCourseSaveBtn').html("Save")
            }
            else
            {
                axios.post('/courseAdd', {
                    name: C_name,
                    desc: C_desc,
                    fee: C_fee,
                    t_enroll: C_enroll,
                    t_class: C_class,
                    link: C_link,
                    img: C_img
                }).then(function (response) {
                    $('#addCourseSaveBtn').html("Save")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#addCourseModal').modal('hide');
                            toastr.success('Add Success');
                            getCourseData();
                            $('#addCourseSaveBtn').html("Save")
                        } else {
                            $('#addCourseModal').modal('hide');
                            toastr.error('Add Failed');
                            getCourseData();
                            $('#addCourseSaveBtn').html("Save")
                        }
                    }
                    else{
                        $('#addCourseModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getCourseData();
                        $('#addCourseSaveBtn').html("Save")
                    }
                }).catch(function (error) {
                    $('#addCourseModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getCourseData();
                    $('#addCourseSaveBtn').html("Save")
                })
            }
        }


        //Course Delete Modal Yes button
        $('#courseDeleteBtn').click(function (){
            let id=$('#courseDeleteId').html();
            CourseDelete(id);
        })

        // Course Delete
        function CourseDelete(CourseDeleteID){
            $('#serviceDeleteBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.post('/courseDelete',{id:CourseDeleteID}).then(function (response){
                $('#courseDeleteBtn').html("Yes")
                if(response.status==200){
                    if(response.data==1){
                        $('#deleteCourseModal').modal('hide');
                        toastr.success('Delete Success');
                        getCourseData()
                    }
                    else {
                        $('#deleteCourseModal').modal('hide');
                        toastr.error('Delete Failed');
                        getCourseData()

                    }
                }else{
                    $('#deleteCourseModal').modal('hide');
                    toastr.error('Something  Went Wrong');
                    getCourseData()
                }
            }).catch(function (error){
                $('#deleteCourseModal').modal('hide');
                toastr.error('Something  Went Wrong');
                getCourseData()
            })
        }

        // Edit Service Details
        function CourseEditDetails(detailsID){
            axios.post('/courseDetails',{id:detailsID}).then(function (response){
                if(response.status==200){
                    $('#courseEditLoader').addClass('d-none');
                    $('#courseEditForm').removeClass('d-none');

                    let $jsonData = response.data;
                    $('#editCourseNameId').val($jsonData[0].course_name);
                    $('#editCourseDesId').val($jsonData[0].course_des);
                    $('#editCourseFeeId').val($jsonData[0].course_fee);
                    $('#editCourseEnrollId').val($jsonData[0].course_totalenroll);
                    $('#editCourseClassId').val($jsonData[0].course_totalclass);
                    $('#editCourseLinkId').val($jsonData[0].course_link);
                    $('#editCourseImgId').val($jsonData[0].course_img);
                }
                else {
                    $('#courseEditLoader').addClass('d-none');
                    $('#courseEditWrong').removeClass('d-none');
                }
            }).catch(function (error){

            })
        }

        //Course Edit Modal Save button
        $('#courseEditSaveBtn').click(function (){
            let edit_id=$('#courseEditId' ).html();
            let edit_name=$('#editCourseNameId').val();
            let edit_fee=$('#editCourseFeeId').val();
            let edit_t_enroll=$('#editCourseEnrollId').val();
            let edit_t_class=$('#editCourseClassId').val();
            let edit_link=$('#editCourseLinkId').val();
            let edit_img=$('#editCourseImgId').val();
            let edit_desc=$('#editCourseDesId').val();


            CourseEdit(edit_id,edit_name,edit_fee,edit_t_enroll,edit_t_class,edit_link,edit_img,edit_desc);
        })
        // Service Edit
        function CourseEdit(edit_id,edit_name,edit_fee,edit_t_enroll,edit_t_class,edit_link,edit_img,edit_desc) {
            $('#courseEditLoader').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            if (edit_name.length == 0) {
                toastr.error('Course Name is Empty! ');
            }
            else if(edit_fee.length == 0)
            {
                toastr.error('Course Fee is Empty!');
            }
            else if(edit_t_enroll.length == 0)
            {
                toastr.error('Course Total Enroll is Empty!');
            }
            else if(edit_t_class.length == 0)
            {
                toastr.error('Course Total Class is Empty!');
            }
            else if(edit_link.length == 0)
            {
                toastr.error('Course link is Empty!');
            }
            else if(edit_img.length == 0)
            {
                toastr.error('Course Image is Empty!');
            }
            else if(edit_desc.length == 0)
            {
                toastr.error('Course Description is Empty! ');
            }
            else
            {
                axios.post('/courseEdit', {
                    id: edit_id,
                    name: edit_name,
                    fee: edit_fee,
                    t_enroll: edit_t_enroll,
                    t_class: edit_t_class,
                    link: edit_link,
                    img: edit_img,
                    desc: edit_desc

                }).then(function (response) {
                    $('#courseEditSaveBtn').html("Save")
                    if(response.status==200){
                        if (response.data == 1) {
                            $('#editCourseModal').modal('hide');
                            toastr.success('Edit Success');
                            getCourseData()
                        } else {
                            $('#editCourseModal').modal('hide');
                            toastr.error('Edit Failed');
                            getCourseData()
                        }
                    }
                    else{
                        $('#editCourseModal').modal('hide');
                        toastr.error('Something went wrong!!');
                        getCourseData()
                    }

                }).catch(function (error) {
                    $('#editCourseModal').modal('hide');
                    toastr.error('Something went wrong!!');
                    getCourseData()
                })
            }
        }
    </script>
@endsection
