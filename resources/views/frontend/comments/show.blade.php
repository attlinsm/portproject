@foreach($comments as $comment)
    <ul class="comment__list">
        <li class="comment__item {{ $comment->parent_id != null ? 'ml-40' : ''}}">
            <div class="comment__thumb">
                <img src="{{ asset('storage/upload/admin_images/' . $comment->user->profile_image) }}" alt="">
            </div>
            <div class="comment__content">
                <div class="comment__avatar__info">
                    <div class="info">
                        <h4 class="title">{{ $comment->user->name }}</h4>
                        <span class="date">{{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}</span>
                    </div>
                    <a href="#" class="reply"><i class="far fa-reply-all"></i></a>
                </div>
                <p>{{ $comment->comment }}</p>
            </div>
        </li>
        <form class="mt-4 mb-4 {{ $comment->parent_id != null ? 'ml-40' : ''}}" method="POST" action="{{ route('comments.store') }}">
            @csrf
            <input type="text" name="comment" class="form-control"/>
            <input type="hidden" name="blog_id" value="{{ $comment->blog_id }}" />
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            <input type="submit" class="btn btn-danger mt-4" value="Reply" />
        </form>
    @include('frontend.comments.show', ['comments' => $comment->replies])
    </ul>
@endforeach








