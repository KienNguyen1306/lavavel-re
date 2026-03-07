<style>
    .movie-box {
        position: relative;
        border-radius: 13px;
        overflow: hidden;
        transition: transform 0.4s cubic-bezier(.25,.8,.25,1),
            box-shadow 0.4s ease;
    transform-style: preserve-3d;
    }
    .movie-box::after {
    content: "";
    position: absolute;
    left: 0;
    right: 0;
    bottom: 0;
    height: 55%;
    background: linear-gradient(
        to top,
        rgba(0,0,0,0.9) 0%,
        rgba(0,0,0,0.7) 40%,
        rgba(0,0,0,0.4) 70%,
        rgba(0,0,0,0) 100%
    );
    z-index: 1;
}
    .movie_name{
        position: absolute;
        left:12px;
        bottom: 0;
    }
  .movie-box:hover {
     /* transform: translateY(-10px) rotateX(4deg) scale(1.03); */
      transform: scale(1.03);
    box-shadow: 
        0 25px 50px rgba(0,0,0,0.3),
        0 15px 20px rgba(0,0,0,0.15);
   }
    .movie-quality {
        position: absolute;
        top: 0.5rem;
        left: 0.5rem;
        padding-top: 0.125rem;
        padding-bottom: 0.125rem;
        background-color: #14c59b;
        padding-left: 0.5rem;
        padding-right: 0.5rem;
        z-index: 10;
        border-radius: 0.25rem;
        color: #0e1115;
        font-weight: 700;
        font-size: 10px;
    }

    .movie-episode {
        position: absolute;
        right: 0.5rem;
        top: 0.5rem;
        padding: 2px 8px;
        background-color: #ff9f1a;
        z-index: 10;
        border-radius: 4px;
        color: #0e1115;
        font-weight: 600;
        font-size: 10px;
        overflow: hidden;
    }
@media (max-width: 414px) {
    .movie-episode {
        right: unset;
        left: 0.5rem;
        top: 2rem; 
    }
}
    /* ánh sáng */
    .movie-episode::before {
        content: "";
        position: absolute;
        top: -10px;
        left: -30px;
        width: 10px;
        height: 250%;
        background: rgba(255, 255, 255, 0.5);
        transform: rotate(45deg);
        animation: shine 0.5s linear infinite alternate;
    }

    @keyframes colorChange {
        0% {
            background: rgba(255, 0, 0, 0.5);
        }

        25% {
            background: rgba(0, 255, 0, 0.5);
        }

        50% {
            background: rgba(0, 150, 255, 0.5);
        }

        75% {
            background: rgba(255, 0, 255, 0.5);
        }

        100% {
            background: rgba(255, 0, 0, 0.5);
        }
    }

    /* chạy qua lại */
    @keyframes shine {
        from {
            left: -40px;
        }

        to {
            left: 120%;
        }
    }
.movie-title,
.movie-meta,
.movie-meta span,
.meta-item svg {
    transition: all 0.3s ease;
}
.movie-box:hover .movie-title {
    color: #ffd166; /* vàng nổi bật */
}

.movie-box:hover .movie-meta {
    color: #ffffff; /* đổi màu chữ năm */
}

.movie-box:hover .meta-item svg {
    color: #ffd166; /* icon đổi màu theo */
}
    .card-content {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 8px;
  z-index: 2;
  padding-top: 40%
}

.movie-title {
  font-weight: 600;
  font-size: 14px;

  margin-bottom: 2px;
  display: -webkit-box;
  -webkit-line-clamp: 1;
  -webkit-box-orient: vertical;
  overflow: hidden;
  transition: color 0.3s;
    font-weight: 700;
    color: #ffffff;
    text-shadow: 0 2px 8px rgba(0,0,0,0.8);
}

.card:hover .movie-title {
  color: #3b82f6; /* primary color */
}

.movie-meta {
  display: flex;
  align-items: center;
  gap: 12px;
  font-size: 12px;
  color: #6b7280; /* text-muted-foreground */
}

.meta-item {
  display: flex;
  align-items: center;
  gap: 4px;
}

.icon {
  width: 12px;
  height: 12px;
}

.star {
  color: #3b82f6; /* primary */
}
</style>

<div class="stui-vodlist__box movie-box">
    <div class='movie-quality'>
        {{ $movie->quality }}
    </div>
<div class='movie-episode effect-1'>
            @php
                // Lấy số tập hiện tại (tránh lỗi 2424)
                preg_match('/\d+/', $movie->episode_current ?? '', $match);
                $current = $match[0] ?? 0;

                // Map trạng thái sang tiếng Việt
                $statusMap = [
                    'ongoing' => 'Đang chiếu',
                    'completed' => "Full",
                    'trailer' => 'Trailer',
                ];

                $statusText = $statusMap[$movie->status] ?? $movie->status;
            @endphp

            @if ($movie->type != 'single')
                {{-- Phim bộ --}}
                @php
                    $total = preg_replace('/\D/', '', $movie->episode_total);
                @endphp
                {{ $current }}/{{ $total }} Tập
            @else
                {{-- Phim lẻ --}}
                {{ $statusText }}
            @endif
        </div>

   <a class="stui-vodlist__thumb"
   href="{{ $movie->getUrl() }}"
   title="{{ $movie->name }}"
   style="background-image: url('{{ $movie->getThumbUrl() }}'); background-size: cover; background-position: center;">
        <span class="play hidden-xs"></span>
        
    </a>
    {{-- <div class="stui-vodlist__detail movie_name">
        <h4 class="title text-overflow">
            <a href="{{ $movie->getUrl() }}" title="{{ $movie->name }}">{{ $movie->name }}</a>
        </h4>

    </div> --}}

    <a href="{{ $movie->getUrl() }}" class="card-content">
  <h3 class="movie-title">{{ $movie->name }}</h3>

  <div class="movie-meta">
    <div class="meta-item rating">
      <!-- icon star -->
      <svg class="icon star" viewBox="0 0 24 24" fill="currentColor">
        <path d="M11.525 2.295a.53.53 0 0 1 .95 0l2.31 4.679a2.123 2.123 0 0 0 1.595 1.16l5.166.756a.53.53 0 0 1 .294.904l-3.736 3.638a2.123 2.123 0 0 0-.611 1.878l.882 5.14a.53.53 0 0 1-.771.56l-4.618-2.428a2.122 2.122 0 0 0-1.973 0L6.396 21.01a.53.53 0 0 1-.77-.56l.881-5.139a2.122 2.122 0 0 0-.611-1.879L2.16 9.795a.53.53 0 0 1 .294-.906l5.165-.755a2.122 2.122 0 0 0 1.597-1.16z"/>
      </svg>
      <span>{{ $movie->rating_star }}</span>
    </div>

    <div class="meta-item">
      <!-- icon clock -->
      <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
        <circle cx="12" cy="12" r="10"></circle>
        <polyline points="12 6 12 12 16 14"></polyline>
      </svg>
      <span>{{ $movie->publish_year }}</span>
    </div>
  </div>
</a>
</div>
