@extends('layout')

@section('content')
<meta name="game" content="double" />
<link rel="stylesheet" href="/css/double.css">
<link rel="stylesheet" href="/css/double2.css">
<link rel="stylesheet" href="/css/app2.css">
<script type="text/javascript" src="/js/double.js"></script>

<div class="roulette">
    <div class="roulette-top">
        <div class="roulette-left">
            <div class="controls">
                <div class="inputs-area">
                    <label for="apostar" class="label-input">Coloque um valor: </label>
                    <div class="amount flex flex-direction-row justify-content-space-between">
                        <input type="number" class="value w70" min="1" max="100000" value="1" id="apostar" placeholder="Quantia">
                        <div class="button w12" data-action="1/2">1<span>/</span>2</div>
                        <div class="button w12" data-action="x2"><span>X</span>2</div>
                    </div>
                </div>
                <div class="color-select">
                    <span class="label-input">Selecione uma cor: </span>
                    <div class="buttons">
                        <button class="btn-multi active2" data-color="red">
                            <div class="red-color"> <span>x2</span> </div>
                        </button>
                        <button class="btn-multi" data-color="white">
                            <div class="green-color"> <span>x20</span> </div>
                        </button>
                        <button class="btn-multi" data-color="black">
                            <div class="black-color"> <span>x2</span> </div>
                        </button>
                    </div>
                </div>
                <div class="play">
                    <button class="btn-play">Apostar</button>
                </div>
            </div>
        </div>
        <div class="roulette-right">
            <div class="new-progress">
                <div class="rolling-inner">ESPERANDO PRÓXIMA RODADA</div>
                <div class="scroll" style="width: 10000px;"></div>
            </div>

            <div class="spinner">
                <div class="inner">

                    <div class="roulette-wheel-outer">
                        <div class="roulette-wheel">



                            <div class="roll flex flex-row">
                                <div class="picker" style="transform: translateX(-2178px); transition-duration: 10ms;">
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">9</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">7</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">8</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">1</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">14</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">2</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">13</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">3</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">12</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">4</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box white">
                                                <img src="/img/sixe.png" '="" width="60" height="60">
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">11</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">5</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">10</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">6</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">9</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">7</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">8</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">1</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">14</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">2</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">13</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">3</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box black">
                            <div class="number">12</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box red">
                            <div class="number">4</div>
                        </div>
                        </div>
                    </div>
                    <div class="tile-wrapper">
                        <div class="roulette-tile">
                        <div class="lg-box white">
                            <img src="/img/sixe.png" '="" width="60" height="60">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">11</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">5</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box black">
                                                <div class="number">10</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tile-wrapper">
                                        <div class="roulette-tile">
                                            <div class="lg-box red">
                                                <div class="number">6</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="roulette-caret-down-left"><i class="fa fa-caret-down" aria-hidden="true"></i></div>
                            <div class="roulette-caret-up-right"><i class="fa fa-caret-up" aria-hidden="true"></i></div>
                        </div>
                    </div>
                </div>
            </div>
		
		
        <div class="previous-roll">
            <div class="text">Ultimos Giros:</div>
            <div class="history-items"><div class="item black"> <span class="inside">14</span> </div><div class="item red"> <span class="inside">4</span> </div><div class="item black"> <span class="inside">14</span> </div><div class="item black"> <span class="inside">14</span> </div>
                                <div class="item black"> <span class="inside">12</span> </div>
                                <div class="item black"> <span class="inside">9</span> </div>
                                <div class="item red"> <span class="inside">3</span> </div>
                                <div class="item black"> <span class="inside">9</span> </div>
                                <div class="item black"> <span class="inside">9</span> </div>
                                <div class="item black"> <span class="inside">9</span> </div>
                                <div class="item red"> <span class="inside">1</span> </div>
                                <div class="item black"> <span class="inside">11</span> </div>
                                <div class="item red"> <span class="inside">1</span> </div>
                                <div class="item red"> <span class="inside">3</span> </div>
                                <div class="item black"> <span class="inside">13</span> </div>
                                
                                
                                
                                
                            </div>
        </div>
            <!--<div class="crown-counter">Número do último giro: <span class="crown-counter-span">0</span></div>
            <div class="roulette-info">Round hash: ...</div>-->
        </div>

    </div>
    <div class="bets">
        <div class="bet-box red-bet">
            <div class="bet-info">
                <div class="bet-label"><span>x2</span><svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 151 151">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: var(--double-red);
                                }
                            </style>
                        </defs>
                        <title>Asset 116</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <rect class="cls-1" width="151" height="151" rx="38.33" ry="38.33"></rect>
                                <circle class="cls-2" cx="75.5" cy="76.1" r="50.39"></circle>
                                <circle class="cls-1" cx="75.5" cy="76.1" r="41.22"></circle>
                            </g>
                        </g>
                    </svg></div>
                <div class="total-bet"><span class="text">Total de apostas: </span><span class="red-total total-bet-amount" data-value="0">R$ 0</span></div>
            </div>
            <div class="table-details">
                <div>Usuário</div>
                <div>Valor</div>
            </div>
            <div class="player-bets"></div>
        </div>
        <div class="bet-box green-bet">
            <div class="bet-info">
                <div class="bet-label"><span>x20</span><svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 151 151">
                        <defs>
                            <style>
                                .cls-4 {
                                    fill: #1bb67f;
                                }
                            </style>
                        </defs>
                        <title>Asset 116</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <rect class="cls-4" width="151" height="151" rx="38.33" ry="38.33" style=" fill: #fff; "></rect>
                                <circle class="cls-2" cx="75.5" cy="76.1" r="50.39" style=" fill: black; "></circle>
                                <circle class="cls-4" cx="75.5" cy="76.1" r="41.22" style=" fill: #fff; "></circle>
                            </g>
                        </g>
                    </svg></div>
                <div class="total-bet"><span class="text">Total de apostas: </span><span class="green-total total-bet-amount" data-value="0">R$ 0</span></div>
            </div>
            <div class="table-details">
                <div>Usuário</div>
                <div>Valor</div>
            </div>
            <div class="player-bets"></div>
        </div>
        <div class="bet-box black-bet">
            <div class="bet-info">
                <div class="bet-label"><span>x2</span><svg xmlns="http://www.w3.org/2000/svg" width="32px" viewBox="0 0 151 151">
                        <defs>
                            <style>
                                .cls-3 {
                                    fill: #343b4a;
                                }

                                .cls-2 {
                                    fill: #fff;
                                }
                            </style>
                        </defs>
                        <title>Asset 115</title>
                        <g id="Layer_2" data-name="Layer 2">
                            <g id="Layer_1-2" data-name="Layer 1">
                                <rect class="cls-3" width="151" height="151" rx="38.33" ry="38.33"></rect>
                                <circle class="cls-2" cx="75.5" cy="76.1" r="50.39"></circle>
                                <circle class="cls-3" cx="75.5" cy="76.1" r="41.22"></circle>
                            </g>
                        </g>
                    </svg></div>
                <div class="total-bet"><span class="text">Total de apostas: </span><span class="black-total total-bet-amount" data-value="0">R$ 0</span></div>
            </div>
            <div class="table-details">
                <div>Usuário</div>
                <div>Valor</div>
            </div>
            <div class="player-bets"></div>
        </div>
    </div>
</div>
</div>


@endsection