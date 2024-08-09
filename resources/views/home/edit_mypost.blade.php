<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('home.homecss')

    <style>
        .post-title {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            padding: 40px;
        }

        .post_form {
            width: 80%;
            margin: 10px auto;
            padding: 20px;
            font-size: 20px !important;

        }

        label {
            font-weight: 700;
            font-size: 20px;
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

    <div>
        @if(session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            {{session()->get('message')}}
        </div>
        @endif

        <h1 class="post-title">Edit My Post</h1>

        <div class="post_form">

            <form action="{{url('update_post',$data->id)}}" method="post" enctype="multipart/form-data">
                @csrf

                <label class="form-label" for="title">Title</label>
                <input class='form-control' type="text" name="title" id="title" required value="{{$data->title}}">

                <label class="form-label" for="image">Current Image</label>
                <img src="/postimage/{{$data->image}}" alt="" width="200" height="100">

                <label class="form-label pt-2" for="new_image">Choose New Image</label>
                <input class='form-control' type="file" name="new_image" id="new_image">

                <label class="form-label" for="description">Post Description</label>
                <textarea class='form-control' type="text" name="description" id="description" rows="4" required>{{$data->description}}</textarea>

                <label class="form-label" for="instruction">Recipe Instruction</label>
                <textarea class='form-control' type="text" name="instruction" id="instruction" rows="4" required>{{$data->instruction}}</textarea>



                <center> <button type="submit" class="btn btn-danger submit my-4 p-3">Submit</button></center>
            </form>
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
    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.slicknav.js"></script>
    <script src="/js/jquery.nice-select.min.js"></script>
    <script src="/js/mixitup.min.js"></script>
    <script src="/js/main.js"></script>
</body>

</html>