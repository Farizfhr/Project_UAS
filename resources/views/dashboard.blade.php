@extends('layouts.app')

@section('content')
<style>
    .dashboard-container {
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .dashboard-header {
        text-align: center;
        margin-bottom: 3rem;
        position: relative;
    }

    .dashboard-title {
        font-size: 3rem;
        font-weight: 800;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 0.5rem;
        letter-spacing: -0.02em;
    }

    .dashboard-subtitle {
        font-size: 1.2rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 400;
        margin-bottom: 2rem;
    }

    body.dark-mode .dashboard-subtitle {
        color: rgba(255, 255, 255, 0.7);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .stat-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        text-align: center;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        position: relative;
        overflow: hidden;
    }

    .stat-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        transition: left 0.5s;
    }

    .stat-card:hover::before {
        left: 100%;
    }

    .stat-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    body.dark-mode .stat-card {
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .stat-icon {
        width: 80px;
        height: 80px;
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        font-size: 2rem;
        color: white;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .stat-number {
        font-size: 2.5rem;
        font-weight: 700;
        color: white;
        margin-bottom: 0.5rem;
    }

    .stat-label {
        font-size: 1rem;
        color: rgba(255, 255, 255, 0.8);
        font-weight: 500;
    }

    body.dark-mode .stat-number {
        color: #f8fafc;
    }

    body.dark-mode .stat-label {
        color: rgba(248, 250, 252, 0.7);
    }

    .data-section {
        margin-bottom: 3rem;
    }

    .section-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: block;
        position: relative;
    }

    .section-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        text-decoration: none;
    }

    body.dark-mode .section-card {
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .section-header {
        padding: 1.5rem 2rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .section-header.success {
        background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
    }

    .section-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin: 0;
        flex: 1;
    }

    .section-count {
        background: rgba(255, 255, 255, 0.2);
        padding: 0.5rem 1rem;
        border-radius: 25px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .section-body {
        padding: 2rem;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 12px;
        overflow: hidden;
        margin-bottom: 1rem;
    }

    .data-table thead {
        background: rgba(0, 0, 0, 0.2);
    }

    .data-table th {
        padding: 1rem;
        text-align: left;
        font-weight: 600;
        color: white;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
    }

    .data-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    .data-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .badge {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-info {
        background: linear-gradient(135deg, #74b9ff, #0984e3);
        color: white;
    }

    .badge-warning {
        background: linear-gradient(135deg, #fdcb6e, #e17055);
        color: white;
    }

    .badge-primary {
        background: linear-gradient(135deg, #a29bfe, #6c5ce7);
        color: white;
    }

    .table-footer {
        color: rgba(255, 255, 255, 0.7);
        font-size: 0.9rem;
        text-align: center;
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.1);
    }

    .empty-state {
        text-align: center;
        padding: 3rem;
        color: rgba(255, 255, 255, 0.6);
    }

    .empty-icon {
        font-size: 4rem;
        margin-bottom: 1rem;
        opacity: 0.3;
    }

    .quick-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        justify-content: center;
        flex-wrap: wrap;
    }

    .action-btn {
        padding: 0.75rem 1.5rem;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        text-decoration: none;
        border-radius: 25px;
        font-weight: 600;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .action-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        color: white;
        text-decoration: none;
    }

    .action-btn.success {
        background: linear-gradient(135deg, #00b894 0%, #00cec9 100%);
    }

    .action-btn.success:hover {
        box-shadow: 0 10px 25px rgba(0, 184, 148, 0.4);
    }

    @media (max-width: 768px) {
        .dashboard-container {
            padding: 1rem;
        }

        .dashboard-title {
            font-size: 2rem;
        }

        .stats-grid {
            grid-template-columns: 1fr;
            gap: 1rem;
        }

        .stat-card {
            padding: 1.5rem;
        }

        .section-header {
            padding: 1rem 1.5rem;
            flex-direction: column;
            text-align: center;
            gap: 0.5rem;
        }

        .section-body {
            padding: 1rem;
        }

        .data-table {
            font-size: 0.85rem;
        }

        .data-table th,
        .data-table td {
            padding: 0.75rem 0.5rem;
        }

        .quick-actions {
            flex-direction: column;
        }
    }

    /* Animation untuk loading state */
    .loading-shimmer {
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        background-size: 200% 100%;
        animation: shimmer 2s infinite;
    }

    @keyframes shimmer {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Header -->
    <div class="dashboard-header">
        <h1 class="dashboard-title">Dashboard</h1>
        <p class="dashboard-subtitle">Sistem Informasi Akademik</p>
        
        <!-- Statistics Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ $mahasiswa->count() }}</div>
                <div class="stat-label">Total Mahasiswa</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-book"></i>
                </div>
                <div class="stat-number">{{ $mata_kuliah->count() }}</div>
                <div class="stat-label">Total Mata Kuliah</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-star"></i>
                </div>
                <div class="stat-number">{{ $mata_kuliah->sum('sks') }}</div>
                <div class="stat-label">Total SKS</div>
            </div>
        </div>
    </div>

    <!-- Data Mahasiswa Section -->
    <div class="data-section">
        <a href="{{ route('mahasiswa.index') }}" class="section-card">
            <div class="section-header">
                <div class="section-icon">
                    <i class="fas fa-users"></i>
                </div>
                <h3 class="section-title">Data Mahasiswa</h3>
                <div class="section-count">{{ $mahasiswa->count() }} mahasiswa</div>
            </div>
            <div class="section-body">
                @if($mahasiswa->count())
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-user mr-2"></i>Nama</th>
                                    <th><i class="fas fa-id-card mr-2"></i>NIM</th>
                                    <th><i class="fas fa-graduation-cap mr-2"></i>Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa->take(5) as $mhs)
                                    <tr>
                                        <td class="font-semibold">{{ $mhs->nama }}</td>
                                        <td><span class="badge badge-info">{{ $mhs->nim }}</span></td>
                                        <td>{{ $mhs->jurusan }}</td>
                                    </tr>
                                @endforeach
                                <script>
    document.addEventListener("DOMContentLoaded", function () {
        const button = document.getElementById("userMenuButton");
        const menu = document.getElementById("userDropdownMenu");
        const arrow = document.getElementById("dropdownArrow");

        button.addEventListener("click", function (e) {
            e.preventDefault();
            menu.classList.toggle("invisible");
            menu.classList.toggle("opacity-0");
            menu.classList.toggle("scale-95");

            // Rotate arrow jika ingin efek animasi
            arrow.classList.toggle("rotate-180");
        });

        // Klik di luar dropdown akan menutup menu
        document.addEventListener("click", function (e) {
            if (!button.contains(e.target) && !menu.contains(e.target)) {
                if (!menu.classList.contains("invisible")) {
                    menu.classList.add("invisible", "opacity-0", "scale-95");
                    arrow.classList.remove("rotate-180");
                }
            }
        });
    });
</script>

                            </tbody>
                        </table>
                    </div>
                    
                    @if($mahasiswa->count() > 5)
                        <div class="table-footer">
                            <i class="fas fa-info-circle mr-1"></i>
                            Menampilkan 5 dari {{ $mahasiswa->count() }} mahasiswa. 
                            <strong>Klik untuk melihat semua data.</strong>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <p>Belum ada data mahasiswa.</p>
                        <p class="text-sm">Tambahkan mahasiswa pertama untuk memulai.</p>
                    </div>
                @endif
            </div>
        </a>
    </div>

    <!-- Data Mata Kuliah Section -->
    <div class="data-section">
        <a href="{{ route('matakuliah.index') }}" class="section-card">
            <div class="section-header success">
                <div class="section-icon">
                    <i class="fas fa-book"></i>
                </div>
                <h3 class="section-title">Data Mata Kuliah</h3>
                <div class="section-count">{{ $mata_kuliah->count() }} mata kuliah</div>
            </div>
            <div class="section-body">
                @if($mata_kuliah->count())
                    <div class="table-responsive">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-code mr-2"></i>Kode</th>
                                    <th><i class="fas fa-book-open mr-2"></i>Nama Mata Kuliah</th>
                                    <th class="text-center"><i class="fas fa-star mr-2"></i>SKS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mata_kuliah->take(5) as $mk)
                                    <tr>
                                        <td><span class="badge badge-warning">{{ $mk->kode }}</span></td>
                                        <td class="font-semibold">{{ $mk->nama }}</td>
                                        <td class="text-center"><span class="badge badge-primary">{{ $mk->sks }}</span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($mata_kuliah->count() > 5)
                        <div class="table-footer">
                            <i class="fas fa-info-circle mr-1"></i>
                            Menampilkan 5 dari {{ $mata_kuliah->count() }} mata kuliah. 
                            <strong>Klik untuk melihat semua data.</strong>
                        </div>
                    @endif
                @else
                    <div class="empty-state">
                        <div class="empty-icon">
                            <i class="fas fa-book-medical"></i>
                        </div>
                        <p>Belum ada data mata kuliah.</p>
                        <p class="text-sm">Tambahkan mata kuliah pertama untuk memulai.</p>
                    </div>
                @endif
            </div>
        </a>
    </div>

    <!-- Quick Actions -->
    <div class="quick-actions">
        <a href="{{ route('mahasiswa.create') }}" class="action-btn">
            <i class="fas fa-user-plus"></i>
            Tambah Mahasiswa
        </a>
        <a href="{{ route('matakuliah.create') }}" class="action-btn success">
            <i class="fas fa-book-medical"></i>
            Tambah Mata Kuliah
        </a>
    </div>
</div>

<script>
    // Add loading animation for card interactions
    document.querySelectorAll('.section-card').forEach(card => {
        card.addEventListener('click', function(e) {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
                this.style.transform = '';
            }, 150);
        });
    });

    // Add counter animation
    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.floor(current);
        }, 30);
    }

    // Animate counters when page loads
    window.addEventListener('load', () => {
        document.querySelectorAll('.stat-number').forEach(counter => {
            const target = parseInt(counter.textContent);
            counter.textContent = '0';
            setTimeout(() => {
                animateCounter(counter, target);
            }, 500);
        });
    });

    // Add hover effect for table rows
    document.querySelectorAll('.data-table tbody tr').forEach(row => {
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateX(5px)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateX(0)';
        });
    });
</script>
@endsection