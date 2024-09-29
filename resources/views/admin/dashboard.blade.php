@extends('admin.layout')

@section('main')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Dashboard <strong class="text-primary">{{ Auth::user()->name }}</strong></h4>
    </div>
</div>



<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Active Blog Insight</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $total_blog }}</h3>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="apexChart1" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">New Blogs (10 days)</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $ten_day_total }}</h3>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="apexChart2" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Growth</h6>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                    <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-5">
                  <h3 class="mb-2">{{ $growth }}%</h3>
                  <div class="d-flex align-items-baseline">
                    @if ($growth > 0)
                        <p class="text-success">
                            <i data-feather="trending-up" class="icon mb-1"></i>
                        </p>
                    @else
                    <p class="text-danger">
                        <i data-feather="trending-down" class="icon mb-1"></i>
                    </p>
                    @endif
                  </div>
                </div>
                <div class="col-6 col-md-12 col-xl-7">
                  <div id="apexChart3" class="mt-md-3 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->



  <div class="row">

    <div class="col-lg-5 col-xl-4 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">Total admins post</h6>
            <div class="dropdown mb-2">
              <button class="btn p-0" type="button" id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton5">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
              </div>
            </div>
          </div>
          <div id="progressbar1" class="mx-auto"></div>
          <div class="row mt-4 mb-3">
            <div class="col-6 d-flex justify-content-endgit">
              <div>
                <label class="d-flex align-items-center justify-content-end tx-10 text-uppercase font-weight-medium">Total blog <span class="p-1 ml-1 rounded-circle bg-primary-muted"></span></label>
                <h5 class="font-weight-bold mb-0 text-right">{{ $total_blog }}</h5>
              </div>
            </div>
            <div class="col-6">
              <div>
                <label class="d-flex align-items-center tx-10 text-uppercase font-weight-medium"><span class="p-1 mr-1 rounded-circle bg-primary"></span>Admin Blog</label>
                <h5 class="font-weight-bold mb-0">{{ $admin_blogs }}</h5>
              </div>
            </div>
          </div>
            <br>
            <a href="{{ route('blog.create') }}" class="btn btn-primary btn-block">Post more blog</a>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">Announcements</h6>
            <div class="dropdown mb-2">
              <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column">
            @forelse ($announcements as $announce)

            <a href="#" class="d-flex align-items-center border-bottom py-3">
                <div class="mr-3">
                    <img src="{{ asset('uploads/profile.jpg') }}" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{ $announce->title }}</h6>
                        <p class="text-muted tx-12">{{ $announce->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-muted tx-13">Importance: {{ $announce->importance }}</p>
                </div>
            </a>
            @empty
            <div class="col m-auto text-center">
                <div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Announcements</h3>
            </div>
            @endforelse

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-5 col-xl-4 grid-margin grid-margin-xl-0 stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-baseline mb-2">
            <h6 class="card-title mb-0">Messages</h6>
            <div class="dropdown mb-2">
              <button class="btn p-0" type="button" id="dropdownMenuButton6" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuButton6">
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="eye" class="icon-sm mr-2"></i> <span class="">View</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="edit-2" class="icon-sm mr-2"></i> <span class="">Edit</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="trash" class="icon-sm mr-2"></i> <span class="">Delete</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="printer" class="icon-sm mr-2"></i> <span class="">Print</span></a>
                <a class="dropdown-item d-flex align-items-center" href="#"><i data-feather="download" class="icon-sm mr-2"></i> <span class="">Download</span></a>
              </div>
            </div>
          </div>
          <div class="d-flex flex-column">
            @forelse ($messages as $message)
            <a href="#" class="d-flex align-items-center border-bottom py-3">
                <div class="mr-3">
                    <img src="{{ asset('uploads/authors').'/'.$message->rel_to_author->image }}" class="rounded-circle wd-35" alt="user">
                </div>
                <div class="w-100">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{ $message->rel_to_author->name }}</h6>
                        <p class="text-muted tx-12">{{ $message->created_at->diffForHumans() }}</p>
                    </div>
                    <p class="text-muted tx-13">{{ $message->subject }}</p>
                </div>
            </a>
            @empty
            <div class="col m-auto text-center">
                <div class="text-danger"><i data-feather="bell-off"></i></div><h3>No Messages</h3>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
  </div> <!-- row -->


@endsection





@section('footer')

<script>


    // Apex chart1 start
  if($('#apexChart1').length) {
    var options1 = {
      chart: {
        type: "line",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      series: [{
          data: [
            @foreach ($blog_array as $b)
                {{ $b }}{{ ',' }}
            @endforeach
          ]
      }],
      stroke: {
        width: 2,
        curve: "smooth"
      },
      markers: {
        size: 0
      },
      colors: ["#727cf5"],
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart1"),options1).render();
  }
  // Apex chart1 end

// Progressgar1 value sent to dashboard.js
  var progressbar = {{ $percentage }};


 // Apex chart2 start
 if($('#apexChart2').length) {
    var options2 = {
      chart: {
        type: "bar",
        height: 60,
        sparkline: {
          enabled: !0
        }
      },
      plotOptions: {
        bar: {
          columnWidth: "60%"
        }
      },
      colors: ["#727cf5"],
      series: [{
        data: [
            @foreach ($last_ten as $tday)
                {{ $tday }}{{ ',' }}
            @endforeach
        ]
      }],
      labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
      xaxis: {
        crosshairs: {
          width: 1
        }
      },
      tooltip: {
        fixed: {
          enabled: !1
        },
        x: {
          show: !1
        },
        y: {
          title: {
            formatter: function(e) {
              return ""
            }
          }
        },
        marker: {
          show: !1
        }
      }
    };
    new ApexCharts(document.querySelector("#apexChart2"),options2).render();
  }
  // Apex chart2 end



</script>


@endsection
