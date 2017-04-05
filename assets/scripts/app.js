(function() {
  $(function() {
      var $grid, wow;
      $('a[href*="#"]:not([href="#"]):not([role="tab"]):not([data-toggle="pill"])').click(function() {
        var target;
        if (document.location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && document.location.hostname === this.hostname) {
          target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
          if (target.length) {
            $('html, body').animate({
              scrollTop: target.offset().top
            }, 1000);
            return false;
          }
        }
      });

      //=== BLOG ISOTOPE ===//
      var filterFns = {
            first3: function() {
                return $(this).index() <= 3;
            }
        };
      $grid = $('.grid').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
        masonry: {
          columnWidth: '.grid-sizer'
        }
      });

      $('.blog-category').on('click', '.item-menu', function() {
        var filterValue = $( this ).attr('data-filter');
        var cat = filterValue.split('.').join('');
        if ( $(this).parent().hasClass('active') ){
          return;
        }
        $grid.isotope('remove', $grid.isotope('getItemElements'));
        load_posts(cat,filterValue);
      });

      $('.blog-category').each(function(i, buttonGroup) {
        var $buttonGroup;
        $buttonGroup = $(buttonGroup);
        return $buttonGroup.on('click', 'li', function() {
          $buttonGroup.find('.active').removeClass('active');
          return $(this).addClass('active');
        });
      });

      // Ajax load post
      var ppp = 6; // Post per page
      var pageNumber = 1;
      if ( $(window).width() < 992 ){
          $grid.isotope({ filter: filterFns.first3 });
          ppp= 3;
      }
      function load_posts(cat,filterValue){
          var str = '&cat=' + cat + '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=site_isotope_ajax';
          $.ajax({
              type: "POST",
              dataType: "html",
              url: ajax_posts.ajaxurl,
              data: str
          }).done(function(data){
              var $data = $(data);
              if($data.length){
                $grid.prepend( $data ).isotope( 'prepended', $data ).isotope('layout');
              }
          });
      }

      if ($(window).width() <= 768) {
        $('.blog-category').find('li.active').find('button').css('color','#3a3a3a');
        $('.blog-category').on('click', 'li', function() {
          var index = $('.blog-category').find('li').index(this);
          var fullheight, status, leghtcate;
          status = $('.blog-category').find('ul');
          fullheight = status.get(0).scrollHeight;
          leghtcate = $('.blog-category').css( "height");
          if(leghtcate == '40px'){
            $('.blog-category').css('height', fullheight + 'px');
            $('.blog-category').addClass('active');
            $('.blog-category').css('height', fullheight + 'px');
            $('.blog-category').addClass('active');
            status.css('margin-top','0px');
            $('.blog-category').find('li.active').find('button').css('color','#d6a862');

          }
          else{
            value = index*40;
            status.css('margin-top', -value + 'px');
            $('.blog-category').css('height', '40px');
            $('.blog-category').removeClass('active');
            $('.blog-category').find('button').css('color','#3a3a3a');
          }
          
        });

      }


      //== HEADER OWL ==//
      $('#header').find('.owl-carousel').owlCarousel({
        autoplay: true,
        mouseDrag: true,
        items: 1,
        dots: false,
        animateOut: 'fadeOut',
        responsive:{
          991:{
            loop: true,
            margin: 0,
            nav: false,
            mouseDrag: true,
            autoplayHoverPause: true,
            autoplay: true,
            autoplaySpeed: 1000,
            animateOut: 'fadeOut',
            dotsSpeed: 1000,
            autoplayTimeout: 4000,
            items: 1,
            dots: true,
          }
        }
      });


      //== SERVICES OWL ==//
      if ($(window).width() < 992) {

        var sync1 = $('.service').find('ul.owl-carousel');
        var sync2 = $('.service').find('div.owl-carousel');
        // var slidesPerPage = 4; //globaly define number of elements per page
        var syncedSecondary = true;

        sync1.owlCarousel({
          items : 3,
          slideSpeed : 2000,
          autoWidth :true,
          center: true,
          nav: true,
          autoplay: false,
          dots: false,
          loop: true,
          responsiveRefreshRate : 200,
          navText: ['',''],
          responsive:{
          320:{
            margin:30
          },
          375:{
            margin:55
          },
          425:{
            margin: 80
          },
        }

        }).on('changed.owl.carousel', syncPosition);

        sync2
          .on('initialized.owl.carousel', function () {
            sync2.find(".owl-item").eq(0).addClass("current");
          })
          .owlCarousel({
          items : 1,
          dots: false,
          nav: false,
          smartSpeed: 200,
          slideSpeed : 500,
          responsiveRefreshRate : 100
        }).on('changed.owl.carousel', syncPosition2);

        function syncPosition(el) {
          //if you set loop to false, you have to restore this next line
          //var current = el.item.index;
          //if you disable loop you have to comment this block
          var count = el.item.count-1;
          var current = Math.round(el.item.index - (el.item.count/2) - .5);
          
          if(current < 0) {
            current = count;
          }
          if(current > count) {
            current = 0;
          }
          
          //end block

          sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
          var onscreen = sync2.find('.owl-item.active').length - 1;
          var start = sync2.find('.owl-item.active').first().index();
          var end = sync2.find('.owl-item.active').last().index();
          
          if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
          }
          if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
          }
        }
        
        function syncPosition2(el) {
          if(syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
          }
        }
        sync1.on("click", ".owl-item", function(e){
          e.preventDefault();
          var number = $(this).index();
          var numbercenter = sync1.find('div.owl-item.active.center').index();
          if(number<numbercenter){
            sync1.trigger('prev.owl.carousel');
          }
          if(number>numbercenter){
            sync1.trigger('next.owl.carousel');
          }
        });
      }
            
      //=== GARELLY OWL===//
      $('#gallery').find('.owl-carousel').owlCarousel({
        loop: true,
        margin: 0,
        nav: true,
        mouseDrag: true,
        autoplayHoverPause: true,
        autoplay: true,
        autoplaySpeed: 1000,
        animateOut: 'fadeOut',
        navSpeed: 1000,
        autoplayTimeout: 4000,
        items: 1,
        dots: false,
        navText: [  '<svg xmlns="http://www.w3.org/2000/svg" width="32.06" height="9.94" viewBox="0 0 32.06 9.94"><path class="cls-1" d="M1081.77,1635.72l-5.13-4.96v3.99h-26.91v1.95h26.91v3.99Z" transform="translate(-1049.72 -1630.75)"/></svg>',
                    '<svg xmlns="http://www.w3.org/2000/svg" width="32.06" height="9.94" viewBox="0 0 32.06 9.94"><path class="cls-1" d="M1081.77,1635.72l-5.13-4.96v3.99h-26.91v1.95h26.91v3.99Z" transform="translate(-1049.72 -1630.75)"/></svg>'
                  ]
      });

      
      //== MODAL HEADER, CHANNEL==//
      $('.icon-play').on('click', function() {
        var url, url_id;
        url = $(this).attr('href');
        console.log(url);
        url_id = YouTubeGetID(url);
        url = 'https://www.youtube.com/embed/'+url_id+'?autoplay=1';
        $('#headerModal').on('show.bs.modal', function() {
          $(this).find('iframe.if-video').attr("src", url);
        });
      });
      $('#headerModal').on('hidden.bs.modal', function (e) {
         $(this).find('iframe.if-video').attr("src", '');
      });

      $('#channel .img-video').on('click', function() {
        var url, url_id;
        url = $(this).attr('href');
        url_id = YouTubeGetID(url);
        url = 'https://www.youtube.com/embed/'+url_id+'?autoplay=1';
        $('#channelModal').on('show.bs.modal', function() {
          $(this).find('iframe.if-video').attr("src", url);
        });
      });

      $('#channelModal').on('hidden.bs.modal', function (e) {
         $(this).find('iframe.if-video').attr("src", '');
      });

      
      //== WOW ANIMATION ==//
      wow = new WOW({
        boxClass: 'wow',
        animateClass: 'animated',
        offset: 0,
        mobile: true,
        live: true
      });
      wow.init();


      //== NAVIGATION ==//
      $('.navigation').find('label#hamburger').on('click', function() {
        var fullheight, status;
        status = $('.navigation').find('.nav-menu');
        fullheight = status.get(0).scrollHeight;
        
        $(this).find('.hamburger').toggleClass('is-active');
          if($(this).find('.hamburger').hasClass('is-active')){
            status.css('height', fullheight +'px');
          }
          else{
            status.css('height', '0px');
          }
      });


      /**
       * @see Replace all SVG images with inline SVG
       * @link https://gist.github.com/Bloggerschmidt/61beeca2cce94a70c9df
       */
      $('img').filter(function() { return this.src.match(/.*\.svg$/); }).each(function(){   
          var $img = $(this),
              imgID = $img.attr('id'),
              imgClass = $img.attr('class'),
              imgURL = $img.attr('src');
          $.get(imgURL, function(data) {
              // Get the SVG tag, ignore the rest
              var $svg = $(data).find('svg');
              // Add replaced image's ID to the new SVG
              if(typeof imgID !== 'undefined') {
                  $svg = $svg.attr('id', imgID);
              }
              // Add replaced image's classes to the new SVG
              if(typeof imgClass !== 'undefined') {
                  $svg = $svg.attr('class', imgClass+' replaced-svg');
              }
              // Remove any invalid XML tags as per http://validator.w3.org
              $svg = $svg.removeAttr('xmlns:a');
              // Replace image with new SVG
              $img.replaceWith($svg);
          }, 'xml');
      });
     

  });
}).call(this);
//=== GET ID YOUTUBE ===//
function YouTubeGetID(url){
  var ID = '';
  url = url.replace(/(>|<)/gi,'').split(/(vi\/|v=|\/v\/|youtu\.be\/|\/embed\/)/);
  if(url[2] !== undefined) {
    ID = url[2].split(/[^0-9a-z_\-]/i);
    ID = ID[0];
  }
  else {
    ID = url;
  }
  return ID;
}

