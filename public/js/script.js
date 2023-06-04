$(function () {
  $('button.accordion_btn').click(function () { //ボタンを押したら
    $('.line').toggleClass('open'); //矢印の向きが変わる
    $('.accordion_content').toggleClass('open'); //中身が見える
  })
});
