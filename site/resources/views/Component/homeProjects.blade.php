  <div class="container section-marginTop text-center">
      <h1 class="section-title">Project</h1>
      <h1 class="section-subtitle">IT course,project source code and many courses</h1>
      <div class="row">

          <div id="one" class="owl-carousel mb-4 owl-theme">
              @foreach($projectsDataKey as $projectData)
              <div class="item m-1 card">
                  <div class="text-center">
                      <img class="w-100" src="{{ $projectData-> project_img}}" alt="Card image cap">
                      <h5 class="service-card-title mt-4">{{ $projectData-> project_name}}</h5>
                      <h6 class="service-card-subTitle p-0 m-0">{{ $projectData-> project_des}} </h6>
                      <a href="{{ $projectData-> project_link}}" target="_blank" class="normal-btn-outline mt-2 mb-4 btn"> More </a>
                  </div>
              </div>
              @endforeach

          </div>
      </div>
      <div class="d-inline ml-2">
          <i id="customPrevBtn" class="mr-3 fas fa-chevron-left"></i>
          <a href="{{url('/projects')}}" class="normal-btn  btn">See All </a>
          <i id="customNextBtn" class="ml-3 fas fa-chevron-right"></i>
      </div>