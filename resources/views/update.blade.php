@extends('layouts.profile')

@section('title', 'Добавить запись')

@section('content')
<div class="container">
	<div class="text-right my-3">
        <div class="title" contenteditable="true" style="text-align: center; background: #fff;">{{$post->title}}</div>
	</div>
    <div class="custom-file" style="margin-bottom: 15px;">
        <input type="file" class="custom-file-input cover" id="customFile">
        <label class="custom-file-label" for="customFile">{{$post->cover}}</label>
    </div>
    <select class="custom-select category" style="margin-bottom: 15px;">
        <option selected>Раздел</option>
        @foreach($categories as $category)
            <option value="{{$category->id}}" {{$category->id == $post->id_category ? 'selected' : ''}}>{{$category->title}}</option>
        @endforeach
    </select>
    <div class="tags-list" style="margin-bottom: 15px;">
        <h3>Выберите теги</h3>
        @foreach($tags as $tag)
            <span class="badge badge-light tag" style="cursor: pointer;" data-id="{{$tag->id}}">{{$tag->title}}</span>
        @endforeach
    </div>
  <div class="row align-items-center justify-content-center">
    <div class="col-md-12 col-lg-8">
			<div class="editor" id="editor-1" style="background: #fff;">
      <div class="toolbar">
        <a href="#" data-command='undo' data-toggle="tooltip" data-placement="top" title="Undo"><i class='fa fa-undo'></i></a>
        <a href="#" data-command='redo' data-toggle="tooltip" data-placement="top" title="Redo"><i class='fa fa-redo '></i></a>
				<a href="#" data-command='removeFormat' data-toggle="tooltip" data-placement="top" title="Clear format"><i class='fa fa-times '></i></a>
        <div class="fore-wrapper"><i class='fa fa-font' data-toggle="tooltip" data-placement="top" title="text color" style='color:#C96;'></i>
          <div class="fore-palette">
          </div>
        </div>
        <div class="back-wrapper"><i class='fa fa-font'  data-toggle="tooltip" data-placement="top" title="Background color" style='background:#C96;'></i>
          <div class="back-palette">
          </div>
        </div>
        <a href="#" data-command='bold' data-toggle="tooltip" data-placement="top" title="Bold"><i class='fa fa-bold'></i></a>
        <a href="#" data-command='italic' data-toggle="tooltip" data-placement="top" title="Italic"><i class='fa fa-italic'></i></a>
        <a href="#" data-command='underline' data-toggle="tooltip" data-placement="top" title="Underline"><i class='fa fa-underline'></i></a>
        <a href="#" data-command='strikeThrough' data-toggle="tooltip" data-placement="top" title="Stike through"><i class='fa fa-strikethrough'></i></a>
        <a href="#" data-command='justifyLeft' data-toggle="tooltip" data-placement="top" title="Left align"><i class='fa fa-align-left'></i></a>
        <a href="#" data-command='justifyCenter'><i class='fa fa-align-center' data-toggle="tooltip" data-placement="top" title="Center align"></i></a>
        <a href="#" data-command='justifyRight' data-toggle="tooltip" data-placement="top" title="Right align"><i class='fa fa-align-right'></i></a>
        <a href="#" data-command='justifyFull' data-toggle="tooltip" data-placement="top" title="Justify"><i class='fa fa-align-justify'></i></a>
        <a href="#" data-command='indent' data-toggle="tooltip" data-placement="top" title="Indent"><i class='fa fa-indent'></i></a>
        <a href="#" data-command='outdent'  data-toggle="tooltip" data-placement="top" title="Outdent"><i class='fa fa-outdent'></i></a>
        <a href="#" data-command='insertUnorderedList'  data-toggle="tooltip" data-placement="top" title="Unordered list"><i class='fa fa-list-ul'></i></a>
        <a href="#" data-command='insertOrderedList' data-toggle="tooltip" data-placement="top" title="Ordered list"><i class='fa fa-list-ol'></i></a>
        <a href="#" data-command='h1' data-toggle="tooltip" data-placement="top" title="H1">H1</a>
        <a href="#" data-command='h2'  data-toggle="tooltip" data-placement="top" title="H2">H2</a>
        <a href="#" data-command='createlink' data-toggle="tooltip" data-placement="top" title="Inser link"><i class='fa fa-link'></i></a>
        <a href="#" data-command='unlink' data-toggle="tooltip" data-placement="top" title="Unlink"><i class='fa fa-unlink'></i></a>
        <a href="#" class="img-load" data-toggle="tooltip" data-placement="top" title="Insert image"><i class='fa fa-image'></i></a>
        <a href="#" data-command='p' data-toggle="tooltip" data-placement="top" title="Paragraph">P</a>
        <a href="#" data-command='subscript' data-toggle="tooltip" data-placement="top" title="Subscript"><i class='fa fa-subscript'></i></a>
        <a href="#" data-command='superscript'  data-toggle="tooltip" data-placement="top" title="Superscript"><i class='fa fa-superscript'></i></a>
      </div>
      <div id='editor' class="editorAria" contenteditable>
        {!!$post->content!!}
      </div>
                </div>
                <div class="toolbar">
                    <div class="alert alert-success alert-save-post" role="alert" style="display: none;">
                        Запись изменена
                    </div>
                    <button class="btn btn-primary btn-change">Изменить</button>
                    <button class="btn btn-primary btn-save" data-type="view">Предпросмотр</button>
                </div>
    </div>
  </div>
