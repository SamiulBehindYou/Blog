@extends('frontend.author_controls.layout')

@section('main')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
      <h4 class="mb-3 mb-md-0">Welcome to Author Controls <strong class="text-primary">{{ Auth::guard('author')->user()->name }}</strong></h4>
    </div>
</div>

<div class="row">
    <div class="col-12 col-xl-12 stretch-card">
      <div class="row flex-grow">
        <div class="col-md-10 m-auto grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h6 class="card-title mb-0">Your Total Post</h6>
              </div>
              <div class="row">
                <div class="col-4 col-md-12 col-xl-2">
                  <h3 class="mb-2">10</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+3.3%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>

                  <div class="mt-2">
                    <div class="d-flex justify-content-between align-items-baseline">
                        <h6 class="card-title mb-0">Total Approved Post</h6>
                      </div>
                  </div>
                  <h3 class="mb-2">10</h3>
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>+3.3%</span>
                      <i data-feather="arrow-up" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                </div>
                <div class="col-9 col-md-12 col-xl-10">
                  <div id="CChart1" class="mt-md-9 mt-xl-0"></div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div> <!-- row -->


@endsection

@section('footer')
<script>
     var options = {
          series: [{
            name: "Total post",
            data: [10, 41, 35, 51, 60, 70, 80, 90, 100, 150, 200, 500]
            },
            {
            name: "Approved post",
            data: [35, 41, 62, 42, 13, 18, 29, 37, 36, 51, 32, 35]
          },
        ],
          chart: {
          height: 350,
          type: 'line',
          zoom: {
            enabled: false
          }
        },
        dataLabels: {
          enabled: false
        },
        stroke: {
          curve: 'straight'
        },
        title: {
          text: 'Post Trends by Month',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#CChart1"), options);
        chart.render();



</script>
@endsection
