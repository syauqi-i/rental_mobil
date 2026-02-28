<?php
/**
 * Shared Modern UI Stylesheet Partial
 * Include at the top of every module page's <head>
 */
?>
<link href="<?= base_url('sb-admin-2/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<link href="<?= base_url('sb-admin-2/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
<link href="<?= base_url('sb-admin-2/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<style>
  :root {
    --primary:       #2563eb;
    --primary-light: #eff6ff;
    --success:       #16a34a;
    --success-light: #f0fdf4;
    --warning:       #d97706;
    --danger:        #dc2626;
    --indigo:        #6366f1;
    --surface:       #ffffff;
    --bg:            #f8fafc;
    --border:        #e2e8f0;
    --text-dark:     #0f172a;
    --text-mid:      #334155;
    --text-light:    #94a3b8;
    --radius:        14px;
    --shadow-sm:     0 1px 4px rgba(15,23,42,.06);
    --shadow-md:     0 4px 18px rgba(15,23,42,.08);
  }

  *, *::before, *::after { box-sizing: border-box; }

  body {
    font-family: 'Inter', system-ui, sans-serif;
    background: var(--bg);
    color: var(--text-dark);
    overflow-x: hidden;
  }
  body::before {
    content: '';
    position: fixed; inset: 0;
    background-image: radial-gradient(circle, rgba(99,102,241,.05) 1px, transparent 1px);
    background-size: 28px 28px;
    pointer-events: none; z-index: 0;
  }

  #wrapper { display: flex; min-height: 100vh; position: relative; z-index: 1; }
  #content-wrapper { flex: 1; min-width: 0; display: flex; flex-direction: column; overflow: hidden; }
  #content { flex: 1; }

  .main-content { padding: 1.5rem 1.75rem; }
  @media(max-width:768px){ .main-content{ padding: 1rem; } }

  /* ── FadeUp ── */
  @keyframes fadeUp {
    from{ opacity:0; transform:translateY(14px); }
    to  { opacity:1; transform:translateY(0); }
  }

  /* ── Page header ── */
  .page-header {
    display: flex; align-items: center;
    justify-content: space-between;
    margin-bottom: 1.4rem;
    flex-wrap: wrap; gap: .75rem;
  }
  .page-header h1 {
    font-size: 1.3rem; font-weight: 800;
    color: var(--text-dark); letter-spacing: -.4px;
    margin: 0 0 2px;
  }
  .page-header p { font-size: .82rem; color: var(--text-light); margin: 0; }

  /* ── Cards ── */
  .mod-card {
    background: var(--surface);
    border-radius: var(--radius);
    border: 1px solid var(--border);
    box-shadow: var(--shadow-sm);
    overflow: hidden;
    animation: fadeUp .45s ease both;
  }
  .mod-card-header {
    display: flex; align-items: center;
    justify-content: space-between;
    padding: .9rem 1.3rem;
    border-bottom: 1px solid var(--border);
    gap: .6rem; flex-wrap: wrap;
  }
  .mod-card-title {
    font-size: .88rem; font-weight: 700;
    color: var(--text-dark);
    display: flex; align-items: center; gap: 7px;
  }
  .mod-card-title i { color: var(--primary); }
  .mod-card-body { padding: 1.25rem; }
  .mod-card-body-flush { padding: 0; }

  /* ── Content grid (form left, table right) ── */
  .content-grid {
    display: grid;
    grid-template-columns: 320px 1fr;
    gap: 1.25rem;
    align-items: start;
  }
  @media(max-width:860px){ .content-grid{ grid-template-columns: 1fr; } }

  /* ── Alerts ── */
  .mod-alert {
    display: flex; align-items: center; gap: 8px;
    padding: .72rem .95rem;
    border-radius: 10px;
    font-size: .84rem; font-weight: 500;
    margin: 1rem 1rem 0;
    animation: fadeUp .4s ease both;
  }
  .mod-alert-success { background:#f0fdf4; border:1px solid #bbf7d0; color:#166534; }
  .mod-alert-danger  { background:#fef2f2; border:1px solid #fecaca; color:#991b1b; }
  .mod-alert-close   {
    margin-left:auto; background:none; border:none;
    font-size:1rem; cursor:pointer; opacity:.5; padding:0;
    color:inherit;
  }
  .mod-alert-close:hover { opacity:1; }

  /* ── Form controls ── */
  .form-label-mod {
    display: block; margin-bottom: 5px;
    font-size: .75rem; font-weight: 700;
    color: var(--text-mid);
    text-transform: uppercase; letter-spacing: .45px;
  }
  .form-input-mod {
    width: 100%; padding: .68rem .95rem;
    border: 1.5px solid var(--border);
    border-radius: 10px;
    background: #f8fafc;
    font-size: .88rem; color: var(--text-dark);
    font-family: 'Inter', sans-serif;
    transition: border-color .18s, box-shadow .18s, background .18s;
    outline: none;
    appearance: none; -webkit-appearance: none;
  }
  .form-input-mod::placeholder { color: #cbd5e1; }
  .form-input-mod:focus {
    border-color: var(--primary);
    box-shadow: 0 0 0 3px rgba(37,99,235,.10);
    background: #fff;
  }
  select.form-input-mod {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2394a3b8' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
    background-repeat: no-repeat;
    background-position: right 12px center;
    padding-right: 2.2rem;
  }
  textarea.form-input-mod { resize: vertical; min-height: 80px; }

  .form-group-mod { margin-bottom: .95rem; }
  .form-row-mod   { display: grid; grid-template-columns: 1fr 1fr; gap: .75rem; }
  @media(max-width:480px){ .form-row-mod{ grid-template-columns: 1fr; } }

  /* File upload */
  .file-upload-mod {
    border: 1.5px dashed var(--border);
    border-radius: 10px;
    padding: .8rem 1rem;
    display: flex; align-items: center; gap: .6rem;
    cursor: pointer; transition: border-color .18s, background .18s;
    background: #f8fafc;
  }
  .file-upload-mod:hover { border-color: var(--primary); background: var(--primary-light); }
  .file-upload-mod i { color: var(--text-light); }
  .file-upload-mod input[type=file] { display: none; }
  .file-upload-label { font-size: .83rem; color: var(--text-light); cursor: pointer; width: 100%; }

  /* ── Buttons ── */
  .btn-mod {
    display: inline-flex; align-items: center; gap: 6px;
    padding: .52rem 1.1rem;
    border-radius: 10px;
    font-size: .83rem; font-weight: 600;
    font-family: 'Inter', sans-serif;
    cursor: pointer; border: none;
    transition: all .18s;
    text-decoration: none;
    white-space: nowrap;
  }
  .btn-primary-mod   { background: var(--primary);  color:#fff; box-shadow:0 4px 12px rgba(37,99,235,.22); }
  .btn-success-mod   { background: var(--success);  color:#fff; box-shadow:0 4px 12px rgba(22,163,74,.18); }
  .btn-warning-mod   { background: var(--warning);  color:#fff; box-shadow:0 4px 12px rgba(217,119,6,.18); }
  .btn-danger-mod    { background: #fef2f2; color:var(--danger); border:1.5px solid rgba(220,38,38,.18) !important; }
  .btn-back-mod      { background: #f8fafc; color:var(--text-mid); border:1.5px solid var(--border) !important; }
  .btn-reset-mod     { background: #fff;    color:var(--text-mid); border:1.5px solid var(--border) !important; }

  .btn-primary-mod:hover { background:#1d4ed8; transform:translateY(-1px); box-shadow:0 6px 18px rgba(37,99,235,.30); color:#fff; }
  .btn-success-mod:hover { background:#15803d; transform:translateY(-1px); color:#fff; }
  .btn-warning-mod:hover { background:#b45309; transform:translateY(-1px); color:#fff; }
  .btn-danger-mod:hover  { background:#fee2e2; transform:translateY(-1px); }
  .btn-back-mod:hover    { background:#f1f5f9; }
  .btn-reset-mod:hover   { background:#f8fafc; }

  .btn-actions { display:flex; gap:.5rem; flex-wrap:wrap; }

  /* ── Table ── */
  .mod-table { width: 100%; border-collapse: collapse; font-size: .84rem; }
  .mod-table thead th {
    background: #f8fafc;
    color: var(--text-light);
    font-size: .68rem; font-weight: 700;
    text-transform: uppercase; letter-spacing: .6px;
    padding: .65rem 1rem;
    border-bottom: 1px solid var(--border);
    white-space: nowrap;
  }
  .mod-table tbody td {
    padding: .75rem 1rem;
    border-bottom: 1px solid var(--border);
    color: var(--text-mid);
    vertical-align: middle;
  }
  .mod-table tbody tr:last-child td { border-bottom: none; }
  .mod-table tbody tr { transition: background .12s; }
  .mod-table tbody tr:hover td { background: #f8fafc; }

  /* ── Row number badge ── */
  .row-num {
    display:inline-flex; align-items:center; justify-content:center;
    width:24px; height:24px;
    background:#f1f5f9; border-radius:6px;
    font-size:.72rem; font-weight:700; color:var(--text-light);
  }

  /* ── Action buttons ── */
  .act-btn {
    display:inline-flex; align-items:center; gap:4px;
    padding:.34rem .8rem;
    border-radius:8px;
    font-size:.75rem; font-weight:600;
    text-decoration:none;
    transition:all .16s;
    border:1.5px solid transparent;
    white-space:nowrap;
  }
  .act-btn + .act-btn { margin-left:3px; }

  /* ── Action group wrapper (use inside table cells) ── */
  .act-group {
    display: inline-flex;
    align-items: center;
    gap: 4px;
    flex-wrap: nowrap;
    justify-content: center;
  }

  /* Prevent last column (actions) from wrapping */
  .mod-table tbody td:last-child,
  .mod-table thead th:last-child {
    white-space: nowrap;
  }

  .act-edit   { background:#eff6ff; color:#2563eb; border-color:rgba(37,99,235,.15); }
  .act-detail { background:#fffbeb; color:#d97706; border-color:rgba(217,119,6,.15); }
  .act-del    { background:#fef2f2; color:#dc2626; border-color:rgba(220,38,38,.15); }
  .act-edit:hover   { background:#dbeafe; transform:translateY(-1px); }
  .act-detail:hover { background:#fef3c7; transform:translateY(-1px); }
  .act-del:hover    { background:#fee2e2; transform:translateY(-1px); }

  /* ── Badges / pills ── */
  .badge-pill {
    display:inline-flex; align-items:center; gap:5px;
    padding:3px 10px; border-radius:100px;
    font-size:.74rem; font-weight:600;
  }
  .badge-blue   { background:#eff6ff; color:#1d4ed8; border:1px solid rgba(37,99,235,.12); }
  .badge-green  { background:#f0fdf4; color:#166534; border:1px solid rgba(22,163,74,.12); }
  .badge-amber  { background:#fffbeb; color:#92400e; border:1px solid rgba(217,119,6,.12); }
  .badge-indigo { background:#eef2ff; color:#4338ca; border:1px solid rgba(99,102,241,.12); }
  .badge-slate  { background:#f1f5f9; color:#475569; border:1px solid #e2e8f0; }

  /* ── Detail card ── */
  .detail-info-row {
    display:flex; align-items:center;
    padding:.6rem 1.3rem;
    border-bottom:1px solid var(--border);
    gap:.75rem;
  }
  .detail-info-row:last-child { border-bottom:none; }
  .detail-info-key {
    width:140px; flex-shrink:0;
    font-size:.76rem; font-weight:600;
    color:var(--text-light);
    text-transform:uppercase; letter-spacing:.4px;
  }
  .detail-info-val { font-size:.88rem; font-weight:600; color:var(--text-dark); }

  /* ── Empty state ── */
  .empty-state {
    text-align:center; padding:3rem 1rem;
    color:var(--text-light);
  }
  .empty-state i { font-size:2.2rem; display:block; margin-bottom:.75rem; color:#e2e8f0; }
  .empty-state p  { font-size:.85rem; margin:0; }

  /* ── Avatar small ── */
  .avatar-sm {
    width:36px; height:36px;
    border-radius:10px;
    object-fit:cover;
    border:2px solid var(--border);
  }

  /* ── Count badge ── */
  .count-badge {
    background:var(--primary-light); color:var(--primary);
    font-size:.68rem; font-weight:700;
    padding:2px 9px; border-radius:100px;
    margin-left:4px;
  }

  /* ── Scroll to top ── */
  .scroll-to-top {
    position:fixed !important; right:1.5rem; bottom:1.5rem;
    width:38px; height:38px;
    background:var(--primary) !important; color:#fff !important;
    border-radius:10px !important;
    display:flex; align-items:center; justify-content:center;
    box-shadow:0 4px 14px rgba(37,99,235,.28); z-index:999;
    transition:transform .18s; text-decoration:none;
  }
  .scroll-to-top:hover { transform:translateY(-2px); }

  /* ── Sidebar overlay ── */
  .sidebar-overlay {
    display:none;
    position:fixed; inset:0;
    background:rgba(15,23,42,.40);
    z-index:1039;
    backdrop-filter:blur(3px);
  }
  .sidebar-toggled .sidebar-overlay { display:block; }
</style>
