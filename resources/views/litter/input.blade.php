@extends('layouts.app')
<?php $pageTitle = ($litt->id) ? "Редактирование " . $litt->id : "Добавление" ?>
@section("title", $pageTitle . " -- раздела")
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
        <div class="col-11">
@if (session('status'))
<p>{{ session('status') }}</p>
@endif
        <h1>@if ($litt->id) Редактирование раздела {{ $litt->litter }}
            @else Добавление раздела 
            @endif
        </h1>
    <form action="{{ action('LitterController@save') }}" method="POST" enctype="multipart/form-data">
        @if ($litt->id)
        {{ method_field('PUT') }}
        <input type="hidden" name="id" value="{{ old('id', $litt->id) }}">
        @endif
        {{ csrf_field() }}
        <div class="form-group">
            <label for="litter" class="col-md-4 control-label">Название помёта:</label>
            <input id="litter" type="text" placeholder="Название помёта" class="form-control" name="litter" value="{{ old('litter', $litt->litter) }}" required>                
        </div>
        <div class="form-group">
            <label for="descrp" class="col-md-4 control-label">Описание помёта:</label>
            <textarea id="editor" class="form-control" name="descrp">{!! html_entity_decode(old('descrp', $litt->descrp))!!}</textarea>
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
            <label for="idDog1" class="col-md-4 control-label">Собака 1:</label>
            <select class="form-control" id="idDog1" name="idDog1" required>
            @foreach ($dog as $dogs)
                <option  <?php if ($litt->idDog1 == $dogs->id_dogs) { ?>
                selected <?php } ?> value="{{ $dogs->id_dogs }}">{{ $dogs->name }}</option>
            @endforeach
            </select>
            <label for="photo1" class="col-md-4 control-label">Изображение собаки 1:</label>
            @if ($litt->id)
            <img class="img-thumbnail w-100-p" src="<?php public_path();?>/{{ $litt->photo1 }}" alt="{{ $litt->photo1 }}">
            <br />
            <input class="switch-input" id="pr1" type="checkbox" name="sw1" onchange='addName("pr1", "photo1");' value="dog1">
            Будем менять картинку собаки1?<br />
            <input style="display:none" id="photo1" type="file" class="form-control" name="photo1">
            @else
            <input id="photo1" type="file" class="form-control" name="photo1">
            @endif
        </div>
        <div class="form-group">
            <label for="idDog2" class="col-md-4 control-label">Собака 2:</label>
            <select class="form-control" id="idDog2" name="idDog2" required>
            @foreach ($dog as $dogs)
                <option <?php if ($litt->idDog2 == $dogs->id_dogs) { ?>
                selected <?php } ?> value="{{ $dogs->id_dogs }}">{{ $dogs->name }}</option>
            @endforeach
            </select>        
            <label for="photo2" class="col-md-4 control-label">Изображение собаки 2:</label>
            @if ($litt->id)
            <img class="img-thumbnail w-100-p" src="<?php public_path();?>/{{ $litt->photo2 }}" alt="{{ $litt->photo2 }}">
            <br />
            <input class="switch-input" id="pr2" type="checkbox" name="sw2" onchange='addName("pr2", "photo2");' value="dog2">
            Будем менять картинку собаки2?<br />
            <input style="display:none" id="photo2" type="file" class="form-control" name="photo2">
            @else
            <input id="photo2" type="file" class="form-control" name="photo2">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Сохранить</button>
        <a href="#" class="btn btn-secondary" onClick="window.location.href=window.location.href">Отмена</a>
        </form>
        </div>
    </div>
</div>
@endsection
