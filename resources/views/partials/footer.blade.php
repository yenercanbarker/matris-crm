<div class="grid grid-cols-1 lg:grid-cols-4 lg:gap-20 pb-10">
    <div class="lg:col-span-1 flex flex-col items-center lg:items-start text-center lg:text-left">
        <a href="/" class="inline-flex items-center mb-6 group">
            <div class="relative">
                <div class="hover:scale-105 transition-transform duration-200">
                    <img
                        src="{{ asset('images/' . config('app.logo_black'), true) }}"
                        alt="{{ config('app.name') }} Logo"
                        class="h-12 w-auto"
                        style="display: none;"
                        id="footer-logo-light"
                        loading="lazy"
                    />
                    <img
                        src="{{ asset('images/' . config('app.logo_white'), true) }}"
                        alt="{{ config('app.name') }} Logo"
                        class="h-12 w-auto"
                        style="display: block;"
                        id="footer-logo-dark"
                        loading="lazy"
                    />
                </div>
            </div>
        </a>
        <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-xs md:max-w-md">
            {{ __('translation.footer.slogan') }}
        </p>
        <p class="text-gray-500 dark:text-gray-400 text-sm mb-6 max-w-xs md:max-w-md">
            {{ __('translation.footer.description') }}
        </p>
    </div>

    <div class="flex flex-col items-center text-center">
        <h2 class="font-bold text-gray-900 dark:text-white mb-6">{{ __('translation.footer.navItems.services') }}</h2>
        <ul class="space-y-3">
            <li>
                <a href="/{{ app()->getLocale() }}/blog" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    Blog
                </a>
            </li>
            <li>
                <a href="/login" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.createQRCodes') }}
                </a>
            </li>
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.pricing') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.pricingAndPlans') }}
                </a>
            </li>
        </ul>
        <div class="w-full flex justify-center py-6">
            <hr class="block sm:hidden border-t border-gray-200 dark:border-gray-800 w-2/3" />
        </div>
    </div>

    <div class="flex flex-col items-center text-center">
        <h2 class="font-bold text-gray-900 dark:text-white mb-6">{{ __('translation.footer.navItems.company') }}</h2>
        <ul class="space-y-3">
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.terms-and-conditions') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.termsAndConditions') }}
                </a>
            </li>
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.privacy-policy') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.privacyPolicy') }}
                </a>
            </li>
        </ul>
        <div class="w-full flex justify-center py-6">
            <hr class="block sm:hidden border-t border-gray-200 dark:border-gray-800 w-2/3" />
        </div>
    </div>

    <div class="flex flex-col items-center text-center">
        <h2 class="font-bold text-gray-900 dark:text-white mb-6">{{ __('translation.footer.navItems.help') }}</h2>
        <ul class="space-y-3">
            <li>
                <a href="/contact-us" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.contactUs') }}
                </a>
            </li>
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.faq') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.faq') }}
                </a>
            </li>
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.cancel-subscription') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.cancelSubscription') }}
                </a>
            </li>
            <li>
                <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.delete-account') }}" class="text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 transition-colors flex items-center group justify-center">
                    {{ __('translation.footer.navItems.deleteAccount') }}
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="pt-8 flex flex-col sm:flex-row justify-between items-center">
    <div class="text-end">
        <div class="flex flex-wrap justify-center gap-6">
            <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.terms-and-conditions') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                {{ __('translation.footer.company.terms') }}
            </a>
            <a href="/{{ app()->getLocale() }}/{{ __('translation.slug.privacy-policy') }}" class="text-sm text-gray-500 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors">
                {{ __('translation.footer.company.privacy') }}
            </a>
        </div>
    </div>
</div>
