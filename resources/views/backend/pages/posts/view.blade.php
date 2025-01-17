<div class="row">
    <div class="col-6 mb-3">
        <h4>Content:</h4>
        <p>{{ $post->content }}</p>
    </div>

    <div class="col-6 mb-3">
        <h4>Image:</h4>
        <div>
            @if (!empty($post->image_url) && $post->image_url != 'null')
                @php
                    $media = json_decode($post->image_url);
                @endphp
                @if (!empty($media) && is_array($media))
                    <div class="carousel-inner">
                        @php $firstSlide = true; @endphp
                        @foreach ($media as $row)
                            @if (isset($row->type) && $row->type == 'image')
                                <div class="carousel-item {{ $firstSlide ? 'active' : '' }}">
                                    <img width="100%" height="100%" src="{{ asset('storage/' . $row->path) }}" />
                                </div>
                            @elseif (isset($row->type) && $row->type == 'video')
                                <div class="carousel-item {{ $firstSlide ? 'active' : '' }}">
                                    <video width="100%" height="100%" autoplay loop muted>
                                        <source src="{{ asset('storage/' . $row->path) }}" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                            @php $firstSlide = false; @endphp
                        @endforeach
                    </div>
                @endif
            @else
                    <p>No media</p>
            @endif
        </div>
    </div>

    <div class="col-6 mb-3">
        <h4>Event:</h4>
        <p>{{ $post->event ? 'Active' : '-' }}</p>
    </div>
    <div class="col-6 mb-3">
        <div class="d-flex align-items-center justify-content-between mt-3 col-12">
            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-1">
                    <h4>Likes:</h4>
                    <img src="/assets/images/heart.png" alt="Likes">
                    <span>{{ $post->likes_count }}</span>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <h4>Comments:</h4>
                    <img src="/assets/images/comment.png" alt="Comments">
                    <span>{{ $post->comments_count }}</span>
                </div>
                <div class="d-flex align-items-center gap-1">
                    <h4>Shares:</h4>
                    <img src="/assets/images/share.png" alt="Shares">
                    <span>{{ $post->shares_count }}</span>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 mb-3">
        <h4>Created By: </h4>
        <span>{{ $post->username }}</span>
    </div>

    <div class="col-6 mb-3">
        <h4>Status:</h4>
        @if($post->status)
            <span class="badge bg-success">Active</span>
        @else
            <span class="badge bg-danger">Inactive</span>
        @endif
    </div>

    <div class="col-6 mb-3">
        <h4>Created At: </h4>
        <span>{{ $post->created_at->format('d M, Y h:iA') }}</span>
    </div>

    <div class="col-6 mb-3">
        <h4>Updated At: </h4>
        <span>{{ $post->updated_at->format('d M, Y h:iA') }}</span>
    </div>

</div>