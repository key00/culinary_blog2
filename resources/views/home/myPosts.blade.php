<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('home.homecss')

    <style>
        .post-title {
            font-size: 30px;
            text-align: center;
            color: #fc0254;
            font-weight: 800;
            padding: 20px;
        }

        .myposts {
            width: 80%;
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    @include('home.header')
    <!-- Header End -->

    @if(session()->has('message'))
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
        {{session()->get('message')}}
    </div>
    @endif

    <div class="myposts">
        <h1 class="post-title">My Posts</h1>


        <div class="row">
            @foreach($data as $data)
            <div class="col-lg-6 my-4">
                <div class="fr-item">
                    <div class="fr-item-img">
                        <img src="postimage/{{$data->image}}" alt="">
                    </div>
                    <div class="fr-item-text">

                        <a href="{{url('edit_mypost',$data->id)}}" class="btn btn-success">Edit Post</a>
                        <a href="{{url('delete_mypost',$data->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete the post?')">Delete Post</a>
                        <h4 class="post_title mt-2 pt-3">{{$data->title}}</h4>
                        <p class="post_desc">{{$data->description}}</p>
                        <p class="mt-2">Posted by <span class="post_author">{{$data->name}}</span> </p>
                        <a href="{{url('post_details',$data->id)}}" class="see-more btn btn-danger my-4">See More</a>

                    </div>
                </div>
            </div>
            @endforeach



        </div>
    </div>
    <!-- Footer Section Begin -->
    @include('home.footer')
    <!-- Footer Section End -->

    <!-- Search model -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>