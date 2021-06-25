@extends('layouts.app')
    <?php $pageTitle = ($content->id) ? "Редактирование " . $content->id : "Добавление" ?>
@section("title", $pageTitle . " - раздела")
@section("main")
@push("head")
<script src="{{ asset('/js/ckeditor/ckeditor.js') }}"
type="text/javascript" charset="utf-8" ></script>
<script>
      function addName(cb, mat) {
    cb = document.getElementById(cb);
	mat = document.getElementById(mat);
    if (cb.checked) {
		mat.setAttribute('style', 'display:block');
	} else {
		mat.setAttribute('style', 'display:none');
	}
  }
</script>
@endpush
<div class="container top60">
    <div class="row">
        <div class="col-sm-9">
        <h1>@if ($content->id) Редактирование раздела {{ $content->title }}
            @else Добавление раздела 
            @endif
        </h1>
    <form action="{{ action('MainController@save') }}" method="POST" enctype="multipart/form-data">
        @if ($content->id)
        {{ method_field('PUT') }}                
        <input type="hidden" name="id" value="{{ old('id', $content->id) }}">
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title" class="col-md-4 control-label">Заголовок раздела:</label>
            <input id="title" type="text" placeholder="Название заголовка" class="form-control" name="title" value="{{ old('title', $content->title) }}" required>
                
        </div>
        <div class="form-group">
            <label for="text" class="col-md-4 control-label">Основной текст раздела:</label>
            <textarea maxlength="1000000" id="editor" class="form-control" name="pageContent" required>{!! html_entity_decode(old('pageContent', $content->pageContent))!!}</textarea>
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
        <div class="switch alert">
            <input class="switch-input" id="pr1" type="checkbox" name="modelSwitch" onchange='addName("pr1", "hidepr1");' value="Будем менять картинку слайда?">
            
            <label class="switch-paddle" for="pr1">
                @if ($content->id)
                Будем менять картинку слайда?
                @else
                Будем добавлять картинку слайда?
                @endif
            </label>
        </div>
        <div class="form-group" id="hidepr1" style="display:none">
                <label for="photo" class="col-md-4 control-label">Изображение:</label>
                <input id="photo" type="file" class="form-control" name="photo">
        </div>
                <button type="submit" class="btn btn-primary">
                    Сохранить
                </button>
        </form>
        </div>
        @if ($content->photo)
        <div class="col-sm-3">
            <p>
            <img class="img-thumbnail" src="{{ asset($content->photo) }}">
            </p>
        </div>
        @endif
    </div>
</div>
@endsection
