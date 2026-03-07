<style>
    /* =========================
   CONTAINER
========================= */
    .reply-form {
        margin-top: 10px;
        display: flex;
        gap: 8px;
        animation: fadeUp 0.3s ease forwards;
    }

    /* =========================
   AVATAR
========================= */
    .reply-avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: rgba(37, 99, 235, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 4px;
        flex-shrink: 0;
    }

    .reply-avatar span {
        font-size: 9px;
        font-weight: bold;
        color: #2563eb;
    }

    /* =========================
   INPUT AREA
========================= */
    .reply-input {
        flex: 1;
    }

    .reply-input textarea {
        width: 100%;
        background: rgba(243, 244, 246, 0.4);
        border: 1px solid rgba(229, 231, 235, 0.4);
        border-radius: 8px;
        padding: 8px;
        font-size: 11px;
        color: #111827;
        resize: none;
        transition: all 0.2s ease;
    }

    .reply-input textarea::placeholder {
        color: #6b7280;
    }

    .reply-input textarea:focus {
        outline: none;
        border-color: rgba(37, 99, 235, 0.5);
        box-shadow: 0 0 0 2px rgba(37, 99, 235, 0.2);
    }

    /* =========================
   BUTTONS
========================= */
    .reply-actions {
        display: flex;
        justify-content: flex-end;
        gap: 8px;
        margin-top: 6px;
    }
    .reply-actions .btn-submit {
        background-color: #f9941f;
        padding: 10px 25px;
    }
    .reply-actions .btn-cancel {
        padding: 10px 25px;
    }
    .reply-actions button {
        height: 24px;
        padding: 10px 25px;
        border-radius: 6px;
        font-size: 10px;
        font-weight: 500;
        border: none;
        cursor: pointer;
        transition: 0.2s;
    }

    /* Cancel button */
    .btn-cancel {
        background: transparent;
        color: #374151;
    }

    .btn-cancel:hover {
        background: rgba(229, 231, 235, 0.5);
    }

    /* Submit button */
    .btn-submit {
        display: flex;
        align-items: center;
        gap: 4px;
        background: #2563eb;
        color: white;
    }

    .btn-submit:hover {
        background: #9d5807;
        color: white;
    }

    /* icon size */
    .btn-submit svg {
        width: 10px;
        height: 10px;
    }

    /* =========================
   RESPONSIVE
========================= */
    @media (min-width: 640px) {
        .reply-input textarea {
            font-size: 12px;
        }

        .reply-actions button {
            font-size: 12px;
            height: 28px;
        }
    }

    /* =========================
   ANIMATION
========================= */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    /* =========================
   REPLIES CONTAINER
========================= */
    .replies {
        margin-top: 10px;
        margin-left: 4px;
        padding-left: 12px;
        border-left: 2px solid rgba(37, 99, 235, 0.2);
        display: flex;
        flex-direction: column;
        gap: 10px;
        animation: fadeUp 0.3s ease forwards;
    }

    /* =========================
   REPLY ITEM
========================= */
    .reply {
        display: flex;
        gap: 8px;
    }

    /* =========================
   AVATAR
========================= */
    .avatar {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: rgba(243, 244, 246, 0.8);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 9px;
        font-weight: bold;
        color: #111827;
        flex-shrink: 0;
    }

    /* =========================
   BODY
========================= */
    .reply-body {
        flex: 1;
        min-width: 0;
    }

    .reply-header {
        display: flex;
        align-items: center;
        gap: 6px;
        margin-bottom: 2px;
    }

    .name {
        font-size: 11px;
        font-weight: 600;
        color: #111827;
    }

    .time {
        font-size: 9px;
        color: #6b7280;
    }

    .reply-text {
        font-size: 10px;
        color: rgba(17, 24, 39, 0.6);
        margin-bottom: 4px;
    }

    /* =========================
   ACTIONS
========================= */
    .reply-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 9px;
        color: #6b7280;
    }

    .reply-actions button {
        display: flex;
        align-items: center;
        gap: 4px;
        border: none;
        background: none;
        cursor: pointer;
        font-size: inherit;
        color: inherit;
        padding: 0;
        transition: color 0.2s ease;
    }
    .comment-actions.main button {
        background-color: #53310a;
        border: none;
        border-radius: 8px;
        padding: 6px 20px;
        cursor: pointer;
    }

    .comment-actions.main button:hover {
        background-color: #f9941f;
    }

    .comment-actions.main button {
        border: none;
        border-radius: 8px;
        padding: 6px 20px;
    }
    .reply-actions button:hover {
        color: white;
    }

    .reply-actions svg {
        width: 10px;
        height: 10px;
    }
    #load-more-btn {
        cursor: pointer;
        color: #a9671a;
    }
    #load-more-btn:hover {
        color: #f9941f;
    }
    /* =========================
   RESPONSIVE
========================= */
    @media (min-width: 640px) {
        .name {
            font-size: 12px;
        }

        .time {
            font-size: 10px;
        }

        .reply-text {
            font-size: 12px;
        }

        .reply-actions {
            font-size: 10px;
        }
    }

    /* =========================
   ANIMATION
========================= */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    /* Container */
    .comment-box {
        background: #0e1115;
        border: 1px solid #171a20;
        border-radius: 16px;
        padding: 16px;
        font-family: sans-serif;
    }

    /* Textarea */
    .comment-box textarea {
        color: #f0f0f0;
        width: 100%;
        background: #171a20;
        border: 1px solid #171a20;
        border-radius: 10px;
        padding: 12px;
        font-size: 14px;
        resize: none;
        outline: none;
        transition: border-color 0.3s;
    }

    .comment-box textarea:focus {
        border-color: #f9941f80;
    }

    /* Button */
    .comment-actions {
        display: flex;
        justify-content: flex-end;
        margin-top: 8px;
        align-items: center;
        gap: 20px;
    }

    .comment-actions span {
        cursor: pointer;
        font-size: 12px;
    }

    .comment-actions span:hover {
        color: #f9941f;
    }

    /* Comment list */
    .comment-list {
        margin-top: 16px;
    }

    .comment-item {
        display: flex;
        gap: 12px;
        padding-bottom: 12px;
        border-bottom: 1px solid #27293533;
        margin-bottom: 12px;
    }

    .comment-item:last-child {
        border-bottom: none;
        margin-bottom: 0;
    }
    .like-btn span {
        color: #f0f0f0;
    }
    /* Avatar */
    .avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 13px;
    }

    /* Content */
    .comment-content {
        flex: 1;
    }

    .comment-header {
        display: flex;
        gap: 8px;
        margin-bottom: 4px;
    }

    .name {
        font-weight: 600;
        font-size: 14px;
        color: #f0f0f0;
    }

    .time {
        font-size: 12px;
        color: #6b7280;
    }

    .comment-content p {
        font-size: 13px;
        color: #4b5563;
        margin: 0;
    }
    .comment-login-required {
    margin-top: 15px;
    padding: 25px;
    background: #171a20;
    border-radius: 12px;
    text-align: center;
    border: 1px solid #22272f;
}

