@extends('layouts.app')

@section('title', 'UEFA Chapions League')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <img class="logo_img" src="/images/logo.png">
        <button type="button" onclick="shuffle()" class="btn btn-outline-warning mx-auto d-block my-4">Shuffle</button>
    </div>
</div>
<div class="row" id="content_box">
</div>

@endsection

@section('script')
<script type="text/javascript">
    $(document).ready(function() {

        $.ajax({
            url: "{{ url('/') }}/api/v1/groups",
            cache: false,
            success: function(data){
                console.log(data)
                for(var row in data.data){
                    $("#content_box").append(HTMLtemplate(row,data.data[row]));
                }
            }
        });
    });

    function shuffle(){
        $.ajax({
            url: "{{ url('/') }}/api/v1/shuffle",
            type: 'PUT',
            cache: false,
            success: function(data){
                location.reload();
            }
        });
    }

    function HTMLtemplate(row,data){
        var dom = '';
        dom += '<div class="card card-default col-md-3">';
        dom += '<div class="panel-collapse collapse show" aria-expanded="true" style="">';
        dom += '<ul class="list-group pull-down" id="contact-list">';
        dom += '<li class="list-group-item group_head">';
        dom += '<div class="row">';
        dom += '<div class="col-12 text-center ">';
        dom += '<h3>Group '+row+'</h3>';
        dom += '</div>';
        dom += '</div>';
        dom += '</li>';
        
        for(var team in data){
            if(data[team].is_domestic_winner){
                dom += '<li class="list-group-item">';
                dom += '<div class="row">';
                dom += '<div class="col-12 col-sm-6 col-md-3">';
                dom += '<img src="'+data[team].club_logo+'" class="rounded-circle mx-auto d-block">';
                dom += '</div>';
                dom += '<div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">';
                dom += '<label class="name lead">'+data[team].name+' ('+data[team].country+')</label>';
                dom += '</div>';
                dom += '</div>';
                dom += '</li>';
            }
        }
        for(var team in data){
            if(!data[team].is_domestic_winner){
                dom += '<li class="list-group-item">';
                dom += '<div class="row">';
                dom += '<div class="col-12 col-sm-6 col-md-3">';
                dom += '<img src="'+data[team].club_logo+'" class="rounded-circle mx-auto d-block">';
                dom += '</div>';
                dom += '<div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">';
                dom += '<label class="name lead">'+data[team].name+' ('+data[team].country+')</label>';
                dom += '</div>';
                dom += '</div>';
                dom += '</li>';
            }
        }
        dom += '</ul>';
        dom += '</div>';
        dom += '</div>';

        return dom;
    }
</script>
@endsection