@extends('main-layout.main')

@section('css')

<style>
	.box {

		border: 1px solid #d8dfe3;
		background-color: white;
		font-size: 20px;
		width:90%;
		height:100px;

	}
</style>

<style>
	
	.col-md-2 {

		width:20%;
		border-left: 1px solid #d8dfe3;
		font-family: "Varela Round";
		text-align: center;
	}

	.col-md-3 {

		border-left: 1px solid #d8dfe3;
	}

	.bullet {

		margin-left: 30px;
	}
</style>
@endsection

@section('content')
<div class="container">
	<h2 class="">Status</h2>
	<div class="col-md-10">
		<div class="box">
			<div class="row">
				<div class="col-md-2">
					<h4>New Job</h4>
					<ul class="bullet">
						<li><a title="shows all new jobs" href="{{URL::to('show_all_new_job')}}">{{$data['new_job']}}</a></li>

					</ul>
				</div>
				<div class="col-md-2">
					<h4>In Progress</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>Hold</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>Completed</h4>
					<ul class="bullet">
						<li><a title="show all completed jobs" href="{{URL::to('/show_all_completed_jobs')}}">{{$data['completed_job']}}</a></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>Jobs withsteps</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
</div>

<hr>
<div class="container">
	<h2 class="">My Jobs</h2>
	<div class="col-md-10">
		<div class="box">
			<div class="row">
				<div class="col-md-2">
					<h4>Assigned</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>Job with steps</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>As PM</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>As Sales Rep</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-2">
					<h4>Scheduled</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
</div>
<hr>

<div class="container">
	<h2 class="">Proofs</h2>
	<div class="col-md-10">
		<div class="box">
			<div class="row">
				<div class="col-md-3">
					<h4>Design</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4>Review</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4>Art Past Due</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
				<div class="col-md-3">
					<h4>Art Due Today</h4>
					<ul class="bullet">
						<li></li>
					</ul>
				</div>
			</div>	
		</div>
	</div>
</div>

@endsection