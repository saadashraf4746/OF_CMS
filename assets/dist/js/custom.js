// functions
function tabsShowHide(el){
  const selectedTab = el.attr('id');
  const selectedTabParent = el.parent('ul');
  selectedTabParent.removeClass('tab-buy');
  selectedTabParent.removeClass('tab-rent');
  selectedTabParent.addClass(selectedTab);

  // show hide tabs
  const tabData = jQuery('.tabs-content .tab-data');
  tabData.addClass('d-none');
  jQuery('#' + selectedTab+'-data').removeClass('d-none');
}

// search filter show hide
function filterShowHide(element) {
  console.log(element);
  const searchFilter = jQuery('#filters');
  if (element === 'show-filter') {
    searchFilter.slideDown();
    jQuery('#'+element).addClass('d-none');
    jQuery('#show-less').removeClass('d-none');

  } else if(element === 'show-less'){
    searchFilter.slideUp();
    jQuery('#'+element).addClass('d-none');
    jQuery('#show-filter').removeClass('d-none');

  }
}

// agent detail tabs 
function getAgentActiveTab(currentCheck) {
  jQuery('.detail-tabs-data').hide();

  jQuery('#' + currentCheck + '-data').fadeIn();

  console.log(currentCheck);
}

// paymentMethodTabs
function paymentMethodTabs(currentCheck) {
  jQuery('.tab-content').hide();
  jQuery('#' + currentCheck + '_data').fadeIn();
}

// paymentMethodTabs
function propDetailTabs(currentCheck) {
  jQuery('.tab-content').hide();
  jQuery('#' + currentCheck + '_data').fadeIn();
}

// how hide tabs content 
function showHideTabsContent(currentElement){
  const element = currentElement.val() + '_data';
  console.log(element); 
  currentElement.parents('.tabs-container').find('.tabs-content .content').hide();
  jQuery('#' + element).show();
}

// ready function
jQuery(document).ready(() => {
  // init AOS
  AOS.init({
    // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
  initClassName: 'aos-init', // class applied after initialization
  animatedClassName: 'aos-animate', // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 120, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 1000, // values from 0 to 3000, with step 50ms
  easing: 'ease', // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

  });

  jQuery('.custom-dropdown ul li').on('click', function() {
    const selectedItem = jQuery(this);
    selectedItem.parents('.custom-dropdown').find('.active-item').text(selectedItem.text());
  });

  jQuery('#tabs li').on('click', function(){
    tabsShowHide(jQuery(this));
  });

  // nav show - hide
  jQuery('.nav-toggle').on('click', function(){
    jQuery('body').addClass('show-nav');
  });

  jQuery('.close-nav').on('click', function(){
    jQuery('body').removeClass('show-nav');
  });

  // carousels 
  const hero_carousel = jQuery('#hero-carousel');
  if (hero_carousel.length){
    hero_carousel.owlCarousel({
      loop: true,
      nav: true,
      dots: true,
      responsive:{
        0:{
          items:1
        },
        1000:{
          items:1
        },
        
      }
    });
  }

  // search filter show/hide
  jQuery('.filter-toggle .toggle').on('click', function(){
    filterShowHide(jQuery(this).attr('id'));
  });

  // popular properties
  const popular_property = jQuery('#popular-properties');
  if (popular_property.length){
    popular_property.owlCarousel({
      loop: true,
      nav: true,
      dots: false,
      margin: 15,

      responsive:{
        0:{
          items:1,
          stagePadding: 30,
        },
        768:{
          items:2,
          stagePadding:50
        },
        992:{
          items:3
        },
        1000:{
          items:4
        },
        
      }
    });
  }

  // hero carousel lg
  const hero_carousel_lg = jQuery('#hero-carousel-lg');
  if (hero_carousel_lg.length){
    hero_carousel_lg.owlCarousel({
      loop: true,
      nav: true,
      dots: false,
      margin: 13,
      stagePadding: 50,
      responsive:{
        0:{
          items:1
        },
        768:{
          items:1,
          stagePadding: 50,
        },
        992:{
          items:1,
          stagePadding: 100,
        },
        1200:{
          items:1,
          stagePadding: 200,
        },
        1366:{
          items:1,
          stagePadding: 300,
        },
        
      }
    });
  }
  
  // agent detail tabs
  jQuery('#agent-detail-data input[name="detail-info"]').on('change', function(){
    getAgentActiveTab(jQuery(this).val());
  });

  jQuery('#payment_method input[name="paymentMethod"]').on('change', function(){
    paymentMethodTabs(jQuery(this).val());
  });

  jQuery('#prop_detail_tabs input').on('change', function(){
    paymentMethodTabs(jQuery(this).val());
  });

  jQuery('.replies h5').on('click', function(e){
    e.preventDefault();
    jQuery(this).parent('.replies').toggleClass('opened');
  });

  jQuery('.radio-group.tabs input').on('change', function(){
    showHideTabsContent(jQuery(this));
  });


})

