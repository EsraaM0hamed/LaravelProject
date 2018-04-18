@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Employee</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

         <table class="table"> 
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Image</th>
                <th>Job Text</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>
            <ul>@foreach ($emps as $emp) 
            
                <tr> 
                <td>{{$emp->first_name}}
               
                </td>
                <td>{{$emp->last_name}}
                
                </td>
                <td><img src="{{Storage::disk('local')->url($emp->image)}}" class="img-circle"  width="100px" height="100px">
                </td>
                <td>{{$emp->job_title}}
               
               </td>
               <td>{{$emp->status}}
               
               </td>
                
                <td><a href="/edit/{{$emp->id}}"><Button  class="btn btn-success" id="edit" >Edit</Button></a>
                <a href="/delete/{{$emp->id}}"><Button  class="btn btn-danger" id="edit" >Delete</Button></a>
                </td>
                </tr>
                
            @endforeach
    </table> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
