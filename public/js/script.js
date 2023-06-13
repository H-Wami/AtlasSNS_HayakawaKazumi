// アコーディオンメニューの動き
$(function () {
  $('button.accordion_btn').click(function () { //ボタンを押したら
    $('.line').toggleClass('open'); //矢印の向きが変わる
    $('.accordion_content').toggleClass('open'); //中身が見える
  })
});

// 編集モーダル機能
$(function () {
  $('.js_modal_open').on('click', function () { // 編集ボタンを押したら
    $('.js_modal').fadeIn(); // モーダルの中身表示
    var post = $(this).attr('post'); // 押されたボタンから投稿内容を取得し変数へ格納
    var post_id = $(this).attr('post_id'); // 押されたボタンから投稿のidを取得し変数へ格納（どの投稿を編集するか特定するのに必要な為）

    $('.modal_post').text(post); // 取得した投稿内容をモーダルの中身へ渡す
    $('.modal_id').val(post_id); // 取得した投稿のidをモーダルの中身へ渡す
    return false;
  });

  $('.js_modal_close').on('click', function () { // 背景部分や閉じるボタン(js-modal-close)が押されたら発火
    $('.js_modal').fadeOut(); // モーダルの中身(class="js-modal")を非表示
    return false;
  });
});
