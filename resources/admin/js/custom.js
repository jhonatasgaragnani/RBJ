$(document).ready(() => {
    (function ($, adminLTE) {

        "use strict";

        $('.data-table').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "pageLength": 50,
            "autoWidth": false,
            "language": {
                "url": "/i18n/pt-br.json"
            },
            "responsive": true,
            "columnDefs": [
                {
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -2
                }
            ],
            drawCallback: function (settings) {
                var pagination = $(this).closest('.dataTables_wrapper').find('.dataTables_paginate');
                pagination.toggle(this.api().page.info().pages > 1);
            }
        });

        $.fn.select2.defaults.set('language', 'pt-BR');

        $('.select2').select2({
            allowClear: true,
            placeholder: () => $(this).data('placeholder')
        });

        $('.lfm-image').filemanager('image', {prefix: "/admin/filemanager"});

        $('.lfm-file').filemanager('file', {prefix: "/admin/filemanager"});

        var editor_config = {
            min_height: 600,
            path_absolute: '/',
            selector: 'textarea.tinymce-editor',
            plugins: [
                "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor colorpicker textpattern"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media video",
            relative_urls: false,
            suffix: '.min',
            language: 'pt_BR',
            directionality: 'ltr',
            file_browser_callback: (field_name, url, type, win) => {
                const x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
                const y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

                var cmsURL = editor_config.path_absolute + 'admin/filemanager?field_name=' + field_name;

                if (type === 'image') {
                    cmsURL += '&type=Images';
                } else {
                    cmsURL += '&type=Files';
                }

                tinyMCE.activeEditor.windowManager.open({
                    file: cmsURL,
                    title: 'Gerenciador de arquivos',
                    width: x * 0.8,
                    height: y * 0.8,
                    resizeable: 'yes',
                    close_previous: 'no'
                });
            },
            content_css: '/css/app.css'
        }
        tinymce.init(editor_config);

        $(document).on('click', '[data-toggle="ekko-light"]', function (event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

        $('.timepicker').timepicker({
            showSeconds: false,
            showMeridian: false,
            showInputs: false
        });

        $('.datepicker').datepicker({
            autoclose: true,
            language: 'pt-BR',
            format: 'dd/mm/yyyy'
        });

    })(jQuery, jQuery.AdminLTE);
})