<?php
/**
 * Growth Dashboard Block
 *
 * @param array $block The block settings and attributes.
 */

// Block attributes
$anchor = ! empty( $block['anchor'] ) ? ' id="' . esc_attr( $block['anchor'] ) . '"' : '';

// ACF Fields
$sub_heading_icon = get_field( 'gd_sub_heading_icon' ) ?: 'fa-solid fa-chart-line';
$sub_heading_text = get_field( 'gd_sub_heading_text' ) ?: 'Growth Dashboard';
$heading          = get_field( 'gd_heading' ) ?: 'Twój system wzrostu w jednym widoku';
$description      = get_field( 'gd_description' ) ?: 'Zobacz, jak Grow Group transformuje wyniki Twojej firmy — od audytu AI po skalowanie sprzedaży.';
$cta_text         = get_field( 'gd_cta_text' ) ?: 'Chcesz takie wyniki? Umów bezpłatną konsultację';
$cta_link         = get_field( 'gd_cta_link' ) ?: '#kontakt';
?>

<!-- Header (scrolls normally, not pinned) -->
<div class="gd-header-section"<?php echo $anchor; ?>>
    <div class="hero-container">
        <div class="gd-header">
            <div class="sub-heading align-self-center animate-box animated animate__animated" data-animate="animate__fadeInDown">
                <i class="<?php echo esc_attr( $sub_heading_icon ); ?>"></i>
                <span><?php echo esc_html( $sub_heading_text ); ?></span>
            </div>
            <h2 class="title-heading animate-box animated animate__animated" data-animate="animate__fadeInUp"><?php echo esc_html( $heading ); ?></h2>
            <p class="gd-subtitle animate-box animated animate__animated" data-animate="animate__fadeInUp"><?php echo esc_html( $description ); ?></p>
        </div>
    </div>
</div>

