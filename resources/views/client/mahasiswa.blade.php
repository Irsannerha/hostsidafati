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
                                        Data Insight
                                    </h1>
                                    <!-- <p class="para-desc text-white">
                                        Profil Mahasiswa adalah Data Insight yang berisi data-data mahasiswa yang ada di Program Studi dibawah naungan Fakultas Teknik Teknologi Industri.
                                    </p> -->
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
                                <p class="para-desc text-dark">Total Mahasiswa</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-box min-height-200px pd-10 mb-10">
                        <div class="d-flex justify-content-between pb-20 text-dark">
                            <div class="title-heading mt-2">
                                <h1 class="heading mb-1 font-weight-bold text-dark purecounter" data-purecounter-end="21">0</h1>
                                <p class="para-desc text-dark">Program Studi</p>
                            </div>
                        </div>
                    </div>
                </ul>
                <div class="container-fluid">
                    <!-- end row -->
                    <div class="row">
                        <!-- New chart pie -->
                        <div class="col-xl-5">
                            <div class="card-box height-100-px">
                                <canvas id="myPieChart"></canvas>
                                <h4 class="h5 mt-20 font-weight-500">Jenis Kelamin</h4>
                                <ul style="list-style-type: none; padding: 0; margin-top: 10px;">
                                    <li style="color: #8c1515; font-weight: bold;">
                                        <span style="display: inline-block; width: 14px; height: 14px; background-color: #8c1515; margin-right: 5px;"></span>
                                        Laki-laki
                                    </li>
                                    <li style="color: #e5ba85; font-weight: bold; margin-top: 5px;">
                                        <span style="display: inline-block; width: 14px; height: 14px; background-color: #e5ba85; margin-right: 5px;"></span>
                                        Perempuan
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End New chart pie -->
                        <!-- New chart status pie -->
                        <div class="col-xl-5 mb-10">
                            <div class="card-box height-100-px">
                                <canvas id="myPieStatus"></canvas>
                                <h4 class="h5 mt-20 font-weight-500">Status</h4>
                                <ul style="list-style-type: none; padding: 0; margin-top: 10px;">
                                    <li style="color: #8c1515; font-weight: bold;">
                                        <span style="display: inline-block; width: 14px; height: 14px; background-color: #8c1515; margin-right: 5px;"></span>
                                        Aktif
                                    </li>
                                    <li style="color: #e5ba85; font-weight: bold; margin-top: 5px;">
                                        <span style="display: inline-block; width: 14px; height: 14px; background-color: #e5ba85; margin-right: 5px;"></span>
                                        Lulus
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End New chart status pie -->
                         <!-- New chart bar -->
                        <div class="col-xl-10 mb-20">
                            <div class="card-box card-bar">
                                <h2 class="h4 mb-20">Pergerakan Jumlah Mahasiswa Fakultas Teknologi Industri</h2>
                                <div class="chartCard">
                                    <div class="chartBoxBar">
                                        <canvas id="myChartBar"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-10 mb-20">
                            <div class="card-box">
                                <h2 class="h4 mb-20">Pergerakan Jumlah Mahasiswa Prodi Fakultas Teknologi Industri</h2>
                                <div class="chartCard">
                                <div class="chartBox">
                                    <div class="scrollBox">
                                    <div class="scrollBoxBody">
                                        <canvas id="chartProdiOne"></canvas>
                                    </div>
                                    </div>
                                    <div class="box">
                                    <canvas id="chartProdiTwo"></canvas>
                                    </div>
                                </div>
                                </div>
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