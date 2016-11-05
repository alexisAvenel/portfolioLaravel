jQuery.extend( jQuery.fn.pickadate.defaults, {
    monthsFull: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
    monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
    weekdaysFull: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
    showWeekdaysFull: true,
    today: 'Ojd',
    clear: 'Effacer',
    close: 'Fermer',
    firstDay: 1,
    format: 'dd/mm/yyyy',
    formatSubmit: 'yyyy-mm-dd',
    labelMonthNext:"Mois suivant",
    labelMonthPrev:"Mois précédent",
    labelMonthSelect:"Sélectionner un mois",
    labelYearSelect:"Sélectionner une année"
});

(function() {
  /**
   * Ajustement décimal d'un nombre
   *
   * @param {String}  type : Le type d'ajustement souhaité.
   * @param {Number}  value : le nombre à traité The number.
   * @param {Integer} exp  : l'exposant (le logarithme en base 10 de l'ajustement).
   * @returns {Number} la valeur ajustée.
   */
  function decimalAdjust(type, value, exp) {
    // Si la valeur de exp n'est pas définie ou vaut zéro...
    if (typeof exp === 'undefined' || +exp === 0) {
      return Math[type](value);
    }
    value = +value;
    exp = +exp;
    // Si la valeur n'est pas un nombre
    // ou si exp n'est pas un entier...
    if (isNaN(value) || !(typeof exp === 'number' && exp % 1 === 0)) {
      return NaN;
    }
    // Décalage
    value = value.toString().split('e');
    value = Math[type](+(value[0] + 'e' + (value[1] ? (+value[1] - exp) : -exp)));
    // Décalage inversé
    value = value.toString().split('e');
    return +(value[0] + 'e' + (value[1] ? (+value[1] + exp) : exp));
  }

  // Arrondi décimal
  if (!Math.round10) {
    Math.round10 = function(value, exp) {
      return decimalAdjust('round', value, exp);
    };
  }
  // Arrondi décimal inférieur
  if (!Math.floor10) {
    Math.floor10 = function(value, exp) {
      return decimalAdjust('floor', value, exp);
    };
  }
  // Arrondi décimal supérieur
  if (!Math.ceil10) {
    Math.ceil10 = function(value, exp) {
      return decimalAdjust('ceil', value, exp);
    };
  }
})();

$(document).ready(function() {

    var window_width  = $(window).width(),
        window_height = $(window).height(),
        nav_height    = $('#navigation').height();

    $('.slide').each(function(i, v){
        var para_height = (i === 0) ? (window_height-nav_height) : window_height+1;
        $(v).css('height', para_height);
    });

    $(window).resize(function(){
        var window_width  = $(window).width(),
            window_height = $(window).height(),
            nav_height    = $('#navigation').height();
        $('.slide').each(function(i, v){
            var para_height = (i === 0) ? (window_height-nav_height) : window_height+1;
            $(v).css('height', para_height);
        });
    });

    $('body').removeProp('css');

    // Plugin initialization
    $('.carousel.carousel-slider').carousel({full_width : true});
    $('.carousel').carousel();
    $('.slider').slider({full_width : true});
    $('.parallax').parallax();
    $('.modal-trigger').leanModal();
    $('.button-collapse').sideNav();
    $('.datepicker').pickadate({selectYears : 20});
    $('select').material_select();
    $('.scrollspy').scrollSpy();
    $('.tooltipped').tooltip({delay : 50});
    $('.collapsible').collapsible({accordion : false});

});