@extends('layouts.app')

@section('content')
@if(session('status'))
<div class="row">
  <div class="col-md-offset-2 col-md-8 alert alert-success">
      <p>
        @if(session('status')=='CREATED')
          New employee successfully added !
        @elseif(session('status')=='UPDATED')
          Employee successfully updated !
        @endif
      </p>
  </div>
  @endif
  <br/>
</div>

<div class="container">
  <div class="row">
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h4 class="panel-title">
              <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Filters</a>
            </h4>
          </div>
          <div id="collapse1" class="panel-collapse collapse in">
            <div class="panel-body">
              {{Form::open(array('action'=>'EmployeeController@filter', 'class'=>'form-horizontal'))}}
                  <div class="form-group">
                    {{Form::label('current_salary', 'Current salary above', array('class'=>'control-label col-md-2'))}}
                    <div class="col-md-10">
                      {{Form::number('current_salary', NULL, array('class'=>'form-control'))}}
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      {{Form::label('gender', 'Gender', array('class'=>'control-label col-md-2'))}}
                      <div class="col-md-5">
                        {{Form::radio('gender','male', false, array('class'=>'radio-inline','style'=>'vertical-align: middle; margin: 0px;'))}} {{Form::label('male', 'Male', array('class'=>'control-label'))}}
                      </div>
                      <div class="col-md-5">
                        {{Form::radio('gender','female', false, array('class'=>'radio-inline','style'=>'vertical-align: middle; margin: 0px;'))}} {{Form::label('female', 'Female', array('class'=>'control-label'))}}
                      </div>
                    </div>
                  </div>
                  <div class="col-md-offset-10 col-md-2">
                    {{Form::submit('Submit', array('class'=>"btn btn-primary form-control"))}}
                  </div>
              {{Form::close()}}
            </div>
          </div>
        </div>
    </div>
  </div>
  </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
              <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>First name</th>
                      <th>Last name</th>
                      <th>Birth date</th>
                      <th>Gender</th>
                      <th>Start date</th>
                      <th>Job title</th>
                      <th>Current salary</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($employees as $employee)
                  <tr>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{\Carbon\Carbon::parse($employee->birth_date)->format('d-m-Y')}}</td>
                    <td>{{$employee->gender}}</td>
                    <td>{{\Carbon\Carbon::parse($employee->start_date)->format('d-m-Y')}}</td>
                    <td>{{$employee->job_title}}</td>
                    <td>{{$employee->current_salary}}</td>
                    <td><a href="{{$employee->id}}/edit"><button type="button" class="btn btn-primary form-control">Update</button></a></td>
                  </tr>
                @endforeach
              </tbody>
              </table>
        </div>
        <div class="text-center">
          {{$employees->links()}}
          <a href="employees/create"><button type="button" class="btn btn-primary form-control">Add an employee to the database</button></a>
        </div>
    </div>
</div>
@endsection
