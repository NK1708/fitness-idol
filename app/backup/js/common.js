if ($(window).width() >= '996'){
           var delay_popup = 2000;
            var msg_pop = document.getElementById('msg_pop');
            setTimeout("document.getElementById('msg_pop').style.display='block';document.getElementById('msg_pop').className += 'fadeIn';", delay_popup);    
        } 

var arr = [
        'Я уеду жить в Лондон',
        'У меня самолет Москва-Ростов, Казань-Москва',
        'Полгода плохая погода',
        'Вся жизнь впереди, надейся и жди',
        'Я целыми днями лежу на боку, съедаю в минуту по окороку',
        'Потому что мы пилоты',
        'Я ленивый как никто',
        'Конфетки-бараночки',
        'Я устал, хочу любви',
        'Все люди, как люди, а я суперзвезда',
        'Конфетки-бараночки',
        'Я красивый, как никто',
        'Наверно, потому что все это мои чувства'
      ];

$(function() {
	$(document).ready(function() {

    

      

    
       

        
        var timerId = setInterval(rand, 100);
      

      

     

      $('.generator__btn').on('click tap touch', function() { 

        generationCanvas();



        var $this = $(this); 

        if($this.hasClass("MuteOn")) { 
          $this.removeClass("MuteOn").addClass("MuteOff"); 
          clearInterval(timerId);
          $('.second-content__done').css('visibility', 'visible');
          $('.second-block').addClass('dark-block');
        } else { 
          $this.removeClass("MuteOff").addClass("MuteOn"); 
          timerId = setInterval(rand, 100);
          $('.second-content__done').css('visibility', 'hidden');
          $('.second-block').removeClass('dark-block');
        } 

        
      });

				$(".btn-dark").click(function() {
					$(".modal").addClass("active");
				});
				$(".modal-close").click(function() {
					$(".modal").removeClass("active");
				});
				$(document).click(function (e) {
					if ($(e.target).closest(".modal").length === 0 && $(e.target).closest(".btn-dark").length === 0) {
						$(".modal").removeClass("active");
					}
					e.stopPropagation();
				});
        ajaxForm();
        amountPrice();
        initSelect();
        function ajaxForm() {
            $('#query-form').submit(function(e) {
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $(".form_message").empty();
                    },
                    success: function(json) {
                        if (json['error']) {
                            $(".form_message").append(json['error']);
                        }
                        if (json['success']) {
                            $(".form_message").append(json['success']);
                            $('#query-form').trigger('reset');
                        }
                    }
                });
                //отмена действия по умолчанию для кнопки submit
                e.preventDefault();
            });
        }
        
    function amountPrice() {
            var Place = $('.place-select');
            var Tarif = $('.tarif-select');

            var groupID = parseInt(Place.find('option:selected').attr('data-id'));
            var cardID = parseInt(Tarif.find('option:selected').attr('value'));
            var amount = Tarif.find('option:selected').attr('data-price_' + groupID );
            Place.change(function() {
                    groupID = parseInt(Place.find('option:selected').attr('data-id'));
                    amount = Tarif.find('option:selected').attr('data-price_' + groupID );
                    if(amount !== undefined) {
                        $('.final-price__number').html(amount);
                    }
                });
            Tarif.change(function() {
                cardID = parseInt(Tarif.find('option:selected').attr('data-id'));
                amount = Tarif.find('option:selected').attr('data-price_' + groupID );
                if(amount !== undefined) {
                    $('.final-price__number').html(amount);
                }
            });
            if(amount !== undefined) {
                $('.final-price__number').html(amount);
            }
        }
	    $('#fullpage').fullpage({
	    	verticalCentered: false,
            scrollOverflow: true,
            normalScrollElements: '.fifth-content__list',
            anchors: ['section1', 'section2', 'section3', 'section4', 'section5', 'section6']
	    });

        function initSelect() {
            $('.place-select').select2({
                dropdownParent: $('.place-select-parent'),
            });
            $('.tarif-select').select2({
                dropdownParent: $('.tarif-select-parent'),
            });
            $("#phone_input").mask("+7 999 999-99-99");
        }

    	$('.map-select').select2({
    		dropdownParent: $('.map-select-parent'),
    	});
    	$("#phone_input").mask("+7 999 999-99-99");
	});




    $('.fourth-content__map')
      .click(function(){
          $(this).find('ymaps').addClass('clicked')})
      .mouseleave(function(){
          $(this).find('ymaps').removeClass('clicked')
    });
});


$('.fourth-content__list ul li').click(function() {
    $('.fourth-content__list ul li').removeClass('active');
    $(this).addClass('active');
});

$("#query-form select" ).change(function() {
    $("#query-form select").css('color','red');
    $('.third-content__items .select2-container--below .select2-selection--single .select2-selection__rendered').css('color','red');
});



