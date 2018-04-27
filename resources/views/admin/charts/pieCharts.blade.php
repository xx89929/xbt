{{--<canvas id="memberRegChart" width="400" height="400"></canvas>--}}
<div style="background-color: white">
    <canvas id="{{$list['conf']['id']}}"></canvas>
</div>

<script>

    $(function () {
        var ctx = document.getElementById("{{$list['conf']['id']}}").getContext('2d');

        var config = {
            type: 'pie',
            data: {
                datasets: [{
                    data: [
                        @foreach($list['data'] as $la)
                        '{{$la->value}}',
                        @endforeach
                    ],
                    backgroundColor: [
                        @foreach($list['category'] as $lc)
                            '{{$lc->color}}',
                        @endforeach
                    ],
                    label: "{{$list['conf']['title']}}",
                }],
                labels: [
                    @foreach($list['category'] as $lc)
                        '{{$lc->name}}',
                    @endforeach
                ]
            },
            options: {
                responsive: true,
                title: {
                    display: true,
                    text: "{{$list['conf']['title']}}",
                    fontSize:20,
                }
            }
        };
        window.MemberRegCharts = new Chart(ctx, config);
    });


</script>