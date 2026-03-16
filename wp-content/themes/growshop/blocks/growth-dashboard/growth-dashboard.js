(function () {
    'use strict';

    function initGrowthDashboard() {
        if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;
        gsap.registerPlugin(ScrollTrigger);

        // Single timeline: all animations happen during scroll, NO pin
        // The CSS position:sticky on .gd-sticky keeps it in view naturally
        var tl = gsap.timeline({
            scrollTrigger: {
                trigger: '#growth-dashboard',
                start: 'top 70%',
                end: 'bottom bottom',
                scrub: 0.6
            }
        });

        // Phase 1 (0% – 10%): Dashboard frame fades in
        tl.fromTo('.gd-dashboard',
            { opacity: 0, scale: 0.96 },
            { opacity: 1, scale: 1, duration: 0.10 },
            0
        );

        // Phase 2 (5% – 20%): KPI cards
        tl.to('.gd-kpi-card', {
            opacity: 1, y: 0,
            duration: 0.08, stagger: 0.015
        }, 0.05);

        animateCounters(tl, '.gd-kpis .gd-counter', 0.07, 0.10);

        tl.to('.gd-kpis .gd-kpi-change', {
            opacity: 1, scale: 1,
            duration: 0.04, stagger: 0.01,
            ease: 'back.out(1.7)'
        }, 0.15);

        // Phase 3 (20% – 40%): Charts + Process steps
        tl.to('.gd-charts-panel', { opacity: 1, duration: 0.04 }, 0.20);
        tl.to('.gd-process-panel', { opacity: 1, duration: 0.04 }, 0.22);

        tl.to('.gd-chart-line', {
            strokeDashoffset: 0,
            duration: 0.12, ease: 'power1.inOut'
        }, 0.22);

        tl.to('.gd-chart-fill', { opacity: 1, duration: 0.06 }, 0.30);

        document.querySelectorAll('.gd-bar').forEach(function (bar, i) {
            var targetY = parseFloat(bar.getAttribute('data-target-y'));
            var targetH = parseFloat(bar.getAttribute('data-target-h'));
            tl.to(bar, {
                attr: { y: targetY, height: targetH },
                duration: 0.08
            }, 0.26 + i * 0.012);
        });

        tl.to('.gd-step', {
            opacity: 1, x: 0,
            duration: 0.06, stagger: 0.02,
            onComplete: function () {
                document.querySelectorAll('.gd-step').forEach(function (s) {
                    s.classList.add('gd-step--active');
                });
            }
        }, 0.24);

        tl.to('.gd-step-connector', {
            scaleY: 1,
            duration: 0.04, stagger: 0.015
        }, 0.28);

        // Phase 4 (40% – 58%): Secondary metrics
        tl.to('.gd-metric', {
            opacity: 1, y: 0,
            duration: 0.06, stagger: 0.01
        }, 0.40);

        tl.to('.gd-metrics .gd-kpi-change', {
            opacity: 1, scale: 1,
            duration: 0.04, stagger: 0.008,
            ease: 'back.out(1.7)'
        }, 0.48);

        animateCounters(tl, '.gd-metrics .gd-counter', 0.41, 0.08);

        // Phase 5 (58% – 78%): Funnel + Gauges
        tl.to('.gd-funnel-panel', { opacity: 1, duration: 0.04 }, 0.58);
        tl.to('.gd-gauges-panel', { opacity: 1, duration: 0.04 }, 0.58);

        document.querySelectorAll('.gd-funnel-bar').forEach(function (bar, i) {
            tl.to(bar, {
                width: bar.getAttribute('data-width') + '%',
                duration: 0.06
            }, 0.60 + i * 0.015);
        });

        document.querySelectorAll('.gd-gauge-progress').forEach(function (circle) {
            var target = parseFloat(circle.style.getPropertyValue('--target-offset'));
            tl.to(circle, {
                strokeDashoffset: target,
                duration: 0.10
            }, 0.62);
        });

        animateCounters(tl, '.gd-gauge-value', 0.62, 0.10);

        // Phase 6 (78% – 88%): CTA + glow
        tl.to('.gd-cta', {
            opacity: 1, y: 0,
            duration: 0.05,
            onComplete: function () {
                document.querySelector('.gd-dashboard').classList.add('gd-glow-active');
            }
        }, 0.78);

        // Phase 7 (90% – 100%): Exit
        tl.to('.gd-dashboard', {
            opacity: 0.7, scale: 0.97,
            duration: 0.10,
            onStart: function () {
                document.querySelector('.gd-dashboard').classList.remove('gd-glow-active');
            }
        }, 0.90);
    }

    // Counter helper
    function animateCounters(tl, selector, start, dur) {
        document.querySelectorAll(selector).forEach(function (el, i) {
            var target = parseFloat(el.getAttribute('data-target'));
            var fmt = el.getAttribute('data-format') || 'number';
            var pre = el.getAttribute('data-prefix') || '';
            var suf = el.getAttribute('data-suffix') || '';
            var obj = { v: 0 };

            tl.to(obj, {
                v: target, duration: dur,
                ease: 'power1.out',
                onUpdate: function () {
                    el.textContent = pre + fmtVal(obj.v, fmt) + suf;
                }
            }, start + i * 0.006);
        });
    }

    function fmtVal(v, fmt) {
        if (fmt === 'thousands') {
            return v >= 1e6 ? (v / 1e6).toFixed(1) + 'M'
                : v >= 1e3 ? Math.round(v).toLocaleString('pl-PL')
                : Math.round(v).toString();
        }
        if (fmt === 'decimal') return v.toFixed(1);
        return Math.round(v).toLocaleString('pl-PL');
    }

    document.addEventListener('DOMContentLoaded', initGrowthDashboard);
})();
