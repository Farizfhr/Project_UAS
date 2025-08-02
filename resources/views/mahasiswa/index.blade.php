@extends('layouts.app')

@section('content')
<style>
    .mahasiswa-container {
        padding: 2rem;
        max-width: 1400px;
        margin: 0 auto;
    }

    .page-header {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        padding: 2rem;
        margin-bottom: 2rem;
        position: relative;
        overflow: hidden;
    }

    body.dark-mode .page-header {
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .page-header::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        animation: shimmer 3s infinite;
    }

    @keyframes shimmer {
        0% { left: -100%; }
        100% { left: 100%; }
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .page-title {
        font-size: 2.5rem;
        font-weight: 700;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .title-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }

    .header-actions {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 25px;
        font-weight: 600;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        border: none;
        cursor: pointer;
        font-size: 0.9rem;
    }

    .btn:hover {
        transform: translateY(-2px);
        text-decoration: none;
    }

    .btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .btn-primary:hover {
        box-shadow: 0 8px 25px rgba(102, 126, 234, 0.6);
        color: white;
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 0.2);
        color: white;
    }

    body.dark-mode .btn-secondary {
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .alert {
        padding: 1rem 1.5rem;
        border-radius: 15px;
        margin-bottom: 2rem;
        display: flex;
        align-items: center;
        gap: 1rem;
        font-weight: 500;
        animation: slideInDown 0.5s ease;
    }

    .alert-success {
        background: linear-gradient(135deg, #00b894, #00cec9);
        color: white;
        box-shadow: 0 4px 15px rgba(0, 184, 148, 0.3);
    }

    .alert-icon {
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 0.9rem;
    }

    @keyframes slideInDown {
        from {
            transform: translateY(-100%);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .data-card {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.2);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
    }

    body.dark-mode .data-card {
        background: rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .table-container {
        overflow-x: auto;
        max-height: 70vh;
    }

    .data-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.9rem;
    }

    .data-table thead {
        background: rgba(0, 0, 0, 0.2);
        position: sticky;
        top: 0;
        z-index: 10;
    }

    .data-table th {
        padding: 1.2rem 1rem;
        text-align: left;
        font-weight: 600;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        font-size: 0.8rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .data-table td {
        padding: 1rem;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
        vertical-align: middle;
    }

    .data-table tbody tr {
        transition: all 0.3s ease;
    }

    .data-table tbody tr:hover {
        background: rgba(255, 255, 255, 0.05);
        transform: translateX(5px);
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .student-photo {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        object-fit: cover;
        border: 2px solid rgba(255, 255, 255, 0.2);
        transition: all 0.3s ease;
    }

    .student-photo:hover {
        transform: scale(1.1);
        border-color: rgba(102, 126, 234, 0.6);
    }

    .no-photo {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        background: linear-gradient(135deg, #ddd, #ccc);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #666;
        font-size: 0.7rem;
        text-align: center;
        line-height: 1.2;
    }

    .badge {
        padding: 0.4rem 0.8rem;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
        display: inline-block;
    }

    .badge-info {
        background: linear-gradient(135deg, #74b9ff, #0984e3);
        color: white;
    }

    .badge-semester {
        background: linear-gradient(135deg, #fdcb6e, #e17055);
        color: white;
    }

    .action-buttons {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
    }

    .btn-action {
        padding: 0.4rem 0.8rem;
        border-radius: 15px;
        font-size: 0.8rem;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .btn-detail {
        background: linear-gradient(135deg, #00b894, #00cec9);
        color: white;
    }

    .btn-edit {
        background: linear-gradient(135deg, #fdcb6e, #e17055);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #e84393, #fd79a8);
        color: white;
    }

    .btn-action:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        color: white;
        text-decoration: none;
    }

    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        color: rgba(255, 255, 255, 0.7);
    }

    .empty-icon {
        width: 100px;
        height: 100px;
        margin: 0 auto 2rem;
        background: linear-gradient(135deg, #667eea, #764ba2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 3rem;
        color: white;
        opacity: 0.6;
    }

    .empty-title {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 1rem;
        color: white;
    }

    .empty-subtitle {
        font-size: 1rem;
        margin-bottom: 2rem;
        opacity: 0.8;
    }

    .pagination-container {
        padding: 2rem;
        display: flex;
        justify-content: center;
    }

    .pagination {
        display: flex;
        gap: 0.5rem;
        align-items: center;
    }

    .pagination a,
    .pagination span {
        padding: 0.75rem 1rem;
        border-radius: 12px;
        background: rgba(255, 255, 255, 0.1);
        color: white;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .pagination a:hover {
        background: linear-gradient(135deg, #667eea, #764ba2);
        transform: translateY(-1px);
        text-decoration: none;
        color: white;
    }

    .pagination .current {
        background: linear-gradient(135deg, #667eea, #764ba2);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }

    .stats-bar {
        background: rgba(0, 0, 0, 0.1);
        padding: 1rem 2rem;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.9rem;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .search-filter {
        padding: 1.5rem 2rem;
        background: rgba(0, 0, 0, 0.05);
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
        align-items: center;
    }

    .form-input {
        padding: 0.75rem 1rem;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(255, 255, 255, 0.1);
        color: white;
        font-size: 0.9rem;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
    }

    .form-input:focus {
        outline: none;
        border-color: rgba(102, 126, 234, 0.6);
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.2);
    }

    .form-input::placeholder {
        color: rgba(255, 255, 255, 0.6);
    }

    @media (max-width: 768px) {
        .mahasiswa-container {
            padding: 1rem;
        }

        .page-title {
            font-size: 1.8rem;
        }

        .header-content {
            flex-direction: column;
            align-items: stretch;
        }

        .header-actions {
            justify-content: center;
        }

        .data-table th,
        .data-table td {
            padding: 0.75rem 0.5rem;
            font-size: 0.8rem;
        }

        .action-buttons {
            flex-direction: column;
            gap: 0.3rem;
        }

        .btn-action {
            justify-content: center;
        }

        .student-photo,
        .no-photo {
            width: 40px;
            height: 40px;
        }

        .stats-bar {
            flex-direction: column;
            text-align: center;
        }

        .search-filter {
            flex-direction: column;
            align-items: stretch;
        }
    }

    /* Loading Animation */
    .loading-row {
        background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
        background-size: 200% 100%;
        animation: loading 2s infinite;
    }

    @keyframes loading {
        0% {
            background-position: -200% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }
</style>

<div class="mahasiswa-container">
    <!-- Page Header -->
    <div class="page-header">
        <div class="header-content">
            <h1 class="page-title">
                <div class="title-icon">
                    <i class="fas fa-users"></i>
                </div>
                Data Mahasiswa
            </h1>
            <div class="header-actions">
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i>
                    Kembali ke Dashboard
                </a>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Tambah Mahasiswa
                </a>
            </div>
        </div>
    </div>

    <!-- Alert Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            <div class="alert-icon">
                <i class="fas fa-check"></i>
            </div>
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if($mahasiswas->count() > 0)
        <!-- Data Card -->
        <div class="data-card">
            <!-- Search and Filter -->
            <div class="search-filter">
                <div style="flex: 1;">
                    <input type="text" 
                           class="form-input" 
                           placeholder="Cari mahasiswa..." 
                           id="searchInput"
                           style="width: 100%; max-width: 400px;">
                </div>
                <select class="form-input" id="semesterFilter">
                    <option value="">Semua Semester</option>
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                    <option value="7">Semester 7</option>
                    <option value="8">Semester 8</option>
                </select>
            </div>

            <!-- Stats Bar -->
            <div class="stats-bar">
                <div>
                    <i class="fas fa-users mr-2"></i>
                    Total: <strong>{{ $mahasiswas->total() }}</strong> mahasiswa
                </div>
                <div>
                    <i class="fas fa-eye mr-2"></i>
                    Menampilkan {{ $mahasiswas->firstItem() ?? 0 }} - {{ $mahasiswas->lastItem() ?? 0 }}
                </div>
            </div>

            <!-- Table -->
            <div class="table-container">
                <table class="data-table" id="mahasiswaTable">
                    <thead>
                        <tr>
                            <th><i class="fas fa-hashtag mr-2"></i>No</th>
                            <th><i class="fas fa-id-card mr-2"></i>NIM</th>
                            <th><i class="fas fa-user mr-2"></i>Nama</th>
                            <th><i class="fas fa-envelope mr-2"></i>Email</th>
                            <th><i class="fas fa-graduation-cap mr-2"></i>Jurusan</th>
                            <th><i class="fas fa-calendar mr-2"></i>Semester</th>
                            <th><i class="fas fa-image mr-2"></i>Foto</th>
                            <th><i class="fas fa-cogs mr-2"></i>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswas as $index => $mahasiswa)
                        <tr data-search="{{ strtolower($mahasiswa->nama . ' ' . $mahasiswa->nim . ' ' . $mahasiswa->email . ' ' . $mahasiswa->jurusan) }}" data-semester="{{ $mahasiswa->semester }}">
                            <td>
                                <span class="badge badge-info">
                                    {{ $mahasiswas->firstItem() + $index }}
                                </span>
                            </td>
                            <td>
                                <strong>{{ $mahasiswa->nim }}</strong>
                            </td>
                            <td>
                                <div style="font-weight: 600;">{{ $mahasiswa->nama }}</div>
                            </td>
                            <td>
                                <div style="color: rgba(255, 255, 255, 0.8);">
                                    {{ $mahasiswa->email }}
                                </div>
                            </td>
                            <td>{{ $mahasiswa->jurusan }}</td>
                            <td>
                                <span class="badge badge-semester">
                                    Semester {{ $mahasiswa->semester }}
                                </span>
                            </td>
                            <td>
                                @if($mahasiswa->foto)
                                    <img src="{{ asset('storage/' . $mahasiswa->foto) }}"
                                         alt="Foto {{ $mahasiswa->nama }}" 
                                         class="student-photo"
                                         onclick="showImageModal(this.src, '{{ $mahasiswa->nama }}')">
                                @else
                                    <div class="no-photo">
                                        <i class="fas fa-user"></i>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <div class="action-buttons">
                                    <a href="{{ route('mahasiswa.show', $mahasiswa) }}" 
                                       class="btn-action btn-detail">
                                        <i class="fas fa-eye"></i>
                                        Detail
                                    </a>
                                    <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" 
                                       class="btn-action btn-edit">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </a>
                                    <form action="{{ route('mahasiswa.destroy', $mahasiswa) }}" 
                                          method="POST" 
                                          class="inline"
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus data {{ $mahasiswa->nama }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-action btn-delete">
                                            <i class="fas fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($mahasiswas->hasPages())
                <div class="pagination-container">
                    {{ $mahasiswas->links() }}
                </div>
            @endif
        </div>
    @else
        <!-- Empty State -->
        <div class="data-card">
            <div class="empty-state">
                <div class="empty-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3 class="empty-title">Belum Ada Data Mahasiswa</h3>
                <p class="empty-subtitle">
                    Mulai dengan menambahkan data mahasiswa pertama untuk sistem akademik Anda.
                </p>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary">
                    <i class="fas fa-user-plus"></i>
                    Tambah Data Pertama
                </a>
            </div>
        </div>
    @endif
</div>

<!-- Image Modal -->
<div id="imageModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.8); z-index: 1000; backdrop-filter: blur(10px);" onclick="closeImageModal()">
    <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
        <img id="modalImage" style="max-width: 90vw; max-height: 80vh; border-radius: 15px; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);">
        <div id="modalTitle" style="color: black; font-size: 1.2rem; font-weight: 600; margin-top: 1rem;"></div>
        <button onclick="closeImageModal()" style="position: absolute; top: -40px; right: -40px; background: white; border: none; border-radius: 50%; width: 40px; height: 40px; font-size: 1.2rem; cursor: pointer; color: #333;">×</button>
    </div>
</div>

<script>
    // Search functionality
    document.getElementById('searchInput').addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const semesterFilter = document.getElementById('semesterFilter').value;
        filterTable(searchTerm, semesterFilter);
    });

    // Semester filter functionality
    document.getElementById('semesterFilter').addEventListener('change', function() {
        const semesterFilter = this.value;
        const searchTerm = document.getElementById('searchInput').value.toLowerCase();
        filterTable(searchTerm, semesterFilter);
    });

    function filterTable(searchTerm, semesterFilter) {
        const rows = document.querySelectorAll('#mahasiswaTable tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            const searchData = row.getAttribute('data-search');
            const semesterData = row.getAttribute('data-semester');
            
            const matchesSearch = searchData.includes(searchTerm);
            const matchesSemester = !semesterFilter || semesterData === semesterFilter;
            
            if (matchesSearch && matchesSemester) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update stats
        const statsBar = document.querySelector('.stats-bar div');
        if (statsBar && (searchTerm || semesterFilter)) {
            statsBar.innerHTML = `<i class="fas fa-filter mr-2"></i>Menampilkan: <strong>${visibleCount}</strong> dari {{ $mahasiswas->total() }} mahasiswa`;
        } else if (statsBar) {
            statsBar.innerHTML = `<i class="fas fa-users mr-2"></i>Total: <strong>{{ $mahasiswas->total() }}</strong> mahasiswa`;
        }
    }

    // Image modal functions
    function showImageModal(src, name) {
        document.getElementById('modalImage').src = src;
        document.getElementById('modalTitle').textContent = 'Foto ' + name;
        document.getElementById('imageModal').style.display = 'block';
        document.body.style.overflow = 'hidden';
    }

    function closeImageModal() {
        document.getElementById('imageModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeImageModal();
        }
    });

    // Add loading animation to table rows
    document.querySelectorAll('.data-table tbody tr').forEach((row, index) => {
        row.style.opacity = '0';
        row.style.transform = 'translateY(20px)';
        setTimeout(() => {
            row.style.transition = 'all 0.5s ease';
            row.style.opacity = '1';
            row.style.transform = 'translateY(0)';
        }, index * 100);
    });

    // Smooth scroll to top when pagination is clicked
    document.querySelectorAll('.pagination a').forEach(link => {
        link.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    });

    // Auto-hide alerts
    setTimeout(() => {
        const alerts = document.querySelectorAll('.alert');
        alerts.forEach(alert => {
            alert.style.animation = 'slideOutUp 0.5s ease forwards';
            setTimeout(() => alert.remove(), 500);
        });
    }, 5000);
</script>

<style>
    @keyframes slideOutUp {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(-100%);
            opacity: 0;
        }
    }
</style>
@endsection