@extends('frontend.index')
@section('content')

    <!-- ======= About Section ======= -->
    <section id="about" class="about"   >
        <div class="container-fluid">

            <div class="row text-center">
                <div class="col-lg-12 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 ">
                    <h3>{{trans('user.About Us')}}</h3>
                    <p>{{trans('user.CMCSERV is a privately-owned consultation company that provides compliance management consultation services.')}}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-6 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-right">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">{{trans('user.CMCSERV combines the in-depth')}}</a></h4>
                        <p class="description">{{trans('user.knowledge of the nature of business in various sectors (industrial, service, commercial, etc.) and the experience of dealing with governmental agencies in Egypt')}}</p>
                    </div>
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">{{trans('user.We believe that')}}</a></h4>
                        <p class="description">{{trans('user.the strength and success of any organization is directly attributable to its understanding and compliance with the regulations governing its business')}}</p>
                    </div>
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">{{trans('user.Our Role')}}</a></h4>
                        <p class="description">{{trans('user.support the success and prosperity of our partners by providing our customers with compliance management consultation services with the latest technologies in order to make it easy for our customers to comply with their applicable regulatory requirements')}}</p>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5" data-aos="fade-left">

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon"><i class="bx bx-fingerprint"></i></div>
                        <h4 class="title"><a href="">{{trans('user.cmc_message')}}</a></h4>
                        <p class="description">{{trans('user.CMCSERV message is to spread, and promote the compliance culture among all business sectors')}}</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="200">
                        <div class="icon"><i class="bx bx-gift"></i></div>
                        <h4 class="title"><a href="">{{trans('user.As a start')}}</a></h4>
                        <p class="description">{{trans('user.CMCSERV developed an online database for Egyptian regulations.')}}</p>
                        <p class="description">{{trans('user.The database will act a compliance consultant at your fingertips, which can define the applicable regulations, and required Permits for any business activity.')}}</p>
                    </div>

                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="300">
                        <div class="icon"><i class="bx bx-atom"></i></div>
                        <h4 class="title"><a href="">{{trans('user.Our primary focus')}}</a></h4>
                        <p class="description">when we developed the database was on the Health, Safety, and Environmental regulations. This is just a start, and our database is growing. </p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Section -->




            <section id="services" class="faq section-bg">
                <div class="container">

                    <div class="section-title" data-aos="fade-up">
                        <h2>{{trans('user.Services')}}</h2>
                        <p>{{trans('user.Check The Services')}}</p>
                    </div>

                    <div class="faq-list">
                        <ul>
                            <li data-aos="fade-up">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" class="collapse" href="#faq-list-1">{{trans('user.Searching By Keywords')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-1" class="collapse show" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.Each regulatory requirement was taged with a descriptive keyword. User can search the required kewyord, and the database will give recommendations for other related keywords. The outcome from the seach process is a list of regulations from which the keyword was extraxted.')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="100">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-2" class="collapsed">{{trans('user.Searching By Regulatory Requirement Properties')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-2" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.For direct access to a specific regulation, a filering feature was added to the database by which the user can filer for article number, regulation number, and year of issuance. ')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="200">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-3" class="collapsed">{{trans('user.Searching By Applicability Questions')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-3" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.For a full list of applicable regulatory requirements, the database was provided with applicability questioner which the user can use to identify the exact applicable regulations to the business. Legal terms in the regulatory requirements where simplified to operational terms which can be easly recognized by all users regardless of their background. Moreover, attachments where added to the questioner to provide the user with the required information to answer the question.')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="300">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-4" class="collapsed">{{trans('user.Licenses & Permits')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-4" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.Nothing important for any business other than the previliage to operate. Licenses and permits are the official compliance evidences that give any business the right to operate. Therefor, CMCSERV has develoved a special service to identify the required licenses and permits for any activity. The licenses and permits service provide the user with the following: • required licenses and permits • The governing authority • The required documents to be submitted • The expected duration for issuance • The licenses and permits validity')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-5" class="collapsed">{{trans('user.Monitoring Regulations Updates')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-5" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.In the very dynamic regulations movements with daily update to regulations its very cruitial for companies to assure its compliance with the most recent update to the regulatory requirements. Therefore, CMCSERV updates its database on a daily basis using offecial governmental channels. The reference to the regulatory text status is recorded in the article properties')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-6" class="collapsed">{{trans('user.Compliance Tasks Tracker')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-6" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.Princibal part from any complianc management system is the compliance tasks. CMCSERV provides its users with the ability to record compliance tasks, and track them. Tasks recording function was placed next to the applicable regulatory requirement to facilitate the recording process. In addition, the user can define a due date for the task closure.')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-7" class="collapsed">{{trans('user.Alerts & Notifications')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-7" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.When an impacting change in the regulations occusers, CMCSERV instantly update its database, and alert the impacted clients with the modification. Moreover, CMCSERV notifies its users with the ccompliance tasks due date.')}}
                                    </p>
                                </div>
                            </li>
                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-8" class="collapsed">{{trans('user.Translated Legal Text')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-8" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.In the very diverse world with different nationalities working in multinational companies, it was crutial to provide English translation to the legal text. On the otherhand, the original text in its native Arabic version was made available since the Arabic vesrion is the official refeerence to the regulatory requirement in any Arbaian country, and shall prevail the translation.')}}
                                    </p>
                                </div>
                            </li>

                            <li data-aos="fade-up" data-aos-delay="400">
                                <i class="bx bx-help-circle icon-help"></i> <a data-toggle="collapse" href="#faq-list-9" class="collapsed">{{trans('user.Convenient Accessibility')}}<i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                <div id="faq-list-9" class="collapse" data-parent=".faq-list">
                                    <p>
                                        {{trans('user.To ensure along the hour service to its clients, CMCSERV utilized the latest technology in designing its database. The used technology enables CMCSERV clients to conveniently access the regulations database from any machine that is connected to the internet e.g. PCs, Tablets, Smart Mobile Phones. Moreover, CMCSERV clients can submit online their quiers regarding regulatory requirements, or request for consultation. CMCSERV Team will process the client\'s queries, or requests, and send the response directly to the client\'s personal e-mail.')}}
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>
            </section><!-- End F.A.Q Section -->




    <!-- ======= Pricing Section ======= -->
    <section id="pricing" class="pricing">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{trans('user.Our Pricing')}}</h2>
                <p>{{trans('user.Check our Pricing')}}</p>
            </div>

            <div class="row" data-aos="fade-left">

                <div class="col-lg-3 col-md-6">
                    <div class="box" data-aos="zoom-in" data-aos-delay="100">
                        <h3>{{trans('user.Free')}}</h3>
                        <h4><sup></sup>{{trans('user.10 Points')}}<span></span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li class="na">Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{url('register')}}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-md-0">
                    <div class="box featured" data-aos="zoom-in" data-aos-delay="200">
                        <h3>{{trans('user.Silver')}}</h3>
                        <h4><sup>$</sup>19<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li class="na">Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{url('register')}}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="300">
                        <h3>{{trans('user.gold')}}</h3>
                        <h4><sup>$</sup>29<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{url('register')}}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mt-4 mt-lg-0">
                    <div class="box" data-aos="zoom-in" data-aos-delay="400">
                        <span class="advanced">{{trans('user.Platinum')}}</span>
                        <h3>{{trans('user.Platinum')}}</h3>
                        <h4><sup>$</sup>49<span> / month</span></h4>
                        <ul>
                            <li>Aida dere</li>
                            <li>Nec feugiat nisl</li>
                            <li>Nulla at volutpat dola</li>
                            <li>Pharetra massa</li>
                            <li>Massa ultricies mi</li>
                        </ul>
                        <div class="btn-wrap">
                            <a href="{{url('register')}}" class="btn-buy">Buy Now</a>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Pricing Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>{{trans('user.contact')}}</h2>
                <p>{{trans('user.Contact Us')}}</p>
            </div>

            <div class="row">

                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="info">
                        <div class="address">
                            <i class="icofont-google-map"></i>
                            <h4>{{trans('user.Location')}}:</h4>
                            <p>{{trans('user.address')}}</p>
                        </div>

                        <div class="email">
                            <i class="icofont-envelope"></i>
                            <h4>{{trans('user.email')}}:</h4>
                            <p>{{trans('user.info@example.com')}}</p>
                        </div>

                        <div class="phone">
                            <i class="icofont-phone"></i>
                            <h4>{{trans('user.mobile')}}</h4>
                            <p>{{trans('user.mobile')}}</p>
                        </div>

                    </div>

                </div>

                <div class="col-lg-8 mt-5 mt-lg-0" data-aos="fade-left" data-aos-delay="200">
                @include('layouts.message')
                    <form action="{{url('send/message')}}" method="post" >

                        {!! csrf_field() !!}
                        <div class="form-row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{trans('user.name')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('user.name')}}'"/>
                                <div class="validate"></div>
                            </div>
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="{{trans('user.email')}}" data-rule="email" data-msg="Please enter a valid email" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('user.email')}}'" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="subject" id="subject" placeholder="{{trans('user.subject')}}" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('user.subject')}}'"/>
                            <div class="validate"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="{{trans('user.message')}}" onfocus="this.placeholder = ''" onblur="this.placeholder = '{{trans('user.message')}}'"></textarea>
                            <div class="validate"></div>
                        </div>
                        <div class="text-center"><button class="btn btn-primary" type="submit">{{trans('user.send')}}</button></div>
                    </form>

                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-lg-4 col-md-6">
                        <div class="footer-info">
                            <h3>Bootslander</h3>
                            <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em></p>
                            <p>
                                A108 Adam Street <br>
                                NY 535022, USA<br><br>
                                <strong>Phone:</strong> +1 5589 55488 55<br>
                                <strong>Email:</strong> info@example.com<br>
                            </p>
                            <div class="social-links mt-3">
                                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>

                    </div>

                </div>
            </div>
        </div>

        <div class="container">
            <div class="copyright">
                &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
                Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
    <div id="preloader"></div>
    @endsection