.login-comment-btn {
    background: linear-gradient(90deg, #6366f1, #ec4899);
    border: none;
    color: white;
    padding: 12px 22px;
    font-size: 15px;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.3s ease;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.25);
}

.login-comment-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.4);
    opacity: 0.95;
}

.login-comment-btn:active {
    transform: translateY(0);
}
</style>

<div class="comment-box">
@auth
    <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="movie_id" value="{{ $movie->id }}" />

        <textarea name="content" placeholder="Viết bình luận của bạn..." rows="3" required></textarea>

        <div class="comment-actions main">
            <button type="submit">Gửi bình luận</button>
        </div>
    </form>
@endauth

@guest
    <div class="comment-login-required">
    <button type="button" class="openAuthModal login-comment-btn">
        🔒 Đăng nhập để bình luận
    </button>
</div>
@endguest
    
    <div class="comment-list">
        @if(isset($comments) && $comments->count()) @foreach($comments as $comment)
        <div class="comment-item">
            <div class="avatar">{{ strtoupper(substr($comment->user->name, 0, 1)) }}</div>
            <div class="comment-content">
                <div class="comment-header">
                    <span class="name">{{ $comment->user->name }}</span>
                    <span class="time">{{ $comment->created_at->diffForHumans() }}</span>
                </div>
                <p>{{ $comment->content }}</p>
                <div class="comment-actions">
                   @auth
<button class="like-btn"
        data-id="{{ $comment->id }}"
        style="border: none; background: none; cursor: pointer;color: white;">
    👍 <span class="like-count">{{ $comment->likes }}</span>
</button>
@endauth

@guest
<button type="button"
        class="openAuthModal"
        style="border: none; background: none; cursor: pointer;color: white;">
    👍 <span class="like-count">{{ $comment->likes }}</span>
