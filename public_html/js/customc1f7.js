$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
$(".js-pause").click(function () {
    $('#youtube').attr('src', $('#youtube').attr('src'));
});
$("#youtube-video").click(function () {
    $('#youtube').attr('src', $('#youtube').attr('src'));
});



$('#reg').submit(function(){
    // Погнали...
    //Первым делом мутим тему с капчей и весь код уже будет внутри
    grecaptcha.execute(Catpcha_key, {action: 'formReg'}).then(function(token) {
        captchaToken = token;
        var action = 'formReg';

        var login = $('input#account').val();
        var pass1 = $('input#password1').val();
        var pass2 = $('input#password2').val();
        var email = $('input#email').val();
        $('#success').hide(200);

        if(useCaptchav2){
            if(!grecaptcha.getResponse()) {
                // Капча в2 не прошла
                $('div.error').show(200).text('Вы же не бот, верно?');
                return false;
            } else {
                // added
                $('div.error').show(200).text('Use captcha v2');
                action = 'usev2';
                captchaToken = grecaptcha.getResponse();
            }
        }

        var request = $.ajax({
            url: './ajax.php?register',
            type: 'POST',
            dataType: 'json',
            data: {login:login, pass1:pass1, pass2:pass2, email:email, captcha_token:captchaToken, captcha_action: action},
            beforeSend: function(){
                // added
                //$('div.error').show(200).text('Ожидаем ответа...');
                $('input.btn.btn-success').attr('disabled','disabled').css('background-color','grey');
            },
            success: function(r){
                if(useCaptchav2) grecaptcha.reset();
                $('input.btn.btn-success').removeAttr('disabled').removeAttr('style');
                if(typeof(r.error) !== 'undefined')
                {
                    $('div.error').show(200).text(r.error);

                }
                else if(typeof(r.okay) !== 'undefined')
                {
                    $('div.error').hide(200);
                    $('#success').show(200);
                }

                if(typeof(r.loadCaptcha2) !== 'undefined')
                {
                    // вызываем вторую капчу
                    $('div.recaptchav2New').show(200).css('display','block');
                    useCaptchav2 = true;
                }
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            $('div.error').show(200).text('Сервер не доступен в данный момент. Повторите попытку через несколько минут');
        });
    });
    return false;
});

$('#auth').submit(function(){
    // Погнали...
    grecaptcha.execute(Catpcha_key, {action: 'formAuth'}).then(function(token) {
        captchaToken = token;
        var login = $('input#account').val();
        var pass = $('input#inputPassword').val();
        $('div#error').hide(200);
        var action = 'formAuth';
        if(useCaptchav2){
            if(!grecaptcha.getResponse()) {
                // Капча в2 не прошла
                $('div#error2').show(200);
                return false;
            } else {
                action = 'usev2';
                captchaToken = grecaptcha.getResponse();
            }
        }

        var request = $.ajax({
            url: './ajax.php?auth',
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $('input.btn.btn-lg.btn-primary.btn-block').attr('disabled','disabled').css('background-color','grey');
            },
            data: {login:login, pass:pass, captcha_token:captchaToken, captcha_action: action},
            success: function(r){
                if(useCaptchav2) grecaptcha.reset();
                $('input.btn.btn-lg.btn-primary.btn-block').removeAttr('disabled').removeAttr('style');
                if(typeof(r.error) !== 'undefined') {
                    // Проверяем тип ошибки. 1 - неверный логин. 2 - капча
                    if(r.error === 1)
                        $('div#error').show(200);
                    else if(r.error === 2) {
                        $('div.recaptchav2New').show(200).css('display','block');
                        useCaptchav2 = true;
                    }
                }
                else if(typeof(r.okay) !== 'undefined') {location.reload();}
            }
        });
        request.fail(function( jqXHR, textStatus ) {
            $('div#error').show(200).text('Сервер не доступен в данный момент. Повторите попытку через несколько минут');
            $('input.btn.btn-lg.btn-primary.btn-block').removeAttr('disabled').removeAttr('style');
        });
    });

    return false;
});

$('.changepass').submit(function(){
    // Погнали...
    var pass = $('input#inputPassword').val();
    $('div#error').hide(200);

    $.ajax({
        url: './ajax.php?changepass',
        type: 'POST',
        dataType: 'json',
        data: {pass:pass},
        success: function(r){
            if(typeof(r.error) !== 'undefined') {$('div.error').show(200).text(r.error);}
            else if(typeof(r.okay) !== 'undefined') {$('div.error').hide(200); $('div.success').show(200);setTimeout(function(){location.href='./lk.php';},1000);}
        }
    });
    return false;
});

