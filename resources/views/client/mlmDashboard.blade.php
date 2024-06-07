@extends('client.layout.app')

@section('title', 'MLM DASHBOARD')
@section('custom_css')
<link href="{{asset('assets/chess-assets/css/profile.css')}}" rel="stylesheet">
<link href="{{asset('assets/tree/profile.css')}}" rel="stylesheet">
<style>

.fa-user{
    padding-right: 6px;
    font-weight: 600;
    border: none;
    color: #495057;
    font-size: 16px;
}

.jstree-anchor{
    font-weight: 600;
    border: none;
    color: #495057;
}

.jstree-icon.jstree-ocl{
    margin-right: 5px;
}

#jstree1{
    background: lightskyblue;
    padding: 0 10px 1rem 0.5rem;
}

.jstree-default .jstree-leaf>.jstree-ocl{
    margin-right: 5px;
}

.table>:not(caption)>*>*{
    background: lightskyblue;
    text-align: center!important;
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
                                    <div class=" position-relative background-skyblue" style="padding: 1rem 10px 10px 1rem;">
                                        <small style="padding: 0; font-weight: bold; color:#495057;   ">INVITE
                                            URL</small>
                                        <h1 style="font-size: 20px; margin-top: 0.5rem; color: #3d1846; font-weight: bold;">
                                            {{url('mlm/join/'.Auth()->user()->user_name)}}
                                        </h1>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="jstree1" class="demo jstree jstree-1 jstree-default" role="tree"
                                    aria-multiselectable="true" tabindex="0" aria-activedescendant="j1_1"
                                    aria-busy="false" style="padding-top: 1rem;">
                                    <small style="padding: 0; font-weight: bold; color:#495057; background: lightskyblue; padding-left: 0.5rem;">MY FRIENDS</small>
                                    <ul class="jstree-container-ul jstree-children" role="presentation" style="padding-top: 1rem;">
                                        @if(count($my_friends))
                                        @foreach ($my_friends as $friend)
                                        @if(count($friend[1]))
                                        <li role="none" id="j1_1" class="jstree-node  jstree-open">
                                            <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                            <a class="jstree-anchor" href="#" tabindex="-1" role="treeitem"
                                                aria-selected="false" aria-level="1" aria-expanded="true"
                                                id="j1_1_anchor"><i class="fa fa-user"
                                                    role="presentation"></i>{{$friend[0]}}</a>
                                            <ul role="group" class="jstree-children">
                                                @php
                                                $children = $friend[1];
                                                @endphp
                                                @foreach ($children as $friend)
                                                @if(count($friend[1]))
                                                <li role="none" id="j1_1" class="jstree-node  jstree-open">
                                                    <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                                    <a class="jstree-anchor" href="#" tabindex="-1" role="treeitem"
                                                        aria-selected="false" aria-level="1" aria-expanded="true"
                                                        id="j1_1_anchor"><i class="fa fa-user"
                                                            role="presentation"></i>{{$friend[0]}}</a>
                                                    <ul role="group" class="jstree-children">
                                                        @php
                                                        $children = $friend[1];
                                                        @endphp
                                                        @foreach ($children as $friend)
                                                        @if(count($friend[1]))
                                                        <li role="none" id="j1_1" class="jstree-node  jstree-open">
                                                            <i class="jstree-icon jstree-ocl" role="presentation"></i>
                                                            <a class="jstree-anchor" href="#" tabindex="-1"
                                                                role="treeitem" aria-selected="false" aria-level="1"
                                                                aria-expanded="true" id="j1_1_anchor"><i
                                                                    class="fa fa-user"
                                                                    role="presentation"></i>{{$friend[0]}}</a>
                                                            <ul role="group" class="jstree-children">
                                                                @php
                                                                $children = $friend[1];
                                                                @endphp
                                                                @foreach ($children as $friend)
                                                                @if(count($friend[1]))
                                                                <li role="none" id="j1_1"
                                                                    class="jstree-node  jstree-open">
                                                                    <i class="jstree-icon jstree-ocl"
                                                                        role="presentation"></i>
                                                                    <a class="jstree-anchor" href="#" tabindex="-1"
                                                                        role="treeitem" aria-selected="false"
                                                                        aria-level="1" aria-expanded="true"
                                                                        id="j1_1_anchor"><i
                                                                            class="fa fa-user"
                                                                            role="presentation"></i>{{$friend[0]}}</a>
                                                                    <ul role="group" class="jstree-children">
                                                                        @php
                                                                        $children = $friend[1];
                                                                        @endphp
                                                                        @foreach ($children as $friend)
                                                                        <li role="none" id="j1_7"
                                                                            class="jstree-node  jstree-leaf jstree-last">
                                                                            <i class="jstree-icon jstree-ocl"
                                                                                role="presentation"></i><a
                                                                                class="jstree-anchor"
                                                                                href="//www.jstree.com" tabindex="-1"
                                                                                role="treeitem" aria-selected="false"
                                                                                aria-level="1" id="j1_7_anchor"><i
                                                                                    class="fa fa-user"
                                                                                    role="presentation"></i>{{$friend[0]}}</a>
                                                                        </li>
                                                                        @endforeach
                                                                    </ul>
                                                                </li>
                                                                @else
                                                                <li role="none" id="j1_7"
                                                                    class="jstree-node  jstree-leaf jstree-last"><i
                                                                        class="jstree-icon jstree-ocl"
                                                                        role="presentation"></i><a class="jstree-anchor"
                                                                        href="//www.jstree.com" tabindex="-1"
                                                                        role="treeitem" aria-selected="false"
                                                                        aria-level="1" id="j1_7_anchor"><i
                                                                            class="fa fa-user"
                                                                            role="presentation"></i>{{$friend[0]}}</a>
                                                                </li>
                                                                @endif
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                        @else
                                                        <li role="none" id="j1_7"
                                                            class="jstree-node  jstree-leaf jstree-last"><i
                                                                class="jstree-icon jstree-ocl"
                                                                role="presentation"></i><a class="jstree-anchor"
                                                                href="//www.jstree.com" tabindex="-1" role="treeitem"
                                                                aria-selected="false" aria-level="1" id="j1_7_anchor"><i
                                                                    class="fa fa-user"
                                                                    role="presentation"></i>{{$friend[0]}}</a></li>
                                                        @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @else
                                                <li role="none" id="j1_7" class="jstree-node  jstree-leaf jstree-last">
                                                    <i class="jstree-icon jstree-ocl" role="presentation"></i><a
                                                        class="jstree-anchor" href="//www.jstree.com" tabindex="-1"
                                                        role="treeitem" aria-selected="false" aria-level="1"
                                                        id="j1_7_anchor"><i class="fa fa-user"
                                                            role="presentation"></i>{{$friend[0]}}</a>
                                                </li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </li>
                                        @else
                                        <li role="none" id="j1_7" class="jstree-node  jstree-leaf jstree-last"><i
                                                class="jstree-icon jstree-ocl" role="presentation"></i><a
                                                class="jstree-anchor" href="//www.jstree.com" tabindex="-1"
                                                role="treeitem" aria-selected="false" aria-level="1" id="j1_7_anchor"><i
                                                    class="fa fa-user"
                                                    role="presentation"></i>{{$friend[0]}}</a></li>
                                        @endif
                                        @endforeach
                                        @endif
                                    </ul>
                                </div>
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
                                        <td class="text-left">{{@$history->fromUser->user_name}}</td>
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
                                        <td class="text-left">{{@$history->toUser->user_name}}</td>
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

    $("#jstree1").find("a").on("click", function(event){
        event.preventDefault();
    });

});
</script>
@endsection