
@extends('layouts.app')

@section('content')
  <div class="col-md-9 col-lg-9 col-sm-9 pull- left">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
 

      <!-- Jumbotron -->
      <div class="jumbotron">
        <h1>{{$projects->name}}!</h1>
        <p class="lead"> {{$projects->description}}</p>
        <!-- <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p> -->
      </div>

      <!-- Example row of columns -->
      <div class="row" style="background:white;margin:10px;">
      <!-- <a href="/projects/create" class="pull-right btn btn-default btn-sm">Add Project</a> -->
      <br>

  <form method="post" action="{{route('comments.store')}}">
                  {{csrf_field()}}
                  <input type="hidden" name="commentable_type"value="App\project">
                  <input type="hidden" name="commentable_id"value="{{$projects->id}}">


              <div class="form-group">
                  <label for="Comment">Comment</label>
                  <br>
                  <textarea 
                  class="form-control"
                  name="body" 
                  id=" Commentable"
                  cols="100" 
                  rows="3"
                  placeholder="Enter comment"></textarea>
              </div>
              <div class="form-group">
                  <label for="comment-content">Proof of work done(URL/Screenshot)</label>
                  <textarea 
                  class="form-control"
                  name="url" 
                  id=" Commentable" 
                  rows="3"
                  cols="100" 
                  placeholder="Enter URL"></textarea>
              </div>
            
              <button type="submit" class="btn btn-primary">Submit</button>
  </form>

  

  @include('partials.comments')

  </div>
  

      {{--  @foreach($projects->projects as $project)
          <div class="col-lg-4 col-md-4 col-sm-4">
            <h2>{{$project->name}}</h2>
            <p class="text-danger">{{$project->description}}</p>
          
            <p><a class="btn btn-primary" href="/projects/{{$project->id}}" role="button">View details »</a></p>
          </div>

        @endforeach --}} 
        
      </div>
      </div>
      </div>
      <div class="col-sm-3 col-md-3 col-lg-3 pull-right">
          <!-- <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
            <p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
          </div> -->
          <div class="sidebar-module">
            <h4>Actions</h4>
            <ol class="list-unstyled">
              <li><a href="/projects/{{$projects->id}}/edit">Edit</a></li>
              <li><a href="/projects">All projects</a></li>
              
              <li><a href="/projects/create">Add Project</a></li>
@if($projects->user_id==Auth::user()->id)
              <li>
                <a
                herf="#"
                    onclick="
                    var result= confirm('are you sure you want to delete this project?');
                      if(result){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
                    "
                    >
                    Delete
                    </a>
                    <form id="delete-form" action="{{route('projects.destroy',[$projects->id] ) }}"
                    method="POST" style="display:none;">
                              <input type="hidden" name="_method" value="delete">
                              {{csrf_field()}}
                              </form>
              </li>
@endif
              <!-- <li><a href="#">Add New members</a></li> -->
            </ol>
            <div class="form-group">
            <form id="adduser" action="{{route('projects.adduser',[$projects->id] ) }}"method="get">
  <label for="email">Add Members</label>
  <br/>
  <input type="email" id="email"value="E-mail" name="email">
  
  <button type="submit" class="btn btn-default">Add</button>
</form>
</div>
<div class="sidebar-module">
            <h4>Team Member</h4>
            <ol class="list-unstyled">
              <li><a href="#">Ram</a></li>
              <li><a href="#">Xyz</a></li>
              
              <li><a href="#">Shyam</a></li>
          </div>
          <!-- <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>

            </ol>
          </div> -->
         
        </div>
  
@endsection