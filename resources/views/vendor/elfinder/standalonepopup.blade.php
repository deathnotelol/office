<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <title>elFinder 2.0</title>

    <!-- jQuery and jQuery UI (REQUIRED) -->
    <link rel="stylesheet" type="text/css"
        href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/themes/smoothness/jquery-ui.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>

    <!-- elFinder CSS (REQUIRED) -->
    <link rel="stylesheet" href="{{ asset('public/packages/barryvdh/elfinder/css/elfinder.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/packages/barryvdh/elfinder/css/theme.css') }}">



    <!-- elFinder JS (REQUIRED) -->
    <script src="{{ asset('public/packages/barryvdh/elfinder/js/elfinder.min.js') }}"></script>
    @if ($locale)
        <!-- elFinder translation (OPTIONAL) -->
        <script src="{{ asset($dir . "/js/i18n/elfinder.$locale.js") }}"></script>
    @endif
    <!-- Include jQuery, jQuery UI, elFinder (REQUIRED) -->

    <script type="text/javascript">
        $().ready(function() {
            var elf = $('#elfinder').elfinder({
                // set your elFinder options here
                @if ($locale)
                    lang: '{{ $locale }}', // locale
                @endif
                customData: {
                    _token: '{{ csrf_token() }}'
                },
                url: '{{ route('elfinder.connector') }}', // connector URL
                soundPath: '{{ asset($dir . '/sounds') }}',
                dialog: {
                    width: 900,
                    modal: true,
                    title: 'Select a file'
                },
                resizable: true,
                commandsOptions: {
                    getfile: {
                        multiple: true, // Enable multiple file selection
                        oncomplete: 'destroy'
                    }
                },
                getFileCallback: function(files) {
                    if (!Array.isArray(files)) {
                        files = [files]; // Ensure it's an array
                    }

                    const selectedFiles = files.map(file => file.path);
                    const parent = window.parent;

                    if (parent) {
                        const existingFiles = JSON.parse(localStorage.getItem('selectedFiles')) || [];
                        const updatedFiles = [...existingFiles, ...selectedFiles];
                        localStorage.setItem('selectedFiles', JSON.stringify(updatedFiles));
                    }

                    window.close();
                }
                // getFileCallback: function(file) {
                //     window.parent.processSelectedFile(file.path, '{{ $input_id }}');
                //     parent.jQuery.colorbox.close();
                // }
            }).elfinder('instance');
        });
    </script>

</head>

<body>

    <!-- Element where elFinder will be created (REQUIRED) -->
    <div id="elfinder"></div>

</body>

</html>
