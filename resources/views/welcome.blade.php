{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--@include('layouts.picture')--}}
{{--@include('layouts.chat')--}}
{{--@include('layouts.welcomenot')--}}
{{--@include('layouts.doctors')--}}
{{--@include('layouts.footer')--}}
{{--@endsection--}}
@include('layouts.app')

<div class="page-section pt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <nav aria-label="Breadcrumb">
                    <ol class="breadcrumb bg-transparent py-0 mb-5">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="blog.html">Blog</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Welcome to the legal section</li>
                    </ol>
                </nav>
            </div>
        </div> <!-- .row -->

        <div class="row">
            <div class="col-lg-8">
                <article class="blog-details">
                    <div class="post-thumb">
                        <img src="../assets/img/legal_background.png" alt="">
                    </div>
                    <div class="post-meta">
                        <div class="post-author">
                            <span class="text-grey">By</span> <a href="#">Admin</a>
                        </div>
                        <span class="divider">|</span>
                        <div class="post-date">
                            <a href="#">22 Jan, 2018</a>
                        </div>
                        <span class="divider">|</span>
                        <div>
                            <a href="#">StreetStyle</a>, <a href="#">Fashion</a>, <a href="#">Couple</a>
                        </div>
                        <span class="divider">|</span>
                        <div class="post-comment-count">
                            <a href="#">8 Comments</a>
                        </div>
                    </div>
                    <div class="bg-white" style="padding-left: 10px;padding-right: 10px; font-size: 4px !important;">
                        <h4 class="post-title h1 " style="text-align: center;">Sisi ni nani ...??</h4>
                        <div class="post-content">
                            <ul style="text-align: justify;">
                                <li>Wakili mtandao ilianzishwa 2024 kwa lengo la kurahisisha upatikanaji wa huduma zote za
                                    uwakili (uwanasheria) kieletroniki ndani na nje ya nchi pasipokujali umbali kwa masaa 24.
                                </li>
                                <li>Wakili mtandao tunajishughulisha na utoaji wa ushauri wa kisheria katika nyanja zote za sheria.</li>
                                <li>Wakili mtandao tunajihusisha na usimamizi wa mashauri (cases) kwenye vyombo vyote vya utoaji haki,
                                    mfano, mahakama, mabaraza, na bodi/tume za usuluhishi na n.k.
                                </li>
                                <li>Wakili mtandao pia tunajishughulisha na uandaaji wa nyaraka zote za kisheria, mfano, viapo,
                                    hati ya malalamiko, hati ya majibu na utetezi. n.k.
                                </li>
                                <li>Wakili mtandao tunatoa huduma za mihuri, mfano kuthibitisha nyaraka (certification and notary public,
                                    and commissioner for oaths).
                                </li>
                                <li>Wakili mtandao inajihusisha na kurahisisha usajili wa makampuni, taasisi mbalimbali,
                                    upatikanani wa vyeti vya vyeti vya kuzaliwa, kifo, ndoa, talaka na ufilisi
                                </li>
                            </ul>
                            <p class="text-center mb-5 wow"><b><i>Usiache Haki yako ipotee, Tupo Kukusaidia.</i></b></p>
                        </div>
                    </div>


                    <div class="post-tags">
                        <a href="#" class="tag-link">LifeStyle</a>
                        <a href="#" class="tag-link">Food</a>
                        <a href="#" class="tag-link">Coronavirus</a>
                    </div>
                </article> <!-- .blog-details -->
                <div class="col-lg-10">
                    @include('layouts.chat')
                </div>
                {{--            @include('layouts.doctors')--}}

                <div class="comment-form-wrap pt-5">
                    <h3 class="mb-5">Leave a comment</h3>
                    <form action="#" class="">
                        <div class="form-row form-group">
                            <div class="col-md-6">
                                <label for="name">Name *</label>
                                <input type="text" class="form-control" id="name">
                            </div>
                            <div class="col-md-6">
                                <label for="email">Email *</label>
                                <input type="email" class="form-control" id="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="url" class="form-control" id="website">
                        </div>

                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="msg" id="message" cols="30" rows="8" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Post Comment" class="btn btn-primary">
                        </div>

                    </form>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar">
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Search</h3>
                        <form action="#" class="search-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                                <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                            </div>
                        </form>
                    </div>
                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Categories</h3>
                        <ul class="categories">
                            <li><a href="#">Food <span>12</span></a></li>
                            <li><a href="#">Dish <span>22</span></a></li>
                            <li><a href="#">Desserts <span>37</span></a></li>
                            <li><a href="#">Drinks <span>42</span></a></li>
                            <li><a href="#">Ocassion <span>14</span></a></li>
                        </ul>
                    </div>

                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Recent Blog</h3>
                        <div class="blog-item">
                            <a class="post-thumb" href="">
                                <img src="../assets/img/blog/blog_1.jpg" alt="">
                            </a>
                            <div class="content">
                                <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                    <a href="#"><span class="mai-person"></span> Admin</a>
                                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <a class="post-thumb" href="">
                                <img src="../assets/img/blog/blog_2.jpg" alt="">
                            </a>
                            <div class="content">
                                <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                    <a href="#"><span class="mai-person"></span> Admin</a>
                                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-item">
                            <a class="post-thumb" href="">
                                <img src="../assets/img/blog/blog_3.jpg" alt="">
                            </a>
                            <div class="content">
                                <h5 class="post-title"><a href="#">Even the all-powerful Pointing has no control</a></h5>
                                <div class="meta">
                                    <a href="#"><span class="mai-calendar"></span> July 12, 2018</a>
                                    <a href="#"><span class="mai-person"></span> Admin</a>
                                    <a href="#"><span class="mai-chatbubbles"></span> 19</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Tag Cloud</h3>
                        <div class="tagcloud">
                            <a href="#" class="tag-cloud-link">dish</a>
                            <a href="#" class="tag-cloud-link">menu</a>
                            <a href="#" class="tag-cloud-link">food</a>
                            <a href="#" class="tag-cloud-link">sweet</a>
                            <a href="#" class="tag-cloud-link">tasty</a>
                            <a href="#" class="tag-cloud-link">delicious</a>
                            <a href="#" class="tag-cloud-link">desserts</a>
                            <a href="#" class="tag-cloud-link">drinks</a>
                        </div>
                    </div>

                    <div class="sidebar-block">
                        <h3 class="sidebar-title">Paragraph</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut, sunt placeat nam vero culpa sapiente consectetur similique, inventore eos fugit cupiditate numquam!</p>
                    </div>
                </div>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .page-section -->

