@extends('frontend.layouts.front')

@section('titre')
    Contactez-nous
@endsection

@section('content')

<section class="ftco-section contact-section ftco-no-pb" id="contact-section">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
            <div class="col-md-7 heading-section text-center ftco-animate fadeInUp ftco-animated">
                <span class="subheading">Nous contactez</span>
                <h2 class="mb-4">Message us for more details</h2>
                <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
            </div>
        </div>

        <div class="row block-9">
            <div class="col-md-8">
                <form action="#" class="p-4 p-md-5 contact-form">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Your Email">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="col-md-4 d-flex pl-md-5">
                <div class="row">
                    <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-map-marker"></span>
                        </div>
                        <div class="text">
                            <p><span>Adresse:</span>
                                Yokoè dans le canton
                                Sagbado - 22 BP 63
                                Lomé - Togo
                            </p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-phone"></span>
                        </div>
                        <div class="text">
                            <p><span>Phone:</span> <a href="tel://(+228) 90 06 14 55">(+228) 90 06 14 55</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-paper-plane"></span>
                        </div>
                        <div class="text">
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@acdev.com</a></p>
                        </div>
                    </div>
                    <div class="dbox w-100 d-flex ftco-animate fadeInUp ftco-animated">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-globe"></span>
                        </div>
                        <div class="text">
                            <p><span>Site Web</span> <a href="#">acev.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">

            </div>
        </div>
    </div>
</section>
@endsection
