@extends('admin.layouts.app')

@section('main-section')
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="pagetitle">
                    <h1>Material Inc.</h1>

                </div>
            </div>
            <div class="offset-lg-2 col-lg-4">
                <span>Show As</span>
                <div class="show-as p-1">
                    <span class="text-dark"></span>
                    <button class="btn btn- w-50">List</button>
                    <button class="btn btn-primary">Map.</button>
                </div>
            </div>
            <div class="col-md-12 mt-2" style="height:70vh;">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.652466256313!2d-0.13263068425105965!3d51.51009467963657!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x14bc3e60e56a10c5!2sBig%20Ben!5e0!3m2!1sen!2sus!4v1647646577172!5m2!1sen!2sus"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>


    <section class="section dashboard">
        <div class="row"></div>
    </section>
@endsection()
