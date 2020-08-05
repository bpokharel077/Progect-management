@if(isset($errors)&&count($errors) > 0)
    <div class="alert alert-dismissable alert-danger">
    <button type="button" class="close" data-dismiss="alert" aria-lebel="close">
       <span aria-hidden ="true">&times;</span>
    </button>
    @foreach($errors->all() as $errors)
      <li><strong>  {!!$errors !!}
    </strong></li>
    @endforeach
    </div>
@endif