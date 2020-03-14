@extends('layouts.profile')

@section('title', 'Личный кабинет')


@section('content')

<!-- header section -->
<header>
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<img src="/images/tm-easy-profile.jpg" class="img-responsive img-circle tm-border" alt="templatemo easy profile">
				<hr>
				<h1 class="tm-title bold shadow">{{ $user->name }}</h1>
				<h1 class="white bold shadow" style="font-family: Arial">Статус</h1>
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
				<h2>Состояние</h2>
				<p>
					Возраст: 20 лет<br>
					Вес: 65 килограмм<br>
					Правильно питается: n дней<br>
					Написал рецептов: n<br>
					Написал советов: n<br>
					Получил лайков: n<br>
				</p>
			</div>
		</div>
		<div class="col-md-6 col-sm-12">
			<div class="skills">
				<h2 class="white">Звезды</h2>
				<strong>5</strong>
				<span class="pull-right">70%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;"></div>
					</div>
				<strong>4</strong>
				<span class="pull-right">85%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="width: 85%;"></div>
					</div>
				<strong>3</strong>
				<span class="pull-right">95%</span>
					<div class="progress">
						<div class="progress-bar progress-bar-primary" role="progressbar" 
                        aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;"></div>
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