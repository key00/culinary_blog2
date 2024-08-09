<section class="feature-recipe mt-5">
    <div class="section-title">
        <h5>Featured Recipes</h5>
    </div>
    <div class="container po-relative">

        <div class="row">
            @foreach($post as $post)
            <div class="col-lg-6 my-4">
                <div class="fr-item">
                    <div class="fr-item-img">
                        <img src="postimage/{{$post->image}}" alt="">
                    </div>
                    <div class="fr-item-text">
                        <h4 class="post_title">{{$post->title}}</h4>
                        <p class="post_desc">{{$post->description}}</p>
                        <p class="mt-2">Posted by <span class="post_author">{{$post->name}}</span> </p>
                        <a href="{{url('post_details',$post->id)}}" class="see-more btn btn-danger my-4">See More</a>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>