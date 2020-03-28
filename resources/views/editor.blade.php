@extends('layouts.profile')

@section('title', 'Редактор статей')

@section('content')
<table class="table editor-index">
    <thead>
        <span>Всего просмотров: {{$allViews}}</span>
        <tr>
            <th>Название</th>
            <th>Категория</th>
            <th>Просмотры</th>
            <th>Действие</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="table-body">

    </tbody>
</table>
<style>
body {
  font-family: "Roboto", sans-serif;
}
.table {
  width: 100%;
  border-spacing: 0;
  text-align: left;
  background: #fff;
}
.table th {
  font-weight: 300;
  font-size: 16px;
  color: #fff;
  line-height: 26px;
  padding: 18px 30px;
}
.table thead tr {
  background: #2b2d32;
}
.table td {
  padding: 30px 30px 31px;
  font-weight: 300;
  font-size: 16px;
  color: black-2;
  line-height: 26px;
  text-transform: uppercase;
}
.table tbody tr:nth-child(odd) {
  background: $white;
}
.table tbody tr:nth-child(even) {
  background: $f8fbfc;
}
.table__wrapper {
  padding-top: 40px;
}
.btn {
  display: inline-block;
  font-weight: 700;
  font-size: 15px;
  line-height: 25px;
  text-transform: uppercase;
  width: 170px;
  text-align: center;
  padding: 10px;
  border-radius: 3px;
  transition: background 0.3s ease;
  text-decoration: none;
}
.btn:hover {
  color: $white;
}
.btn__active {
  color: #4ed99c;
  border: 2px solid #4ed99c;
}
.btn__active:hover {
  background: #4ed99c;
}
.btn__pledged {
  color: #f14044;
  border: 2px solid #f14044;
}
.btn__pledged:hover {
  background: #f14044;
}
@media (max-width: 768px) {
  .table td {
    display: block;
    text-align: right;
  }
  .table td:before {
    content: attr(data-label);
    float: left;
    text-transform: uppercase;
    font-weight: bold;
  }
  .table thead display none tr {
    margin-bottom: 30px;
    display: block;
  }
}
</style>
@endsection
