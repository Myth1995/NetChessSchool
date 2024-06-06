@extends('client.layout.app')

@section('title', 'MLM DASHBOARD')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<link href="{{asset('assets/tree/profile.css')}}" rel="stylesheet">
<style>
ul,
#myUL {
    list-style-type: none;
    padding-left: 40px;
}

#myUL {
    margin: 0;
    padding: 0;
}

.caret {
    cursor: pointer;
    -webkit-user-select: none;
    /* Safari 3.1+ */
    -moz-user-select: none;
    /* Firefox 2+ */
    -ms-user-select: none;
    /* IE 10+ */
    user-select: none;
}

.caret::before {
    content: "\25B6";
    color: black;
    display: inline-block;
    margin-right: 6px;
}

.caret-down::before {
    transform: rotate(90deg);
}

.nested {
    display: none;
}

.active {
    display: block;
}
</style>
<link rel="stylesheet" href="http://static.jstree.com/3.3.16/assets/dist/themes/default/style.min.css" />

@endsection
@section('content')
@include('client.components.body-header')
<div class="container emp-profile" style="margin-top: 0;">
    <form method="post">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="profile-head">
                    <ul class="nav nav-tabs my-info-tabs" id="myTab" role="tablist"
                        style="box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2); margin-bottom: 0;">
                        <li class="nav-item">
                            <a class="nav-link active" data-target="couse" id="couse-tab" data-toggle="tab"
                                href="#couse-tab-panel" role="tab" aria-controls="couse-tab-panel"
                                aria-selected="true">Friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="subscription" id="subscription-tab" data-toggle="tab"
                                href="#subscription-tab-panel" role="tab" aria-controls="subscription-tab-panel"
                                aria-selected="false">Profit Earned logs</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-target="subscription1" id="subscription1-tab" data-toggle="tab"
                                href="#subscription1-tab-panel" role="tab" aria-controls="subscription1-tab-panel"
                                aria-selected="false">Profit provided logs</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 0;">

            <div class="col-md-12 col-sm-12">
                <div class="tab-content profile-tab my-info-detail-panel" id="myTabContent">
                    <div class="tab-pane fade show active" id="couse-tab-panel" role="tabpanel"
                        aria-labelledby="couse-tab">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="profile-head">
                                    <div class=" position-relative background-skyblue" style="padding: 10px;">
                                        <small style="padding: 0; font-weight: bold; color:#495057;   ">INVITE
                                            URL</small>
                                        <h1 style="font-size: 20px; margin-top: 0.5rem; color: #495057;">
                                            {{url('mlm/join/'.Auth()->user()->user_name)}}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <ul id="myUL">
                                    @if(count($my_friends))
                                    @foreach($my_friends as $index => $friend)
                                    @if(count($friend[1]))
                                    <li><span class="fa fa-user"><i class="jstree-icon jstree-ocl"
                                                role="presentation"></i>{{$friend[0]}}</span>
                                        <ul class="nested active">
                                            @php
                                            $children = $friend[1];
                                            @endphp
                                            @foreach ($children as $friend)
                                            @if(count($friend[1]))
                                            <li><span class="fa fa-user">{{$friend[0]}}</span>
                                                <ul class="nested active">
                                                    @php
                                                    $children = $friend[1];
                                                    @endphp
                                                    @foreach ($children as $friend)
                                                    @if(count($friend[1]))
                                                    <li><span class="fa fa-user">{{$friend[0]}}</span>
                                                        <ul class="nested active">
                                                            @php
                                                            $children = $friend[1];
                                                            @endphp
                                                            @foreach ($children as $friend)
                                                            @if(count($friend[1]))
                                                            <li><span class="fa fa-user">{{$friend[0]}}</span>
                                                                <ul class="nested active">
                                                                    @php
                                                                    $children = $friend[1];
                                                                    @endphp
                                                                    @foreach ($children as $friend)
                                                                    <li><span class="fa fa-user">{{$friend[0]}}</span>
                                                                    </li>
                                                                    @endforeach
                                                                </ul>
                                                            </li>
                                                            @else
                                                            <li><span class="fa fa-user">{{$friend[0]}}</span></li>
                                                            @endif
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                    @else
                                                    <li><span class="fa fa-user">{{$friend[0]}}</span></li>
                                                    @endif
                                                    @endforeach
                                                </ul>
                                            </li>
                                            @else
                                            <li><span class="fa fa-user">{{$friend[0]}}</span></li>
                                            @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li><span class="fa fa-user">{{$friend[0]}}</span></li>
                                    @endif
                                    @endforeach
                                    @endif
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <div id="data" class="demo"></div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="subscription-tab-panel" role="tabpanel"
                        aria-labelledby="subscription-tab">
                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">

                                <thead>
                                    <th class="text-center">Friend</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Time</th>
                                </thead>
                                <tbody class="user-subscription-list">
                                    @foreach ($profit_earned_log as $history)
                                    <tr>
                                        <td class="text-left">{{@$history->user->user_name}}</td>
                                        <td class="text-center">{{$history->service->title}}</td>
                                        <td class="text-center">{{$history->profit_amount}} NCS</td>
                                        <td class="text-center">
                                            {{date( "Y-m-d H:i:s", strtotime($history->created_at) )}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="subscription1-tab-panel" role="tabpanel"
                        aria-labelledby="subscription1-tab">
                        <div class="table-responsive">
                            <table class="table table-bordred table-striped">

                                <thead>
                                    <th class="text-center">Friend</th>
                                    <th class="text-center">Course Name</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Time</th>
                                </thead>
                                <tbody class="user-subscription1-list">
                                    @foreach ($profit_providing_log as $history)
                                    <tr>
                                        <td class="text-left">{{@$history->user->user_name}}</td>
                                        <td class="text-center">{{$history->service->title}}</td>
                                        <td class="text-center">{{$history->profit_amount}} NCS</td>
                                        <td class="text-center">
                                            {{date( "Y-m-d H:i:s", strtotime($history->created_at) )}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('custom_js')
<script src="http://static.jstree.com/3.3.16/assets/dist/jstree.min.js"></script>
<script>
$(document).ready(function() {
    console.log("MLM DASHBOARD page init!");

    // $('#data').jstree({
    // 	'core' : {
    // 		'data' : [
    // 			{ "text" : "Root node", "children" : [
    // 					{ "text" : "Child node 1" },
    // 					{ "text" : "Child node 2" }
    // 			]}
    // 		]
    // 	}
    // });
    $('#data').jstree({
        'core': {
            'data': [{
                "text": "Root node",
                "state": {
                    "opened": true
                },
                "icon": "fa fa-user",
                "children": [{
                        "text": "Child node 1",
                        "state": {
                            "selected": true
                        },
                        "icon": "fa fa-user",
                        "children": [{
                            "text": "Child node 3",
                            "state": {
                                "disabled": true
                            },
                            "icon": "fa fa-user"
                        }]
                    },
                    {
                        "text": "Child node 2",
                        "state": {
                            "disabled": true
                        },
                        "icon": "fa fa-user"
                    }
                ]
            }]
        }
    });

    var toggler = document.getElementsByClassName("caret");
    var i;

    for (i = 0; i < toggler.length; i++) {
        toggler[i].addEventListener("click", function() {
            this.parentElement.querySelector(".nested").classList.toggle("active");
            this.classList.toggle("caret-down");
        });
    }

});
</script>
@endsection