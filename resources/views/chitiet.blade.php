@extends('layout')

@section('tieudetrang')
    {{ $tin->tieuDe }} - Tin Chi Tiết
@endsection

@section('noidung')
    <!-- Breadcrumb -->
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb" style="background: transparent; padding: 0;">
            <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="fas fa-home"></i> Trang chủ</a></li>
            <li class="breadcrumb-item"><a href="{{ url('/cat', [$tin->idLT ?? 1]) }}" class="text-decoration-none">Danh mục</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($tin->tieuDe, 50) }}</li>
        </ol>
    </nav>

    <!-- Article Header -->
    <div class="article-header mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <span class="badge bg-primary me-2">{{ $tin->tenLoai ?? 'Tin tức' }}</span>
                <span class="badge bg-success"><i class="far fa-clock me-1"></i> {{ date('d/m/Y', strtotime($tin->ngayDang ?? now())) }}</span>
            </div>
            <div class="text-muted">
                <i class="fas fa-eye me-1"></i> 2.4K lượt xem
                <i class="fas fa-share-alt ms-3 me-1"></i> Chia sẻ
            </div>
        </div>
        
        <h1 class="mb-3" style="font-size: 2.5rem; line-height: 1.2;">{{ $tin->tieuDe }}</h1>
        
        <div class="d-flex align-items-center mb-4">
            <div class="d-flex align-items-center me-4">
                <div class="rounded-circle bg-light p-2 me-2">
                    <i class="fas fa-user text-primary"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Tác giả</small>
                    <strong>Nguyễn Văn A</strong>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-light p-2 me-2">
                    <i class="fas fa-newspaper text-primary"></i>
                </div>
                <div>
                    <small class="text-muted d-block">Nguồn</small>
                    <strong>NewsPortal</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Image -->
    <div class="featured-image mb-4">
        <img src="https://picsum.photos/1200/600?random={{ $tin->id ?? 1 }}" 
             class="img-fluid rounded" 
             alt="{{ $tin->tieuDe }}"
             style="width: 100%; height: auto; max-height: 500px; object-fit: cover;">
        <div class="text-center mt-2">
            <small class="text-muted"><i class="fas fa-camera me-1"></i> Ảnh minh họa: {{ $tin->tieuDe }}</small>
        </div>
    </div>

    <!-- Article Summary -->
    @if($tin->tomTat)
    <div class="alert alert-info border-start-4 border-start-primary" style="border-left-width: 4px !important;">
        <div class="d-flex">
            <div class="me-3">
                <i class="fas fa-quote-left fa-2x text-primary opacity-50"></i>
            </div>
            <div>
                <h5 class="alert-heading">Tóm tắt bài viết</h5>
                <p class="mb-0">{{ $tin->tomTat }}</p>
            </div>
        </div>
    </div>
    @endif

    <!-- Main Content -->
    <div class="article-content mt-4">
        <div class="content-wrapper" style="font-size: 1.125rem; line-height: 1.8;">
            {!! $tin->noiDung !!}
        </div>
    </div>

    <!-- Article Footer -->
    <div class="article-footer mt-5 pt-4 border-top">
        <div class="row">
            <div class="col-md-6 mb-3">
                <div class="tags">
                    <span class="me-2"><strong>Tags:</strong></span>
                    <a href="#" class="badge bg-light text-dark me-2 mb-2 p-2 text-decoration-none">#tin tức</a>
                    <a href="#" class="badge bg-light text-dark me-2 mb-2 p-2 text-decoration-none">#cập nhật</a>
                    <a href="#" class="badge bg-light text-dark me-2 mb-2 p-2 text-decoration-none">#{{ $tin->tenLoai ?? 'mới nhất' }}</a>
                </div>
            </div>
            <div class="col-md-6 mb-3 text-md-end">
                <div class="share-buttons">
                    <span class="me-2"><strong>Chia sẻ:</strong></span>
                    <button class="btn btn-sm btn-outline-primary me-2 rounded-circle">
                        <i class="fab fa-facebook-f"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-info me-2 rounded-circle">
                        <i class="fab fa-twitter"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-danger me-2 rounded-circle">
                        <i class="fab fa-instagram"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-success rounded-circle">
                        <i class="fab fa-whatsapp"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Related Articles -->
    <div class="related-articles mt-5">
        <h4 class="mb-4 border-bottom pb-2">
            <i class="fas fa-link text-primary me-2"></i> Bài viết liên quan
        </h4>
        <div class="row">
            @for($i = 1; $i <= 3; $i++)
            <div class="col-md-4 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://picsum.photos/400/250?random={{ $i + 10 }}" class="card-img-top" alt="Related article">
                    <div class="card-body">
                        <span class="badge bg-secondary mb-2">Tin liên quan</span>
                        <h6 class="card-title fw-bold">Cập nhật thông tin mới nhất về {{ $tin->tenLoai ?? 'tin tức' }}</h6>
                        <p class="card-text text-muted small">Cùng chủ đề với bài viết bạn vừa đọc...</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="#" class="text-primary text-decoration-none">Đọc tiếp <i class="fas fa-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <!-- Comments Section -->
    <div class="comments-section mt-5">
        <h4 class="mb-4 border-bottom pb-2">
            <i class="fas fa-comments text-primary me-2"></i> Bình luận (24)
        </h4>
        
        <div class="comment-form mb-4">
            <div class="d-flex mb-3">
                <div class="rounded-circle bg-light p-2 me-3">
                    <i class="fas fa-user text-primary"></i>
                </div>
                <div class="flex-grow-1">
                    <textarea class="form-control" rows="3" placeholder="Tham gia thảo luận..."></textarea>
                    <div class="mt-2 text-end">
                        <button class="btn btn-primary">Gửi bình luận</button>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Sample Comments -->
        @for($i = 1; $i <= 2; $i++)
        <div class="comment mb-4">
            <div class="d-flex">
                <div class="flex-shrink-0">
                    <div class="rounded-circle bg-light p-2">
                        <i class="fas fa-user text-primary"></i>
                    </div>
                </div>
                <div class="flex-grow-1 ms-3">
                    <h6 class="mb-1">Người dùng {{ $i }} <small class="text-muted">- {{ $i }} giờ trước</small></h6>
                    <p class="mb-2">Bài viết rất hay và hữu ích. Cảm ơn tác giả đã chia sẻ thông tin chi tiết!</p>
                    <div>
                        <button class="btn btn-sm btn-outline-primary me-2">
                            <i class="fas fa-thumbs-up me-1"></i> Thích (12)
                        </button>
                        <button class="btn btn-sm btn-outline-secondary">
                            <i class="fas fa-reply me-1"></i> Trả lời
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </div>

    <style>
        .content-wrapper p {
            margin-bottom: 1.5rem;
        }
        
        .content-wrapper img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            margin: 1.5rem 0;
        }
        
        .content-wrapper h2, .content-wrapper h3 {
            margin-top: 2rem;
            margin-bottom: 1rem;
            color: var(--dark-color);
        }
        
        .content-wrapper blockquote {
            border-left: 4px solid var(--primary-color);
            padding-left: 1.5rem;
            margin: 1.5rem 0;
            font-style: italic;
            color: var(--text-light);
        }
        
        .content-wrapper ul, .content-wrapper ol {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .content-wrapper li {
            margin-bottom: 0.5rem;
        }
    </style>
@endsection