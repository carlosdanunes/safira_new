jQuery(function ($) {

    $(document).ready(function () {

        var value = $('.inputs-area .amount .value');
        

        $(document).on('click', '.btn-multi', function () {
            var multi = $('.btn-multi');
            
            multi.removeClass('active2');
            $(this).addClass('active2');
            var color = $(this).data('value');
            
        });

        $(document).on('click', '.inputs-area .button', function () {               
            var value = parseFloat($('.value').val());
            var balance = parseFloat($($('.balance')[0]).data('balance'));
            if (isNaN(value)) value = 0;
            switch($(this).data('action')) {
                case "clear": value = 0; break;
                case "last": value = parseFloat(localStorage.getItem("lastBetRoulette")); break;
                case "min": value = self._settings.min; break;
                case "max": value = self._settings.max; break;
                case "10+": value += 10; break;
                case "50+": value += 50; break;
                case "150+": value += 150; break;
                case "200+": value += 200; break;
                case "500+": value += 500; break;
                case "10000-": value -= 10000; break;
                case "1/2": value *= 0.5; break;
                case "x2": value *= 2; break;
                case "x3": value *= 3; break;
            }
            value = parseFloat(value);
            if (value > balance) value = balance;
            if (value < 0 || isNaN(value)) value = 0;
            localStorage.setItem("lastBetRoulette", value);
            $('.value').val(value);
        });


        $(document).on('click', '.btn-play', function () {            
            $.ajax({
                url: '/double/newBet',
                type: 'post',
                data: {
                    balance: localStorage.getItem('balance') || 'balance',
                    color: $('.btn-multi.active2').data('color'),
                    sum: $('#apostar').val()
                },
                success: function (data) {
                    $.notify({
                        type: data.type,
                        message: data.msg
                    });
                },
                error: function (xhr, textStatus, errorThrown) {
                    let message = "";
                    if (xhr.responseJSON && xhr.responseJSON.message === "Unauthenticated.") {
                        message = "NÃ£o Autenticado";
                    }
                    $.notify({
                        type: 'error',
                        message: message !== "" ? message : xhr.responseJSON.message
                    });
                }
            });
        });
        

        $(document).on('click', '.color-selector .label', function () {
            if (!$(this).hasClass('isActive')) {
                $('.color-selector .label').removeClass('isActive');

                $(this).addClass('isActive');

                if ($(this).hasClass('red')) {
                    $(this).css('outline-color', 'var(--red)');
                    $('.black').css('outline-color', 'black');
                    $('.white').css('outline-color', '#fff');
                }


                if ($(this).hasClass('black')) {
                    $(this).css('outline-color', 'var(--red)');
                    $('.white').css('outline-color', 'white');
                    $('.red').css('outline-color', 'var(--double-red)');
                }

                if ($(this).hasClass('white')) {
                    $(this).css('outline-color', 'var(--red)');
                    $('.black').css('outline-color', '#000');
                    $('.red').css('outline-color', 'var(--double-red)');
                }
            }
        });

        socket.on('double', function (data) {



            if (data.type == 'bets') parseBets(data.bets);



            if (data.type == 'timer') {

                $('.progress p').html('RODANDO EM ' + (parseFloat(data.time) * 10).toFixed(2) + 's');
                $('.new-progress .rolling-inner').html('RODANDO EM ' + (parseFloat(data.time) * 10).toFixed(2) + 's');

                $('.progress .scroll').css('width', (((data.time * 10) / 15) * 100) + '%');
                $('.new-progress .scroll').css('width', (((data.time * 10) / 15) * 100) + '%');
            }
            if (data.type == 'slider') {

                $('.picker').css('transition-duration', '5000ms');
                $('.picker').css('transform', 'translateX(-' + ((2178 + ((104 * 15) * 4)) + data.slider.rotate) + 'px)');

                $('.progress .scroll').css('width', '10000px');
                $('.new-progress .scroll').css('width', '10000px');
                $('.progress p').html('GIRANDO');
                $('.new-progress .rolling-inner').html('GIRANDO');

                setTimeout(() => {
                    $('.picker').css('transition-duration', '10ms');
                    $('.picker').css('transform', 'translateX(-' + ((2178 + ((104 * 15) * 4)) + (data.slider.rotate - data.slider.random)) + 'px)');

                    $('.progress p').html('ESPERANDO PRÃ“XIMA RODADA');
                    $('.new-progress .rolling-inner').html('ESPERANDO PRÃ“XIMA RODADA');
                }, 7000);

            }
            if (data.type == 'newGame') {

                $('.red-total.total-bet-amount').html('R$ 0');
                $('.green-total.total-bet-amount').html('R$ 0');
                $('.black-total.total-bet-amount').html('R$ 0');

                $('.bet-box.green-bet .player-bets').html('');
                $('.bet-box.red-bet .player-bets').html('');
                $('.bet-box.black-bet .player-bets').html('');





                $('.picker').css('transition-duration', '10ms');
                $('.picker').css('transform', 'translateX(-2178px)');

                $('.white-history .history-users').html('');
                $('.red-history .history-users').html('');
                $('.black-history .history-users').html('');

                $('.white-history .history-status .amount').html('R$ 0');
                $('.black-history .history-status .amount').html('R$ 0');
                $('.red-history .history-status .amount').html('R$ 0');

                $('.white-history .history-status .apostas').html('0 Apostas Totais');
                $('.black-history .history-status .apostas').html('0 Apostas Totais');
                $('.red-history .history-status .apostas').html('0 Apostas Totais');

                $('.history-items').prepend(`<div class="item ${data.history.color}"> <span class="inside">${data.history.number}</span> </div>`);
                $(Array.from($('.history-items')[0].children).pop()).remove()
            }
        });
    });

    function parseBets(bets) {
        var list_white = [];
        var list_red = [];
        var list_black = [];

        var list_white2 = [];
        var list_red2 = [];
        var list_black2 = [];

        var amount_white = 0;
        var amount_red = 0;
        var amount_black = 0;

        var amount_white2 = 0;
        var amount_red2 = 0;
        var amount_black2 = 0;

        var bets_white = 0;
        var bets_red = 0;
        var bets_black = 0;        

        for (var i in bets) {
            let bet = bets[i];

            if (bet.color == 'white') {
                list_white += `
                    <div class="history-user" data-userid="${bet.user_id}">
                        <div class="rank-name">
                            <div class="avatar"><img src="${bet.avatar}" alt=""></div>
                            <div class="name">${bet.username}</div>
                        </div>
                        <div>R$ ${bet.sum}</div>
                    </div>
                `;
                list_white2 += `
                    <div class="player-bet" data-sort="${bet.sum}"><div class="user"><div class="fa fa-user"></div>${bet.username}</div><div class="amount">${bet.sum}</div></div>
                    `;
            };

            if (bet.color == 'red') {
                list_red += `
                    <div class="history-user" data-userid="${bet.user_id}">
                        <div class="rank-name">
                            <div class="avatar"><img src="${bet.avatar}" alt=""></div>
                            <div class="name">${bet.username}</div>
                        </div>
                        <div>R$ ${bet.sum}</div>
                    </div>
                `;
                list_red2 += `
                    <div class="player-bet" data-sort="${bet.sum}"><div class="user"><div class="fa fa-user"></div>${bet.username}</div><div class="amount">${bet.sum}</div></div>
                    `;
            };

            if (bet.color == 'black') {
                list_black += `
                    <div class="history-user" data-userid="${bet.user_id}">
                        <div class="rank-name">
                            <div class="avatar"><img src="${bet.avatar}" alt=""></div>
                            <div class="name">${bet.username}</div>
                        </div>
                        <div>R$ ${bet.sum}</div>
                    </div>
                `;
                list_black2 += `
                    <div class="player-bet" data-sort="${bet.sum}"><div class="user"><div class="fa fa-user"></div>${bet.username}</div><div class="amount">${bet.sum}</div></div>
                    `;
            };

            if (bet.color == 'white') {
                $('.white-history .history-users').html(list_white);
                $('.bet-box.green-bet .player-bets').html(list_white2);
                amount_white += bet.sum;
                bets_white++;
            }

            if (bet.color == 'red') {
                $('.red-history .history-users').html(list_red);
                $('.bet-box.red-bet .player-bets').html(list_red2);
                amount_red += bet.sum;
                bets_red++;

            }

            if (bet.color == 'black') {
                $('.black-history .history-users').html(list_black);
                $('.bet-box.black-bet .player-bets').html(list_black2);
                amount_black += bet.sum;
                bets_black++;
            }


        }

        $('.white-history .history-status .amount').html('R$ ' + amount_white.toFixed(2));
        $('.black-history .history-status .amount').html('R$ ' + amount_black.toFixed(2));
        $('.red-history .history-status .amount').html('R$ ' + amount_red.toFixed(2));

        $('.red-total.total-bet-amount').html('R$ ' + amount_red.toFixed(2));
        $('.green-total.total-bet-amount').html('R$ ' + amount_white.toFixed(2));
        $('.black-total.total-bet-amount').html('R$ ' + amount_black.toFixed(2));;

        $('.white-history .history-status .apostas').html(bets_white + ' Apostas Totais');
        $('.black-history .history-status .apostas').html(bets_black + ' Apostas Totais');
        $('.red-history .history-status .apostas').html(bets_red + ' Apostas Totais');

    }
});