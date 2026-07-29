@extends('layouts.website')

@section('title', 'Home')

@section('content')

<section class="hero-section">
    <div class="hero-overlay">
        <div class="container hero-content">
            <h1>Ramamandira Trust</h1>
            <p class="hero-subtitle">
                Faith, Service and Tradition for Every Generation
            </p>

            <div class="hero-actions">
                <a href="{{ route('donate') }}" class="btn btn-primary">Donate Now</a>
                <a href="{{ route('heritage') }}" class="btn btn-outline">Our Heritage</a>
            </div>
        </div>
    </div>
</section>

<section class="section section-light">
    <div class="container">
        <div class="section-heading">
            <h2>Welcome to Ramamandira Trust</h2>
            <p>
                A modern digital platform is being developed to showcase the Trust's heritage, temple activities,
                community service initiatives, and public programmes.
            </p>
        </div>
    </div>
</section>

@endsection