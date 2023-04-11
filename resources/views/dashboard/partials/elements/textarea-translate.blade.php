@foreach (config('laravellocalization.supportedLocales') as $locale => $index)
    <div class="form-group {{ $detail['cssClass'] }}">
        <div class="card card-outline ">
            <div class="card-header">
                <h3 class="card-title">@lang('site.' . $colname) {{ $locale }}</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <textarea id="TextArea{{ $locale }}" name="{{ $colname }}[{{ $locale }}]"
                    class="ck_editor form-control ckeditor @error($locale . '.' . $colname) parsley-error @enderror">{{ isset($row) ? (isset($row->getTranslations($colname)[$locale]) ? $row->getTranslations($colname)[$locale] : '') : old($locale . '.' . $colname) }}</textarea>
            </div>

            <div class="card-footer">
                @error($locale . '.' . $colname)
                    <ul class="parsley-errors-list filled" id="parsley-id-5">
                        <li class="parsley-required">{{ $message }}</li>
                    </ul>
                @enderror
            </div>
        </div>
        <!-- /.col-->
    </div>
@endforeach

@push('script')
    <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            if ($(".ck_editor").length > 0) {
                tinymce.init({
                    selector: "textarea.ck_editor",
                    theme: "modern",
                    height: 300,
                    plugins: [
                        "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                        "save table contextmenu directionality emoticons template paste textcolor"
                    ],
                    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                    style_formats: [{
                            title: 'Bold text',
                            inline: 'b'
                        },
                        {
                            title: 'Red text',
                            inline: 'span',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Red header',
                            block: 'h1',
                            styles: {
                                color: '#ff0000'
                            }
                        },
                        {
                            title: 'Example 1',
                            inline: 'span',
                            classes: 'example1'
                        },
                        {
                            title: 'Example 2',
                            inline: 'span',
                            classes: 'example2'
                        },
                        {
                            title: 'Table styles'
                        },
                        {
                            title: 'Table row 1',
                            selector: 'tr',
                            classes: 'tablerow1'
                        }
                    ]
                });
            }
        });
    </script>
@endpush