/*$('.sbrospass').submit(function(){
	// Погнали...
	var login = $('input#login').val();
	$('div#error').hide(200);

	$.ajax({
		url: '/ajax.php?sbrospass',
		type: 'POST',
		dataType: 'json',
		data: {login:login},
		success: function(r){
			if(typeof(r.error) !== 'undefined')
			{
				$('div.error').show(200).text(r.error);
			}
			else if(typeof(r.okay) !== 'undefined')
			{
				$('div.error').hide(200);
				$('div.success').show(200);
			}
		}
	});
	return false;
});*/


$('.sbrospass').submit(function(){
    // Погнали...
    grecaptcha.execute(Catpcha_key, {action: 'formSbros'}).then(function(token) {

        var login = $('input#login').val();
        captchaToken = token;
        $('div#error').hide(200);

        var action = 'formSbros';
        if(useCaptchav2){
            if(!grecaptcha.getResponse()) {
                // Капча в2 не прошла
                $('div#error2').show(200);
                return false;
            } else {
                action = 'usev2';
                captchaToken = grecaptcha.getResponse();
            }
        }

        $.ajax({
            url: './ajax.php?sbrospass',
            type: 'POST',
            dataType: 'json',
            beforeSend: function(){
                $('input.btn.btn-lg.btn-primary.btn-block').attr('disabled','disabled').css('background-color','grey');
            },
            data: {login:login, captcha_token:captchaToken, captcha_action: action},
            success: function(r){
                if(useCaptchav2)
                    grecaptcha.reset();
                $('input.btn.btn-lg.btn-primary.btn-block').removeAttr('disabled').removeAttr('style');

                if(r.error === 2)
                {
                    $('div.recaptchav2New').show(200).css('display','block');
                    useCaptchav2 = true;
                }
                else if(typeof(r.error) !== 'undefined')
                {
                    $('div.error').show(200).text(r.error);
                }
                else if(typeof(r.okay) !== 'undefined')
                {
                    $('div.error').hide(200);
                    $('div.success').show(200);
                }

                /*if(typeof(r.error) !== 'undefined')
                {
                    // Проверяем тип ошибки. 1 - неверный логин. 2 - капча
                    if(r.error === 1) $(
                    	'div#error').show(200);
                    else if(r.error === 2) {
                        $('div.recaptchav2New').show(200).css('display','block');
                        useCaptchav2 = true;
                    }
                }
                else if(typeof(r.okay) !== 'undefined')
                {
                	location.reload();
                }*/
            }
        });
    });

    return false;
});

$('#sbroshwidBtn').click(function(){
    var a = $(this);
    alert("btn clicked!");

    $.ajax({
        url: './ajax.php?sbroshwid',
        type: 'POST',
        dataType: 'json',
        data: {},
        success: function(r){
            if(typeof(r.error) !== 'undefined') {a.after('.<br><font style="color:red;">'+r.error+'</font>');}
            else if(typeof(r.true) !== 'undefined') {a.after('.<br>'+r.html);}
        }
    });
    a.unbind('click');
    return false;
});

$('#beginDonateBtn').click(function(){
    var a = $(this);
    a.css( "display", "none");
    $('#donateForm').css( "display", "block" );

    return false;
});

$('.gototown').submit(function(){
    var vars = $(this).serialize();
    var a = $(this).parent('td');
    $.ajax({
        url: './ajax.php?gototown',
        type: 'POST',
        dataType: 'json',
        data:vars,
        success: function(r){
            if(typeof(r.error) !== 'undefined') {a.html('<font style="color:red;">'+r.error +'</font>');}
            else if(typeof(r.okay) !== 'undefined') {a.html('<font style="color:green">'+r.message+'</font>');}

        }
    });
    return false;
});


function imNotARobotAuth(){
    // Пытаемся отправить форму авторизации
    $('#auth').submit();
}
function imNotARobotSborsPass(){
    // Пытаемся отправить форму авторизации
    $('#sbrosPassForm').submit();
}
function imNotARobotReg(){
    // Пытаемся отправить форму авторизации
    $('#reg').submit();
}