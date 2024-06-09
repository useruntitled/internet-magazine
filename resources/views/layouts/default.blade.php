<!DOCTYPE html>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8" />
        <meta
            name="viewport"
            content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
        />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        @vite(["resources/css/app.css"])
        <title>
            {{ isset($title) ? $title . " | " : "" }}
            {{ config("app.name") }}
        </title>
    </head>
    <body>
        @include("layouts.partials.default.header")
        <div class="min-h-screen">
            <div class="flex row-reverse space-x-4">
                <main class="max-w-[90rem] mx-auto">
                    @yield("content")
                </main>
            </div>
        </div>
        @include("layouts.partials.default.footer")
        @vite(["resources/js/app.js"])
    </body>
</html>
