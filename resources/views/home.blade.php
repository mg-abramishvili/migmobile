@extends('layouts.front')
@section('title', 'Migrant Mobile')
@section('description', 'Migrant Mobile')

@section('content')
    <div class="main-news" id="news">
        <div class="container">
            <h5 class="title-head">
                @if(Route::is('homeUz'))
                    Янгиликлар
                @elseif(Route::is('homeTj'))
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
                            @if(Route::is('homeRu'))
                                Ищете авиабилет без переплат?
                            @elseif(Route::is('homeUz'))
                                Ортиқча тўловсиз авиачипта қидиряпсизми?
                            @elseif(Route::is('homeTj'))
                                Чиптаи ҳавопайморо бидуни пардохти изофагӣ меҷуед?
                            @endif
                        </h2>
                        <p>
                            @if(Route::is('homeUz'))
                                Бизда сиз арзон авиачипталарни сотиб олишингиз мумкин
                            @elseif(Route::is('homeTj'))
                                Шумо хамчунин метавонед аз мо чиптаҳои арзон харед
                            @else
                                У нас вы также можете купить дешевые авиабилеты
                            @endif
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a
                        @if(Route::is('homeRu'))
                            href="{{ route('aviaRu') }}"
                        @elseif(Route::is('homeUz'))
                            href="{{ route('aviaUz') }}"
                        @elseif(Route::is('homeTj'))
                            href="{{ route('aviaTj') }}"
                        @endif
                        class="btn btn-primary btn-white">
                            @if(Route::is('homeUz'))
                                Чипта сотиб олиш
                            @elseif(Route::is('homeTj'))
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

    <div class="main-sim" id="sim">
        <div class="container">
            <h5 class="title-head">
                @if(Route::is('homeUz'))
                    SIM-карталар
                @elseif(Route::is('homeTj'))
                    SIM-кортҳо
                @else
                    SIM-карты
                @endif
            </h5>
            <div class="main-sim-slider">
                <div class="main-sim-item main-sim-item-beeline">
                    <p>
                        @if(Route::is('homeUz'))
                            Билайн-дан тариф
                        @elseif(Route::is('homeTj'))
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
                        @if(Route::is('homeUz'))
                            Буюртма бериш
                        @elseif(Route::is('homeTj'))
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-mts">
                    <p>
                        @if(Route::is('homeUz'))
                            МТС-дан тариф
                        @elseif(Route::is('homeTj'))
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
                        @if(Route::is('homeUz'))
                            Буюртма бериш
                        @elseif(Route::is('homeTj'))
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-megafon">
                    <p>
                        @if(Route::is('homeUz'))
                            Мегафон-дан тариф
                        @elseif(Route::is('homeTj'))
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
                        @if(Route::is('homeUz'))
                            Буюртма бериш
                        @elseif(Route::is('homeTj'))
                            Фармоиш додан
                        @else
                            Заказать
                        @endif
                    </button>
                </div>
                <div class="main-sim-item main-sim-item-tele2">
                    <p>
                        @if(Route::is('homeUz'))
                            Теле2-дан тариф
                        @elseif(Route::is('homeTj'))
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
                        @if(Route::is('homeUz'))
                            Буюртма бериш
                        @elseif(Route::is('homeTj'))
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
                            @if(Route::is('homeUz'))
                                Чиройли рақам истайсизми?
                            @elseif(Route::is('homeTj'))
                                Мехоҳед рақами зебо дошта бошед?
                            @else
                                Хотите красивый номер?
                            @endif
                        </h2>
                        <p>
                            @if(Route::is('homeUz'))
                                Бизда сиз чиройли телефон рақамини сотиб олишингиз мумкин
                            @elseif(Route::is('homeTj'))
                                Шумо метавонед рақами телефони зебо аз мо харед
                            @else
                                У нас вы можете приобрести красивый номер телефона
                            @endif
                        </p>
                    </div>
                    <div class="col-12 col-lg-4 text-center">
                        <a href="/order/" class="btn btn-primary btn-white">
                            @if(Route::is('homeUz'))
                                Рақамни танлаш
                            @elseif(Route::is('homeTj'))
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

    <div class="main-bank-card" id="bank-card">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-7">
                    <h5 class="title-head">
                        @if(Route::is('homeUz'))
                            Банк картаси
                        @elseif(Route::is('homeTj'))
                            Корти бонкӣ
                        @else
                            Банковская карта
                        @endif
                    </h5>
                    
                    <ul>
                        <li>
                            @if(Route::is('homeUz'))
                                Россия VISA дебет картаси махсус чет эл фуқаролари учун.
                            @elseif(Route::is('homeTj'))
                                Корти дебетии русӣ VISA махсусан барои шаҳрвандони хориҷӣ.
                            @else
                                Российская дебетовая карта VISA специально для иностранных граждан.
                            @endif
                        </li>
                        <li>
                            @if(Route::is('homeUz'))
                                Халқаро ўтказмалари учун имтиёзли комиссия – фақат 1,15%.
                            @elseif(Route::is('homeTj'))
                                Комиссияи имтиёзнок барои интиқолҳои байналмилалӣ - ҳамагӣ 1,15%.
                            @else
                                Льготная комиссия на международные переводы - всего 1,15%.
                            @endif
                        </li>
                        <li>
                            @if(Route::is('homeUz'))
                                Картани етказиб бериш бепул.
                            @elseif(Route::is('homeTj'))
                                Расонидани корт ройгон аст.
                            @else
                                Доставка карты бесплатно.
                            @endif
                        </li>
                    </ul>
                    
                    <p>
                        @if(Route::is('homeUz'))
                            Россия банкининг банк картасини олиш учун ариза беринг.
                        @elseif(Route::is('homeTj'))
                            Барои гирифтани корти бонкии бонки Россия дархост пешниҳод кунед.
                        @else
                            Оформите заявку на получение банковской карты российского банка.
                        @endif
                    </p>
                    <create-lead
                        service="bank_card"

                        @if(Route::is('homeUz'))
                            lang="uz"
                        @elseif(Route::is('homeTj'))
                            lang="tj"
                        @else
                            lang="ru"
                        @endif
                    ></create-lead>
                </div>
                <div class="col-12 col-lg-5">
                    <img src="/img/cards.png" alt="Банковская карта">
                </div>
            </div>
        </div>
    </div>

    <div class="main-loan" id="loan">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-5">
                    <img src="/img/rub.png" alt="Денежный займ">
                </div>
                <div class="col-12 col-lg-7">
                    <div class="main-loan-info">
                        <h5 class="title-head">
                            @if(Route::is('homeUz'))
                                Қарзга пул
                            @elseif(Route::is('homeTj'))
                                Қарзи пулӣ
                            @else
                                Денежный займ
                            @endif
                        </h5>

                        <ul>
                            <li>
                                @if(Route::is('homeUz'))
                                    Ҳар қандай мақсадлар учун қарзга пул махсус чет эл фуқаролари учун
                                @elseif(Route::is('homeTj'))
                                    Қарзҳо барои ҳама гуна мақсад махсус барои шаҳрвандони хориҷӣ
                                @else
                                    Займы на любые цели специально для иностранных граждан
                                @endif
                            </li>
                            <li>
                                @if(Route::is('homeUz'))
                                    Пул ҳар қандай Россия банкининг картасига ўтказилади
                                @elseif(Route::is('homeTj'))
                                    Маблағ ба дилхоҳ корти бонки Россия онлайн пардохт карда мешавад
                                @else
                                    Деньги зачисляются онлайн на карту любого российского банка
                                @endif
                            </li>
                            <li>
                                @if(Route::is('homeUz'))
                                    Қарз «Азия Кредит» микрофинанс ташқилоти томонидан такдим этилади
                                @elseif(Route::is('homeTj'))
                                    Қарз аз ҷониби ташкилоти маблағгузории хурди «Азия Кредит» дода мешавад.
                                @else
                                    Займ предоставляется микрофинансовой организацией «Азия Кредит»
                                @endif
                            </li>
                        </ul>

                        <p>
                            @if(Route::is('homeUz'))
                                30 минг рублгача қарзга пул олиш учун ариза беринг
                            @elseif(Route::is('homeTj'))
                                Барои гирифтани қарзи нақдӣ то 30 ҳазор рубл муроҷиат намоед.
                            @else
                                Оформите заявку на получение денежного займа до 30 000 руб.
                            @endif
                        </p>
                        <create-lead
                            service="loan"

                            @if(Route::is('homeUz'))
                                lang="uz"
                            @elseif(Route::is('homeTj'))
                                lang="tj"
                            @else
                                lang="ru"
                            @endif
                        ></create-lead>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-about" id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-lg-12">
                    <h5 class="title-head">
                        @if(Route::is('homeUz'))
                            Компания хақида
                        @elseif(Route::is('homeTj'))
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