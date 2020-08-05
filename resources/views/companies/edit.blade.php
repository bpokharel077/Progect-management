
@extends('layouts.app')

@section('content')
  <div class="col-md-9 col-lg-9 col-sm-9 pull- left">

      <!-- The justified navigation menu is meant for single line per list item.
           Multiple lines will require custom code not provided by Bootstrap. -->
 



      <!-- Example row of columns -->
      <div class="row col-sm-12 col-md-12 col-lg-12" style="background:white;margin:10px;">
        <form method="post" action="{{route('companies.update',[$companies->id])}}">
                {{csrf_field()}}
            <input type="hidden" name="_method"value="put">
            <div class="form-group">
                <label for="">Company Name</label>
                <input type="text" class="form-control" name="name" id="Company name " aria-describedby="company" value="{{$companies->name}}"placeholder="Enter name" required >
                
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control"name="description" id="" placeholder="">{{$companies->description}}</textarea>
            </div>
           
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

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
              <li><a href="/companies/{{$companies->id}} ">View companies</a></li>
              <li><a href="/companies ">All companies</a></li>
         
            </ol>
          </div>
          <!-- <div class="sidebar-module">
            <h4>Archives</h4>
            <ol class="list-unstyled">
              <li><a href="#">March 2014</a></li>

            </ol>
          </div> -->
         
        </div>
  
@endsection