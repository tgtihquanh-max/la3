@extends('layout')

@section('tieudetrang')
    {{ $loaitin->ten }} - Tin theo danh mục
@endsection

@section('noidung')
    <!-- Category Header -->
    <div class="category-header mb-5">
        <div class="d-flex align-items-center mb-4">
            <div class="category-icon me-3">
                <div class="rounded-circle p-3" style="background: var(--gradient-primary);">
                    <i class="fas fa-folder fa-2x text-white"></i>
                </div>
            </div>
            <div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb" style="background: transparent; padding: 0;">
                        <li class="breadcrumb-item"><a href="/" class="text-decoration-none"><i class="fas fa-home"></i> Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $loaitin->ten }}</li>
                    </ol>
                </nav>
                <h1 class="mb-2">{{ $loaitin->ten }}</h1>
                <p class="text-muted mb-0">Cập nhật những tin tức mới nhất về {{ strtolower($loaitin->ten) }}</p>
            </div>
        </div>
        
        <!-- Category Stats -->
        <div class="row">
            <div class="col-md-3 col-6 mb-3">
                <div class="card border-0 shadow-sm text-center py-3">
                    <h3 class="text-primary mb-0">{{ count($listtin) }}</h3>
                    <small class="text-muted">Bài viết</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card border-0 shadow-sm text-center py-3">
                    <h3 class="text-success mb-0">24</h3>
                    <small class="text-muted">Hôm nay</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card border-0 shadow-sm text-center py-3">
                    <h3 class="text-warning mb-0">156</h3>
                    <small class="text-muted">Tuần này</small>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-3">
                <div class="card border-0 shadow-sm text-center py-3">
                    <h3 class="text-danger mb-0">2.4K</h3>
                    <small class="text-muted">Lượt xem</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Featured Article -->
    @if($listtin->isNotEmpty())
    <div class="featured-article mb-5">
        <div class="card border-0 shadow-lg overflow-hidden">
            <div class="row g-0">
                <div class="col-lg-6">
                    <img src="https://picsum.photos/800/500?random={{ $listtin[0]->id }}" 
                         class="img-fluid h-100" 
                         alt="{{ $listtin[0]->tieuDe }}"
                         style="object-fit: cover;">
                </div>
                <div class="col-lg-6">
                    <div class="card-body p-4 d-flex flex-column h-100">
                        <span class="badge bg-primary mb-3 align-self-start">Nổi bật</span>
                        <h2 class="card-title mb-3">{{ $listtin[0]->tieuDe }}</h2>
                        <p class="card-text flex-grow-1">{{ Str::limit($listtin[0]->tomTat, 200) }}</p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="text-muted">
                                <i class="far fa-clock me-1"></i> {{ date('d/m/Y', strtotime($listtin[0]->ngayDang ?? now())) }}
                            </div>
                            <a href="{{ url('/tin', [$listtin[0]->id]) }}" class="btn btn-primary">
                                Đọc tiếp <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- News Grid -->
    <div class="news-grid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Tin mới nhất</h3>
            <div class="sort-options">
                <select class="form-select" style="width: auto;">
                    <option selected>Sắp xếp theo mới nhất</option>
                    <option>Xem nhiều nhất</option>
                    <option>Cũ nhất</option>
                </select>
            </div>
        </div>
        
        <div class="row">
            @foreach ($listtin as $index => $t)
                @if($index > 0)
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card article-card border-0 shadow-sm h-100">
                        <div class="position-relative">
                            <img src="https://picsum.photos/400/250?random={{ $t->id }}" 
                                 class="card-img-top" 
                                 alt="{{ $t->tieuDe }}"
                                 style="height: 200px; object-fit: cover;">
                            @if($index <= 3)
                            <span class="position-absolute top-0 start-0 bg-danger text-white px-2 py-1" 
                                  style="border-radius: 0 0 8px 0;">
                                <small>Hot</small>
                            </span>
                            @endif
                        </div>
                        <div class="card-body">
                            <span class="badge bg-secondary mb-2">{{ $loaitin->ten }}</span>
                            <h5 class="card-title">
                                <a href="{{ url('/tin',[$t->id]) }}" class="text-decoration-none text-dark">
                                    {{ Str::limit($t->tieuDe, 70) }}
                                </a>
                            </h5>
                            <p class="card-text text-muted small">{{ Str::limit($t->tomTat, 120) }}</p>
                        </div>
                        <div class="card-footer bg-transparent border-top d-flex justify-content-between align-items-center">
                            <small class="text-muted">
                                <i class="far fa-clock me-1"></i> {{ date('d/m/Y', strtotime($t->ngayDang ?? now())) }}
                            </small>
                            <a href="{{ url('/tin',[$t->id]) }}" class="btn btn-sm btn-outline-primary">
                                Đọc <i class="fas fa-arrow-right ms-1"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>
    </div>

    <!-- Pagination -->
    <nav aria-label="Page navigation" class="mt-5">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                    <i class="fas fa-chevron-left"></i>
                </a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </li>
        </ul>
    </nav>

    <!-- Category Description -->
    <div class="category-description mt-5 p-4 rounded" style="background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);">
        <h4 class="mb-3">Về chuyên mục {{ $loaitin->ten }}</h4>
        <p class="mb-0">
            Chuyên mục {{ $loaitin->ten }} cung cấp những thông tin mới nhất, chính xác nhất về các vấn đề liên quan. 
            Chúng tôi cập nhật liên tục 24/7 để mang đến cho độc giả những tin tức nóng hổi và đáng tin cậy nhất.
        </p>
    </div>

    <style>
        .article-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .article-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg) !important;
        }
        
        .article-card .card-title a:hover {
            color: var(--primary-color) !important;
        }
        
        .category-icon {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    </style>
@endsection