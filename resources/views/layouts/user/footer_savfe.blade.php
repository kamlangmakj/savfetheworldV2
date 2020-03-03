@include('layouts.user.contact_savfe')

<footer id="footer" style="position: relative;left: 0;bottom: 0;width: 100%;margin-bottom: -30px">
    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-info text-center">
                    <img src="{{ url('img/logobig_green.png') }}" alt="Savfetheworld Logo" class="brand-image "
                         style="height:60px">
{{--                    <p>save & safe the world.</p>--}}
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>เมนูหลัก</h4>
                    <ul>
                        <li><a href="{{ url('/') }}" style="@if(Request::is('/')) color:#000; @endif">หน้าแรก</a></li>
                        <li><a href="{{ url('/activity') }}" style="@if(Request::is('activity*')) color:#000; @endif">กิจกรรม</a></li>
                        <li><a href="{{ url('/reward') }}" style="@if(Request::is('reward*')) color:#000; @endif">ของรางวัล</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>ติดต่อเรา</h4>
                    <p>
                        มหาวิทยาลัยศิลปากร วิทยาเขตซิตี้แคมปัส<br>
                        ตำบลบ้านใหม่ อำเภอปากเกร็ด<br>
                        ประเทศไทย นนทบุรี 11120<br>
                        <strong>โทร:</strong> +669 1765 9890<br>
                        <strong>อีเมล:</strong> ict.su.ac.th<br>
                    </p>

                    <div class="social-links">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    </div>

                </div>

                <div class="col-lg-3 col-md-6 footer-newsletter">
                    <h4>เกี่ยวกับเรา</h4>
                    <p>การออกแบบและพัฒนาเว็บแอปพลิเคชันส่งเสริมกิจกรรมเพื่อสนับสนุนการอนุรักษ์และแก้ไขปัญหาสิ่งแวดล้อม สำหรับผู้ใช้งานที่สนใจกิจกรรมเกี่ยวกับการอนุรักษ์สิ่งแวดล้อม</p>
                    <form action="" method="post">
                        <input type="email" name="email"><input type="submit"  value="กดรับข่าวสาร">
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong>SAVF'E THE WORLD</strong>. All Rights Reserved
        </div>
        <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
            -->
            Designed by K.Jettapon
        </div>
    </div>
</footer>
<button onclick="topFunction()" class="back-to-top" id="myBtn" title="Go to top"><i class="fa fa-chevron-up"></i></button>