function rand() {
  var word = Math.floor(Math.random() * arr.length);
  $('.generator').attr('data-result-key', word);
  $(".generator__box").text(arr[word]);
}


function generationCanvas() {
    var resultKey = $('.generator').attr('data-result-key');

    // Генерация открытки
    var canvas = document.getElementById('otkrytka');
    ctx = canvas.getContext('2d');
    ctx.clearRect(0, 0, 673, 372);

    pic = new Image(673, 372);              
    pic.src = ('./img/default.png');
    text = $('#generator__box').text().replace(/(<([^>]+)>)/ig,"");
    pic.onload = function(){
      ctx.drawImage(pic, 0, 0, 673, 372);
      
      ctx.font = '17px century';
      
      ctx.fillStyle = '#000000';
      ctx.textAlign = 'center';
      ctx.textBaseline = "bottom";
      ctx.fillText( text.toUpperCase(), 336, 220);

      
      var dataURL = canvas.toDataURL('img/canvas');
      
      filename = ( Math.random() * (100000 - 1) + 1 );
      
      

      $.ajax({
        type: 'POST',
        url: './save_image.php',
        data: { 
          imgBase64: dataURL,
          name: filename 
        }
      }).done(function(o) {

        $('.vk').click(function(){
          setUrl('vk', 'https://vk.com/share.php?url=http://fitnes.idol/app/?resultKey=' + filename);
        });

        $('.fb').click(function(){
          setUrl('fb', 'http://www.facebook.com/sharer/sharer.php?http://fitnes.idol/app/?resultKey=' + filename);
        });
      });
    }
}

function setUrl(class, url) {
  $('.' + class).attr('href', url);
}


$(document).ready(function(){
    if($("#map").length > 0){
        ymaps.ready(function() {
            var map = new ymaps.Map("map", {
                center: [56.835795, 60.600241],
                zoom: 12,
                controls: [],
            });
            var ClusterContent = ymaps.templateLayoutFactory.createClass('<div class="claster"></div>');
 			var clusterIcons=[{
                    href: '../img/geo.png',
                    size:[23, 31],
                    offset:[-23, -31],
                }];
                myClusterer = new ymaps.Clusterer({
                    clusterIcons: clusterIcons,
                    clusterNumbers:[1],
                    zoomMargin: [30],
                    clusterIconContentLayout: ClusterContent
                });
                var myBalloonLayout = ymaps.templateLayoutFactory.createClass(
                        ''
                    );
                var Placemark = {};
                $(".geo-touch").each(function(){
					var X = $(this).attr("data-yandex-x");
                    var Y = $(this).attr("data-yandex-y");

                        Obj = $(this).attr("pointindex");
                        Placemark[Obj] = new ymaps.Placemark([X,Y], {
                            name: $(this).attr("data-name"),
                    	},{
                        balloonContentLayout: myBalloonLayout,
                        balloonOffset: [5,0],
                        balloonCloseButton: true,
                        balloonMinWidth: 450,
                        balloonMaxWidth:450,
                        balloonMinHeught:150,
                        balloonMaxHeught:200,
                        iconImageHref: '../img/geo.png',
                        iconImageSize: [23, 31],
                        iconImageOffset: [-23, -31],
                        iconLayout: 'default#imageWithContent',
                        iconactive: '../img/geo.png'

                    });
                        myClusterer.add(Placemark[Obj]);
                });
                	 map.geoObjects.add(myClusterer);
                //Запрещаем изменение размеров карты по скролу мыши
                map.behaviors.disable("scrollZoom");

                function geo_center(steet) {
                  var myGeocoder = ymaps.geocode(steet);
                  myGeocoder.then(
                      function (res) {
                          var coords = res.geoObjects.get(0).geometry.getCoordinates();
                          var myGeocoder = ymaps.geocode(coords, {kind: 'house', results: 1});
                          myGeocoder.then(
                              function (res) {
                                  var nearest = res.geoObjects.get(0);
                                  map.setCenter(coords, "16");
                              }
                          );
                      },
                      function (err) {
                          alert('Ошибка');
                      }
                  );
              }

              $(document).on('click', 'address.geo-touch', function() {
                  var street = $(this).attr("data-street");
                  geo_center(street);
              });

              $(".map-select").change(function() {
                    $(".geo-list").addClass('hidden-list');
                    $(".geo-list[data-city='"+$(this).val()+"']").removeClass("hidden-list");
                      var myGeocoder = ymaps.geocode($(this).val());
                      myGeocoder.then(
                          function (res) {
                              var coords = res.geoObjects.get(0).geometry.getCoordinates();
                              var myGeocoder = ymaps.geocode(coords, {kind: 'house', results: 1});
                              myGeocoder.then(
                                  function (res) {
                                      var nearest = res.geoObjects.get(0);
                                      map.setCenter(coords, "10");
                                  }
                              );
                          },
                          function (err) {
                              alert('Ошибка');
                          }
                      );
                  });
		});
    }


});


