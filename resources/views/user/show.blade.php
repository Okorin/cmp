@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="row justify-content-md-center" style="padding:0% 5%;">
	    <div class="col-8" style="height:50vh;overflow-y:scroll;overflow-x:hidden;">
		    <div class="row">
		        <div class="col-6 user_display" style="border-right:0.3em ridge grey;border-radius:0em 0.6em 0em 0.6em;">
			        <div class="row">
					    <div class="col-2"></div>
						<div class="col-8" style="">
						    <!-- This div below can be replaced with a image. -->
					        <div class="pfp" style="width:10em;height:10em;border:0.2em solid grey;border-radius:5em;text-align:center;">
					        <p><br>Insert pfp <br>here</p>
					        </div>
						</div>
						<div class="col-2"></div>
					</div>
		        </div>
				<div class="col-6 achievment_display" style="border-bottom:0.3em ridge grey;border-radius:0.6em 0em;">
			    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
			    Praesent sit amet sollicitudin velit, ut venenatis mauris. 
			    Phasellus sed erat sit amet purus mollis mollis. Morbi diam 
			    erat, posuere a nulla sit amet, tincidunt lacinia ipsum. 
		    	Proin volutpat porta massa ut varius. Sed rhoncus, ligula 
		    	id dictum molestie, lacus erat dapibus augue, quis rutrum 
	    		lacus sem quis risus. Nam pellentesque, nisl quis ullamcorper 
	    		malesuada, felis elit gravida ipsum, nec dictum ex arcu in 
		    	magna. Fusce faucibus, magna eu ullamcorper aliquet, tellus 
		    	felis lobortis ex, a maximus tellus libero varius justo. Proin 
		    	tincidunt vestibulum augue, at tincidunt velit accumsan sed. 
		    	Donec velit orci, lacinia sit amet nisl vitae, placerat auctor 
		    	urna. Aliquam erat volutpat. Pellentesque et ultrices tellus. 
		    	Pellentesque vitae dolor quis nulla egestas aliquet nec vel nisl. 
		    	Donec pharetra dolor nisi, porta fringilla justo tincidunt id. 
		    	Sed mollis purus turpis, vel ornare velit dapibus quis. </p>
			    </div>
		    </div>
		</div>
		<div class="col-4">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
		Praesent sit amet sollicitudin velit, ut venenatis mauris. 
		Phasellus sed erat sit amet purus mollis mollis. Morbi diam 
		erat, posuere a nulla sit amet, tincidunt lacinia ipsum. 
		Proin volutpat porta massa ut varius.</p>
		</div>
		<div class="col-12 user_bio" style="margin:5vh 5vw;">
		    <h1>ban anime</h1>
			<p>yes oko this is me idk what to write here but ye<br>
			<br>
			i've been here since the beginning and pretty much created the program and stuff<br>
			<br>
			if you want to pick me as a mentor make sure you have a really wierd name before<br>clicking the request button thing</p>
		</div>
	</div>
@endsection