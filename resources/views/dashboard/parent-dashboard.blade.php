@extends('layouts.dashboard')
@section('left-nav')
    @include('dashboard.nav.left-nav')
@endsection
@section('content')

    <div class="right_col" role="main">
        <!-- bar charts group -->
        <div class="col-md-10 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Marks for Test
                        <small></small>
                    </h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content2">
                    <div id="graphx" style="width:100%; height:300px;"></div>
                </div>
            </div>
        </div>
        <!-- /bar charts group -->
    </div>
@endsection
@section('extra-css')

@endsection


@section('extrs-js')
    @php
        $parent_childs = \App\User::where('parent_id',\Illuminate\Support\Facades\Auth::user()->id)->get();
        $parent_childs_ids = array();
        foreach ($parent_childs as $p){
            array_push($parent_childs_ids,$p->id);
        }
//dump($parent_childs_ids);
    $child_marks = \App\Models\UserLessonMark::whereIn('user_id',$parent_childs_ids)->get()->groupBy('lesson_id');
    $names = array();
   // dd($child_marks);
            $data = array();
            $element = array();
                foreach ($child_marks as $less_id => $one){
                $element['x']=\App\Models\Lesson::where('id',$less_id)->first()->title;
                //dump($one);
                    foreach ($one as $ss){
                        $userName = \App\User::where('id',$ss->user_id)->first()->name;
                        $element[$userName]=$ss->mark;
                        if(!in_array($userName, $names, true)){
                            array_push($names, $userName);
                        }
                    }
                    //$data[$month]=$total;
                    array_push($data,$element);

                    //array_push($dates,$month);

                }
    //dd($names);
    @endphp
    <script>
        var info = "{{json_encode($data)}}";
        var names = "{{json_encode($names)}}";
        if ($('#graphx').length) {

            Morris.Bar({
                element: 'graphx',
                data: JSON.parse(info.replace(/&quot;/g, '"')),
                xkey: 'x',
                ykeys: JSON.parse(names.replace(/&quot;/g, '"')),
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                hideHover: 'auto',
                labels: ['Y', 'Z', 'A'],
                resize: true
            }).on('click', function (i, row) {
                console.log(i, row);
            });

        }
    </script>
@endsection