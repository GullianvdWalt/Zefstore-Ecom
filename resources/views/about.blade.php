@extends('layout')

@section('title', 'About')

@section('content')

@component('components.breadcrumbs')
<a href="/" class="home-link">Home</a>
<span class="breadcrumb-separator material-icons">
    arrow_forward_ios
</span>
<span>About</span>
@endcomponent
 <div class="about-section">
    <div>
            <h1 class="about-heading">About Us</h1>
            <hr class="about-heading-line">
    </div>
     <div class="about-body-container">
            <p class="about-content">The Zef Store is owned by a bunch of engineers which could be contacted at: <span><a href="www.hhrl.co.za">www.hhrl.co.za</a></span></p>
            <p class="dummy-text-about-us">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, debitis dolorem, magnam magni natus nulla distinctio enim alias amet totam,
                nobis mollitia eligendi expedita architecto neque tenetur. Inventore, eaque voluptatem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut magnam necessitatibus aliquam harum, dolores molestias dolor accusantium ipsa laboriosam consectetur!
                Itaque, facere facilis! Hic sequi, similique quia esse nostrum voluptates?
            </p>
            <p class="dummy-text-about-us">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, debitis dolorem, magnam magni natus nulla distinctio enim alias amet totam,
                nobis mollitia eligendi expedita architecto neque tenetur. Inventore, eaque voluptatem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut magnam necessitatibus aliquam harum, dolores molestias dolor accusantium ipsa laboriosam consectetur!
                Itaque, facere facilis! Hic sequi, similique quia esse nostrum voluptates?Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore accusamus excepturi
                autem deserunt tempore vero, maxime veritatis molestiae iusto beatae suscipit velit dolorem ad praesentium nulla repudiandae magnam alias. Accusamus.
            </p>
            <p class="dummy-text-about-us">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, debitis dolorem, magnam magni natus nulla distinctio enim alias amet totam,
                nobis mollitia eligendi expedita architecto neque tenetur. Inventore, eaque voluptatem.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut magnam necessitatibus aliquam harum, dolores molestias dolor accusantium ipsa laboriosam consectetur!
                Itaque, facere facilis! Hic sequi, similique quia esse nostrum voluptates?
            </p>
    </div>
 </div>

@endsection
