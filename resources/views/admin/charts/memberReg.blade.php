{{--<canvas id="memberRegChart" width="400" height="400"></canvas>--}}
<div style="background-color: white">
    <canvas id="memberRegChart"></canvas>
</div>

<script>

    $(function () {
        var ctx = document.getElementById("memberRegChart").getContext('2d');
        var config = {
            type: 'line',
            data: {
                labels: [
                @for ($i = 0 ; $i < count($member_list) ; $i++)
                    '{{$member_list[$i]['date']}}',
                @endfor
                    ]
                ,
                datasets: [{
                    label: '会员注册',
                    backgroundColor: '#3c8dbc',
                    borderColor: '#3c8dbc',
                    data: [
                        @for ($i = 0 ; $i < count($member_list) ; $i++)
                            '{{$member_list[$i]['value']}}',
                        @endfor
                    ],
                    fill: false,
                }]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: '30内会员注册统计表',
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