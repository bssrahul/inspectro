@extends('layouts.home')
@section('content')

    <div class="one_section" id="ourmisiionsec">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="block-img">
              <h3>Our Team</h3>
              <p> {!! option('site.description') !!}</p>

            </div>
          </div>
          <div class="col-lg-6">
            <div class="block-img">
              <h3>Our Mission</h3>
              <p>{!! option('site.mission') !!}</p>
            </div>
          </div>
        </div>
      </div>
       <img class="img-back" src="{{ asset('/public/img/img1.png') }}">
    </div>

    <div class="two_section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <h3>Are you ready for an adventure?</h3>
            <span>Education doesn't have to be boring, let it take flight! </span><img src="{{ asset('/public/img/plan.png') }}">
            <ul>
              <li>Get travel tips and latest updates from our  <a href="https://www.facebook.com/flyingchalks?fref=ts" target="_blank"><i class="fa fa-facebook we"></i>Facebook page.</a></li>
              <li><a href="#">Sign up</a> here to be part of our growing International community!</li>
            </ul>
			{!! Form::open(array('route' => 'subscriber.store','id'=>'about_sub_form')) !!}
				{!! Form::text('email',null,array('id'=>'email','class'=>'required email','placeholder'=>'Your email address')) !!}
			
					<input type="submit" value="Go" onclick="return validateSubscriber();">
				{!! Form::close() !!}
            <p>Stay tuned for more updates to come!</p>
          </div>
        </div>
      </div>
      <img class="img-back" src="{{ asset('/public/img/img2.png') }}">
    </div>
@stop




	
