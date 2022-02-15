@extends('Layout.app')
@section('title','Contact')
@section('content')
<div class="container-fluid jumbotron mt-5 mb-0 ">
    <div class="row d-flex justify-content-center">
        <div class="col-md-6  text-center">
            <h1 class="page-top-title mt-3">- Contact -</h1>
        </div>
    </div>
</div>


<div id="Contact" class="container-fluid section-marginTop text-center mt-0 mb-5">
    <div class="row ">
        <div class="col-md-2">

        </div>
        <div class="col-md-4 contact-form ">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7320.1759016234455!2d91.17727515393844!3d23.457291804656826!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x37547f212e070db3%3A0xa072c630061c8945!2sThakur%20Para%2C%20Cumilla!5e0!3m2!1sen!2sbd!4v1644545205107!5m2!1sen!2sbd" width="480" height="365" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
        <div class="col-md-4 contact-form">
            <h3 class="service-card-title">Address</h3>
            <hr>
            <p class="footer-text"><i class="fas fa-map-marker-alt"></i> Rajarhat,Kurigram | <i class="fas fa-phone"></i> 01629914988 | <i class="fas fa-envelope"></i> sayadatsakib.40@gmail.com </p>


            <h5 class="service-card-title"> Contact </h5>
            <div class="form-group ">
                <input id="nameID" type="text" class="form-control w-100" placeholder="Name">
            </div>
            <div class="form-group">
                <input id="mobileID" type="text" class="form-control  w-100" placeholder="Mobile ">
            </div>
            <div class="form-group">
                <input id="emailID" type="text" class="form-control  w-100" placeholder="Email ">
            </div>
            <div class="form-group">
                <input id="msgID" type="text" class="form-control  w-100" placeholder="Message ">
            </div>
            <button id="sendBtnID" class="btn btn-block normal-btn w-100">Send</button>
        </div>
        <div class="col-md-2">

        </div>
    </div>
</div>


@endsection