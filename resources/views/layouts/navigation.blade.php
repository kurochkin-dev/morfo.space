
<div class="px-5 menu-figma">
    <div class="col-12 p-3">
        <div class="row">
            <div class="col-2 p-3">
                <div class="row">
                    <div class="col-1 p-2">
                        <img src="{{ asset('images/icon-client.png') }}">
                    </div>
                    <div class="col-11 px-4 pt-1 profile__menu">
                        <div class="btn btn-round p-2 px-5 profile__user">
                            {{ Auth::user()->user_name }} {{ Auth::user()->user_surname }}
                        </div>
                        <div class="profile__settings">
                            <div class="settings-block">
                                <div class="settings-block__block">
                                    <div class="settings-block__item">
                                        <div class="settings-block__image">
                                            <img src="{{ asset('images/icon-settings.png') }}">
                                        </div>
                                        <a class="settings-item__link" href="#">Настройки</a>
                                    </div>
                                    <div class="settings-block__item">
                                        <div class="settings-block__image">
                                            <img src="{{ asset('images/icon-logout.png') }}">
                                        </div>
                                        <a class='settings-item__link' href="{{ route('logout') }}">Выход</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8 p-3">
                <?php $statuses = json_decode(Auth::user()->group()->statuses); ?>
                <ul class="nav">
                    <li class="nav-item"><a class="nav-link active" href="/dashboard">Главная</a></li>
                    @if(in_array('created', $statuses))
                        <li class="nav-item"><a class="nav-link" href="/card/create">Создать карточку</a></li>
                    @endif
                    @if(in_array('clipping', $statuses) || in_array('clipping_completed', $statuses))
                        <li class="nav-item"><a class="nav-link" href="/card/action/clipping">Вырезка</a></li>
                    @endif
                    @if(in_array('cutting', $statuses) || in_array('cutting_completed', $statuses))
                        <li class="nav-item"><a class="nav-link" href="/card/action/cutting">Резка</a></li>
                    @endif
                    @if(in_array('completed', $statuses))
                        <li class="nav-item"><a class="nav-link" href="/card/action/archive">Архив</a></li>
                    @endif
                    <li class="nav-item"><a class="nav-link" href="/admin">Панель администратора</a></li>
                    <div class="clearfix"></div>
                </ul>
            </div>
            <div class="col-2">
                <div class="row">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <img src="{{ asset('images/logoM.svg') }}">
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{--<div class="col-12">
    <div class="menu">
        <a href="#" id="activator"><img src="https://bootstraptema.ru/snippets/menu/2016/button/menu.png" alt="" /></a>
        <div class="box" id="box">
            <div class="box_content">
                <div class="menu_box_list">
                    <ul>
                        <li class="active"><a href="#">Главная</a></li>
                        <li><a href="/card/create">Создать карточку</a></li>
                        <li><a href="/card/action/clipping">Вырезка</a></li>
                        <li><a href="/card/action/cutting">Резка</a></li>
                        <li><a href="/card/action/appointed">Уголок доктора</a></li>
                        <li><a href="/card/action/archive">Архив</a></li>
                        <li><a href="#">Поиск</a></li>
                        <li><a href="/admin">Панель администратора</a></li>
                        <div class="clearfix"></div>
                    </ul>
                </div>
                <a class="boxclose" id="boxclose"><img src="https://bootstraptema.ru/snippets/menu/2016/button/close.png" alt="" /></a>
            </div>
        </div>
        </div>
        </div>--}}
</div>
