@extends('layouts.profile')

@section('title', 'Личный кабинет')


@section('content')

<!-- header section -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<img src="{{ $user->avatar }}" class="img-responsive img-circle tm-border avatar" alt="templatemo easy profile" style="width: 300px">
				<hr>
				<h1 class="tm-title bold shadow">{{ $user->name }}</h1>
				<h1 class="white bold shadow" contenteditable="true">{{ $user->info()->status }}</h1>
			</div>
		</div>
	</div>
</header>

<!-- about and skills section -->
<section class="container">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="about">
				<h3 class="accent">Профиль</h3>
				@if($user->id == Auth()->id())
				<h2>Настройки</h2>
				<h5>Приватность</h5>
				<p>
					<div class="input-group">
						<select class="custom-select" id="inputGroupSelect04">
							<option selected>Отображать возраст?</option>
							<option value="1">Да</option>
							<option value="2">Нет</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button">Save</button>
						</div>
					</div>
					<div class="input-group" style="margin-top: 3px;">
						<select class="custom-select" id="inputGroupSelect04">
							<option selected>Отображать вес?</option>
							<option value="1">Да</option>
							<option value="2">Нет</option>
						</select>
						<div class="input-group-append">
							<button class="btn btn-outline-secondary" type="button">Save</button>
						</div>
					</div>

					<br>
					<br>

					<h5>Пароль</h5>

					<div class="input-group mb-3" style="margin-top: 3px;">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Старый пароль</span>
						</div>
						<input type="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<div class="input-group mb-3" style="margin-top: -10px;">
						<div class="input-group-prepend">
							<span class="input-group-text" id="basic-addon1">Новый пароль</span>
						</div>
						<input type="password" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
					</div>

					<button class="btn btn-primary">Изменить</button>
				</p>
				@else
				<h2>Состояние</h2>
				<p>
					Возраст: 20 лет<br>
					Вес: 65 килограмм<br>
					Правильно питается: n дней<br>
					Написал рецептов: n<br>
					Написал советов: n<br>
					Получил лайков: n<br>
				</p>
				@endif
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="skills">
				<h2 class="white">Звезды</h2>
				<strong>5</strong>
				<span class="pull-right">70%</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
				</div>
				<strong>4</strong>
				<span class="pull-right">85%</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
				</div>
				<strong>3</strong>
				<span class="pull-right">95%</span>
				<div class="progress">
					<div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- education and languages -->
<section class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="education">
				<h2 class="white">Советы</h2>
				<div class="education-content" style="border: 3px solid #17a2b8; padding: 12px; border-radius: 15px;">
					<h4 class="education-title accent">New Web Design</h4>
					<div class="education-school">
						<img src="https://picsum.photos/1024/768" style="width: 100%;">
					</div>
					<p class="education-description">In lacinia leo sed quam feugiat, ac efficitur dui tristique. Ut venenatis, odio quis cursus egestas, nulla sem volutpat diam, ac dapibus nisl ipsum ut ipsum. Nunc tincidunt libero non magna placerat elementum.</p>
					<a class="btn btn-info">Читать полностью</a>
				</div>

				<br>

				<a class="btn btn-success">Больше</a>
			</div>
		</div>
	</div>
</section>

<!-- contact and experience -->
<section class="container">
	<div class="row">
		<div class="col-md-8 col-sm-12">
			<div class="education">
				<h2 class="white">Рецепт</h2>
				<div class="education-content" style="border: 3px solid #17a2b8; padding: 12px; border-radius: 15px;">
					<h4 class="education-title accent">New Web Design</h4>
					<div class="education-school">
						<img src="https://picsum.photos/1024/768" style="width: 100%;">
					</div>
					<p class="education-description">In lacinia leo sed quam feugiat, ac efficitur dui tristique. Ut venenatis, odio quis cursus egestas, nulla sem volutpat diam, ac dapibus nisl ipsum ut ipsum. Nunc tincidunt libero non magna placerat elementum.</p>
					<a class="btn btn-info">Читать полностью</a>
				</div>

				<br>

				<a class="btn btn-success">Больше</a>
			</div>
		</div>
	</div>
</section>

<br>

@endsection