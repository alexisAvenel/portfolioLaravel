@extends('layouts.master')

@section('content')
<div id="parallax1" class="slide">
    <div class="section no-pad-bot">
        <div class="container">

            <div class="col s12">
                <div class="opacity-box z-depth-5">
                    <h1 class="header center amber-text">Alexis Avenel</h1>
                    <div class="center">
                        <h5 class="col s12 light">Développeur Web <span>&</span> Mobile <br/> [ Front <span>&</span> Back ]</h5>
                    </div>
                    <div id="flip-button" class="center">
                        <div class="cube flip-to-top btn-large rounded amber z-depth-2">
                            <div class="default-state">
                                <span class="first">Mon <span>e<sub>-</sub></span> CV</span>
                            </div>
                            <div class="active-state">
                                <span class="second t">
                                    <div class="tr">
                                        <span class="tc"><i class="material-icons">location_city</i> <span>Rouen (76)</span></span>
                                        <span class="tc"><i class="material-icons">email</i> <span>avenel.alexis@sfr.fr</span></span>
                                    </div>
                                    <div class="tr">
                                        <span class="tc"><i class="material-icons">access_time</i> <span>12/1991</span></span>
                                        <span class="tc center">
                                            <a href="#!" class="twitter icons" title="Twitter Alexis Avenel" target="_blank"></a> 
                                            <span style="width:30px;display: inline-block;"></span>
                                            <a href="#!" class="linkedin icons" title="Linkedin Alexis Avenel" target="_blank"></a>
                                        </span>
                                    </div>

                                    </table>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="scrollspy" class="col s12 center hide-on-med-and-down">
                <a href="#competences" class="arrow amber-text"><i class="large material-icons">keyboard_arrow_down</i></a>
            </div>

        </div>
    </div>
</div>


<div id="parallax2" class="slide blue-grey darken-3 flow-text shadow">
    <div id="competences" class="col s12 section scrollspy">

        <div class="valign-wrapper">
            <h3 class="valign h1-3d">Compétences</h3>
        </div>

        <canvas id="skills-chart" width="500" height="500"></canvas>

    </div>
</div>

<div id="parallax3" class="slide">
    <div id="experiences" class="section no-pad-bot">

        <div class="valign-wrapper">
            <h3 class="valign h1-3d">Expériences</h3>
        </div>

        <div class="col s12 container">
            <ul class="collapsible popout" data-collapsible="accordion">
                <li>
                    <div class="collapsible-header"><i class="material-icons">filter_drama</i>First</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">place</i>Second</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
                <li>
                    <div class="collapsible-header"><i class="material-icons">whatshot</i>Third</div>
                    <div class="collapsible-body"><p>Lorem ipsum dolor sit amet.</p></div>
                </li>
            </ul>            
        </div>

    </div>
</div>

@endsection