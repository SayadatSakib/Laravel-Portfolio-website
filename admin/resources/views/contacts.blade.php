@extends('Layout.app')
@section('title','Contact')
@section('content')
    <div class="row">
        <div class="container d-none" id="contactMainDiv">
            <div class="col-md-12 p-5">
                <table id="contactDataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                        <th class="th-sm">Name</th>
                        <th class="th-sm">Mobile</th>
                        <th class="th-sm">Email</th>
                        <th class="th-sm">Message</th>
                        <th class="th-sm">Delete</th>
                    </tr>
                    </thead>
                    <tbody id="contact_table">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="container" id="loadingDivContact">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <img class="loading-icon m-5" src="{{asset('images/loader.svg')}}" alt="">

            </div>
        </div>
    </div>

    <div class="container d-none" id="wrongDivContact">
        <div class="row">
            <div class="col-md-12 text-center p-5">
                <h3>Something Went Wrong!!!</h3>

            </div>
        </div>
    </div>

    {{--        Delete Modal--}}
    <div class="modal fade" id="contactDeleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body text-center p-3">
                    <h5 class="mt-4">Do you want to delete?</h5>
                    <h6 id="contactDeleteId" class="mt-4   " > </h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-primary" data-dismiss="modal">No</button>
                    <button  id="contactDeleteBtn" type="button" class="btn btn-sm btn-danger">Yes</button>
                </div>
            </div>
        </div>
    </div>


@endsection


@section('script')
    <script type="text/javascript">
        getContactData();
        function getContactData(){
            axios.get('/getContactData').then(function (response){

                if(response.status==200){
                    $('#contactMainDiv').removeClass('d-none');
                    $('#loadingDivContact').addClass('d-none');
                    $('#contactDataTable').DataTable().destroy();
                    $('#contact_table').empty();

                    let $jsonData = response.data;
                    $.each($jsonData,function (i){
                        $('<tr>').html(
                            "<td> " + $jsonData[i].contact_name +"  </td>"+
                            "<td> " + $jsonData[i].contact_mobile +"  </td>"+
                            "<td> " + $jsonData[i].contact_email +"  </td>"+
                            "<td> " + $jsonData[i].contact_msg +"  </td>"+
                            "<td>  <a class='contactDeleteBtn' data-id = "+$jsonData[i].id+"> <i class='fas fa-trash-alt icon-placing'></i> </a> </td>"
                        ).appendTo('#contact_table');
                    });

                    // Project Table Delete Icon click
                    $('.contactDeleteBtn').click(function (){
                        let id=$(this).data('id');
                        $('#contactDeleteId').html(id);
                        $('#contactDeleteModal').modal('show');
                    })

                    // Data Table
                    $('#contactDataTable').DataTable({"order": false});
                    $('.dataTables_length').addClass('bs-select');

                }
                else{
                    $('#loadingDivContact').addClass('d-none');
                    $('#wrongDivContact').removeClass('d-none');
                }
            }).catch(function (error){
                $('#loadingDivContact').addClass('d-none');
                $('#wrongDivContact').removeClass('d-none');
            });
        }

        //Project Delete Modal Yes button
        $('#contactDeleteBtn').click(function (){
            let id=$('#contactDeleteId').html();
            ProjectDelete(id);
        })

        // // Project Delete
        function ProjectDelete(deleteID){
            $('#contactDeleteBtn').html("<div class='spinner-border spinner-border-sm' role='status'> </div>")//Loader Animation
            axios.post('/contactDelete',{id:deleteID}).then(function (response){
                $('#contactDeleteBtn').html("Yes")
                if(response.status==200){
                    if(response.data==1){
                        $('#contactDeleteModal').modal('hide');
                        toastr.success('Delete Success');
                        getContactData()
                    }
                    else {
                        $('#contactDeleteModal').modal('hide');
                        toastr.error('Delete Failed');
                        getContactData()

                    }
                }else{
                    $('#contactDeleteModal').modal('hide');
                    toastr.error('Something Went Wrong!!!');
                    getContactData()
                }
            }).catch(function (error){
                $('#contactDeleteModal').modal('hide');
                toastr.error('Something Went Wrong!!!');
                getContactData()
            })
        }



    </script>
@endsection
