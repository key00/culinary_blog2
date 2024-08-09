<!DOCTYPE html>
<html>

<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style>
        .main-title {
            font-size: 32px;
            font-weight: 700;
            text-align: center;
            padding-top: 40px;
            color: rgb(240, 240, 240);
        }

        .table {

            width: 90%;
            margin: 40px auto;
        }

        table th {
            font-size: 24px;
            font-weight: bold;
            padding: 20px 5px;
            color: rgb(240, 240, 240);
        }

        .post_image {
            width: 50px;
            height: 50px;
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
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                {{session()->get('message')}}
            </div>
            @endif

            <h1 class="main-title">All Posts</h1>

            <table class="table">
                <tr>
                    <th scope="col">Post Title</th>
                    <th scope="col">Post Description</th>
                    <th scope="col">Post Instruction</th>
                    <th scope="col">Posted By</th>
                    <th scope="col">Post Status</th>
                    <th scope="col">User Type</th>
                    <th scope="col">Image</th>
                    <th scope="col">Delete</th>
                </tr>
                @foreach($post as $post)
                <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>{{$post->instruction}}</td>
                    <td>{{$post->name}}</td>
                    <td>{{$post->postStatus}}</td>
                    <td>{{$post->usertype}}</td>
                    <td>

                        <img class="post_image" src="postimage/{{$post->image}}" alt="">
                    </td>
                    <td><a href="{{url('delete_post',$post->id)}}" class="btn btn-danger" onclick="confirm('Are you sure you want to delete the post?')">Delete</a></td>
                </tr>
                @endforeach

            </table>

        </div>

        @include('admin.footer')
</body>

</html>