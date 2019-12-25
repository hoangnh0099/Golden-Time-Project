document.addEventListener('DOMContentLoaded', function () {
  setInterval(() => $('.carousel').carousel('next'), 5000);
  $('.modal').modal();
  $('.collapsible').collapsible({accordion: false});
  $('.tabs').tabs();
  $('.dropdown-trigger').dropdown();
  $('.carousel').carousel({
    fullWidth: true, 
    indicators: true,
    padding: 10,
    duration: 200,
  });
});