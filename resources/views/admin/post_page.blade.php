<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
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
            font-size: 40px !important;



        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif
            <h1 class="post-title">New Post</h1>

            <div class="post_form">
                <form action="{{url('add_post')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label" for="title">Title</label>
                    <input class='form-control' type="text" name="title" id="title" required>

                    <label class="form-label" for="image">Image</label>
                    <input class='form-control' type="file" name="image" id="image" required>

                    <label class="form-label" for="description">Post Description</label>
                    <textarea class='form-control' type="text" name="description" id="description" required></textarea>

                    <label class="form-label" for="instruction">Recipe Instruction</label>
                    <textarea class='form-control' type="text" name="instruction" id="instruction" required></textarea>



                    <center> <button type="submit" class="btn btn-primary submit">Submit</button></center>
                </form>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>