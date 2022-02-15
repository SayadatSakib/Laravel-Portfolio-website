<div class="container section-marginTop text-center">
    <h1 class="section-title"> Services </h1>
    <h1 class="section-subtitle"> ICT courses, Project souce code and many services we provide</h1>
    <div class="row">
        @foreach($servicesDataKey as $servicesData)
        <div class="col-md-3 p-2 ">
            <div class="card service-card text-center w-100">
                <div class="card-body">
                    <img class="service-card-logo " src=" {{$servicesData->service_img}}" alt="Service image">
                    <h5 class="service-card-title mt-3">{{$servicesData->service_name}}</h5>
                    <h6 class="service-card-subTitle p-0 m-0">{{$servicesData->service_des}}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>