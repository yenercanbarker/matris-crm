<?php

namespace App\Http\Controllers\Site;

use App\Http\Requests\Site\ChangeLanguageRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;

class LanguageController
{
    /**
     * @param ChangeLanguageRequest $request
     * @return RedirectResponse
     */
    public function change(ChangeLanguageRequest $request): RedirectResponse
    {
        $language = $request->input('language');
        App::setLocale($language);
        session()->put('language', $language);

        return redirect()->back();
    }
}
