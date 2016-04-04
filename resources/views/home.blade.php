@extends('layout')

@section('content')

    @if(count($projects) > 0)
    <div id="quaternary" class="featured-page-area">
        <div class="featured-page-wrapper clear">
            <h2 id="featured-work">Featured Work</h2>
            @foreach($projects AS $project)
            <div class="featured-page">
                <article class="ttcw-portfolio type-ttcw-portfolio status-publish has-post-thumbnail hentry">
                    <a class="post-thumbnail" href="{{ $project->url }}">
                        <img width="314" height="228" src="{{ asset($project->image_path) }}" class="attachment-edin-thumbnail-landscape size-edin-thumbnail-landscape" />    
                    </a>
                </article><!-- #post-## -->
            </div><!-- .featured-page -->
            @endforeach
        </div><!-- .featured-page-wrapper -->
    </div><!-- #quaternary -->
    @endif

    <div id="quinary" class="front-page-widget-area" role="complementary">
        <div class="front-page-widget-wrapper clear">
            <h2 id="services">Services</h2>
            <div class="front-page-widget">
                <aside id="text-6" class="widget widget_text">
                    <h2 class="widget-title">Development</h2>           
                    <div class="textwidget">We'll work with you to develop the software you need. From your website to your mobile apps. We are experienced with the modern technologies to get you running quickly.</div>
                </aside>
            </div><!-- .front-page-widget -->
            <div class="front-page-widget">
                <aside id="text-8" class="widget widget_text">
                    <h2 class="widget-title">Maintenance</h2>           
                    <div class="textwidget">We'll take the time to make sure your site is functioning properly. While doing this we'll also be able to do any updates that you need.</div>
                </aside>
            </div><!-- .front-page-widget -->
            <div class="front-page-widget">
                <aside id="text-9" class="widget widget_text">
                    <h2 class="widget-title">Security</h2>          
                    <div class="textwidget">Even the best in the business have security problems. We can review, audit, and fix any issues you may be having with WordPress and Laravel.</div>
                </aside>
                <aside id="text-13" class="widget widget_text">         
                    <div class="textwidget"><a href="/contact" class="button">Get In Touch</a></div>
                </aside>
            </div><!-- .front-page-widget -->
        </div><!-- .front-page-widget-wrapper -->
    </div><!-- #quinary -->

@endsection
