@extends('layouts.app')



@section('content')

<section class="contact-section bottom-padding">
<div class="container-fluid">
<div class="row">
<div class="col-lg-12">
<div class="section-tittle section-tittle3 mb-30 text-center">
<h2>Contact Us</h2>
</div>
</div>
</div>
<div class="d-none d-sm-block mb-5 pb-4">

</div>

<div style="display: none;" class="row" id="english"></div>
<div style="display: none;" class="row" id="bangla"></div>

<div style="display: none;" class="row" id="cat_english"></div>
<div style="display: none;" class="row" id="cat_bangla"></div>

<div style="display: none;" class="row" id="latest_english"></div>
<div style="display: none;" class="row" id="latest_bangla"></div>

<div class="row">
<div class="col-12">
<h2 class="contact-title">Get in Touch</h2>
</div>
<div class="col-lg-8">
<form class="form-contact contact_form" action="https://preview.colorlib.com/theme/megasis/contact_process.php" method="post" id="contactForm" novalidate="novalidate">
<div class="row">
<div class="col-12">
<div class="form-group">
<textarea class="form-control w-100" name="message" id="message" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea>
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input class="form-control valid" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
<input class="form-control valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
</div>
</div>
<div class="col-12">
<div class="form-group">
<input class="form-control" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
</div>
</div>
</div>
<div class="form-group mt-3">
<button type="submit" class="button button-contactForm boxed-btn">Send</button>
</div>
</form>
</div>
<div class="col-lg-3 offset-lg-1">
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-home"></i></span>
<div class="media-body">
<h3>Rowshanara Tower, Dhanmondi-19.</h3>
<p>Dhaka-1209, Dhaka, Bangladesh</p>
</div>
</div>
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-tablet"></i></span>
<div class="media-body">
<h3>+880 1727920606</h3>
<p>Always Open</p>
</div>
</div>
<div class="media contact-info">
<span class="contact-info__icon"><i class="ti-email"></i></span>
<div class="media-body">
<h3><a class="__cf_email__" data-cfemail="63101613130c111723000c0f0c110f0a014d000c0e">info@bdn71.com</a></h3>
<p>Send us your query anytime!</p>
</div>
</div>
</div>
</div>
</div>
</section>

@endsection
