@extends('layouts.client')

@section('content')
    <div class="page-header text-center" style="background-image: url('assets/images/page-header-bg.jpg')">
        <div class="container">
            <h1 class="page-title">Contact<span>Pages</span></h1>
        </div><!-- End .container -->
    </div><!-- End .page-header -->


    <div class="page-content">
        <div id="map" class="mb-5"><iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8905.311250269611!2d105.95432700813618!3d20.208087538957187!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3136711b99eb2405%3A0x1746c10b55b0056a!2zQ-G7lW5nIMSQw6EgTmluaCBCw6xuaA!5e0!3m2!1svi!2s!4v1722530887574!5m2!1svi!2s"
                width="1550" height="492" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Văn Phòng</h3>

                        <address>Ninh vân, Hoa Lư <br>Ninh Bình</address>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Thông tin liên hệ</h3>

                        <div><a href="mailto:#">vudinhchinh666@gmail.com</a></div>
                        <div><a href="tel:#">+ 0942.094.662</a></div>
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="contact-box text-center">
                        <h3>Social</h3>

                        <div class="social-icons social-icons-color justify-content-center">
                            <a href="https://www.facebook.com/tuilachingne" class="social-icon social-facebook"
                                title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                            <a href="#" class="social-icon social-twitter" title="Twitter" target="_blank"><i
                                    class="icon-twitter"></i></a>
                            <a href="#" class="social-icon social-instagram" title="Instagram" target="_blank"><i
                                    class="icon-instagram"></i></a>
                            <a href="#" class="social-icon social-youtube" title="Youtube" target="_blank"><i
                                    class="icon-youtube"></i></a>
                            <a href="#" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i
                                    class="icon-pinterest"></i></a>
                        </div><!-- End .soial-icons -->
                    </div><!-- End .contact-box -->
                </div><!-- End .col-md-4 -->
            </div><!-- End .row -->

            <hr class="mt-3 mb-5 mt-md-1">
            <div class="touch-container row justify-content-center">
                <div class="col-md-9 col-lg-7">
                    <div class="text-center">
                        <h2 class="title mb-1">Liên lạc</h2><!-- End .title mb-2 -->
                        <p class="lead text-primary">
                            Chúng tôi hợp tác với những thương hiệu và cá nhân đầy tham vọng; </p>
                        <!-- End .lead text-primary -->

                    </div><!-- End .text-center -->

                    <form action="{{route('contact.store')}}" class="contact-form mb-2" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="cname" class="sr-only">Name</label>
                                <input type="text" class="form-control" id="cname" placeholder="Name *" required  name="name">
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="cemail" class="sr-only">Email</label>
                                <input type="email" class="form-control" id="cemail" placeholder="Email *" required name="email">
                            </div><!-- End .col-sm-4 -->

                            <div class="col-sm-4">
                                <label for="cphone" class="sr-only">Phone</label>
                                <input type="tel" class="form-control" id="cphone" placeholder="Phone" name="phone">
                            </div><!-- End .col-sm-4 -->
                        </div><!-- End .row -->

                        <label for="cmessage" class="sr-only">Tin Nhắn</label>
                        <textarea class="form-control" cols="30" rows="4" id="cmessage" required placeholder="Tin nhắn *" name="message"></textarea>

                        <div class="text-center">
                            <button type="submit" class="btn btn-outline-primary-2 btn-minwidth-sm">
                                <span>SUBMIT</span>
                                <i class="icon-long-arrow-right"></i>
                            </button>
                        </div><!-- End .text-center -->
                    </form><!-- End .contact-form -->
                </div><!-- End .col-md-9 col-lg-7 -->
            </div><!-- End .row -->
        </div><!-- End .container -->
    </div><!-- End .page-content -->
@endsection
