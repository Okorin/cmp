@extends('layouts.master')

@section('title', $user->name . '\'s userpage')
    <style>
	.border-right {
        border-right:1px solid #e9ecef !important;
        };
	</style>
@section('content')
    <div class="row" style="">
		<div class="col-5 border-right border-primary user_display" style="">
		    <div class="row justify-content-center">
				<div class="d-flex" style="justify-content:center;text-align:center;">
				    <!-- This div below can be replaced with a image. -->
			        <div class="col-12 rounded-circle .d-inline-flex" style="height:256px;width:256px;border:0.3em solid grey;border-color:rgba(0,0,0,0.2);text-align:center;"> 
				        <br><p>Insert pfp <br>here</p>
				        </div>
					</div>
				<div class="col-2"></div>
				<div class="col-8" style="text-align:center;">
					<br><h1 style="color:#{{ $user->getColor() }}">{{ $user->name }}</h1>
                    <strong>{{ $user->getTitle() }}</strong>
					<div class="d-flex flex-column">
	                    @foreach($modeparticipants as $key => $participants)
                            @if(!$participants->isEmpty())
                                {{ $gamemodes[$key-1]->name }}
                            @endif
                            @foreach($participants as $participant)
				               	<div class="p-2">
                                    <a href="{{ route('cycle.show', $participant->cycle->id) }}">
                                        <span class="badge badge-primary" style="background-color:#{{ $participant->role->color }}">
					    	    	        {{ $participant->role->name }} - Cycle {{ $participant->cycle->id }}
    				                    </span>
                                    </a>
			                    </div>
                            @endforeach
                        @endforeach
	                </div>
				</div>
				<div class="col-2"></div>
			</div>
		</div>
    		<div class="col-7 user_bio" style="">
	            <h1>ban anime</h1>
    		    <p>yes oko this is me idk what to write here but ye<br>
                <br>
        	    i've been here since the beginning and pretty much created the program and stuff<br>
 	            <br>
	            if you want to pick me as a mentor make sure you have a really wierd name before<br>clicking the request button thing</p>
	        </div>
    	<div class="col-12 achievment_display" style="height:40vh;margin:5vh 5vw;">
	    </div>
	</div>
@endsection