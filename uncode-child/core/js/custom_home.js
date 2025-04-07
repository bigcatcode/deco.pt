

jQuery(document).ready(function($) {

			const mySwiper = new Swiper('.swiper-container', {
			    slidesPerView: 1,

			    // grid: {
			    //     rows: 2,
			    //   },
			    //slidesPerColumn: 3,
			    //slidesPerGroup :3,
			    //spaceBetween: 30,
			    pagination: {
			      el: '.swiper-pagination',
			      clickable: true,
			    },
			    // on: {
			    //   init: function () {},
			    //   orientationchange: function(){},
			    //   beforeResize: function(){
			    //     let vw = window.innerWidth;
			    //     if(vw > 1000){
			    //       mySwiper.params.slidesPerView = 3
			    //         mySwiper.params.slidesPerColumn = 3
			    //         mySwiper.params.slidesPerGroup = 3;
			    //     } else {
			    //       mySwiper.params.slidesPerView = 4
			    //         mySwiper.params.slidesPerColumn = 2
			    //         mySwiper.params.slidesPerGroup =4;
			    //     }
			    //     mySwiper.init();
			    //   },
			    // },
			});


        $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,

          fixedContentPos: false
        });



        $('.noticia-filter-link').on('click', function (e) {
        	e.preventDefault();

        	var id = $(this).attr('data-id');
        	console.log(id);
        	var page_ = $('.tui-is-selected').attr('data-page');
        	var page = 1;
        	console.log(page_);
        	if (typeof page_ != 'undefined') {
        		page = page_;
        	}

                $('#noticas_result').css({
                    'opacity': 0.3
                });
                $('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_noticia-filter&cat="+id+"&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#noticas_result').html(a.content).css({
                                'opacity': '1'
                            });
                            $('#services-loader').hide();

                            $('.filter-show-all a').removeClass('active');
                            $('.filter-cat a').removeClass('active');
                            $('.filter-cat-'+id+ ' a').addClass('active');


 							const newURL = `?category=`+id;
                            console.log(newURL);
                            window.history.pushState( window.location.pathname,'',newURL);  

                            var destination = $('#noticas_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax 




        });

        $('.divulgar-filter-link').on('click', function (e) {
        	e.preventDefault();

        	var id = $(this).attr('data-id');
        	console.log(id);
        	var page_ = $('.tui-is-selected').attr('data-page');
        	var page = 1;
        	console.log(page_);
        	if (typeof page_ != 'undefined') {
        		page = page_;
        	}

                $('#noticas_result').css({
                    'opacity': 0.3
                });
                $('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_divulgar-filter&cat="+id+"&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#noticas_result').html(a.content).css({
                                'opacity': '1'
                            });
                            $('#services-loader').hide();

                            $('.filter-show-all a').removeClass('active');
                            $('.filter-cat a').removeClass('active');
                            $('.filter-cat-'+id+ ' a').addClass('active');


 							const newURL = `?category=`+id;
                            console.log(newURL);
                            window.history.pushState( window.location.pathname,'',newURL);  

                            var destination = $('#noticas_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax 




        });

        $('.conversas_digitais-filter-link').on('click', function (e) {
        	e.preventDefault();

        	var id = $(this).attr('data-id');
        	console.log(id);
        	var page_ = $('.tui-is-selected').attr('data-page');
        	var page = 1;
        	console.log(page_);
        	if (typeof page_ != 'undefined') {
        		page = page_;
        	}

                $('#noticas_result').css({
                    'opacity': 0.3
                });
                $('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_conversas_digitais-filter&cat="+id+"&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#noticas_result').html(a.content).css({
                                'opacity': '1'
                            });
                            $('#services-loader').hide();

                            $('.filter-show-all a').removeClass('active');
                            $('.filter-cat a').removeClass('active');
                            $('.filter-cat-'+id+ ' a').addClass('active');


 							const newURL = `?category=`+id;
                            console.log(newURL);
                            window.history.pushState( window.location.pathname,'',newURL);  

                            var destination = $('#noticas_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax 




        });

        $('.explorar-filter-link').on('click', function (e) {
        	e.preventDefault();

        	var id = $(this).attr('data-id');
        	console.log(id);
        	var page_ = $('.tui-is-selected').attr('data-page');
        	var page = 1;
        	console.log(page_);
        	if (typeof page_ != 'undefined') {
        		page = page_;
        	}

                $('#noticas_result').css({
                    'opacity': 0.3
                });
                $('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_explorar-filter&cat="+id+"&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#noticas_result').html(a.content).css({
                                'opacity': '1'
                            });
                            $('#services-loader').hide();

                            $('.filter-show-all a').removeClass('active');
                            $('.filter-cat a').removeClass('active');
                            $('.filter-cat-'+id+ ' a').addClass('active');


 							const newURL = `?category=`+id;
                            console.log(newURL);
                            window.history.pushState( window.location.pathname,'',newURL);  

                            var destination = $('#noticas_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax 




        });

        let searchParams = new URLSearchParams(window.location.search);
        console.log(searchParams);
        if ( searchParams.has('category') ) {
        	let id = searchParams.get('category');
        	 console.log(id);
        	$('.filter-cat-'+id+ ' a').trigger('click');
        }


        $('.explorar-filter-link-new').on('click', function (e) {
            e.preventDefault();

            var id = $(this).attr('data-id');
            console.log(id);
            var page_ = $('.tui-is-selected').attr('data-page');
            var page = 1;
            console.log(page_);
            if (typeof page_ != 'undefined') {
                page = page_;
            }

                $('#noticas_result').css({
                    'opacity': 0.3
                });
                $('#services-loader').show();

                 $.ajax({
                        type    : "POST",
                        url     : js_url.ajaxurl,
                        dataType: "json",
                        data    : "action=get_explorar-filter-new&cat="+id+"&page="+page+"",
                        success : function (a) {
                            console.log(a);

                            $('#noticas_result').html(a.content).css({
                                'opacity': '1'
                            });
                            $('#services-loader').hide();

                            
                            $('.filter-cat a').removeClass('active');
                            $('.filter-cat-'+id+ ' a').addClass('active');
 

                            var destination = $('#noticas_result').offset().top - 150;
                            $('body,html').animate({scrollTop: destination}, 400);

              
                        }

                }); //end ajax 




        });



});


