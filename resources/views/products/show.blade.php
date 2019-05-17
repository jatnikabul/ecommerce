@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-3">
          <img src="{{ asset('/images/' , ['image_url' => $product['image_url']]) }}" width="200" height="300" class="img-responsive">
        </div>

        <div class="col-md-9">
          <h3>          
             {{ $product['name'] }}
          </h3>
          <h4>
             {{ $product['price'] }}
          </h4>
          
          <div class="mt-4">
              <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
          </div>

          <div class="mt-2">
            <a href="https://www.facebook.com/share/sharer.php??u={{ route('products.show', ['id' => $product['id']]) }}"
              class="social-button" target="_blank">
              Share Facebook
            </a> |
            <a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => 
            $product['id']]) }}" class="social-button" target="_blank">
              Share Twitter
            </a> |
            <a href="https://www.linkedin.com/shareArticle?min=true&amp;url={{ route('products.show', ['id' =>
            $product['id']]) }}&amp;title=my share text&amp;summary=dit is de Linkedin summary" class="social-button"
            target="_blank">
              Share Linkedin
            </a> |
            <a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}" class="social_button"
            target="_blank">
              Share WhatsApp
            </a>
          </div>

          <div class="mt-4">
            <ul class="nav nav-tabs" role="tablist">
              <li class="nav-items">
                <a class="nav-link active" href="#description" role="tab" data-toggle="tab">Deskription</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#review" role="tab" data-toggle="tab">Review</a>
              </li>
            </ul>


            <!-- Tab panes -->
            <div class="tab-content mt-2">
                <div role="tabpanel" class="tab-pane fade in active show" id="description">
                    {!! $product['description'] !!}
                </div>
                <div role="tabpanel" class="tab-pane fade" id="review">
                <textarea type="number" class="form-control" rows="3" name="description" id="deskripsi"></textarea>
                <span class="star-rating star-5">
                <input type="radio" name="rating" value="1"><i></i>
                <input type="radio" name="rating" value="2"><i></i>
                <input type="radio" name="rating" value="3"><i></i>
                <input type="radio" name="rating" value="4"><i></i>
                <input type="radio" name="rating" value="5"><i></i>
              </span>
              <br><br>
              <span class="star-rating star-3">      
                <input type="radio" name="rating" value="1"><i></i>
                <input type="radio" name="rating" value="2"><i></i>
                <input type="radio" name="rating" value="3"><i></i>
              </span>
              <button type="submit" class="btn btn-primary">Review</button>
              <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!-- <div class="container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1" id="logout">
        <div class="page-header">
            <h3 class="reviews">Leave your comment</h3>
            <div class="logout">
                <button class="btn btn-default btn-circle text-uppercase" type="button" onclick="$('#logout').hide(); $('#login').show()">
                    <span class="glyphicon glyphicon-off"></span> Logout                    
                </button>                
            </div>
        </div> -->
        <!-- <div class="comment-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="active"><a href="#comments-logout" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Comments</h4></a></li>
                <li><a href="#add-comment" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Add comment</h4></a></li>
                <li><a href="#account-settings" role="tab" data-toggle="tab"><h4 class="reviews text-capitalize">Account settings</h4></a></li>
            </ul>             -->
            <div class="tab-content">
                <div class="tab-pane active" id="comments-logout">                
                    <ul class="media-list">
                      <li class="media">
                        <a class="pull-left" href="#">
                          <!-- <img class="media-object img-circle" src="https://stock.adobe.com/images/id/167153279?as_campaign=pixabay&as_content=api&tduid=cce8706d387dc44da36a664066441c13&as_channel=affiliate&as_campclass=redirect&as_source=arvato" alt="profile"> -->
                        </a>
                        <div class="media-body">
                          <div class="well well-lg">
                              <h4 class="media-heading text-uppercase reviews">Maman dago </h4>
                              <ul class="media-date text-uppercase reviews list-inline">
                                <li class="dd">01</li>
                                <li class="mm">05</li>
                                <li class="aaaa">2019</li>
                              </ul>
                              <p class="media-comment">
                                Hai guys.
                              </p>
                              <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                              <a class="btn btn-warning btn-circle text-uppercase" data-toggle="collapse" href="#replyOne"><span class="glyphicon glyphicon-comment"></span> 1 comments</a>
                          </div>              
                        </div>
                        <!-- <div class="collapse" id="replyOne">
                            <ul class="media-list">
                                <li class="media media-replied">
                                    <a class="pull-left" href="#">
                                      <img class="media-object img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/ManikRathee/128.jpg" alt="profile">
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> The Hipster</h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">22</li>
                                            <li class="mm">09</li>
                                            <li class="aaaa">2014</li>
                                          </ul>
                                          <p class="media-comment">
                                            Nice job Maria.
                                          </p>
                                          <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                      </div>              
                                    </div>
                                </li> -->
                                <li class="media media-replied" id="replied">
                                    <a class="pull-left" href="#">
                                      <!-- <img class="media-object img-circle" src="https://pbs.twimg.com/profile_images/442656111636668417/Q_9oP8iZ.jpeg" alt="profile"> -->
                                    </a>
                                    <div class="media-body">
                                      <div class="well well-lg">
                                          <h4 class="media-heading text-uppercase reviews"><span class="glyphicon glyphicon-share-alt"></span> Bu dina</h4></h4>
                                          <ul class="media-date text-uppercase reviews list-inline">
                                            <li class="dd">02</li>
                                            <li class="mm">05</li>
                                            <li class="aaaa">2019</li>
                                          </ul>
                                          <p class="media-comment">
                                            Hay juga guys.
                                          </p>
                                          <a class="btn btn-info btn-circle text-uppercase" href="#" id="reply"><span class="glyphicon glyphicon-share-alt"></span> Reply</a>
                                      </div>              
                                    </div>
                                </li>
                            </ul>  
                        </div>
                      </li>          
                      <!--  -->
                </div>
            </div>
         </div>
     </div>

  </div>
</div>

@endsection