@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')
@section('lang', request()->lang)

@section('content')
    <div class="main-news">
        <div class="container">
            <h5 class="title-head">Новости</h5>
            <div class="main-news-slider">
                @foreach($news as $newsItem)
                    <div class="main-news-item">
                        <a href="#">
                            <div class="main-news-item-image" style="background-image: url(https://www.tajembassy.ru/images/demo/gallery/gallery2.jpg);"></div>
                            <p>{{ $newsItem->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="main-form main-form-avia">
        <div class="container">
            <div class="main-form-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h2 class="title-head title-head-white">Ищете авиабилет без переплат?</h2>
                        <p>У нас вы также можете купить дешевые авиабилеты</p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a class="btn btn-primary btn-white">Купить билет</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-sim">
        <div class="container">
            <h5 class="title-head">SIM-карты</h5>
            <div class="main-sim-slider">
                <div class="main-sim-item main-sim-item-beeline">
                    <p>Тариф от Билайн</p>
                    <ul>
                        <li>100 мин</li>
                        <li>10 Гб</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">Заказать</button>
                </div>
                <div class="main-sim-item main-sim-item-mts">
                    <p>Тариф от МТС</p>
                    <ul>
                        <li>100 мин</li>
                        <li>10 Гб</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">Заказать</button>
                </div>
                <div class="main-sim-item main-sim-item-megafon">
                    <p>Тариф от Мегафон</p>
                    <ul>
                        <li>100 мин</li>
                        <li>10 Гб</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">Заказать</button>
                </div>
                <div class="main-sim-item main-sim-item-tele2">
                    <p>Тариф от Теле2</p>
                    <ul>
                        <li>100 мин</li>
                        <li>10 Гб</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">Заказать</button>
                </div>
            </div>
        </div>
    </div>

    <div class="main-form">
        <div class="container">
            <div class="main-form-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h2 class="title-head title-head-white">Хотите красивый номер?</h2>
                        <p>У нас вы можете приобрести красивый номер телефона</p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a class="btn btn-primary btn-white">Выбрать номер</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-bank-card">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h5 class="title-head">Банковская карта</h5>
                    
                    <ul>
                        <li>Российская дебетовая карта VISA специально для иностранных граждан.</li>
                        <li>Льготная комиссия на международные переводы - всего 1,15%.</li>
                        <li>Доставка карты бесплатно.</li>
                    </ul>
                    
                    <p>Оформите заявку на получение банковской карты российского банка.</p>
                    <div class="main-bank-card-form">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label>Имя</label>
                                <input type="text" class="form-control" placeholder="Как вас зовут">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label>Телефон</label>
                                <input type="text" class="form-control" placeholder="Ваш номер телефона">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Согласен с обработкой персональных данных
                            </label>
                        </div>
                        <button class="btn btn-primary">Оформить</button>
                    </div>
                </div>
                <div class="col-12 col-lg-5">
                    <img src="img/cards.png" alt="Банковская карта">
                </div>
            </div>
        </div>
    </div>

    <div class="main-loan">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <img src="img/rub.png" alt="Денежный займ">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="main-loan-info">
                        <h5 class="title-head">Денежный займ</h5>

                        <ul>
                            <li>Займы на любые цели специально для иностранных граждан</li>
                            <li>Деньги зачисляются онлайн на карту любого российского банка</li>
                            <li>Займ предоставляется микрофинансовой организацией «Азия Кредит»</li>
                        </ul>

                        <p>Оформите заявку на получение денежного займа до 30 000 руб.</p>
                        <div class="main-loan-form">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label>Имя</label>
                                    <input type="text" class="form-control" placeholder="Как вас зовут">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>Телефон</label>
                                    <input type="text" class="form-control" placeholder="Ваш номер телефона">
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Согласен с обработкой персональных данных
                                </label>
                            </div>
                            <button class="btn btn-primary">Оформить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <h5 class="title-head">О компании</h5>
                    <p>Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>
                    <p>В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов.</p>
                    <p>Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн.</p>
                </div>
                <!-- <div class="col-12 col-lg-6">
                    <div class="main-about-form">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label class="form-label">Имя</label>
                                <input type="text" class="form-control" placeholder="Как вас зовут">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label class="form-label">Телефон</label>
                                <input type="text" class="form-control" placeholder="Ваш номер телефона">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label>Сообщение</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Согласен с обработкой персональных данных
                            </label>
                        </div>
                        <button class="btn btn-primary">Отправить</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var newsSlider = document.querySelector('.main-news-slider');

        if(matchMedia('(min-width: 992px)').matches ) {
            var flkty = new Flickity(newsSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 4,
                pageDots: false
            })
        } else {
            var flkty = new Flickity(newsSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 1,
                pageDots: false
            })
        }

        var simSlider = document.querySelector('.main-sim-slider');

        if(matchMedia('(min-width: 992px)').matches ) {
            var flkty = new Flickity(simSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 4,
                pageDots: false,
                prevNextButtons: false,
            })
        } else {
            var flkty = new Flickity(simSlider, {
                cellAlign: 'left',
                contain: true,
                groupCells: 1,
                pageDots: false
            })
        }
    </script>
@endsection