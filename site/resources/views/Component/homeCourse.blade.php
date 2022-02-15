<div class="container section-marginTop text-center">
    <h1 class="section-title">Courses </h1>
    <h2 class="section-subtitle">IT course,project source code and many courses</h2>
    <div class="row">
        @foreach( $coursesDataKey as $coursesData)
        <div class="col-md-4 thumbnail-container">
            <img src="{{$coursesData->course_img}}" alt="Avatar" class="thumbnail-image">
            <div class="thumbnail-middle">
                <h1 class="thumbnail-title"> {{$coursesData->course_name}} </h1>
                <h1 class="thumbnail-subtitle">{{$coursesData->course_fee}} | {{$coursesData->course_totalenroll}}</h1>
                <h1 class="thumbnail-subtitle">{{$coursesData->course_totalclass}}</h1>
                <a target="_blank" href="{{$coursesData->course_link}}" class="normal-btn btn">Start</a>
            </div>
        </div>
        @endforeach
    </div>


</div>