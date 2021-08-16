@extends('master')
@section('content')
<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Contacts</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
                <a href="index.html">Home</a> / <span>Contacts</span>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="beta-map">

    <div class="abs-fullwidth beta-map wow flipInX">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1917.8261882238478!2d108.25065495788458!3d15.979519975804969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142108fa7eca549%3A0xa6e3c52b2f0aab46!2zNzEgTmd1eeG7hW4gTWluaCBDaMOidSwgSG_DoCBI4bqjaSwgTmfFqSBIw6BuaCBTxqFuLCDEkMOgIE7hurVuZyA1NTAwMDAsIFZpZXRuYW0!5e0!3m2!1sen!2sus!4v1620943129076!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
</div>
<div class="container">
    <div id="content" class="space-top-none">

        <div class="space50">&nbsp;</div>
        <div class="row">
            
            <div class="col-sm-4">
                <h2>Contact Information</h2>
                <div class="space20">&nbsp;</div>

                <h6 class="contact-title">Address</h6>
                <p>
                    71 Nguyen Minh Chau Street, Hoai Hai Ward<br>
                    Ngu Hanh Son District<br>
                    Da Nang City.
                </p>
                <div class="space20">&nbsp;</div>
                <h6 class="contact-title">Business Enquiries</h6>
                <p>
                   Email: <br>
                    pvtien902@gmail.com<br>
                    <a href="https://www.facebook.com/phamviettien2">Facebook.</a>
                </p>
                <div class="space20">&nbsp;</div>
            </div>
        </div>
    </div> <!-- #content -->
</div> <!-- .container -->
@endsection