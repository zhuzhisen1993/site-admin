@extends('layouts.admin')

 @section('content')
     <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/logout') }}">
         {{ csrf_field() }}
         <div class="container">
                 <div class="row">
                         <div class="col-md-8 col-md-offset-2">
                                 <div class="panel panel-default">
                                         <div class="panel-heading">Dashboard</div>

                                         <div class="panel-body">
                                                 You are logged in admin 12345 dashboard!
                                             </div>
                                     </div>
                             </div>
                     </div>
             </div>

         <div class="form-group">
             <div class="col-md-8 col-md-offset-4">
                 <button type="submit" class="btn btn-primary">
                     logout
                 </button>
             </div>
         </div>

     </form>
     @endsection
