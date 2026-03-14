<div
    class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
    <div class="flex items-center justify-between mb-4">
        <div class="flex-shrink-0">
            <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white"><?php echo currency_format($monthlyEarnings, restaurant()->currency_id); ?></span>
            <h3 class="text-base font-light text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.dashboard.salesThisMonth'); ?></h3>
        </div>
        <div class="flex flex-col justify-end ">
            <div class="<?php echo \Illuminate\Support\Arr::toCssClasses(["flex justify-end  text-sm", 'text-green-500 dark:text-green-400'=> ($percentChange >
                0), 'text-red-600 dark:text-red-600' => ($percentChange < 0)]); ?>">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                        aria-hidden="true">
                        <!--[if BLOCK]><![endif]--><?php if($percentChange > 0): ?>
                        <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z">
                        </path>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php if($percentChange < 0): ?> <path clip-rule="evenodd" fill-rule="evenodd"
                            d="M10 3a.75.75 0 01.75.75v10.638l3.96-4.158a.75.75 0 111.08 1.04l-5.25 5.5a.75.75 0 01-1.08 0l-5.25-5.5a.75.75 0 111.08-1.04l3.96 4.158V3.75A.75.75 0 0110 3z">
                            </path>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </svg>
                    <?php echo e(round($percentChange, 2)); ?>%
            </div>
            <h3 class="text-sm font-light text-gray-500 dark:text-gray-400"><?php echo app('translator')->get('modules.dashboard.sincePreviousMonth'); ?></h3>

        </div>

    </div>
    <div id="main-chart" class="min-h-[420px] w-full" style="min-height: 420px;"></div>
    <!-- Card Footer -->


        <?php
        $__scriptKey = '869784536-0';
        ob_start();
    ?>
    <script>

        (function initMainChart() {
            const el = document.getElementById('main-chart');
            if (!el) return;

            // Destroy existing instance to avoid duplicate charts and NaN on re-render
            if (el._apexChart) {
                try { el._apexChart.destroy(); } catch (e) {}
                el._apexChart = null;
            }

            function renderWhenReady() {
                if (!el || !el.isConnected) return;
                const w = Math.max(1, el.offsetWidth || el.clientWidth || 400);
                if ((el.offsetWidth || el.clientWidth) <= 0) {
                    requestAnimationFrame(renderWhenReady);
                    return;
                }
                try {
                    const options = getMainChartOptions(w);
                    const chart = new ApexCharts(el, options);
                    el._apexChart = chart;
                    chart.render();
                    document.addEventListener('dark-mode', function onDarkMode() {
                        if (el._apexChart) el._apexChart.updateOptions(getMainChartOptions(el.offsetWidth || el.clientWidth || 400));
                    });
                } catch (err) {
                    console.warn('Dashboard chart render failed:', err);
                }
            }

            requestAnimationFrame(renderWhenReady);
        })();

        function getMainChartOptions()
        {
            let mainChartColors = {}

            if (document.documentElement.classList.contains('dark')) {
                mainChartColors = {
                    borderColor: '#374151',
                    labelColor: '#9CA3AF',
                    opacityFrom: 0,
                    opacityTo: 0.15,
                };
            } else {
                mainChartColors = {
                    borderColor: '#F3F4F6',
                    labelColor: '#6B7280',
                    opacityFrom: 0.45,
                    opacityTo: 0,
                }
            }

            return {
                chart: {
                    width: chartWidth || undefined,
                    height: 420,
                    type: 'area',
                    fontFamily: 'Inter, sans-serif',
                    foreColor: mainChartColors.labelColor,
                    toolbar: {
                        show: false
                    }
                },
                fill: {
                    type: 'gradient',
                    gradient: {
                        enabled: true,
                        opacityFrom: mainChartColors.opacityFrom,
                        opacityTo: mainChartColors.opacityTo
                    }
                },
                dataLabels: {
                    enabled: false
                },
                tooltip: {
                    style: {
                        fontSize: '14px',
                        fontFamily: 'Inter, sans-serif',
                    },
                },
                grid: {
                    show: true,
                    borderColor: mainChartColors.borderColor,
                    strokeDashArray: 1,
                    padding: {
                        left: 35,
                        bottom: 15
                    }
                },
                series: [
                    {
                        name: "<?php echo e(__('modules.dashboard.earnings')); ?>",
                        data: [
                            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $salesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e((float)($label->total_sales ?? 0)); ?>,
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                        ],
                        color: '<?php echo e(restaurant()->theme_hex); ?>'
                    }
                ],
                markers: {
                    size: 5,
                    strokeColors: '#ffffff',
                    hover: {
                        size: undefined,
                        sizeOffset: 3
                    }
                },
                xaxis: {
                    categories: [
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $salesData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            "<?php echo e(\Carbon\Carbon::parse($label->date)->translatedFormat('d M')); ?>",
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    ],
                    labels: {
                        style: {
                            colors: [mainChartColors.labelColor],
                            fontSize: '14px',
                            fontWeight: 500,
                        },
                    },
                    axisBorder: {
                        color: mainChartColors.borderColor,
                    },
                    axisTicks: {
                        color: mainChartColors.borderColor,
                    },
                    crosshairs: {
                        show: true,
                        position: 'back',
                        stroke: {
                            color: mainChartColors.borderColor,
                            width: 1,
                            dashArray: 10,
                        },
                    },
                },
                yaxis: {
                    labels: {
                        style: {
                            colors: [mainChartColors.labelColor],
                            fontSize: '14px',
                            fontWeight: 500,
                        },
                        formatter: function (value) {
                            return '<?php echo e(currency()); ?>' + value;
                        }
                    },
                },
                legend: {
                    fontSize: '14px',
                    fontWeight: 500,
                    fontFamily: 'Inter, sans-serif',
                    labels: {
                        colors: [mainChartColors.labelColor]
                    },
                    itemMargin: {
                        horizontal: 10
                    }
                },
                responsive: [
                    {
                        breakpoint: 1024,
                        options: {
                            xaxis: {
                                labels: {
                                    show: false
                                }
                            }
                        }
                    }
                ]
            }
        }
        
    </script>
        <?php
        $__output = ob_get_clean();

        \Livewire\store($this)->push('scripts', $__output, $__scriptKey)
    ?>

</div><?php /**PATH C:\xampp\htdocs\script\resources\views/livewire/dashboard/weekly-sales-chart.blade.php ENDPATH**/ ?>