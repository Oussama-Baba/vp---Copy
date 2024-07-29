
@extends('layouts.home')

@section('title', 'Client Post')

@section('content')
<!-- Filter Toggle Switch -->
<br/><br/><br/>
<div class="toggle">
<form method="GET" action="{{ route('client.index') }}" class="mb-4">
    <div class="custom-toggle">
        <input type="checkbox" id="post-filter" name="status" value="processing" {{ request()->get('status') === 'processing' ? 'checked' : '' }} onchange="this.form.submit()">
        <label for="post-filter" class="toggle-label">
            <span class="slider"></span>
        </label>
    </div>
    <span>Show Only Processing</span>
</form>
</div>


@if($posts->isEmpty())
    <p>Your cart is empty.</p>
@else

    @foreach($posts as $post)
    <div class="containe1">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card {{ $post->status }}">
                        <div class="top">
                            <div class="userDeatils">
                                <div class="profileImg">
                                    @if ($post->user->logo)
                                    <img src="{{ asset('storage/' . $post->user->logo) }}" alt="User Logo" class="cover">
                                    @else
                                    <img src="{{ asset('/assets/cart/logo/amanus.jpg') }}" alt="Fallback Logo" class="cover">
                                    @endif
                                </div>
                                <h3>{{ $post->page_name }} <br><span>{{ $post->user->name }}</span></h3>
                            </div>
                            <div class="dot">
                                <img src="{{ asset('/assets/cart/logo/dot.png') }}" alt="dot">
                            </div>
                        </div>

                          <!-- Post Image -->
                    @if ($post->media_path)
                    @if (Str::endsWith($post->media_path, ['.jpg', '.jpeg', '.png']))
                        <img src="{{ asset('storage/' . $post->media_path) }}" alt="{{ $post->title }}" width="300">
                    @elseif (Str::endsWith($post->media_path, ['.mp4']))
                        <video width="300" controls>
                            <source src="{{ asset('storage/' . $post->media_path) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @endif
                @endif

                        <!-- Post Actions -->
                        <div class="btns">
                            <div class="left">
                                <img src="{{ asset('/assets/cart/logo/heart.png') }}" alt="heart" class="heart" onclick="likeButton()">
                                <img src="{{ asset('/assets/cart/logo/comment.png') }}" alt="comment">
                                <img src="{{ asset('/assets/cart/logo/share.png') }}" alt="share">
                            </div>
                            <div class="right">
                                <img src="{{ asset('/assets/cart/logo/bookmark.png') }}" alt="bookmark">
                            </div>
                        </div>
                        <!-- Post Details -->
                        <h4 class="likes">5,489 likes</h4>
                        <h4 class="message">
                            <b>{{ $post->user->name }}</b>
                            {{ $post->description }}
                            @if($post->colon_hashtags)
                            <span>{{ $post->colon_hashtags }}</span>
                            @else
                            <span>#example1#exemple2</span>
                            @endif
                        </h4>
                        <h4 class="comments">View all 546 comments</h4>
                        <div class="addComments">
                            <div class="userImg">
                                <img src="{{ asset('/assets/cart/logo/dot.png') }}" alt="user" class="cover">
                            </div>
                            <input type="text" class="text" placeholder="Add a comment...">
                        </div>
                        <h5 class="postTime">{{ $post->publish_date }}</h5>
                        <!-- Display Post Status -->
                        @if ($post->status == 'accepted' || $post->status == 'declined')
                        <div class="status {{ $post->status }}">
                            {{ ucfirst($post->status) }}
                        </div>
                        <div class="reset">
                            <form action="{{ route('posts.reset', $post) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-warning btn-lg">Reset</button>
                            </form>
                        </div>
                    @else
                        <!-- Accept and Decline Buttons -->
                        <div class="action-btns">
                            <form action="{{ route('posts.accept', $post) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-success btn-lg">Accept</button>
                            </form>
                            <form action="{{ route('posts.decline', $post) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="btn btn-danger btn-lg">Decline</button>
                            </form>
                        </div>
                    @endif

                      <!-- Comment Section -->
<div class="comment-section mt-4">
    <h4>Reviews</h4>
    <form class="comment-form" action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="post_id" value="{{ $post->id }}">
        <div class="form-group">
            <textarea name="comment" class="form-control" placeholder="Write your review here..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    <div class="comments-list mt-3">
        @foreach($post->comments as $comment)
        <div class="comment">
            <b>{{ $comment->user->name }}</b>: {{ $comment->comment }}
        </div>
        @endforeach
    </div>
</div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
@endif

