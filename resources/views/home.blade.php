@extends('layout')

@section('tieudetrang')
    Trang chủ tin tức - NewsPortal
@endsection

@section('noidung')
    <!-- Hero Section -->
    <div class="hero-section mb-5">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Tin Tức Mới Nhất<br><span class="text-primary">Mỗi Ngày</span></h1>
                <p class="lead mb-4">Cập nhật 24/7 những thông tin nóng hổi, chính xác và đa dạng từ mọi lĩnh vực</p>
                <div class="d-flex gap-3">
                    <a href="#latest-news" class="btn btn-primary btn-lg px-4">
                        <i class="fas fa-newspaper me-2"></i> Đọc tin mới
                    </a>
                    <a href="#" class="btn btn-outline-primary btn-lg px-4">
                        <i class="fas fa-bell me-2"></i> Nhận thông báo
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="position-relative">
                    <img src="https://picsum.photos/600/400?random=hero" 
                         class="img-fluid rounded shadow-lg" 
                         alt="Hero Image"
                         style="border-radius: 20px !important;">
                    <div class="position-absolute bottom-0 start-0 p-4 text-white" 
                         style="background: linear-gradient(transparent, rgba(0,0,0,0.7)); width: 100%; border-radius: 0 0 20px 20px;">
                        <h5 class="mb-2">Tin nóng: Hội nghị thượng đỉnh về công nghệ</h5>
                        <p class="mb-0 small">Cập nhật mới nhất từ hội nghị công nghệ toàn cầu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Breaking News -->
    <div class="breaking-news mb-5">
        <div class="card border-0 shadow-sm">
            <div class="card-body p-3" style="background: linear-gradient(135deg, #ef4444, #dc2626);">
                <div class="d-flex align-items-center">
                    <div class="me-3">
                        <span class="badge bg-white text-danger px-3 py-2">
                            <i class="fas fa-bolt me-1"></i> TIN NÓNG
                        </span>
                    </div>
                    <div class="flex-grow-1 text-white">
                        <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                            <strong>📢 TIN MỚI NHẤT:</strong> Thị trường chứng khoán tăng điểm mạnh - Giá vàng giảm nhẹ - Thời tiết miền Bắc chuyển lạnh
                        </marquee>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Categories -->
    <div class="featured-categories mb-5">
        <h2 class="mb-4">Chuyên Mục Nổi Bật</h2>
        <div class="row g-3">
            @php
                $categories = [
                    ['icon' => 'fa-globe', 'name' => 'Thời sự', 'count' => 245, 'color' => 'primary'],
                    ['icon' => 'fa-chart-line', 'name' => 'Kinh doanh', 'count' => 189, 'color' => 'success'],
                    ['icon' => 'fa-laptop-code', 'name' => 'Công nghệ', 'count' => 156, 'color' => 'info'],
                    ['icon' => 'fa-futbol', 'name' => 'Thể thao', 'count' => 132, 'color' => 'warning'],
                    ['icon' => 'fa-film', 'name' => 'Giải trí', 'count' => 178, 'color' => 'danger'],
                    ['icon' => 'fa-heart-pulse', 'name' => 'Sức khỏe', 'count' => 98, 'color' => 'purple'],
                ];
            @endphp
            
            @foreach($categories as $category)
                <div class="col-lg-2 col-md-4 col-6">
                    <a href="#" class="text-decoration-none">
                        <div class="card category-card border-0 shadow-sm text-center p-3 h-100">
                            <div class="mb-3">
                                <div class="rounded-circle p-3 d-inline-flex" 
                                     style="background: linear-gradient(135deg, var(--bs-{{ $category['color'] }}), rgba(var(--bs-{{ $category['color'] }}-rgb), 0.8));">
                                    <i class="fas {{ $category['icon'] }} fa-2x text-white"></i>
                                </div>
                            </div>
                            <h6 class="fw-bold mb-1">{{ $category['name'] }}</h6>
                            <small class="text-muted">{{ $category['count'] }} bài viết</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Latest News -->
    <div id="latest-news" class="latest-news mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Tin Mới Nhất</h2>
            <a href="#" class="btn btn-outline-primary">
                Xem tất cả <i class="fas fa-arrow-right ms-1"></i>
            </a>
        </div>
        
        <div class="row">
            <!-- Main News -->
            <div class="col-lg-8 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <img src="https://picsum.photos/800/450?random=1" 
                         class="card-img-top" 
                         alt="Main News"
                         style="height: 400px; object-fit: cover; border-radius: 12px 12px 0 0;">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <span class="badge bg-primary">Tin chính</span>
                            <small class="text-muted"><i class="far fa-clock me-1"></i> 1 giờ trước</small>
                        </div>
                        <h3 class="card-title">Cuộc họp quan trọng về phát triển kinh tế đất nước</h3>
                        <p class="card-text">Cuộc họp đã thảo luận nhiều vấn đề quan trọng liên quan đến phát triển kinh tế trong giai đoạn mới...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <div class="rounded-circle bg-light p-2 me-2">
                                    <i class="fas fa-user text-primary"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Phóng viên</small>
                                    <strong>Lê Minh Tâm</strong>
                                </div>
                            </div>
                            <a href="#" class="btn btn-primary">Đọc tiếp</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- News List -->
            <div class="col-lg-4">
                @for($i = 2; $i <= 5; $i++)
                <div class="card border-0 shadow-sm mb-3">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://picsum.photos/150/100?random={{ $i }}" 
                                 class="img-fluid rounded-start h-100" 
                                 alt="News thumbnail"
                                 style="object-fit: cover;">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <span class="badge bg-secondary mb-2 small">Tin nhanh</span>
                                <h6 class="card-title mb-1">Thông tin mới về dự án giao thông</h6>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> {{ $i * 2 }} giờ trước</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endfor
            </div>
        </div>
    </div>

    <!-- Trending Now -->
    <div class="trending-now mb-5">
        <h2 class="mb-4">Đang Thịnh Hành</h2>
        <div class="row">
            @for($i = 1; $i <= 4; $i++)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100">
                    <div class="position-relative">
                        <img src="https://picsum.photos/400/250?random=trend{{ $i }}" 
                             class="card-img-top" 
                             alt="Trending news"
                             style="height: 200px; object-fit: cover;">
                        <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1" 
                              style="border-radius: 0 0 8px 0;">
                            #{{ $i }} Trending
                        </span>
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Xu hướng công nghệ mới năm 2024</h6>
                        <p class="card-text small text-muted">Các xu hướng công nghệ đang định hình tương lai...</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted"><i class="fas fa-eye me-1"></i> {{ $i * 1000 }} lượt xem</small>
                            <a href="#" class="btn btn-sm btn-outline-primary">Xem</a>
                        </div>
                    </div>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <!-- Video News -->
    <div class="video-news mb-5">
        <h2 class="mb-4">Tin Tức Video</h2>
        <div class="row">
            <div class="col-lg-6 mb-4">
                <div class="card border-0 shadow-sm overflow-hidden">
                    <div class="position-relative">
                        <img src="https://picsum.photos/600/350?random=video1" 
                             class="card-img-top" 
                             alt="Video news">
                        <div class="position-absolute top-50 start-50 translate-middle">
                            <button class="btn btn-primary rounded-circle p-3" style="width: 70px; height: 70px;">
                                <i class="fas fa-play fa-2x"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Phóng sự đặc biệt về đổi mới giáo dục</h5>
                        <p class="card-text text-muted">Video phóng sự đặc biệt về những đổi mới trong ngành giáo dục...</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row">
                    @for($i = 2; $i <= 3; $i++)
                    <div class="col-md-6 mb-4">
                        <div class="card border-0 shadow-sm h-100">
                            <div class="position-relative">
                                <img src="https://picsum.photos/300/180?random=video{{ $i }}" 
                                     class="card-img-top" 
                                     alt="Video thumbnail">
                                <div class="position-absolute bottom-0 end-0 m-2">
                                    <span class="badge bg-dark">15:{{ $i }}0</span>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Bản tin thời sự {{ $i }}</h6>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> {{ $i }} ngày trước</small>
                            </div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>

    <style>
        .hero-section {
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 3rem;
            border-radius: 20px;
        }
        
        .category-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg) !important;
        }
        
        .card {
            border-radius: 12px !important;
            overflow: hidden;
        }
        
        .card-img-top {
            transition: transform 0.5s ease;
        }
        
        .card:hover .card-img-top {
            transform: scale(1.05);
        }
        
        .badge.purple {
            background-color: #8b5cf6;
        }
    </style>
@endsection