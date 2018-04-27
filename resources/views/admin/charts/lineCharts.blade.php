{{--<canvas id="memberRegChart" width="400" height="400"></canvas>--}}
<div style="background-color: white">
    <canvas id="{{$list['conf']['id']}}"></canvas>
</div>

<script>

    $(function () {
        var ctx = document.getElementById("{{$list['conf']['id']}}").getContext('2d');
        var config = {
            type: 'line',
            data: {
                labels: [
                @for ($i = 0 ; $i < count($list['data']) ; $i++)
                    '{{$list['data'][$i]['date']}}',
                @endfor
                    ]
                ,
                datasets: [{
                    label: "{{$list['conf']['subTitle']}}",
                    backgroundColor: "{{$list['conf']['bGC']}}",
                    borderColor: "{{$list['conf']['bC']}}",
                    data: [
                        @for ($i = 0 ; $i < count($list['data']) ; $i++)
                            '{{$list['data'][$i]['value']}}',
                        @endfor
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "{{$list['conf']['title']}}",
                    fontSize:20,
                },
                tooltips: {
                    mode: 'index',
                    intersect: false,
                },
                hover: {
                    mode: 'nearest',
                    intersect: true
                },
                scales: {
                    xAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '日期'
                        }
                    }],
                    yAxes: [{
                        display: true,
                        scaleLabel: {
                            display: true,
                            labelString: '注册量'
                        }
                    }]
                }
            }
        };
        window.MemberRegCharts = new Chart(ctx, config);
    });


</script>