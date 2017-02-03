@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    @if(isset($employee))
        {{ Form::model($employee, ['action' => ['EmployeeController@update', $employee->id], 'method' => 'patch', 'class'=>'form-horizontal']) }}
    @else
        {{ Form::open(['action' => 'EmployeeController@store', 'class'=>'form-horizontal']) }}
    @endif
    <div class="form-group">
      {{Form::label('first_name', 'First name',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::text('first_name', NULL, array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('last_name', 'Last name',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::text('last_name',NULL,array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('birth_date','Birth date',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::date('birth_date', NULL, array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('gender', 'Gender', array('class'=>'control-label col-md-2'))}}
      <div class="col-md-5">
        {{Form::radio('gender','male', false, array('class'=>'radio-inline','style'=>'vertical-align: middle; margin: 0px;'))}} {{Form::label('male', 'Male', array('class'=>'control-label'))}}
      </div>
      <div class="col-md-5">
        {{Form::radio('gender','female', false, array('class'=>'radio-inline','style'=>'vertical-align: middle; margin: 0px;'))}} {{Form::label('female', 'Female', array('class'=>'control-label'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('start_date', 'Start date',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::date('start_date',NULL, array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('job_title','Job title',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::text('job_title',NULL,array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="form-group">
      {{Form::label('current_salary','Current salary',array('class'=>'control-label col-md-2'))}}
      <div class="col-md-10">
        {{Form::number('current_salary',NULL,array('class'=>'form-control'))}}
      </div>
    </div>
    <div class="col-md-offset-10 col-md-2">
      {{Form::submit('Submit', array('class'=>"btn btn-primary form-control"))}}
    </div>
    {{Form::close()}}
  </div>
  <br>
  @if ($errors->any())
      <div class="form-group">
        <div class=" alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        </div>
      </div>
      @endif
</div>
@endsection