<!-- Inline CSS -->
<style>
    .containe1 {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin-left: 400px;
    }
    .card {
        position: relative;
        width: 360px;
        min-height: 400px;
        background: #fff;
        box-shadow: 15px 15px 60px rgba(0, 0, 0, .15);
        padding: 20px;
    }
    .card .top {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .card .top .userDeatils {
        display: flex;
        align-items: center;
    }
    .card .top .userDeatils .profileImg {
        position: relative;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 8px;
        overflow: hidden;
    }
    .cover {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .card .top .userDeatils h3 {
        font-size: 18px;
        color: #4d4d4f;
        font-weight: 700;
        line-height: 1rem;
        cursor: pointer;
    }
    .card .top .userDeatils span {
        font-size: 0.75em;
    }
    .card .top .dot {
        transform: scale(0.6);
        cursor: pointer;
    }
    .imgBg {
        position: relative;
        width: 100%;
        height: 320px;
        margin: 10px 0 15px;
    }
    .btns {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .btns img {
        max-width: 24px;
        cursor: pointer;
    }
    .btns .left img {
        margin-right: 8px;
    }
    .likes {
        margin-top: 5px;
        font-size: 1em;
        color: #4d4d4f;
    }
    .message {
        font-weight: 400;
        margin-top: 5px;
        color: #777;
        line-height: 1.5em;
    }
    .message b {
        color: #262626;
    }
    .message span {
        color: #1d92ff;
        cursor: pointer;
    }
    .comments {
        margin-top: 10px;
        align-items: center;
        color: #999;
    }
    .addComments {
        display: flex;
        align-items: center;
        margin-top: 10px;
    }
    .addComments .userImg {
        position: relative;
        min-width: 30px;
        height: 30px;
        border-radius: 50%;
        overflow: hidden;
        margin-right: 8px;
    }
    .addComments .text {
        width: 100%;
        border: none;
        outline: none;
        font-weight: 400;
        font-size: 18px;
        color: #262626;
    }
    .addComments .text::placeholder {
        color: #777;
    }
    .postTime {
        margin-top: 10px;
        font-weight: 500;
        color: #777;
    }

    .status {
        margin-top: 10px;
        font-weight: bold;
        padding: 5px 10px;
        border-radius: 5px;
        text-align: center;
    }
    .status.accepted {
        background-color: #d4edda;
        color: #155724;
    }
    .status.declined {
        background-color: #f8d7da;
        color: #721c24;
    }
    .action-btns {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }
    .btn {
        padding: 9px 40px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 14px;
        font-weight: bold;
    }
    .btn-lg {
        width: 100%;
        margin-top: 5px;

    }
    .btn-success {
        background-color: #28a745;
        color: white;
    }
    .btn-danger {
        background-color: #dc3545;
        color: white;
    }
    .btn-warning{
        background-color: #f7f31f;
        color: white;
    }
    .btn-warning:hover {
        background-color: #e9e629;
    }
    .btn-success:hover {
        background-color: #218838;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }



    .custom-toggle {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .custom-toggle input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .toggle-label {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    .toggle-label:before {
        position: absolute;
        content: "";
        height: 25px;
        width: 25px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
        border-radius: 50%;
    }

    input:checked + .toggle-label {
        background-color: #2196F3;
    }

    input:checked + .toggle-label:before {
        transform: translateX(26px);
    }

    .toggle-label .slider {
        display: none;
    }





    .comment-section {
    margin-top: 20px;
}

.comment-section h4 {
    font-size: 18px;
    font-weight: bold;
}

.comments-list {
    margin-top: 10px;
}

.comments-list .comment {
    margin-bottom: 10px;
    font-size: 14px;
    color: #333;
}

.comment-section form {
    margin-bottom: 10px;
}

.form-control {
    width: 100%;
    height: 100px;
    border-radius: 5px;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    font-size: 14px;
}

.btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    padding: 10px 20px;
    font-size: 14px;
    cursor: pointer;
}

.btn-primary:hover {
    background-color: #0056b3;
}
</style>
<script>
    $(document).ready(function() {
        $(document).on('submit', '.comment-form', function(e) {
            e.preventDefault();
            var form = $(this);
            var formData = form.serialize();
            var commentsList = form.closest('.comment-section').find('.comments-list');
            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: formData,
                success: function(response) {
                    commentsList.append(
                        '<div class="comment"><b>' + response.user_name + '</b>: ' + response.comment + '</div>'
                    );
                    form.find('textarea[name="comment"]').val('');
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>

<script>
    function likeButton() {
        let heart = document.querySelector('.heart');
        let likes = document.querySelector('.likes');
        if (heart.src.includes("heart.png")) {
            heart.src = "{{ asset('/assets/cart/logo/heart_red.png') }}";
            likes.innerHTML = "5,490 likes";
        } else {
            heart.src = "{{ asset('/assets/cart/logo/heart.png') }}";
            likes.innerHTML = "5,489 likes";
        }
    }
</script>

@endsection
