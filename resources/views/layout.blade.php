<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Trang tin tức cập nhật 24/7 với những thông tin mới nhất, nhanh nhất và chính xác nhất">
    <title>@yield('tieudetrang') - NewsPortal</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #2563eb;
            --secondary-color: #1e40af;
            --accent-color: #3b82f6;
            --dark-color: #1f2937;
            --light-color: #f8fafc;
            --text-dark: #1f2937;
            --text-light: #6b7280;
            --gradient-primary: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            --gradient-accent: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            --shadow-sm: 0 2px 8px rgba(0,0,0,0.05);
            --shadow-md: 0 4px 16px rgba(0,0,0,0.08);
            --shadow-lg: 0 8px 32px rgba(0,0,0,0.12);
            --border-radius: 12px;
            --border-radius-lg: 20px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            color: var(--text-dark);
            background-color: #f9fafb;
            line-height: 1.6;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        .brand-title {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            font-weight: 700;
            background: var(--gradient-primary);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .container-fluid {
            max-width: 1400px;
        }

        /* Header Styling */
        .main-header {
            background: white;
            box-shadow: var(--shadow-sm);
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.95);
        }

        /* Navigation */
        .navbar-custom {
            padding: 0.75rem 0;
        }

        .nav-link-custom {
            font-weight: 500;
            color: var(--text-dark) !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 0.25rem;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background: var(--gradient-accent);
            color: white !important;
            transform: translateY(-2px);
        }

        .nav-item.active .nav-link-custom {
            background: var(--gradient-accent);
            color: white !important;
        }

        /* Search Bar */
        .search-box {
            max-width: 300px;
        }

        .search-input {
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        /* Main Content */
        .main-content {
            min-height: calc(100vh - 400px);
            padding: 2rem 0;
        }

        .article-section {
            background: white;
            border-radius: var(--border-radius-lg);
            padding: 2rem;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
        }

        /* Sidebar */
        .sidebar-card {
            background: white;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow-sm);
            margin-bottom: 1.5rem;
            border: 1px solid #f1f5f9;
        }

        .sidebar-title {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--dark-color);
            border-bottom: 3px solid var(--primary-color);
            padding-bottom: 0.5rem;
            margin-bottom: 1rem;
        }

        /* Trending News */
        .trending-badge {
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            padding: 0.25rem 0.75rem;
            border-radius: 50px;
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
        }

        /* Footer */
        .main-footer {
            background: var(--dark-color);
            color: white;
            padding: 3rem 0 1.5rem;
            margin-top: 4rem;
        }

        .footer-links a {
            color: #d1d5db;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: white;
            text-decoration: underline;
        }

        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            margin-right: 0.5rem;
            transition: all 0.3s ease;
        }

        .social-icons a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .brand-title {
                font-size: 1.5rem;
            }
            
            .nav-link-custom {
                margin: 0.25rem 0;
            }
            
            .article-section {
                padding: 1.5rem;
            }
        }

        /* Animation */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--primary-color);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--secondary-color);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <!-- Header -->
        <header class="main-header">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg navbar-custom">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/">
                            <div class="d-flex flex-column">
                                <span class="brand-title">NewsPortal</span>
                                <span class="brand-subtitle">Thông tin chính xác - Cập nhật liên tục</span>
                            </div>
                        </a>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                            <i class="fas fa-bars"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarMain">
                            <ul class="navbar-nav mx-auto">
                                <!-- Trang chủ -->
                                <li class="nav-item">
                                    <a class="nav-link-custom {{ Request::is('/') ? 'active' : '' }}" href="/">
                                        <i class="fas fa-home"></i>
                                        <span>Trang chủ</span>
                                    </a>
                                </li>
                                
                                <!-- Các loại tin từ database -->
                                <?php
                                use Illuminate\Support\Facades\DB;
                                $loaitin_arr = DB::table('loaitin')->select('id', 'ten')
                                    ->orderby('thuTu', 'asc')
                                    ->where('AnHien', '=', '1')
                                    ->limit(5)->get();
                                ?>
                                
                                @foreach ($loaitin_arr as $lt)
                                <li class="nav-item">
                                    <a class="nav-link-custom {{ Request::is('cat/'.$lt->id) ? 'active' : '' }}" 
                                    href="{{ url('/cat',[$lt->id]) }}">
                                        <i class="fas fa-newspaper"></i>
                                        <span>{{ $lt->ten }}</span>
                                    </a>
                                </li>    
                                @endforeach
                                
                                <!-- Dropdown cho các danh mục khác -->
                                @if(DB::table('loaitin')->where('AnHien', '=', '1')->count() > 5)
                                <li class="nav-item dropdown">
                                    <a class="nav-link-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                        <i class="fas fa-ellipsis-h"></i>
                                        <span>Khác</span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-custom">
                                        <?php
                                        $moreCategories = DB::table('loaitin')->select('id', 'ten')
                                            ->orderby('thuTu', 'asc')
                                            ->where('AnHien', '=', '1')
                                            ->skip(5)->take(10)->get();
                                        ?>
                                        
                                        @foreach($moreCategories as $cat)
                                        <li>
                                            <a class="dropdown-item dropdown-item-custom" href="{{ url('/cat',[$cat->id]) }}">
                                                <i class="fas fa-arrow-right text-primary"></i>
                                                <span>{{ $cat->ten }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </li>
                                @endif
                            </ul>
                            
                            <!-- Phần tìm kiếm và Subscribe -->
                            <div class="d-flex align-items-center ms-auto">
                                <div class="search-box me-3">
                                    <div class="input-group">
                                        <input type="text" class="form-control search-input" placeholder="Tìm kiếm">
                                        <button class="btn search-btn" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                                <a href="#" class="btn subscribe-btn">
                                    <i class="fas fa-bell"></i>
                                    <span>Subscribe</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>

        <style>
        /* Menu Styles */
        .nav-link-custom {
            font-weight: 500;
            color: #374151 !important;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin: 0 0.125rem;
            border: 1px solid transparent;
            white-space: nowrap;
            font-size: 0.95rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            min-height: 40px;
        }

        .nav-link-custom:hover, .nav-link-custom.active {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white !important;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.2);
            border-color: #2563eb;
        }

        .nav-link-custom.active {
            font-weight: 600;
        }

        /* Dropdown Menu */
        .dropdown-menu-custom {
            border-radius: 12px !important;
            border: 1px solid #e5e7eb !important;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12) !important;
            margin-top: 0.5rem !important;
            padding: 0.5rem;
            min-width: 200px;
        }

        .dropdown-item-custom {
            padding: 0.75rem 1rem !important;
            border-radius: 8px !important;
            font-weight: 500;
            transition: all 0.2s ease;
            margin: 0.125rem 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #374151 !important;
        }

        .dropdown-item-custom:hover {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb) !important;
            color: #1d4ed8 !important;
            transform: translateX(4px);
        }

        /* Search Bar */
        .search-box {
            max-width: 280px;
            min-width: 200px;
        }

        .search-input {
            border-radius: 50px;
            padding: 0.6rem 1.5rem;
            border: 2px solid #e5e7eb;
            transition: all 0.3s ease;
            font-size: 0.9rem;
            padding-right: 3rem;
        }

        .search-input:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        }

        .search-btn {
            border-radius: 50px !important;
            padding: 0.6rem 1.25rem;
            border: none;
            background: #3b82f6;
            color: white;
            transition: all 0.3s ease;
            position: absolute;
            right: 0;
            height: calc(100% - 4px);
            margin: 2px;
        }

        .search-btn:hover {
            background: #2563eb;
        }

        .input-group {
            position: relative;
        }

        /* Subscribe Button */
        .subscribe-btn {
            border-radius: 8px !important;
            padding: 0.6rem 1.5rem !important;
            background: linear-gradient(135deg, #10b981, #059669) !important;
            border: none !important;
            font-weight: 600 !important;
            transition: all 0.3s ease !important;
            white-space: nowrap;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: white !important;
        }

        .subscribe-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
            background: linear-gradient(135deg, #059669, #047857) !important;
            color: white !important;
        }

        /* Responsive fixes */
        @media (max-width: 992px) {
            .navbar-nav {
                padding: 1rem 0;
                text-align: center;
            }
            
            .nav-item {
                margin: 0.25rem 0;
                width: 100%;
            }
            
            .nav-link-custom {
                justify-content: center;
                margin: 0.125rem 0;
            }
            
            .search-box {
                max-width: 100%;
                margin: 1rem 0;
            }
            
            .subscribe-btn {
                width: 100%;
                justify-content: center;
            }
        }
        </style>

    <!-- Main Content -->
    <main class="main-content">
        <div class="container-fluid">
            <div class="row">
                <!-- Main Article Area -->
                <article class="col-lg-9 mb-4">
                    <div class="article-section fade-in">
                        @yield('noidung')
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="col-lg-3">
                    <!-- Trending News -->
                    <div class="sidebar-card">
                        <h4 class="sidebar-title">
                            <i class="fas fa-fire text-danger me-2"></i> Tin Nổi Bật
                        </h4>
                        <div class="trending-news">
                            <div class="mb-3 position-relative">
                                <span class="trending-badge">HOT</span>
                                <img src="https://picsum.photos/300/150?random=1" class="img-fluid rounded mb-2" alt="Trending News">
                                <h6 class="fw-bold">Việt Nam đạt thành tích cao tại Olympic Quốc tế</h6>
                                <small class="text-muted"><i class="far fa-clock me-1"></i> 2 giờ trước</small>
                            </div>
                            <div class="list-group">
                                @for($i = 1; $i <= 4; $i++)
                                <a href="#" class="list-group-item list-group-item-action border-0 py-2">
                                    <div class="d-flex align-items-center">
                                        <span class="badge bg-primary me-2">{{ $i }}</span>
                                        <span>Thị trường chứng khoán có dấu hiệu phục hồi mạnh</span>
                                    </div>
                                </a>
                                @endfor
                            </div>
                        </div>
                    </div>

                    <!-- Categories -->
                    <div class="sidebar-card">
                        <h4 class="sidebar-title">
                            <i class="fas fa-folder me-2"></i> Danh Mục
                        </h4>
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action border-0 py-2 d-flex justify-content-between align-items-center">
                                Thời sự
                                <span class="badge bg-primary rounded-pill">24</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 py-2 d-flex justify-content-between align-items-center">
                                Kinh doanh
                                <span class="badge bg-primary rounded-pill">18</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 py-2 d-flex justify-content-between align-items-center">
                                Công nghệ
                                <span class="badge bg-primary rounded-pill">32</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 py-2 d-flex justify-content-between align-items-center">
                                Thể thao
                                <span class="badge bg-primary rounded-pill">15</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action border-0 py-2 d-flex justify-content-between align-items-center">
                                Giải trí
                                <span class="badge bg-primary rounded-pill">21</span>
                            </a>
                        </div>
                    </div>

                    <!-- Newsletter -->
                    <div class="sidebar-card" style="background: var(--gradient-primary); color: white;">
                        <h4 class="sidebar-title text-white">Nhận Bản Tin</h4>
                        <p class="mb-3">Đăng ký để nhận tin tức mới nhất hàng ngày</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Email của bạn" style="border-radius: 8px 0 0 8px;">
                            <button class="btn btn-light" type="button" style="border-radius: 0 8px 8px 0;">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="mb-3">NewsPortal</h4>
                    <p>Trang tin tức hàng đầu Việt Nam, cập nhật 24/7 với thông tin chính xác và nhanh nhất.</p>
                    <div class="social-icons mt-3">
                        <a href="#" class="text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Về Chúng Tôi</h5>
                    <div class="footer-links">
                        <a href="#" class="d-block mb-2">Giới thiệu</a>
                        <a href="#" class="d-block mb-2">Đội ngũ</a>
                        <a href="#" class="d-block mb-2">Liên hệ</a>
                        <a href="#" class="d-block mb-2">Tuyển dụng</a>
                    </div>
                </div>
                
                <div class="col-lg-2 col-md-6 mb-4">
                    <h5 class="mb-3">Chính Sách</h5>
                    <div class="footer-links">
                        <a href="#" class="d-block mb-2">Điều khoản sử dụng</a>
                        <a href="#" class="d-block mb-2">Chính sách bảo mật</a>
                        <a href="#" class="d-block mb-2">Chính sách cookie</a>
                        <a href="#" class="d-block mb-2">Quyền riêng tư</a>
                    </div>
                </div>
                
                <div class="col-lg-4 mb-4">
                    <h5 class="mb-3">Liên Hệ</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Đường ABC, Quận 1, TP.HCM</p>
                    <p><i class="fas fa-phone me-2"></i> (028) 1234 5678</p>
                    <p><i class="fas fa-envelope me-2"></i> info@newsportal.vn</p>
                </div>
            </div>
            
            <hr class="my-4" style="border-color: rgba(255,255,255,0.1);">
            
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-0">&copy; 2024 NewsPortal. Tất cả quyền được bảo lưu.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Phát triển bởi <strong>XYZ Technology</strong></p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- Custom JS -->
    <script>
        // Active navigation item
        document.addEventListener('DOMContentLoaded', function() {
            const currentPath = window.location.pathname;
            const navLinks = document.querySelectorAll('.nav-link-custom');
            
            navLinks.forEach(link => {
                if (link.getAttribute('href') === currentPath) {
                    link.classList.add('active');
                }
            });

            // Smooth scroll to top
            document.querySelector('.brand-title').addEventListener('click', function(e) {
                if (window.location.pathname === '/') {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }
            });

            // Search functionality
            const searchInput = document.querySelector('.search-input');
            const searchBtn = document.querySelector('.search-input + .btn');
            
            searchBtn.addEventListener('click', function() {
                if (searchInput.value.trim()) {
                    alert(`Searching for: ${searchInput.value}`);
                    // Implement actual search here
                }
            });

            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter' && this.value.trim()) {
                    alert(`Searching for: ${this.value}`);
                    // Implement actual search here
                }
            });
        });

        // Add animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                }
            });
        }, observerOptions);

        // Observe all article sections
        document.querySelectorAll('.article-section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>