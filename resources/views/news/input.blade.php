@extends('layouts.app')
<?php $h = ($nes->id) ? $nes->title : "Добавление" ?>
@section("title", $h . " - Новости")
@section("main")
@push("head")
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
type="text/javascript" charset="utf-8" ></script>
@endpush
<div class="container top60">
    <div class="row">
        <div class="col-12">
                    <h1>@if ($nes->id) Правка новости {{ $nes->title }}
                        @else Добавление новости 
                        @endif</h1>
            
                            @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                        </ul>
                    </div>
                @endif
                @if (session('status'))
                <p>{{ session('status') }}</p>
                @endif
                
                <form action="{{ action('NewsController@save') }}" method="POST" enctype="multipart/form-data">
                    @if ($nes->id)
                    {{ method_field('PUT') }}                
                <input type="hidden" name="id" value="{{ old('id', $nes->id) }}">
                @endif
                <input type="hidden" name="author" value="MaryDance">
                    <?php ($nes->id) ? $dateN = ($nes->date) : $dateN = (date("Y-m-d"));?>
                <input type="hidden" name="date" value=<?php echo "'".$dateN."'";?> />
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="col-md-4 control-label">Заголовок новости:</label>
                    <input id="title" type="text" class="form-control" name="title" value="{{ old('title', $nes->title) }}" required>
                </div>
                <div class="form-group">
                    <label for="text" class="col-md-4 control-label">Текст новости:</label>
                    <textarea maxlength="2000" id="editor" class="form-control" name="text" required>{!! html_entity_decode (old('text', $nes->text))!!}</textarea>
<script>
    CKEDITOR.addCss('.cke_editable { font-size: 15px; padding: 2em; }');

    CKEDITOR.replace('editor', {
      toolbar: [{
          name: 'document',
          items: ['Print']
        },
        {
          name: 'clipboard',
          items: ['Undo', 'Redo']
        },
        {
          name: 'styles',
          items: ['Format', 'Font', 'FontSize']
        },
        {
          name: 'colors',
          items: ['TextColor', 'BGColor']
        },
        {
          name: 'align',
          items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']
        },
        '/',
        {
          name: 'basicstyles',
          items: ['Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'CopyFormatting']
        },
        {
          name: 'links',
          items: ['Link', 'Unlink']
        },
        {
          name: 'paragraph',
          items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
        },
        {
          name: 'insert',
          items: [/*'Image', */'Table']
        },
        {
          name: 'tools',
          items: ['Maximize']
        },
        {
          name: 'editing',
          items: ['Scayt']
        }
      ],

      extraAllowedContent: 'h3{clear};h2{line-height};h2 h3{margin-left,margin-top}',

      // Adding drag and drop image upload.
      extraPlugins: 'print,format,font,colorbutton,justify',/*uploadimage',*/
      uploadUrl: '/apps/ckfinder/3.4.4/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '/apps/ckfinder/3.4.4/ckfinder.html',
      filebrowserImageBrowseUrl: '/apps/ckfinder/3.4.4/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/apps/ckfinder/3.4.4/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/apps/ckfinder/3.4.4/core/connector/php/connector.php?command=QuickUpload&type=Images',
    
      height: 560,

      removeDialogTabs: 'image:advanced;link:advanced'
    });
  </script>
                </div>
                <div class="form-group">
                    <label for="photo" class="col-md-4 control-label">Фотки:</label>
                    <input id="photo" type="file" class="form-control" name="photo">
                </div>
                    <div class="col-md-8 col-md-offset-4">
                        <button type="submit" class="btn btn-primary">
                            Сохранить
                        </button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endsection
