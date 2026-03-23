@extends('layouts.dashboard')

@section('content')
<div class="container-fluid">
    <!-- Page Header -->
    <div class="page-header mb-3">
        <h1 class="page-title">Dashboard Overview</h1>
        <p class="text-muted mb-0">Karibu tena! Hapa kuna muhtasari wa kinachoendelea shuleni leo.</p>
    </div>

    <!-- Stats Cards (Compact Info Boxes) -->
    <div class="row" id="stats-container">
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="info-box">
                <span class="info-box-icon bg-info text-white">
                    <i class="fas fa-school"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Shule Zilizosajiliwa</span>
                    <span class="info-box-number" id="stat-schools">
                        <span class="skeleton-text">---</span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="info-box">
                <span class="info-box-icon bg-success text-white">
                    <i class="fas fa-user-graduate"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Wanafunzi Walipo</span>
                    <span class="info-box-number" id="stat-students">
                        <span class="skeleton-text">---</span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="info-box">
                <span class="info-box-icon bg-warning text-white">
                    <i class="fas fa-edit"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Mitihani Iliyofanyika</span>
                    <span class="info-box-number" id="stat-exams">
                        <span class="skeleton-text">---</span>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="col-lg-3 col-md-6 col-12 mb-3">
            <div class="info-box">
                <span class="info-box-icon bg-danger text-white">
                    <i class="fas fa-chart-pie"></i>
                </span>
                <div class="info-box-content">
                    <span class="info-box-text">Ufaulu wa Jumla</span>
                    <span class="info-box-number" id="stat-pass">
                        <span class="skeleton-text">---</span>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Quick Links Column -->
        <div class="col-lg-4 col-md-12 mb-3">
            <div class="card h-100">
                <div class="card-header py-2">
                    <h6 class="card-title mb-0"><i class="fas fa-bolt text-primary me-2"></i> Njia za Mkato</h6>
                </div>
                <div class="card-body p-2">
                    <a href="#" class="quick-link-item">
                        <div class="quick-link-icon bg-primary">
                            <i class="fas fa-keyboard"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Ingiza Alama za Mitihani</h6>
                            <small class="text-muted">Ingiza alama za majaribio mapya</small>
                        </div>
                        <i class="fas fa-chevron-right ms-auto text-muted"></i>
                    </a>
                    
                    <a href="#" class="quick-link-item">
                        <div class="quick-link-icon bg-success">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Sajili Mwanafunzi</h6>
                            <small class="text-muted">Ongeza mwanafunzi kwenye darasa</small>
                        </div>
                        <i class="fas fa-chevron-right ms-auto text-muted"></i>
                    </a>
                    
                    <a href="#" class="quick-link-item">
                        <div class="quick-link-icon bg-warning">
                            <i class="fas fa-print"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Print Report Cards</h6>
                            <small class="text-muted">Tengeneza ripoti za wanafunzi</small>
                        </div>
                        <i class="fas fa-chevron-right ms-auto text-muted"></i>
                    </a>

                    <a href="#" class="quick-link-item border-0">
                        <div class="quick-link-icon bg-info">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <div>
                            <h6 class="mb-0">Angalia Matokeo</h6>
                            <small class="text-muted">Matokeo ya hivi karibuni</small>
                        </div>
                        <i class="fas fa-chevron-right ms-auto text-muted"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Results Table Column -->
        <div class="col-lg-8 col-md-12 mb-3">
            <div class="card h-100">
                <div class="card-header py-2 d-flex justify-content-between align-items-center">
                    <h6 class="card-title mb-0"><i class="fas fa-history text-warning me-2"></i> Matokeo ya Hivi Karibuni</h6>
                    <a href="#" class="btn btn-sm btn-outline-primary">Angalia Yote</a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-sm mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="py-2">MWANAFUNZI</th>
                                    <th class="py-2">MTIHANI</th>
                                    <th class="py-2">WASTANI</th>
                                    <th class="py-2">DIV</th>
                                    <th class="py-2">POS</th>
                                </tr>
                            </thead>
                            <tbody id="results-table">
                                <tr><td colspan="5" class="text-center py-3"><div class="spinner-border spinner-border-sm text-primary"></div> <span class="text-muted">Inapakia...</span></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Info Box - AdminLTE Style */
