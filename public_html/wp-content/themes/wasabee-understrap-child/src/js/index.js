window.$ = window.jQuery;

const getAllMenuLabels = () => (
  $('.Header__contentWrapper [aria-labelledby]')
    .map((_, el) => $(el).attr('aria-labelledby'))
    .get()
);

function getSelectorFromContext(selector) {
  return typeof selector === 'undefined' ? this : selector;
}

function toggleAriaExpandedAttr(selector) {
  $(getSelectorFromContext(selector))
    .attr('aria-expanded', (_, attr) => !(attr === 'true'));
}

function getAriaExpandedAttr(selector) {
  return Boolean($(getSelectorFromContext(selector)).attr('aria-expanded'));
}

function collapseAllInHeader() {
  $('.Header [aria-expanded=true]').attr('aria-expanded', false);
}

function addInitialHeaderClass() {
  !$('.Header').hasClass('--is-after-first-click')
    && $('.Header').addClass('--is-after-first-click');
}

$('.Header__toggler').click(() => {
  toggleAriaExpandedAttr('.Header');
  addInitialHeaderClass();
  getAriaExpandedAttr('.Header') && collapseAllInHeader();
});

getAllMenuLabels().forEach((labelId) => {
  const labelContainer = $(`.Header__contentWrapper a[id=${labelId}]`).parent();
  const dropdown = $(`.Header__content__dropdown[aria-labelledby=${labelId}]`);

  labelContainer
    .children('.Header__content__expandArrow')
    .click(() => toggleAriaExpandedAttr(labelContainer.add(dropdown)));    
});

// $('.Audycje').slick({
//   slidesToShow: 3,
//   slidesToScroll: 1,
//   variableWidth: true,
//   infinite: false,
//   waitForAnimate: true,
//   swipeToSlide: true,
//   responsive: [{
//     breakpoint: 767,
//     settings: {
//       slidesToShow: 1,
//       slidesToScroll: 1
//     }
//   }]
// });

if (window.matchMedia("(max-width: 767px)").matches) {
  $('.PostFilterWithImages').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    variableWidth: true,
    infinite: false,
    waitForAnimate: false,
    swipeToSlide: true,
    arrows: false,
    mobileFirst: true,
    responsive: [{
      breakpoint: 767,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1
      }
    }]
  });
}

window.onscroll = function() {myFunction()};

var header = document.getElementById("Header");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}