@extends('layouts.master')

@section('content')
<div id="parallax1" class="slide">
    <div class="section no-pad-bot">
        <div class="container">

            <div class="row">

                <div class="opacity-box z-depth-5 col s12">

                    <div class="row">

                        <div class="col l12 m12 s12">
                            <h1 class="header center amber-text">Alexis Avenel</h1>
                        </div>
                        <div class="col l12 m12 s12">
                            <h5 class="light center">Développeur Web <span>&</span> Mobile</h5>
                            <h5 class="light center"><i class="lighter">[ Front </i><span>&</span> <i class="lighter">Back ]</i></h5>
                        </div>
                        <div id="user-infos" class="col l12 m12 s12 center">
                            <div class="row">
                                <div class="col l1 offset-l4 m3 s6 block-user">
                                    <span class="user-infos tooltipped" data-position="left" data-tooltip="Rouen (76)">
                                        <i class="material-icons">room</i>
                                        <p>Rouen (76)</p>
                                    </span>
                                </div>
                                <div class="col l1 m3 s6 block-user">
                                    <a href="/contact" class="user-infos tooltipped" data-position="top" data-tooltip="avenel.alexis@sfr.fr">
                                        <i class="material-icons">email</i>
                                        <p>avenel.alexis@sfr.fr</p>
                                    </a>
                                </div>
                                <div class="col l1 m3 s6 block-user">
                                    <span class="user-infos tooltipped" data-position="bottom" data-tooltip="{{$birthday}}ans">
                                        <i class="material-icons">cake</i>
                                        <p>{{$birthday}}ans</p>
                                    </span>
                                </div>
                                <div class="col l1 m3 s6 block-user">
                                    <a href="http://www.interaction-healthcare.com" target="_blank" class="user-infos tooltipped" data-position="right" data-tooltip="Interaction Healthcare">
                                        <i class="material-icons">business</i>
                                        <p>Interaction Healthcare</p>
                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


                <div id="scrollspy" class="col s12 center ">
                    <a href="#competences" class="arrow amber-text"><i class="large material-icons">keyboard_arrow_down</i></a>
                </div>
            </div>

        </div>
    </div>
</div>


<div id="parallax2" class="slide flow-text">
    <div id="competences" class="col s12 section scrollspy">

        <div class="valign-wrapper">
            <h3 class="valign"><i class="material-icons icon-title-mobile">equalizer</i> Compétences</h3>
        </div>

        <div class="row">
            <div class="col l6 offset-l1 s11">
                <ul>

                @foreach($skills as $skill)

                    <li class="skill">
                        <span class="skill_name">
                            <strong>
                                {{ $skill->name }} @if($skill->description) ({{ $skill->description }})@endif
                            </strong>
                        </span>
                        <div class="skill_bar">
                            <div class="skill_active" data-value="{{ $skill->value }}%"></div>
                            <span><i>0</i><em>%</em></span>
                        </div>
                    </li>

                @endforeach

                </ul>
            </div>

            <div class="col s4 offset-1">
                <img src="<?php echo asset('images/skills.png'); ?>" class="responsive-img valign">
            </div>
        </div>
    </div>
</div>

<div id="parallax3" class="slide">
    <div id="experiences" class="section no-pad-bot">

        <div class="valign-wrapper">
            <h3 class="valign">Expériences</h3>
        </div>

        <div class="col s12">
            @foreach($experiences as $experience)
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="images/office.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">Card Title<i class="material-icons right">more_vert</i></span>
                        <p><a href="#">This is a link</a></p>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Card Title<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</div>

@endsection