<!-- Pinned dashboard -->
<div id="growth-dashboard">
    <div class="gd-sticky">
        <div class="hero-container">
            <!-- Dashboard Frame -->
            <div class="gd-dashboard">
                <!-- Top Bar (browser chrome) -->
                <div class="gd-top-bar">
                    <div class="gd-dots">
                        <span class="gd-dot gd-dot--red"></span>
                        <span class="gd-dot gd-dot--yellow"></span>
                        <span class="gd-dot gd-dot--green"></span>
                    </div>
                    <span class="gd-top-title">Growth Dashboard</span>
                    <div class="gd-live-badge">
                        <span class="gd-live-dot"></span>
                        Live
                    </div>
                </div>

                <!-- Dashboard Content -->
                <div class="gd-content">

                    <!-- ROW 1: Main KPIs -->
                    <div class="gd-row gd-kpis">
                        <div class="gd-kpi-card">
                            <div class="gd-kpi-icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                            <div class="gd-kpi-body">
                                <span class="gd-kpi-label">Revenue</span>
                                <span class="gd-kpi-value"><span class="gd-counter" data-target="2458000" data-prefix="PLN " data-format="thousands">0</span></span>
                            </div>
                            <span class="gd-kpi-change gd-kpi-change--up">+47%</span>
                        </div>
                        <div class="gd-kpi-card">
                            <div class="gd-kpi-icon"><i class="fa-solid fa-bullseye"></i></div>
                            <div class="gd-kpi-body">
                                <span class="gd-kpi-label">ROAS</span>
                                <span class="gd-kpi-value"><span class="gd-counter" data-target="1100" data-suffix="%" data-format="number">0</span></span>
                            </div>
                            <span class="gd-kpi-change gd-kpi-change--up">+208%</span>
                        </div>
                        <div class="gd-kpi-card">
                            <div class="gd-kpi-icon"><i class="fa-solid fa-percent"></i></div>
                            <div class="gd-kpi-body">
                                <span class="gd-kpi-label">Conversion</span>
                                <span class="gd-kpi-value"><span class="gd-counter" data-target="4.2" data-suffix="%" data-format="decimal">0</span></span>
                            </div>
                            <span class="gd-kpi-change gd-kpi-change--up">+1.8pp</span>
                        </div>
                        <div class="gd-kpi-card">
                            <div class="gd-kpi-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                            <div class="gd-kpi-body">
                                <span class="gd-kpi-label">Orders</span>
                                <span class="gd-kpi-value"><span class="gd-counter" data-target="12847" data-format="thousands">0</span></span>
                            </div>
                            <span class="gd-kpi-change gd-kpi-change--up">+36%</span>
                        </div>
                    </div>

                    <!-- ROW 2: Charts + Process -->
                    <div class="gd-row gd-row--two-col">
                        <!-- Charts Panel -->
                        <div class="gd-charts-panel">
                            <h4 class="gd-panel-title">Revenue Trend</h4>
                            <svg class="gd-line-chart" viewBox="0 0 400 120" preserveAspectRatio="none">
                                <defs>
                                    <linearGradient id="gd-chart-gradient" x1="0" y1="0" x2="0" y2="1">
                                        <stop offset="0%" stop-color="#00D170" stop-opacity="0.3"/>
                                        <stop offset="100%" stop-color="#00D170" stop-opacity="0"/>
                                    </linearGradient>
                                </defs>
                                <polygon class="gd-chart-fill" points="0,120 0,100 33,92 66,88 100,78 133,82 166,65 200,58 233,45 266,50 300,35 333,28 366,15 400,8 400,120" fill="url(#gd-chart-gradient)"/>
                                <polyline class="gd-chart-line" points="0,100 33,92 66,88 100,78 133,82 166,65 200,58 233,45 266,50 300,35 333,28 366,15 400,8" fill="none" stroke="#00D170" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>

                            <h4 class="gd-panel-title" style="margin-top: 16px;">Monthly Orders</h4>
                            <svg class="gd-bar-chart" viewBox="0 0 400 80" preserveAspectRatio="none">
                                <rect class="gd-bar" x="15" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.6" data-target-y="45" data-target-h="35"/>
                                <rect class="gd-bar" x="80" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.7" data-target-y="35" data-target-h="45"/>
                                <rect class="gd-bar" x="145" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.75" data-target-y="28" data-target-h="52"/>
                                <rect class="gd-bar" x="210" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.8" data-target-y="20" data-target-h="60"/>
                                <rect class="gd-bar" x="275" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.85" data-target-y="12" data-target-h="68"/>
                                <rect class="gd-bar" x="340" y="80" width="50" height="0" rx="4" fill="#00D170" opacity="0.9" data-target-y="5" data-target-h="75"/>
                            </svg>
                        </div>

                        <!-- Process Steps -->
                        <div class="gd-process-panel">
                            <h4 class="gd-panel-title">Grow Group Process</h4>
                            <div class="gd-steps">
                                <div class="gd-step" data-step="1">
                                    <div class="gd-step-num">1</div>
                                    <div class="gd-step-body">
                                        <strong>AI Audit</strong>
                                        <span>Analiza sklepu, rynku i konkurencji przez AI</span>
                                    </div>
                                </div>
                                <div class="gd-step-connector"></div>
                                <div class="gd-step" data-step="2">
                                    <div class="gd-step-num">2</div>
                                    <div class="gd-step-body">
                                        <strong>Strategy</strong>
                                        <span>Plan wzrostu oparty na danych i AI insights</span>
                                    </div>
                                </div>
                                <div class="gd-step-connector"></div>
                                <div class="gd-step" data-step="3">
                                    <div class="gd-step-num">3</div>
                                    <div class="gd-step-body">
                                        <strong>Execution</strong>
                                        <span>Wdrożenie: reklamy, UX, SEO, automatyzacje</span>
                                    </div>
                                </div>
                                <div class="gd-step-connector"></div>
                                <div class="gd-step" data-step="4">
                                    <div class="gd-step-num">4</div>
                                    <div class="gd-step-body">
                                        <strong>Growth</strong>
                                        <span>Skalowanie i optymalizacja wyników</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ROW 3: Secondary Metrics -->
                    <div class="gd-row gd-metrics">
                        <div class="gd-metric">
                            <span class="gd-metric-label">AOV</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="287" data-suffix=" PLN" data-format="number">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--up">+22%</span>
                        </div>
                        <div class="gd-metric">
                            <span class="gd-metric-label">CTR</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="3.8" data-suffix="%" data-format="decimal">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--up">+0.9pp</span>
                        </div>
                        <div class="gd-metric">
                            <span class="gd-metric-label">CPA</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="12" data-suffix=" PLN" data-format="number">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--down">-34%</span>
                        </div>
                        <div class="gd-metric">
                            <span class="gd-metric-label">Sessions</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="428" data-suffix="K" data-format="number">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--up">+61%</span>
                        </div>
                        <div class="gd-metric">
                            <span class="gd-metric-label">Bounce Rate</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="31" data-suffix="%" data-format="number">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--down">-8pp</span>
                        </div>
                        <div class="gd-metric">
                            <span class="gd-metric-label">LTV</span>
                            <span class="gd-metric-value"><span class="gd-counter" data-target="890" data-suffix=" PLN" data-format="number">0</span></span>
                            <span class="gd-kpi-change gd-kpi-change--up">+45%</span>
                        </div>
                    </div>

                    <!-- ROW 4: Funnel + Gauges -->
                    <div class="gd-row gd-row--two-col">
                        <!-- Funnel -->
                        <div class="gd-funnel-panel">
                            <h4 class="gd-panel-title">Conversion Funnel</h4>
                            <div class="gd-funnel">
                                <div class="gd-funnel-item">
                                    <span class="gd-funnel-label">Visitors</span>
                                    <div class="gd-funnel-track"><div class="gd-funnel-bar" data-width="100">100%</div></div>
                                </div>
                                <div class="gd-funnel-item">
                                    <span class="gd-funnel-label">Add to Cart</span>
                                    <div class="gd-funnel-track"><div class="gd-funnel-bar" data-width="45">45%</div></div>
                                </div>
                                <div class="gd-funnel-item">
                                    <span class="gd-funnel-label">Checkout</span>
                                    <div class="gd-funnel-track"><div class="gd-funnel-bar" data-width="28">28%</div></div>
                                </div>
                                <div class="gd-funnel-item">
                                    <span class="gd-funnel-label">Purchase</span>
                                    <div class="gd-funnel-track"><div class="gd-funnel-bar" data-width="18">18%</div></div>
                                </div>
                            </div>
                        </div>

                        <!-- Gauges -->
                        <div class="gd-gauges-panel">
                            <h4 class="gd-panel-title">Performance Scores</h4>
                            <div class="gd-gauges">
                                <div class="gd-gauge">
                                    <svg viewBox="0 0 120 120">
                                        <circle class="gd-gauge-bg" cx="60" cy="60" r="52" fill="none" stroke-width="8"/>
                                        <circle class="gd-gauge-progress" cx="60" cy="60" r="52" fill="none" stroke-width="8" stroke-linecap="round" data-target="92" style="--circumference: 326.73; --target-offset: 26.14;"/>
                                    </svg>
                                    <div class="gd-gauge-text">
                                        <span class="gd-counter gd-gauge-value" data-target="92" data-format="number">0</span>
                                        <span class="gd-gauge-label">Store Health</span>
                                    </div>
                                </div>
                                <div class="gd-gauge">
                                    <svg viewBox="0 0 120 120">
                                        <circle class="gd-gauge-bg" cx="60" cy="60" r="52" fill="none" stroke-width="8"/>
                                        <circle class="gd-gauge-progress" cx="60" cy="60" r="52" fill="none" stroke-width="8" stroke-linecap="round" data-target="78" style="--circumference: 326.73; --target-offset: 72.28;"/>
                                    </svg>
                                    <div class="gd-gauge-text">
                                        <span class="gd-counter gd-gauge-value" data-target="78" data-format="number">0</span>
                                        <span class="gd-gauge-label">Growth Index</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- CTA -->
                    <div class="gd-cta">
                        <a href="<?php echo esc_url( $cta_link ); ?>" class="gd-cta-link"><?php echo esc_html( $cta_text ); ?> <i class="fa-solid fa-arrow-right"></i></a>
                    </div>

                </div><!-- /gd-content -->
            </div><!-- /gd-dashboard -->
        </div><!-- /hero-container -->
    </div><!-- /gd-sticky -->
</div><!-- /growth-dashboard -->
