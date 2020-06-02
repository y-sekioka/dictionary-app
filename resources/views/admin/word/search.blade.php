@extends('layouts.wordRegister')
@section("title", "単語検索")
@section('content')
<div class="container">
    <form id="search_form" action="{{ route('word.search') }}" method="POST">
        @csrf
        <input type="text" name="search_word" placeholder="検索文言" required>
        <button type="button" class="search_btn">検索</button>
    </form>
    <div id="search_result_wrap"></div>
</div>
@endsection
@section('script')
<script>
    'use strict';
    $(function() {
        $('.search_btn').on('click', function(event) {
            event.preventDefault();
            // 操作対象のフォーム要素を取得
            var $form = $('#search_form');
            // 送信ボタンを取得
            var $button = $(this);
            $('.alert.alert-danger').remove();
            $button.prop('disabled', true);
            // 送信
            $.ajax({
                url: $form.attr('action'),
                type: $form.attr('method'),
                data: $form.serialize(),
                dataType : 'html'
            }).done(function(data) {
                $('#search_result_wrap').html(data);
            }).fail(function(data) {
                $('#search_form').after('<div class="alert alert-danger"><ul><li>ただいまサービスをご利用いただけません。しばらく経ってからお試しください。<a style="    cursor: pointer;text-decoration: underline;" href="#" onclick="window.location.reload();">(再読み込み)</a></li></ul></div>');
            }).always(function() {
                $button.prop('disabled', false);
            });
        });
    });
</script>
@endsection