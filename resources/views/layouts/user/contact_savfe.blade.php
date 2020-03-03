<section id="contact" class="mt-5">
    <div class="container-fluid">

        <div class="section-header text-center">
            <div>
                <h4>ติดต่อเรา</h4>
            </div>
            <hr style="width: 20%; border: 1px solid #2BC685;">
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="map mb-4 mb-lg-0">
                    <iframe src="https://maps.google.com/maps?q=Silpakorn%20University%20City%20Campus&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" style="border:0; width: 100%; height: 312px;" allowfullscreen></iframe>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="row">
                    <div class="col-md-5 info">
                        <i class="fas fa-map-marker-alt"></i>
                        <p>มหาวิทยาลัยศิลปากร วิทยาเขตซิตี้แคมปัส เมืองทองธานี</p>
                    </div>
                    <div class="col-md-4 info">
                        <i class="fas fa-envelope"></i>
                        <p>ict.su.ac.th</p>
                    </div>
                    <div class="col-md-3 info">
                        <i class="fas fa-phone"></i>
                        <p>+669 1765 9890</p>
                    </div>
                </div>

                <div class="form">
                    <div id="sendmessage">ข้อความของคุณถูกส่งแล้ว. ขอบคุณครับ/คะ</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" role="form" class="contactForm">
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="name" class="form-control" id="name" placeholder="ชื่อของคุณ" data-rule="minlen:4" data-msg="กรุณาใส่มากกว่า 4 ตัวอักษร สำหรับชื่อของคุณ" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="อีเมลของคุณ" data-rule="email" data-msg="กรุณากรอกอีเมลของคุณ" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="หัวข้อเรื่องของคุณ" data-rule="minlen:4" data-msg="กรุณาใส่มากกว่า 8 ตัวอักษร สำหรับหัวข้อเรื่อง" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="กรุณาใส่ข้อความที่คุณต้องการส่งให้เรา" placeholder="ใส่ข้อความที่นี่..."></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button class="btn-savfe btn-main-savfe" type="submit" title="Send Message">ส่งข้อความถึงเรา</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section>