<div class="page-section banner-home bg-image" style="background-image: url(../assets/img/banner-pattern.svg);">
    <div class="container py-5 py-lg-0">
        <div class="row align-items-center">
            <div class="col-lg-4 wow zoomIn">
                <div class="img-banner d-none d-lg-block">
                    <img src="../assets/img/mobile_app.png" alt="">
                </div>
            </div>
            <div class="col-lg-8 wow fadeInRight">
                <h1 class="font-weight-normal mb-3">Get easy access of all features using One Health Application</h1>
                <a href="#"><img src="../assets/img/google_play.svg" alt=""></a>
                <a href="#" class="ml-2"><img src="../assets/img/app_store.svg" alt=""></a>
            </div>
        </div> <!-- .row -->
    </div> <!-- .container -->
</div> <!-- .banner-home -->

<footer class="page-footer">
    <div class="container">
        <div class="row px-md-3">
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Company</h5>
                <ul class="footer-menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Career</a></li>
                    <li><a href="#">Editorial Team</a></li>
                    <li><a href="#">Protection</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>More</h5>
                <ul class="footer-menu">
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Advertise</a></li>
                    <li><a href="#">Join as Doctors</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Our partner</h5>
                <ul class="footer-menu">
                    <li><a href="#">One-Fitness</a></li>
                    <li><a href="#">One-Drugs</a></li>
                    <li><a href="#">One-Live</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-lg-3 py-3">
                <h5>Contact</h5>
                <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
                <a href="#" class="footer-link">701-573-7582</a>
                <a href="#" class="footer-link">healthcare@temporary.net</a>

                <h5 class="mt-3">Social Media</h5>
                <div class="footer-sosmed mt-3">
                    <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
                    <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
                </div>
            </div>
        </div>

        <hr>

        <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div> <!-- .container -->
</footer> <!-- .page-footer -->

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>