.info-box {
    background: #fff;
    border-radius: 0.5rem;
    box-shadow: 0 0 1px rgba(0,0,0,0.125), 0 1px 3px rgba(0,0,0,0.1);
    display: flex;
    min-height: 70px;
    padding: 0.5rem;
    transition: transform 0.2s, box-shadow 0.2s;
}
.info-box:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 1px rgba(0,0,0,0.125), 0 3px 8px rgba(0,0,0,0.15);
}
.info-box-icon {
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    width: 50px;
    height: 50px;
    flex-shrink: 0;
}
.info-box-content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 0 0.75rem;
    flex-grow: 1;
}
.info-box-text {
    font-size: 0.75rem;
    color: #6c757d;
    font-weight: 500;
}
.info-box-number {
    font-size: 1.25rem;
    font-weight: 700;
    color: #343a40;
    line-height: 1.2;
}

/* Skeleton Loading */
.skeleton-text {
    background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
    background-size: 200% 100%;
    animation: skeleton-loading 1.5s infinite;
    border-radius: 4px;
    padding: 0 10px;
    color: transparent;
}
@keyframes skeleton-loading {
    0% { background-position: 200% 0; }
    100% { background-position: -200% 0; }
}

/* Quick Links */
.quick-link-item {
    display: flex;
    align-items: center;
    padding: 10px;
    border-bottom: 1px solid #f0f0f0;
    text-decoration: none;
    color: inherit;
    transition: background 0.15s;
    border-radius: 0.25rem;
    margin-bottom: 2px;
}
.quick-link-item:hover {
    background: #f8f9fa;
}
.quick-link-icon {
    width: 40px;
    height: 40px;
    border-radius: 0.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 1rem;
    margin-right: 12px;
    flex-shrink: 0;
}
.quick-link-item h6 {
    font-size: 0.875rem;
    font-weight: 500;
    color: #343a40;
}
.quick-link-item small {
    font-size: 0.75rem;
}

/* Badge INC */
.badge-inc {
    background: #6c757d;
    color: #fff;
    padding: 2px 8px;
    border-radius: 4px;
    font-size: 0.7rem;
    font-weight: 500;
}

/* Table */
.table th {
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #6c757d;
}
.table td {
    font-size: 0.875rem;
    vertical-align: middle;
}
</style>

<script>
// Simulate loading stats
document.addEventListener('DOMContentLoaded', function() {
    setTimeout(() => {
        document.getElementById('stat-schools').innerHTML = '1';
        document.getElementById('stat-students').innerHTML = '294';
        document.getElementById('stat-exams').innerHTML = '1';
        document.getElementById('stat-pass').innerHTML = '3<small class="text-muted">%</small>';
    }, 500);

    // Simulate loading table
    setTimeout(() => {
        const data = [
            { name: 'Sophia Anna Khamis', exam: 'midterm examination', avg: '0.0%', div: 'INC', pos: '-' },
            { name: 'Benjamin Peter Mwakyoma', exam: 'midterm examination', avg: '0.0%', div: 'INC', pos: '-' },
            { name: 'Paul Elijah Omari', exam: 'midterm examination', avg: '0.0%', div: 'INC', pos: '-' },
            { name: 'Linda Faith Komba', exam: 'midterm examination', avg: '0.0%', div: 'INC', pos: '-' },
            { name: 'Anna Grace Joseph', exam: 'midterm examination', avg: '0.0%', div: 'INC', pos: '-' },
        ];
        
        let html = '';
        data.forEach(row => {
            html += `<tr>
                <td>${row.name}</td>
                <td>${row.exam}</td>
                <td>${row.avg}</td>
                <td><span class="badge-inc">${row.div}</span></td>
                <td>${row.pos}</td>
            </tr>`;
        });
        document.getElementById('results-table').innerHTML = html;
    }, 800);
});
</script>
@endsection
