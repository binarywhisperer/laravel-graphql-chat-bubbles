<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Chat Bubbles</title>
    </head>
    <body>
        <section id="chat-bubbles">
            <channel></channel>
            <bubbles></bubbles>
            <panel></panel>
        </section>
    <script src="/js/chat-bubbles.js"></script>
    </body>
</html>
