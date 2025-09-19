<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Arsip Surat')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --color-bg: #f0f4ef;
            --color-sidebar-bg: #2f5d50;
            --color-accent: #a67b5b;
            --color-text: #2a2a2a;
            --color-text-light: #ffffff;
            --color-border: #a67b5b;
        }

        body {
            background-color: var(--color-bg);
            color: var(--color-text);
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Sidebar */
        .sidebar {
            width: 240px;
            height: 100vh;
            background: var(--color-sidebar-bg);
            border-right: 3px solid var(--color-border);
            color: var(--color-text-light);
            position: sticky;
            top: 0;
        }
        .sidebar h4 {
            color: var(--color-text-light);
            font-weight: 700;
            margin-bottom: 25px;
            text-align: center;
            border-bottom: 2px solid var(--color-accent);
            padding-bottom: 10px;
        }
        .sidebar .nav-link {
            color: var(--color-text-light);
            border-radius: 6px;
            margin: 6px 8px;
            padding: 10px 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px; /* jarak ikon dan teks */
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }
        .sidebar .nav-link i {
            flex-shrink: 0; /* ikon tidak ikut geser */
        }
        .sidebar .nav-link span {
            flex: 1;
            line-height: 1; /* teks sejajar dengan ikon */
        }

        /* Hover */
        .sidebar .nav-link:hover {
            background: var(--color-accent);
            border: 1px solid var(--color-border);
            color: var(--color-text-light);
        }
        /* Aktif */
        .sidebar .nav-link.active {
            background: var(--color-accent);
            border: 1px solid var(--color-border);
            color: var(--color-text-light);
            font-weight: 600;
        }

        /* Konten */
        .content-area {
            background: #ffffff;
            border: 2px solid var(--color-border);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            animation: fadeIn 0.5s ease;
            color: var(--color-text);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="p-3 sidebar d-flex flex-column">
            <h4><i class="bi bi-list"></i> Menu</h4>
            <ul class="nav flex-column flex-grow-1">
                <li class="nav-item">
                    <a href="{{ route('arsip.index') }}" 
                       class="nav-link {{ request()->routeIs('arsip.index') ? 'active' : '' }}">
                        <i class="bi bi-file-earmark-text"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" 
                       class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}">
                        <i class="bi bi-folder2"></i>
                        <span>Kategori Surat</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('arsip.about') }}" 
                       class="nav-link {{ request()->routeIs('arsip.about') ? 'active' : '' }}">
                        <i class="bi bi-info-circle"></i>
                        <span>About</span>
                    </a>
                </li>
            </ul>
            <div class="mt-auto small text-center text-light">
                <p class="mb-0">&copy; {{ date('Y') }} Desa Karang Duren</p>
            </div>
        </div>

        <!-- Content -->
        <div class="p-4 flex-grow-1">
            <div class="content-area">
                @yield('content')
            </div>
        </div>
    </div>
</body>
</html>
