<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelOps | Smart Hotel Staff System</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --secondary: #06b6d4;
            --accent: #f59e0b;
            --dark-bg: #0f172a;
            --light-bg: #f8fafc;
            --glass: rgba(255, 255, 255, 0.9);
            --glass-border: rgba(255, 255, 255, 0.2);
            --shadow: 0 10px 30px -10px rgba(0, 0, 0, 0.2);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: #334155;
            overflow-x: hidden;
        }

        /* --- Animations --- */
        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        @keyframes pulse-ring {
            0% { transform: scale(0.8); opacity: 0.5; }
            100% { transform: scale(2.5); opacity: 0; }
        }

        @keyframes dashboard-entry {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* --- Navbar --- */
        .navbar {
            transition: all 0.3s ease;
            padding: 1rem 0;
            background: rgba(15, 23, 42, 0.8);
            backdrop-filter: blur(12px);
        }
        
        .navbar-brand {
           
            color: white !important;
            letter-spacing: -0.5px;
        }

        .navbar-brand img{
            height: 40px;
        }
        .nav-link {
            color: #cbd5e1 !important;
            font-weight: 500;
            position: relative;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -5px;
            left: 0;
            background: var(--secondary);
            transition: width 0.3s;
        }

        .nav-link:hover::after {
            width: 100%;
        }

        .btn-glass {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }

        .btn-glass:hover {
            background: white;
            color: var(--primary);
        }

        /* --- Hero Section --- */
        .hero-section {
            position: relative;
            padding-top: 120px;
            padding-bottom: 80px;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            color: white;
            overflow: hidden;
        }

        /* Background blobs */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.4;
            z-index: 0;
        }
        .blob-1 { top: -10%; left: -10%; width: 500px; height: 500px; background: var(--primary); }
        .blob-2 { bottom: -10%; right: -10%; width: 400px; height: 400px; background: var(--secondary); }

        .hero-content {
            position: relative;
            z-index: 2;
        }

        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            line-height: 1.2;
            background: linear-gradient(to right, #fff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 1.5rem;
        }

        /* 2D Animation Scene in Hero */
        .anim-scene {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 20px;
            height: 400px;
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 20px 50px rgba(0,0,0,0.3);
        }

        .isometric-grid {
            width: 100%;
            height: 100%;
            background-image: 
                linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            transform: perspective(500px) rotateX(20deg);
            position: absolute;
        }

        /* Central Hub Animation */
        .hub-node {
            width: 80px;
            height: 80px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 5;
            position: relative;
            box-shadow: 0 0 30px rgba(6, 182, 212, 0.5);
        }
        
        .hub-node i {
            font-size: 2rem;
            color: var(--dark-bg);
        }

        .hub-node::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid var(--secondary);
            animation: pulse-ring 2s infinite;
        }

        /* Orbiting Elements */
        .orbit {
            position: absolute;
            width: 300px;
            height: 300px;
            border: 1px dashed rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            animation: spin 20s linear infinite;
        }

        .planet {
            position: absolute;
            width: 40px;
            height: 40px;
            background: var(--dark-bg);
            border: 2px solid var(--accent);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--accent);
            top: 0;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 0 15px rgba(245, 158, 11, 0.3);
        }

        .data-line {
            position: absolute;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--secondary), transparent);
            width: 150px;
            top: 50%;
            left: 50%;
            transform-origin: 0 50%;
            animation: spin 3s linear infinite;
            opacity: 0.6;
        }

        @keyframes spin { 100% { transform: rotate(360deg); } }

        /* --- Interactive Simulation Section --- */
        .simulation-panel {
            background: white;
            border-radius: 20px;
            box-shadow: var(--shadow);
            overflow: hidden;
            position: relative;
            border: 1px solid #e2e8f0;
        }

        .sim-map {
            height: 400px;
            background-color: #f1f5f9;
            position: relative;
            background-image: radial-gradient(#cbd5e1 1px, transparent 1px);
            background-size: 20px 20px;
        }

        .sim-room {
            width: 80px;
            height: 80px;
            background: white;
            border: 2px solid #94a3b8;
            border-radius: 12px;
            position: absolute;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s;
            cursor: pointer;
        }
        
        .sim-room:hover { border-color: var(--primary); transform: scale(1.05); }
        .sim-room.active { background: #eff6ff; border-color: var(--primary); }
        .sim-room.cleaning { border-color: var(--secondary); background: #ecfeff; }
        .sim-room.done { border-color: #10b981; background: #ecfdf5; }

        .sim-controls {
            padding: 2rem;
            background: white;
        }

        .staff-avatar {
            position: absolute;
            width: 32px;
            height: 32px;
            background: var(--primary);
            border-radius: 50%;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            z-index: 10;
            transition: all 0.5s ease-in-out; /* Smooth movement */
            box-shadow: 0 4px 6px rgba(0,0,0,0.2);
            pointer-events: none; /* Let clicks pass through */
        }

        /* --- Feature Cards --- */
        .feature-card {
            background: white;
            padding: 2.5rem;
            border-radius: 16px;
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            height: 100%;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .icon-box {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: rgba(37, 99, 235, 0.1);
            color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
        }

        /* --- Footer --- */
        footer {
            background: var(--dark-bg);
            color: #94a3b8;
            padding: 1rem 0 2rem;
        }
        
        .footer-link { color: #94a3b8; text-decoration: none; transition: 0.2s; }
        .footer-link:hover { color: white; }

        /* --- Toast Notification --- */
        #toast-container {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
        }
        .custom-toast {
            background: white;
            border-left: 4px solid var(--primary);
            padding: 15px 25px;
            margin-top: 10px;
            border-radius: 8px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            display: flex;
            align-items: center;
            gap: 10px;
            transform: translateX(120%);
            transition: transform 0.4s ease-out;
            min-width: 300px;
        }
        .custom-toast.show { transform: translateX(0); }
        .custom-toast i { font-size: 1.2rem; }

        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .hero-title { font-size: 2.5rem; }
            .anim-scene { height: 300px; }
        }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
             <img src="<?= base_url('assets/') ?>images/logo.jpeg"  alt="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu" style="border-color: rgba(255,255,255,0.3);">
                <span class="navbar-toggler-icon" style="filter: invert(1);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#simulation">Live Demo</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#reviews">Reviews</a></li>
                    <li class="nav-item">
                        <a href="<?= base_url('login') ?>" class="btn  rounded-pill px-4" style="background: #4B49AC; color: white;" >Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section id="home" class="hero-section">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="container hero-content">
            <div class="row align-items-center">
               <div class="col-lg-6 mb-5 mb-lg-0">
    <span class="badge  text-dark mb-3 px-3 py-2 rounded-pill animate__animated animate__fadeInLeft" style="background: #4B49AC;">
        <i class="bi bi-stars me-1"></i> Hotel MobiCloud 
    </span>

    <h1 class="hero-title animate__animated animate__fadeInUp">
        Smart Hotel Staff & Task Management
    </h1>

    <p class="lead text-light opacity-75 mb-4 animate__animated animate__fadeInUp animate__delay-1s">
        Hotel MobiCloud helps hotel managers assign tasks, track staff work, and manage daily operations efficiently through a simple and secure dashboard.
    </p>

    <div class="d-flex gap-3 animate__animated animate__fadeInUp animate__delay-2s">
        <a href="<?= base_url('login') ?>" class="btn btn-glass btn-lg  px-4" style="background: #4B49AC;" >
            Login to Dashboard
        </a>
        <a href="#services" class="btn btn-glass btn-lg px-4">
            Explore Features
        </a>
    </div>
</div>


                <!-- 2D ANIMATION SHOWCASE: Visualizing the Ecosystem -->
                <div class="col-lg-6 animate__animated animate__zoomIn animate__delay-1s">
                    <div class="anim-scene">
                        <div class="isometric-grid"></div>
                        
                        <!-- Central Hub -->
                        <div class="hub-node">
                            <i class="bi bi-cpu-fill"></i>
                        </div>

                        <!-- Orbits -->
                        <div class="orbit">
                            <div class="planet"><i class="bi bi-bell"></i></div>
                        </div>
                        <div class="orbit" style="width: 220px; height: 220px; animation-duration: 15s; animation-direction: reverse;">
                            <div class="planet" style="border-color: var(--secondary); color: var(--secondary);"><i class="bi bi-clipboard-check"></i></div>
                        </div>

                        <!-- Data Lines -->
                        <div class="data-line" style="transform: rotate(0deg);"></div>
                        <div class="data-line" style="transform: rotate(120deg);"></div>
                        <div class="data-line" style="transform: rotate(240deg);"></div>

                        <!-- Floating Elements for depth -->
                        <div class="position-absolute top-0 end-0 bg-white p-2 rounded shadow-sm" style="animation: float 4s ease-in-out infinite;">
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-success rounded-circle" style="width: 10px; height: 10px;"></div>
                                <small class="fw-bold text-dark">System Online</small>
                            </div>
                        </div>
                        
                        <div class="position-absolute bottom-0 start-0 bg-dark text-white p-2 rounded shadow-sm" style="animation: float 5s ease-in-out infinite 1s;">
                            <small><i class="bi bi-people-fill me-1"></i> Staff: 10 Active</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- INTERACTIVE SIMULATION SECTION (The "Animation Showcase") -->
    <section id="simulation" class="section-padding bg-light" style="margin-bottom: 20px;margin-top:20px;m">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-6 text-dark">Interactive Task Dispatcher</h2>
                <p class="text-muted">Experience how Hotel MobiCloud assigns and tracks staff in real-time.</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="simulation-panel">
                        <!-- The Visual Map -->
                        <div class="sim-map" id="simMap">
                            <!-- Staff Base (Starting Point) -->
                            <div class="position-absolute top-50 start-50 translate-middle text-center" style="z-index: 5;">
                                <div class="bg-primary text-white rounded-circle p-3 shadow-lg border border-3 border-white">
                                    <i class="bi bi-houses-fill fs-4"></i>
                                </div>
                                <div class="bg-white px-2 py-1 rounded mt-1 shadow-sm fw-bold small text-primary">Staff Hub</div>
                            </div>

                            <!-- Rooms -->
                            <!-- Using absolute positioning percentages to make it responsive-ish -->
                            <div class="sim-room" style="top: 10%; left: 10%;" data-room="101">
                                <i class="bi bi-door-open-fill text-muted mb-1"></i>
                                101
                                <span class="badge bg-danger w-75 mt-1 status-badge">Dirty</span>
                            </div>
                            
                            <div class="sim-room" style="top: 10%; right: 10%;" data-room="102">
                                <i class="bi bi-door-closed-fill text-muted mb-1"></i>
                                102
                                <span class="badge bg-warning text-dark w-75 mt-1 status-badge">Towels</span>
                            </div>

                            <div class="sim-room" style="bottom: 20%; left: 15%;" data-room="103">
                                <i class="bi bi-door-closed-fill text-muted mb-1"></i>
                                103
                                <span class="badge bg-danger w-75 mt-1 status-badge">Dirty</span>
                            </div>

                            <div class="sim-room" style="bottom: 20%; right: 15%;" data-room="104">
                                <i class="bi bi-door-open-fill text-muted mb-1"></i>
                                104
                                <span class="badge bg-secondary w-75 mt-1 status-badge">Inspect</span>
                            </div>

                            <!-- Dynamic Staff Avatar will be injected here via JS -->
                        </div>

                        <!-- Controls -->
                        <div class="sim-controls">
                            <h5 class="fw-bold mb-3">Dispatch Control</h5>
                            <p class="small text-muted">Click a button below to send a staff member to that room.</p>
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-outline-primary" onclick="dispatchTask('101', 'Clean Room')">Clean 101</button>
                                <button class="btn btn-outline-warning" onclick="dispatchTask('102', 'Replace Towels')">Service 102</button>
                                <button class="btn btn-outline-primary" onclick="dispatchTask('103', 'Deep Clean')">Clean 103</button>
                                <button class="btn btn-outline-secondary" onclick="dispatchTask('104', 'Inspect')">Inspect 104</button>
                                <button class="btn btn-dark ms-auto" onclick="resetSim()">Reset All</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES SECTION -->
  <section id="services" class="section-padding" style="margin-bottom: 20px;">
    <div class="container">
        <div class="row g-4">

            <!-- Staff Management -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box">
                        <i class="bi bi-people"></i>
                    </div>
                    <h4>Staff Management</h4>
                    <p class="text-muted">
                        Easily add, view, activate, or deactivate hotel staff members and manage their roles from a centralized admin dashboard.
                    </p>
                </div>
            </div>

            <!-- Task Assignment -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box" style="background: rgba(245, 158, 11, 0.1); color: #f59e0b;">
                        <i class="bi bi-list-check"></i>
                    </div>
                    <h4>Task Assignment</h4>
                    <p class="text-muted">
                        Assign daily hotel tasks such as room cleaning, reception duties, or maintenance work with deadlines and status tracking.
                    </p>
                </div>
            </div>

            <!-- Task Tracking -->
            <div class="col-md-4">
                <div class="feature-card">
                    <div class="icon-box" style="background: rgba(16, 185, 129, 0.1); color: #10b981;">
                        <i class="bi bi-graph-up-arrow"></i>
                    </div>
                    <h4>Task Tracking</h4>
                    <p class="text-muted">
                        Track pending and completed tasks in real time. Staff can update task status and add optional completion notes.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>




    <!-- FOOTER -->
    <footer>
        <div class="container mt-5">
       
       
            <div class="text-center small">
                &copy; 2026 Hotel MobiCloud Staff Management System. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Toast Container -->
    <div id="toast-container"></div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // --- Custom Toast Notification Logic ---
        function showToast(message, type = 'success') {
            const container = document.getElementById('toast-container');
            const toast = document.createElement('div');
            toast.className = 'custom-toast';
            
            let icon = 'bi-check-circle-fill text-success';
            if(type === 'info') icon = 'bi-info-circle-fill text-primary';
            if(type === 'warning') icon = 'bi-exclamation-triangle-fill text-warning';

            toast.innerHTML = `<i class="bi ${icon}"></i> <span class="fw-medium">${message}</span>`;
            
            container.appendChild(toast);
            
            // Trigger animation
            setTimeout(() => toast.classList.add('show'), 10);

            // Remove after 3 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                setTimeout(() => toast.remove(), 400);
            }, 3000);
        }

        // --- Interactive Simulation Logic ---
        function dispatchTask(roomId, taskName) {
            const map = document.getElementById('simMap');
            const roomEl = document.querySelector(`.sim-room[data-room="${roomId}"]`);
            const mapRect = map.getBoundingClientRect();
            const roomRect = roomEl.getBoundingClientRect();

            // Calculate target coordinates relative to the map container
            const targetX = roomRect.left - mapRect.left + (roomRect.width / 2) - 16; // 16 is half avatar width
            const targetY = roomRect.top - mapRect.top + (roomRect.height / 2) - 16;

            // Create Staff Avatar
            const avatar = document.createElement('div');
            avatar.className = 'staff-avatar';
            avatar.innerHTML = '<i class="bi bi-person-fill"></i>';
            
            // Start from center (Staff Hub)
            const startX = mapRect.width / 2 - 16;
            const startY = mapRect.height / 2 - 16;
            
            avatar.style.left = startX + 'px';
            avatar.style.top = startY + 'px';
            
            map.appendChild(avatar);

            // Visual feedback on room
            roomEl.classList.add('active');
            
            showToast(`Dispatching staff to Room ${roomId} for ${taskName}...`, 'info');

            // Animate using CSS Transition (Simple interpolation logic)
            // Force reflow
            void avatar.offsetWidth; 
            
            avatar.style.left = targetX + 'px';
            avatar.style.top = targetY + 'px';

            // Task Completion Logic
            setTimeout(() => {
                // Work animation
                roomEl.classList.add('cleaning');
                avatar.style.opacity = '0'; // Staff "enters" the room visually
                
                setTimeout(() => {
                    // Task Done
                    roomEl.classList.remove('active', 'cleaning');
                    roomEl.classList.add('done');
                    
                    // Update badge
                    const badge = roomEl.querySelector('.status-badge');
                    badge.className = 'badge bg-success w-75 mt-1 status-badge';
                    badge.innerText = 'Clean';
                    
                    showToast(`Room ${roomId} marked as Clean!`, 'success');
                    avatar.remove();
                }, 1500);
            }, 1000); // Travel time
        }

        function resetSim() {
            document.querySelectorAll('.sim-room').forEach(room => {
                room.classList.remove('done', 'cleaning', 'active');
                const badge = room.querySelector('.status-badge');
                // Revert random states for demo purposes
                if(room.dataset.room === "102") {
                     badge.className = 'badge bg-warning text-dark w-75 mt-1 status-badge';
                     badge.innerText = 'Towels';
                } else if (room.dataset.room === "104") {
                     badge.className = 'badge bg-secondary w-75 mt-1 status-badge';
                     badge.innerText = 'Inspect';
                } else {
                     badge.className = 'badge bg-danger w-75 mt-1 status-badge';
                     badge.innerText = 'Dirty';
                }
            });
            showToast('Simulation Reset', 'warning');
        }

        // --- Navbar Scroll Effect ---
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('shadow-sm');
                navbar.style.padding = '0.5rem 0';
            } else {
                navbar.classList.remove('shadow-sm');
                navbar.style.padding = '1rem 0';
            }
        });
    </script>
</body>
</html>