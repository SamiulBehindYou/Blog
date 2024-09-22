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
                  <h3 class="mb-2">{{ $total_blog }}</h3>
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
                  <h3 class="mb-2">{{ $approved_blog }}</h3>
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
            data: [
                @for ($i = 1; $i < count($blog_per_day); $i++)
                    @if($blog_per_day[$i] == 0)
                        {{ 0 }}{{ ',' }}
                    @else
                        {{ $blog_per_day[$i].',' }}
                    @endif

                @endfor
            ]
            },
            {
            name: "Approved post",
            data: [
                @for ($i = 1; $i < count($blog_approve_per_day); $i++)
                    @if($blog_approve_per_day[$i] == 0)
                        {{ 0 }}{{ ',' }}
                    @else
                        {{ $blog_approve_per_day[$i].',' }}
                    @endif

                @endfor
            ]
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
          text: 'Post Trends by per day',
          align: 'left'
        },
        grid: {
          row: {
            colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
            opacity: 0.5
          },
        },
        xaxis: {
          categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31'],
        }
        };

        var chart = new ApexCharts(document.querySelector("#CChart1"), options);
        chart.render();



</script>
@endsection
