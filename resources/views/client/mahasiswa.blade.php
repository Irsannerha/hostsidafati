<x-client-app>
        <!-- Content start -->
        <section class="bg-home bg-hexa" id="home">
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 col-md-12 text-center">
                                <div class="title-heading mt-4">
                                    <h1 class="heading mb-1 font-weight-bold text-white">
                                        Profil Mahasiswa
                                    </h1>
                                    <p class="para-desc text-white">
                                        Profil Mahasiswa adalah Data Insight yang berisi data-data mahasiswa yang ada di Program Studi dibawah naungan Fakultas Teknik Teknologi Industri.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- home end -->

        <!-- clients start -->
        <section id="data-insight">
    <div class="container-fluid">
        <div class="clients p-4 bg-gradient-1" style="top: -135px">
            <div class="row pb-10">
                <ul>
                      <div class="card-box min-height-200px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="title-heading mt-2">
                                    <h1 class="heading mb-1 font-weight-bold text-dark purecounter" data-purecounter-end="1243">0</h1>
                                    <p class="para-desc text-dark">
                                        Total Mahasiswa
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-box min-height-200px pd-10 mb-10">
                            <div class="d-flex justify-content-between pb-20 text-dark">
                                <div class="title-heading mt-2">
                                    <h1 class="heading mb-1 font-weight-bold text-dark purecounter" data-purecounter-end="21">0</h1>
                                    <p class="para-desc text-dark">
                                        Program Studi
                                    </p>
                                </div>
                            </div>
                        </div>
                </ul>
                <div class="container-fluid">
                    <!-- end row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- end col -->
                        </div>
                        <!-- New chart bar -->
                        <div class="col-xl-8 mb-30">
                            <div class="card-box height-100-p pd-20">
                                <h2 class="h4 mb-20">Jumlah Mahasiswa Fakultas Teknologi Industri</h2>
                                <div id="chartbar"></div>
                            </div>
                        </div>
                        <!-- End New chart bar -->
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- end clients -->
        </div>
        <!-- end container-fluid -->
    </div>
</section>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const counters = document.querySelectorAll('.purecounter');
        const speed = 200;

        counters.forEach(counter => {
            const animate = () => {
                const value = +counter.getAttribute('data-purecounter-end');
                const data = +counter.innerText;

                const time = value / speed;
                if (data < value) {
                    counter.innerText = Math.ceil(data + time);
                    setTimeout(animate, 1);
                } else {
                    counter.innerText = value;
                }
            };

            animate();
        });
    });
</script>

        <!-- clients end -->
        <!-- features start -->
        <section class="section-sm" id="faq" style="margin-top: -100px">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center mb-4 pb-1">
                            <h2>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            </h2>
                            <p class="text-muted">Data Insight Coming Soon</p>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </section>
        <!-- End Content -->
</x-client-app>