</div>

<div class="modal">


    <div class="modal-content">
        <div class="modal-header">
            <span class="close">&times;</span>
        </div>
        <div class="modal-body">
            <div class="custom-file">
                <input type="file" class="custom-file-input image" id="customFile">
                <label class="custom-file-label" for="customFile">Картинка</label>
            </div>
        </div>
        <div class="modal-footer">
            <button class="btn btn-dark" style="margin: auto;">Загрузить</button>
        </div>
    </div>

</div>

{{@csrf_field()}}

<style>
    body {
    font-family: 'Open Sans';
    }

    a {
    cursor: pointer;
    }
    .editor
    {
        position:relative;
    }
    .editorAria {
    height:100%;
    min-height:400px;
    border:1px solid #ddd;
    overflow-y: auto;
    padding: 1em;
    margin-top: -2px;
    outline: none;
    }

    .toolbar {
        position:sticky;
        top:0;
        left:0;
        right:0;
        background-color:#fff;
        border:1px solid #ddd;
        padding:10px;
    }

    .toolbar a,
    .fore-wrapper,
    .back-wrapper {
    border: 1px solid #ddd;
    background: #FFF;
    font-family: 'Candal';
    color: #000;
    padding: 5px;
        margin: 2px 0px;
    width:35px;
        height:35px;
    display: inline-block;
        text-align:center;
    text-decoration: none;
    }

    .toolbar a:hover,
    .fore-wrapper:hover,
    .back-wrapper:hover {
    background: #0eacc6;
        color:#fff;
        border-color:#0eacc6;
    }

    a.palette-item {
        display:inline-block;
    height: 1.3em;
    width: 1.3em;
    margin: 0px 1px 1px;
        cursor:pointer;
    }
    a.palette-item[data-value="#FFFFFF"]{
        border:1px solid #ddd!important;
    }
    a.palette-item:hover {
    transform:scale(1.1);
    }
    .fore-wrapper,
    .back-wrapper
    {
        position:relative;
        cursor:auto;
    }
    .fore-palette,
    .back-palette {
    display: none;
        cursor:auto;
    }

    .fore-wrapper:hover .fore-palette,
    .back-wrapper:hover .back-palette {
        display:block;
    }

    .fore-wrapper .fore-palette,
    .back-wrapper .back-palette {
        position:relative;
    display: inline-block;
    cursor: auto;
    display: block;
        left:0;
        top:calc(100% + 5px);
    position: absolute;
    padding: 10px 5px;
    width: 160px;
    background: #FFF;
    box-shadow: 0 0 5px #CCC;
        display:none;
        text-align:left;
    }
    .fore-wrapper .fore-palette:after,
    .back-wrapper .back-palette:before
    {
        content:'';
        display:inline-block;
        position:absolute;
        top:-10px;
        left:10px;
        width:0;
        height:0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-bottom: 10px solid #fff;
    }
    .fore-palette a,
    .back-palette a {
    background: #FFF;
    margin-bottom: 2px;
        border:none;
    }
    .editor img
    {
        max-width:100%;
        object-fit:cover;
    }
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }


    .modal-content {
        position: relative;
        background-color: #fff;
        margin: auto;
        padding: 0;
        width: 50%;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
        -webkit-animation-name: animatetop;
        -webkit-animation-duration: 0.4s;
        animation-name: animatetop;
        animation-duration: 0.4s
    }


    @-webkit-keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }

    @keyframes animatetop {
        from {top:-300px; opacity:0}
        to {top:0; opacity:1}
    }


    .close {
        color: white;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    }

    .modal-header {
        padding: 2px 16px;
        background-color: #adaeff;
        color: white;
    }

    .modal-body {padding: 2px 16px;}

    .modal-footer {
        padding: 2px 16px;
        background-color: #adaeff;
        color: white;
    }

</style>
@endsection
