<footer>
    <div class="container mt-50 py-3">
        <div class="row">
            <div class="col-lg-7 pr-20">
                <div class="d-flex justify-content-between">
                    <div class="footer-left">
                        <img src="{{ url('assets/frontend/images/logo/logo.png') }}" alt="logo">
                        <h6 class="mt-10 pl-10">ফলো করুন</h6>
                        <ul class="social-links pl-10">
                            <li><a href="#"><i class="zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-youtube"></i></a></li>
                            <li><a href="#"><i class="zmdi zmdi-google-plus"></i></a></li>
                        </ul>
                    </div>
                    <div class="d-flex align-items-end pb-10">
                        <div class="card-body">
                            {!! QrCode::size(150)->generate('https://www.provatikhobor.com') !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 editor-border d-flex align-items-end pb-10">
                <p class="mb-0">ভারপ্রাপ্ত সম্পাদকঃ মোঃ সাজ্জাদ হোসেন <br>
                    প্রকাশক জিয়াউল হক বিএস প্রিন্টিং প্রেস ৫২/২ সার্কুলার রোড <br>
                    মোবাইলঃ ০১৭১০-১১২২৩৩ </p>
            </div>
        </div>
    </div>
</footer>
