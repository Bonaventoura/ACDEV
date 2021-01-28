<footer class="ftco-footer">
    <div class="container mb-5 pb-4">
        <div class="row">
            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <img src="{{ asset('images/logo_acdev.png') }}" width="70" alt="">

                   <!-- <p>Far far away, behind the word mountains, far from the countries.</p>-->
                    <ul class="ftco-footer-social list-unstyled mt-4">
                        <li><a href="#"><span class="fa fa-twitter"></span></a></li>
                        <li><a href="#"><span class="fa fa-facebook"></span></a></li>
                        <li><a href="#"><span class="fa fa-instagram"></span></a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Pages</h2>
                    <div class="d-flex">
                        <ul class="list-unstyled mr-md-4">
                            <li><a href="{{ route('acdev.projets') }}"><span class="fa fa-chevron-right mr-2"></span>Projets</a></li>
                            <li><a href="{{ route('presentation') }}"><span class="fa fa-chevron-right mr-2"></span>Présentation</a></li>
                            <li><a href="{{ route('blog') }}"><span class="fa fa-chevron-right mr-2"></span>Actualités</a></li>
                        </ul>
                        <ul class="list-unstyled ml-md-5">
                            <li><a href="{{ route('temoignage') }}"><span class="fa fa-chevron-right mr-2"></span>Témoignages</a></li>
                            <li><a href="{{ route('acdev.partenaires') }}"><span class="fa fa-chevron-right mr-2"></span>Partenaires</a></li>
                            <li><a href="{{ route('contact') }}"><span class="fa fa-chevron-right mr-2"></span>Contact</a></li>

                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Actualités</h2>
                    <ul class="list-unstyled">
                        @foreach ($last_post as $post)
                        <li><a href="{{ route('blog.single', ['slug'=>$post->slug]) }}"><span class="fa fa-chevron-right mr-2"></span>{{str_limit($post->title,20)}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-lg col-md-6">
                <div class="ftco-footer-widget">
                    <h2 class="ftco-heading-2">Nous retrouvez</h2>
                    <div class="block-23 mb-3">
                        <ul>
                            <li><span class="fa fa-map-marker mr-3"></span>
                                <span class="text">Yokoè dans le canton
                                Sagbado - 22 BP 63
                                Lomé - Togo</span>
                            </li>
                            <li><a href="#"><span class="fa fa-phone mr-3"></span><span class="text">(+228) 90 06 14 55</span></a></li>
                            <li><a href="#"><span class="fa fa-paper-plane mr-3"></span><span class="text">acdev.org@gmail.com</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-6 aside-stretch py-3">

                    <p class="mb-0"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés à ACdev| Développé par <a href="#" target="_blank">IrisNetCom</a>
                    </p>
                </div>
            </div>
        </div>
   
    </div>
</footer>
