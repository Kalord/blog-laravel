@extends('layouts.profile')

@section('title', 'Добавить запись')

@section('content')
<div class="container">
	<div class="text-right my-3">
		<!--<button class="btn btn-info" id="getHTML" get-data="editor-1">Get HTML</button>-->
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
        <a href="#" data-command='insertimage' data-toggle="tooltip" data-placement="top" title="Insert image"><i class='fa fa-image'></i></a>
        <a href="#" data-command='p' data-toggle="tooltip" data-placement="top" title="Paragraph">P</a>
        <a href="#" data-command='subscript' data-toggle="tooltip" data-placement="top" title="Subscript"><i class='fa fa-subscript'></i></a>
        <a href="#" data-command='superscript'  data-toggle="tooltip" data-placement="top" title="Superscript"><i class='fa fa-superscript'></i></a>
      </div>
      <div id='editor' class="editorAria" contenteditable>
        <h1>Rich Text Editor.</h1>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
				<img src="https://images.pexels.com/photos/2067423/pexels-photo-2067423.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500">
      </div>
                </div>
                <div class="toolbar">
                <button class="btn btn-primary publish">Опубликовать</button>
                <button class="btn btn-primary draft">Добавить в черновик</button>
                <button class="btn btn-primary view">Предпросмотр</button>
                </div>
    </div>
  </div>
</div>

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
    
</style>
@endsection