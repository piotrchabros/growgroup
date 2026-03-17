/**
 * Grow Group — Global JS
 * Shared init functions for all pages
 */

jQuery(function ($) {
    'use strict';

    // Init all global functions
    initCounter();
    initAnimateData();
    initThemeSwitch();
    initNavLink();
    initSidebar();
    initSidebarDropdown();

    // ============================================================
    // Counter Animation (IntersectionObserver)
    // ============================================================
    function initCounter() {
        var $counters = $(".counter");
        if (!$counters.length) return;

        function updateCount($counter) {
            var target = +$counter.data("target");
            var count = +$counter.text().replace("+", "");
            var duration = 2000;
            var steps = 60;
            var increment = Math.max(1, Math.ceil(target / steps));
            var delay = Math.floor(duration / (target / increment));

            if (count < target) {
                var nextCount = Math.min(target, count + increment);
                $counter.text(nextCount);
                setTimeout(function () {
                    updateCount($counter);
                }, delay);
            } else {
                $counter.text(target);
            }
        }

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var $counter = $(entry.target);
                    updateCount($counter);
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });

        $counters.each(function () {
            observer.observe(this);
        });
    }

    // ============================================================
    // Animate on Scroll (data-animate)
    // ============================================================
    function initAnimateData() {
        var $elements = $('[data-animate]');
        if (!$elements.length) return;

        var observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.isIntersecting) {
                    var $el = $(entry.target);
                    var delay = $el.data('delay') || 0;
                    setTimeout(function () {
                        $el.addClass($el.data('animate'));
                        $el.css('opacity', 1);
                        observer.unobserve(entry.target);
                    }, delay);
                }
            });
        }, { threshold: 0.1 });

        $elements.each(function () {
            observer.observe(this);
        });
    }

    // ============================================================
    // Theme Switch (light/dark mode)
    // ============================================================
    function initThemeSwitch() {
        var lightMode = localStorage.getItem('lightmode') === 'active';

        if (lightMode) {
            $('body').addClass('lightmode');
        }

        function updateLogos() {
            var partnerLogos = $('.partner-logo');

            if (lightMode) {
                $('body').addClass('lightmode');
                localStorage.setItem('lightmode', 'active');
                partnerLogos.each(function () {
                    var $img = $(this);
                    var src = $img.attr('src');
                    if (src && !src.includes('-dark')) {
                        $img.attr('src', src.replace('.png', '-dark.png'));
                    }
                });
            } else {
                $('body').removeClass('lightmode');
                localStorage.removeItem('lightmode');
                partnerLogos.each(function () {
                    var $img = $(this);
                    var src = $img.attr('src');
                    if (src) {
                        $img.attr('src', src.replace('-dark.png', '.png'));
                    }
                });
            }
        }

        updateLogos();

        $('#themeSwitch').on('click', function () {
            lightMode = !lightMode;
            updateLogos();
            var iconClass = lightMode ? 'fa-sun' : 'fa-moon';
            $('#themeIcon').removeClass('fa-sun fa-moon').addClass(iconClass);
        });
    }

    // ============================================================
    // Active Nav Link
    // ============================================================
    function initNavLink() {
        var currentUrl = window.location.href;
        $(".navbar-nav .nav-link").each(function () {
            if (this.href === currentUrl) {
                $(this).addClass("active");
            }
        });
        $(".navbar-nav .dropdown-menu .dropdown-item").each(function () {
            if (this.href === currentUrl) {
                $(this).closest(".dropdown").find(".nav-link.dropdown-toggle").addClass("active");
            }
        });
    }

    // ============================================================
    // Mobile menu (full-screen overlay)
    // ============================================================
    function initSidebar() {
        var $menuBtn = $('.nav-btn');
        var $closeBtn = $('.mobile-menu-close');
        var $menu = $('#mobileMenu');

        $menuBtn.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $menu.addClass('active').attr('aria-hidden', 'false');
            $menuBtn.attr('aria-expanded', 'true');
            $('body').addClass('menu-open');
        });

        function closeMenu() {
            $menu.removeClass('active').attr('aria-hidden', 'true');
            $menuBtn.attr('aria-expanded', 'false');
            $('body').removeClass('menu-open');
        }

        $closeBtn.on('click', closeMenu);

        // Close on link click
        $menu.find('a').on('click', closeMenu);

        // Close on Escape
        $(document).on('keydown', function (e) {
            if (e.key === 'Escape' && $menu.hasClass('active')) {
                closeMenu();
            }
        });
    }

    function initSidebarDropdown() {
        // No-op: full-screen menu has no dropdowns
    }
});
