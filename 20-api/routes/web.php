<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return "<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Company - Welcome</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css' rel='stylesheet'>
    <link href='https://cdn.jsdelivr.net/npm/@fontsource/inter@5.0.18/index.css' rel='stylesheet'>
    <style>
         * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0a0a2e;
            color: white;
            overflow-x: hidden;
            min-height: 100vh;
        }

        /* Navbar */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100;
            padding: 1.25rem 3rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: transparent;
            transition: background 0.3s ease;
        }

        .navbar.scrolled {
            background: rgba(10, 10, 46, 0.95);
            backdrop-filter: blur(20px);
        }

        .nav-left {
            display: flex;
            align-items: center;
            gap: 2.5rem;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            cursor: pointer;
        }

        .brand-icon {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.85);
            border-radius: 50%;
            position: relative;
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            list-style: none;
        }

        .nav-links a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.75rem;
            font-weight: 500;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 0;
            height: 1px;
            background: rgba(255, 255, 255, 0.8);
            transition: width 0.3s ease;
        }

        .nav-links a:hover {
            color: rgba(255, 255, 255, 0.95);
        }

        .nav-links a:hover::after {
            width: 100%;
        }

        .nav-right {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }

        .search-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            cursor: pointer;
            font-size: 1rem;
            transition: color 0.3s ease;
            padding: 0.25rem;
        }

        .search-btn:hover {
            color: rgba(255, 255, 255, 0.95);
        }

        .signin-btn {
            background: transparent;
            border: 1px solid rgba(255, 255, 255, 0.3);
            color: rgba(255, 255, 255, 0.85);
            padding: 0.4rem 1.25rem;
            border-radius: 20px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .signin-btn:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            color: white;
        }

        /* Main Content */
        .main-content {
            position: relative;
            width: 100vw;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            z-index: 10;
        }

        /* Canvas for light trails */
        #lightTrailsCanvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
        }

        /* Hero Text */
        .hero-text {
            text-align: center;
            z-index: 10;
            position: relative;
        }

        .welcome-title {
            font-size: clamp(2.5rem, 6vw, 4.5rem);
            font-weight: 300;
            letter-spacing: 8px;
            text-transform: uppercase;
            color: rgba(255, 255, 255, 0.95);
            margin-bottom: 1.25rem;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 0.5s;
        }

        .hero-description {
            font-size: clamp(0.8rem, 1.5vw, 0.95rem);
            color: rgba(255, 255, 255, 0.45);
            line-height: 1.8;
            max-width: 420px;
            margin: 0 auto 2.5rem;
            letter-spacing: 0.5px;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 0.8s;
        }

        .learn-more-btn {
            display: inline-block;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: rgba(255, 255, 255, 0.9);
            padding: 0.6rem 2rem;
            border-radius: 25px;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.4s ease;
            text-decoration: none;
            opacity: 0;
            animation: fadeInUp 1s ease forwards 1.1s;
            position: relative;
            overflow: hidden;
        }

        .learn-more-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .learn-more-btn:hover {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.4);
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(100, 60, 255, 0.3);
        }

        .learn-more-btn:hover::before {
            left: 100%;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Particles */
        .particles-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 0;
            pointer-events: none;
        }

        .particle {
            position: absolute;
            width: 2px;
            height: 2px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: twinkle 3s ease-in-out infinite;
        }

        @keyframes twinkle {
            0%, 100% { opacity: 0.2; transform: scale(1); }
            50% { opacity: 0.8; transform: scale(1.5); }
        }

        /* Mobile Menu */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.5rem;
            cursor: pointer;
            padding: 0.25rem;
        }

        /* Responsive */
        @media (max-width: 900px) {
            .navbar {
                padding: 1rem 1.5rem;
            }

            .nav-left {
                gap: 1.5rem;
            }

            .nav-links {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background: rgba(10, 10, 46, 0.98);
                flex-direction: column;
                align-items: center;
                justify-content: center;
                gap: 2.5rem;
                z-index: 200;
            }

            .nav-links.active {
                display: flex;
            }

            .nav-links a {
                font-size: 1.2rem;
            }

            .mobile-toggle {
                display: block;
                z-index: 201;
            }

            .welcome-title {
                letter-spacing: 4px;
            }
        }

        @media (max-width: 600px) {
            .navbar {
                padding: 1rem;
            }

            .brand {
                font-size: 0.75rem;
            }

            .signin-btn {
                padding: 0.35rem 1rem;
                font-size: 0.65rem;
            }
        }

        /* Glow effect behind text */
        .text-glow {
            position: absolute;
            width: 300px;
            height: 300px;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(100, 60, 255, 0.15) 0%, transparent 70%);
            filter: blur(40px);
            z-index: 5;
            pointer-events: none;
            animation: glowPulse 4s ease-in-out infinite;
        }

        @keyframes glowPulse {
            0%, 100% { opacity: 0.6; transform: scale(1); }
            50% { opacity: 1; transform: scale(1.2); }
        }

        /* Vignette overlay */
        .vignette {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(ellipse at center, transparent 40%, rgba(5, 5, 30, 0.5) 100%);
            z-index: 2;
            pointer-events: none;
        }  
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class='navbar' id='navbar'>
        <div class='nav-left'>
            <a class='brand' href='#'>
                <span class='brand-icon'></span>
                Company
            </a>
            <ul class='nav-links' id='navLinks'>
                <li><a href='#home'>Home</a></li>
                <li><a href='#about'>About Us</a></li>
                <li><a href='#contact'>Contact Us</a></li>
            </ul>
        </div>
        <div class='nav-right'>
            <button class='search-btn' aria-label='Search'>
                <i class='bi bi-search'></i>
            </button>
            <a href='#signin' class='signin-btn'>Sign In</a>
            <button class='mobile-toggle' id='mobileToggle' aria-label='Menu'>
                <i class='bi bi-list'></i>
            </button>
        </div>
    </nav>

    <!-- Particles Background -->
    <div class='particles-container' id='particles'></div>

    <!-- Vignette -->
    <div class='vignette'></div>

    <!-- Light Trails Canvas -->
    <canvas id='lightTrailsCanvas'></canvas>

    <!-- Text Glow -->
    <div class='text-glow' id='textGlow'></div>

    <!-- Main Content -->
    <div class='main-content'>
        <div class='hero-text'>
            <h1 class='welcome-title'>Welcome</h1>
            <p class='hero-description'>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Sed do eiusmod tempor incididunt ut labore.
            </p>
            <a href='#learn' class='learn-more-btn'>Learn More</a>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            
            // Light Trails Canvas Animation
            const canvas = document.getElementById('lightTrailsCanvas');
            const ctx = canvas.getContext('2d');
            let width, height;
            let animationId;
            let time = 0;

            function resizeCanvas() {
                width = canvas.width = window.innerWidth;
                height = canvas.height = window.innerHeight;
            }

            resizeCanvas();
            window.addEventListener('resize', resizeCanvas);

            class LightTrail {
                constructor(index, total) {
                    this.index = index;
                    this.total = total;
                    this.points = [];
                    this.maxPoints = 120;
                    this.speed = 0.003 + (index * 0.001);
                    this.amplitude = 80 + index * 30;
                    this.frequency = 0.8 + index * 0.15;
                    this.offset = index * 0.8;
                    this.color = this.getColor(index);
                    this.glowColor = this.getGlowColor(index);
                    this.opacity = 0.6 + (index * 0.05);
                    this.lineWidth = 2.5 - (index * 0.15);
                    this.phase = Math.random() * Math.PI * 2;
                }

                getColor(i) {
                    const colors = [
                        'rgba(120, 40, 255, ',
                        'rgba(80, 60, 255, ',
                        'rgba(60, 100, 255, ',
                        'rgba(100, 150, 255, ',
                        'rgba(255, 160, 50, ',
                        'rgba(255, 100, 80, ',
                        'rgba(200, 60, 200, ',
                        'rgba(150, 40, 220, ',
                    ];
                    return colors[i % colors.length];
                }

                getGlowColor(i) {
                    const colors = [
                        'rgba(140, 50, 255, ',
                        'rgba(100, 80, 255, ',
                        'rgba(80, 120, 255, ',
                        'rgba(120, 170, 255, ',
                        'rgba(255, 180, 70, ',
                        'rgba(255, 120, 100, ',
                        'rgba(220, 80, 220, ',
                        'rgba(170, 60, 240, ',
                    ];
                    return colors[i % colors.length];
                }

                update(t) {
                    const centerX = width * 0.35;
                    const centerY = height * 0.55;

                    this.points = [];

                    for (let i = 0; i <= this.maxPoints; i++) {
                        const progress = i / this.maxPoints;
                        const angle = progress * Math.PI * 1.8 + this.phase;

                        const baseX = centerX + Math.cos(angle + t * this.speed + this.offset) * (200 + progress * 300);
                        const baseY = centerY + Math.sin(angle * this.frequency + t * this.speed * 0.5 + this.offset) * this.amplitude;

                        const waveOffset = Math.sin(progress * Math.PI * 4 + t * 0.5) * 15;

                        this.points.push({
                            x: baseX,
                            y: baseY + waveOffset,
                            progress: progress
                        });
                    }
                }

                draw() {
                    if (this.points.length < 2) return;

                    ctx.save();
                    ctx.globalAlpha = this.opacity * 0.3;
                    ctx.lineWidth = this.lineWidth * 6;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';
                    ctx.strokeStyle = this.glowColor + (this.opacity * 0.3) + ')';
                    ctx.beginPath();
                    ctx.moveTo(this.points[0].x, this.points[0].y);

                    for (let i = 1; i < this.points.length; i++) {
                        const prev = this.points[i - 1];
                        const curr = this.points[i];
                        const cpx = (prev.x + curr.x) / 2;
                        const cpy = (prev.y + curr.y) / 2;
                        ctx.quadraticCurveTo(prev.x, prev.y, cpx, cpy);
                    }

                    ctx.stroke();
                    ctx.restore();

                    ctx.save();
                    ctx.globalAlpha = this.opacity;
                    ctx.lineWidth = this.lineWidth;
                    ctx.lineCap = 'round';
                    ctx.lineJoin = 'round';

                    const gradient = ctx.createLinearGradient(
                        this.points[0].x, this.points[0].y,
                        this.points[this.points.length - 1].x, this.points[this.points.length - 1].y
                    );

                    gradient.addColorStop(0, this.color + '0)');
                    gradient.addColorStop(0.1, this.color + (this.opacity * 0.5) + ')');
                    gradient.addColorStop(0.5, this.color + (this.opacity * 0.9) + ')');
                    gradient.addColorStop(0.9, this.color + (this.opacity * 0.5) + ')');
                    gradient.addColorStop(1, this.color + '0)');

                    ctx.strokeStyle = gradient;
                    ctx.beginPath();
                    ctx.moveTo(this.points[0].x, this.points[0].y);

                    for (let i = 1; i < this.points.length; i++) {
                        const prev = this.points[i - 1];
                        const curr = this.points[i];
                        const cpx = (prev.x + curr.x) / 2;
                        const cpy = (prev.y + curr.y) / 2;
                        ctx.quadraticCurveTo(prev.x, prev.y, cpx, cpy);
                    }

                    ctx.stroke();
                    ctx.restore();
                }
            }

            const numTrails = 10;
            const trails = [];
            for (let i = 0; i < numTrails; i++) {
                trails.push(new LightTrail(i, numTrails));
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);

                time += 0.016;

                trails.forEach(trail => {
                    trail.update(time);
                    trail.draw();
                });

                animationId = requestAnimationFrame(animate);
            }

            animate();

            // Particles
            const particlesContainer = document.getElementById('particles');
            const numParticles = 50;

            for (let i = 0; i < numParticles; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.top = Math.random() * 100 + '%';
                particle.style.animationDelay = Math.random() * 3 + 's';
                particle.style.animationDuration = (2 + Math.random() * 3) + 's';
                particle.style.width = (1 + Math.random() * 2) + 'px';
                particle.style.height = particle.style.width;
                particlesContainer.appendChild(particle);
            }

            // Navbar scroll effect
            window.addEventListener('scroll', function() {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            // Mobile menu toggle
            const mobileToggle = document.getElementById('mobileToggle');
            const navLinks = document.getElementById('navLinks');

            if (mobileToggle) {
                mobileToggle.addEventListener('click', function() {
                    navLinks.classList.add('active');
                    mobileToggle.innerHTML = '<i class='bi bi-x-lg'></i>';
                });
            }

            // Close mobile menu when clicking a link
            if (navLinks) {
                navLinks.querySelectorAll('a').forEach(link => {
                    link.addEventListener('click', function() {
                        navLinks.classList.remove('active');
                        if (mobileToggle) {
                            mobileToggle.innerHTML = '<i class='bi bi-list'></i>';
                        }
                    });
                });
            }

            // Smooth scroll
            document.querySelectorAll('a[href^='#']').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Mouse parallax for text glow
            document.addEventListener('mousemove', function(e) {
                const glow = document.getElementById('textGlow');
                if (glow) {
                    const x = e.clientX / window.innerWidth;
                    const y = e.clientY / window.innerHeight;
                    glow.style.left = (x * 40 - 150) + 'px';
                    glow.style.top = (y * 40 + window.innerHeight * 0.3 - 150) + 'px';
                }
            });

            // Resize handler for canvas
            window.addEventListener('resize', function() {
                resizeCanvas();
            });
        });
    </script>
</body>
</html>

";
});