</button>
@endguest
                    <span>Trả lời</span>
                    @if($comment->replies->count() > 0)
                    <span class="more"> {{ $comment->replies->count() }} phản hồi </span>
                    @endif
                </div>

                <form action="{{ route('comment.store') }}" method="POST" class="reply-form">
                    @csrf

                    <input type="hidden" name="movie_id" value="{{ $movie->id }}" />
                    <input type="hidden" name="parent_id" value="{{ $comment->id }}" />

                    <div class="reply-input">
                        <textarea name="content" rows="2" required></textarea>

                        <div class="reply-actions">
                            <button type="button" class="btn-cancel">Hủy</button>
                            <button type="submit" class="btn-submit">Gửi</button>
                        </div>
                    </div>
                </form>
                <div class="replies">
                    @foreach($comment->replies as $reply)

                    <div class="reply">
                        <div class="avatar">{{ strtoupper(substr($reply->user->name, 0, 1)) }}</div>

                        <div class="reply-body">
                            <div class="reply-header">
                                <span class="name">{{ $reply->user->name }}</span>
                                <span class="time">{{ $reply->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="reply-text">{{ $reply->content }}</p>
                        </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
        @endforeach @endif
    </div>
    <div style="text-align: center; margin-top: 20px">
        <div style="text-align: center; margin-top: 20px">
            <span id="load-more-btn" class="btn-load-more"> Xem thêm bình luận... </span>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        /* =========================
     TOGGLE REPLY FORM
  ========================== */
        document.querySelectorAll('.comment-actions span').forEach(function (btn) {
            if (btn.textContent.trim() === 'Trả lời') {
                btn.addEventListener('click', function () {
                    const commentItem = btn.closest('.comment-content');
                    const replyForm = commentItem.querySelector('.reply-form');

                    if (replyForm) {
                        replyForm.style.display = replyForm.style.display === 'none' || replyForm.style.display === '' ? 'flex' : 'none';
                    }
                });
            }
        });

        /* =========================
     CANCEL BUTTON
  ========================== */
        document.querySelectorAll('.btn-cancel').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const form = btn.closest('.reply-form');
                if (form) {
                    form.style.display = 'none';
                }
            });
        });

        /* =========================
     TOGGLE REPLIES
  ========================== */
        document.querySelectorAll('.comment-actions .more').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const commentItem = btn.closest('.comment-content');
                const replies = commentItem.querySelector('.replies');

                if (replies) {
                    replies.style.display = replies.style.display === 'none' || replies.style.display === '' ? 'flex' : 'none';
                }
            });
        });

        /* =========================
     MẶC ĐỊNH ẨN FORM + REPLIES
  ========================== */
        document.querySelectorAll('.reply-form').forEach(function (form) {
            form.style.display = 'none';
        });

        document.querySelectorAll('.replies').forEach(function (rep) {
            rep.style.display = 'none';
        });
    });
</script>
<script>
document.querySelectorAll('.like-btn').forEach((button) => {

    let commentId = button.dataset.id;

    // Kiểm tra đã like chưa khi load trang
    let likedComments = JSON.parse(localStorage.getItem('likedComments')) || [];

    if (likedComments.includes(commentId)) {
        button.style.opacity = "0.5";
        button.style.pointerEvents = "none";
    }

    button.addEventListener('click', function () {

        let likedComments = JSON.parse(localStorage.getItem('likedComments')) || [];

        // Nếu đã like rồi thì không làm gì
        if (likedComments.includes(commentId)) {
            return;
        }

        let likeCount = this.querySelector('.like-count');

        fetch(`/comment/${commentId}/like`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then((res) => res.json())
        .then((data) => {

            likeCount.innerText = data.likes;

            // Lưu vào localStorage
            likedComments.push(commentId);
            localStorage.setItem('likedComments', JSON.stringify(likedComments));

            // Disable nút
            button.style.opacity = "0.5";
            button.style.pointerEvents = "none";
        });
    });
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let items = document.querySelectorAll('.comment-item');
        let btn = document.getElementById('load-more-btn');

        let visible = 5; // hiển thị ban đầu
        let step = 5; // mỗi lần hiện thêm 2

        // Ẩn các comment dư
        items.forEach((item, index) => {
            if (index >= visible) {
                item.style.display = 'none';
            }
        });

        // Nếu tổng comment <= visible thì ẩn nút luôn
        if (items.length <= visible) {
            btn.style.display = 'none';
        }

        btn.addEventListener('click', function () {
            let hidden = [...items].filter((item) => item.style.display === 'none');

            hidden.slice(0, step).forEach((item) => {
                item.style.display = 'flex';
            });

            // Nếu không còn cái nào bị ẩn → ẩn nút
            let stillHidden = [...items].some((item) => item.style.display === 'none');

            if (!stillHidden) {
                btn.style.display = 'none';
            }
        });
    });
</script>
