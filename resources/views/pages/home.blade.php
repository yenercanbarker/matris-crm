@extends('layouts.app')

@section('title', __('translation.seo.home.title'))

@php
    $ogLanguages = [
        'tr' => 'tr_TR',
        'en' => 'en_US',
        'pt' => 'pt_BR',
        'fr' => 'fr_FR',
        'ru' => 'ru_RU',
        'es' => 'es_ES',
        'de' => 'de_DE'
    ];
    $ogLanguage = $ogLanguages[app()->getLocale()];
@endphp

@push('meta')
    <meta name="robots" content="index, follow">
    <meta name="description" content="{{ __('translation.seo.home.description') }}">
    <meta property="og:title" content="{{ config('app.name') }} | {{ __('translation.seo.home.title') }}">
    <meta property="og:description" content="{{ __('translation.seo.home.description') }}">
    <meta property="og:locale" content="{{ $ogLanguage }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ config('app.og_image') }}">
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ __('translation.seo.home.title') }}" />
    <meta name="twitter:description" content="{{ __('translation.seo.home.description') }}" />
    <meta name="twitter:image" content="{{ config('app.twitter_image') }}" />

    <link rel="canonical" href="{{ url()->current() }}">
    @foreach(['tr', 'en', 'es', 'fr', 'de', 'ru', 'pt'] as $locale)
        <link rel="alternate" hreflang="{{ $locale }}" href="{{ url('/' . $locale) }}" />
    @endforeach
@endpush

@section('content')
    @if(!empty($plans))
        <section class="relative z-10">
            <div class="relative overflow-hidden">
                <div class="section">
                    @include('partials.pricing', ['plans' => $plans])
                </div>
            </div>
        </section>
    @endif

    @if(!empty($faq))
        <section class="relative z-10">
            <div class="section">
                @include('partials.faq', ['faq' => $faq])
            </div>
        </section>
    @endif

    @if(!empty($blogs))
        <section class="relative z-10">
            <div class="section">
                <div class="text-center">
                   <span class="blueToPurpleBadge">
                        <span class="flex h-2 w-2 rounded-full bg-blue-500 dark:bg-blue-400 mr-1.5"></span>
                        {{ __('translation.blog.badge') }}
                   </span>
                </div>
                <p class="sectionTitle">Blog</p>
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8">
                    @foreach($blogs as $blog)
                        <a href="{{ url('/' . app()->getLocale() . '/blog/' . $blog['slug']) }}">
                            <section>
                                <div
                                    class="h-[285px] bg-white dark:bg-gray-800 rounded-3xl relative flex flex-col justify-between shadow-xl hover:shadow-2xl hover:-translate-y-2 transition-all duration-300 overflow-hidden">
                                    <div class="flex items-center justify-center relative">
                                        <div class="bg-white/10 backdrop-blur-md rounded-2xl overflow-hidden w-full">
                                            <picture>
                                                <source srcset="{{ $blog['image_preview'] . '.avif' }}"
                                                        type="image/avif">
                                                <source srcset="{{ $blog['image_preview'] . '.webp' }}"
                                                        type="image/webp">
                                                <img src="{{ $blog['image_preview'] . '.jpg' }}"
                                                     alt="{{ $blog['image_alt'] }}"
                                                     class="w-full h-36 object-cover opacity-90" loading="lazy"
                                                     decoding="async">
                                            </picture>
                                        </div>

                                        <div
                                            class="absolute top-2 right-2 backdrop-blur-md purpleBadge px-4 py-2 rounded-full text-xs font-medium">
                                            {{ \Carbon\Carbon::parse($blog['created_at'])->translatedFormat('d F Y') }}
                                        </div>
                                    </div>

                                    <div
                                        class="flex flex-col h-full justify-between p-4 text-gray-600 dark:text-gray-300">
                                        <div class="mt-2">
                                            <h3 class="text-xl font-bold mb-2 leading-tight">
                                                {{ mb_substr($blog['title'], 0, 50) . '...' }}
                                            </h3>
                                            <p class=" text-sm leading-relaxed">
                                                {{ mb_substr($blog['meta_description'], 0, 100) . '...' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </a>
                    @endforeach
                </div>
                <div class="mt-6 text-center">
                    <a href="{{ url('/' . app()->getLocale() . '/blog') }}">
                        <button class="blueToPurpleButton" aria-label="{{ __('translation.blog.all_blog_posts') }}">
                            {{ __('translation.blog.all_blog_posts') }}
                        </button>
                    </a>
                </div>
            </div>
        </section>
    @endif
@endsection
