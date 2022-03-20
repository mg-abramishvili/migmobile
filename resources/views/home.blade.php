@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')
@section('lang', request()->lang)

@section('content')
    <div class="main-news">
        <div class="container">
            <h5 class="title-head">
                @if(request()->lang == 'uz')
                    Янгиликлар
                @elseif(request()->lang == 'tj')
                    Хабарҳо
                @else
                    Новости
                @endif
            </h5>
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
                        <h2 class="title-head title-head-white">
                            @if(request()->lang == 'uz')
                                Ортиқча тўловсиз авиачипта қидиряпсизми?
                            @elseif(request()->lang == 'tj')
                                Чиптаи ҳавопайморо бидуни пардохти изофагӣ меҷуед?
                            @else
                                Ищете авиабилет без переплат?
                            @endif
                        </h2>
                        <p>
                            @if(request()->lang == 'uz')
                                Бизда сиз арзон авиачипталарни сотиб олишингиз мумкин
                            @elseif(request()->lang == 'tj')
                                Шумо хамчунин метавонед аз мо чиптаҳои арзон харед
                            @else
                                У нас вы также можете купить дешевые авиабилеты
                            @endif
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a class="btn btn-primary btn-white">
                            @if(request()->lang == 'uz')
                                Чипта сотиб олиш
                            @elseif(request()->lang == 'tj')
                                Хариди чипта
                            @else
                                Купить билет
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-sim">
        <div class="container">
            <h5 class="title-head">
                @if(request()->lang == 'uz')
                    SIM-карталар
                @elseif(request()->lang == 'tj')
                    SIM-кортҳо
                @else
                    SIM-карты
                @endif
            </h5>
            <div class="main-sim-slider">
                <div class="main-sim-item main-sim-item-beeline">
                    <p>
                        @if(request()->lang == 'uz')
                            Билайн-дан тариф
                        @elseif(request()->lang == 'tj')
                            Тарофа аз Билайн
                        @else
                            Тариф от Билайн
                        @endif
                    </p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">
                        @if(request()->lang == 'uz')
                            Буюртма бериш
                        @elseif(request()->lang == 'tj')
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-mts">
                    <p>
                        @if(request()->lang == 'uz')
                            МТС-дан тариф
                        @elseif(request()->lang == 'tj')
                            Тарофа аз МТС
                        @else
                            Тариф от МТС
                        @endif
                    </p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">
                        @if(request()->lang == 'uz')
                            Буюртма бериш
                        @elseif(request()->lang == 'tj')
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-megafon">
                    <p>
                        @if(request()->lang == 'uz')
                            Мегафон-дан тариф
                        @elseif(request()->lang == 'tj')
                            Тарофа аз Мегафон
                        @else
                            Тариф от Мегафон
                        @endif
                    </p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">
                        @if(request()->lang == 'uz')
                            Буюртма бериш
                        @elseif(request()->lang == 'tj')
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-tele2">
                    <p>
                        @if(request()->lang == 'uz')
                            Теле2-дан тариф
                        @elseif(request()->lang == 'tj')
                            Тарофа аз Теле2
                        @else
                            Тариф от Теле2
                        @endif
                    </p>
                    <ul>
                        <li>100 MIN</li>
                        <li>10 GB</li>
                        <li>30 дней</li>
                    </ul>
                    <button class="btn btn-primary">
                        @if(request()->lang == 'uz')
                            Буюртма бериш
                        @elseif(request()->lang == 'tj')
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="main-form">
        <div class="container">
            <div class="main-form-inner">
                <div class="row align-items-center">
                    <div class="col-12 col-lg-8">
                        <h2 class="title-head title-head-white">
                            @if(request()->lang == 'uz')
                                Чиройли рақам истайсизми?
                            @elseif(request()->lang == 'tj')
                                Мехоҳед рақами зебо дошта бошед?
                            @else
                                Хотите красивый номер?
                            @endif
                        </h2>
                        <p>
                            @if(request()->lang == 'uz')
                                Бизда сиз чиройли телефон рақамини сотиб олишингиз мумкин
                            @elseif(request()->lang == 'tj')
                                Шумо метавонед рақами телефони зебо аз мо харед
                            @else
                                У нас вы можете приобрести красивый номер телефона
                            @endif
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a class="btn btn-primary btn-white">
                            @if(request()->lang == 'uz')
                                Рақамни танлаш
                            @elseif(request()->lang == 'tj')
                                Интихоб намудани рақам
                            @else
                                Выбрать номер
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-bank-card">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h5 class="title-head">
                        @if(request()->lang == 'uz')
                            Банк картаси
                        @elseif(request()->lang == 'tj')
                            Корти бонкӣ
                        @else
                            Банковская карта
                        @endif
                    </h5>
                    
                    <ul>
                        <li>
                            @if(request()->lang == 'uz')
                                Россия VISA дебет картаси махсус чет эл фуқаролари учун.
                            @elseif(request()->lang == 'tj')
                                Корти дебетии русӣ VISA махсусан барои шаҳрвандони хориҷӣ.
                            @else
                                Российская дебетовая карта VISA специально для иностранных граждан.
                            @endif
                        </li>
                        <li>
                            @if(request()->lang == 'uz')
                                Халқаро ўтказмалари учун имтиёзли комиссия – фақат 1,15%.
                            @elseif(request()->lang == 'tj')
                                Комиссияи имтиёзнок барои интиқолҳои байналмилалӣ - ҳамагӣ 1,15%.
                            @else
                                Льготная комиссия на международные переводы - всего 1,15%.
                            @endif
                        </li>
                        <li>
                            @if(request()->lang == 'uz')
                                Картани етказиб бериш бепул.
                            @elseif(request()->lang == 'tj')
                                Расонидани корт ройгон аст.
                            @else
                                Доставка карты бесплатно.
                            @endif
                        </li>
                    </ul>
                    
                    <p>
                        @if(request()->lang == 'uz')
                            Россия банкининг банк картасини олиш учун ариза беринг.
                        @elseif(request()->lang == 'tj')
                            Барои гирифтани корти бонкии бонки Россия дархост пешниҳод кунед.
                        @else
                            Оформите заявку на получение банковской карты российского банка.
                        @endif
                    </p>
                    <div class="main-bank-card-form">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <label>
                                    @if(request()->lang == 'uz')
                                        Исм
                                    @elseif(request()->lang == 'tj')
                                        Ном
                                    @else
                                        Имя
                                    @endif
                                </label>
                                <input type="text" class="form-control" placeholder="
                                    @if(request()->lang == 'uz')
                                        Сизнинг исмингиз нима?
                                    @elseif(request()->lang == 'tj')
                                        Номи Шумо чист
                                    @else
                                        Как вас зовут
                                    @endif
                                ">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label>
                                    @if(request()->lang == 'uz')
                                        Телефон
                                    @elseif(request()->lang == 'tj')
                                        Телефон
                                    @else
                                        Телефон
                                    @endif
                                </label>
                                <input type="text" class="form-control" placeholder="
                                    @if(request()->lang == 'uz')
                                        Ваш номер телефона
                                    @elseif(request()->lang == 'tj')
                                        Сизнинг телефон рақамингиз
                                    @else
                                        Рақами телефони Шумо
                                    @endif
                                ">
                            </div>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                @if(request()->lang == 'uz')
                                    Шахсий маълумотларни қайта ишлашга розиман
                                @elseif(request()->lang == 'tj')
                                    Ман барои коркарди маълумоти шахсӣ розӣ ҳастам
                                @else
                                    Согласен с обработкой персональных данных
                                @endif
                            </label>
                        </div>
                        <button class="btn btn-primary">
                            @if(request()->lang == 'uz')
                                Расмийлаштириш
                            @elseif(request()->lang == 'tj')
                                Дархост намудан
                            @else
                                Оформить
                            @endif
                        </button>
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
                        <h5 class="title-head">
                            @if(request()->lang == 'uz')
                                Қарзга пул
                            @elseif(request()->lang == 'tj')
                                Қарзи пулӣ
                            @else
                                Денежный займ
                            @endif
                        </h5>

                        <ul>
                            <li>
                                @if(request()->lang == 'uz')
                                    Ҳар қандай мақсадлар учун қарзга пул махсус чет эл фуқаролари учун
                                @elseif(request()->lang == 'tj')
                                    Қарзҳо барои ҳама гуна мақсад махсус барои шаҳрвандони хориҷӣ
                                @else
                                    Займы на любые цели специально для иностранных граждан
                                @endif
                            </li>
                            <li>
                                @if(request()->lang == 'uz')
                                    Пул ҳар қандай Россия банкининг картасига ўтказилади
                                @elseif(request()->lang == 'tj')
                                    Маблағ ба дилхоҳ корти бонки Россия онлайн пардохт карда мешавад
                                @else
                                    Деньги зачисляются онлайн на карту любого российского банка
                                @endif
                            </li>
                            <li>
                                @if(request()->lang == 'uz')
                                    Қарз «Азия Кредит» микрофинанс ташқилоти томонидан такдим этилади
                                @elseif(request()->lang == 'tj')
                                    Қарз аз ҷониби ташкилоти маблағгузории хурди «Азия Кредит» дода мешавад.
                                @else
                                    Займ предоставляется микрофинансовой организацией «Азия Кредит»
                                @endif
                            </li>
                        </ul>

                        <p>
                            @if(request()->lang == 'uz')
                                30 минг рублгача қарзга пул олиш учун ариза беринг
                            @elseif(request()->lang == 'tj')
                                Барои гирифтани қарзи нақдӣ то 30 ҳазор рубл муроҷиат намоед.
                            @else
                                Оформите заявку на получение денежного займа до 30 000 руб.
                            @endif
                        </p>
                        <div class="main-loan-form">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <label>
                                        @if(request()->lang == 'uz')
                                            Исм
                                        @elseif(request()->lang == 'tj')
                                            Ном
                                        @else
                                            Имя
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" placeholder="
                                        @if(request()->lang == 'uz')
                                            Сизнинг исмингиз нима?
                                        @elseif(request()->lang == 'tj')
                                            Номи Шумо чист
                                        @else
                                            Как вас зовут
                                        @endif
                                    ">
                                </div>
                                <div class="col-12 col-lg-6">
                                    <label>
                                        @if(request()->lang == 'uz')
                                            Телефон
                                        @elseif(request()->lang == 'tj')
                                            Телефон
                                        @else
                                            Телефон
                                        @endif
                                    </label>
                                    <input type="text" class="form-control" placeholder="
                                        @if(request()->lang == 'uz')
                                            Ваш номер телефона
                                        @elseif(request()->lang == 'tj')
                                            Сизнинг телефон рақамингиз
                                        @else
                                            Рақами телефони Шумо
                                        @endif
                                    ">
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    @if(request()->lang == 'uz')
                                        Шахсий маълумотларни қайта ишлашга розиман
                                    @elseif(request()->lang == 'tj')
                                        Ман барои коркарди маълумоти шахсӣ розӣ ҳастам
                                    @else
                                        Согласен с обработкой персональных данных
                                    @endif
                                </label>
                            </div>
                            <button class="btn btn-primary">
                                @if(request()->lang == 'uz')
                                    Расмийлаштириш
                                @elseif(request()->lang == 'tj')
                                    Дархост намудан
                                @else
                                    Оформить
                                @endif
                            </button>
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
                    <h5 class="title-head">
                        @if(request()->lang == 'uz')
                            Компания хақида
                        @elseif(request()->lang == 'tj')
                            Дар бораи ширкат
                        @else
                            О компании
                        @endif
                    </h5>
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