<div class="row">
		<div class="col-md-12  col-sm-12  col-xs-12 col-lg-12 ">
        
            <!-- Fluid width widget -->        
    	    <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <span class="glyphicon glyphicon-comment"></span> 
                        Recent Comments
                    </h3>
                    
                </div>
                <div class="panel-body">
                    <ul class="media-list">
                    @foreach($comments as $comment)
                        <li class="media">
                            <div class="media-left">
                                <img src="http://placehold.it/60x60" class="img-circle">
                            </div>
                            <div class="media-body">
                                <h4 class="media-heading">
                                    {{$comment->user->name}}
                                    <br>
                                    <small>
                                        commented on <a href="/projects/{{$projects->id}}">{{$projects->name}}</a>
                                    </small>
                                </h4>
                                <p>
                                {{$comment->body}}
                                </p>
                                <p class ="text-danger">{{$comment->url}}</p>
                            </div>
                        </li>
                          @endforeach
                    </ul>
                    
                    
                
            </div>
            </div>